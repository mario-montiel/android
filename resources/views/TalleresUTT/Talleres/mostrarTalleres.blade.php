@extends('TalleresUTT.Complements.plugins')

@section('titulo', 'Mostrar Talleres')

@section('contenido')
<style type="text/css">
	body{
		
	}
	#contenedor{
		position: absolute;
	}
	.table{
		
	}
</style>

<div id="contenedor" class="container-fluid table-hover">
	<table class="table table-responsive table-bordered">
		<head>
			<th>Nombre de Taller</th>
			<th>Encargado</th>
			<th>Tipo de Taller</th>
			<th>Descripción</th>
			<th>Horarios</th>
			<th>Actualizar</th>
			<th>Eliminar</th>
		</head>
		@foreach($talleres as $taller)
		<tbody>
			<td> {{$taller->nombre}} </td>
			<td> {{$taller->encargado}} </td>
			<td> {{$taller->tipo}} </td>
			<td> {{$taller->descripcion}} </td>
			<td> {{$taller->horarios}} </td>
			<td> <a href="{{ url('editartaller', $taller->id_taller) }}"><button type="
				" class="btn btn-primary"> Actualizar</button></a> </td>
			<td> <a href="{{ url('eliminartaller', $taller->id_taller) }}"><button type="button" class="btn btn-primary"> Eliminar</button></a> </td>
		</tbody>
		@endforeach
	</table>
</div>
@endsection