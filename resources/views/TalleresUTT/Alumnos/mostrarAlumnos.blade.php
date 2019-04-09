@extends('TalleresUTT.Complements.plugins')
<link rel="stylesheet" type="text/css" href="css/TalleresUTT/eventos.css">
@section('titulo', 'Eventos')

@section('contenido')
<script type="text/javascript" src="js/alumno.js"></script>
@extends('TalleresUTT.Login.navbar')

<center><input name="buscador" id="buscadoralumno" class="form-control" type="search" placeholder="Buscador!" aria-label="Search" style="width: 50%; margin-top: 2%; text-align: center;"></center>

@extends('TalleresUTT.Alumnos.actualizarAlumnos')
<br>
<br>
@if( count($alumnos)>0)
<div class="container-fluid">
    <table class="table table-responsive" style="margin-left:9%;">
        <thead>
            <tr>
                <th>Usuario</th>
                <th>Alumno</th>
                <th>Horas De Servicio Social</th>
                <th>Fecha de Ingreso (dd,mm,aaaa)</th>
                <th>Actualizar</th>
            </tr>
        </thead>
        <tbody id="tbody" style="text-align:center;">
            @foreach($alumnos as $alumno)
            <tr>
                <td>{{$alumno->usuario}}</td>
                <td>{{$alumno->alumno}}</td>
                <td>
                @if( $alumno->horas_servicio_social == null)
                    0
                @else
                    {{$alumno->horas_servicio_social}}
                @endif
                </td>
                <td>{{ Carbon\Carbon::parse($alumno->created_at)->format('d-m-Y') }}</td>
                {{ csrf_field() }}
                <td><button data-id="{{$alumno->id_usuario}}" data-usuario="{{$alumno->usuario}}" data-alumno="{{$alumno->alumno}}" data-horas="{{$alumno->horas_servicio_social}}" data-toggle='modal' data-target='#modalActualizarAlumno' class="btn btn-warning"><img id="update" src="{{ asset('img/update.png') }}" alt=""></button></td>
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