@extends("layouts/admin")
@section("content")
	{!! Form::open() !!}
		{!! csrf_field() !!}
		{!! Form::label("usuario","Usuario:") !!}
		{!! Form::input("text","txt_usuario") !!}
	{!! Form::close()!!}
@stop