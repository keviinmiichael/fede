<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
{

    public function authorize()
    {
        return \Auth::check();
    }

    public function rules()
    {
        $id = (isset($this->product->id)) ? $this->product->id : 0;
        $rules = [];
        if (!$this->ajax()) {
            $rules = [
                'name' => 'required',
                'code' => ['required', Rule::unique('products')->ignore($id)],
                'cost' => 'required',
                'category_id' => 'numeric',
            ];
        }
        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre del producto es obligatorio',
            'code.required' => 'El código del producto es obligatorio',
            'code.unique' => 'El código elegido ya le pertenece a otro producto',
            'cost.required' => 'El costo es obligatorio',
            'category_id.numeric' => 'La categoría es obligatoria',
        ];
    }
}