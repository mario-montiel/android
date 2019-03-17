@extends('TalleresUTT.Complements.plugins')

@section('titulo', 'Inicio de Sesión')

@section('contenido')
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
		width: 26rem; height: 30rem; margin: auto; background-color: #2E3239; border-color: transparent;
		transition: width 1s, height 1s, margin 1s;
    	margin: 50px auto 0;
	}
	#card:hover{
		background-color: #2E3239;
		width: 500px;
		height: 500px;
	}
	#title{
		color: white;
	}
	#boton1{
		width: 280px;
		height: 60px;
		margin-top: 35px;
		border-radius: 45px;
		transition: width 1s, height 1s, margin 1s, background-color 1s;
    	margin: 50px auto 0;
	}
	#boton1:hover{
		width: 350px;
		background-color: #1F1F22;
	}
	#img1{
		height: 60px;
		margin-top: 2%;
		display:block;
		margin:auto;

	}
	#input1{
		width: 350px;
		height: 60px;
		background-color: #333338;
		border-radius: 45px;
		color: #ffff;
		text-align: center;
		background-image: url('img/acount.png');
		background-repeat: no-repeat;
		background-size: 30px;
		background-position: 40px;
		transition: width 1s, height 1s, margin 1s, background-color 1s;
    	margin: 30px auto 0;
	}
	#input1:hover{
		width: 380px;
		background-color: #484852;
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
		background-image: url('img/password.png');
		background-repeat: no-repeat;
		background-size: 30px;
		background-position: 40px;
		transition: width 1s, height 1s, margin 1s, background-color 1s;
    	margin: 50px auto 0;
	}
	#input2:hover{
		width: 380px;
		background-color: #484852; 
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
	@media (max-width: 800px){
		#imgiluminati{
			height: 80px;
			margin-top: 5%;
			position: absolute;
			left: 45%;	
		}
		#card{
			margin: auto;
			position: left;
			width: 400px;
			height: 500px;
		}
		#card:hover{
			width: 450px;
		}
		#input1{
			width: 300px;
		}
		#input1:hover{
			width: 320px;
		}
		#input2{
			width: 300px;
		}
		#input2:hover{
			width: 320px;
		}
		#boton1{
			width: 250px;
		}
		#boton1:hover{
			width: 280px;
		}
	}
	@media (max-width: 500px){
		#card{
			margin: auto;
			position: left;
			width: 320px;
			height: 500px;
		}
		#card:hover{
			width: 350px;
		}
		#input1{
			width: 260px;
		}
		#input1:hover{
			width: 280px;
		}
		#input2{
			width: 260px;
		}
		#input2:hover{
			width: 280px;
		}
	}
</style>
</head>
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

            <form action="{{ url('inicioSesion') }}" method="post">
                {{ csrf_field() }}
                
                <div class="row">
				    <div id="col1" class="col"> <input id="input1" type="text" placeholder="Usuario o Email" name="usuario"> </div>
				    <div id="col2" class="col-12"> <input id="input2" type="password" placeholder="Contraseña" name="password"> </div>
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
</div>

@endsection