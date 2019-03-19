@extends('TalleresUTT.Complements.plugins')

@section('titulo', 'Home')

@section('contenido')
<style type="text/css">
	#fondo{
			background-color: #282B30;
			padding: 0;
	}
	#imgiluminati{
		height: 50px;
		margin-left: 2%;
	}
	#contenedor1{
		background-color: black;
	}
	#tituloNavBar{
		margin: 0;
		margin-left: 3%;
	}
	#solicitudes{
		font-size: 20px;
		position: absolute;
		top: 13%;
		left: 45%;
	}
	#contenedor2{
		display: flex;
		justify-content: space-between;
		$bwidth: 3px;
		@function restov(){
			@return -(200px - 3px);
		}
		@function restoh(){
			@return (300px - 3px);
		}
	}
	button{
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
	}

	#boton1{
	}
	#boton2{

	}
	#boton3{

	}
</style>

<body id="fondo">


<div id="loading" class="container-fluid" >
		<div class="box">
			<div class="b b1"></div>
			<div class="b b2"></div>
			<div class="b b3"></div>
			<div class="b b4"></div>
		</div>
</div>

<center><img align="center" border="0" id="img1" src="{{ asset('img/utt.png') }}"> </center>


<div id="contenedorlogin" class="container">
    	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    		<img id="imgiluminati" src="{{ asset('img/iluminati.png') }}">
	  <a id="tituloNavBar" class="navbar-brand" href="#"> Talleres UTT</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item active" id="solicitudes">
	        <a class="nav-link" href="#">Ver Solicitudes <span class="sr-only">(current)</span></a>
	      </li>
	      
	  </div>
	</nav>



			@if(Session::has('message'))
               <span><p class="alert alert-primary">Su cuenta se inicio correctamente.</p></span> 
            @endif

            <div id="carrusel">
            	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
					  <ol class="carousel-indicators">
					    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
					    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
					    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
					  </ol>
					  <div class="carousel-inner">
					    <div class="carousel-item active">
					      <img id="img1" src="{{ asset('img/talleresUTT/carrousel/uttcielo.jpg') }}" class="d-block w-100" alt="  ">
					    </div>
					    <div class="carousel-item">
					      <img id="img2" src="{{ asset('img/talleresUTT/carrousel/uttarcoiris.jpg') }}" class="d-block w-100" alt="...">
					    </div>
					    <div class="carousel-item">
					      <img id="img3" src="{{ asset('img/talleresUTT/carrousel/uttnoche.jpg') }}" class="d-block w-100" alt="...">
					    </div>
					  </div>
					  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
					    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
					    <span class="sr-only">Previous</span>
					  </a>
					  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
					    <span class="carousel-control-next-icon" aria-hidden="true"></span>
					    <span class="sr-only">Next</span>
					  </a>
					</div>
            </div>

        <div id="contenedor2" class="container">
            
           <a href="{{ url('registrotalleres')}}"><button id="boton1" type="submit" class="btn btn-dark"> Registrar Nuevo Taller </button></a> 
           <a href="{{ url('mostrartalleres')}}"><button id="boton2" type="submit" class="btn btn-dark"> Modificar Taller </button></a> 
             <button id="boton3" type="submit" class="btn btn-dark"> Registrar / Asignar Evento </button> 
        </div>
</div>

<script type="text/javascript">
	window.onload = function(){
		var contenedor = document.getElementById('box').style.visibility = 'hidden';
		contenedor = document.getElementById('loading').style.opacity = '0';
	};
</script>

@endsection