var app = new Vue({
    	el: '#app',
        //store,
        //components: { 'jur-solic-prestadores' },
    	data: {
    		
    		//Mediante mensaje se crea un enlace de datos entre la pagina web y la app
        	titulo: 'Sistema Electrónico de Gestión',
            usuario: {usu_rpe:'9ehg7',usu_passwd:'Distr123*'},
            logo: 'http://10.14.3.89/obras/bootstrap/images/logo-cfe.png',
            perfil : {
                jur:{activo:false,solpre:false},
                pla:{activo:false},
                scl:{activo:false}
            },            
            datos_usuario:{},
            login: true,
            altas:false,
            bajas:false,
            modif:false,
            list:false
            
        
    	},

        computed: {
            contador () {
                return store.state.count;
            }
        },        
    	methods: {
    		valida: function(){
                //Mandamos los datos del usuario al backend

                console.log('Metodo valida Ejecutado');
                this.$http.post('index.php/valida', this.usuario).then(function(respuesta){
                    //console.log(JSON.stringify(respuesta.body[0]));
                    if(respuesta.body)
                    {
                        var resp = {};
                        resp = respuesta.body;

                        console.log(resp);

                        if(resp.estatus)
                        {

                            switch(resp.datos.idProceso){

                                case '1':
                                    this.perfil.jur.activo = true;
                                    console.log('HIIII');
                                    this.perfil.jur.solpre = true;
                                    console.log('1');
                                    break;
                                case '2':
                                    this.perfil.pla.activo = true;
                                    console.log('2');
                                    break;
                                case '3':
                                    this.perfil.scl.activo = true;
                                    console.log('3');
                                    break;
                                default:
                                break;

                            }                            
                            this.datos_usuario = resp.datos;
                            this.login = false;
                            //this.usuario = {};
                            //alert(resp.mensaje);


                        }
                        else
                        {
                            alert(resp.mensaje);
                        }
                        //console.log(respuesta.body);
                        //this.valores_metrica = respuesta.body;

                    }
                    else
                    {
                        console.log("No existen registros asociados la métrica indicada");
                    }               
                }, function(){
                    alert('Error al contactar a la API Backend "valida".');
                });

            },

            procesa_opcion: function(opcion){
                console.log('El procesa_opcion');
                switch (opcion) {
                    case 11:
                        app.perfil.jur.solpre = true;
                        // statements_1
                        break;

                    case 2:
                        this.altas = false;
                        this.bajas = true;
                        this.modif = false;
                        this.list = false;
                        // statements_1
                        break;

                    case 3:

                        this.altas = false;
                        this.bajas = false;
                        this.modif = true;
                        this.list = false;
                        //listtrab();
                        // statements_1
                        break;

                    default:
                        // statements_def
                        break;
                }
             },
            salir: function(){
                console.log('Saliendo Yaaaa!!');
                location.href = 'http://10.14.3.89/segdev/';
            }
             //,

            // altatrab: function(){
            //     //this.trabajador.zona_id=$('#zonas').val();
            //     this.$http.post('index.php/altatrab', this.trabajador).then(function(respuesta){
            //         //console.log(JSON.stringify(respuesta.body[0]));
            //         if(respuesta.body)
            //         {
            //             var resp = {};

            //             resp = respuesta.body;

            //             alert(resp.mensaje);

            //             console.log(resp);
            //         }
            //         else
            //         {
            //             console.log("No existen registros asociados la métrica indicada");
            //         }               
            //     }, function(){
            //         alert('Error al contactar a la API Backend "valida".');
            //     });
            // },

            // bajatrab: function(){

            //     var r = confirm("Realmente desea dar de baja al trabajador?");
            //     if (r == true) {
            //         //alert('Stop');
            //         this.$http.post('index.php/bajatrab', this.trabajador).then(function(respuesta){
            //             //console.log(JSON.stringify(respuesta.body[0]));
            //             if(respuesta.body)
            //             {
            //                 var resp = {};
            //                 resp = respuesta.body;

            //                 alert(resp.mensaje);

            //                 console.log(resp);
            //             }
            //             else
            //             {
            //                 console.log("No existen registros asociados la métrica indicada");
            //             }               
            //         }, function(){
            //             alert('Error al contactar a la API Backend "valida".');
            //         });
            //     } 

            // },

            // mlisttrab: function(){

            //     this.altas = false;
            //     this.bajas = false;
            //     this.modif = false;
            //     this.list = true;
            //     //alert('Hola');

            //     this.$http.get('index.php/listtrab').then(function(respuesta){
            //         //console.log(JSON.stringify(respuesta.body[0]));
            //         if(respuesta.body)
            //         {
            //             //{estatus:1,mensaje:'',datos:[{trab_id:1,},{trab_id:2},...{trab_id:99,}]}
            //             var resp = {};
            //             resp = respuesta.body;

            //             if(resp.estatus)
            //             {
            //                 this.listtrab = resp.datos;
            //             }
            //             else
            //             {
            //                 alert(resp.mensaje);
            //             }

            //             console.log(resp);
            //         }
            //         else
            //         {
            //             console.log("No existen registros asociados la métrica indicada");
            //         }               
            //     }, function(){
            //         alert('Error al contactar a la API Backend "valida".');
            //     });
            // },

            // traetrab: function(){

            //     //var r = confirm("Realmente desea dar de baja al trabajador?");
            //     //if (r == true) {
            //         //alert('Stop');
            //         this.$http.post('index.php/traetrab', this.trabajador).then(function(respuesta){
            //             //console.log(JSON.stringify(respuesta.body[0]));
            //             if(respuesta.body)
            //             {
            //                 var resp = {};
            //                 resp = respuesta.body;

            //                 if(resp.estatus){
            //                     this.trabajador = resp.datos;
            //                 }
            //                 else
            //                 {
            //                     alert(resp.mensaje);
            //                 }

            //                 //alert(resp.mensaje);

            //                 console.log(resp);
            //             }
            //             else
            //             {
            //                 console.log("No existen registros asociados la métrica indicada");
            //             }               
            //         }, function(){
            //             alert('Error al contactar a la API Backend "valida".');
            //         });
            //     //} 

            // },

            // modiftrab: function(){

            //     //var r = confirm("Realmente desea dar de baja al trabajador?");
            //     //if (r == true) {
            //         //alert('Stop');
            //         this.$http.post('index.php/modiftrab', this.trabajador).then(function(respuesta){
            //             //console.log(JSON.stringify(respuesta.body[0]));
            //             if(respuesta.body)
            //             {
            //                 var resp = {};
            //                 resp = respuesta.body;

            //                 if(resp.estatus)
            //                 {
            //                     this.trabajador.trab_id=0;
            //                     this.trabajador.trab_rpe='';
            //                     this.trabajador.trab_nombre='';
            //                     this.trabajador.trab_categ='';
            //                     this.trabajador.trab_tc='';
            //                     this.trabajador.trab_sexo='';
            //                     this.trabajador.trab_fechanac='';
            //                     this.trabajador.zona_id=0;
            //                     $('#consrpe').focus();

            //                 }

            //                 alert(resp.mensaje);

            //                 console.log(resp);
            //             }
            //             else
            //             {
            //                 console.log("No existen registros asociados la métrica indicada");
            //             }               
            //         }, function(){
            //             alert('Error al contactar a la API Backend "valida".');
            //         });
            //     //} 

            // },

            // catzonas: function(){

            //     this.$http.get('index.php/catzonas').then(function(respuesta){
            //         //console.log(JSON.stringify(respuesta.body[0]));
            //         if(respuesta.body)
            //         {
            //             //{estatus:1,mensaje:'',datos:[{trab_id:1,},{trab_id:2},...{trab_id:99,}]}
            //             var resp = {};
            //             resp = respuesta.body;

            //             if(resp.estatus)
            //             {
            //                 this.zonas = resp.datos;
            //             }
            //             else
            //             {
            //                 alert(resp.mensaje);
            //             }

            //             console.log(resp);
            //         }
            //         else
            //         {
            //             console.log("No existen registros asociados la métrica indicada");
            //         }               
            //     }, function(){
            //         alert('Error al contactar a la API Backend "valida".');
            //     });
            // }


        },
        created: function(){

            // var i = 0;
            // var timerid = setInterval(function(){
            //     store.commit('increment');
            //     console.log(store.state.count);
            //     i++;
            //     if(i == 20)
            //     {
            //         clearInterval(timerid);
            //     }
            // },1000);


            

                        
    	   	console.log("Objeto Creado");
        },

        mounted: function(){
            //alert('montado');
            
        }   

})