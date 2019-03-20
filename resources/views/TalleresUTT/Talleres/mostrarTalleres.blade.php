@extends('TalleresUTT.Complements.plugins')

@section('titulo', 'Mostrar Talleres')

@section('contenido')
<style type="text/css">
	body{
		
	}
	#contenedor{
		
		position: absolute;
	}
	.table:hover{
		
	}
	#tituloNavBar{
			position: absolute;
			left: 44%;
	}
	#tituloNavBar:hover{
			color: #A1BFB7;
	}
	#imgiluminati{
			height: 50px;
	}
	#navbar{
			color: white;
	}
	#nel{
		display: none;
	}
</style>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<img id="imgiluminati" src="{{ asset('img/iluminati.png') }}">
  <a class="navbar-brand" href="#" id="tituloNavBar"> Talleres UTT</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li>
    </ul>
      <input name="buscador" id="buscador" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
  </div>
</nav>

	

<p id="nel" class="alert alert-primary"></p>


<br>
<br>


<div id="container" class="container-fluid">
		<table class="table table-responsive table-bordered" id="table">
		<head>
			<th>Nombre de Taller</th>
			<th>Encargado</th>
			<th>Tipo de Taller</th>
			<th>Descripción</th>
			<th>Horarios</th>
			<th>Actuaslizar</th>
			<th>Eliminar</th>
		</head>
		<tbody id="mostrardatos">

		</tbody>
	</table>
	</div>
</div>	

<script type="text/javascript">
	
		$('#buscador').on('keyup',function(){
			//$('#resultado').html('');
			/*var campobucador = $('#buscador').val();
			var LeL = new RegExp(campobucador, 'i');*/
			$value = $('#buscador').val();
			
			$.ajax({
				type: 'GET',
				url:  '/search',
				data: {'search':$value},
				success:function(data){
					if(data.no != ""){
						/*$('#mostrardatos').each(function(data, e){
							console.log(e);
						});	*/
						$('#mostrardatos').html("");
						$.each(data, function(i, item) {
						    /*$('#mostrardatos').html(
						    	data[i].nombre);*/
						    	//console.log(item.nombre);
						    	/*for(indice = 0; indice < data.length; indice++){
						    		//	console.log(item[i].nombre);
								}*/
								
								console.log(item.id_taller);
								changos = "<tr><td>" +
									item.nombre+ "</td><td>" +
									item.encargado + "</td><td>" +
									item.tipo + "</td><td>" +
									item.descripcion + "</td><td>" +
									item.horarios + "</td><td>"  +
									"<a class='btn btn-primary' href='/editartaller/"+item.id_taller+"'>Actualizar</a>" +
									"</td>" +
									"<a class='btn btn-primary' href='/editartaller/"+item.id_taller+"'>Actualizar</a>" +
									"</td>";
								$('#mostrardatos').append(changos);

						});
						//$('#mostrardatos').html(data);
					}
					else if($value == ""){
						$.each(data, function(i, item) {
						var changoleon = "<tr><td>" +
									item.nombre+ "</td><td>" +
									item.encargado + "</td><td>" +
									item.tipo + "</td><td>" +
									item.descripcion + "</td><td>" +
									item.horarios + "</td><td>"  +
									"<a class='btn btn-primary' href='/editartaller/"+item.id_taller+"'>Actualizar</a>" +
									"</td>" +
									"<a class='btn btn-primary' href='/editartaller/"+item.id_taller+"'>Actualizar</a>" +
									"</td>";
								$('#mostrardatos').append(changos);
								});
					}
					
				},
			     error: function () {
			         alert("Nachus");
			     }
			});
	});
</script>
@endsection