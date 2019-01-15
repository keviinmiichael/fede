<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Product;
use App\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
    	$slider = Slider::home();
        $products = Product::where('home', 1)->get();
        return view('front.index', compact('products', 'slider'));
    }
}
