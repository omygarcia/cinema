@extends("layouts.admin")
<?php $mensaje = Session::get("mensaje"); ?>
@if(Session::has("mensaje"))
	<div class="alert-success">
		{{ Session::get("mensaje") }}
		<button class="btn-alert-success" onclick="ocultar();">x</button>
	</div>
@endif
@section("content")
	<table class="tabla-admin">
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Correo</th>
				<th>Operaciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach($users as $user)
			<tr>
				<td>{!! $user->name !!}</td>
				<td>{!! $user->email !!}</td>
				<td>
					<a href="{{url("usuario/".$user->id."/edit")}}" class="btn btn-azul">Editar</a>
					{!! Form::open(["route" => ["usuario.destroy",$user->id],"method" => "DELETE"]) !!}
						{!! Form::submit("Eliminar",["class"=>"btn btn-rojo"]) !!}
					{!! Form::close() !!}
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
		{!! $users->render() !!} <!-- paginación -->
		<!--<input type="color" />-->
		<!--{!! DNS2D::getBarcodeHTML("www.cinema.com.mx","QRCODE") !!}-->
		<!--<img src="data:image/png;base64,{!! DNS2D::getBarcodePNG("http://www.portafoliooegg.esy.es/", "QRCODE")!!}" alt="barcode"   />-->
		<!--<img src="data:image/png;base64,{!! DNS1D::getBarcodePNG("http://www.portafoliooegg.esy.es/", "C128")!!}" alt="barcode"   />-->

@stop