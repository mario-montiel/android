

<!-- Modal Registro Talleres -->
<div class="modal fade" id="modalRegistroTalleres" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
 <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
 	<!--  -->
   <div class="modal-content" style="">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Registrar Taller</h5>
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

             <form id="form-registrar" action="{{ url('talleres')}}" method="post" role="form">
                {{ csrf_field() }}
                
                <div class="form-group">
				    <label for="exampleFormControlInput1"> Nombre del Taller </label>
				    <input id="nombre" type="text" class="form-control" id="input" name="nombre">
				  </div>
				  <div class="form-group">
				    <label for="exampleFormControlSelect2"> Encargado </label>
				   <input type="text" class="form-control" id="encargado" name="encargado"> 
				  </div>
				  <div class="form-group">
				    <label for="exampleFormControlSelect1"> Tipo de taller </label>
				     <select name="tipo" class="form-control" id="select">
				     	<option>Seleccione el tipo de taller</option>
				    	@foreach($tipos_taller as $tp)
				    		<option value="{{ $tp->id_tipotaller }}" {{ old('tipo') == $tp->id_tipotaller ? 'selected' : '' }}>{{ $tp->tipo }}</option>
				    	@endforeach
				    </select>
				  </div>
				  <div class="form-group">
				    <label for="exampleFormControlSelect2"> Descripción </label>
				   <textarea id="textarea" class="form-control" rows="3" name="descripcion"></textarea>
				  </div>
				  <div class="form-group">
				    <label for="exampleFormControlTextarea1"> Horarios del taller</label>
				    <input type="text" class="form-control" id="horario" name="horarios" >
				  </div>
                  <div class="form-group">
				    <label for="exampleFormControlTextarea1"> Elegir icono del taller </label>
				    
				 <div class="row" id="selectores">
				 <div class="col"> <img class="img" name="img1" id="img1" src="{{ asset('img/talleresUTT/saxophone.png') }}">
				    	<div><input checked="" id="saxophone" type="radio" class="radio" name="radio" value="saxophone"></div>
				     </div> 
				    	
				    <div class="col"> <img class="img" id="img2" src="{{ asset('img/talleresUTT/guitarelectric.png') }}"> 
				    	<div><input id="guitarelectric" type="radio" class="radio" name="radio" value="guitarelectric"></div>
				    </div>

				     <div class="col"> <img class="img" id="img3" src="{{ asset('img/talleresUTT/guitaracoustic.png') }}">
				    	<div><input id="guitaracoustic" type="radio" class="radio" name="radio" value="guitaracoustic"></div>
				     </div> 

				      <div class="col"> <img class="img" id="img4" src="{{ asset('img/talleresUTT/soccer.png') }}">
				    	<div><input id="soccer" type="radio" class="radio" name="radio" value="soccer"></div>
				     </div> 

				     <div class="col"> <img class="img" id="img5" src="{{ asset('img/talleresUTT/runfast.png') }}">
				    	<div><input id="runfast" type="radio" class="radio" name="radio" value="runfast"></div>
				     </div> 

				     <div class="col"> <img class="img" id="img6" src="{{ asset('img/talleresUTT/dramamasks.png') }}">
				    	<div><input id="dramamasks" type="radio" class="radio" name="radio" value="dramamasks"></div>
				     </div> 

				     <div class="col"> <img class="img" id="img7" src="{{ asset('img/talleresUTT/speaker.png') }}">
				    	<div><input id="speaker" type="radio" class="radio" name="radio" value="speaker"></div>
				     </div> 

				     <div class="col"> <img class="img" id="img8" src="{{ asset('img/talleresUTT/chessrook.png') }}">
				    	<div><input id="chessrook" type="radio" class="radio" name="radio" value="chessrook"></div>
				     </div>
				<div class="w-100"></div>
					<div class="col"> <img class="img" id="img9" src="{{ asset('img/talleresUTT/baseball.png') }}">
				    	<div><input id="baseball" type="radio" class="radio" name="radio" value="baseball"></div>
				     </div> 

				     <div class="col"> <img class="img" id="img10" src="{{ asset('img/talleresUTT/basketball.png') }}">
				    	<div><input id="basketball" type="radio" class="radio" name="radio" value="basketball"></div>
				     </div> 

				     <div class="col"> <img class="img" id="img11" src="{{ asset('img/talleresUTT/volleyball.png') }}">
				    	<div><input id="volleyball" type="radio" class="radio" name="radio" value="volleyball"></div>
				     </div> 

				     <div class="col"> <img class="img" id="img12" src="{{ asset('img/talleresUTT/football.png') }}">
				    	<div><input id="football" type="radio" class="radio" name="radio" value="football"></div>
				     </div> 

				     <div class="col"> <img class="img" id="img13" src="{{ asset('img/talleresUTT/bookopenvariant.png') }}">
				    	<div><input id="bookopenvariant" type="radio" class="radio" name="radio" value="bookopenvariant"></div>
				     </div> 

				     <div class="col"> <img class="img" id="img14" src="{{ asset('img/talleresUTT/gamepadvariant.png') }}">
				    	<div><input id="gamepadvariant" type="radio" class="radio" name="radio" value="gamepadvariant"></div>
				     </div> 

				     <div class="col"> <img class="img" id="img15" src="{{ asset('img/talleresUTT/karate.png') }}">
				    	<div><input id="karate" type="radio" class="radio" name="radio" value="karate"></div>
				     </div>

				     <div class="col"> <img class="img" id="img16" src="{{ asset('img/talleresUTT/soccerfield.png') }}">
				    	<div ><input id="soccerfield" type="radio" class="radio" name="radio" value="soccerfield"></div>
				     </div> 
				</div>
        </div>
    </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button id="btnsubmit" type="submit" class="btn btn-primary btn-registrar" data-dismiss="modal">Registrar Taller</button>
      </div>
    </div>
    </form>
  </div>
</div>