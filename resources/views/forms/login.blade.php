<div class="form-login">
@if(Session::has("mensaje"))
	<div id="mensaje-success" class="alert alert-success">
		{{ Session::get("mensaje") }}
		<button class="btn-alert-success" onclick="ocultar();">x</button>
	</div>
@endif
@if(count($errors) > 0)
	<div class="alert alert-danger">
		<ul>
			@foreach($errors->all() as $error)
				<li>{!! $error !!}</li>
			@endforeach
		</ul>
		<button class="btn-alert-errors" onclick="ocultar();">x</button>
	</div>
@endif
<legend>Inicia Sesión</legend>
<form action="{!!url("login")!!}"" method="post">
	{!! csrf_field() !!}
	<label>E-Mail:</label><br />
	<input type="text" name="email" placeholder="Introduce tu email" class="form-control" /><br/ >
	<label>Password:</label><br />
	<input type="password" name="password" placeholder="Introduce tu password" class="form-control" /><br />
	recordarme&nbsp;<input type="checkbox" name="remenber" />
	<input type="submit" value="Ingresar" class="btn btn-warning btn-block" /><br />
	<a href="#" class="link-login">registro</a><br />
	<a href="#" class="link-login">Olvide mi password</a><br />
	Otras opcciones para iniciar sesión:<br />
	<a href="{{ url("social/facebook") }}" class="btn btn-primary btn-block">Inicia sesión con facebook</a><br />
	<a href="{{ url('social/google') }}" class="btn btn-danger btn-block">Inicia sesión con google</a>
</form>
</div>