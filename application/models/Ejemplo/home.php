<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Menú</title>
    <!-- Bootstrap core CSS -->
    <link href="<?= base_url();?>bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?= base_url();?>bootstrap/css/CFEpracticantes/home.css" rel="stylesheet">
    <link href="<?= base_url();?>bootstrap/css/CFEpracticantes/login.css" rel="stylesheet">
    <link href="<?= base_url();?>bootstrap/css/CFEpracticantes/navbar.css" rel="stylesheet">
    
    <!-- Libraries for Vue Support -->
    <script src="<?= base_url();?>bootstrap/js/vue.js"></script>
    <script src="<?= base_url();?>bootstrap/js/vuex.js"></script>
    <script src="<?= base_url();?>bootstrap/js/vue-resource.min.js"></script>  
</head>

<body>

<div id="app">
  <!--<comp-login></comp-login>-->
  <template>
    <div>
      <comp-login v-if="login"></comp-login>
    </div>
    <div>
      <comp-nav-bar v-if="!login"></comp-nav-bar>
    </div>
  </template>
</div>
  
  
<!-- NAV BAR -->
<!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">CFE</a>
  <a class="navbar-brand" href="#" v-if="login">{{datos_usuario.idUsuario}} - {{datos_usuario.dscProceso}} - {{datos_usuario.idDiv}}{{datos_usuario.idZona}}</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li v-if="perfil.divisional.activo || perfil.zona.activo" class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Gestión
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a v-if="perfil.divisional.activo" class="dropdown-item" href="#">Crear División</a>
          <a v-if="perfil.divisional.activo" class="dropdown-item" href="#">Asignar a División</a>
          <a v-if="perfil.zona.activo" class="dropdown-item" href="#">Crear Zona</a>
          <a v-if="perfil.zona.activo" class="dropdown-item" href="#">Asignar a Zona</a>
      </li>
      <li class="nav-item">
        <a v-if="!perfil.practicantes.activo" class="nav-link" href="#">Solicitudes</a>
      </li>
      <li class="nav-item dropdown" v-if="perfil.divisional.activo">
        <a v-if="!perfil.practicantes.activo" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Reportes
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Barra de Menús
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a v-if="!perfil.practicantes.activo" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Catálogos
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a v-if="!perfil.practicantes.activo" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Bibliotecas
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">Salir</a>
      </li>
    </ul>
  </div>
</nav>
-->
<!-----          ----------->

<!--<pruebon></pruebon>-->

 <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?= base_url();?>bootstrap/js/jquery-3.3.1.slim.min.js"></script>
    <!--<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>-->
    <script src="<?= base_url();?>bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url();?>bootstrap/js/axios.js"></script>

    <!-- Components -->
    <script src="<?= base_url();?>bootstrap/js/app/components/login/login.js"></script>
    <script src="<?= base_url();?>bootstrap/js/app/components/navbar/navbar.js"></script>
    <!-- Store -->
    <script src="<?= base_url();?>bootstrap/js/app/store.js"></script>
    <script src="<?= base_url();?>bootstrap/js/app/vue.js"></script>
    
    
    
</body>
</html>