<?php

namespace App;

use App\Classes\Unite;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use Unite;

    protected $fillable = ['total','cost', 'addrres', 'client_id', 'client_fullname', 'shipping_status_id', 'payment_status_id', 'mp_preference_id', 'mp_response', 'shipping', 'zone','payMethod'];

    protected $dates = [
        'rdate'
    ];

    public function client()
    {
        return $this->belongsTo('App\Client');
    }


    public function shippingStatus()
    {
        return $this->belongsTo('App\ShippingStatus', 'shipping_status_id');
    }

    public function paymentStatus()
    {
        return $this->belongsTo('App\PaymentStatus', 'payment_status_id');
    }

    public function items()
    {
        return $this->hasMany('App\Item');
    }

    public function getMetodoDePagoAttribute()
    {
        $payMethods = [
            'payMP' => 'Mercado Pago',
            'payPaypal' => 'PayPal',
            'payOther' => 'Efectivo'
        ];
        return $payMethods[$this->payMethod];
    }

	 //scopes
	 public function scopeSearch($query)
    {
        if (request('search.value')) {
            $query->where('purchases.state', 'like', request('search.value').'%')
                ->orWhere('purchases.paid', 'like', request('search.value').'%')
                ->orWhere('purchases.cost', 'like', request('search.value').'%');
        }
    }

    public function scopeDt($query)
    {
        $query->select(\DB::raw('purchases.*, clients.name as client_name'))
            ->unite('client', true)
            ->orderBy(request()->input('order.0.column'), request()->input('order.0.dir'))
            ->take(request('length'))
            ->skip(request('start'))
        ;
    }

}
