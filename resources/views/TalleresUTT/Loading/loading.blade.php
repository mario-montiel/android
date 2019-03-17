@extends('TalleresUTT.Complements.plugins')

@section('titulo', 'Loading')

@section('contenido')
	<style type="text/css">
		body{
			margin: 0;
			padding: 0;
			background-color: #282B30;
		}
		#utt{
			height: 250px;
			position: absolute;
			top: 5%;
			left: 33%;
			opacity: .5;
		}
		#titulo{
			color: #00796B;
			position: absolute;
			top: 65%;
			right: 43%;
		}
		#complemento{
			color: #00796B;
			position: absolute;
			top: 65%;
			left: 48%;
			font-size: 90px;
			overflow: hidden;
		}
		.box{
			width: 200px;
			height: 200px;
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
			overflow: hidden;
		}
		.box .b{
			border-radius: 50%;
			border-left: 4px solid;
			border-right: 4px solid;
			border-top: 4px solid transparent !important;
			border-bottom: 4px solid transparent !important;
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
			animation: ro 2s infinite
		}
		.box .b1{
			border-color: #00695C;
			width: 120px;
			height: 120px;
		}
		.box .b2{
			border-color: #923D3D;
			width: 100px;
			height: 100px;
		}
		.box .b3{
			border-color: #00838F;
			width: 80px;
			height: 80px;
		}
		.box .b4{
			border-color: #923D3D;
			width: 60px;
			height: 60px;
		}

		@keyframes ro{
			0%{
				transform: translate(-50%, -50%) rotate(0deg);
			}
			50%{
				transform: translate(-50%, -50%) rotate(-180deg);
			}
			1000%{
				transform: translate(-50%, -50%) rotate(0deg);
			}
		}

		@keyframes ro{
			0%{
				transform: translate(-50%, -50%) rotate(0deg);
			}
			50%{
				transform: translate(-50%, -50%) rotate(-180deg);
			}
			1000%{
				transform: translate(-50%, -50%) rotate(0deg);
			}
		}
	</style>
</head>
<body id="fondo">

<div class="container">
	 
	 <img id="utt" src="{{ asset('img/utt.png')}}">
	 
	<h1 id="titulo">CARGANDO</h1>
	<h1 id="complemento">...</h1>
	 

	<div id="box" class="container-fluid">
		<div id="loading" class="box">
			<div class="b b1"></div>
			<div class="b b2"></div>
			<div class="b b3"></div>
			<div class="b b4"></div>
		</div>
	</div>

</div>
@yield('loading')

@endsection