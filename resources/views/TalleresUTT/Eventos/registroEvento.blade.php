

<!-- Modal Registro Talleres -->
<div class="modal fade" id="modalRegistroEventos" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
 <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
 	<!--  -->
   <div class="modal-content" style="">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Registrar Evento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         

		<div class="container-fluid">
            @if ($errors->any())
							<ul style="color: white; margin-top: 25px; margin: auto;">
									@foreach ($errors->all() as $error)
											<li>{{ $error }}</li>
									@endforeach
							</ul>
						@endif

        <form id="form-registracion" action="{{ url('evento')}}" method="post" role="form">
        {{ csrf_field() }}
                
          <div class="form-group">
						<label for="exampleFormControlInput1"> Nombre del Evento </label>
						<input id="eventos" type="text" class="form-control" name="evento">
					</div>
				  <div class="form-group">
				    <label for="exampleFormControlSelect2"> Información </label>
				   	<input  class="form-control" type="text" id="info" name="informacion"> 
				  </div>
				  
				  <div class="form-group">
				    <label for="exampleFormControlSelect2"> Fecha </label>
				   <input type="date" id="fecha" class="form-control" rows="3" name="fecha">
				  </div>
                 
    </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button id="btnregistro" type="submit" class="btn btn-primary btn-registrar" data-dismiss="modal">Registrar Evento</button>
      </div>
    </div>
    </form>
  </div>
</div>