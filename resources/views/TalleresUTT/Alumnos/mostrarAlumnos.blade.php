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

<div class="form-group">
    <label for="">Filtro por Taller</label>
	<select name="filtro" class="form-control" id="select">
		<option>Elija el taller</option>
			@foreach($talleres as $t)
				<option value="{{ $t->id_taller }}" {{ old('select') == $t->id_taller ? 'selected' : '' }}>{{ $t->taller }}</option>
			@endforeach
	</select>
</div>

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
                
            </tr>
        </thead>
        <tbody id="tbody" style="text-align:center;">
            
            <tr>
                
            </tr>
           
        </tbody>
    </table>
</center>
</div>









<section id="tabs" class="project-tab">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <nav>
                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Project Tab 1</a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Project Tab 2</a>
                                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Project Tab 3</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <table class="table" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Project Name</th>
                                            <th>Employer</th>
                                            <th>Awards</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><a href="#">Work 1</a></td>
                                            <td>Doe</td>
                                            <td>john@example.com</td>
                                        </tr>
                                        <tr>
                                            <td><a href="#">Work 2</a></td>
                                            <td>Moe</td>
                                            <td>mary@example.com</td>
                                        </tr>
                                        <tr>
                                            <td><a href="#">Work 3</a></td>
                                            <td>Dooley</td>
                                            <td>july@example.com</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <table class="table" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Project Name</th>
                                            <th>Employer</th>
                                            <th>Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><a href="#">Work 1</a></td>
                                            <td>Doe</td>
                                            <td>john@example.com</td>
                                        </tr>
                                        <tr>
                                            <td><a href="#">Work 2</a></td>
                                            <td>Moe</td>
                                            <td>mary@example.com</td>
                                        </tr>
                                        <tr>
                                            <td><a href="#">Work 3</a></td>
                                            <td>Dooley</td>
                                            <td>july@example.com</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                <table class="table" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Contest Name</th>
                                            <th>Date</th>
                                            <th>Award Position</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><a href="#">Work 1</a></td>
                                            <td>Doe</td>
                                            <td>john@example.com</td>
                                        </tr>
                                        <tr>
                                            <td><a href="#">Work 2</a></td>
                                            <td>Moe</td>
                                            <td>mary@example.com</td>
                                        </tr>
                                        <tr>
                                            <td><a href="#">Work 3</a></td>
                                            <td>Dooley</td>
                                            <td>july@example.com</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
















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
    
    var select = document.getElementById("select");

	select.addEventListener("change", function(event) {
       
            
                $.ajax({
				type: 'GET',
				url:  '/buscatesta',
				data: {'buscatesta':select},
				success:function(data){
                        $('#tbody').html("");
                        $.each(data, function(i, item) {
								changos = "<tr><td>" +
									item.nombre + "</td><td>" +
								$('#tbody').append(changos);
                        });
				},
			     error: function () {
			         alert("Error del Servidor");
			     }
			}); 
            
        
    });

</script>

@endsection