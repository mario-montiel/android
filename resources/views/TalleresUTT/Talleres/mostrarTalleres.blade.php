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
	#card{
		background-color: #B7B6C5;
		color: #000;
			margin: auto;
			width: 80%;
			border-radius: 15px;
			margin-bottom: 50px;
			transition: width 1s, height 1s, margin 1s, background-color 2s;
		}
	#card:hover{
		background-color: #9896AA;
		color: #000;
	}
	.img{
			height: 55px;
			margin-left: 10px;
			border-radius: 5px;
			padding: 8px;
			transition: width 1s, height 1s, margin 1s, background-color 2s;
		}
		.img:hover{
			height: 60px;
			background-color: #A1BFB7;
		}
		.radio{
			margin-left: 30px;
		}
		#radio:hover{
			background-color: #A1BFB7;
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
      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#modalRegistroTalleres">Agregar Nuevo Taller</a>
      </li>
      
     
    </ul>
      <input name="buscador" id="buscador" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
  </div>
</nav>

@if(Session::has('taller'))
    <p class="alert alert-primary">!!Taller Registrado con Éxito!!</p>
@endif

<button class="btn btn-primary nav-link" href="#" data-toggle="modal" data-target="#modalRegistroTalleres">Agregar Nuevo Taller
</button>

<!-- Modal Registro Talleres -->
<div class="modal fade" id="modalRegistroTalleres" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
    <div class="modal-content" style="">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Registrar Taller</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         

	<div class="container-fluid">
	
    <div id="card" class="card">
        <div class="card-body">

            @if ($errors->any())
		        <ul style="color: white; margin-top: 25px; margin: auto;">
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
			@endif

             <form action="{{ url('talleres')}}" method="post">
                {{ csrf_field() }}
                
                <div class="form-group">
				    <label for="exampleFormControlInput1"> Nombre del Taller </label>
				    <input id="nombre" type="text" class="form-control" id="input" name="nombre" value="">
				  </div>
				  <div class="form-group">
				    <label for="exampleFormControlSelect2"> Encargado </label>
				   <input type="text" class="form-control" id="input" name="encargado" value=""> 
				  </div>
				  <div class="form-group">
				    <label for="exampleFormControlSelect1"> Tipo de taller </label>
				     <select name="tipo" class="form-control" id="select">
				     	<option>Seleccione el tipo de taller</option>
				    	@foreach($tipos_taller as $tp)
				    		<option value="{{ $tp->id_tipotaller }}" {{ old('tipo') == $tp->id_tipotaller ? 'selected' : '' }}>{{ $tp->tipo }}</option>
				    	@endforeach
				    </select>
				  </div>
				  <div class="form-group">
				    <label for="exampleFormControlSelect2"> Descripción </label>
				   <textarea id="input" class="form-control" id="exampleFormControlTextarea1" rows="3" name="descripcion" value=""></textarea>
				  </div>
				  <div class="form-group">
				    <label for="exampleFormControlTextarea1"> Horarios del taller</label>
				    <input type="text" class="form-control" id="input" name="horarios" value="">
				  </div>
                  <div class="form-group">
				    <label for="exampleFormControlTextarea1"> Elegir icono del taller </label>
				    
				 <div class="row" id="selectores">
				    <div class="col"> <img class="img" name="img1" id="img1" src="{{ asset('img/talleresUTT/saxophone.png') }}">
				    	<div><input checked="" id="saxophone" type="radio" class="radio" name="radio" value="saxophone"></div>
				     </div> 
				    	
				    <div class="col"> <img class="img" id="img2" src="{{ asset('img/talleresUTT/guitarelectric.png') }}"> 
				    	<div><input id="guitarelectric" type="radio" class="radio" name="radio" value="guitarelectric"></div>
				    </div>

				     <div class="col"> <img class="img" id="img3" src="{{ asset('img/talleresUTT/guitaracoustic.png') }}">
				    	<div><input id="guitaracoustic" type="radio" class="radio" name="radio" value="guitaracoustic"></div>
				     </div> 

				      <div class="col"> <img class="img" id="img4" src="{{ asset('img/talleresUTT/soccer.png') }}">
				    	<div><input id="soccer" type="radio" class="radio" name="radio" value="soccer"></div>
				     </div> 

				     <div class="col"> <img class="img" id="img5" src="{{ asset('img/talleresUTT/runfast.png') }}">
				    	<div><input id="runfast" type="radio" class="radio" name="radio" value="runfast"></div>
				     </div> 

				     <div class="col"> <img class="img" id="img6" src="{{ asset('img/talleresUTT/dramamasks.png') }}">
				    	<div><input id="dramamasks" type="radio" class="radio" name="radio" value="dramamasks"></div>
				     </div> 

				     <div class="col"> <img class="img" id="img7" src="{{ asset('img/talleresUTT/speaker.png') }}">
				    	<div><input id="speaker" type="radio" class="radio" name="radio" value="speaker"></div>
				     </div> 

				     <div class="col"> <img class="img" id="img8" src="{{ asset('img/talleresUTT/chessrook.png') }}">
				    	<div><input id="chessrook" type="radio" class="radio" name="radio" value="chessrook"></div>
				     </div>
				<div class="w-100"></div>
					<div class="col"> <img class="img" id="img9" src="{{ asset('img/talleresUTT/baseball.png') }}">
				    	<div><input id="baseball" type="radio" class="radio" name="radio" value="baseball"></div>
				     </div> 

				     <div class="col"> <img class="img" id="img10" src="{{ asset('img/talleresUTT/basketball.png') }}">
				    	<div><input id="basketball" type="radio" class="radio" name="radio" value="basketball"></div>
				     </div> 

				     <div class="col"> <img class="img" id="img11" src="{{ asset('img/talleresUTT/volleyball.png') }}">
				    	<div><input id="volleyball" type="radio" class="radio" name="radio" value="volleyball"></div>
				     </div> 

				     <div class="col"> <img class="img" id="img12" src="{{ asset('img/talleresUTT/football.png') }}">
				    	<div><input id="football" type="radio" class="radio" name="radio" value="football"></div>
				     </div> 

				     <div class="col"> <img class="img" id="img13" src="{{ asset('img/talleresUTT/bookopenvariant.png') }}">
				    	<div><input id="bookopenvariant" type="radio" class="radio" name="radio" value="bookopenvariant"></div>
				     </div> 

				     <div class="col"> <img class="img" id="img14" src="{{ asset('img/talleresUTT/gamepadvariant.png') }}">
				    	<div><input id="gamepadvariant" type="radio" class="radio" name="radio" value="gamepadvariant"></div>
				     </div> 

				     <div class="col"> <img class="img" id="img15" src="{{ asset('img/talleresUTT/karate.png') }}">
				    	<div><input id="karate" type="radio" class="radio" name="radio" value="karate"></div>
				     </div>

				     <div class="col"> <img class="img" id="img16" src="{{ asset('img/talleresUTT/soccerfield.png') }}">
				    	<div ><input id="soccerfield" type="radio" class="radio" name="radio" value="soccerfield"></div>
				     </div> 
				</div>
        </div>
    </div>
</div>
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button id="btnsubmit" type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
    </form>
  </div>
</div>






<!-- Modal Actualizar Taller-->
<div class="modal fade" id="modalActualizarTalleres" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Actualizar Taller</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       


<div class="container-fluid">
	
    <div id="card" class="card">
        <div class="card-body">

            @if ($errors->any())
		        <ul style="color: white; margin-top: 25px; margin: auto;">
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
			@endif
			@foreach($taller as $t)
             <form action="{{ url('editartaller',$t->id_taller)}}" method="post">
             	{{ csrf_field() }}
             	{{  method_field('PUT') }}
             	@endforeach
                
                
                <div class="form-group">
				    <label for="exampleFormControlInput1"> Nombre del Taller </label>
				    <input id="nombreActualizar" type="text" class="form-control" id="input" name="nombre" value="">
				  </div>
				  <div class="form-group">
				    <label for="exampleFormControlSelect2"> Encargado </label>
				   <input type="text" class="form-control" id="encargadoActualizar" name="encargado" value=" "> 
				  </div>
				  <div class="form-group">
				    <label for="exampleFormControlSelect1"> Tipo de taller </label>
				     <select name="tipo" class="form-control" id="tipoActualizar">
				     	<option>Seleccione el tipo de taller</option>
				    	@foreach($tipos_taller as $tp)
				    		<option value="{{ $tp->id_tipotaller }}" {{ old('tipo') == $tp->id_tipotaller ? 'selected' : '' }}>{{ $tp->tipo }}</option>
				    	@endforeach
				    </select>
				  </div>
				  <div class="form-group">
				    <label for="exampleFormControlSelect2"> Descripción </label>
				   <textarea id="input" class="form-control" id="descripcionActualizar" rows="3" name="descripcion" value=""></textarea>
				  </div>
				  <div class="form-group">
				    <label for="exampleFormControlTextarea1"> Horarios del taller</label>
				    <input type="text" class="form-control" id="horariosActualizar" name="horarios" value="">
				  </div>
                  <div class="form-group">
				    <label for="exampleFormControlTextarea1"> Elegir icono del taller </label>
				    
				 <div class="row" id="selectores">
				    <div class="col"> <img class="img" name="img1" id="img1" src="{{ asset('img/talleresUTT/saxophone.png') }}">
				    	<div><input checked="" id="saxophone" type="radio" class="radio" name="radio" value="saxophone"></div>
				     </div> 
				    	
				    <div class="col"> <img class="img" id="img2" src="{{ asset('img/talleresUTT/guitarelectric.png') }}"> 
				    	<div><input id="guitarelectric" type="radio" class="radio" name="radio" value="guitarelectric"></div>
				    </div>

				     <div class="col"> <img class="img" id="img3" src="{{ asset('img/talleresUTT/guitaracoustic.png') }}">
				    	<div><input id="guitaracoustic" type="radio" class="radio" name="radio" value="guitaracoustic"></div>
				     </div> 

				      <div class="col"> <img class="img" id="img4" src="{{ asset('img/talleresUTT/soccer.png') }}">
				    	<div><input id="soccer" type="radio" class="radio" name="radio" value="soccer"></div>
				     </div> 

				     <div class="col"> <img class="img" id="img5" src="{{ asset('img/talleresUTT/runfast.png') }}">
				    	<div><input id="runfast" type="radio" class="radio" name="radio" value="runfast"></div>
				     </div> 

				     <div class="col"> <img class="img" id="img6" src="{{ asset('img/talleresUTT/dramamasks.png') }}">
				    	<div><input id="dramamasks" type="radio" class="radio" name="radio" value="dramamasks"></div>
				     </div> 

				     <div class="col"> <img class="img" id="img7" src="{{ asset('img/talleresUTT/speaker.png') }}">
				    	<div><input id="speaker" type="radio" class="radio" name="radio" value="speaker"></div>
				     </div> 

				     <div class="col"> <img class="img" id="img8" src="{{ asset('img/talleresUTT/chessrook.png') }}">
				    	<div><input id="chessrook" type="radio" class="radio" name="radio" value="chessrook"></div>
				     </div>
				<div class="w-100"></div>
					<div class="col"> <img class="img" id="img9" src="{{ asset('img/talleresUTT/baseball.png') }}">
				    	<div><input id="baseball" type="radio" class="radio" name="radio" value="baseball"></div>
				     </div> 

				     <div class="col"> <img class="img" id="img10" src="{{ asset('img/talleresUTT/basketball.png') }}">
				    	<div><input id="basketball" type="radio" class="radio" name="radio" value="basketball"></div>
				     </div> 

				     <div class="col"> <img class="img" id="img11" src="{{ asset('img/talleresUTT/volleyball.png') }}">
				    	<div><input id="volleyball" type="radio" class="radio" name="radio" value="volleyball"></div>
				     </div> 

				     <div class="col"> <img class="img" id="img12" src="{{ asset('img/talleresUTT/football.png') }}">
				    	<div><input id="football" type="radio" class="radio" name="radio" value="football"></div>
				     </div> 

				     <div class="col"> <img class="img" id="img13" src="{{ asset('img/talleresUTT/bookopenvariant.png') }}">
				    	<div><input id="bookopenvariant" type="radio" class="radio" name="radio" value="bookopenvariant"></div>
				     </div> 

				     <div class="col"> <img class="img" id="img14" src="{{ asset('img/talleresUTT/gamepadvariant.png') }}">
				    	<div><input id="gamepadvariant" type="radio" class="radio" name="radio" value="gamepadvariant"></div>
				     </div> 

				     <div class="col"> <img class="img" id="img15" src="{{ asset('img/talleresUTT/karate.png') }}">
				    	<div><input id="karate" type="radio" class="radio" name="radio" value="karate"></div>
				     </div>

				     <div class="col"> <img class="img" id="img16" src="{{ asset('img/talleresUTT/soccerfield.png') }}">
				    	<div ><input id="soccerfield" type="radio" class="radio" name="radio" value="soccerfield"></div>
				     </div> 
				</div>
        </div>
    </div>
</div>
</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
	</form>
  </div>
</div>

	

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
			<th>Actualizar</th>
			<th>Eliminar</th>
		</head>
		<tbody id="mostrardatos">
			@foreach($taller as $t)
			<tr>
				<td> {{$t->nombre}} </td>
				<td> {{$t->encargado}} </td>
				<td> {{$t->tipo}} </td>
				<td> {{$t->descripcion}} </td>
				<td> {{$t->horarios}} </td>
				<td> <a data-toggle='modal' data-nombre="{{$t->nombre}}" data-encargado="{{$t->encargado}}" 
					data-tipo="{{$t->tipo}}" data-descripcion="{{$t->descripcion}}" data-horarios="{{$t->horarios}}"
					data-target='#modalActualizarTalleres' class='btn btn-primary' href='/editartaller/{{$t->id_taller}}'>Actualizar</a></td>
				<td> {{$t->horarios}} </td>
			</tr>
			@endforeach
		</tbody>
	</table>
	</div>
</div>	

<script type="text/javascript">

	setTimeout(function() {
		        $("p").fadeOut(1500);
		    },3000);
		$('#buscador').on('keyup',function(){
			$value = $('#buscador').val();
			
			$.ajax({
				type: 'GET',
				url:  '/search',
				data: {'search':$value},
				success:function(data){
					if(data.no != ""){
						$('#mostrardatos').html("");
						$.each(data, function(i, item) {
								
								changos = "<tr><td>" +
									item.nombre+ "</td><td>" +
									item.encargado + "</td><td>" +
									item.tipo + "</td><td>" +
									item.descripcion + "</td><td>" +
									item.horarios + "</td><td>"  +
									"<a data-nombre="+item.nombre+" data-encargado="+item.encargado+" data-tipo="+item.tipo+" data-descripcion="+item.descripcion+" data-horarios="+item.horarios+" data-toggle='modal' data-target='#modalActualizarTalleres' class='btn btn-primary' href='/editartaller/"+item.id_taller+"'>Actualizar</a>" +
									"</td>" +
									"<a class='btn btn-primary' href='/editartaller/"+item.id_taller+"'>Actualizar</a>" +
									"</td><td>" +
									"<a class='btn btn-primary' href='/eliminartaller/"+item.id_taller+"'>Eliminar</a>";
								$('#mostrardatos').append(changos);

						});
						//$('#mostrardatos').html(data);
					}
					
				},
			     error: function () {
			         alert("Nachus");
			     }
			});
	});


	jQuery(document).ready(function($) {
		$(".img").click(function(){
 			$('.radio').removeProp('checked');
 		});

	    $("#img1").click(function(){

			 if($('#saxophone').is('checked') == false){
			  	$('input:radio[value="saxophone"]').prop('checked', true);
			  }
		});

		$("#img2").click(function(){

			 if($('#guitarelectric').is('checked') == false){
			  	$('input:radio[value="guitarelectric"]').prop('checked', true);
			  }
		});

		$("#img3").click(function(){

			 if($('#guitaracoustic').is('checked') == false){
			  	$('input:radio[value="guitaracoustic"]').prop('checked', true);
			  }
		});

		$("#img4").click(function(){

			 if($('#soccer').is('checked') == false){
			  	$('input:radio[value="soccer"]').prop('checked', true);
			  }
		});

		$("#img5").click(function(){

			 if($('#runfast').is('checked') == false){
			  	$('input:radio[value="runfast"]').prop('checked', true);
			  }
		});

		$("#img6").click(function(){

			 if($('#dramamasks').is('checked') == false){
			  	$('input:radio[value="dramamasks"]').prop('checked', true);
			  }
		});

		$("#img7").click(function(){

			 if($('#speaker').is('checked') == false){
			  	$('input:radio[value="speaker"]').prop('checked', true);
			  }
		});

		$("#img8").click(function(){

			 if($('#chessrook').is('checked') == false){
			  	$('input:radio[value="chessrook"]').prop('checked', true);
			  }
		});

		$("#img9").click(function(){

			 if($('#baseball').is('checked') == false){
			  	$('input:radio[value="baseball"]').prop('checked', true);
			  }
		});

		$("#img10").click(function(){

			 if($('#basketball').is('checked') == false){
			  	$('input:radio[value="basketball"]').prop('checked', true);
			  }
		});

		$("#img11").click(function(){

			 if($('#volleyball').is('checked') == false){
			  	$('input:radio[value="volleyball"]').prop('checked', true);
			  }
		});

		$("#img12").click(function(){

			 if($('#football').is('checked') == false){
			  	$('input:radio[value="football"]').prop('checked', true);
			  }
		});

		$("#img13").click(function(){

			 if($('#bookopenvariant').is('checked') == false){
			  	$('input:radio[value="bookopenvariant"]').prop('checked', true);
			  }
		});

		$("#img14").click(function(){
			 if($('#gamepadvariant').is('checked') == false){
			  	$('input:radio[value="gamepadvariant"]').prop('checked', true);
			  }
		});

		$("#img15").click(function(){

			 if($('#karate').is('checked') == false){
			  	$('input:radio[value="karate"]').prop('checked', true);
			  }
		});


		$("#img16").click(function(){

			 if($('#soccerfield').is('checked') == false){
			  	$('input:radio[value="soccerfield"]').prop('checked', true);
			  }
		});

		//VALIDACIONES
		console.log($('.radio').val());
		  


     	    $('#modalRegistroTalleres').on('show.bs.modal', function (event) {
			  var button = $(event.relatedTarget) // Button that triggered the modal
			  var recipient = button.data('whatever')

			  $('button[type="submit"]').attr('disabled','disabled');

     	  $('input[type="text"]').keypress(function(){

            if ($( $('input[type="text"]')).val() != '' && $( $('textarea')).val() != '' 
            	&& $("option:selected").val() != "Seleccione el tipo de taller" && $('input[type="radio"]:checked')){

	            	if($("option:selected").val() == "Seleccione el tipo de taller"){
	            		alert("Seleccione un tipo de taller");
	            	}

            	$('button[type="submit"]').removeAttr('disabled');
               $('button[type="submit"]').attr('enable','enable');

            }
    	 });


			  var modal = $(this)
			  
			  modal.find('.modal-body input').val(recipient)
			})


     	  $('#modalActualizarTalleres').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  var nombre = button.data('nombre') 
		  var encargado = button.data('encargado')
		  var tipo = button.data('tipo')
		  var descripcion = button.data('descripcion')
		  var horarios = button.data('horarios')

		  var modal = $(this)
		  //modal.find('.modal-title').text('New message to ' + recipient)
		  modal.find('.modal-body #nombreActualizar').val(nombre)
		  modal.find('.modal-body #encargadoActualizar').val(encargado)
		  modal.find('.modal-body #tipoActualizar').val(tipo)
		  modal.find('.modal-body #descripcionActualizar').val(descripcion)
		  modal.find('.modal-body #horariosActualizar').val(horarios)

            /*if($( $('input[type="submit"]')).val() != ''){
               $('input[type="submit"]').removeAttr('disabled');
               $('button[type="submit"]').attr('enable','enable');
            }*/
            
            
		})
			
		

	});
</script>
@endsection