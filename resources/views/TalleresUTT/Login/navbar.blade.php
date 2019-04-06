<style type="text/css">
  #back{
    position: absolute;
    height:25px;
    left:90px;
    margin-top:-10px;
  }
  #solicitudes{
    transition: color 1s; background-color 1s; 
  }
  #solicitudes:hover{
    background-color: #9D2A2A;
    color: white;
  }
  @media (max-width: 2000px){
		center{
    margin-top: 0px;
    }
  }
  @media (max-width: 991.5px){
		center{
    margin-top: 50px;
    }
	  }
  }
</style>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<img id="imgiluminati" src="{{ asset('img/iluminati.png') }}">
  <a href="/"><img id="back" src="{{ asset('img/back.png') }}"></a>
  <a class="navbar-brand" href="/" id="tituloNavBar" style="margin-top-10px;"> Talleres UTT</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    </ul>
    @if(Session::has('usuario'))
    <center>
    <button class="btn disabled" style="backgroud-color: transparent;"><span style="color: white;">Hola! {{ Session::get('usuario')->usuario }} </span></button>
       <a id="solicitudes" class="btn alert-danger" href="/logout"> Cerrar Sesión	<img id="logout" style="height: 18px; margin-top:-2px; padding-left: 5px;" 
       src="{{ asset('img/logout.png') }}"><span class="sr-only"></span></a>
    </center>
       
		@endif
  </div>
</nav>




