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
		#img1{
			height: 80px; margin-left: 500px; margin-top: 5%;
		}
		#corazon{
			margin-top: 85px; background-color: transparent;
		}
		.fondo{
			width: 100%;
			height: 100%;
			background-image: url(img/pareja.jpg);
			width: 100%;
			height: 100%;
			background-repeat:no-repeat;
			-webkit-background-size:cover;
			-moz-background-size:cover;
			-o-background-size:cover;
			background-size:cover;
			background-color: #995165;
			opacity: 1%;
		}
		#title{
			color: white; height: 80px; text-align: center; margin-top: 5%;
		}
		#txt1{
			color: white; height: 80px; margin-top: -40px; text-align: center;
		}
		#btn{
			margin-left: 100px; color: white; text-decoration: none; padding: 10px;
		}
		#btn1{
			margin-left: 300px; width: 500px; border-radius: 50px; background-color: #DAABB7; color: white; max-width: 1000px;
		}
		#fb{
			margin-top: -2%; color: white; text-align: center; margin-top: -32.5px;
		}
		#btn2{
			margin-left: 300px; width: 500px; border-radius: 50px; margin-top: 30px; background-color: #DAABB7; color: white;
		}
		#txt2{
			color: white; margin-top: 2%; text-align: right; margin-right: 320px; font-size: 12px;
		}
		#btn3{
			margin-left: 300px; width: 500px; border-radius: 50px; background-color: #BC2149; height:48px;
		}
		#btn4{
			margin-left: 300px; width: 500px; border-radius: 50px; margin-top: 30px; background-color: #DAABB7; color: white;
		}
		#txt3{
			color: white; margin-top: 2%; margin-left: 470px;
		}
		#txt4{
			text-align: center; color: white; margin-top: 2%; margin-right: 350px;
		}
		@media only screen and (max-width:1000px) { 
		#btn1{
			margin-left: 0;
			font-size:0.875em;
		    display:block;
		    left:-60px;
		    margin-top:35px;
		}
		#btn2{
			margin-left: 0;
			font-size:0.875em;
		    display:block;
		    left:-60px;
		    margin-top:35px;
		}
		#txt2{
			color: white; text-align: center; margin-top: 3%; margin-right: 64px;
		}
		#txt3{
			color: white;  margin-top: 3%; margin-left: 100px;
		}
		#btn3{
			margin-left: 0;
			font-size:0.875em;
		    display:block;
		    left:-60px;
		}
		#txt4{
			margin-right:50px;
		}
	</style>
	</head>
	<body class="fondo">
		

<div class="accordion" id="accordionExample">
  <div class="card" style="background-color: #C74765;">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button id="btn" class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
           Media Manzana
        </button>
      </h5>
    </div>
</div>
</div>

<div class="container">
  <div class="row  ">
    <div class="col-6">
    	<a href="/inicio"><img id="img1" src="{{ asset('img/corazon.png') }}"></a> 
    </div>
  </div>
  <div class="row">
    <div class="col">
    	<h2 id="title"> Media Manzana </h2>
    </div>
   </div>
   <div class="row">
   	<div class="col">
    	<h5 id="txt1"> Encuentra a tu pareja perfecta </h5>
    </div>
   </div>
   <div class="row">
   	<div class="col">
   		<button id="btn1" type="button" class="btn"> Ingrese un correo electrónico </button>
   	</div>
   </div>
   <div class="row">
   	<div class="col">
   		<button id="btn2" type="button" class="btn"> Ingrese su nombre de usuario </button>
   	</div>
   </div>
    <div class="row">
   	<div class="col">
   		<button id="btn4" type="button" class="btn"> Ingrese una contraseña </button>
   	</div>
   </div>
   <div class="row">
   	<div class="col">
   		<p id="txt2">Nunca publicaremos nada sin tu autorización</p>
   	</div>
   </div>
   <div class="row">
   	<div class="col">
   		<a href="/inicioLogin" title=""> <button id="btn3" type="button" class="btn"></button> <h6 id="fb">Acceder</h6></a>
   	</div>
   </div>
    <div class="row">
   	<div class="col"><p id="txt3">Suscribirte con nosotros?</p></div>
   </div>
</div>

</body>
</html>