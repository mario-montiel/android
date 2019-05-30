<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>SEG</title>

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url();?>bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?= base_url();?>bootstrap/css/carousel.css" rel="stylesheet">
    <link href="<?= base_url();?>bootstrap/css/sticky-footer-navbar.css" rel="stylesheet">  
    <link rel="stylesheet" href="<?= base_url();?>bootstrap/css/fontawesome-free-5.1.1-web/css/all.css">  
    
    <!-- Libraries for Vue Support -->
    <script src="<?= base_url();?>bootstrap/js/vue.js"></script>
    <script src="<?= base_url();?>bootstrap/js/vuex.js"></script>
    <script src="<?= base_url();?>bootstrap/js/vue-resource.min.js"></script>  


  </head>

  <body>

    <div id="app">
      <header>
        <!-- Fixed navbar -->
        <nav class="navbar navbar-expand-md navbar-dark fixed-top" style="background-color: #284aba;">
          <a class="navbar-brand" href="#" v-if="!login">{{datos_usuario.idUsuario}} - {{datos_usuario.dscProceso}} - {{datos_usuario.idDiv}}{{datos_usuario.idZona}}</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
<!--               <li class="nav-item">
                <a class="nav-link" href="#" v-b-modal="'modal-acerca-de'" v-if="login">Acerca de...</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#" v-b-modal="'modal-ayuda'" v-if="!login">Ayuda?</a>
              </li>  --> 
              <li class="nav-item dropdown" v-if="!login">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Menu</a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                  <a class="dropdown-item" href="#" v-if="perfil.jur.activo" @click="procesa_opcion(11)">Solicitudes de Acceso - Prestadores</a>
                  <!--<a class="dropdown-item" href="#" v-if="perfil.jur.activo" @click="procesa_opcion(15)">Juridico 2</a>-->
                  <a class="dropdown-item" href="#" v-if="perfil.pla.activo" @click="procesa_opcion(12)">Planeación 1</a>
                  <a class="dropdown-item" href="#" v-if="perfil.pla.activo" @click="procesa_opcion(14)">Planeación 2</a>
                  <a class="dropdown-item" href="#" v-if="perfil.scl.activo" @click="procesa_opcion(21)">Servicio al Cliente 1</a>
                  <a class="dropdown-item" href="#" v-if="perfil.scl.activo" @click="procesa_opcion(22)">Servicio al Cliente 2</a>
                </div>
              </li>            
              <li class="nav-item">
                <a class="nav-link" href="#"  v-if="login">Acerca de...esta</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#"  v-if="!login">Ayudame?</a>
              </li> 
              <li class="nav-item">

                <a class="nav-link" href="#" v-on:click="salir()" v-if="!login">Salir</a>
              </li>

<!--               <li class="nav-item">
                <a class="nav-link disabled" href="#">Disabled</a>
              </li> -->
            </ul>
            <form class="form-inline mt-2 mt-md-0" v-if="login">
              <div class="form-group">

                <input type="text" class="form-control mr-sm-2" name="usuario" id="usuario" v-model="usuario.usu_rpe" required placeholder="RPE">

              </div>
              <div class="form-group">

                <input type="password" class="form-control mr-sm-2" name="password" id="password" v-model="usuario.usu_passwd" required placeholder="Contraseña Dir. Activo">

              </div>


              <!--<input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">-->
              <!--<button type="button" v-on:click="salir()" class="btn btn btn-outline-light my-2 my-sm-0"  v-if="!login">Salir</button>-->
              <button type="button" v-on:click="valida()" class="btn btn btn-outline-light my-2 my-sm-0">Acceder</button>
            </form>
          </div>
        </nav>
      </header>

      <!-- Begin page content -->
      <main role="main" class="container-fluid" >
        <div v-if="login">
          <div class="jumbotron">
            <div class="row">
              <div class="col-3" style="padding-top: 60px;">
                <img  src="http://10.4.22.212/obrasnac/bootstrap/img/logocfe.png" alt="Generic placeholder image">       
              </div>
              <div class="col-9">

                  <h1 class="mt-5">Sistema Electrónico de Gestión</h1>

                  <p class="lead">El propósito del desarrollo del Sistema Electrónico de Gestión (SEG) es dar cumplimiento a la DACG emitida por la Comisión reguladora de Energía (CRE) en la cual se establece.</p>
                
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12">
                <p class="lead">La creación de un Sistema Electrónico de Gestión. Plataforma electrónica desarrollada de manera independiente en la que el Transportista, Distribuidor y Contratistas reciben, procesan, registran y dan respuesta a las solicitudes de acceso a las instalaciones y derechos de vía del SEN provenientes de los Prestadores; ponen a disposición información relativa a las instalaciones y derechos de vía disponibles y mantienen una base de datos nacional conforme a las presentes disposiciones y cualquier otra información necesaria que determine la CRE como útil para el acceso de los Prestadores..</p>
            </div>
          </div>




        </div>
        <!-- <p>Back to <a href="../sticky-footer">the default sticky footer</a> minus the navbar.</p> -->

        <!--ATENCION A SOLICITUD DE PRESTADORES POR PARTE DE JURIDICO-->
        <jur-solic-prestadores :id_usuario="datos_usuario.idUsuario" :id_div="datos_usuario.idDiv" :id_zona="datos_usuario.idZona" v-if="perfil.jur.solpre"></jur-solic-prestadores>

      </main>

      <footer class="footer">
        <div class="container">
          <span class="text-muted">D.R. CFE/Distribución</span>
        </div>
      </footer>
    </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?= base_url();?>bootstrap/js/jquery-3.3.1.slim.min.js"></script>
    <!--<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>-->
    <script src="<?= base_url();?>bootstrap/js/polyfill.min.js"></script>
    <script src="<?= base_url();?>bootstrap/js/popper.min.js"></script>
    <script src="<?= base_url();?>bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url();?>bootstrap/js/bootstrap-vue.js"></script>
    <script src="<?= base_url();?>bootstrap/js/axios.js"></script>    
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="<?= base_url();?>bootstrap/js/holder.min.js"></script>
    <!--Instanciamos la aplicación Vue-->
    <script src="<?= base_url();?>bootstrap/js/app/store.js"></script>
    <!-- <script src="<?= base_url();?>bootstrap/js/app/login.js"></script> -->
    <script src="<?= base_url();?>bootstrap/js/app/components/jur.js"></script>
    <script src="<?= base_url();?>bootstrap/js/app/appseg.js"></script>

    <script type="text/javascript">
      $(document).ready(function() {
        $('#usuario').focus();  
      });

    </script> 
  </body>
</html>
