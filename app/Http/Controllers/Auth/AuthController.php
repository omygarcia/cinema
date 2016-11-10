<?php

namespace Cinema\Http\Controllers\Auth;

use Cinema\User;
use Validator;
use Cinema\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }


    public function postLogin(Request $request)
    {
        if(Auth::attempt([
                "mail" => $request->mail,
                "password" => $request->password,
                "active" => 1,
            ],$request->has("remenber")))
        {
            return redirect("/usuario");
        }
        else
        {
            $rules = [
                "mail"=>"required|email",
                "password"=>"required",
            ];

            $messages = [
                "mail.required" => "El campo email es requerido",
                "mail.email" => "Eñ campo email no es correcto",
                "password" => "El campo password es requerido",
            ];

            $validator = validator::make($request->all(),$rules,$messages);

            return redirect("/")->withErrors($validator)
            ->withInput()
            ->with("mensaje","Error al iniciar sesion");
        }

    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
