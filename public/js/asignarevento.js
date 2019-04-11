$(document).ready(function(){
    setTimeout(function() {
        $("p").fadeOut(1500);
    },3000);


    $('.form-modificar-asignacion').click(function(e){
        e.preventDefault();
        var id_evento = $('#eventoselect').val();
        var id_taller = $('#tallerselect').val();
        var form_modificar = $('#form-asignar');
        var url = form_modificar.attr('action');
        alert(form_modificar.serialize());
        alert(url);
            $.post(url, form_modificar.serialize(), function(result){
                    //row.fadeOut();
                    alert(result);
                    e.preventDefault();
                      $value = $('#buscadorasignado').val();
                      
                      $.ajax({
                          type: 'GET',
                          url:  '/buscadorasignado',
                          data: {'buscadorasignado':$value},
                          success:function(data){
                              
                              $('tbody').html("");
                                  $.each(data, function(i, item) {
                                          
                                          changos = "<tr><td>" +
                                              item.nombre+ "</td><td>" +
                                              item.taller + "</td><td>" +
                                              item.evento + "</td><td>" +
                                              "<button data-idevento="+item.eventos_id_evento+" data-idtaller="+item.tallleres_id_taller+" data-nombre="+item.nombre+" data-evento="+item.evento+" data-taller="+item.taller+" data-toggle='modal' data-target='#modalActualizarEventosAsignados' class='btn btn-warning'><img id='update' src='img/update.png'></button>" + 
                                              "</td><td>" +
                                              "<button data-idevento="+item.eventos_id_evento+" data-idtaller="+item.tallleres_id_taller+" data-nombre="+item.nombre+" data-evento="+item.evento+" data-taller="+item.taller+" data-toggle='modal' data-target='#modalEliminarEventosAsignados' class='btn btn-danger btn-eliminar'><img id='delete' src='img/delete.png'></button>";
                                          $('tbody').append(changos);
                                        Swal.fire({
                                            position: 'top-end',
                                            type: 'success',
                                            title: 'Evento asignado correctamente',
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
                    text: 'La asignación del evento falló!',
                    footer: '<span class="alert alert-danger">¿Porqué no lo intenta de nuevo?. Estaria genial</span>'
                })
            })
        
    });


    $('#modalActualizarEventosAsignados').on('show.bs.modal', function (event) {
  
        var button = $(event.relatedTarget) // Button that triggered the modal
        var idevento = button.data('idevento')
        var idtaller = button.data('idtaller')
        var nombre = button.data('nombre');
        var evento = button.data('evento');
        var taller = button.data('taller');

        var modal = $(this)
        modal.find('.modal-body #nombreActualizar').val(nombre)
        modal.find('.modal-body #eventoActualizar').val(evento)
        modal.find('.modal-body #tallerActualizar').val(taller)
      });
      
      $('.btn-act').click(function(e){
          e.preventDefault();
          var form_update = $('#form-modificar-asignacion');
          var url = form_update.attr('action');
          alert(form_update.serialize());
          alert(url);
          $.post(url, form_update.serialize(), function(result){
              //row.fadeOut();
              alert("hola");
		e.preventDefault();
            $value = $('#buscadorasignado').val();
			$.ajax({
                type: 'GET',
                url:  '/buscadorasignado',
                data: {'buscadorasignado':$value},
                success:function(data){
                    $('tbody').html("");
                    $.each(data, function(i, item) {
                                          
                        changos = "<tr data-idevento="+item.eventos_id_evento+" data-idtaller="+item.tallleres_id_taller+"><td>" +
                        item.nombre+ "</td><td>" +
                        item.taller + "</td><td>" +
                        item.evento + "</td><td>" +
                        "<button data-idevento="+item.eventos_id_evento+" data-idtaller="+item.tallleres_id_taller+" data-nombre="+item.nombre+" data-evento="+item.evento+" data-taller="+item.taller+" data-toggle='modal' data-target='#modalActualizarEventosAsignados' class='btn btn-warning'><img id='update' src='img/update.png'></button>" + 
                        "</td><td>" +
                        "<button data-idevento="+item.eventos_id_evento+" data-idtaller="+item.tallleres_id_taller+" data-nombre="+item.nombre+" data-evento="+item.evento+" data-taller="+item.taller+" data-toggle='modal' data-target='#modalEliminarEventos' class='btn btn-danger btn-eliminar'><img id='delete' src='img/delete.png'></button>";
                        $('tbody').append(changos);
                    });
                },
			     error: function () {
			         alert("Error del Servidor");
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
      

/////////////////////
var idevento;
var idtaller;
    $('#modalEliminarEventosAsignados').on('show.bs.modal', function (event) {
  
        var button = $(event.relatedTarget) // Button that triggered the modal
        idevento = button.data('idevento')
        idtaller = button.data('idtaller')
        alert(idevento);
        alert(idtaller);
        var modal = $(this)
          
      });
        
    $('.btn-borrar-asignacion').click(function(e){
        e.preventDefault();
        var id_evento = idevento;
        var id_taller = idtaller;
        var form = $('#designar');
        var url = form.attr('action');
        var url_eliminar = url+"/"+id_evento+"/"+id_taller;
        alert(id_evento);
        alert(id_taller);
        alert(form.serialize());
        alert(url);
        alert(url_eliminar);
        //var urlx = url+"/"+id_evento+"/"+id_taller;
        
            $.post(url_eliminar, form.serialize(), function(result){
                    //row.fadeOut();
                    e.preventDefault();
                      $value = $('#buscadorasignado').val();
                      
                      $.ajax({
                          type: 'GET',
                          url:  '/buscadorasignado',
                          data: {'buscadorasignado':$value},
                          success:function(data){
                              
                              $('tbody').html("");
                                  $.each(data, function(i, item) {
                                          
                                          changos = "<tr><td>" +
                                              item.nombre+ "</td><td>" +
                                              item.taller + "</td><td>" +
                                              item.evento + "</td><td>" +
                                              "<button data-idevento="+item.eventos_id_evento+" data-idtaller="+item.tallleres_id_taller+" data-nombre="+item.nombre+" data-evento="+item.evento+" data-taller="+item.taller+" data-toggle='modal' data-target='#modalActualizarEventosAsignados' class='btn btn-warning'><img id='update' src='img/update.png'></button>" + 
                                              "</td><td>" +
                                              "<button data-idevento="+item.eventos_id_evento+" data-idtaller="+item.tallleres_id_taller+" data-nombre="+item.nombre+" data-evento="+item.evento+" data-taller="+item.taller+" data-toggle='modal' data-target='#modalEliminarEventosAsignados' class='btn btn-danger btn-eliminar'><img id='delete' src='img/delete.png'></button>";
                                          $('tbody').append(changos);
                                        Swal.fire({
                                            position: 'top-end',
                                            type: 'success',
                                            title: 'Evento asignado correctamente',
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
                /*Swal.fire({
                    type: 'error',
                    title: 'Oops...',
                    text: 'El evento no pudo ser asignado!',
                    footer: '<a href>Intentelo de nuevo</a>'
                  })*/
            })
    });
});