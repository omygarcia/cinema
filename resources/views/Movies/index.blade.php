@extends("layouts/admin")
@section("content")
	<div class="movies">
		<table class="table">
			<thead>
				<tr> 
					<th>Pelicula</th>
					<th>Operaciones</th>
				</tr>
			</thead>
			<tbody>
				@if(count($movies)>0)
					@foreach($movies as $movie)
						<tr>
							<td>{{ $movie->name }}</td>
							<td> 
								<input type="input" value="Editar" class="btn btn-primary" />
								<input type="input" value="Eliminar" class="btn btn-danger" />
							</td>
						</tr>
					@endforeach
				@else
					<div class="alert alert-info">No se encontraron regostros</div>
				@endif
			</tbody>
		</table>
	</div>
@endsection