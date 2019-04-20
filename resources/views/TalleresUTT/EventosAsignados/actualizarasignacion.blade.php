<!-- Modal Actualizar Taller-->
<div class="modal fade" id="modalActualizarEventosAsignados" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Actualizar Evento</h5>
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
            
             <form id="form-modificar-asignacion" action="{{ url('actualizarAsignacion')}}" method="post">
             	
            {{ csrf_field() }}
                 <div class="form-group">
					<label for="exampleFormControlInput1"> Nombre del Evento Asignado </label>
					<input id="nombreActualizar" type="text" class="form-control" name="nombre">
          </div>
          <div class="form-group">
				    <label for="exampleFormControlSelect1"> Taller </label>
				     <select name="taller" class="form-control" id="tallerActualizar">
				     	<option>Seleccione el tipo de taller</option>
				    	@foreach($talleres as $t)
				    		<option value="{{ $t->id_taller }}" {{ old('taller') == $t->id_taller ? 'selected' : '' }}>{{ $t->taller }}</option>
				    	@endforeach
				    </select>
          </div>
          <div class="form-group">
				    <label for="exampleFormControlSelect1"> Evento </label>
				     <select name="evento" class="form-control" id="eventoActualizar">
				     	<option>Seleccione el tipo de evento</option>
				    	@foreach($event as $ev)
				    		<option value="{{ $ev->id_evento }}" {{ old('evento') == $ev->id_evento ? 'selected' : '' }}>{{ $ev->evento }}</option>
				    	@endforeach
				    </select>
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