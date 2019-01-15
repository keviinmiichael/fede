<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckOutRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'payment_method' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'rname' => 'required',
            'rphone' => 'required',
            'raddress' => 'required',
            'number' => 'required',
            'subzone_id' => 'required',
            'rdate' => 'required',
            'rtime' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'payment_method.required' => 'Por favor, indicá el medio de pago',
            'name.required' => 'Por favor, completá tu nombre',
            'phone.required' => 'Por favor, completá tu teléfono',
            'email.required' => 'Por favor, completá tu email',
            'rname.required' => 'Por favor, completá el nombre del destinatario',
            'rphone.required' => 'Por favor, completá el teléfono del destinatario',
            'raddress.required' => 'Por favor, completá la calle del destinatario',
            'number.required' => 'Por favor, completá la altura de la direccion',
            'subzone_id.required' => 'Por favor, completá la zona para el envío',
            'rdate.required' => 'Por favor, completá la fecha para el envío',
            'rtime.required' => 'Por favor, completá la franja horaria para el envío',
        ];
    }
}
