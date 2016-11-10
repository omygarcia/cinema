 @extends("layouts.admin")
 @section("content")
 	@if(count($errors) > 0)
 	<div class="alert-errors">
		<ul>
			@foreach($errors->all() as $error)
				<li>{!! $error !!}</li>
			@endforeach
		</ul>
		<button class="btn-alert-errors" onclick="ocultar();">x</button>
	</div>
	@endif
 	<h2>Actualizar Usuario</h2>
 	{!! Form::model($user, ['action' => ['UsuarioController@update', $user->id],"method"=>"PUT"])
 !!}
		{!! csrf_field() !!}
		@include("forms.usuario")
		{!! Form::submit("Actualizar",["class"=>"btn btn-turquesa transition"]) !!}
	{!! Form::close() !!}
 @stop