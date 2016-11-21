@extends("layouts.admin")
@section("content")
	<h3>Crear genero</h3>
	{!! Form::open() !!}
		@include("genero.form.genero")
		{!! link_to("#",$title = "Registrar",$attributes=["id"=>"registro","class"=>"btn btn-turquesa transition"],$secure=null) !!}
	{!! Form::close() !!}
	<div id="bar-loader"><img src="{{url("images/ajax-loader-bar.gif")}}" /></div>
	<div id="mensaje" class="alert alert-success"></div>
@stop