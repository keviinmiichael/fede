<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subcategory extends Model
{
    use SoftDeletes, Sluggable;
    protected $fillable = ['value', 'slug', 'category_id', 'title', 'description'];

    public function category()
    {
      return $this->belongsTo('App\Category');
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

    public function getPath()
    {
        return '/' . $this->category->slug . '/' . $this->slug;
    }

     public static function toSelect($category_id)
    {
        $subcategories = Category::find($category_id)->subcategories;
        $html = '<select class="form-control" name="subcategory_id" id="subcategory">';
        $html .= '<option value="">Seleccionar</option>';
        foreach ($subcategories as $subcategory) {
            $html .= '<option value="'.$subcategory->id.'">'.$subcategory->value.'</option>';
        }
        $html .= '</select>';
        return $html;
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
}