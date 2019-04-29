$(document).ready(function(){
    setTimeout(function() {
        $("p").fadeOut(1500);
    },3000);


    $('#btnactalumno').click(function(){
        var alumno = $('#alumnoActualizar').val();
        var horas = $('#horasActualizar').val();

        if(alumno.length == "" || horas.length == ""){
            alert("Llene todos los campos para continuar.");
            return false;
        }
    });

var id = '';
var idsolicitud = '';

$('#modalActualizarAlumno').on('show.bs.modal', function (event) {
 
 var button = $(event.relatedTarget) // Button that triggered the modal
 idsolicitud = button.data('idsolicitudes')
 id = button.data('id')
 var matricula = button.data('matricula') 
 var alumno = button.data('alumno') 
 var carrera = button.data('carrera')
 var cuatrimestre = button.data('cuatrimestre')
 var taller = button.data('taller')
 var horas = button.data('horas')

 var modal = $(this)

 modal.find('.modal-body #idActualizar').val(id)
 modal.find('.modal-body #matriculaActualizar').val(matricula)
 modal.find('.modal-body #alumnoActualizar').val(alumno)
 modal.find('.modal-body #carreraActualizar').val(carrera)
 modal.find('.modal-body #cuatrimestreActualizar').val(cuatrimestre)
 modal.find('.modal-body #horasActualizar').val(horas)
 modal.find('.modal-body #tallerActualizar').val(taller)
});

$('.btn-act-alumno').click(function(e){
   e.preventDefault();
   var form_update = $('#form-act-alumno');
   var url = form_update.attr('action');
   var url_update = url+"/"+id+"/"+idsolicitud;
   var horas = $('#horas').val();
   if(horas > 480){
    Swal.fire({
        type: 'error',
        title: 'Oops...',
        text: 'Solo se permiten 480 horas!',
        footer: '<a href>Ingrese una cantidad menor a 480 horas</a>'
      })
        return false;
    }
   $.post(url_update, form_update.serialize(), function(result){
       //row.fadeOut();
              e.preventDefault();
               $value = $('#buscadoralumno').val();
               
               $.ajax({
                   type: 'GET',
                   url:  '/buscadoralumno',
                   data: {'buscadoralumno':$value},
                   success:function(data){
                       var horas;
                        $('#alumnos').html("");
                        $.each(data, function(i, item) {
                        if(item.tipos_personas_id_tipo_persona == 2){
                                    if( item.horas_servicio_social == null){horas = 0}
                                    else{
                                                    horas = item.horas_servicio_social;
                                    }
                                    changos = "<tr><td>" +
                                        item.matricula + "</td><td>" +
                                        item.nombre + "</td><td>" +
                                        item.carrera + "</td><td>" +
                                        item.cuatrimestre + "</td><td>" +
                                        item.taller + "</td><td>" +
                                        horas + "</td><td>" +
                                        item.created_at + "</td><td>" +
                                        item.updated_at + "</td><td>" +
                                        "<button  data-alumno="+item.alumno+" data-horas="+item.horas_servicio_social+" data-toggle='modal' data-target='#modalActualizarAlumno' class='btn btn-warning'><img id='update' src='img/update.png'></button>" + 
                                        "</td>";
                                    $('#alumnos').append(changos);
                        }
                        }); 
                        $('#profesores').html("");
                        $.each(data, function(i, item) {
                        if(item.tipos_personas_id_tipo_persona == 1){
                               
                                changos = "<tr><td>" +
									item.nombre + "</td><td>" +
                                    item.taller + "</td><td>" +
                                    item.created_at + "</td><td>" +
                                    item.updated_at + "</td><td>" +
									"<button  data-alumno="+item.alumno+" data-horas="+item.horas_servicio_social+" data-toggle='modal' data-target='#modalActualizarAlumno' class='btn btn-warning'><img id='update' src='img/update.png'></button>" + 
									"</td>";
                                $('#profesores').append(changos);
                        }
                    });
                
                    
                    Swal.fire({
                        position: 'top-end',
                        type: 'success',
                        title: 'Alumno actualizado correctamente',
                        showConfirmButton: false,
                        timer: 1500
                    })
				},
                    error: function () {
                        Swal.fire({
                            type: 'error',
                            title: 'Oops...',
                            text: 'Algo salió mal!',
                            footer: '<a href>Intentelo de nuevo</a>'
                          })
                    }
               });
       
   }).fail(function(){
    Swal.fire({
        type: 'error',
        title: 'Oops...',
        text: 'La actualización del alumno falló',
        footer: '<a href>Intentelo de nuevo</a>'
      })
   })
})


var idtaller;
var idprofe;

$('#modalActualizarProfesor').on('show.bs.modal', function (event) {
 
    var button = $(event.relatedTarget) // Button that triggered the modal
    idprofe = button.data('id')
    idtaller  = button.data('idtaller');
    var profesor = button.data('profesor') 
    var taller = button.data('taller')
    var modal = $(this)
    modal.find('.modal-body #idActualizar').val(id)
    modal.find('.modal-body #profesorActualizar').val(profesor)
    modal.find('.modal-body #tallerActualizar').val(taller)
   });
   
   $('.btn-act-profesor').click(function(e){
      e.preventDefault();
      var form_update = $('#form-act-profesor');
      var url = form_update.attr('action');
      var url_update = url+"/"+idprofe;
      
      $.post(url_update, form_update.serialize(), function(result){
          //row.fadeOut();
                 e.preventDefault();
                  $value = $('#buscadoralumno').val();
                  
                  $.ajax({
                      type: 'GET',
                      url:  '/buscadoralumno',
                      data: {'buscadoralumno':$value},
                      success:function(data){
                          var horas;
                           $('#alumnos').html("");
                           $.each(data, function(i, item) {
                               console.log(item.tipos_personas_id_tipo_persona);
                           if(item.tipos_personas_id_tipo_persona == 2){
                                       if( item.horas_servicio_social == null){horas = 0}
                                       else{
                                                       horas = item.horas_servicio_social;
                                       }
                                       changos = "<tr><td>" +
                                           item.matricula + "</td><td>" +
                                           item.nombre + "</td><td>" +
                                           item.carrera + "</td><td>" +
                                           item.cuatrimestre + "</td><td>" +
                                           item.taller + "</td><td>" +
                                           horas + "</td><td>" +
                                           item.created_at + "</td><td>" +
                                           item.updated_at + "</td><td>" +
                                           "<button  data-alumno="+item.alumno+" data-horas="+item.horas_servicio_social+" data-toggle='modal' data-target='#modalActualizarAlumno' class='btn btn-warning'><img id='update' src='img/update.png'></button>" + 
                                           "</td>";
                                       $('#alumnos').append(changos);
                           }
                           }); 
                           $('#profesores').html("");
                           $.each(data, function(i, item) {
                           if(item.tipos_personas_id_tipo_persona == 1){
                                  
                                   changos = "<tr><td>" +
                                       item.nombre + "</td><td>" +
                                       item.taller + "</td><td>" +
                                       item.created_at + "</td><td>" +
                                       item.updated_at + "</td><td>" +
                                       "<button  data-alumno="+item.alumno+" data-horas="+item.horas_servicio_social+" data-toggle='modal' data-target='#modalActualizarAlumno' class='btn btn-warning'><img id='update' src='img/update.png'></button>" + 
                                       "</td>";
                                   $('#profesores').append(changos);
                           }
                       });
                   
                       
                       Swal.fire({
                           position: 'top-end',
                           type: 'success',
                           title: 'Profesor actualizado correctamente',
                           showConfirmButton: false,
                           timer: 1500
                       })
                   },
                       error: function () {
                           Swal.fire({
                               type: 'error',
                               title: 'Oops...',
                               text: 'Algo salió mal!',
                               footer: '<a href>Intentelo de nuevo</a>'
                             })
                       }
                  });
          
      }).fail(function(){
       Swal.fire({
           type: 'error',
           title: 'Oops...',
           text: 'La actualización del profesor falló',
           footer: '<a href>Intentelo de nuevo</a>'
         })
      })
   })




   $('#modalEliminarProfesor').on('show.bs.modal', function (event) {
  
    var button = $(event.relatedTarget) // Button that triggered the modal
    idprofe = button.data('id')
    idtaller  = button.data('idtaller');
    var modal = $(this)
      
  });
    
$('.btn-delete-profesor').click(function(e){
    e.preventDefault();
    var form_eliminar = $('#form-delete-profesor');
    var url = form_eliminar.attr('action');
    var url_eliminar = url+"/"+idtaller;
    
    $.post(url_eliminar, form_eliminar.serialize(), function(result){
        //row.fadeOut();
               e.preventDefault();
                $value = $('#buscadoralumno').val();
                $.ajax({
                    type: 'GET',
                    url:  '/buscadoralumno',
                    data: {'buscadoralumno':$value},
                    success:function(data){
                        var horas;
                         $('#alumnos').html("");
                         $.each(data, function(i, item) {
                             console.log(item.tipos_personas_id_tipo_persona);
                         if(item.tipos_personas_id_tipo_persona == 2){
                                     if( item.horas_servicio_social == null){horas = 0}
                                     else{
                                                     horas = item.horas_servicio_social;
                                     }
                                     changos = "<tr><td>" +
                                         item.matricula + "</td><td>" +
                                         item.nombre + "</td><td>" +
                                         item.carrera + "</td><td>" +
                                         item.cuatrimestre + "</td><td>" +
                                         item.taller + "</td><td>" +
                                         horas + "</td><td>" +
                                         item.created_at + "</td><td>" +
                                         item.updated_at + "</td><td>" +
                                         "<button  data-alumno="+item.alumno+" data-horas="+item.horas_servicio_social+" data-toggle='modal' data-target='#modalActualizarAlumno' class='btn btn-warning'><img id='update' src='{{ asset('img/update.png') }}''></button>" + 
                                         "</td>";
                                     $('#alumnos').append(changos);
                         }
                         }); 
                         $('#profesores').html("");
                         $.each(data, function(i, item) {
                         if(item.tipos_personas_id_tipo_persona == 1){
                                
                                 changos = "<tr><td>" +
                                     item.nombre + "</td><td>" +
                                     item.taller + "</td><td>" +
                                     item.created_at + "</td><td>" +
                                     item.updated_at + "</td><td>" +
                                     "<button  data-alumno="+item.alumno+" data-horas="+item.horas_servicio_social+" data-toggle='modal' data-target='#modalActualizarAlumno' class='btn btn-warning'><img id='update' src='{{ asset('img/update.png') }}''></button>" + 
                                     "</td>";
                                 $('#profesores').append(changos);
                         }
                     });
                 
                     
                     Swal.fire({
                         position: 'top-end',
                         type: 'success',
                         title: 'Profesor actualizado correctamente',
                         showConfirmButton: false,
                         timer: 1500
                     })
                 },
                     error: function () {
                         Swal.fire({
                             type: 'error',
                             title: 'Oops...',
                             text: 'Algo salió mal!',
                             footer: '<a href>Intentelo de nuevo</a>'
                           })
                     }
                });
        
    }).fail(function(){
     Swal.fire({
         type: 'error',
         title: 'Oops...',
         text: 'La actualización del profesor falló',
         footer: '<a href>Intentelo de nuevo</a>'
       })
    })
 })



});