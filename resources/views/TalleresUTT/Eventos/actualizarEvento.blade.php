<!-- Modal Actualizar Taller-->
<div class="modal fade" id="modalActualizarEventos" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Actualizar Taller</h5>
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
            
            @foreach($event as $ev)
             <form id="form-modificar" action="{{ url('editarevento')}}" method="post">
             	
            @endforeach
            {{ csrf_field() }}
          <div class="form-group">
						<label for="exampleFormControlInput1"> Nombre del Evento </label>
						<input id="eventoActualizar" type="text" class="form-control" name="evento">
					</div>
				  <div class="form-group">
				    <label for="exampleFormControlSelect2"> Información </label>
				   	<input type="text" class="form-control" id="informacionActualizar" name="informacion"> 
				  </div>
				  
				  <div class="form-group">
				    <label for="exampleFormControlSelect2"> Fecha </label>
				   <input id="fechaActualizar" type="date" class="form-control" rows="3" name="fecha">
				  </div>
                 
    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-closeupd" data-dismiss="modal">Cerrar</button>
        <button id="btnactualizate" type="submit" class="btn btn-primary btn-act" data-dismiss="modal">Guardar Cambios</button>
      </div>
    </div>
    </form>
  </div>
</div>