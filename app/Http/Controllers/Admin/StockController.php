<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Product;
use App\Stock;

class StockController extends Controller
{
    public function json()
    {
        $data = Stock::dt()->search()->get();
        $recordsTotal = Stock::count();
        $recordsFiltered = Stock::search()->count();
        return compact('data', 'recordsTotal', 'recordsFiltered');
    }

    public function index()
    {
        return view('admin.stock.index');
    }

    public function create()
    {
        $autocompleteProviders = $this->getAutocompleProviders();
        return view('admin.stock.form', $autocompleteProviders);
    }

    public function store()
    {
        foreach (request()->input('product_id') as $key => $product_id) {
            if (!$product_id) continue;

            $total = 0;
            $stock = Stock::firstOrNew(['product_id' => $product_id]);
            $stock->amount += request()->input("amount.$key");
            $stock->save();

            Product::where('id', $product_id)->update(['cost' => request()->input("cost.$key")]);
            Product::where('id', $product_id)->increment('stock', $stock->amount);
        }
        return redirect('admin/stock#edit');
    }

    public function update($id)
    {
        Product::where('id', $id)->update(['stock' => request()->input('stock')]);
    }

    private function getAutocompleProviders()
    {
        $codesAutocomplete = Product::select(\DB::raw('products.*, code as label'))->orderBy('code')->get();
        $namesAutocomplete = Product::select(\DB::raw('products.*, name as label'))->orderBy('name')->get();
        return compact('codesAutocomplete', 'namesAutocomplete');
    }
}

/*
La carga de stock funciona de la siguiente manera:
1 - En la vista se genera una tabla con tres tipos de columnas:
    las columnas con los datos del producto - código, nombre y costo
    la columna del color
    y las columnas de los talles. Estas últimas se generan dinámicamente según cuantos size haya en base
2 - Toda esa información se envía al presente controlador en donde, por cada id de producto enviado
    se desgloza el stock que va a tener cada combinación de talle, color y producto
3 - En cada iteración del array con los ids de producto, se hace otra iteración por cada size que hay en base
4 - Es acá donde se genera realmente el stock, si ya exite la combinación size_id, color_id, product_id
    en la tabla stock, simplemente se suma el amount al ya existente. Si no existe esa combinación
    se la crea y se le asigna el amount (el amount o cantidad viene dado en el valor del input size,
    ver vista de carga de stock para una mayor comprensión)
5 - Por último, en cada iteración del array de ids productos se calcula el total de stock cargado para
    dicho producto. Es decir, la sumatoria de cada amount en cada una de las combinaciones size_id,
    color_id, product_id en donde product_id sea siempre el mismo.
6 - Ese valor calculado se suma en la columna de stock de la tabla producto (esta columna ayuda a la performace)
*/
