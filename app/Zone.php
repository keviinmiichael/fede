<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Zone extends Model
{
    use SoftDeletes;

    public $fillable = ['name','price'];

    public function subzones()
    {
        return $this->hasMany(Subzone::class);
    }

    //scopes
    public function scopeSearch($query)
    {
        if (request()->has('search.value')) {
            $query->where('name', 'like', request()->input('search.value').'%');
        }
    }

    public function scopeDt($query)
    {
        $query->take(request()->input('length'))->skip(request()->input('start'));
    }
    //------

}
