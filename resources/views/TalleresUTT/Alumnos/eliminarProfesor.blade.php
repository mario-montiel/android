<!-- Modal Actualizar Taller-->
<div class="modal fade" id="modalEliminarProfesor" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
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
             <form id="form-delete-profesor" action="{{ url('eliminarprofesor')}}" method="post">
             <input id="nombre" type="hidden" value="{{ $profesor->id_solicitudes }}">
            @endforeach
            {{ csrf_field() }}
          
          	<center><span class="alert alert-danger btn-block" role="alert" style="width: 100%; margin: 0; text-align: center;">¿Desea eliminar el taller en el que esta el profesor?</span>
			      </center>
                 
    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-closeupd" data-dismiss="modal">Cerrar</button>
        <button id="btneliminarprofesor" type="submit" class="btn btn-primary btn-delete-profesor" data-dismiss="modal">Eliminar</button>
      </div>
    </div>
    </form>
  </div>
</div>