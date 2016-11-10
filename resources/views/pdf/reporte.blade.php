<!DOCTYPE html>
	<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Reporte</title>
		<style>
			header
			{
				background: #036;
				border-radius: 0.25em;
				text-align:center;
			}

			h1
			{
				color: white;
			}

			table
			{
				width: 100%;
				text-align: center;
				border-collapse: collapse;
			}

			table th,table td
			{
				border: 1px solid #000
				padding:0.25em;
				width: 30%;
			}

			table tr:even-child
			{
				background: #ccc;
			}
		</style>
	</head>
	<body>
		<header>
			<h1>Reporte Mensual</h1>
		</header>
		<section>
		<br /><br />
			<table>
				<thead>
					<tr>
						<th>Id</th>
						<th>Nombre</th>
						<th>Correo</th>
					</tr>
				</thead>
				<tbody>
					@foreach($users as $user)
						<tr>
							<td>{{$user->id}}</td>
							<td>{{$user->name}}</td>
							<td>{{$user->email}}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			<img src="data:image/png;base64,{!! DNS2D::getBarcodePNG("http://www.portafoliooegg.esy.es/", "QRCODE")!!}" alt="barcode"   />
		</section>
	</body>
	</html>	