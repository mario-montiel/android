$(document).ready(function(){
    setTimeout(function() {
        $("p").fadeOut(1500);
    },3000);


    $('#btnactalumno').click(function(){
        var alumno = $('#alumno').val();
        var horas = $('#horas').val();

        if(alumno.length == "" || horas.length == ""){
            alert("Llene todos los campos para continuar.");
            return false;
        }
    });

var id = '';


$('#modalActualizarAlumno').on('show.bs.modal', function (event) {
 
 var button = $(event.relatedTarget) // Button that triggered the modal
 id = button.data('id')
 var usuario = button.data('usuario') 
 var alumno = button.data('alumno') 
 var horas = button.data('horas')
 alert(alumno);
 alert(horas);
 var modal = $(this)
 modal.find('.modal-body #idActualizar').val(id)
 modal.find('.modal-body #usuario').val(usuario)
 modal.find('.modal-body #alumno').val(alumno)
 modal.find('.modal-body #horasActualizar').val(horas)
});

$('.btn-act-alumno').click(function(e){
   e.preventDefault();
   var form_update = $('#form-act-alumno');
   var url = form_update.attr('action');
   var url_update = url+"/"+id;
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
                       $('#tbody').html("");
                           $.each(data, function(i, item) {
                               if(item.horas_servicio_social == null){
                                   horas = 0;
                               }
                               else{
                                   horas = item.horas_servicio_social;
                               }
                                   changos = "<tr data-id="+item.id_usuario+"><td>" +
                                       item.matricula + "</td><td>" +  
                                       item.usuario + "</td><td>" +
                                       item.alumno + "</td><td>" +
                                       horas + "</td><td>" +
                                       item.created_at + "</td><td>" +
                                       item.created_at + "</td><td>" +
                                       "<button data-id="+item.id_usuario+" data-usuario="+item.usuario+" data-alumno="+item.alumno+" data-horas="+item.horas_servicio_social+" data-toggle='modal' data-target='#modalActualizarAlumno' class='btn btn-warning'><img id='update' src='img/update.png'></button>" + 
                                       "</td>";
                                   $('#tbody').append(changos);
                                   Swal.fire({
                                       position: 'top-end',
                                       type: 'success',
                                       title: 'Alumno actualizado correctamente',
                                       showConfirmButton: false,
                                       timer: 1500
                                     })
                           });
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

});