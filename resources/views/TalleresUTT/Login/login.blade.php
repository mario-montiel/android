@extends('TalleresUTT.Complements.plugins')

@section('titulo', 'Inicio de Sesión')

@section('contenido')
	<link rel="stylesheet" type="text/css" href="css/TalleresUTT/login.css">
	<style type="text/css">
	
</style>
</head>
<body id="fondo">

<center><img align="center" border="0" id="img1" src="{{ asset('img/utt.png') }}"> </center>


<div id="contenedorlogin" class="container">
	<div class="row">
    <div id="card" class="card">
        <div class="card-body">
            <h3 id="title" class="card-title text-center">Iniciar Sesión</h3>

            @if ($errors->any())
		        <ul style="color: white; margin-top: 25px; margin: auto;">
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
			@endif
			@if(Session::has('userIncorrecto'))
               <span><p class="alert alert-primary">Usuario o Contraseña incorrectos</p></span> 
            @endif
            @if(Session::has('logout'))
               <span><p class="alert alert-primary">Su cuenta ha sido cerrada</p></span> 
            @endif
            @if(Session::has('hacker'))
               <span><p id="hacker" class="alert alert-primary">Inicie sesion o registrese para poder acceder!...</p></span> 
            @endif

            <form action="{{ url('iniciosesion') }}" method="post">
                {{ csrf_field() }}
                
                <div class="row">
				    <div id="col1" class="col"> <input id="input1" type="text" placeholder="Usuario" name="usuario"> </div>
				    <div id="col2" class="col-12"> <input id="input2" type="password" placeholder="Contraseña" name="password"> </div>
				    <div id="col3" class="col-12"> <button id="boton1" type="submit" class="btn btn-dark"> Iniciar sesión </button> </div>
				    <div id="col4" class="col-12"> <p id="p2">© 2019 Desarrollado por el equipo Amarillo de la Carrera de Sistemas Informáticos</p> </div>
				  </div>
                
            </form>
        </div>
    </div>
</div>

<img id="imgiluminati" src="{{ asset('img/iluminati.png') }}">
</div>
<script type="text/javascript">
	$(document).ready(function() {
		    setTimeout(function() {
		        $("p").fadeOut(1500);
		    },3000);
		 
		    /*setTimeout(function() {
		        $(".content2").fadeIn(1500);
		    },6000);*/
		});
	$(document).ready(function() {
		    setTimeout(function() {
		        $("#hacker").fadeOut(1500);
		    },4000);
		 
		    /*setTimeout(function() {
		        $(".content2").fadeIn(1500);
		    },6000);*/
		});
</script>

@endsection