

<!-- Modal Registro Talleres -->
<div class="modal fade" id="verEventoAsignado" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
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
            @foreach($ta_has_ev as $the)
        <form id="designar" action="{{ url('designarevento')}}" method="post">
        {{ csrf_field() }}
                
                <input type="hidden" id="even" class="evento_id" name="ev" value="{{$the->eventos_id_evento}}">
                <input type="hidden" id="tller" name="tllr" value="{{$the->tallleres_id_taller}}">
                <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <label for="exampleFormControlInput1"> Evento Asignado </label>
                        <input id="eventoasignado" type="text" class="form-control" name="x" value="{{$the->nombre}}" disabled>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="exampleFormControlInput1"> Evento </label>
                        <input id="" type="text" class="form-control" name="the_event" value="{{$the->evento}}" disabled>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="exampleFormControlSelect2"> Taller </label>
                        <input  class="form-control" type="text" id="" name="the_taller" value="{{$the->taller}}" disabled> 
                    </div>
                </div>
                <div id="respuesta"></div>
				        <div class="col-3">
                    <button class="btn btn-danger btn-borrar-asignacion"><img id="borrar" src="{{ asset('img/borrar.png') }}"></button>
                </div>
                </div>
                  @endforeach
                 
    </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" data-dismiss="modal">Registrar Taller</button>
      </div>
    </div>
   </form>
  </div>
</div>