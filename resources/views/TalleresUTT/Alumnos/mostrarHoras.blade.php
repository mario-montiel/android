@extends('TalleresUTT.Complements.plugins')
<link rel="stylesheet" type="text/css" href="css/TalleresUTT/eventos.css">
<link rel="stylesheet" type="text/css" href="css/TalleresUTT/navbar.css">
@section('titulo', 'Horas')

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

<center><input name="buscador" id="buscarhoras" class="form-control" type="search" placeholder="Buscador!" aria-label="Search" style="width: 50%; margin-top: 2%; text-align: center;"></center>

<br>
<br>

<center>
    <div class="container">
        <div class="row">
            <div id="btn3" class="col btn-primary"><a id="a3" href="/mostraralumnos">Alumnos con Taller</a></div>
            <div id="btn1" class="col btn-info"><a id="a1" href="/mostrarprofesores">Profesores</a></div>
            <div id="btn3" class="col btn-success"><a id="a3" href="/mostrartodoslosalumnos">Todos los Alumnos</a></div>
            
        </div>
    </div>
</center>

<br>
<br>
@if( count($horasTallerX2)>0)
<div id="container" class="container">
    <table class="table" cellspacing="0">
        <thead>
            <tr>
                <th>Alumno</th>
                <th>Horas</th>
                </tr>
        </thead>
        <tbody id="horas">
        @foreach($horasTallerX2 as $ht)
            <tr>
                <td> {{$ht->nombre}} </td>
                <td>
                @if( $ht->horas_servicio_social == null)
                    No tiene horas
                @else
                    {{$ht->horas_servicio_social}}
                @endif
                </td>
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
	$('#buscarhoras').on('keyup',function(e){
        e.preventDefault();
        var horas;
            $value = $('#buscarhoras').val();
			$.ajax({
				type: 'GET',
				url:  '/buscarhoras',
				data: {'buscarhoras':$value},
				success:function(data){
                    console.log(data);
					if(data.no != ""){
                        $('#horas').html("");
                        $.each(data, function(i, item) {
                            if( item.horas_servicio_social == null){horas = 0;}
                            else{horas = item.horas_servicio_social;}
                                changos = "<tr><td>" +
									item.nombre + "</td><td>" +
                                    horas + "</td>";
                                $('#horas').append(changos);
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