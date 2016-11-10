<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/','FrontController@index');
Route::get('index.html','FrontController@index');
Route::get('contacto.html','FrontController@contacto');
Route::get('reviews.html','FrontController@reviews');

//acciones
Route::get("index.html/{pelicula}","FrontController@buscar");
Route::get("store","FrontController@store");


//controlador usuarios
Route::resource("usuario","UsuarioController");

Route::resource("mail","MailController");

//controlador admin
Route::get("admin","AdminController@index");


//login
Route::post("login","UsuarioController@postLogin");
//social Login
Route::get("social/{provider?}","SocialController@getSocialAuth");
Route::get("social/callback/{provider?}","SocialController@getSocialAuthCallback");

//reportes
Route::get("informe","PdfControler@index");
/*
Route::get('controlador','EjemploController@index');
Route::get('name/{nombre}','EjemploController@nombre');

Route::resource("movie","MovieController");

Route::get('/prueba',function(){
	return "Hola desde route.php";
});

Route::get('nombre/{nombre}',function($nombre){
	return "mi nombre es: ".$nombre;
});

Route::get('edad/{edad}',function($edad){
	return "mi edad es: ".$edad;
});

Route::get('edad2/{edad?}',function($edad = "25"){
	return "mi edad es: ".$edad;
});


Route::get('/', function () {
    return view('welcome');
});
*/
