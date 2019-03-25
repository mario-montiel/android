

$(document).ready(function(){
setTimeout(function() {
		        $("p").fadeOut(1500);
		    },3000);
		


		$(".img").click(function(){
 			$('.radio').removeProp('checked');
 		});

	    $("#img1").click(function(){

			 if($('#saxophone').is('checked') == false){
			  	$('input:radio[value="saxophone"]').prop('checked', true);
			  }
		});

		$("#img2").click(function(){

			 if($('#guitarelectric').is('checked') == false){
			  	$('input:radio[value="guitarelectric"]').prop('checked', true);
			  }
		});

		$("#img3").click(function(){

			 if($('#guitaracoustic').is('checked') == false){
			  	$('input:radio[value="guitaracoustic"]').prop('checked', true);
			  }
		});

		$("#img4").click(function(){

			 if($('#soccer').is('checked') == false){
			  	$('input:radio[value="soccer"]').prop('checked', true);
			  }
		});

		$("#img5").click(function(){

			 if($('#runfast').is('checked') == false){
			  	$('input:radio[value="runfast"]').prop('checked', true);
			  }
		});

		$("#img6").click(function(){

			 if($('#dramamasks').is('checked') == false){
			  	$('input:radio[value="dramamasks"]').prop('checked', true);
			  }
		});

		$("#img7").click(function(){

			 if($('#speaker').is('checked') == false){
			  	$('input:radio[value="speaker"]').prop('checked', true);
			  }
		});

		$("#img8").click(function(){

			 if($('#chessrook').is('checked') == false){
			  	$('input:radio[value="chessrook"]').prop('checked', true);
			  }
		});

		$("#img9").click(function(){

			 if($('#baseball').is('checked') == false){
			  	$('input:radio[value="baseball"]').prop('checked', true);
			  }
		});

		$("#img10").click(function(){

			 if($('#basketball').is('checked') == false){
			  	$('input:radio[value="basketball"]').prop('checked', true);
			  }
		});

		$("#img11").click(function(){

			 if($('#volleyball').is('checked') == false){
			  	$('input:radio[value="volleyball"]').prop('checked', true);
			  }
		});

		$("#img12").click(function(){

			 if($('#football').is('checked') == false){
			  	$('input:radio[value="football"]').prop('checked', true);
			  }
		});

		$("#img13").click(function(){

			 if($('#bookopenvariant').is('checked') == false){
			  	$('input:radio[value="bookopenvariant"]').prop('checked', true);
			  }
		});

		$("#img14").click(function(){
			 if($('#gamepadvariant').is('checked') == false){
			  	$('input:radio[value="gamepadvariant"]').prop('checked', true);
			  }
		});

		$("#img15").click(function(){

			 if($('#karate').is('checked') == false){
			  	$('input:radio[value="karate"]').prop('checked', true);
			  }
		});


		$("#img16").click(function(){

			 if($('#soccerfield').is('checked') == false){
			  	$('input:radio[value="soccerfield"]').prop('checked', true);
			  }
		});

		//VALIDACIONES


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
	});

$(document).ready(function(){
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
				 success: function(){  
				        $("form#updatejob").hide(function(){$("div.success").fadeIn();});  
				    },
				    error: function(XMLHttpRequest, textStatus, errorThrown) { 
				        alert("Status: " + textStatus); alert("Error: " + errorThrown); 
				    }       
				});
				
						/*$('#mostrardatos').html("");
						$.each(data, function(i, item) {
								changos = "<tr data-idx="+item.id+" data-name="+item.nombre+" data-encargadoxd="+item.encargado+" data-tipoxd="+item.tipo+" data-descripcionxd="+item.descripcion+" data-horarioxd="+item.horarios+"><td>" +
									item.nombre+ "</td><td>" +
									item.encargado + "</td><td>" +
									item.tipo + "</td><td>" +
									item.descripcion + "</td><td>" +
									item.horarios + "</td><td>"  +
									"<button data-toggle='modal' href='#modalActualizarTalleres' class='btn btn-warning btn-hey'><img id='update' src='img/update.png'></button>" + 
									"</td><td>" +
									"<a class='btn btn-danger' href='/eliminartaller/"+item.id_taller+"'><img id='delete' src='img/delete.png'></a>";
								$('#mostrardatos').append(changos);


								$('.btn-hey').click(function(){
									raw =  $(this).parents('tr');
									idxw = raw.data('idx');
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
						});*/
				
			});
		});
});

$(document).ready(function(){

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
									"<a data-id="+item.id_taller+" data-nombre="+item.nombre+
									" data-encargado="+item.encargado+" data-tipo="+item.tipo+
									" data-descripcion="+item.descripcion+" data-horarios="+item.horarios+
									"data-toggle='modal' data-target='#modalActualizarTalleres' class='btn btn-warning'><img id='update' src='{{ asset('img/talleresUTT/update.png') }}''></a>" + 
									"</td><td>" +
									"<a class='btn btn-danger' href='/eliminartaller/"+item.id_taller+"'><img id='delete' src='{{ asset('img/delete.png') }}'></a>";
								$('#mostrardatos').append(changos);
						});
					
					
				},
			     error: function () {
			         alert("Error del Servidor");
			     }
			});
		});

	});

	});