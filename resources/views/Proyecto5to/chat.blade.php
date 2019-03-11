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
		height: 55px; margin-top: 25px; margin-left: 110px; margin-top: 50px;
	}
	#manzana{
		height: 15px; color: #FF0000; font-size: 25px; margin-left: 60px; 
	}
	#puntos{
		width: 7px;
		margin-top: 8%; margin-left: 400px;
	}
	#container1{
		background-color: #E1DFE1; margin-left: 120px; border-radius: 10px; height: 420px; margin-top: 40px;
	}
	#imgperfil{
		width: 320px; height: 200px; border-radius: 20px; margin-top: 50px; margin-left: 60px;
	}
	#imgoptions{
		height: 60px; margin-top: 80px; margin-left: 110px;
	}
	#container2{
		margin-right: 50px; background-color: #E1DFE1; margin-top: 50px; border-radius: 15px; width: 480px;
	}
	#hand{
		height: 100px; margin-left: 120px; margin-top: 60px;
	}
	#chat{
		height: 40px; margin-left: 10px; margin-top: 60px; width: 460px; border-radius: 0px;
	}
	#amiga{
		margin-top: 20px; margin-left: 155px; font-size: 20px;
	}
	</style>
</head>		
<body>

	
<div class="accordion" id="accordionExample">
  <div class="card" style="background-color: #C74765;">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button id="btn" class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          <a href="/perfil"><img id="imgback" src="{{ asset('img/back.png') }}"></a> 
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
    	<a href="/inicioLogin"><p id="manzana">Media Manzana</p></a>
    </div>
    <div class="col">
  		</div>
  </div>

<div class="row">
	<div id="container1" class="container col">
		<div class="container">
			<div class="row">
				<div class="col">
					<img id="imgperfil" src="{{ asset('img/1.jpg') }}">
				</div>
				<div class="col">
					<a href="/inicioLogin"><img id="imgoptions" src="{{ asset('img/heart.png') }}"></a>
					<a href="/fotosperfil"><img id="imgoptions" src="{{ asset('img/picture.png') }}"></a>
				</div>
			</div>
		</div>
	</div>
	<div class="container col-1">
	</div>
	<div id="con2" class="container col" style="margin-right: 160px;">
		<div id="container2" class="container" >
			<div class="row">
			<div class="row" style="margin-top: 20px;">
				<div class="col-6" style="margin-left: 50px;">
					<img id="hand" src="{{ asset('img/hand.png') }}">

				</div>
				<p id="amiga">Saluda a tu nueva amiga</p>
			</div>
			<div class="row">
				<div class="col">
					<img id="chat" src="{{ asset('img/chat.png') }}">
				</div>
			</div>

		</div>
	</div>
</div>
</div>

</body>
</html>