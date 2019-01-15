<?php

namespace App;

use Dirape\Token\DirapeToken;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use DirapeToken;

    protected $DT_Column = 'code';
    protected $DT_settings=['type' => DT_Unique, 'size' => 20, 'special_chr' => false];
    protected $fillable = ['code', 'discount', 'type_id', 'applied'];

    public function clients()
    {
        return $this->belongsToMany('App\Client');
    }

    //scopes
    public function scopeSearch($query)
    {
        if (request()->has('search.value')) {
            $query->where('code', 'like', '%'.request()->input('search.value').'%');
        }
    }

    public function scopeDt($query)
    {
        $query->take(request()->input('length'))
            ->skip(request()->input('start'))
            ->orderBy(request()->input('order.0.column'), request()->input('order.0.dir'))
        ;
    }
}
