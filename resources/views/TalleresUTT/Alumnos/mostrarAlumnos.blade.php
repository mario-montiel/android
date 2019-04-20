@extends('TalleresUTT.Complements.plugins')
<link rel="stylesheet" type="text/css" href="css/TalleresUTT/eventos.css">
<link rel="stylesheet" type="text/css" href="css/TalleresUTT/navbar.css">
@section('titulo', 'Eventos')

@section('contenido')
<script type="text/javascript" src="js/alumno.js"></script>

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
        <a  class="nav-link" href="/mostrartalleres">Talleres<span class="sr-only">(current)</span></a>
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

<center><input name="buscador" id="buscadoralumno" class="form-control" type="search" placeholder="Buscador!" aria-label="Search" style="width: 50%; margin-top: 2%; text-align: center;"></center>

@extends('TalleresUTT.Alumnos.actualizarAlumnos')
<br>
<br>
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
                <th>Matrícula</th>
                <th>Usuario</th>
                <th>Alumno</th>
                <th>Horas De Servicio Social</th>
                <th>Fecha de Ingreso (dd,mm,aaaa)</th>
                <th>Última modificación</th>
                <th>Actualizar</th>
            </tr>
        </thead>
        <tbody id="tbody" style="text-align:center;">
            @foreach($alumnos as $alumno)
            <tr>
                <td>{{$alumno->matricula}}</td>
                <td>{{$alumno->nombre}}</td>
                <td>
                @if( $alumno->horas_servicio_social == null)
                    0
                @else
                    {{$alumno->horas_servicio_social}}
                @endif
                </td>
                <td>{{ Carbon\Carbon::parse($alumno->created_at)->format('d-m-Y') }}</td>
                <td>{{ Carbon\Carbon::parse($alumno->updated_at)->format('d-m-Y') }}</td>
                {{ csrf_field() }}
                <td><button data-id="{{$alumno->id_usuario}}" data-usuario="{{$alumno->usuario}}" data-toggle='modal' data-target='#modalActualizarAlumno' class="btn btn-warning"><img id="update" src="{{ asset('img/update.png') }}" alt=""></button></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</center>
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
            $value = $('#buscadoralumno').val();
			
			$.ajax({
				type: 'GET',
				url:  '/buscadoralumno',
				data: {'buscadoralumno':$value},
				success:function(data){
					if(data.no != ""){
                        $('#tbody').html("");
						$.each(data, function(i, item) {
								changos = "<tr data-id="+item.id_usuario+"><td>" +
									item.usuario + "</td><td>" +
									item.alumno + "</td><td>" +
									item.horas_servicio_social + "</td><td>" +
									item.created_at + "</td><td>" +
									"<button data-id="+item.id_usuario+" data-usuario="+item.usuario+" data-alumno="+item.alumno+" data-horas="+item.horas_servicio_social+" data-toggle='modal' data-target='#modalActualizarAlumno' class='btn btn-warning'><img id='update' src='{{ asset('img/update.png') }}''></button>" + 
									"</td>";
								$('#tbody').append(changos);
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