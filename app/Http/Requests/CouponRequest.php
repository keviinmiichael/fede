<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CouponRequest extends FormRequest
{

    public function authorize()
    {
        return \Auth::check();
    }

    public function rules()
    {
        return [
            'discount' => 'required|min:1',
        ];
    }

    public function messages()
    {
        return [
            'discount.required' => 'Indique el monto a descontar',
            'discount.min' => 'El monto a descontar tiene que ser mayor a cero',
        ];
    }
}
