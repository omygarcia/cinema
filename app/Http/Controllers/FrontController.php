<?php

namespace Cinema\Http\Controllers;

use Illuminate\Http\Request;
use Cinema\Http\Requests;
use Cinema\Http\Controllers\Controller;
use Cinema\Genre;
use Cinema\Movie;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
                    "titulo" => "index",
                );
        return view("index",$data);
    }

    public function contacto()
    {
        return view("contacto",["titulo" => "Contacto"]);
    }

    public function reviews()
    {
        return view("reviews",["titulo" => "Reviews"]);
    }

    public function buscar($pelicula)
    {
        $mensaje = "";
        if(isset($pelicula))
        {
            if($peliculas = Movie::where("name","=",$pelicula)->get())
                //return dd($peliculas);
                $mensaje = "<b>Pelicula:</b> ".$peliculas[0]->name;
            else
                $mensaje = "No se encontro la pelicula";
        }
        else
        {
            $mensaje = "parametro no valido";
        }
        
        //$peliculas = $peliculas->toArray();
        /*$m = Movie::leftjoin("tb_genre",function($join){
            $join->on("tb_movie.id_genre","=","tb_genre.id_genre");
        })->where("tb_movie","=",$id);*/
        return $mensaje;
    }

    public function store(Request $request)
    {
        $cad = "";
         $errors = $this->validate($request,[
                "txt_buscar" => "required|min:5"
            ]);
         if($errors)
         {
            $i=0;
            foreach ($errors as $error) {
                $i++;
                $cad.= $error." ".$i;
            }
         }
        return $request['txt_buscar'].$cad;
    }

}
