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
	<title> Login </title>
	<style type="text/css">
	#fondo{
		background-color: #282B30;
		padding: 0;
		margin: 0;
	}
	#contenedorlogin{
		margin-top: 30px;
	}
	#card{
		width: 26rem; height: 30rem; margin: auto; background-color: #282B30; border-color: transparent;
	}
	#card:hover{
		background-color: #2E3239;
	}
	#title{
		color: white;
	}
	#boton1{
		width: 280px;
		height: 60px;
		margin-top: 5px;
		border-radius: 45px;

	}
	#img1{
		height: 60px;
		margin-top: 2%;

	}
	#input1{
		width: 350px;
		height: 60px;
		background-color: #333338;
		border-radius: 45px;
		color: #ffff;
		text-align: center;
		margin-top: 30px;
		background-image: url('img/acount.png');
		background-repeat: no-repeat;
		background-size: 30px;
		background-position: 40px;
	}
	#input1::placeholder {
		color: white;
	}
	#input2{
		width: 350px;
		height: 60px;
		background-color: #333338;
		border-radius: 45px;
		color: #ffff;
		text-align: center;
		margin-top: 50px;
		background-image: url('img/password.png');
		background-repeat: no-repeat;
		background-size: 30px;
		background-position: 40px;
	}
	#input2::placeholder {
		color: white;
	}
	#col1{
		text-align: center;
	}
	#col2{
		text-align: center;
	}
	#p1{
		margin-top: 25px;
		color: white;
		text-align: center;
	}
	#col3{
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
</style>
</head>
<body id="fondo">


<center><img align="center" border="0" id="img1" src="{{ asset('img/utt.png') }}"> </center>


<div id="contenedorlogin" class="container">
    <div id="card" class="card">
        <div class="card-body">
            <h3 id="title" class="card-title text-center">Iniciar Sesión</h3>
            <form action="/inicioSesion" method="get">
                {{ csrf_field() }}
                
                <div class="row">
				    <div id="col1" class="col"> <input id="input1" type="text" placeholder="Usuario o Email" name="usuario"> </div>
				    <div id="col2" class="col-12"> <input id="input2" type="password" placeholder="Contraseña" name="password"> </div>
				    <div class="col"> <p id="p1">¿Olvidó su contraseña?</p> </div>
				    <div id="col3" class="col-12"> <button id="boton1" type="submit" class="btn btn-dark"> Iniciar sesión </button> </div>
				    <div id="col4" class="col-12"> <p id="p2">© 2019 Desarrollado por el equipo Amarillo de la Carrera de Sistemas Informáticos</p> </div>
				  </div>
                
            </form>
            
            @if(Session::has('message'))
                <p class="alert alert-primary">Alumno registrado</p>
            @endif
        </div>
    </div>
</div>

<img id="imgiluminati" src="{{ asset('img/iluminati.png') }}">

</body>
</html>