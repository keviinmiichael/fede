<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShippingStatus extends Model
{
    protected $table = 'shipping_status';
    protected $fillable = ['value'];
    
    public function purchases()
    {
        return $this->hasMany('App\Purchase', 'shipping_status_id');
    }
}