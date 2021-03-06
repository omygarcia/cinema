<?php

namespace Cinema\Http\Controllers;

use Illuminate\Http\Request;
use Cinema\Http\Requests;
use Cinema\Http\Requests\GeneroCreateRequest;
use Illuminate\Support\Facades\Session;
use Cinema\Http\Controllers\Controller;
use Cinema\Genre;

class GeneroController extends Controller
{
	public function __construct()
	{
		$this->middleware("auth");
	}


    public function lista()
    {
        $generos = Genre::all();
        return response()->json($generos->toArray());
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Session::flush();
        return view("genero.index",["titulo"=>"index"]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("genero.create",["titulo"=>"crear"]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GeneroCreateRequest $request)
    {
        Session::put("intentos","las sessiones en database son un exito!");
        if($request->ajax())
        {
            Genre::create([
                "genre"=>$request->genero,
                ]);
        	return response()->json([
        		"respuesta"=>"Creado correctamente"
        		]);
        }
        return "no ajax";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
