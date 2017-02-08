@extends("layouts.admin")
@section("content")
	@if(count($errors) > 0)
	<div class="alert alert-danger">
		<ul>
			@foreach($errors->all() as $error)
				<li>{!! $error !!}</li>
			@endforeach
		</ul>
		<a href="#" class="close" data-dismiss="alert">&times;</a>
	</div>
	@endif
	<h2>Crear Usuario</h2>
	{!! Form::open(["route"=>"usuario.store","method"=>"POST"]) !!}
		{!! csrf_field() !!}
		@include("forms.usuario")
		{!! Form::submit("Registro",["class"=>"btn btn-turquesa transition"]) !!}
	</form>
	{!! Form::close() !!}
@stop