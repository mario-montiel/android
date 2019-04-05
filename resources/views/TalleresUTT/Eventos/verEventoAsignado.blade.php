

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

        <!--<form id="form-registracion" action="{{ url('evento')}}" method="post" role="form">-->
        {{ csrf_field() }}
                
                @foreach($ta_has_ev as $the)
                <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label for="exampleFormControlInput1"> Nombre del Evento </label>
                        <input id="the_taller" type="text" class="form-control" name="the_taller" value="{{$the->tallleres_id_taller}}" disabled>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="exampleFormControlSelect2"> Información </label>
                        <input  class="form-control" type="text" id="the_evento" name="the_evento" value="{{$the->eventos_id_evento}}" disabled> 
                    </div>
                </div>
				<div class="col-4">
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
    <!--</form>-->
  </div>
</div>