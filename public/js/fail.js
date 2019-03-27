$('#modalActualizarTalleres').on('show.bs.modal', function (event) {
		  
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  var id = button.data('id')
		  var nombre = button.data('nombre') 
		  var encargado = button.data('encargado')
		  var tipo = button.data('tipo')
		  var descripcion = button.data('descripcion')
		  var horarios = button.data('horarios')

		  var modal = $(this)
		  //modal.find('.modal-title').text('New message to ' + recipient)
		  modal.find('.modal-body #idActualizar').val(id)
		  modal.find('.modal-body #nombreActualizar').val(nombre)
		  modal.find('.modal-body #encargadoActualizar').val(encargado)
		  modal.find('.modal-body #tipoActualizar').val(tipo)
		  modal.find('.modal-body #descripcionActualizar').val(descripcion)
		  modal.find('.modal-body #horariosActualizar').val(horarios)



            /*if($( $('input[type="submit"]')).val() != ''){
               $('input[type="submit"]').removeAttr('disabled');
               $('button[type="submit"]').attr('enable','enable');
            }*/
            
            
	});

     	  
		$('#btnsubmit').click(function(){
			var nombre = $('#nombre').val();
			var encargado = $('#encargado').val();
			var tipo = $('#select').val(); //num
			var textarea = $('#textarea').val();
			var horario = $('#horario').val();

			if(nombre.length == "" || encargado.length == "" || 
				tipo == "Seleccione el tipo de taller" || textarea.length == "" || 
				horario.length == ""){
				alert("Llene todos los campos para continuar.");
				return false;
			}
		
		});
			$('#btnactualizate').click(function(){
			var nombre = $('#nombreActualizar').val();
			var encargado = $('#encargadoActualizar').val();
			var tipo = $('#tipoActualizar').val(); //num
			var textarea = $('#descripcionActualizar').val();
			var horario = $('#horariosActualizar').val();

			if(nombre.length == "" || encargado.length == "" || 
				tipo == "Seleccione el tipo de taller" || textarea.length == "" || 
				horario.length == ""){
				alert("Llene todos los campos para continuar.");
				return false;
			}
		});

	var row;
	var id = '';
	var form;
	var url;
	var raw;
	var idxw = '';
	var nombrex = '';
	var encargadox = '';
	var tipox = '';
	var descripcionx = '';
	var horariox = '';
	var roweliminar;
	var ideliminar = '';
	var iddelete = '';

							$('.btn-warning').click(function(e){
								row =  $(this).parents('tr');
								id = row.data('id');
								form = $('#form-actualizar');
								url = form.attr('action');
								
							});

	$('.btn-upd').click(function(e){
			e.preventDefault();
			/*if ( ! confirm("¿Estas seguro de eliminar?")) {
				return false;
			}*/

			var rows = row;
			var id_taller = id;
			var forms = form;
			var urls = url;


			$.post(urls, forms.serialize(), function(result){
				//row.fadeOut();
				$.ajax({
				type: 'GET',
				url:  '/search',
				 success: function(data){  
				        $('#mostrardatos').html("");
						$.each(data, function(i, item) {
								changos = "<tr data-idxy="+item.id_taller+" data-name="+item.nombre+" data-encargadoxd="+item.encargado+" data-tipoxd="+item.tipo+" data-descripcionxd="+item.descripcion+" data-horarioxd="+item.horarios+"><td>" +
									item.nombre+ "</td><td>" +
									item.encargado + "</td><td>" +
									item.tipo + "</td><td>" +
									item.descripcion + "</td><td>" +
									item.horarios + "</td><td>"  +
									"<button data-toggle='modal' data-target='#modalActualizarTalleres' class='btn btn-warning btn-hey'><img id='update' src='img/update.png'></button>" + 
									"</td><td>" +
									"<a class='btn btn-danger' href='/eliminartaller/"+item.id_taller+"'><img id='delete' src='img/delete.png'></a>";
								$('#mostrardatos').append(changos);


								$('.btn-hey').click(function(){
									raw =  $(this).parents('tr');
									idxw = raw.data('idxy');
									nombrex = raw.data('name');
									encargadox = raw.data('encargadoxd');
									tipox = raw.data('tipoxd');
									descripcionx = raw.data('descripcionxd');
									horariox = raw.data('horarioxd');
								});

										$('#modalActualizarTalleres').on('show.bs.modal', function (event) {
												  
												  var button = $(this).parents('tr'); // Button that triggered the modal

												  var modal = $(this)
												  //modal.find('.modal-title').text('New message to ' + recipient)
												  modal.find('.modal-body #idActualizar').val(idxw)
												  modal.find('.modal-body #nombreActualizar').val(nombrex)
												  modal.find('.modal-body #encargadoActualizar').val(encargadox)
												  modal.find('.modal-body #tipoActualizar').val(tipox)
												  modal.find('.modal-body #descripcionActualizar').val(descripcionx)
												  modal.find('.modal-body #horariosActualizar').val(horariox)

										});
						})  
				    },
				    error: function() { 
				        alert("Nelson"); 
				    }       
				});
				
			});
		});


	$('.btn-registrar').click(function(e){
		e.preventDefault();
		form = $('#form-registrar');
		url = form.attr('action');
		//alert(form.serialize());
		$.post(url, form.serialize(), function(result){
				//alert(result)
				//row.fadeOut();

				$.ajax({
				type: 'GET',
				url:  '/search',
				success:function(data){
						$('#mostrardatos').html("");
						$.each(data, function(i, item) {
								
								changos = "<tr><td>" +
									item.nombre+ "</td><td>" +
									item.encargado + "</td><td>" +
									item.tipo + "</td><td>" +
									item.descripcion + "</td><td>" +
									item.horarios + "</td><td>"  +
									"<button data-toggle='modal' data-target='#modalActualizarTalleres' class='btn btn-warning btn-hey'><img id='update' src='img/update.png'></button>" + 
									"</td><td>" +
									"<button class='btn btn-danger' data-target='#eliminarModal'><img id='delete' src='img/delete.png'></button>";
								$('#mostrardatos').append(changos);
						});
				},
			     error: function () {
			         alert("Error del Servidor");
			     }
			});
		});

	});

	var id_eliminar = '';

	$('.btn-eliminar').click(function(e){
		e.preventDefault();
		roweliminar =  $(this).parents('tr');
		ideliminar = roweliminar.data('ideliminar');
		id_eliminar = roweliminar.data('id');
		form = $('#form-eliminar');
		url = "http://montiel.test/eliminartaller/"+id_eliminar
		$('.btn-delete').click(function(){
		$.post(url, form.serialize(), function(result){
				//alert(form.serialize());
				//row.fadeOut();
				
				$.ajax({
				type: 'GET',
				url:  '/search',
				success:function(data){
						$('#mostrardatos').html("");
						$.each(data, function(i, item) {
								
								changos = "<tr data-eliminar="+item.id_taller+" data-name="+item.nombre+" data-encargadoxd="+item.encargado+" data-tipoxd="+item.tipo+" data-descripcionxd="+item.descripcion+" data-horarioxd="+item.horarios+"><td>" +
									item.nombre+ "</td><td>" +
									item.encargado + "</td><td>" +
									item.tipo + "</td><td>" +
									item.descripcion + "</td><td>" +
									item.horarios + "</td><td>"  +
									"<button data-toggle='modal' data-target='#modalActualizarTalleres' class='btn btn-warning btn-hey'><img id='update' src='img/update.png'></button>" + 
									"</td><td>" +
									"<button class='btn btn-danger btn-borrar' data-toggle='modal' data-target='#eliminarModal'><img id='delete' src='img/delete.png'></button>";
								$('#mostrardatos').append(changos);

						$('.btn-borrar').click(function(){
							rowborrar = $(this).parents('tr');
							iddelete =  rowborrar.data('eliminar');
							
						});


								$('#eliminarModal').on('show.bs.modal', function (event) {
												  //alert(iddelete);
												  var button = $(this).parents('tr'); // Button that triggered the modal

												  var modal = $(this)
												  //modal.find('.modal-title').text('New message to ' + recipient)
												  modal.find('.modal-body #idEliminar').val(iddelete)

										});
						});
					
					
				},
			     error: function () {
			         alert("Error del Servidor");
			     }
			});
		});
		});
	});
