<?php

namespace Cinema\Http\Controllers;

use Illuminate\Http\Request;
use Cinema\Http\Requests;
use Cinema\Http\Requests\UserCreateRequest;
use Cinema\Http\Requests\UserUpdateRequest;
use Cinema\Http\Controllers\Controller;
use Cinema\User;
use Illuminate\Support\Facades\Session;
use Auth;
use Validator;

class UsuarioController extends Controller
{
    protected $redirectPath = '/usuario';
    protected $loginPath = '/';



    public function postLogin(Request $request)
    {
        /*echo $request->email." ".sha1($request->password);
        exit();*/
        if(Auth::attempt([
                "email"=>$request->email,
                "password"=>sha1($request->password)
                //"active" => 1,
            ]/*,$request->has("remenber")*/))
        {
            return redirect()->intended($hits->redirectPath);
        }
        else
        {
            $rules = [
                "email"=>"required|email",
                "password"=>"required",
            ];

            $messages = [
                "email.required" => "El campo email es requerido",
                "email.email" => "El campo email no es correcto",
                "password" => "El campo password es requerido",
            ];

            $validator = Validator::make($request->all(),$rules,$messages);

            return redirect("/")->withErrors($validator)
            ->withInput()
            ->with("mensaje","Error al iniciar sesion");
        }

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$users = User::onlyTrashed()->paginate(3); //muestra los usuarios eliminados
        $users = User::paginate(3);
        return view("usuario.index",compact("users"),["titulo"=>"index"]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("usuario.create",["titulo"=>"crear"]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {
        User::create([
            "name" => $request["name"],
            "email" => $request["email"],
            "password" => $request["password"],
        ]);
        return redirect("/usuario")->with("mensaje","El usuario se registro con exito!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view("usuario.show",["user"=>$user,"titulo"=>"mostrar"]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view("usuario.edit",["user"=>$user,"titulo"=>"editar"]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        $user = User::find($id);
        $user->name = $request["name"];
        $user->email = $request["email"];
        $user->password = $request["password"];
        $user->save();
        Session::flash("mensaje","El usuario con el id: ".$user->id." se actualizo con exito!");
        return redirect("/usuario");
        /*redirect("/usuario")->with("mensaje","El usuario con el id: <b>".$user->id."</b> se actualizo con exito!");*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //User::destroy($id); //elimina el usuario
        $user = User::find($id);
        $user->delete(); //pone una marca de eliminacion , solo lo oculta
        Session::flash("mensaje","El usuario con el id: ".$id." se elimino correctamente");
        return redirect("/usuario");
    }
}
