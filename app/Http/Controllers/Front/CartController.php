<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Classes\PaymentMethod;

class CartController extends Controller
{
    public function show()
    {
        $cartItems = Cart::content();
        return view('front.cart.show', compact('cartItems'));
    }

    public function shipping()
    {
        if (!\Auth::guard('clients')->check()) return redirect('perfil/login');
        $zones = \App\Zone::with('subzones')->get();
        return view('front.cart.shipping', compact('zones'));
    }

    public function paymentMethod()
    {
        if (!\Auth::guard('clients')->check()) return redirect('perfil/login');
        return view('front.cart.payment-method');
    }

    public function checkout()
    {
        if (!\Auth::guard('clients')->check()) return redirect('perfil/login');
        if (!Cart::count()) return redirect('/');
        $client =  \Auth::guard('clients')->user();
        $cartItems = Cart::content();
        return view('front.cart.checkout', compact('cartItems', 'client'));
    }

    public function confirm()
    {
        if (!\Auth::guard('clients')->check()) return redirect('perfil/login');
        $checkout = session()->get('checkout');
        $subzone = \App\Subzone::find($checkout['subzone_id']);
        $payment_method = \App\Classes\PaymentMethod::$values[$checkout['payment_method']];
        if (!\Auth::guard('clients')->check()) return redirect('perfil/login');
        if (!Cart::count()) return redirect('/');
        return view('front.cart.confirm', compact('checkout', 'subzone', 'payment_method'));
    }

    public function add(Product $product)
    {
        $response = ['error' => true];
        //dd($product->stock, $product->is_visible);
        if ($product->stock > 0 && $product->is_visible) {
            $options['path'] = $product->getPath();
            $options['cost'] = $product->cost;
            $options['description'] = str_limit($product->description, 80);
            $options['picture_url'] = $product->thumb;
        	$cartItem = Cart::add($product, request()->input('qty'), $options);
            $total = Cart::subtotal();
            $response = ['error' => false, 'cartItem' => $cartItem, 'totalItems' => Cart::count(), 'total' => $total];
        }
        return $response;
    }

    public function remove()
    {
        Cart::remove(request()->input('rowId'));
        return ['success' => true, 'totalItems' => Cart::count()];
    }

    public function refresh()
    {
        Cart::update(request()->input('rowId'), request()->input('qty'));
        return ['success' => true, 'totalItems' => Cart::count()];
    }

    public function success()
    {
        $products = Product::whereIn('id', array_keys(session('cart')))->with('stocks')->get();
        $subzone = \App\Subzone::find($checkout['subzone_id']);
        return view('front.cart.success', compact('products', 'subzone'));
    }

    public function step1()
    {
        $data = ['shipping' => false];
        if (!request()->has('no_shipping')) {
            $subzone = \App\Subzone::find(request()->input('subzone_id'));
            $data = [
                'subzone_id' => $subzone->id,
                'subzone_value' => $subzone->name,
                'zone_value' => $subzone->zone->name,
                'address' => request()->input('address'),
                'shipping' => true
            ];
        }
        session()->put('shipping', $data);
    }

    public function step2()
    {
         $data = [
            'id' => request()->input('payment_method'),
            'label' => PaymentMethod::$values[request()->input('payment_method')]['label']
        ];
        session()->put('payment_method', $data);
    }

}
