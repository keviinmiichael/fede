<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Category;
use App\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::visible()->orderBy('code')->paginate(9);
        return view('front.products.index', compact('products'));
    }

    public function search()
    {
        $products = Product::select('products.*')
            ->where('products.name', 'like', '%'.request()->input('q').'%')
            ->orderBy('code')
            ->visible()
            ->paginate(9)
        ;
        return view('front.products.index', compact('products'));
    }

    public function show($subcategory, $slug = null)
    {
        $currentSlug = ($slug) ? $slug : $subcategory;
        $product = Product::where('slug', $currentSlug)->with('images')->firstOrFail();
        $this->addRelation($product);
        return view('front.products.show', compact('product'));
    }

    public function addRelation($product)
    {
        if (session()->has('last_visited')) {
            $product->addRelation(session()->get('last_visited'));
        }
        session()->put('last_visited', $product->id);
    }
}
