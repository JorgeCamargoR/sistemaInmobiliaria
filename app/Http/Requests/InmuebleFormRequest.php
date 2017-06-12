<?php

namespace sistemaPractica\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InmuebleFormRequest extends FormRequest
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

            'idcategoria' => 'required',
            'codigo' => 'required|max:50',
            'nombre' => 'required|max:100',
            'precio_venta'=>'required|numeric',
            'descripcion' => 'max:512',
            'idbarrio' => 'required',
            'idciudad' => 'required',
            'imagenPrincipal' => 'mimes:jpeg,bmp,png',
            'imagen1' => 'mimes:jpeg,bmp,png',
            'imagen2' => 'mimes:jpeg,bmp,png',
            'imagen3' => 'mimes:jpeg,bmp,png',
            'imagen4' => 'mimes:jpeg,bmp,png',
        ];
    }
}
