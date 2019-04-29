@extends('TalleresUTT.Complements.plugins')

@section('titulo', 'Inicio de Sesión')

@section('contenido')
	<link rel="stylesheet" type="text/css" href="css/TalleresUTT/login.css">
	<style type="text/css">
</style>
</head>
<body id="fondo">
<style type="text/css">
	#fondo{
		 background-image: url("{{asset('img/violin.jpg')}}");
	 display: block; 
		padding: 0;
		margin: 0;
	}
	#contenedorlogin{
		margin-top: 30px;
	}
	#card{
		width: 28rem; height: 35rem; margin: auto; background-color: #007F62; border-color: transparent;
	border-radius: 5%;
	}
	
	#title{
		color: white;
	}
		#boton1{
		width: 280px;
		height: 60px;
		margin-top: -20px;
		border-radius: 45px;

	}

	#input1{
		width: 350px;
		height: 60px;
		background-color:  #FFFFFF;
		border-radius: 45px;
		color: #000000;
		text-align: center;
		margin-top: 10px;
		background-image: url('img/acount.png');
		background-repeat: no-repeat;
		background-size: 30px;
		background-position: 40px;
	}
	
	#input2{
		width: 350px;
		height: 60px;
		background-color: #FFFFFF;
		border-radius: 45px;
		color: #000000;
		text-align: center;
		margin-top: 50px;
		background-image: url('img/password.png');
		background-repeat: no-repeat;
		background-size: 30px;
		background-position: 40px;
	}
	
	#input3{
		width: 350px;
		height: 60px;
		background-color: #FFFFFF;
		border-radius: 45px;
		color:  #000000;
		text-align: center;
		margin-top: 30px;
		background-image: url('img/password.png');
		background-repeat: no-repeat;
		background-size: 30px;
		background-position: 40px;
	}
	
	#input5{
		width: 350px;
		height: 60px;
		background-color: #FFFFFF;
		border-radius: 45px;
		color: #ffff;
		text-align: center;
		margin-top: 10px;
		background-image: url('img/acount.png');
		background-repeat: no-repeat;
		background-size: 30px;
		background-position: 40px;
	}
	
	#input6{
		width: 350px;
		height: 60px;
		background-color: #FFFFFF;
		border-radius: 45px;
		color: #000000;
		text-align: center;
		margin-top: 30px;
		background-image: url('img/acount.png');
		background-repeat: no-repeat;
		background-size: 30px;
		background-position: 40px;
	}
	
	#input7{
		width: 350px;
		height: 60px;
		background-color: #FFFFFF;
		border-radius: 45px;
		color: #000000;
		text-align: center;
		margin-top: 30px;
		background-image: url('img/acount.png');
		background-repeat: no-repeat;
		background-size: 30px;
		background-position: 40px;
	}
	
	#col1{
		text-align: center;
	}
	#col2{
		text-align: center;
	}
	#col5{
		text-align: center;
	}
	#p1{
		margin-top: 25px;
		color: white;
		text-align: center;
	}
	#col3{
		margin-top: 40px;
		text-align: center;
	}
	#col4{
		color: white;
	}
	#p2{
		text-align: center;
		margin-top: 25px;
		font-size: 13px;
	}
	#imgusuario{
		height: 45px;
		margin-left: 45px;
	}
	#imgiluminati{
		height: 80px;
		position: relative;
		left: 88%;
	}
	
	@media (max-width: 700px)
	{
		#imgiluminati{
		height: 80px;
		margin-top: 40px;
		margin-left: -220px;
	}
	}

	 .img1 {
             width:100%;
           
             
             background-position:center
     
}

</style>


<nav class="img1" style="background-image: url(img/navbarofi8.png)">
<img src="{{ asset('img/iluminati.png') }}" width="65px"></div>
  <a href="/"><img  src="{{ asset('img/back.png') }}" width="20px"></a></div>
</nav>



@if(Session::has('conected'))
               <center><span ><p class="alert alert-success">Su cuenta se inició correctamente.</p></span></center>
@endif

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
               <span><p class="alert alert-success">Usuario o Contraseña incorrectos</p></span> 
            @endif
            @if(Session::has('logout'))
               <span><p class="alert alert-success">Su cuenta ha sido cerrada</p></span> 
            @endif
            @if(Session::has('hacker'))
               <span><p id="hacker" class="alert alert-success">Inicie sesión como profesor para poder continuar!...</p></span> 
            @endif
			@if(Session::has('created'))
               <span><p id="hacker" class="alert alert-success">Su cuenta se creó con éxito!</p></span> 
            @endif

            <form action="{{ url('iniciosesion') }}" method="post">
                {{ csrf_field() }}
                
                <div class="row">
				    <div id="col1" class="col"> <input id="input1" type="text" placeholder="Usuario" name="usuario"> </div>
				    <div id="col2" class="col-12"> <input id="input2" type="password" placeholder="Contraseña" name="password"> </div>
				    <div id="col3" class="col-12"> <button id="boton1" type="submit" class="btn btn-danger"> Iniciar sesión </button> </div>
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