@extends('TalleresUTT.Complements.plugins')
<link rel="stylesheet" type="text/css" href="css/TalleresUTT/eventos.css">
<link rel="stylesheet" type="text/css" href="css/TalleresUTT/navbar.css">
@section('titulo', 'Alumnos')

@section('contenido')
<style type="text/css">
	 .img1 {
             width:100%;
           
             
             background-position:center
     
}

</style>
<script type="text/javascript" src="js/alumno.js"></script>

<nav class="navbar navbar-expand-lg navbar-light bg-light img1" style="background-image: url(img/navbarofi8.png)">
<a href="/"><img id="imgiluminati" src="{{ asset('img/iluminati.png') }}"></a>
  <a href="/"><img id="back" src="{{ asset('img/back.png') }}"></a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto" style="margin-left:50px;">
      <li class="nav-item active">
        <a style="color:#FFFFFF" class="nav-link" href="/mostrartalleres">Talleres<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a style="color:#FFFFFF"  class="nav-link" href="/eventos">Eventos <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a style="color:#FFFFFF" class="nav-link" href="/eventosasignados">Asignar Evento <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    @if(Session::has('usuario'))
    <button class="btn disabled" style="backgroud-color: transparent;"><span style="color: white; margin-left:36px;">Hola! {{ Session::get('usuario')->usuario }} </span></button>
       <a id="solicitudes" class="btn alert-danger" href="/logout"> Cerrar Sesión	<img id="logout" style="height: 18px; margin-top:-2px; padding-left: 5px;" 
       src="{{ asset('img/logout.png') }}"><span class="sr-only"></span></a>
       
		@endif
  </div>
</nav>
<br>
<br>
<center>
    <div class="container">
        <div class="row">
            <div id="btn1" class="col btn-primary"><a id="a1" href="/mostrarprofesores">Profesores</a></div>
            <div id="btn2" class="col btn-info"><a id="a2"href="/mostrarhoras">Total de Horas</a></div>
            <div id="btn3" class="col btn-success"><a id="a3" href="/mostrartodoslosalumnos">Todos los Alumnos</a></div>
        </div>
    </div>
</center>
<br>
<center><input name="buscador" id="buscadoralumno" class="form-control" type="search" placeholder="Buscador!" aria-label="Search" style="width: 50%; margin-top: 2%; text-align: center;"></center>
<br>
@extends('TalleresUTT.Alumnos.actualizarAlumnos')

@if( count($personas)>0)
<div class="centrado" style=" margin-left: auto;
    margin-right: auto;">
    <center>
    <table class="table table-responsive table-hover" style="display:block;
    margin: 0 auto;
    text-align: left;
    display: table-cell;">
        <thead>
            <tr>
                
            </tr>
        </thead>
        <tbody id="tbody" style="text-align:center;">
            
            <tr>
                
            </tr>
           
        </tbody>
    </table>
</center>
</div>
<div id="container" class="container">
    <table class="table" cellspacing="0">
        <thead>
            <tr>
                <th>Matrícula</th>
                <th>Nombre del Alumno</th>
                <th>Carrera</th>
                <th>Cuatrimestre</th>
                <th>Nombre del Taller</th>
                <th>Fecha de ingreso (aaa,mm,dd)</th>
                <th>Actualizar</th>
            </tr>
        </thead>
        <tbody id="alumnos">
        @foreach($alumnos as $alumno)
            <tr>
                <td>{{$alumno->matricula}}</td>
                <td>{{$alumno->nombre}}</td>
                <td>{{$alumno->carrera}}</td>
                <td>{{$alumno->cuatrimestre}}</td>
                <td>
                @if( $alumno->taller == null)
                    No tiene taller asignado
                @else
                    {{$alumno->taller}}
                @endif
                </td>
                <td>{{ Carbon\Carbon::parse($alumno->created_at)->format('Y-m-d') }}</td>
                <td><button data-idsolicitudes="{{$alumno->id_solicitudes}}" data-id='{{$alumno->id_persona}}' 
                                            data-matricula='{{$alumno->matricula}}' data-alumno="{{$alumno->nombre}}" 
                                            data-carrera="{{$alumno->carrera}}" data-cuatrimestre="{{$alumno->cuatrimestre}}"
                                            data-taller="{{$alumno->taller}}" data-horas="{{$alumno->horas_servicio_social}}" 
                                            data-toggle='modal' data-target='#modalActualizarAlumno' class="btn btn-warning">
                                            <img id="update" src="{{ asset('img/update.png') }}" alt=""></button></td>
            </tr>
                @endforeach
        </tbody>
    </table>
</div>	
@else
<div class="container"><center><br><label class="alert alert-primary"> No hay ningún Alumno registrado </label></h1></center></div>
@endif

<script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
	$('#buscadoralumno').on('keyup',function(e){
        e.preventDefault();
        var horas;
            $value = $('#buscadoralumno').val();
			$.ajax({
				type: 'GET',
				url:  '/buscadoralumno',
				data: {'buscadoralumno':$value},
				success:function(data){
                    
					if(data.no != ""){
                        $('#alumnos').html("");
                        $.each(data, function(i, item) {
                        if(item.tipos_personas_id_tipo_persona == 2){
                                    if( item.horas_servicio_social == null){horas = 0}
                                    else{
                                        horas = item.horas_servicio_social;
                                    }
                                    changos = "<tr><td>" +
                                        item.matricula + "</td><td>" +
                                        item.nombre + "</td><td>" +
                                        item.carrera + "</td><td>" +
                                        item.cuatrimestre + "</td><td>" +
                                        item.taller + "</td><td>" +
                                        horas + "</td><td>" +
                                        item.created_at + "</td><td>" +
                                        "<button data-id="+item.id_persona+" data-matricula="+item.matricula+" data-alumno="+item.nombre+" data-horas="+item.horas_servicio_social+" data-toggle='modal' data-target='#modalActualizarAlumno' class='btn btn-warning'><img id='update' src='{{ asset('img/update.png') }}''></button>" + 
                                        "</td>";
                                    $('#alumnos').append(changos);
                               
                        }
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