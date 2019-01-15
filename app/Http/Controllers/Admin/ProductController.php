<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Product;

class ProductController extends Controller
{

    public function json()
    {
        $data = Product::dt()->search()->get();
        $recordsTotal = Product::count();
        $recordsFiltered = Product::search()->count();
        return compact('data', 'recordsTotal', 'recordsFiltered');
    }

    public function index()
    {
        return view('admin.products.index');
    }

    public function create()
    {
        $product = new Product;
        $categories = ['null' => 'Elegir'] + \App\Category::pluck('value', 'id')->toArray();
        $subcategories = ['null' => 'Elegir'];
        return view('admin.products.form', compact('product', 'categories', 'subcategories'));
    }

    public function store(ProductRequest $request)
    {
        if (empty($request->price)) $request->price = ceil($request->cost * $request->profit_margin / 100 + $request->cost);
        $product = Product::create($request->all());
        $this->addImages($product);
        return redirect('admin/products#new');
    }

    public function edit(Product $product)
    {
        $categories = ['null' => 'Elegir'] + \App\Category::pluck('value', 'id')->toArray();
        $subcategories = ['null' => 'Elegir'] + \App\Subcategory::where('category_id', $product->category_id)->pluck('value', 'id')->toArray();
        return view('admin.products.form', compact('product', 'categories', 'subcategories'));
    }

    public function update(Product $product, ProductRequest $request)
    {
        if (request()->ajax()) {
            $product->update($request->all());
            return $product->toArray();
        }
        if (empty($request->price)) $request->price = ceil($request->cost * $request->profit_margin / 100 + $request->cost);
        $product->update($request->all());
        $this->addImages($product);
        return redirect('admin/products#edit');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return ['success' => true];
    }

    private function addImages($product)
    {
        //slider
        if (request()->has('imagesIds')) {
            $images = \App\Image::whereIn('id', request()->input('imagesIds'));
            $product->images()->saveMany($images->get());
            $images->update(['pending'=>0]);
        }
        $product->save();
    }
}
