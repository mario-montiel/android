

<!-- Modal Registro Talleres -->
<div class="modal fade" id="eliminarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
 6 <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">542810
 	<!--  -->
3    <div class="modal-content" style="">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Registrar Taller</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         

	<div class="container-fluid">

             <form id="form-registrar" action="{{ url('talleres')}}" method="post">
                {{ csrf_field() }}
                
                
        </div>
    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button id="btnsubmit" type="submit" class="btn btn-primary btn-registrar" data-dismiss="modal">Registrar Taller</button>
      </div>
    </div>
    </form>
  </div>
</div>