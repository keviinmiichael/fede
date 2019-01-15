<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    public function images()
    {
        return $this->morphMany('App\Image', 'imageable')->orderBy('order');
    }

    public static function home()
    {
        return self::find(1);
    }
}