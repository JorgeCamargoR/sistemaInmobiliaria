<?php

namespace sistemaPractica\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CiudadFormRequest extends FormRequest
{
    
  public function authorize()
    {
        return true;
    }

 
    public function rules()
    {
        return [

           
            'nombre' => 'required|max:200|unique:ciudad,nombre',
            
        ];
    }
}
