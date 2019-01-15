<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    
    public $timestamps = false;
    protected $fillable = ['name','price','cost','amount','product_id','purchase_id'];

    public function product()
    {
        return $this->belongsTo('App\Product')->withTrashed();
    }

    public function purchase()
    {
        return $this->belongsTo('App\Purchase');
    }

    //scopes
    public function scopeSearch($query)
    {
        if (request('search.value')) {
            $query->where('product.name', 'like', request('search.value').'%');
        }
    }

    public function scopeDt($query)
    {
        $query->select(\DB::raw('items.*, products.name as product, images.src as thumb'))
            ->join('products', 'products.id', '=', 'items.product_id')
            ->leftJoin('images', function ($join) {
                $join->on('products.id', '=', 'images.imageable_id')
                    ->where('images.imageable_type', '=', 'App\Product');
            })
            ->orderBy(request('order.0.column'), request('order.0.dir'))
            ->orderBy('images.order')
            ->take(request('length'))
            ->skip(request('start'))
        ;
    }

}