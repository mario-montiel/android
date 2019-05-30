const store = new Vuex.Store({
    state: {
        usuario:'',
        perfil:{
            administrador:{activo:false, practicantes:false},
            divisional:{activo:false},
            zona:{activo:false},
            jefedpto:{activo:false},
            practicantes:{activo:false}
        },
        datosUsuario: {},
        login: true,
        score: 0,
        tareas: []
    },
    getters: {
        score (state){
            return state.score = 10 + 5
        },
        result2 (state){
            return state.score = 10 + 15
        }
    },
    mutations: {
        /*set_login: function(state){
            store.state.login = false;
        },
        obtener_usuario: function(state){

        }*/
        increment (state, step) {
            state.score += step
            state.perfil.divisional.activo = true;
            state.login = true;
        },
        login (state) {
            state.login = false;
        },
        updateMessage(state, payload) {
            state.usuario = payload;
        },
        credencial(state, credencial){
            //console.log(credencial);
            if(credencial == 1){state.perfil.administrador.activo = true;}
            if(credencial == 2){state.perfil.divisional.activo = true;}
            if(credencial == 3){state.perfil.zona.activo = true;}
            if(credencial == 4){state.perfil.jefedpto.activo = true;}
            if(credencial == 5){state.perfil.practicantes.activo = true;}
        },
        verPracticantes(state, item){
            if(item == 1){state.perfil.administrador.practicantes = true;}
        }
    },
    actions: {
   
    },
    methods: {
        valida: function(){
            this.$http.post('http://localhost/index.php/Clogin/credenciales', this.usuario).then(function(respuesta){
                console.log(respuesta.status);

            },function(){
                alert('Error".');
            
            });
        }
    },
    
  })