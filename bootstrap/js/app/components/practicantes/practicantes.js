Vue.component('comp-practicantes',{

    data: function () {
        return {
            practicantes: [],
        }
      },

    template: `
    <div id="app">
    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
        <div>
        <input type="hidden" name="security->get_csrf_token_name();?>" value="security->get_csrf_hash();?>">
        
        <br>
        <br>
            <div class="container">
                <center>
                <h1>Practicantes</h1>
                <input id="buscar" type="search" class="form-control" placeholder="Buscar!..">
                </center>
            </div>
            <br>
            <br>
            <div class="container-fluid">
                <table class="table table-responsive table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Matrícula</th>
                        <th>Apellidos</th>
                        <th>Nombre</th>
                        <th>Teléfono 1</th>
                        <th>Teléfono 2</th>
                        <th>Correo</th>
                        <th>Calle y Colónia</th>
                        <th>CP</th>
                        <th>Ciudad</th>
                        <th>Estado</th>
                        <th>Nivel Acedémico</th>
                        <th>Universidad</th>
                        <th>Estatus</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="practicante in practicantes">
                        <td class="mat"> {{practicante.prac_id}} </td>
                        <td> {{practicante.prac_matricula}} </td>
                        <td> {{practicante.prac_appaterno+' '+practicante.prac_apmaterno}} </td>
                        <td> {{practicante.prac_nombre}} </td>
                        <td> {{practicante.prac_telefono1}} </td>
                        <td> {{practicante.prac_telefono2}} </td>
                        <td> {{practicante.prac_email}} </td>
                        <td> {{practicante.prac_calle+', '+practicante.prac_colonia}} </td>
                        <td> {{practicante.prac_cp}} </td>
                        <td> {{practicante.ciu_nombre}} </td>
                        <td> {{practicante.est_nombre}} </td>
                        <td> {{practicante.te_tipo}} </td>
                        <td> {{practicante.esc_nombre}} </td>
                        <td v-if="practicante.estatus == 1"> <button class="btn btn-success btn-enabled" type="submit" @click="solicitar(practicante.prac_id)">Solicitar</button> </td>
                        <td v-if="practicante.estatus == 0"> <button class="btn btn-dark btn-disabled" disabled>Solicitado</button> </td>
                    </tr>
                </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- <button id="btnSolicitar" class="btn btn-success">Solicitar</button> -->
    `,
    computed: {

    },
    created(){
        this.getDatos();
    },
    methods: {
        getDatos () {
            this.$http.post('http://localhost/index.php/Cpracticantes/getDatos').then(function(respuesta){
                this.practicantes = respuesta.data;
            },function(){
                Swal.fire({
                    type: 'error',
                    title: 'Oops...',
                    text: 'Falló la autenticación de usuario'
                })
            }); 
        },
        solicitar ($practicante) {
            //console.log($practicante);
            this.$http.post('http://localhost/index.php/Cpracticantes/solicitar',{$practicante, $mensaje:"Solicitar Practicante"}).then(function(respuesta){
                //this.practicantes = respuesta.data;
                console.log(respuesta.data);
                this.estatus = false;
                Swal.fire({
                    position: 'top-end',
                    type: 'success',
                    title: 'Solicitud de practicante Exitosa!',
                    showConfirmButton: false,
                    timer: 2000
                });
            }, function(){
                Swal.fire({
                    type: 'error',
                    title: 'Oops...',
                    text: 'Falló la Solicitud de Practicante'
                  })
            });
            //this.$store.state.administrador.practicantes = false;
        },
        estatus () {

        }
    }
      
});