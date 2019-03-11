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
		color: #C74765;margin-left: 80px; font-size: 15px; margin-top: -25px;
	}
	#img1{
		height: 60px; margin-top: 8%; margin-left: 50px;
	}
	#img2{
		height: 55px; margin-top: 25px; margin-left: 110px; margin-top: 50px;
	}
	#manzana{
		height: 15px; color: #C74765; font-size: 25px; margin-left: 60px; 
	}
	#puntos{
		width: 7px;
		margin-top: 8%; margin-left: 400px;
	}
	#container1{
		background-color: #E1DFE1; margin-left: 120px; border-radius: 10px; height: 420px; margin-top: 40px;
	}
	#imgperfil{
		width: 250px; height: 250px; border-radius: 500px; margin-top: 50px; margin-left: 110px;
	}
	#imgoptions{
		height: 80px; margin-top: 30px; margin-left: 195px;
	}
	#container2{
		height: 500px;  margin-right: 160px;
	}	
	#t1{
		margin-top: 30px; margin-left: 40px; font-size: 25px;
	}
	#t2{
		margin-top: -32px; margin-left: 73px; font-size: 23px; color: #C74765;
	}
	#black{
		height: 30px; margin-left: 35px;
	}
	.table
	{
		margin-left: 50px; padding-left: 50px; font-size: 15px;
	}
	#btn1{
		border-radius: 15px; background-color: #C74765; width: 160px; margin-left: 150px; margin-top: 15px;
	}
	</style>
</head>		
<body>

	
<div class="accordion" id="accordionExample">
  <div class="card" style="background-color: #C74765;">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button id="btn" class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          <a href="/inicioLogin"><img id="imgback" src="{{ asset('img/back.png') }}"></a> 
        </button>
        <a href="/inicioLogin"><p id="txt1">Media Manzana</p></a>
      </h5>
    </div>
</div>
</div>

<div class="container-fluid">
  <div id="row1" class="row">
  	<div class="col">
    </div>
    <div class="col-3" id="grouptxt">
    	<a href="/inicioLogin"><img id="img2" src="{{ asset('img/corazon.png') }}"></a>
    	<p id="manzana">Media Manzana</p>
    </div>
    <div class="col">
  		</div>
  </div>

<div class="row">
	<div id="container1" class="container col">
		<div class="container">
			<div class="row">
				<div class="col">
					<img id="imgperfil" src="{{ asset('img/perfil.jpg') }}">
				</div>
				<div class="col">
					<a href="/cambioFoto"><img id="imgoptions" src="{{ asset('img/picture.png') }}"></a> 
				</div>
			</div>
		</div>
	</div>
	<div class="container col-1">
	</div>
	<div id="container2" class="container col">
		<div class="container" style="margin-right: 50px; background-color: #E1DFE1; margin-top: 50px; border-radius: 15px;">
			<div class="row">
				<div class="col-12">
					<p id="t1">Información básica</p>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<img id="black" src="{{ asset('img/black.png') }}">
					<p id="t2"> Carol Remmer Angie </p>
				</div>
			</div>
			<div class="row" style="margin-top: 20px;">
				<div class="col-6" style="margin-left: 50px;">
					<p>Sexo</p>
					<p>Edad</p>
					<p>Altura</p>
					<p>Color de ojos</p>
				</div>
				<div class="col-2">
					<p>:Femenino</p>
					<p>:22</p>
					<p>:1.6 mts.</p>
					<p>:Azules</p>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<button id="btn1" type="button" class="btn btn-danger">Editar</button>
				</div>
			</div>

		</div>
	</div>

</body>
</html>