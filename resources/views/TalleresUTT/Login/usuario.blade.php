@extends('TalleresUTT.Complements.plugins')

@section('titulo', 'Registro Usuario')

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
		width: 28rem; height: 55rem; margin: auto; background-color: #282B30; border-color: transparent;
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
		margin-top: -12px;
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
		margin-top: 10px;
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
	#input3{
		width: 350px;
		height: 60px;
		background-color: #333338;
		border-radius: 45px;
		color: #ffff;
		text-align: center;
		margin-top: 30px;
		background-image: url('img/password.png');
		background-repeat: no-repeat;
		background-size: 30px;
		background-position: 40px;
	}
	#input3::placeholder {
		color: white;
	}
	#input5{
		width: 350px;
		height: 60px;
		background-color: #333338;
		border-radius: 45px;
		color: #ffff;
		text-align: center;
		margin-top: 10px;
		background-image: url('img/acount.png');
		background-repeat: no-repeat;
		background-size: 30px;
		background-position: 40px;
	}
	#input5::placeholder {
		color: white;
	}
	#input6{
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
	#input6::placeholder {
		color: white;
	}
	#input7{
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
	#input7::placeholder {
		color: white;
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
	#select{
		width: 350px;
		height: 60px;
		background-color: #333338;
		border-radius: 45px;
		color: #ffff;
		text-align: center;
		margin-top: 30px;
		margin-left:30px;
		background-repeat: no-repeat;
		background-size: 30px;
		background-position: 40px;
	}
	#select2{
		width: 350px;
		height: 60px;
		background-color: #333338;
		border-radius: 45px;
		color: #ffff;
		text-align: center;
		margin-top: 15px;
		margin-left:30px;
		background-repeat: no-repeat;
		background-size: 30px;
		background-position: 40px;
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
<script src="http://code.jquery.com/jquery-3.3.1.js"integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="crossorigin="anonymous"></script>
<center><img align="center" border="0" id="img1" src="{{ asset('img/utt.png') }}"> </center>

<div id="contenedorlogin" class="container">
    <div id="card" class="card">
        <div class="card-body">
			<h3 id="title" class="card-title text-center"> Registrarse </h3>
			
			@if(Session::has('correcto'))
				<center><span ><p class="alert alert-success">Su cuenta se creó correctamente.</p></span></center>
			@endif

@if ($errors->any())
        <ul style="color: white; margin-top: 25px; margin: auto;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
@endif

            <form action="/registrarusuario" method="post">
                {{ csrf_field() }}
                
                <div class="row">
					<div id="col5" class="col-12"> <input id="input5" type="text" placeholder="Usuario" name="usuario"> </div>
				    <div id="col1" class="col-12"> <input id="input6" type="password" placeholder="Contraseña" name="password"> </div>
					<div id="col2" class="col-12"> 
						<div class="form-group">
						<select name="carrera" class="form-control" id="select">
							<option>Seleccione el tipo de persona</option>
							@foreach($tpPersonas as $persona)
								<option value="{{ $persona->id_tipo_persona }}" {{ old('select') == $persona->id_tipo_persona ? 'selected' : '' }}>{{ $persona->tipo }}</option>
							@endforeach
						</select>
					</div>
					</div>
                
            </form>
            
            @if(Session::has('message'))
                <p class="alert alert-primary">Registro Exitoso</p>
            @endif
        </div>
    </div>
</div>

<img id="imgiluminati" src="{{ asset('img/iluminati.png') }}">

<script type="text/javascript">
$(document).ready(function(){
	$('#boton1').click(function(){
		var cuatrimestre = $('#select').val();
		var carrera = $('#info').val();
		var matricula = $('#input7').val();

		if(matricula.length != 8){
			Swal.fire({
                                  type: 'error',
                                  title: 'Oops...',
                                  text: 'LA MATRÍCULA DEBE CONTENER 8 DÍGITOS',
                                  footer: '<span class="alert alert-danger">¿Porqué no intenta de nuevo?. Estaria genial</span>'
                                });                                  
			return false;
		}
	});
});
</script>
@endsection
