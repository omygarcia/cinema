<?php

namespace Cinema\Http\Controllers;

use Illuminate\Http\Request;
use Cinema\Http\Requests;
use Cinema\Http\Controllers\Controller;
use \PDF;
use Cinema\User;

class PdfControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$users = User::all();
        $users = User::whereBetween("updated_at",["2016-10-17","2016-10-20"])->get();
        $pdf = PDF::loadView("pdf.reporte",["users"=>$users]);
        return $pdf->stream("archivo");
    }

}
