
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

     	  $(document).ready(function(){
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

		
	});

     	   $(document).ready(function(){
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