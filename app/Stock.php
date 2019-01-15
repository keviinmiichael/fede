<?php

namespace App;

use App\Classes\Unite;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use Unite;

    protected $table = 'stock';
    protected $fillable = ['product_id', 'amount'];
    public $timestamps = false;

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    //scopes
    public function scopeSearch($query)
    {
        if (request('search.value')) {
            $query->unite('product')->where('products.name', 'like', request('search.value').'%');
        }
    }

    public function scopeDt($query)
    {
        $query->select(\DB::raw('stock.id, stock.amount, products.name as product'))
            ->unite('product')
            ->orderBy('products.name')
            ->take(request('length'))
            ->skip(request('start'))
        ;
    }
    //------
}
