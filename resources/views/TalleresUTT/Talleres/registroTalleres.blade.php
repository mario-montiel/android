<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="css/rrssb.css"/>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="js/rrssb.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<title> Registro de Talleres </title>
	<style type="text/css">
		#fondo{
			background-color: #282B30;
			padding: 0;
		}
		#contenedor{
			margin-top: 3%;
			width: 90%;
			color: white;
			border-radius: 15px;
		}
		#contenedor:hover{
			background-color: #303136;
		}
		#card{
			background-color: #282B30;
			margin-bottom: 50px;
		}
		#card:hover{
			background-color: #303136;
		}
		#titulo{
			text-align: center;
		}
		#input{
			border-radius: 10px;
		}
		.col{
			margin-top: 10px;
		}
		#img{
			height: 55px;
			background-color: #38393D;
			border-radius: 5px;
			padding: 8px;
		}
		#radio{
			margin-left: 20px;
		}
		#boton1{
			width: 150px;
			background-color: #AA0000;
			color: white;
			position: relative;
			left: 80%;
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
			padding-right: 1200px;
		}
		@media (max-width: 1500px){
			#boton1{
				left: 70%;	
			}
		}
		@media (max-width: 1200px){
			#boton1{
				left: 60%;	
			}
		}
		@media (max-width: 800px){
			#boton1{
				left: 0%;	
			}
		}
	</style>
</head>
<body id="fondo">

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"> Talleres UTT</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Eventos <span class="sr-only">(current)</span></a>
      </li>
    </ul>
  </div>
</nav>

<div id="contenedor" class="container-fluid">
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
				    <input type="text" class="form-control" id="input" name="tipo">
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
				    
				 <div class="row">
				    <div class="col"> <img name="img" id="img" src="{{ asset('img/talleresUTT/saxophone.png') }}">
				    	<div class="radio"><input id="radio" type="radio" name="optradio" checked value="saxophone"></div>
				     </div> 
				    	
				    <div class="col"> <img id="img" src="{{ asset('img/talleresUTT/guitar-electric.png') }}"> 
				    	<div class="radio"><input id="radio" type="radio" name="optradio" checked value="guitar-electric"></div>
				    </div>

				     <div class="col"> <img id="img" src="{{ asset('img/talleresUTT/guitar-acoustic.png') }}">
				    	<div class="radio"><input id="radio" type="radio" name="optradio" checked value="guitar-acoustic"></div>
				     </div> 

				      <div class="col"> <img id="img" src="{{ asset('img/talleresUTT/soccer.png') }}">
				    	<div class="radio"><input id="radio" type="radio" name="optradio" checked value="soccer"></div>
				     </div> 

				     <div class="col"> <img id="img" src="{{ asset('img/talleresUTT/run-fast.png') }}">
				    	<div class="radio"><input id="radio" type="radio" name="optradio" checked value="run-fast"></div>
				     </div> 

				     <div class="col"> <img id="img" src="{{ asset('img/talleresUTT/drama-masks.png') }}">
				    	<div class="radio"><input id="radio" type="radio" name="optradio" checked value="drama-masks"></div>
				     </div> 

				     <div class="col"> <img id="img" src="{{ asset('img/talleresUTT/speaker.png') }}">
				    	<div class="radio"><input id="radio" type="radio" name="optradio" checked value="speaker"></div>
				     </div> 

				     <div class="col"> <img id="img" src="{{ asset('img/talleresUTT/chess-rook.png') }}">
				    	<div class="radio"><input id="radio" type="radio" name="optradio" checked value="chess-rook"></div>
				     </div>
				</div>
				<div class="row">
					<div class="col"> <img id="img" src="{{ asset('img/talleresUTT/baseball.png') }}">
				    	<div class="radio"><input id="radio" type="radio" name="optradio" checked value="baseball"></div>
				     </div> 

				     <div class="col"> <img id="img" src="{{ asset('img/talleresUTT/basketball.png') }}">
				    	<div class="radio"><input id="radio" type="radio" name="optradio" checked value="basketball"></div>
				     </div> 

				     <div class="col"> <img id="img" src="{{ asset('img/talleresUTT/volleyball.png') }}">
				    	<div class="radio"><input id="radio" type="radio" name="optradio" checked value="volleyball"></div>
				     </div> 

				     <div class="col"> <img id="img" src="{{ asset('img/talleresUTT/football.png') }}">
				    	<div class="radio"><input id="radio" type="radio" name="optradio" checked value="football"></div>
				     </div> 

				     <div class="col"> <img id="img" src="{{ asset('img/talleresUTT/book-open-variant.png') }}">
				    	<div class="radio"><input id="radio" type="radio" name="optradio" checked value="book-open-variant"></div>
				     </div> 

				     <div class="col"> <img id="img" src="{{ asset('img/talleresUTT/gamepad-variant.png') }}">
				    	<div class="radio"><input id="radio" type="radio" name="optradio" checked value="gamepad-variant"></div>
				     </div> 

				     <div class="col"> <img id="img" src="{{ asset('img/talleresUTT/karate.png') }}">
				    	<div class="radio"><input id="radio" type="radio" name="optradio" checked value="karate"></div>
				     </div>

				     <div class="col"> <img id="img" src="{{ asset('img/talleresUTT/soccer-field.png') }}">
				    	<div class="radio"><input id="radio" type="radio" name="optradio" checked value="soccer-field"></div>
				     </div> 
				</div>
				<div class="row">
				     	<div class="col">
				     		<button id="boton1" type="submit" class="btn"> Cancelar </button>
				     	</div>
				     	<div class="col">
				     		<button id="boton2" type="submit" class="btn"> Registrar </button>
				     	</div>
				     </div>
            </form>
            
            @if(Session::has('message'))
                <p class="alert alert-primary">Alumno registrado</p>
            @endif
        </div>
    </div>

</div>

</body>
</html>