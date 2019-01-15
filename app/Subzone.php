<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subzone extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'price', 'zone_id'];

    public function zone()
    {
      return $this->belongsTo('App\Zone');
    }

     public static function toSelect($zone_id)
    {
        $subzones = Zone::find($zone_id)->subzones;
        $html = '<select class="form-control" name="subzone_id" id="subzone">';
        $html .= '<option value="">Seleccionar</option>';
        foreach ($subzones as $subzone) {
            $html .= '<option value="'.$subzone->id.'">'.$subzone->value.'</option>';
        }
        $html .= '</select>';
        return $html;
    }

	 //scopes
    public function scopeSearch($query)
    {
        if (request('search.value')) {
            $query->where('name', 'like', request('search.value').'%');
        }
    }
    public function scopeDt($query)
    {
        $query->take(request('length'))->skip(request('start'));
    }
}