<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Routing\Route;

class LocalUpdateRequest extends Request
{
    public function __construct(Route $route)
    {
        $this -> route = $route;
    }
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
            'nombre'    => 'min:5|max:150|required|unique:locales,nombre,'.$this->route->getParameter('talleres'),
            'direccion' => 'min:5|max:150|required',
            'telefono'  => 'min:6|max:150|required',
            'contacto'  => 'min:5|max:150|required', 
        ];
    }
}
