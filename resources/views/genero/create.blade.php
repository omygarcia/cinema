@extends("layouts.admin")
@section("content")
	@include("alerts.alert-success")
	@include("alerts.alert-error")
	<div id="bar-loader"><img src="{{url("images/ajax-loader-bar.gif")}}" /></div>
	<h3>Crear genero</h3>
	{!! Form::open() !!}
		@include("genero.form.genero")
		{!! link_to("#",$title = "Registrar",$attributes=["id"=>"registro","class"=>"btn btn-turquesa transition"],$secure=null) !!}
	{!! Form::close() !!}
	{{ Session::get("intentos") }}
@endsection