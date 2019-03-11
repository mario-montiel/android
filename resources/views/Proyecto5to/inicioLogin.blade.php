<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="css/rrssb.css"/>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="js/rrssb.min.js"></script>
	<style type="text/css">
		#imgback{
			height: 15px;
		}
		#txt1{
			color: white;margin-left: 80px; font-size: 15px; margin-top: -25px;
		}
		#img1{
			height: 60px; margin-top: 8%; margin-left: 50px;
		}
		#img2{
			height: 55px; margin-top: 30px; margin-left: 110px; display: flex;
		}
		#manzana{
			height: 15px; color: #C74765; font-size: 25px; margin-left: 60px; 
		}
		#puntos{
			width: 7px;
			margin-top: 8%; margin-left: 400px;
		}
		.fondo{
			width: 100%;
			height: 100%;
			background-color: #ffff;
		}
		#img3{
			height: 150px;
			width: 285px;
			border-radius: 30px;
		}
		#img4{
			height: 150px;
			width: 285px;
			border-radius: 30px;
			margin-top: -20px;
		}
		#imggroup1{
			margin-left: 90px; margin-top: 0px;
		}
		#imggroup0{
			margin-left: 90px; margin-top: 30px;
		}
		#containerimg{
			background-color: #D8D4D7; border-radius: 30px; border-color: #ffff; margin-top: 3%;
		}
		#p1{
			margin-top: -50px; color: white; margin-left: 10px;
		}
		#p2{
			margin-top: -20px; color: white; margin-left: 35px;
		}
		#ubicacion1{
			margin-top: -80px; margin-left: 10px; 
		}
		#mensaje{
			height: 17px; margin-top: -85px; margin-left: 210px;
		}
		@media only screen and (max-width:1000px) { 
		#img1{
			margin-top: 25%;
			margin-right: 15px;
			height: 25px;
			display: none;
		}
		#img2{
			margin-top: 5px;
			height: 60px;
			margin-left: 25px;
		}
		#manzana{
			font-size: 15px;
			margin-top: 15px;display: none;
		}
		#img4{
			height: 150px;
			width: 285px;
			border-radius: 30px;
			margin-top: 0px;
		}
		#puntos{
			height: 15px;
			margin-left: 25px;
			display: none;
		}
		#img3{
			height: 150px;
			width: 285px;
			border-radius: 30px;
			margin-top: 20px;
		}
		#imggroup0{
			margin-left: 90px; margin-top: 0px;
		}
	</style>
	</head>
	<body class="fondo">
		

<div class="accordion" id="accordionExample">
  <div class="card" style="background-color: #C74765;">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button id="btn" class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
         <a href="/inicio"><img id="imgback" src="{{ asset('img/back.png') }}"></a> 
        </button>
        <a href="/inicioLogin"><p id="txt1">Media Manzana</p></a>
      </h5>
    </div>
</div>
</div>

<div class="container-fluid">
  <div id="row1" class="row">
  	<div class="col">
    	<a href="/verPerfil"><img id="img1" src="{{ asset('img/melanny.png') }}"></a> 
    </div>
    <div class="col-3" id="grouptxt">
    	<a href="/inicioLogin"><img id="img2" src="{{ asset('img/corazon.png') }}"></a>
    	<p id="manzana">Media Manzana</p>
    </div>
    <div class="col">
  		</div>
  </div>
  <div id="containerimg" class="container-fluid">
  	<div class="row">
  		<div id="imggroup0" class="col">
  			<a href="/perfil" title=""><img id="img3" src="{{ asset('../img/1.JPG') }}"></a> 
  			<p id="p1">Carol Remmer Angle</p>
  			<p id="p2">Dhaka, Bangladesh</p>
  			<img id="ubicacion1" src="{{ asset('img/ubicacion.png') }}">
  			<img id="mensaje" src="{{ asset('img/69.PNG') }}">
  		</div>
  		<div id="imggroup0" class="col">
  			<a href="/perfil" title=""><img id="img3" src="{{ asset('img/2.JPG') }}"></a>
  			<p id="p1">Carol Joyce Blumberg</p>
  			<p id="p2">Dhaka, Bangladesh</p>
  			<img id="ubicacion1" src="{{ asset('img/ubicacion.png') }}">
  			<img id="mensaje" src="{{ asset('img/69.PNG') }}">
  		</div>
  		<div id="imggroup0" class="col">
  			<a href="/perfil" title=""><img id="img3" src="{{ asset('img/3.PNG') }}"></a>
  			<p id="p1">Caroline Hdz.</p>
  			<p id="p2">Dhaka, Bangladesh</p>
  			<img id="ubicacion1" src="{{ asset('img/ubicacion.png') }}">
  			<img id="mensaje" src="{{ asset('img/69.PNG') }}">
  		</div>
  	</div>
  	<div class="row">
  		<div id="imggroup1" class="col">
  			<a href="/perfil" title=""><img id="img4" src="{{ asset('../img/4.JPG') }}"></a>
  			<p id="p1">Addison Alves</p>
  			<p id="p2">Dhaka, Bangladesh</p>
  			<img id="ubicacion1" src="{{ asset('img/ubicacion.png') }}">
  			<img id="mensaje" src="{{ asset('img/69.PNG') }}">
  		</div>
  		<div id="imggroup1" class="col">
  			<a href="/perfil" title=""><img id="img4" src="{{ asset('img/5.JPG') }}"></a>
  			<p id="p1">Addison G. Forter</p>
  			<p id="p2">Dhaka, Bangladesh</p>
  			<img id="ubicacion1" src="{{ asset('img/ubicacion.png') }}">
  			<img id="mensaje" src="{{ asset('img/69.PNG') }}">
  		</div>
  		<div id="imggroup1" class="col">
  			<a href="/perfil" title=""><img id="img4" src="{{ asset('img/6.JPG') }}"></a>
  			<p id="p1">Caroline Hdz.</p>
  			<p id="p2">Dhaka, Bangladesh</p>
  			<img id="ubicacion1" src="{{ asset('img/ubicacion.png') }}">
  			<img id="mensaje" src="{{ asset('img/69.PNG') }}">
  		</div>
  	</div>
  	<div class="row">
  		<div id="imggroup1" class="col">
  			<a href="/perfil" title=""><img id="img4" src="{{ asset('../img/7.JPG') }}"></a>
  			<p id="p1">Addison Kelly</p>
  			<p id="p2">Dhaka, Bangladesh</p>
  			<img id="ubicacion1" src="{{ asset('img/ubicacion.png') }}">
  			<img id="mensaje" src="{{ asset('img/69.PNG') }}">
  		</div>
  		<div id="imggroup1" class="col">
  			<a href="/perfil" title=""><img id="img4" src="{{ asset('img/8.PNG') }}"></a>
  			<p id="p1">Alaina Surmatt</p>
  			<p id="p2">Dhaka, Bangladesh</p>
  			<img id="ubicacion1" src="{{ asset('img/ubicacion.png') }}">
  			<img id="mensaje" src="{{ asset('img/69.PNG') }}">
  		</div>
  		<div id="imggroup1" class="col">
  			<a href="/perfil" title=""><img id="img4" src="{{ asset('img/9.JPG') }}"></a>
  			<p id="p1">Caroline Hdz.</p>
  			<p id="p2">Dhaka, Bangladesh</p>
  			<img id="ubicacion1" src="{{ asset('img/ubicacion.png') }}">
  			<img id="mensaje" src="{{ asset('img/69.PNG') }}">
  		</div>
  	</div>
  	<div class="row">
  		<div id="imggroup1" class="col">
  			<a href="/perfil" title=""><img id="img4" src="{{ asset('../img/10.JPG') }}"></a>
  			<p id="p1">Alaina Sexy Grl.</p>
  			<p id="p2">Dhaka, Bangladesh</p>
  			<img id="ubicacion1" src="{{ asset('img/ubicacion.png') }}">
  			<img id="mensaje" src="{{ asset('img/69.PNG') }}">
  		</div>
  		<div id="imggroup1" class="col">
  			<a href="/perfil" title=""><img id="img4" src="{{ asset('img/11.JPG') }}"></a>
  			<p id="p1">Alaina Johnson</p>
  			<p id="p2">Dhaka, Bangladesh</p>
  			<img id="ubicacion1" src="{{ asset('img/ubicacion.png') }}">
  			<img id="mensaje" src="{{ asset('img/69.PNG') }}">
  		</div>
  		<div id="imggroup1" class="col">
  			<a href="/perfil" title=""><img id="img4" src="{{ asset('img/12.JPG') }}"></a>
  			<p id="p1">Caroline Hdz.</p>
  			<p id="p2">Dhaka, Bangladesh</p>
  			<img id="ubicacion1" src="{{ asset('img/ubicacion.png') }}">
  			<img id="mensaje" src="{{ asset('img/69.PNG') }}">
  		</div>
  	</div>
  	<div class="row">
  		<div id="imggroup1" class="col">
  			<a href="/perfil" title=""><img id="img4" src="{{ asset('../img/13.JPG') }}"></a>
  			<p id="p1">Elaine</p>
  			<p id="p2">Dhaka, Bangladesh</p>
  			<img id="ubicacion1" src="{{ asset('img/ubicacion.png') }}">
  			<img id="mensaje" src="{{ asset('img/69.PNG') }}">
  		</div>
  		<div id="imggroup1" class="col">
  			<a href="/perfil" title=""><img id="img4" src="{{ asset('img/14.JPG') }}"></a>
  			<p id="p1">Alexa Dixon</p>
  			<p id="p2">Dhaka, Bangladesh</p>
  			<img id="ubicacion1" src="{{ asset('img/ubicacion.png') }}">
  			<img id="mensaje" src="{{ asset('img/69.PNG') }}">
  		</div>
  		<div id="imggroup1" class="col">
  			<a href="/perfil" title=""><img id="img4" src="{{ asset('img/15.JPG') }}"></a>
  			<p id="p1">Caroline Hdz.</p>
  			<p id="p2">Dhaka, Bangladesh</p>
  			<img id="ubicacion1" src="{{ asset('img/ubicacion.png') }}">
  			<img id="mensaje" src="{{ asset('img/69.PNG') }}">
  		</div>
  	</div>
  	<div class="row">
  		<div id="imggroup1" class="col">
  			<a href="/perfil" title=""><img id="img4" src="{{ asset('../img/16.JPG') }}"></a>
  			<p id="p1">Elaine</p>
  			<p id="p2">Dhaka, Bangladesh</p>
  			<img id="ubicacion1" src="{{ asset('img/ubicacion.png') }}">
  			<img id="mensaje" src="{{ asset('img/69.PNG') }}">
  		</div>
  		<div id="imggroup1" class="col">
  			<a href="/perfil" title=""><img id="img4" src="{{ asset('img/17.PNG') }}"></a>
  			<p id="p1">Alexa Bixby</p>
  			<p id="p2">Dhaka, Bangladesh</p>
  			<img id="ubicacion1" src="{{ asset('img/ubicacion.png') }}">
  			<img id="mensaje" src="{{ asset('img/69.PNG') }}">
  		</div>
  		<div id="imggroup1" class="col">
  			<a href="/perfil" title=""><img id="img4" src="{{ asset('img/18.PNG') }}"></a>
  			<p id="p1">Caroline Hdz.</p>
  			<p id="p2">Dhaka, Bangladesh</p>
  			<img id="ubicacion1" src="{{ asset('img/ubicacion.png') }}">
  			<img id="mensaje" src="{{ asset('img/69.PNG') }}">
  		</div>
  	</div>
  </div>
</div>




</body>
</html>