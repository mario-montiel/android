
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<img id="imgiluminati" src="{{ asset('img/iluminati.png') }}">
  <a class="navbar-brand" href="#" id="tituloNavBar"> Talleres UTT</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#modalRegistroTalleres">Agregar Nuevo Taller</a>
      </li>
    </ul>
    @if(Session::has('usuario'))
			<span style="color: white;">USUARIO: {{ Session::get('usuario') }}</span>
		        <a id="solicitudes" class="btn btn-primary" href="/logout">Cerrar Sesion<span class="sr-only"></span></a>
		      @endif
  </div>
</nav>