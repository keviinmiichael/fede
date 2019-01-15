<?php

namespace App;

use App\Classes\Unite;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Authenticatable
{

    use SoftDeletes, Unite;

    protected $fillable = ['name','phone','email','address','zip_code','localidad','provincia'];

    //relationships
    public function purchases()
    {
        return $this->hasMany('App\Purchase');
    }

    public function coupons()
    {
        return $this->belongsToMany('App\Coupon');
    }
    //----------

	//scopes
    public function scopeSearch($query)
    {
        if (request('search.value')) {
            $query->where('clients.name', 'like', request('search.value').'%')
                ->orWhere('clients.email', 'like', request('search.value').'%')
                ->orWhere('clients.localidad', 'like', request('search.value').'%')
                ->orWhere('clients.provincia', 'like', request('search.value').'%');
        }
    }

    public function scopeDt($query)
    {
        $query->select(\DB::raw('clients.*'))
            ->take(request('length'))
            ->skip(request('start'))
        ;
    }
    //----------



}
