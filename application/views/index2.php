<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Obras Nacional</title>

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url();?>bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?= base_url();?>bootstrap/css/carousel.css" rel="stylesheet">
    
    <!-- Libraries for Vue Support -->
    <script src="<?= base_url();?>bootstrap/js/vue.js"></script>
    <script src="<?= base_url();?>bootstrap/js/vue-resource.min.js"></script>    

  </head>
  <body>

    <div id="app">    
      <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
          <a class="navbar-brand" href="#" v-if="login">{{titulo}}</a>
          <a class="navbar-brand" href="#" v-if="!login">{{datos_usuario.perf_nombre}}</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarCollapse">

            <ul class="navbar-nav mr-auto">
              <!--<li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
              </li>-->

              <li class="nav-item dropdown" v-if="!login">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Menu</a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                  <a class="dropdown-item" href="#" v-if="perfil.fn.activo" @click="procesa_opcion(11)">Agregar Obra</a>
                  <a class="dropdown-item" href="#" v-if="perfil.fn.activo">Validar requisitos</a>
                  <a class="dropdown-item" href="#" v-if="perfil.fn.activo">Transferencias</a>
                  <a class="dropdown-item" href="#" v-if="perfil.en.activo">Registrar obras</a>
                  <a class="dropdown-item" href="#" v-if="perfil.en.activo">Aprobación de solicitud</a>
                  <a class="dropdown-item" href="#" v-if="perfil.ed.activo">Solicitar monto</a>
                  <a class="dropdown-item" href="#" v-if="perfil.fd.activo">Revisión de solicitud</a>
                  <a class="dropdown-item" href="#" v-if="perfil.fn.activo">Reportes</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Acerca de...</a>
              </li>   
              <li class="nav-item">
                <a class="nav-link" href="#" v-on:click="salir()" v-if="!login">Salir</a>
              </li>                         
            </ul>
<!--             <form  class="navbar-form navbar-right">
              <div class="form-group">
                <input type="text" class="form-control" name="usuario" id="usuario" v-model="usuario.usu_rpe" required placeholder="Usuario">
              </div>
              <div class="form-group">
                <input type="password" class="form-control" name="password" id="password" v-model="usuario.usu_passwd" required placeholder="Password">
              </div>
              <button type="button" v-on:click="valida()" class="btn btn-success">Acceder</button>
            </form> -->

<!--             <ul class="navbar-nav mr-auto">

              <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" href="#">Disabled</a>
              </li>
            </ul> -->
            <form class="form-inline mt-2 mt-md-0" v-if="login">
              <div class="form-group">

                <input type="text" class="form-control mr-sm-2" name="usuario" id="usuario" v-model="usuario.usu_rpe" required placeholder="Usuario">

              </div>
              <div class="form-group">

                <input type="password" class="form-control mr-sm-2" name="password" id="password" v-model="usuario.usu_passwd" required placeholder="Password">

              </div>


              <!--<input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">-->
              <button type="button" v-on:click="valida()" class="btn btn-outline-success my-2 my-sm-0">Acceder</button>
            </form>


          </div>
        </nav>
      </header>

      <main role="main">
        <!-- <div id="myCarousel" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="first-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="First slide">
              <div class="container">
                <div class="carousel-caption text-left">
                  <h1>Example headline.</h1>
                  <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                  <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <img class="second-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Second slide">
              <div class="container">
                <div class="carousel-caption">
                  <h1>Another example headline.</h1>
                  <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                  <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <img class="third-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Third slide">
              <div class="container">
                <div class="carousel-caption text-right">
                  <h1>One more for good measure.</h1>
                  <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                  <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
                </div>
              </div>
            </div>
          </div>
          <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>-->


        <!-- Marketing messaging and featurettes
        ================================================== -->
        <!-- Wrap the rest of the page in another container to center all the content. -->

        <div class="container marketing" style="padding-top: 60px;" v-if="login">
          <!-- Three columns of text below the carousel -->
          <div class="row">
            <div class="col-lg-4">
              <img class="rounded-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
              <h2>Heading</h2>
              <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
              <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4">
              <img class="rounded-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
              <h2>Heading</h2>
              <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
              <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4">
              <img class="rounded-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
              <h2>Heading</h2>
              <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
              <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
            </div><!-- /.col-lg-4 -->
          </div><!-- /.row -->


          <!-- START THE FEATURETTES -->

          <hr class="featurette-divider">

          <div class="row featurette">
            <div class="col-md-7">
              <h2 class="featurette-heading">First featurette heading. <span class="text-muted">It'll blow your mind.</span></h2>
              <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
            </div>
            <div class="col-md-5">
              <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" alt="Generic placeholder image">
            </div>
          </div>

          <hr class="featurette-divider">

          <div class="row featurette">
            <div class="col-md-7 order-md-2">
              <h2 class="featurette-heading">Oh yeah, it's that good. <span class="text-muted">See for yourself.</span></h2>
              <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
            </div>
            <div class="col-md-5 order-md-1">
              <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" alt="Generic placeholder image">
            </div>
          </div>

          <hr class="featurette-divider">

          <div class="row featurette">
            <div class="col-md-7">
              <h2 class="featurette-heading">And lastly, this one. <span class="text-muted">Checkmate.</span></h2>
              <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
            </div>
            <div class="col-md-5">
              <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" alt="Generic placeholder image">
            </div>
          </div>

          <hr class="featurette-divider">

          <!-- /END THE FEATURETTES -->
        </div><!-- /.container -->


        <!--Se mostrará este container si no está en login-->
        <div class="container-fluid" style="padding-top: 60px;" v-else>

          <fn-agregar-obras v-if="perfil.fn.agr_obr" :usu_id="datos_usuario.usu_id"></fn-agregar-obras>


          <div class="row">
            <div class="col-md-8 offset-md-2">
              <!--<h3>Ya entró al sistema</h3>-->
            </div>
          </div>
           
        </div>
        <!-- FOOTER -->
        <!--<footer class="container">
          <p class="float-right"><a href="#">Back to top</a></p>
          <p>&copy; 2017-2018 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
        </footer>-->
      </main>
    </div> <!--app-->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?= base_url();?>bootstrap/js/jquery-3.3.1.slim.min.js"></script>
    <!--<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>-->
    <script src="<?= base_url();?>bootstrap/js/popper.min.js"></script>
    <script src="<?= base_url();?>bootstrap/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="<?= base_url();?>bootstrap/js/holder.min.js"></script>
    <!--Instanciamos la aplicación Vue-->
    <script src="<?= base_url();?>bootstrap/js/app/app.js"></script>

    <script type="text/javascript">
      $(document).ready(function() {
        $('#usuario').focus();  
      });

    </script>    

    <script type="text/template" id="fn-agregar-obras">
       <h1>Template de Agregar Obras</h1>
    </script>
  </body>
</html>
