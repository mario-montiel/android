@extends('TalleresUTT.Complements.plugins')
<link rel="stylesheet" type="text/css" href="css/TalleresUTT/eventos.css">
<link rel="stylesheet" type="text/css" href="css/TalleresUTT/navbar.css">
@section('titulo', 'Eventos Asignados')

@section('contenido')
<script type="text/javascript" src="js/asignarevento.js"></script>
<style type="text/css">
	 .img1 {
             width:100%;
           
             
             background-position:center
     
}

</style>

<nav class="navbar navbar-expand-lg navbar-light bg-light img1" style="background-image: url(img/navbarofi8.png)">
	<img id="imgiluminati" src="{{ asset('img/iluminati.png') }}">
  <a href="/"><img id="back" src="{{ asset('img/back.png') }}"></a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto" style="margin-left:50px;">
      <li class="nav-item active">
        <a style="color:#FFFFFF" class="nav-link" href="/mostrartalleres">Talleres <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a style="color:#FFFFFF" class="nav-link" href="/mostraralumnos">Alumnos <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a style="color:#FFFFFF" class="nav-link" href="/eventos">Eventos <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    @if(Session::has('usuario'))
    <button class="btn disabled" style="backgroud-color: transparent;"><span style="color: white; margin-left:36px;">Hola! {{ Session::get('usuario')->usuario }} </span></button>
       <a id="solicitudes" class="btn alert-danger" href="/logout"> Cerrar Sesión	<img id="logout" style="height: 18px; margin-top:-2px; padding-left: 5px;" 
       src="{{ asset('img/logout.png') }}"><span class="sr-only"></span></a>
       
		@endif
  </div>
</nav>

<center><input name="buscadorasignado" id="buscadorasignado" class="form-control" type="search" placeholder="Buscador!" aria-label="Search" style="width: 50%; margin-top: 2%; text-align: center;"></center>

@extends('TalleresUTT.EventosAsignados.asignareventos')

@extends('TalleresUTT.EventosAsignados.actualizarasignacion')

@extends('TalleresUTT.EventosAsignados.eliminarasignaciones')

<div id="botones" class="container">
    <center>
        <div class="col-12"><button id="btnadd" class="btn btn-primary" data-toggle="modal" data-target="#modalAsignarEventos">Agregar Evento <img id="add" src="{{ asset('img/add.png') }}"></button></div>
    </center>
</div>

<br>
<br>

@if( count($ta_has_ev)>0)
<div class="centrado">
<center>
    <table id="tablon" class="table table-responsive">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Taller</th>
                <th>Evento</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ta_has_ev as $the)
            <tr>
                <td>{{$the->nombre}}</td>
                <td>{{$the->taller}}</td>
                <td>{{$the->evento}}</td>
                {{ csrf_field() }}
                <td><button data-idevento='{{$the->eventos_id_evento}}' data-idtaller="{{$the->tallleres_id_taller}}" data-nombre="{{$the->nombre}}" data-evento="{{$the->evento}}" data-taller="{{$the->taller}}" data-toggle='modal' data-target='#modalEliminarEventosAsignados' class="btn btn-danger btn-eliminar" data-toggle='modal' data-target='#modalEliminarEventos'><img id="delete" src="{{ asset('img/delete.png') }}" alt=""></button></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </center>
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
	$('#buscadorasignado').on('keyup',function(e){
		e.preventDefault();
            $value = $('#buscadorasignado').val();
			$.ajax({
                type: 'GET',
                url:  '/buscadorasignado',
                data: {'buscadorasignado':$value},
                success:function(data){
                    $('tbody').html("");
                    $.each(data, function(i, item) {
                                          
                        changos = "<tr data-idevento="+item.eventos_id_evento+" data-idtaller="+item.tallleres_id_taller+"><td>" +
                        item.nombre+ "</td><td>" +
                        item.taller + "</td><td>" +
                        item.evento + "</td><td>" +
                        "<button data-idevento="+item.eventos_id_evento+" data-idtaller="+item.tallleres_id_taller+" data-nombre="+item.nombre+" data-evento="+item.evento+" data-taller="+item.taller+" data-toggle='modal' data-target='#modalEliminarEventosAsignados' class='btn btn-danger btn-eliminar'><img id='delete' src='img/delete.png'></button>";
                        $('tbody').append(changos);
                    });
                },
			     error: function () {
			         alert("Error del Servidor");
			     }
			});
	});
</script>

@endsection