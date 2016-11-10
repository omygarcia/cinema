<?php

namespace Cinema\Http\Requests;

use Cinema\Http\Requests\Request;

class UserCreateRequest extends Request
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
            "name" => "required|max:50", 
            "email" => "required|email|unique:users",
            "password" => "required|min:3",
        ];
    }
}
