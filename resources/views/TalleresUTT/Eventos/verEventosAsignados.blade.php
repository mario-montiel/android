<!-- Modal Actualizar Taller-->
<div class="modal fade" id="modalVerEventosAsignados" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
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
            <form id="form-verasignados" action="{{ url('vereventoasignado')}}" method="post">
            {{ csrf_field() }}
            
            @foreach($ta_has_ev as $te)
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1"> Evento </label>
                        <input class="idev" value="{{$te->eventos_id_evento}}" type="text" name="ev" id="idev" disabled>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1"> Taller </label>
                        <input class="idta" value="{{$te->tallleres_id_taller}}" type="text" name="taller" id="idta" disabled>
                    </div>
                </div>
                <div class="col-4"><button id="btndesignar" value="" name="ev" type="submit" class="btn btn-danger btn-designar" data-dismiss="modal"><img id="delete" src="{{ asset('img/delete.png') }}" alt=""></button></div>
            </div>
            @endforeach
                 
    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-closeupd btn-block" data-dismiss="modal">Cerrar</button>
        
      </div>
    </div>
    </form>
  </div>
</div>