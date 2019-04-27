<div class="modal fade " id="eliminarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog bd-example-modal-sm modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Eliminar Taller</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       


			<center><span class="alert alert-danger btn-block" style="width: 100%; margin: 0; text-align: center;">¿Desea eliminar este taller?</span>
			</center>
          
			@foreach($taller as $t)
             <form id="form-eliminar" action="{{ url('eliminartaller')}}" method="post">
             	{{ csrf_field() }}
             	<input id="id_eliminar" type="hidden" name="id_eliminar" value="">
            @endforeach

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary btn-delete" data-dismiss="modal">Eliminar</button>
      </div>
    </div>
	</form>
  </div>
  
</div>