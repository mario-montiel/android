@extends('TalleresUTT.Complements.plugins')

@section('titulo', 'Home')

@section('contenido')
<style type="text/css">
	*{
		margin: 0;
		padding: 0;
		box-sizing: border-box;
	}
	#fondo{
			background-color: #282B30;
			margin: 0;
			padding: 0;
	}
	#imgiluminati{
		height: 50px;
		margin-left: 2%;
	}
	#tituloNavBar{
			position: absolute;
			left: 44%;
	}
	#contenedor1{
		background-color: black;
		width: 100%;
	}
	#solicitudes{
		font-size: 15px;
		text-align: center;
	}
	#contenedor2{
	}
	#carrusel{
		margin-top: 5%;
	}
	/*button{
		box-sizing: border-box;
		display: flex;
		align-items: center;
		box-shadow: 0 0 0 2px black;
		position: relative;
		color: #fff;
		justify-content: center;
	}
	button:before,
	button:after{
			content: "";
			display: block;
			position: absolute;
			left: 0;
			transition:all .3s;
			background-color: #fff
	}
	button:before{
		--width: -2rem;
		height: 3px;
		width: 0;
		bottom: 0;
		box-shadow: 0 var(--width) #eee;
	}
	button:after{
		top: 0;
		width: 3px;
		height: 0%;
	}
	button:hover:after{
			height: 100%;
	}
	button:hover:before{
			width: 100%;
	}*/
	.wrap{
		width: 30%;
		margin: 50px auto;
		display: flex;
		justify-content: center;
	}
	.tarjeta-wrap{
		margin: 10px;
		-webkit-perspective: 10000;
		perspective: 10;
	}
	.tarjeta{
		width: 450px;
		height: 350px;
		background: #247B95;
		position: relative;
		transform-style: preserve-3d;
		transition: .7s ease;
		-webkit-box-shadow: 0px 10px 15px -5px rgba(0, 0, 0 ,0.65);
		-moz-box-shadow: 0px 10px 15px -5px rgba(0, 0, 0 ,0.65);
		box-shadow: 0px 10px 15px -5px rgba(0, 0, 0 ,0.65);
	}
	.adelante, .atras{
		width: 100%;
		height: 100%;
		position: absolute;
		top: 0;
		left: 0;
		backface-visibility: hidden;
		-webkit-backface-visibility: hidden;
	}
	.adelante{
		width: 100%;

	}
	.atras{
		transform: rotateY(180deg);
		padding: 15px;
		display: flex;
		justify-content: center;
		align-items: center;
		text-align: center;
		color: white;
		margin: auto;
	}
	.tarjeta-wrap:hover .tarjeta{
		transform: rotateY(180deg);
	}
	.carta1{
		background-image: url('img/3.jpg');
		background-size: cover;
	}
	.carta2{
		background-image: url('img/4.jpg');
		background-size: cover;
	}
	.carta3{
		background-image: url("img/2.jpg");
		background-size: cover;
	}
	a{
		color: white;
		font-family: sans-serif;
	}
	a:hover{
		color: white;

	}
	.alert{
		font-size: 20px;
	}
	.box1{
		height: 100vh;
		width: 100%;
		background-image: url("img/UTT3.jpg");
		background-size: cover;
		display: table;
		background-attachment: fixed;
	}
	.box2{
		height: 100vh;
		width: 100%;
		background-image: url("img/utt.jpeg");
		background-size: cover;
		display: table;
		background-attachment: fixed;
	}
	.box3{

	}
	#logout{
		height: 18px;
		margin-top:-2px;
		padding-left: 5px;
	}
	@media (max-width: 800px){
		.tarjeta{
			width: 350px;
			height: 350px;
		}
		#cartax1{
			width: 450px;height: 350px;
		}
	}
	@media (max-width: 2000px){
		center{
		margin-top: 0px;
		}
	}
	@media (max-width: 991.5px){
		center{
		margin-top: 40px;
		}
		#tituloNavBar{
			padding-bottom: 1%;
		}
	}
</style>

<body id="fondo">

    	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    		<img id="imgiluminati" src="{{ asset('img/iluminati.png') }}">
		  <a id="tituloNavBar" class="navbar-brand" href="#"> Talleres UTT</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		    <ul class="navbar-nav mr-auto">
		      
		  </ul>
		  @if(Session::has('usuario'))
		  <center>
		  <button class="btn disabled" style="backgroud-color: transparent;"><span style="color: white;">Hola! {{ Session::get('usuario')->usuario }} </span></button>
       	  <a id="solicitudes" class="btn alert-danger" href="/logout"> Cerrar Sesión	<img id="logout" src="{{ asset('img/logout.png') }}"><span class="sr-only"></span></a>
		  </center>
			@endif
		  </div>
			
		</nav>

			@if(Session::has('conected'))
               <center><span ><p class="alert alert-success">Su cuenta se inició correctamente.</p></span></center>
            @endif

	

<div class="container-fluid">
	<div class="row">
		<div class="col">
	        <div class="wrap">
	        	<div class="tarjeta-wrap">
	        		<div class="tarjeta">
	        			<div class="adelante carta1"></div>
	        			<div class="atras">
	        				<h1><a href="/mostrartalleres"> Talleres </a></h1>
	        			</div>
	        		</div>
	        	</div>
	        </div>
	    </div>
	    <div class="col">
	        <div class="wrap">
	        	<div class="tarjeta-wrap">
	        		<div class="tarjeta">
	        			<div class="adelante carta2"></div>
	        			<div class="atras">
	        				<h1><a href=""> Alumnos </a></h1>		
	        			</div>
	        		</div>
	        	</div>
	        </div>
	    </div>
	    <div class="col">
	        <div class="wrap">
	        	<div class="tarjeta-wrap">
	        		<div class="tarjeta">
	        			<div class="adelante carta3"></div>
	        			<div class="atras">
	        				<h1><a href="/eventos"> Eventos </a></h1>	
	        			</div>
	        		</div>
	        	</div>
	        </div>
	     </div>
    </div>
</div>

<div class="box1"></div>




<div class="container-fluid">
	<div class="row">
		<div class="col">
	        <div class="wrap">
	        	<div class="tarjeta-wrap">
	        		<div class="tarjeta">
	        			<div class="adelante carta4"></div>
	        			<div class="atras">
	        				<h1><a href="/registrotalleres"> Registrar Taller </a></h1>
	        			</div>
	        		</div>
	        	</div>
	        </div>
	    </div>
	    <div class="col">
	        <div class="wrap">
	        	<div class="tarjeta-wrap">
	        		<div class="tarjeta">
	        			<div class="adelante carta5"></div>
	        			<div class="atras">
	        				<h1><a href="/mostrartalleres"> Modificar Taller </a></h1>		
	        			</div>
	        		</div>
	        	</div>
	        </div>
	    </div>
	    <div class="col">
	        <div class="wrap">
	        	<div class="tarjeta-wrap">
	        		<div class="tarjeta">
	        			<div class="adelante carta6"></div>
	        			<div class="atras">
	        				<h1><a href=""> Asignar Evento </a></h1>	
	        			</div>
	        		</div>
	        	</div>
	        </div>
	     </div>
    </div>
</div>

<div class="box2"></div>
<div class="box3"></div>

<script type="text/javascript">
	$(document).ready(function() {
		    setTimeout(function() {
		        $("p").fadeOut(1500);
		    },3000);
		 
		    /*setTimeout(function() {
		        $(".content2").fadeIn(1500);
		    },6000);*/
		});
</script>

@endsection