@extends('TalleresUTT.Complements.plugins')
<link rel="stylesheet" type="text/css" href="css/TalleresUTT/mostrartalleres.css">
<link rel="stylesheet" type="text/css" href="css/TalleresUTT/navbar.css">
@section('titulo', 'Talleres')

@section('contenido')

<script type="text/javascript" src="js/imagenes.js"></script>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<img id="imgiluminati" src="{{ asset('img/iluminati.png') }}">
  <a href="/"><img id="back" src="{{ asset('img/back.png') }}"></a>
  <a class="navbar-brand" href="/" id="tituloNavBar" style="margin-top-10px;"> Talleres UTT</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto" style="margin-left:50px;">
      <li class="nav-item active">
        <a  class="nav-link" href="/mostraralumnos">Alumnos <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a  class="nav-link" href="/eventos">Eventos <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a  class="nav-link" href="/eventosasignados">Asignar Evento <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    @if(Session::has('usuario'))
    <button class="btn disabled" style="backgroud-color: transparent;"><span style="color: white; margin-left:36px;">Hola! {{ Session::get('usuario')->usuario }} </span></button>
       <a id="solicitudes" class="btn alert-danger" href="/logout"> Cerrar Sesión	<img id="logout" style="height: 18px; margin-top:-2px; padding-left: 5px;" 
       src="{{ asset('img/logout.png') }}"><span class="sr-only"></span></a>
       
		@endif
  </div>
</nav>

<div class="loader"><p id="exito" ></p></div>

@if(Session::has('taller'))
    <p id="exito" class="alert alert-success">!!Taller Registrado con Éxito!!</p>
@endif
@if(Session::has('actualizacion'))
    <p class="alert alert-success">{{Session::get('actualizacion')}}</p>
@endif
@if(Session::has('eliminacion'))
    <p id="eliminacion" class="alert alert-success">!!Taller Eliminado con Éxito!!</p>
@endif

<center><input name="buscador" id="buscador" class="form-control" type="search" placeholder="Buscador!" aria-label="Search" style="width: 50%; margin-top: 2%; text-align: center;"></center>


<center>
<button id="btnadd" class="btn btn-primary" href="#" data-toggle="modal" data-target="#modalRegistroTalleres">Agregar Taller<img id="add" src="{{ asset('img/add.png') }}"> 
</button>
</center>

@extends('TalleresUTT.Talleres.registroTalleres')

@extends('TalleresUTT.Talleres.actualizarTaller')

@extends('TalleresUTT.Talleres.eliminarTalleres')

<br>
<br>

@if( count($numtalleres)>0)

<div class="centrado">
<center>
		<table id="tablon" class="table table-responsive table-hover">
		<thead>
			<tr>
			<th>Nombre de Taller</th>
			<th>Descripción</th>
			<th>Horarios</th>
			<th>Tipo de Taller</th>
			<th>Encargado</th>
			<th>Actualizar</th>
			<th>Eliminar</th>
			</tr>
		</thead>
		<tbody id="mostrardatos">
				@foreach($taller as $t)
				<tr data-id="{{ $t->id_taller }}">
					<td > {{$t->taller}} </td>
					<td> {{$t->descripcion}} </td>
					<td> {{$t->horarios}} </td>
					<td> {{$t->tipo}} </td>
					<td> {{$t->nombre}} </td>
					<td> 
			             	{{ csrf_field() }}
								<a data-toggle='modal' data-id="{{$t->id_taller}}" data-nombre="{{$t->taller}}" data-encargado="{{$t->nombre}}" 
								data-tipo="{{$t->tipo}}" data-descripcion="{{$t->descripcion}}" data-horarios="{{$t->horarios}}"  data-target='#modalActualizarTalleres' class='btn btn-warning'>
								<img id="update" src="{{ asset('img/update.png') }}">
							</a></td>
						
							<td> <button data-id='{{$t->id_taller}}' class="btn btn-danger btn-eliminar" data-toggle='modal' data-target='#eliminarModal'>
							<img id="delete" src="{{ asset('img/delete.png') }}"></button> </td>
				</tr>
			
			@endforeach
			
		</tbody>
	</table>
</centrado>
	</div>


@else
<div class="container"><center><br><label class="alert alert-primary"> No hay ningún Taller registrado </label></h1></center></div>
@endif


<script type="text/javascript">

	$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
	});
	$('#buscador').on('keyup',function(e){
		e.preventDefault();
			$value = $('#buscador').val();
			
			$.ajax({
				type: 'GET',
				url:  '/search',
				data: {'search':$value},
				success:function(data){
					if(data.no != ""){
						$('#mostrardatos').html("");
						$.each(data, function(i, item) {
								
								changos = "<tr data-id="+item.id_taller+"><td>" +
									item.taller+ "</td><td>" +
									item.descripcion + "</td><td>" +
									item.horarios + "</td><td>" +
									item.tipo + "</td><td>" +
									item.nombre + "</td><td>"  + 
									"<button data-id="+item.id_taller+" data-nombre="+item.taller+" data-encargado="+item.nombre+" data-tipo="+item.tipo+" data-descripcion="+item.descripcion+" data-horarios="+item.horarios+" data-toggle='modal' data-target='#modalActualizarTalleres' class='btn btn-warning'><img id='update' src='{{ asset('img/update.png') }}''></button>" + 
									"</td><td>" +
									"<button data-id="+item.id_taller+" data-toggle='modal' data-target='#eliminarModal' class='btn btn-danger btn-eliminar'><img id='delete' src='{{ asset('img/delete.png') }}'></button>";
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



