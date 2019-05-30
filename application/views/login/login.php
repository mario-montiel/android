<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login</title>
  <link rel="icon" href="../../../../favicon.ico">
  <!-- Bootstrap core CSS -->
  <link href="<?= base_url();?>bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="<?= base_url();?>bootstrap/css/CFEpracticantes/login.css" rel="stylesheet">

  <!-- Libraries for Vue Support -->
  <script src="<?= base_url();?>bootstrap/js/vue.js"></script>
  <script src="<?= base_url();?>bootstrap/js/vue-resource.min.js"></script>  
</head>
<body>

<!--<div id="app">
<div class="container-fluid" id="logos">
  <div class="row">
    <div class="col-3"><img id="logo1" src="bootstrap/img/logocfe.png" alt=""></div>
    <div class="col-6">
      <center><h1 id="gpe">GPE</h1><h4 id="titulo">Gestión de Prácticas Escolares</h4></center>
    </div>
    <div class="col-3"><img id="logo2" src="bootstrap/img/suterm.png" alt=""></div>
  </div>
</div>

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img id="img1" src="bootstrap/img/energia.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img id="img2" src="bootstrap/img/utec3.jpeg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img id="img3" src="bootstrap/img/utec2.jpeg" class="d-block w-100" alt="...">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>



<?php echo validation_errors(); ?>
<?php echo form_open('Clogin/verificacion/'); ?>
<div class="container" id="login">
    <div class="card text">
      <div class="card-body" id="login-body">
      <form action="clogin/verificacion" method="post">
        <div class="form-group">
          <div class="row">
            <div id="col" class="col-3"><label for="">Usuario: </label></div>
            <div class="col-2"></div>
            <div id="col" class="col"><input name="usuario" type="text" class="form-control" id="usu_input" aria-describedby="emailHelp" placeholder="Usuario"></div>
            <div class="col-2"></div>
          </div>
        <div class="form-group">
          <div class="row">
          <div class="col-2"></div>
            <div id="col1" class="col"><input name="password" type="password" class="form-control" id="usu_pass" placeholder="Contraseña"></div>
            <div class="col-2"></div>
          </div>
        </div>
      </div>
        <center><button type="submit" class="btn">ACCEDER</button></center>
      </form>
      </div>
      <div class="card-footer text-muted">
        Comisión Federal de Electricidad
      </div>
    </div>
  </div>
  </div>-->
  <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?= base_url();?>bootstrap/js/jquery-3.3.1.slim.min.js"></script>
    <!--<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>-->
    <script src="<?= base_url();?>bootstrap/js/bootstrap.min.js"></script>
    <!-- Store -->
</body>
</html>