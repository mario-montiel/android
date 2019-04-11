@extends('TalleresUTT.Complements.plugins')
<link rel="stylesheet" type="text/css" href="css/TalleresUTT/eventos.css">
@section('titulo', 'Eventos')

@section('contenido')
<script type="text/javascript" src="js/eventos.js"></script>
@extends('TalleresUTT.Login.navbar')

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