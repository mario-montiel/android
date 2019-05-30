
//Componente que permitirá al usuario juridico dar seguimiento a las solicitudes de registro de prestador
Vue.component('jur-solic-prestadores', {
    props : {
        id_usuario: [Number,String],
        id_div : [Number,String],
        id_zona : [Number,String]
    },

    data: function () {
        return {
          //solic_prestadores: [],
          solic: true,
          buscar: '',
          procesando: false,
          list_prest:true,
          det_prest:false,
          botones_ar:true,
          obs_aut:false,
          obs_rech:false,
          cred_prest:false,
          cad_dp:'',  //Solo para pruebas, no se requerira despues QUITAR
          buscasp:'',
          ob_autoriza:'',
          ob_rechaza:'',
          cred_prestador:{claveUsuario:'',password:'', rpassword:''}
        }
    },

    computed: {
        solic_prestadores: function(){
            return store.state.solpre;
        },

        col_solpre: function(){
            return store.state.colsolpre;
        },

        solic_prestador: function() {
            return store.state.solprei;  
        }
    },
    //template: '#fn-agregar-obras'
    template: `
                <div class="row" style="padding-top: 30px;">
                    <div class="col-md-12 offset-md-0">
                        <div class="row justify-content-center align-items-center" v-if="procesando"><img src="./bootstrap/img/lg.comet-spinner.gif"></img></div>

                       
                        <div id="list_prest" v-if="list_prest">                 
                            <div class="row">                              
                                <div class="col-11">
                                    <legend>SEG - Estatus de Solicitudes de Acceso - Prestadores</legend>
                                </div>
                                <div class="col no-gutters" >
                                    <button @click="esconde_sp()" class="btn btn-secondary"><span class="fas fa-times"></span></button>
                                </div>                       
                                
                            </div>   
                        
                            <div class="row">
                                <div class="col-md">
                                    <div class="row" style="padding-top: 10px;">

                                        <div class="col-md-3">
                                            <input type="text" class="form-control" id="buscar" v-model="buscasp" placeholder="Buscar...">
                                            
                                        </div>
                                        <div class="col-md no-gutters">
                                            <div>
                                                <button class="btn btn-primary" @click="busca_sp()"><span class="fa fa-search"></span></button>
                                            </div>
                                        </div>                                                                                        
                                    </div>
                                    <div class="row" style="padding-top: 10px;">
                                        <div class="col-md">
                                        </div>                                                                                        
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                               <div class="col-md-12">

                                    <b-table striped hover small :fields="col_solpre" :items="solic_prestadores"  responsive>
                                       
                                        <template slot="index" slot-scope="data">
                                          {{data.index + 1}}
                                        </template>
                                        <template slot="empresa" slot-scope="data">
                                          <a :href="'#tablatd'" @click.stop="det_sol(data.item)">
                                            {{data.value}}
                                          </a>
                                        </template>                                        
                                        <template slot="foliop" slot-scope="data">
                                          <div class="text-left">{{data.item.foliop}}</div>
                                        </template>                
                                    </b-table>
                                </div>
                            </div>
                        </div> 

                        <div id = "det_prest" v-if="det_prest">
                            <div class="row">                              
                                <div class="col-11">
                                    <legend>SEG - Detalle de Solicitud - Prestador</legend>
                                </div>
                                <div class="col no-gutters" >
                                    <button @click="esconde_spi()" class="btn btn-secondary"><span class="fas fa-times"></span></button>
                                </div>                       
                                
                            </div> 
                            <div class="row">
                               <div class="col-12">

                                    <!--<form @submit.prevent="transf(1)" enctype="multipart/form-data">-->
                                    <hr>
                                    <form>
                                        <div class="row">

                                            <div class="col-2">
                                                <div class="form-group">
                                                    <label for="empresa">Folio Prestador</label>
                                                    <input type="text" class="form-control" id="foliop"  v-model="solic_prestador.foliop" disabled/>
                                                </div>
                                            </div>

                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="empresa">Empresa</label>
                                                    <input type="text" class="form-control" id="empresa"  v-model="solic_prestador.empresa" disabled/>
                                                </div>
                                            </div>

                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="domFiscal">Domicilio Fiscal</label>
                                                    <input type="text" class="form-control" id="domFiscal"  v-model="solic_prestador.domFiscal" disabled/>
                                                </div>
                                            </div>

                                            <div class="col-2">
                                                <div class="form-group">
                                                    <label for="rfc">RFC</label>
                                                    <input type="text" class="form-control" id="rfc"  v-model="solic_prestador.rfc" disabled/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">

                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="reponsable">Responsable</label>
                                                    <input type="text" class="form-control" id="responsable"  v-model="solic_prestador.responsable" disabled/>
                                                </div>
                                            </div>

                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="nacionalidad">Nacionalidad</label>
                                                    <input type="text" class="form-control" id="nacionalidad"  v-model="solic_prestador.nacionalidad" disabled/>
                                                </div>
                                            </div>

                                            <div class="col-md">
                                                <div class="form-group">
                                                    <label for="telefono">Teléfono</label>
                                                    <input type="text" class="form-control" id="telefono"  v-model="solic_prestador.telefono" disabled/>
                                                </div>
                                            </div>

                                            <div class="col-md">
                                                <div class="form-group">
                                                    <label for="email">EMAIL</label>
                                                    <input type="text" class="form-control" id="email"  v-model="solic_prestador.email" disabled/>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">

                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="dcsEstado">Estado de la Solic.</label>
                                                    <input type="text" class="form-control" id="dscEstado"  v-model="solic_prestador.dscEstado" disabled/>
                                                </div>
                                            </div>

                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="nacionalidad">Registro</label>
                                                    <input type="text" class="form-control" id="feRegistro"  v-model="solic_prestador.feRegistro" disabled/>
                                                </div>
                                            </div>

                                            <div class="col-md">
                                                <div class="form-group">
                                                    <label for="telefono">Ultima Actualización</label>
                                                    <input type="text" class="form-control" id="feActualiza"  v-model="solic_prestador.feActualiza" disabled/>
                                                </div>
                                            </div>

                                            <!--<div class="col-md">
                                                <div class="form-group">
                                                    <label for="email">Folio</label>
                                                    <input type="text" class="form-control" id="folioIdenti"  v-model="solic_prestador.folioIdenti" disabled/>
                                                </div>
                                            </div>-->
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <legend>Anexos</legend>
                                                <hr>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label for="docCedula">Cédula: </label>
                                                    <a :href="solic_prestador.docCedula" target="_new">{{solic_prestador.docCedula}}</a>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label for="dcsEstado">Doc. Poder: </label>
                                                    <a :href="solic_prestador.docPoder" target="_new">{{solic_prestador.docPoder}}</a>
                                                </div>
                                            </div>

                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label for="dcsIdenti">Doc. Identificación: </label>
                                                    <a :href="solic_prestador.docIdenti" target="_new">{{solic_prestador.docIdenti}}</a>
                                                </div>
                                            </div>

                                        </div>


                                        <div class="row" style="padding-top: 30px;" v-if="botones_ar">
                                           <div class="col-2 offset-3">
                                                <button type="button"  class="btn btn-success" @click="autoriza_pr()">Autorizar</button>
                                            </div>
                                           <div class="col-2 offset-2">
                                                <button type="button"  class="btn btn-danger" @click="rechaza_pr()">Rechazar</button>
                                            </div>
                                        </div>

                                        <div class="row" style="padding-top: 30px;" v-if="obs_aut">
                                            <div class="col-md">
                                                <div class="row">
                                                    <div class="col-md">
                                                        <div class="form-group">
                                                            <label for="ob_autoriza">Observaciones de la Autorización</label>
                                                            <textarea class="form-control" id="ob_autoriza"  v-model="ob_autoriza" rows="3"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                   <div class="col-2 offset-3">
                                                        <button type="button"  class="btn btn-success" @click="procesa_apr(1)">Aceptar</button>
                                                    </div>
                                                   <div class="col-2 offset-2">
                                                        <button type="button"  class="btn btn-danger" @click="procesa_apr(2)">Cancelar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row" style="padding-top: 30px;" v-if="obs_rech">
                                            <div class="col-md">
                                                <div class="row">
                                                    <div class="col-md">
                                                        <div class="form-group">
                                                            <label for="ob_rechaza">Observaciones del Rechazo</label>
                                                            <textarea class="form-control" id="ob_rechaza"  v-model="ob_rechaza" rows="3"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                   <div class="col-2 offset-3">
                                                        <button type="button"  class="btn btn-success" @click="procesa_rpr(1)">Aceptar</button>
                                                    </div>
                                                   <div class="col-2 offset-2">
                                                        <button type="button"  class="btn btn-danger" @click="procesa_rpr(2)">Cancelar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </form> 
                                    
                               </div>
                            </div>

                        </div> 

                        <!--captura y guardado de las credenciales del prestador-->
                        <div id = "cred_prest" v-if="cred_prest">
                            <div class="row">                              
                                <div class="col-11">
                                    <legend>SEG - Credenciales - Prestador</legend>
                                </div>
                                <div class="col no-gutters" >
                                    <button @click="esconde_cp()" class="btn btn-secondary"><span class="fas fa-times"></span></button>
                                </div>                       
                                
                            </div> 
                            <div class="row">
                               <div class="col-12">

                                    <!--<form @submit.prevent="transf(1)" enctype="multipart/form-data">-->
                                    <hr>
                                    <form @submit.prevent="envia_cred()">

                                        <div class="row">
                                            <div class="col-2 offset-5">
                                                <div class="form-group">
                                                    <label for="claveUsuario">Usuario</label>
                                                    <input type="text" class="form-control" id="claveUsuario"  v-model="cred_prestador.claveUsuario" required/>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-2 offset-5">
                                                <div class="form-group">
                                                    <label for="password">Contraseña</label>
                                                    <input type="text" class="form-control" id="password"  v-model="cred_prestador.password" required/>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-2 offset-5">
                                                <div class="form-group">
                                                    <label for="rpassword">Repita contraseña</label>
                                                    <input type="text" class="form-control" id="rpassword"  v-model="cred_prestador.rpassword" required/>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row" style="padding-top: 40px;">
                                           <div class="col-2 offset-5">
                                                <button type="submit"  class="btn btn-success">Enviar Contraseña</button>
                                            </div>
                                           <!--<div class="col-2 offset-2">
                                                <button type="button"  class="btn btn-danger" @click="procesa_rpr(2)">Cancelar</button>
                                            </div>-->
                                        </div>
                                    </form> 
                                    
                               </div>
                            </div>

                        </div> 

                    </div>
                </div>
                `,
    methods: {


        esconde_sp: function(){
            console.log('Esconde SP');
            //app.perfil.fn.wfn = false; //Esconde componente WorkFlow Nacional
            store.commit('vacia_solpre');
            app.perfil.jur.solpre = false;
        },
        esconde_spi: function(){
            console.log('Esconde SP');
            //app.perfil.fn.wfn = false; //Esconde componente WorkFlow Nacional
            //store.commit('vacia_solpre');
            //app.perfil.jur.solpre = false;
            this.list_prest = true;
            this.det_prest = false;
            this.obs_aut=false;
            this.obs_rech=false;
            this.botones_ar = true;
        },

        esconde_cp: function(){
            console.log('Esconde SP');
            //app.perfil.fn.wfn = false; //Esconde componente WorkFlow Nacional
            this.cred_prest = false;
            this.list_prest = true;
            //store.commit('vacia_solpre');
            //app.perfil.jur.solpre = false;
        },

        autoriza_pr: function(){
            this.obs_aut=true;
            this.botones_ar = false;
        },

        rechaza_pr: function(){
            this.obs_rech=true;
            this.botones_ar = false;
        },

        procesa_apr: function(accion){

            switch(accion) {
              case 1:
                console.log('Procesando Autorización');

                //Autorizar solicitud de acceso
                var ero = this;
                axios.post('index.php/jur/autsolacc',{solic_prestador:this.solic_prestador,ob_autoriza:this.ob_autoriza}).then(function (res) {
                        if(res.data)
                        {

                            var resp = {};
                            resp = res.data;
                            console.log(resp); 
                            if(resp.estatus)
                            {
                                ero.procesando = false;
                                store.commit('llena_solpre',resp.datos);
                                //ero.buscasp = "Buscar...";
                                ero.ob_autoriza = '';
                                ero.list_prest = true;
                                ero.det_prest = false;
                                ero.obs_aut=false;
                                ero.botones_ar = true;
                                console.log('Solicitudes entregadas al FE');
                                alert(resp.mensaje);
                            }
                            else
                            {
                                ero.procesando = false;
                                alert(resp.mensaje);
                            }  
                        }
                        else
                        {
                            ero.procesando = false;
                            console.log("No se pudo obtener el mensaje asociado a la acción.");
                        }
                    })
                    .catch(function (err) {
                        //ero.procesando = false;
                        console.log(err.message);
                    }); 



                break;
              case 2:
                this.botones_ar = true;
                this.obs_rech=false;
                this.obs_aut=false;
                

                break;

              default:
                // code block
            } 

            

        },

        procesa_rpr: function(accion){
            switch(accion) {
              case 1:
                console.log('Procesando Rechazo');


                break;
              case 2:
                this.botones_ar = true;
                this.obs_rech=false;
                this.obs_aut=false;
                

                break;
                
              default:
                // code block
            }

            this.ob_rechaza = '';
        },

        busca_sp: function(){
            console.log('Busca SP');
            //Vaciamos el arreglo de objetos del store ya que se volverá a llenar con la busqueda


            if(this.buscasp.trim() == '' || this.buscasp.trim() == 'Buscar...')
            {
               this.buscasp = "Todos";
            }

            store.commit('vacia_solpre');
            var ero = this;
            ero.procesando = true;
            //Vamos y traemos las solicitudes de registro de prestador filtradas
            axios.get('index.php/jur/bsolpres/' + this.id_div + '/' + this.buscasp).then(function (res) {
                    if(res.data)
                    {

                        var resp = {};
                        resp = res.data;
                        console.log(resp); 
                        if(resp.estatus)
                        {
                            ero.procesando = false;
                            store.commit('llena_solpre',resp.datos);
                            ero.buscasp = "Buscar...";
                            console.log('Solicitudes entregadas al FE');
                        }
                        else
                        {
                            ero.procesando = false;
                            alert(resp.mensaje);
                        }  
                    }
                    else
                    {
                        ero.procesando = false;
                        console.log("No se pudo obtener el mensaje asociado a la acción.");
                    }
                })
                .catch(function (err) {
                    ero.procesando = false;
                    console.log(err.message);
                });                  
        },

        det_sol: function(item){
            //console.log(JSON.stringify(item));
            store.commit('llena_solprei',item);
            console.log(item.idEstado);

            switch(item.idEstado)
            {
                case '2':

                    this.list_prest = false;
                    this.det_prest = true;
                    break;

                case '5':
                    this.list_prest = false;
                    this.cred_prest = true;
                    //alert('Aqui se generará el usuario y password para el prestador');

                    break;

                default:

            }
            //console.log('SOLICITUD:::: ' + JSON.stringify(this.solic_prestador));
            //alert('SOLCITUD:::: ' + JSON.stringify(this.solic_prestador));
            //this.cad_dp = JSON.stringify(this.solic_prestador);


        }

        
    

    },
    mounted: function(){
        console.log('Montado SP ');
        var ero = this;
        ero.procesando = true;

        //De entrada al montar el componente vamos y traemos las solicitudes pendientes o en atención via ajax
        axios.get('index.php/jur/solpres/' + this.id_div).then(function (res) {

                if(res.data)
                {
                    var resp = {};
                    resp = res.data;
                    console.log(resp); 
                    if(resp.estatus)
                    {
                        ero.procesando = false;
                        store.commit('llena_solpre',resp.datos);
                        console.log('Solicitudes entregadas al FE');
                    }
                    else
                    {
                        ero.procesando = false;
                        alert(resp.mensaje);
                    }  
                }
                else
                {
                    ero.procesando = false;
                    console.log("No se pudo obtener el mensaje asociado a la acción.");
                }              
                //console.log(res.data);
            })
            .catch(function (err) {
                ero.procesando = false;
                console.log(err.message);
            });   

    }

})


    // escondesp: function(){
        //     this.tobras = false;
        //     this.tinvs = true;           
        // }, 

        // escondesmo: function(){
        //     this.solmonob = false;
        //     this.tobras = true; 
        //     $('#doc_ruta').wrap('<form>').closest('form').get(0).reset();
        //     $('#doc_ruta').unwrap();
        //     document.getElementById('doc_ruta').files[0] = null;         
        // },  
        

        // format_moneda: function(valor){
        //     return accounting.formatMoney(valor);
        // },  

        // actualizawf: function(){
        //     app.perfil.fn.wfn = false;
        //     app.perfil.fn.wfn = true;
        //     //this.tinvs = true;           
        // },   
 
        // //Filtrar estatus de obras
        // feo: function(){
        //     this.procesando = true;
        //     this.tobras = false; 
        //     console.log('En FEO');
        //     this.$http.post('index.php/wf/feo',{estatus_obras:this.estatus_obras}).then(function(respuesta){
        //     //this.$http.get('index.php/ed/fici/'+this.dbinv.div_id+'/'+this.dbinv.inv_year).then(function(respuesta){
        //     //     //console.log(JSON.stringify(respuesta.body[0]));
        //          var resp = JSON.parse(JSON.stringify(respuesta.body));
                 
        //          if(resp)
        //          {
                     
        //              //resp = respuesta.body;
        //              console.log(resp);
        //              if(resp.estatus)
        //              {

        //                  this.obrasfilt = resp.datos;
        //                  this.procesando = false;
        //                  //this.tinvs = true;
        //                  //this.solmonob = false;
        //                  this.tobras = true;                         

        //              }
        //              else
        //              {
        //                  this.procesando = false;
        //                  //this.tinvs = false;
        //                  this.obrasfilt = [];
        //                  alert(resp.mensaje);

        //              }
        //          }
        //          else
        //          {
        //              console.log("No existen registros de obras acorde al filtro");
        //          }
        //     }, function(){
        //         alert('Error al contactar a la API Backend "valida".');
        //     }); 
        // },

        // //Registro de Obra
        // apsol: function(accion){
        //     //console.log(accion +''+ name +''+files);

        //     switch(accion){
        //         case 0:
        //             console.log('Cancelando');                   
        //             this.regob = false;
        //             break;

        //         case 1:
        //             //https://github.com/pagekit/vue-resource/blob/master/docs/recipes.md#forms

        //             var r = confirm("Al dar click en <Aceptar>, confirma los datos de la solicitud y no podrá deshacer la acción. . Desea continuar?");
        //             if (r == true) {
        //                 this.procesando = true;
        //                 //this.fdatos_obra.ob_aprobar = 1;
        //                 var formData = new FormData();

        //                 // append string
        //                 formData.append('datos', JSON.stringify({usu_id:this.usu_id, obra:this.fdatos_obra}));
        //                 //DESHABILITADO SOLAMENTE POR SI SE LES OCURRE ANEXAR DOCUMENTO DESPUES :)
        //                 //formData.append('file', document.getElementById('doc_ruta').files[0]);

        //                 // var config = {
        //                 //     onUploadProgress: function(progressEvent) {
        //                 //       var percentCompleted = Math.round( (progressEvent.loaded * 100) / progressEvent.total );
        //                 //     }
        //                 // };
        //                 //axios.post('index.php/en/regobrax', formData, config)
        //                 var ero = this;
        //                 //axios.post('index.php/en/regobrax', formData)
        //                 axios.post('index.php/en/apsol', formData)
        //                     .then(function (res) {
        //                     //output.className = 'container';
        //                     //output.innerHTML = res.data;
        //                         if(res.data)
        //                         {

        //                             var resp = {};
        //                             resp = res.data;
        //                             console.log(resp); 
        //                             if(resp.estatus)
        //                             {
        //                                 //alert(resp.datos.perf_perfil);
        //                                 //alert('Siiii');
        //                                 ero.procesando = false;
        //                                 ero.fici(); //Refrescamos el listado de inversiones
        //                                 ero.fdatos_obra = {};
        //                                 ero.solmonob = false;
        //                                 //$('#doc_ruta').wrap('<form>').closest('form').get(0).reset();
        //                                 //$('#doc_ruta').unwrap();
        //                                 //document.getElementById('doc_ruta').files[0] = null;
        //                                 alert('Requisitos validados por Finanzas Nacional de manera exitosa!!');
        //                             }
        //                             else
        //                             {
        //                                 ero.procesando = false;
        //                                 alert(resp.mensaje);
        //                             }  
        //                         }
        //                         else
        //                         {
        //                             ero.procesando = false;
        //                             console.log("No se pudo obtener el mensaje asociado a la acción.");
        //                         }
    
                                
                                
        //                         //console.log(res.data);
        //                     })
        //                     .catch(function (err) {
        //                     //output.className = 'container text-danger';
        //                     //output.innerHTML = err.message;
        //                         ero.procesando = false;
        //                         console.log(err.message);
        //                     });   
        //             }                 
        //             break;
        //         default:
        //             break;
        //     }
        // }











