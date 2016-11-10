<?php

namespace Cinema\Http\Controllers;

use Illuminate\Http\Request;
use Cinema\Http\Requests;
use Cinema\Http\Requests\MailSendRequest;
use Cinema\Http\Controllers\Controller;
use Mail;
use Illuminate\Support\Facades\Session;

class MailController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MailSendRequest $request)
    {
        Mail::send("mails.contact", $request->all(), function($msj){
        	$msj->subject("Correo de Contacto");
        	$msj->to("mendosaj872@gmail.com");
        });
        Session::flash("mensaje","Mensaje enviado correctamente");
        return redirect("/contacto.html");
    }


}
