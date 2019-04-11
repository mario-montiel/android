@extends('TalleresUTT.Complements.plugins')
<link rel="stylesheet" type="text/css" href="css/TalleresUTT/eventos.css">
<link rel="stylesheet" type="text/css" href="css/TalleresUTT/navbar.css">
@section('titulo', 'Eventos')

@section('contenido')
<script type="text/javascript" src="js/eventos.js"></script>

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
        <a  class="nav-link" href="/mostrartalleres">Talleres <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a  class="nav-link" href="/mostraralumnos">Alumnos <span class="sr-only">(current)</span></a>
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

<center><input name="buscador" id="buscador" class="form-control" type="search" placeholder="Buscador!" aria-label="Search" style="width: 50%; margin-top: 2%; text-align: center;"></center>

@extends('TalleresUTT.Eventos.registroEvento')

@extends('TalleresUTT.Eventos.actualizarEvento')

@extends('TalleresUTT.Eventos.eliminarEvento')

@extends('TalleresUTT.Eventos.asignarEvento')

@extends('TalleresUTT.Eventos.verEventoAsignado')

<div id="botones" class="container">
    <div class="row">
        <div class="col"><button id="btnadd" class="btn btn-primary" data-toggle="modal" data-target="#modalRegistroEventos">Agregar Evento <img id="add" src="{{ asset('img/add.png') }}"></button></div>
        <div class="col"><button id="btnaddEvento" class="btn btn-success" data-toggle="modal" data-target="#modalAsignarEventos">Asignar Evento <img id="add" src="{{ asset('img/add.png') }}"></button></div>
        <div class="col"><button id="btnVer" class="btn btn-secondary" data-toggle="modal" data-target="#verEventoAsignado">Ver Eventos Asignados <img id="add" src="{{ asset('img/add.png') }}"></button></div>
    </div>
</div>

<br>
<br>
@if( count($event)>0)
<div class="container-fluid">
    <table class="table table-responsive">
        <thead>
            <tr>
                <th>Evento</th>
                <th>Información</th>
                <th>Fecha</th>
                <th>Actualizar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($event as $ev)
            <tr>
                <td>{{$ev->evento}}</td>
                <td>{{$ev->informacion}}</td>
                <td>{{$ev->fecha}}</td>
                {{ csrf_field() }}
                <td><button data-id="{{$ev->id_evento}}" data-evento="{{$ev->evento}}" data-informacion="{{$ev->informacion}}" data-fecha="{{$ev->fecha}}"  data-toggle='modal' data-target='#modalActualizarEventos' class="btn btn-warning"><img id="update" src="{{ asset('img/update.png') }}" alt=""></button></td>
                <td><button data-id='{{$ev->id_evento}}' class="btn btn-danger btn-eliminar" data-toggle='modal' data-target='#modalEliminarEventos'><img id="delete" src="{{ asset('img/delete.png') }}" alt=""></button></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@else
<div class="container"><center><br><label class="alert alert-primary"> No hay ningún Evento registrado </label></h1></center></div>
@endif

<script>
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
				url:  '/buscador',
				data: {'buscador':$value},
				success:function(data){
					if(data.no != ""){
						$('tbody').html("");
						$.each(data, function(i, item) {
								
								changos = "<tr data-id="+item.id_evento+"><td>" +
									item.evento+ "</td><td>" +
									item.informacion + "</td><td>" +
									item.fecha + "</td><td>" +
									"<button data-id="+item.id_evento+" data-evento="+item.evento+" data-informacion="+item.informacion+" data-fecha="+item.fecha+" data-toggle='modal' data-target='#modalActualizarEventos' class='btn btn-warning'><img id='update' src='{{ asset('img/update.png') }}''></button>" + 
									"</td><td>" +
									"<button data-id="+item.id_evento+" data-toggle='modal' data-target='#modalEliminarEventos' class='btn btn-danger btn-eliminar'><img id='delete' src='{{ asset('img/delete.png') }}'></button>";
								$('tbody').append(changos);
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