<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PayRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email',
            'area' => 'required',
            'numero' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es obligatorio',
            'surname.required' => 'El apellido es obligatorio',
            'email.required' => 'El email es obligatorio',
            'email.email' => 'El email es ingresado no es válido',
            'area.required' => 'El código de área es obligatorio',
            'numero.required' => 'El teléfono es obligatorio',
        ];
    }
}