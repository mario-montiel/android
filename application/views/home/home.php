<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--<input type="hidden" name="_token" value="$token_value">-->
    <!--<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}"> -->
    <title>GPE Gestión de Practicas Escolares</title>
    <!-- Bootstrap core CSS -->
    <link href="<?= base_url();?>bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?= base_url();?>bootstrap/css/CFEpracticantes/home.css" rel="stylesheet">
    <link href="<?= base_url();?>bootstrap/css/CFEpracticantes/login.css" rel="stylesheet">
    <link href="<?= base_url();?>bootstrap/css/CFEpracticantes/navbar.css" rel="stylesheet">
    <link href="<?= base_url();?>bootstrap/css/CFEpracticantes/practicantes.css" rel="stylesheet">
    <link href="<?= base_url();?>bootstrap/css/CFEpracticantes/animaciones.css" rel="stylesheet">
    
    <!-- Libraries for Vue Support -->
    <script src="<?= base_url();?>bootstrap/js/vue.js"></script>
    <script src="<?= base_url();?>bootstrap/js/vuex.js"></script>
    <script src="<?= base_url();?>bootstrap/js/vue-resource.min.js"></script>  
</head>

<body>

<div id="app">
  <template>
    <!--<Login>-->
    <div>
      <comp-login v-if="login"></comp-login>
    </div>
    <!--</Login>-->
    <div>
    <!-- NAV BAR -->
      <comp-nav-bar v-if="!login"></comp-nav-bar>
    <!-----          ----------->
    </div>
    <div>
      <comp-practicantes v-if="practicante"></comp-practicantes>
    </div>
  </template>
</div>

<!--<pruebon></pruebon>-->

 <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?= base_url();?>bootstrap/js/jquery-3.3.1.slim.min.js"></script>
    <script src="<?= base_url();?>bootstrap/js/sweetalert2.all.min.js"></script>
    <!--<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>-->
    <script src="<?= base_url();?>bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url();?>bootstrap/js/axios.js"></script>

    <!-- Components -->
    <script src="<?= base_url();?>bootstrap/js/app/components/login/login.js"></script>
    <script src="<?= base_url();?>bootstrap/js/app/components/navbar/navbar.js"></script>
    <script src="<?= base_url();?>bootstrap/js/app/components/practicantes/practicantes.js"></script>

    <!-- Store -->
    <script src="<?= base_url();?>bootstrap/js/app/store.js"></script>
    <script src="<?= base_url();?>bootstrap/js/app/vue.js"></script>
    
    
    
</body>
</html>