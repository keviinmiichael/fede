<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes, Sluggable;

    protected $fillable = ['value', 'slug', 'title', 'description'];

    public function subcategories()
    {
      return $this->hasMany('App\Subcategory');
    }

    public function products()
    {
      return $this->hasMany('App\Product');
    }

    public function sluggable()
    {
        return [
            'slug' => ['source' => 'value', 'onUpdate' => true]
        ];
    }

    //scopes
    public function scopeSearch($query)
    {
        if (request()->has('search.value')) {
            $query->where('value', 'like', request()->input('search.value').'%');
        }
    }

    public function scopeDt($query)
    {
        $query->take(request()->input('length'))->skip(request()->input('start'));
    }
    //------

    
}