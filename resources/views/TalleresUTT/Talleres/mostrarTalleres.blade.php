<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<title> Login </title>
</head>
<body id="fondo">

<table class="table">
	<head>
		<th>Nombre de Taller</th>
		<th>Encargado</th>
		<th>Tipo de Taller</th>
		<th>Descripción</th>
		<th>Horarios</th>
		<th>Acciones</th>
	</head>
	@foreach($talleres as $taller)
	<tbody>
		<td> {{$taller->nombre}} </td>
		<td> {{$taller->encargado}} </td>
		<td> {{$tipos_taller->tipo}} </td>
		<td> {{$taller->descripcion}} </td>
		<td> {{$taller->horarios}} </td>
		<td> <a href="{{ url('editartaller', $taller->id_taller) }}"><button type="button" class="btn btn-primary"> Actualizar</button></a> </td>
	</tbody>
	@endforeach
</table>


</body>
</html>