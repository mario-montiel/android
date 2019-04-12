$(document).ready(function(){
    setTimeout(function() {
        $("p").fadeOut(1500);
    },3000);

$('#btnregistro').click(function(){
    var eventos = $('#eventos').val();
    var info = $('#info').val();
    var fecha = $('#fecha').val();

    if(eventos.length == "" || info.length == "" || eventos.length == ""){
        alert("LLENE TODOS LOS CAMPOS PARA CONTINUAR");
        return false;
    }

});
    $('#btnactualizate').click(function(){
        var eventos = $('#eventoActualizar').val();
        var info = $('#informacionActualizar').val();
        var fecha = $('#fechaActualizar').val();

        if(eventos.length == "" || info.length == "" || eventos.length == "" || fecha.length == ""){
            alert("LLENE TODOS LOS CAMPOS PARA CONTINUAR");
            return false;
        }
});

var id = '';

 $('#modalActualizarEventos').on('show.bs.modal', function (event) {
  
  var button = $(event.relatedTarget) // Button that triggered the modal
  id = button.data('id')
  var evento = button.data('evento') 
  var informacion = button.data('informacion')
  var fecha = button.data('fecha')

  var modal = $(this)
  modal.find('.modal-body #idActualizar').val(id)
  modal.find('.modal-body #eventoActualizar').val(evento)
  modal.find('.modal-body #informacionActualizar').val(informacion)
  modal.find('.modal-body #fechaActualizar').val(fecha)
});

$('.btn-act').click(function(e){
    e.preventDefault();
    var form_update = $('#form-modificar');
    var url = form_update.attr('action');
    var url_update = url+"/"+id;
    //alert(id);
    $.post(url_update, form_update.serialize(), function(result){
        //row.fadeOut();
               e.preventDefault();
                $value = $('#buscador').val();
                
                $.ajax({
                    type: 'GET',
                    url:  '/buscador',
                    data: {'buscador':$value},
                    success:function(data){
                        
                        $('tbody').html("");
                            $.each(data, function(i, item) {
                                    
                                    changos = "<tr data-id="+item.id_evento+"><td>" +
                                        item.evento+ "</td><td>" +
                                        item.informacion + "</td><td>" +
                                        item.fecha + "</td><td>" +
                                        "<button data-id="+item.id_evento+" data-evento="+item.evento+" data-informacion="+item.informacion+" data-fecha="+item.fecha+" data-toggle='modal' data-target='#modalActualizarEventos' class='btn btn-warning'><img id='update' src='img/update.png'></button>" + 
                                        "</td><td>" +
                                        "<button data-id="+item.id_evento+" data-toggle='modal' data-target='#modalEliminarEventos' class='btn btn-danger btn-eliminar'><img id='delete' src='img/delete.png'></button>";
                                    $('tbody').append(changos);
                                    Swal.fire({
                                        position: 'top-end',
                                        type: 'success',
                                        title: 'Evento actualizado correctamente',
                                        showConfirmButton: false,
                                        timer: 1500
                                      })
                            });
                    },
                     error: function () {
                        Swal.fire({
                            type: 'error',
                            title: 'Oops...',
                            text: 'Error del Servidor',
                            footer: '<span class="alert alert-danger">¿Porqué no intenta de nuevo?. Estaria genial</span>'
                          });
                     }
                });
        
    }).fail(function(){
        Swal.fire({
            type: 'error',
            title: 'Oops...',
            text: 'La actualización del evento falló!',
            footer: '<span class="alert alert-danger">¿Porqué no intenta de nuevo?. Estaria genial</span>'
          })
    })
});


$('.btn-registrar').click(function(e){
e.preventDefault();
var formx = $('#form-registracion');
var urlx = formx.attr('action');

$.post(urlx, formx.serialize(), function(result){
        //row.fadeOut();
        //$('tbody').append(result);
        e.preventDefault();
        $value = $('#buscador').val();
        
        $.ajax({
            type: 'GET',
            url:  '/buscador',
            data: {'buscador':$value},
            success:function(data){
                
                    $('tbody').html("");
                    $.each(data, function(i, item) {
                            
                            changos = "<tr data-id="+item.id_evento+"><td>" +
                                item.evento+ "</td><td>" +
                                item.informacion + "</td><td>" +
                                item.fecha + "</td><td>" +
                                "<button data-id="+item.id_evento+" data-evento="+item.evento+" data-informacion="+item.informacion+" data-fecha="+item.fecha+" data-toggle='modal' data-target='#modalActualizarEventos' class='btn btn-warning'><img id='update' src='img/update.png'></button>" + 
                                "</td><td>" +
                                "<button data-id="+item.id_evento+" data-toggle='modal' data-target='#modalEliminarEventos' class='btn btn-danger btn-eliminar'><img id='delete' src='img/delete.png'></button>";
                            $('tbody').append(changos);
                            Swal.fire({
                                position: 'top-end',
                                type: 'success',
                                title: 'Evento registrado correctamente',
                                showConfirmButton: false,
                                timer: 1500
                            })
                    });
            },
             error: function () {
                Swal.fire({
                    type: 'error',
                    title: 'Oops...',
                    text: 'Error del Servidor',
                    footer: '<span class="alert alert-danger">¿Porqué no intenta de nuevo?. Estaria genial</span>'
                  })
             }
        });


}).fail(function(){
        Swal.fire({
            type: 'error',
            title: 'Oops...',
            text: 'El registro del evento falló!',
            footer: '<span class="alert alert-danger">¿Porqué no intenta de nuevo?. Estaria genial</span>'
          })
})

});

var id= '';

$('#modalEliminarEventos').on('show.bs.modal', function (event) {
  
  var button = $(event.relatedTarget) // Button that triggered the modal
  id = button.data('id')
  var modal = $(this)
  modal.find('.modal-body #id_eliminar').val(id)
    
});


$('.btn-delete').click(function(e){
    e.preventDefault();	
    row_destroy = $(this).parents('tr')
    var xxx = row_destroy.data('id');
    var form_destroy = $('#form-eliminar');
    var urldestroy = form_destroy.attr('action');
    var url_destroy = urldestroy+"/"+id;
    $.post(url_destroy, form_destroy.serialize(), function(result){
            //row.fadeOut();
            //$('body').html(result);
            e.preventDefault();
            $value = $('#buscador').val();
            
            $.ajax({
                type: 'GET',
                url:  '/buscador',
                data: {'buscador':$value},
                success:function(data){
                    
                        $('tbody').html("");
                        $.each(data, function(i, item) {
                                
                                changos = "<tr data-id="+item.id_evento+"><td>" +
                                    item.evento+ "</td><td>" +
                                    item.informacion + "</td><td>" +
                                    item.fecha + "</td><td>" +
                                    "<button data-id="+item.id_evento+" data-evento="+item.evento+" data-informacion="+item.informacion+" data-fecha="+item.fecha+" data-toggle='modal' data-target='#modalActualizarEventos' class='btn btn-warning'><img id='update' src='img/update.png'></button>" + 
                                    "</td><td>" +
                                    "<button data-id="+item.id_evento+" data-toggle='modal' data-target='#modalEliminarEventos' class='btn btn-danger btn-eliminar'><img id='delete' src='img/delete.png'></button>";
                                $('tbody').append(changos);
                                Swal.fire({
                                    position: 'top-end',
                                    type: 'success',
                                    title: 'Evento eliminado correctamente',
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                        });
                },
                 error: function () {
                    Swal.fire({
                        type: 'error',
                        title: 'Oops...',
                        text: 'Error del Servidor',
                        footer: '<span class="alert alert-danger">¿Porqué no intenta de nuevo?. Estaria genial</span>'
                      })
                 }
            });
            
    }).fail(function(){
        Swal.fire({
            type: 'error',
            title: 'Oops...',
            text: 'La eliminación del evento falló!',
            footer: '<span class="alert alert-danger">¿Porqué no intenta de nuevo?. Estaria genial</span>'
          })
    });
});


});