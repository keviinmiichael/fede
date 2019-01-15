<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $this->session()->flash('login', 'true');
        return  [
            'email' => 'required|exists:clients|email',
            'password' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'El email es obligatorio',
            'email.exists' => 'Credenciales incorrectas',
            'email.email' => 'Formato de email incorrecto',
            'password.required' => 'La contraseña es requerida para logearse',
        ];
    }
}
