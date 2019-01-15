<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{

    protected $fillable = ['src','imageable_id','imageable_type','is_video','pending','order'];

    public function __get($name)
    {
        $prop = null;
        if (parent::__get($name)) {
            $prop = parent::__get($name);
        } elseif ($this->info->contains('name', $name)) {
            $prop = $this->info()->where('name', $name)->where('image_id', $this->id)->first()->value;
        }
        return $prop;
    }

    public function toArray()
    {
        return array_merge($this->info->pluck('value', 'name')->toArray(), parent::toArray());
    }

    public function info()
    {
        return $this->hasMany('App\ImageInfo');
    }

    public function imageable()
    {
        return $this->morphTo();
    }

    public static function nextId ()
    {
        if (!$imagen = self::select('id')->orderBy('id', 'desc')->first()) {
            $imagen = new self;
            $imagen->id = 0;
        }
        return $imagen->id + 1;
    }

}