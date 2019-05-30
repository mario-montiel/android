Vue.component('comp-nav-bar',{

  data: function () {
    return {
    }
  },

    template: `
    <div id="app">
    
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">CFE</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
              </li>
            <li v-if="!perfilPracticante && !perfilJefeDptor" class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Gestión
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a v-if="perfilDivisional || perfilAdministrador" class="dropdown-item" href="#">Crear División</a>
                    <a v-if="perfilDivisional || perfilAdministrador" class="dropdown-item" href="#">Asignar a División</a>
                    <a v-if="perfilZona || perfilAdministrador" class="dropdown-item" href="#">Crear Zona</a>
                    <a v-if="perfilZona || perfilAdministrador" class="dropdown-item" href="#">Asignar a Zona</a>
                  </div>
              </li>
              <li v-if="!perfilPracticante" class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Solicitudes
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" @click.stop="verPracticantes(1)" href="#">Ver Practicantes</a>
                    <a class="dropdown-item" href="#">WuW</a>
                  </div>
              </li>
              <li class="nav-item dropdown" v-if="!perfilPracticante" >
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Reportes
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Practicantes Solicitados</a>
                    <a class="dropdown-item" href="#">Practicantes en espera</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Barra de Menús
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">7u7</a>
                    <a class="dropdown-item" href="#">Another 7u7 action</a>
                  </div>
              </li>
              <li class="nav-item dropdown">
                <a v-if="!perfilPracticante" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Catálogos
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Divisiones</a>
                    <a class="dropdown-item" href="#">Zonas</a>
                    <a class="dropdown-item" href="#">Practicantes</a>
                  </div>
              </li>
              <li class="nav-item dropdown">
                <a v-if="!perfilPracticante" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Bibliotecas
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">No se</a>
                    <a class="dropdown-item" href="#">que va</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">AQUI.. </a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="" tabindex="-1" @submit="salir()" aria-disabled="true">Salir</a>
              </li>
          </ul>
          <a v-if="usuario != ''" id="btnUsuario" class="btn btn-info responsive disabled">
             Usuario: {{nombreUsuario}}
          </a>
        </div>
    </nav>
  </div>
    `,
    computed: {
      login () {
          return this.$store.state.login
      },
      usuario () {
        return this.$store.state.datosUsuario
      },
      perfilAdministrador () {
        return this.$store.state.perfil.administrador.activo
      },
      perfilDivisional () {
        return this.$store.state.perfil.divisional.activo
      },
      perfilZona () {
        return this.$store.state.perfil.zona.activo
      },
      perfilJefeDptor () {
        return this.$store.state.perfil.jefedpto.activo
      },
      perfilPracticante () {
        return this.$store.state.perfil.practicantes.activo
      },
      nombreUsuario(){
        return this.$store.state.datosUsuario.usu_usuario
      }
    },
    methods: {
      acceder () {
        this.$store.commit('login');
      },
      salir () {
        location.href = 'http://localhost/index.php/Clogin/salir';
      },
      verPracticantes: function(item){
          store.commit('verPracticantes', item);
      }
    }
});