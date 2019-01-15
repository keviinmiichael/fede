<?php

namespace App\Classes;

trait ToForm {

    public static function toSelect($firsOption=[], $selectable=0)
    {
        $items = ($selectable) ? self::where('id', $selectable) : self::all();
        return $firsOption + $items->pluck('name', 'id')->toArray();
    }

    public static function toCheckbox($category_id, $checkeds_id=[])
    {
        $subcategories = self::where('category_id', $category_id)->get();
        $html = '';
        foreach ($subcategories as $subcategory) {
            $checked = (in_array($subcategory->id, $checkeds_id)) ? 'checked' : '';
            $html .=  '
                <label class="checkbox">
                    <input name="'.$subcategory->getTable().'[]" type="checkbox" value="'.$subcategory->id.'" '.$checked.' /> 
                    '.$subcategory->name.'
                </label>
            ';
        }
        return $html;
    }

}