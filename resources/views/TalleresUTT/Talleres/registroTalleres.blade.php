<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<title> Registro de Talleres </title>
	<style type="text/css">
		#fondo{
			background-color: #282B30;
			padding: 0;
		}
		#contenedor{
			
		}
		#contenedor:hover{
			background-color: #303136;
		}
		#card{
			background-color: #282B30;
			margin: auto;
			margin-top: 2%;
			width: 60%;
			color: white;
			border-radius: 15px;
			margin-bottom: 50px;
		}
		#card:hover{
			background-color: #303136;
		}
		#titulo{
			margin-top: 2%;
			color: white;
			text-align: center;
		}
		#titulo:hover{
			color: #A1BFB7;
		}
		#input{
			background-color: #E9E9E9;
			border-radius: 30px;
			color: black;
		}
		#input:hover{
			background-color: #A1BFB7;
			color: white;
		}
		.col{
			margin-top: 10px;
		}
		.img{
			height: 55px;
			background-color: #38393D;
			border-radius: 5px;
			padding: 8px;
		}
		.img:hover{
			background-color: #A1BFB7;
		}
		#radio{
			margin-left: 20px;
		}
		#radio:hover{
			background-color: #A1BFB7;
		}
		#boton1{
			width: 150px;
			background-color: #AA0000;
			color: white;
			position: relative;
			left: 60%;
			border-radius: 10px;
		}
		#boton2{
			width: 150px;
			color: white;
			background-color: #187A00;
			border-radius: 10px;
		}
		#imgiluminati{
			height: 50px;
		}
		#navbar{
			color: white;
		}
		#tituloNavBar{
			position: absolute;
			left: 45%;
		}
		#tituloNavBar:hover{
			color: #A1BFB7;
		}
		#regresar{	
			left: 90%;
		}
		@media (max-width: 1500px){
			#boton1{
				left: 50%;	
			}
		}
		@media (min-width: 1001px) and (max-width: 1499px){
			#boton1{
				left: 50%;	
			}
		}
		@media (min-width: 601px) and (max-width: 1000px){
			#boton1{
				left: 10%;	
			}
		}
		@media (min-width: 208px) and (max-width: 600px)
		{
			#boton1{
				width: 100px;
				left: 0%;	
			}
			#boton2{
				width: 100%;
				left: 0%;	
			}
		}
	</style>
</head>
<body id="fondo">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<img id="imgiluminati" src="{{ asset('img/iluminati.png') }}">
  <a class="navbar-brand" href="#" id="tituloNavBar"> Talleres UTT</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#" id="regresar"> Regresar <span class="sr-only">(current)</span></a>
      </li>
    </ul>
  </div>
</nav>


	<h1 id="titulo">Registrar Nuevo Taller</h1>
	
    <div id="card" class="card">
        <div class="card-body">

            @if ($errors->any())
		        <ul style="color: white; margin-top: 25px; margin: auto;">
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
			@endif

            <form action="{{ url('talleres') }}" method="post">
                {{ csrf_field() }}
                
                <div class="form-group">
				    <label for="exampleFormControlInput1"> Nombre del Taller </label>
				    <input type="text" class="form-control" id="input" name="nombre">
				  </div>
				  <div class="form-group">
				    <label for="exampleFormControlSelect2"> Encargado </label>
				   <input type="text" class="form-control" id="input" name="encargado">
				  </div>
				  <div class="form-group">
				    <label for="exampleFormControlSelect1"> Tipo de taller </label>
				     <select name="tipo" class="form-control" id="input">
				     	<option>Seleccione el tipo de taller</option>
				    	@foreach($tipos_taller as $tp)
				    		<option value="{{ $tp->id_tipotaller }}">{{ $tp->tipo }}</option>
				    	@endforeach
				    </select>
				  </div>
				  <div class="form-group">
				    <label for="exampleFormControlSelect2"> Descripción </label>
				   <textarea id="input" class="form-control" id="exampleFormControlTextarea1" rows="3" name="descripcion"></textarea>
				  </div>
				  <div class="form-group">
				    <label for="exampleFormControlTextarea1"> Horarios del taller</label>
				    <input type="text" class="form-control" id="input" name="horarios">
				  </div>
                  <div class="form-group">
				    <label for="exampleFormControlTextarea1"> Elegir icono del taller </label>
				    
				 <div class="row" id="selectores">
				    <div class="col"> <img class="img" name="img1" id="img1" src="{{ asset('img/talleresUTT/saxophone.png') }}">
				    	<div><input id="saxophone" type="radio" class="radio" name="radio" value="saxophone"></div>
				     </div> 
				    	
				    <div class="col"> <img class="img" id="img2" src="{{ asset('img/talleresUTT/guitarelectric.png') }}"> 
				    	<div><input id="guitarelectric" type="radio" class="radio" name="radio" value="guitar-electric"></div>
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
				    	<div><input id="bookopenvariant" type="radio" class="radio" name="radiot" value="bookopenvariant"></div>
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
				<div class="row">
				     	<div class="col-6">
				     		<a href="{{ url('registroTalleres') }}"><button id="boton1" type="button" class="btn"> Cancelar </button></a>
				     	</div>
				     	<div class="col-6">
				     		<button id="boton2" type="submit" class="btn"> Registrar </button>
				     	</div>
				     </div>
            </form>
            
            @if(Session::has('message'))
                <p class="alert alert-primary">Alumno registrado</p>
            @endif
        </div>
    </div>


 <script>
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

			 if($('#guitar-electric').is('checked') == false){
			  	$('input:radio[value="guitar-electric"]').prop('checked', true);
			  }
		});

		$("#img3").click(function(){

			 if($('#guitar-acoustic').is('checked') == false){
			  	$('input:radio[value="guitar-acoustic"]').prop('checked', true);
			  }
		});

		$("#img4").click(function(){

			 if($('#soccer').is('checked') == false){
			  	$('input:radio[value="soccer"]').prop('checked', true);
			  }
		});

		$("#img5").click(function(){

			 if($('#run-fast').is('checked') == false){
			  	$('input:radio[value="run-fast"]').prop('checked', true);
			  }
		});

		$("#img6").click(function(){

			 if($('#drama-masks').is('checked') == false){
			  	$('input:radio[value="drama-masks"]').prop('checked', true);
			  }
		});

		$("#img7").click(function(){

			 if($('#speaker').is('checked') == false){
			  	$('input:radio[value="speaker"]').prop('checked', true);
			  }
		});

		$("#img8").click(function(){

			 if($('#chess-rook').is('checked') == false){
			  	$('input:radio[value="chess-rook"]').prop('checked', true);
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

			 if($('#book-open-variant').is('checked') == false){
			  	$('input:radio[value="book-open-variant"]').prop('checked', true);
			  }
		});

		$("#img14").click(function(){
			 if($('#gamepad-variant').is('checked') == undefined || $('#gamepad-variant').is('checked') == false){
			  	$('input:radio[value="gamepad-variant"]').prop('checked', true);
			  }
		});

		$("#img15").click(function(){

			 if($('#karate').is('checked') == false){
			  	$('input:radio[value="karate"]').prop('checked', true);
			  }
		});


		$("#img16").click(function(){

			 if($('#soccer-field-electric').is('checked') == false){
			  	$('input:radio[value="soccer-field"]').prop('checked', true);
			  }
		});

		 

	});
    
 
 </script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type="js/bootstrap.min.js"></script>
<script src=""></script>

</div>
  
</body>
</html>