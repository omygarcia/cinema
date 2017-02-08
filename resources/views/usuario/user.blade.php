<table class="tabla-admin table">
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