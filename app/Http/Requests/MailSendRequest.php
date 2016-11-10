<?php

namespace Cinema\Http\Requests;

use Cinema\Http\Requests\Request;

class MailSendRequest extends Request
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
            "name" => "required",
            "mail" => "required|email",
            'g-recaptcha-response' => 'required|recaptcha',
            "mensaje" => "required"
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "El campo nombre es requerido",
            "mail.required" => "El campo correo es requerido",
            "mail.email" => "El correo no es valido",
            "g-recaptcha-response.required"=>"El campo recaptcha es requerido",
            "g-recaptcha-response.recaptcha"=>"El campo recaptcha no es correcto",
            "mensaje.required"=>"El campo mensaje es requerido" 
        ];
    }
}
