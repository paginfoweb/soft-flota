<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class LocalRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return True;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre'    => 'min:5|max:150|required|unique:locales',
            'direccion' => 'min:5|max:150|required',
            'telefono'  => 'min:6|max:150|required',
            'contacto'  => 'min:5|max:150|required',      
        ];
    }
}
