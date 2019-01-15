<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function show($category, $slug)
    {
        $subcategory = Subcategory::where('slug', $slug)->firstOrFail();
        $category = $subcategory->category;
        $products = $subcategory->products()->visible()->orderBy('code')->paginate(12);
        return view('front.products.index', compact('products','category'));
    }
}
