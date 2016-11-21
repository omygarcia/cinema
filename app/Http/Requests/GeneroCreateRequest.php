<?php

namespace Cinema\Http\Requests;

use Cinema\Http\Requests\Request;

class GeneroCreateRequest extends Request
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
            "genero"=>"required|unique:tb_genres,genre"
        ];
    }

    public function messages()
    {
    	return [
    		"genero.required"=>"El campo genero es requerido",
    		"genero.unique"=>"El genero ya esta registrado"
    	];
    }
}
