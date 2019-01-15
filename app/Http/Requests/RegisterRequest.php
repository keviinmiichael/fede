<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $this->session()->flash('register', 'true');
        return  [
            'name' => 'required',
            'email' => 'required|unique:clients|email',
            'phone' => 'required',
            'password' => 'required|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Por favor completá tu nombre',
            'email.required' => 'Por favor completa tu email',
            'email.unique' => 'Email ya registrado',
            'email.email' => 'Por favor completá tu email con un formato valido',
            'password.required' => 'Por favor, completá tu contraseña',
            'password.confirmed' => 'Las contraseñas deben coincidir',
        ];
    }
}
