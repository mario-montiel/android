var app = new Vue({
    el: '#app',
    store,
    data: {
      practicantes: []
    },
    computed: {
      login() {
        return this.$store.state.login
      },
      updateMessage(event) {
        this.$store.commit('updateMessage', event.target.value)
      },
      practicante () {
        return this.$store.state.perfil.administrador.practicantes
      }
    }
    
    /*computed:{
        contador(){
            return store.divisional.activo;
        }
    },
    methods:{
        valida: function(){
            console.log('Metodo valida Ejecutado');
            this.$http.post('index.php/valida', this.usuario).then(function(respuesta){
            });
        }
    }*/

});