<!-- Modal Actualizar Taller-->
<div class="modal fade" id="modalActualizarAlumno" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Actualizar Alumno</h5>
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
             <form id="form-act-alumno" action="{{ url('editaralumno')}}" method="post">
             <input id="idsolicitud" type="hidden" value="{{ $alumno->id_solicitudes }}">
            @endforeach
            {{ csrf_field() }}
          <div class="form-group">
						<label for="exampleFormControlInput1"> Matrícula </label>
						<input id="matriculaActualizar" type="text" class="form-control" name="matricula">
					</div>
          <div class="form-group">
						<label for="exampleFormControlInput1"> Alumno </label>
						<input id="alumnoActualizar" type="text" class="form-control" name="alumno">
					</div>
          <div class="form-group">
				    <label for="exampleFormControlSelect1"> Carrera </label>
				     <select name="carrera" class="form-control" id="carreraActualizar">
				    	@foreach($carrera as $c)
				    		<option value="{{ $c->id_carrera }}">{{ $c->carrera }}</option>
				    	@endforeach
				    </select>
          </div>
          <div class="form-group">
				    <label for="exampleFormControlSelect1"> Cuatrimestre </label>
				     <select name="cuatrimestre" class="form-control" id="cuatrimestreActualizar">
				    	@foreach($cuatrimestre as $cuatri)
				    		<option value="{{ $cuatri->id_cuatrimestre }}" {{ old('cuatrimestre') == $cuatri->id_cuatrimestre ? 'selected' : '' }}>{{ $cuatri->cuatrimestre }}</option>
				    	@endforeach
				    </select>
          </div>
          <div class="form-group">
				    <label for="exampleFormControlSelect1"> Taller </label>
				     <select name="taller" class="form-control" id="tallerActualizar">
				    	@foreach($talleres as $t)
				    		<option value="{{ $t->id_taller }}" {{ old('taller') == $t->id_taller ? 'selected' : '' }}>{{ $t->taller }}</option>
				    	@endforeach
				    </select>
          </div>
				  <div class="form-group">
				    <label for="exampleFormControlSelect2"> Horas de Servicio Social </label>
				   	<input type="text" class="form-control" id="horasActualizar" name="horas"> 
				  </div>
                 
    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-closeupd" data-dismiss="modal">Cerrar</button>
        <button id="btnactalumno" type="submit" class="btn btn-primary btn-act-alumno" data-dismiss="modal">Guardar Cambios</button>
      </div>
    </div>
    </form>
  </div>
</div>