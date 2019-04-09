@extends('TalleresUTT.Complements.plugins')
<link rel="stylesheet" type="text/css" href="css/TalleresUTT/mostrartalleres.css">
@section('titulo', 'Mostrar Talleres')

@section('contenido')

<script type="text/javascript" src="js/imagenes.js"></script>

@extends('TalleresUTT.Login.navbar')

@if(Session::has('taller'))
    <p class="alert alert-primary">!!Taller Registrado con Éxito!!</p>
@endif
@if(Session::has('actualizacion'))
    <p class="alert alert-primary">!!Taller Actualizado con Éxito!!</p>
@endif
@if(Session::has('eliminacion'))
    <p class="alert alert-primary">!!Taller Eliminado con Éxito!!</p>
@endif

<center><input name="buscador" id="buscador" class="form-control" type="search" placeholder="Buscador!" aria-label="Search" style="width: 50%; margin-top: 2%; text-align: center;"></center>

<button id="btnadd" class="btn btn-primary" href="#" data-toggle="modal" data-target="#modalRegistroTalleres">Agregar Taller<img id="add" src="{{ asset('img/add.png') }}"> 
</button>

@extends('TalleresUTT.Talleres.registroTalleres')

@extends('TalleresUTT.Talleres.actualizarTaller')

@extends('TalleresUTT.Talleres.eliminarTalleres')

<br>
<br>

@if( count($numtalleres)>0)
<div id="container" class="container-fluid">
		<table id="table" class="table table-responsive table-hover">
		<thead>
			<tr>
			<th>Nombre de Taller</th>
			<th>Encargado</th>
			<th>Tipo de Taller</th>
			<th>Descripción</th>
			<th>Horarios</th>
			<th>Actualizar</th>
			<th>Eliminar</th>
			</tr>
		</thead>
		<tbody id="mostrardatos">
				@foreach($taller as $t)
				<tr data-id="{{ $t->id_taller }}" data-nombre="{{ $t->nombre}}" data-encargado="{{ $t->encargado}}" data-tipo="{{ $t->tipo }}" data-descripcion="{{ $t->descripcion}}" data-horarios="{{ $t->horarios}}">
					<td > {{$t->nombre}} </td>
					<td> {{$t->encargado}} </td>
					<td> {{$t->tipo}} </td>
					<td> {{$t->descripcion}} </td>
					<td> {{$t->horarios}} </td>
					<td> 
						 <form id="form-actualizar" action="{{ url('editartaller',$t->id_taller)}}" method="post">
			             	{{ csrf_field() }}
			             	<input id="idActualizar" type="hidden" name="id_taller" value="">
								<a id="btnupdate" data-toggle='modal' data-nombre="{{$t->nombre}}" data-encargado="{{$t->encargado}}" 
								data-tipo="{{$t->tipo}}" data-descripcion="{{$t->descripcion}}" data-horarios="{{$t->horarios}}" data-id="{{$t->id_taller}}" data-target='#modalActualizarTalleres' class='btn btn-warning'>
								<img id="update" src="{{ asset('img/update.png') }}">
							</a></td></form>
						<form id="form-eliminar" action="{{ url('eliminartaller',$t->id_taller)}}" method="post">
							<td> <button data-eliminar='{{$t->id_taller}}' class="btn btn-danger btn-eliminar" data-toggle='modal' data-target='#eliminarModal'>
							<img id="delete" src="{{ asset('img/delete.png') }}"></button> </td>
						</form>
				</tr>
			
			@endforeach
			
		</tbody>
	</table>
	</div>
</div>	

<div style="position: absolute; left:42%;">{{$taller->render()}}</div>

@else
<div class="container"><center><br><label class="alert alert-primary"> No hay ningún Taller registrado </label></h1></center></div>
@endif


<script type="text/javascript">

	$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
	});
	$('#buscador').on('keyup',function(){
			$value = $('#buscador').val();
			
			$.ajax({
				type: 'GET',
				url:  '/search',
				data: {'search':$value},
				success:function(data){
					if(data.no != ""){
						$('#mostrardatos').html("");
						$.each(data, function(i, item) {
								
								changos = "<tr><td>" +
									item.nombre+ "</td><td>" +
									item.encargado + "</td><td>" +
									item.tipo + "</td><td>" +
									item.descripcion + "</td><td>" +
									item.horarios + "</td><td>"  +
									"<a data-id="+item.id_taller+" data-nombre="+item.nombre+" data-encargado="+item.encargado+" data-tipo="+item.tipo+" data-descripcion="+item.descripcion+" data-horarios="+item.horarios+" data-toggle='modal' data-target='#modalActualizarTalleres' class='btn btn-warning'><img id='update' src='{{ asset('img/update.png') }}''></a>" + 
									"</td><td>" +
									"<a class='btn btn-danger' href='/eliminartaller/"+item.id_taller+"'><img id='delete' src='{{ asset('img/delete.png') }}'></a>";
								$('#mostrardatos').append(changos);
						});
					}
				},
			     error: function () {
			         alert("Error del Servidor");
			     }
			});
	});


</script>
@endsection


