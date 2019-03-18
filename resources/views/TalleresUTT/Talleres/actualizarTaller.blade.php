@extends('TalleresUTT.Complements.plugins')

@section('titulo', 'Registro de Talleres')

@section('contenido')
	<style type="text/css">
		#fondo{
			background-color: #282B30;
			padding: 0;
		}
		#card{
			background-color: #282B30;
			margin: auto;
			width: 80%;
			color: white;
			border-radius: 15px;
			margin-bottom: 50px;
			transition: width 1s, height 1s, margin 1s, background-color 2s;
		}
		#card:hover{
			width: 85%;
			background-color: #41464D;
		}
		#titulo{
			margin-top: 2%;
			color: white;
			text-align: center;
		}
		#titulo:hover{
			color: #A1BFB7;
		}
		label{
			margin-left: 15px;
		}
		#input{
			margin: auto;
			width: 98%;
			background-color: #E9E9E9;
			border-radius: 30px;
			color: black;
			transition: width 1s, height 1s, margin 1s, background-color 2s;
		}
		#input:hover{
			width: 100%;
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
			left: 44%;
		}
		#tituloNavBar:hover{
			color: #A1BFB7;
		}
		li{
			display: none;
		}
		@media (max-width: 1600px){
			#boton1{
				left: 50%;	
			}
			#tituloNavBar{
			text-align: center;
			margin: 0;
			}
			li{
			display: none;
		}
		}
		@media (min-width: 1001px) and (max-width: 1499px){
			#boton1{
				left: 50%;	
			}
			#tituloNavBar{
			text-align: center;
			}
			li{
			display: visibility;
			}
			.img{
				height: 55px;
			}
		}
		@media (min-width: 601px) and (max-width: 1000px){
			#boton1{
				left: 10%;	
			}
			#card{
				background-color: #282B30;
				margin: auto;
				width: 80%;
				color: white;
				border-radius: 15px;
				margin-bottom: 50px;
				transition: width 1s, height 1s, margin 1s, background-color 2s;
	    		margin: 3% auto 0;
			}
			#card:hover{
				width: 90%;
			}
			.img{
				height: 55px;
			}
			.radio{
				margin-left: 55px;
			}
			#tituloNavBar{
				margin: auto;
				left: 40%;
			}
			li{
				display: inline;
			}
			li:hover{
				background-color: #484452;
			}
		}
		@media (max-width: 600px)
		{
			#boton1{
				width: 100px;
				left: 0%;	
			}
			#boton2{
				width: 100%;
				left: 0%;	
			}
			#card{
				background-color: #282B30;
				margin: auto;
				width: 80%;
				color: white;
				border-radius: 15px;
				margin-bottom: 50px;
				transition: width 1s, height 1s, margin 1s, background-color 2s;
			}
			#card:hover{
				width: 90%;
			}
			.img{
				height: 55px;
				margin-left: 35px;
			}
			.radio{
				margin-left: 48px;
			}
			#tituloNavBar{
				margin: auto;
				left: 34%;
			}
			li:hover{
				background-color: #484452;
			}
			li{
				display: inline;
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

<div class="container-fluid">

	<h1 id="titulo">Registrar Nuevo Taller</h1>
	
    <div id="card" class="card">
        <div class="card-body">

        	@if(Session::has('actualizacion'))
                <p class="alert alert-primary">Alumno registrado</p>
            @endif

            @if ($errors->any())
		        <ul style="color: white; margin-top: 25px; margin: auto;">
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
			@endif

             <form action="{{ url('editartaller', $taller->id_taller) }}" method="post">
                {{ csrf_field() }}
                {{ method_field('PUT')}}
                
                <div class="form-group">
				    <label for="exampleFormControlInput1"> Nombre del Taller </label>
				    <input type="text" class="form-control" id="input" name="nombre" value=" {{$taller->nombre}} ">
				  </div>
				  <div class="form-group">
				    <label for="exampleFormControlSelect2"> Encargado </label>
				   <input type="text" class="form-control" id="input" name="encargado" value=" {{$taller->encargado}} "> 
				  </div>
				  <div class="form-group">
				    <label for="exampleFormControlSelect1"> Tipo de taller </label>
				     <select name="tipo" class="form-control" id="input">
				     	<option>Seleccione el tipo de taller</option>
				    	@foreach($tipos_taller as $tp)
				    		<option value="{{ $tp->id_tipotaller }}" {{ old('tipo') == $tp->id_tipotaller ? 'selected' : '' }}>{{ $tp->tipo }}</option>
				    	@endforeach
				    </select>
				  </div>
				  <div class="form-group">
				    <label for="exampleFormControlSelect2"> Descripción </label>
				   <textarea id="input" class="form-control" id="exampleFormControlTextarea1" rows="3" name="descripcion" value=" {{$taller->descripcion}} "></textarea>
				  </div>
				  <div class="form-group">
				    <label for="exampleFormControlTextarea1"> Horarios del taller</label>
				    <input type="text" class="form-control" id="input" name="horarios" value=" {{$taller->horarios}} ">
				  </div>
                  <div class="form-group">
				    <label for="exampleFormControlTextarea1"> Elegir icono del taller </label>
				    
				 <div class="row" id="selectores">
				    <div class="col"> <img class="img" name="img1" id="img1" src="{{ asset('img/talleresUTT/saxophone.png') }}">
				    	<div><input id="saxophone" type="radio" class="radio" name="radio" value="saxophone"></div>
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
				<div class="row">
				     	<div class="col-6">
				     		<a href="{{ url('registroTalleres') }}"><button id="boton1" type="button" class="btn"> Cancelar </button></a>
				     	</div>
				     	<div class="col-6">
				     		<button id="boton2" type="submit" class="btn"> Registrar </button>
				     	</div>
				     </div>
            </form>
            
        </div>
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

		 

	});
    
 
 </script>
  
@endsection