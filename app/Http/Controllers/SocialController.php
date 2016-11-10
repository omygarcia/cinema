<?php

namespace Cinema\Http\Controllers;

use Illuminate\Http\Request;
use Cinema\Http\Requests;
use Cinema\Http\Controllers\Controller;
use Socialite;

class SocialController extends Controller
{

    public function __construct()
    {
        $this->middleware("guest");
    }
    
    public function getSocialAuth($provider=null)
    {
        if(!config("services.$provider"))
        {
            abort("404");
        }

        return Socialite::driver($provider)->redirect();
    }

    public function getSocialAuthCallback($provider=null)
    {
        if($provider == "google" || $provider == "facebook")
        {
            if($user = Socialite::driver($provider)->stateless()->user())
            {
                dd($user);
            }
            else
            {
                return "algo anda mal";
            }
        }
        else
        {
            //Github
            if($user = Socialite::driver($provider)->user())
            {
                dd($user);
            }
            else
            {
                return "algo anda mal";
            }   
        }


    }
}
