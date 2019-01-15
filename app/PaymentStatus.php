<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentStatus extends Model
{
    protected $table = 'payment_status';
    protected $fillable = ['value'];
    
    public function purchases()
    {
        return $this->hasMany('App\Purchase', 'payment_status_id');
    }
}