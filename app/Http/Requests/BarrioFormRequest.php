<?php

namespace sistemaPractica\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BarrioFormRequest extends FormRequest
{
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

           
            'nombre' => 'required|max:100|unique:barrio,nombre',
            'idciudad' => 'required',
            
        ];
    }


}
