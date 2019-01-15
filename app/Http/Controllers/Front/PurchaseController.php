<?php

namespace App\Http\Controllers\Front;

use App\Events\PurchaseCompleted;
use App\Http\Controllers\Controller;
use App\Http\Requests\CheckOutRequest;
use App\Product;
use App\Purchase;
use Illuminate\Http\JsonResponse;

class PurchaseController extends Controller
{

    private $paymentMethods = ['payMP', 'payPaypal', 'payOther'];
    private $redirect;
    private $mp_preference_id = '';

    public function success()
    {
        if (!\Cart::count()) return redirect('/');

        $purchase = Purchase::find(session()->get('purchase_id'));
        $subzone = \App\Subzone::find( session()->get('checkout.subzone_id') );
        session()->forget('purchase_id');
        event(new PurchaseCompleted($purchase));

        return view('front.cart.success', compact('purchase', 'subzone'));
    }

    private function payMP($subzone)
    {
        //MP: preferencia de pago
        $preferenceData = $this->create_MP_preference_data($subzone);
        $preference = \MP::create_preference($preferenceData);
        $this->redirect = (env('MP_SANDBOX')) ? $preference['response']['sandbox_init_point'] : $preference['response']['init_point'];
        $this->mp_preference_id = $preference['response']['id'];

    }

    private function payPaypal($subzone)
    {
        $this->redirect = url('compra-exitosa');
    }

    private function payOther($subzone)
    {
        $this->redirect = url('compra-exitosa');
    }

    public function prepare(CheckOutRequest $request)
    {
        $data = array_merge($request->validated(), $request->only('apartment', 'rcp', 'message'));
        session()->put('checkout', $data);
        return ['url' => '/carrito/confirmar'];
    }

    public function pay()
    {
        if (!\Cart::count()) return new JsonResponse(['message' => 'No hay proudctos en el carrito'], 422);

        $shipping = session()->get('shipping');
        $payment_method = session()->get('payment_method');

        $subzone = ($shipping['shipping']) ? \App\Subzone::find($shipping['subzone_id']) : null;

        $paymentMethod = \App\Classes\PaymentMethod::$values[$payment_method['id']];

        $this->{$paymentMethod['key']}($subzone);

        //Creación de los items de la compra
        $itemsCollection = $this->create_items();

        //Creación de la compra
        $purchase = Purchase::create([
            'total' => \Cart::subtotal(2, '.', ''),
            'mp_preference_id' => $this->mp_preference_id,
            'client_id' => \Auth::guard('clients')->id(),
            'shipping' => $subzone ? $subzone->price : null,
            'zone' => $shipping['shipping'] ? $shipping['zone_value'] : null,
            'payMethod' => $paymentMethod['label'],
        ]);

        //Agregado de los items en la compra
        $purchase->items()->saveMany($itemsCollection);

        //Dispara el evento de compra completada (ver listeners asociados)
        session()->put('purchase_id', $purchase->id);

        return ['success' => true, 'url' => $this->redirect];
    }

    private function create_items()
    {
        $itemsCollection = collect();
        foreach (\Cart::content() as $cartItem) {
            $item = new \App\Item;
            $item->product_id = $cartItem->id;
            $item->price = $cartItem->price;
            $item->cost = $cartItem->model->cost;
            $item->name = $cartItem->name;
            $item->amount = $cartItem->qty;
            $itemsCollection->push($item);
        }
        return $itemsCollection;
    }

    private function create_MP_preference_data($subzone)
    {
        $checkout = session()->get('checkout');

    	$mpItems = [];
    	foreach (\Cart::content() as $cartItem) {
    		$mpItems[] = [
                'id' => $cartItem->id,
                //'category_id' => $cartItem->options->category,
                'title' => $cartItem->name,
                'description' => $cartItem->options->description,
                'picture_url' => url('content/products/250x320/'.$cartItem->options->thumb),
                'quantity' => $cartItem->qty * 1,
                'currency_id' => 'ARS',
                'unit_price' => \Discount::itemDiscount($cartItem)
            ];
        }

        //MP: preferencia de pago
        $preferenceData = [
            'items' => $mpItems,
            'payer' => [
                'name' => $checkout['name'],
                //'phone' => request()->input('phone'),
                'email' => $checkout['email']
            ],
            'back_urls' => [
                'success' => 'http://tujardinonline.com.ar/compra-exitosa'
            ],
            'notification_url' => 'http://tujardinonline.com.ar/webhooks/mercado-pago',
            'id' => uniqid()
        ];

        if ($subzone) {
            $preferenceData['shipments'] = [
                'mode' => 'not_specified',
                'cost' =>  $subzone->price * 1,
                'free_shipping' => false
            ];
        }

        return $preferenceData;
    }

}
