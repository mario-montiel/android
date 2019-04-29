<!-- Modal Actualizar Taller-->
<div class="modal fade" id="modalActualizarProfesor" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Eliminar Profesor</h5>
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
            
            @foreach($alumnos as $alumno)
             <form id="form-act-profesor" action="{{ url('editarprofesor')}}" method="post">
             <input id="idsolicitud" type="hidden" value="{{ $profesor->id_solicitudes }}">
            @endforeach
            {{ csrf_field() }}
          
            <div class="form-group">
				    <label for="exampleFormControlInput1"> Nombre del Profesor </label>
				    <input id="profesorActualizar" type="text" class="form-control" name="profesor">
				  </div>
                 
    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-closeupd" data-dismiss="modal">Cerrar</button>
        <button id="btnactprofesor" type="submit" class="btn btn-primary btn-act-profesor" data-dismiss="modal">Guardar Cambios</button>
      </div>
    </div>
    </form>
  </div>
</div>