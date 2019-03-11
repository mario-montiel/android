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
		background-color: #E1DFE1; margin-left: 120px; border-radius: 10px; height: 390px; margin-top: 40px;
	}
	#imgperfil{
		width: 320px; height: 200px; border-radius: 20px; margin-top: 50px; margin-left: 110px;
	}
	#imgoptions{
		height: 60px; margin-top: 65px; margin-left: 170px;
	}
	#imgmensaje{
		height: 60px; margin-top: 65px; margin-left: 50px;
	}
	#container2{
		 background-color: blue; width: 100px;
	}
	#imgperfil1{
		 height: 110px; border-radius: 20px; margin-top: 13px; margin-left: 10px; margin-left: 15px;
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


	<div id="container1" class="container">
			<div class="row">
				<div class="col-4">
					<img id="imgperfil" src="{{ asset('img/1.jpg') }}">
					<img id="imgoptions" src="{{ asset('img/heart.png') }}">
					<a href="/chat"><img id="imgmensaje" src="{{ asset('img/mensaje.png') }}"></a> 
				</div>
				<div class="col-6" style="margin-left: 100px;">
					<img id="imgperfil1" src="{{ asset('img/20.jpg') }}">
					<img id="imgperfil1" src="{{ asset('img/21.jpg') }}">
					<img id="imgperfil1" src="{{ asset('img/22.jpg') }}">
					<img id="imgperfil1" src="{{ asset('img/23.jpg') }}">
					<div></div>
					<img id="imgperfil1" src="{{ asset('img/24.jpg') }}">
					<img id="imgperfil1" src="{{ asset('img/25.jpg') }}">
					<img id="imgperfil1" src="{{ asset('img/26.jpg') }}">
					<img id="imgperfil1" src="{{ asset('img/27.jpg') }}">
					<div></div>
					<img id="imgperfil1" src="{{ asset('img/28.jpg') }}">
					<img id="imgperfil1" src="{{ asset('img/29.jpg') }}">
					<img id="imgperfil1" src="{{ asset('img/30.jpg') }}">
					<img id="imgperfil1" src="{{ asset('img/31.jpg') }}">
				</div>

			</div>
	</div>


</body>
</html>