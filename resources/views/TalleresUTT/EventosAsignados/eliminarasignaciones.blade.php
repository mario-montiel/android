<div class="modal fade " id="modalEliminarEventosAsignados" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog bd-example-modal-sm modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Eliminar Evento Asignado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

			<center><span class="alert alert-danger btn-block" role="alert" style="width: 100%; margin: 0; text-align: center;">¿Desea eliminar este evento asignado?</span>
			</center>
          
      @foreach($ta_has_ev as $the)
        <form id="designar" action="{{ url('designarevento')}}" method="post">
      @endforeach
      {{ csrf_field() }}

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary btn-borrar-asignacion" data-dismiss="modal">Eliminar</button>
      </div>
    </div>
	</form>
  </div>
  
</div>