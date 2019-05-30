Vue.component('comp-login',{

  props : {
    usu_id: [Number,String],
    za_id : [Number,String],
    usu_tipo : [Number,String]
  },

    data: function () {
        return {
          user: '',
          pass: '',
          datos: {},
          login: true
        }
    },

    template: `
    <div id="app" v-if="login">
    <div class="container-fluid" id="logos">
    <div class="row">
        <div class="col-3"><img id="logo1" src="http://localhost/bootstrap/img/logocfe.png" alt=""></div>
        <div class="col-6">
        <center><h1 id="gpe">GPE</h1><h4 id="titulo">Gestión de Prácticas Escolares</h4></center>
        </div>
        <div class="col-3"><img id="logo2" src="http://localhost/bootstrap/img/suterm.png" alt=""></div>
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
        <img id="img1" src="http://localhost/bootstrap/img/energia.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
        <img id="img2" src="http://localhost/bootstrap/img/utec3.jpeg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
        <img id="img3" src="http://localhost/bootstrap/img/utec2.jpeg" class="d-block w-100" alt="...">
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
    <?php echo form_open('Clogin/credenciales/'); ?>
    <div class="container" id="login">
        <div class="card text">
        <div class="card-body" id="login-body">
        <!--<form action="clogin/verificacion" method="post">-->
            <div class="form-group">
            <div class="row">
                <!--<div id="col" class="col-3"><label for="">Usuario: </label></div>-->
                <div class="col-2"></div>
                <div id="col" class="col"><input name="usuario" v-model="user" @keyup.enter="acceder()" type="text" class="form-control" id="usu_input" aria-describedby="emailHelp" placeholder="Usuario"></div>
                <div class="col-2"></div>
            </div>
            <div class="form-group">
            <div class="row">
            <div class="col-2"></div>
                <div id="col1" class="col"><input name="password" v-model="pass" @keyup.enter="acceder()" type="password" class="form-control" id="usu_pass" placeholder="Contraseña"></div>
                <div class="col-2"></div>
            </div>
            </div>
        </div>
            <center><button type="submit" class="btn" @click="acceder()">ACCEDER</button></center>
        </form>
        </div>
        <div class="card-footer text-muted">
            Comisión Federal de Electricidad
        </div>
        </div>
    </div>
    </div>
`,
  computed: {
    /*login () {
        return this.$store.state.usuario
    },
    usuario () {
      return this.$store.state.usuario
    },
    name: function() {
      return this.$store.state.usuario
    },
    pruebon(){
      return this.user;
    }
  },
  get() {
    return this.$store.state.usuario
  },
  set(user) {
    this.$store.commit('updateMessage', user)*/
  },
  computed: {
    nombreUsuario(){
      return this.$store.state.datosUsuario.usu_usuario
    }
  },
  methods: {
    obtenercredenciales(){
      this.$store.state.usuario = this.user;
      console.log(this.$store.state.usuario);
    },
    acceder (){
      //console.log(this.user);
      this.$http.post('http://localhost/index.php/Clogin/credenciales',{usu_usuario:this.user, usu_password:this.pass}).then(function(respuesta){

      //console.log(respuesta.data.datos);
      if(respuesta.data){
        this.$store.state.datosUsuario = respuesta.data.datos;
        console.log(this.$store.state.datosUsuario);
        this.$store.commit('login');
        this.$store.commit('credencial', respuesta.data.datos.usu_tipo);
        Swal.fire({
          title: 'Buen día <br>'+this.$store.state.datosUsuario.usu_usuario,
          showConfirmButton: false,
          animation: false,
          timer: 1500,
          customClass: {
            popup: 'animated tada'
          }
        })
      }
      else{
        alert("Usuario o Contraseña Incorrectas");
        return false;
      }
    }, function(){
      alert('No se ha podido iniciar sesión.');
      this.cargando_tareas = false;
    }); 
      
    },
    /*credenciales(){
      //console.log(this.$store.state.datosUsuario);
        axios.post('http://montiel.test/index.php/Clogin/credenciales',{usu_usuario:this.user, usu_password:this.pass}).then(function (res) {
          //console.log(this.$store.state.datos_usuario);
          console.log(res);
          

          //console.log(res.data.datos.usu_usuario);
            if(res.data){
              //console.log(res);
              this.login = false;
              this.datos = res.data.datos;
              
              //console.log(res.data.datos.usu_usuario);
              this.login = true
              
            }
            else{
              alert("Usuario o Contraseña Incorrectas");
              this.login = false;
            }

            //return this.datos;
            
        }).catch(function () {
            //ero.procesando = false;
            console.log('nachus');
        }); 
        //this.$store.commit('login');
       //console.log(this.datos);
        //this.$store.state.datosUsuario = this.datos;
        //console.log(this.$store.state.datosUsuario)
        
    }*/
  }
});