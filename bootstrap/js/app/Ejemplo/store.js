const store = new Vuex.Store({
  state: {
    //Quitar el codigo dependiente de prueba, no se usará
    count: 0, 
    //Aqui se almacenarán las solicitudes de acceso una ves que se realice el ajax 
    //desde el componente jur-solic-prestadores en lugar de usar almacenamiento local.
    solpre: [],
    colsolpre: [{ key: 'index', label: 'Cons.' },{ key: 'foliop', label: 'Folio' },{ key: 'feRegistro', label: 'Fecha Registro' },'asunto','empresa',{ key: 'dscEstado', label: 'Estatus' },'limite', { key: 'restan', label: 'Restan (Dd Hh)' } , 'division'] ,
    solprei:{} //Solicitud de un prestador como objeto para visualizar el detalle

  },
  mutations: {
    increment (state) {
      console.log('Se incrementó count');
      state.count++;
    },

    llena_solpre (state, solicitudes) {
    	state.solpre = solicitudes;
    },

    vacia_solpre (state) {
    	state.solpre = [];
    },

    llena_solprei(state,solicitud){
      state.solprei = solicitud;
    }


  }
})