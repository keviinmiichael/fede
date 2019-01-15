<?php

namespace App;

use App\Classes\Buyable as BuyableTrait;
use App\Classes\Unite;
use App\Stock;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Gloudemans\Shoppingcart\Contracts\Buyable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model implements Buyable
{
    use SoftDeletes, Sluggable, BuyableTrait, Unite;

    protected $fillable = ['name', 'description','slug','code','price','cost','profit_margin','discount','stock','category_id','subcategory_id','is_visible', 'home'];

    protected $appends = ['discount_price'];

    public function items()
    {
        return $this->hasMany('App\Item');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function subcategory()
    {
        return $this->belongsTo('App\Subcategory');
    }

    public function images()
    {
        return $this->morphMany('App\Image', 'imageable')->orderBy('order');
    }

    public function sluggable()
    {
        return [
            'slug' => ['source' => 'name', 'onUpdate' => true]
        ];
    }

    //getters y setters
    public function getPath()
    {
        if (isset($this->subcategory)) {
            $path = '/productos/' .$this->subcategory->slug . '/' .$this->slug;
        }else {
            $path =  '/productos/' .$this->slug;
        }
        return $path;

    }


    public function getThumbAttribute()
    {
        if (!$image = $this->images()->first()) {
            $src = 'imagen-no-disponible.jpg';
        } else {
             $src = $image->src;
        }
        return $src;
    }

    public function calculatePrice()
    {
        return  $this->price ?? ceil($this->cost * $this->profit_margin / 100 + $this->cost);
    }

    public function getDiscountPriceAttribute()
    {
        $price = $this->calculatePrice();
        if ($this->discount != 0) $price = $price - ceil($price * $this->discount / 100);
        return $price;
    }

    public function getPriceFormatAttribute($price)
    {
        return (!$this->profit_margin)?2:1;
    }
    //-----------------

    //productos relacionados
    public function addRelation($product_id)
    {
        if ($this->id == $product_id) return false;

        $min = min($this->id, $product_id);
        $max = max($this->id, $product_id);

        $relation = \DB::table('related_products')->where('product1_id', $min)->where('product2_id', $max)->first();

        if ($relation) {
            \DB::table('related_products')->where('id', $relation->id)->increment('times');
        } else {
            \DB::table('related_products')->insert([
                'product1_id' => $min,
                'product2_id' => $max,
            ]);
        }
    }

    public function relatedProducts()
    {
        $products1 = \DB::table('related_products')
            ->select('product2_id as id')
            ->where('product1_id', $this->id)
            ->orderBy('times', 'desc')
            ->limit(10)
            ->get()
        ;

        $products2 = \DB::table('related_products')
            ->select('product1_id as id')
            ->where('product2_id', $this->id)
            ->orderBy('times', 'desc')
            ->limit(10)
            ->get()
        ;

        $products = $products1->merge($products2);
        $ids = $products->pluck('id')->toArray();

        return self::whereIn('id', $ids)
            ->where('id', '!=', $this->id)
            ->orderByRaw('FIND_IN_SET(id, "'.implode(',',  $ids) . '")')
            ->limit(4)
            ->get()
        ;
    }
    //-----------------


    //scopes
    public function scopeVisible($query)
    {
        $query->where('is_visible', 1)->where('stock', '>', 0);
    }
    public function scopeSearch($query)
    {
        if (request()->input('search.value')) {
            $query->where('products.name', 'like', '%'.request()->input('search.value').'%')
                ->orWhere('products.code', 'like', '%'.request()->input('search.value').'%');
        }
    }
    public function scopeFilter($query)
    {
		if (request()->has('sort')) {
            list($column, $direction) = explode('-', request()->input('sort'));
            if (in_array($column, ['name', 'price'])) $query->orderBy($column, $direction);
        }
    }

    public function scopeDt($query)
    {
        $query->select(\DB::raw('products.*, images.src as thumb, images.order, categories.value as category, subcategories.value as subcategory'))
            ->unite('category')
            ->unite('subcategory', true)
            ->unite('images', true)
            ->take(request()->input('length'))
            ->skip(request()->input('start'))
            ->orderBy(request()->input('order.0.column'), request()->input('order.0.dir'))
            ->orderBy('images.order')
            ->groupBy('products.id')
        ;
    }
}
