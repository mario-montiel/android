<!-- Modal Actualizar Taller-->
<div class="modal fade" id="modalAsignarEventos" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Asignar Eventos</h5>
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
            <form id="form-asignar" action="{{ url('asignarevento')}}" method="post">
            {{ csrf_field() }}

        <div class="form-group">
					<label for="exampleFormControlInput1"> Nombre del Evento Asignado </label>
					<input id="eventasig" type="text" class="form-control" name="eventasig">
				</div>
            <div class="form-group">
				<label for="exampleFormControlSelect1"> Evento </label>
				<select name="eventoselect" class="form-control" id="eventoselect">
				    <option>Seleccione un evento</option>
				    @foreach($event as $ev)
				    	<option value="{{ $ev->id_evento }}" {{ old('evento') == $ev->id_evento ? 'selected' : '' }}>{{ $ev->evento }}</option>
              
				    @endforeach
				</select>
            </div>
            
            <div class="form-group">
				<label for="exampleFormControlSelect1"> Taller </label>
        <input type="hidden" name="talle">
				<select name="tallerselect" class="form-control" id="tallerselect">
				    <option>Seleccione un taller</option>
				    @foreach($talleres as $ev)
				    	<option value="{{ $ev->id_taller }}" {{ old('nombre') == $ev->id_taller ? 'selected' : '' }}>{{ $ev->nombre }}</option>
				    @endforeach
				</select>
		    </div>
                 
    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-closeupd" data-dismiss="modal">Cerrar</button>
        <button id="btnasignar" type="submit" class="btn btn-primary btn-asignar" data-dismiss="modal">Guardar Cambios</button>
      </div>
    </div>
    </form>
  </div>
</div>