<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Product;

class PriceController extends Controller
{
    public function create()
    {
        $autocompleteProviders = $this->getAutocompleProviders();
        return view('admin.prices.form', $autocompleteProviders);
    }

    public function store()
    {
        foreach (request()->input('product_id') as $key => $product_id) {
            if (!$product_id) continue;
            $product = Product::find($product_id);
            $product->cost = request()->input("cost.$key");
            if (request()->input("price_format.$key") == 1) { //margen
                $product->profit_margin = request()->input("profit_margin.$key");
                $product->price = ceil(request()->input("cost.$key") * request()->input("profit_margin.$key") / 100 + request()->input("cost.$key"));
            } else { //precio
                $product->profit_margin = null;
                $product->price = request()->input("price.$key");
            }
            $product->save();
        }
        return redirect('admin/products#price');
    }

    private function getAutocompleProviders()
    {
        $codesAutocomplete = Product::select(\DB::raw('products.*, code as label'))->orderBy('code')->get();
        $namesAutocomplete = Product::select(\DB::raw('products.*, name as label'))->orderBy('name')->get();
        return compact('codesAutocomplete', 'namesAutocomplete');
    }
}