<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection as Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Modelos\Taller;

class TalleresController extends Controller
{
	function viewTalleres(){
		return view('TalleresUTT.Talleres.talleres');
	}
    function talleres(Request $request){

    	$taller = DB::table('tallleres')->get();
    	$collection = collect($taller[0]->nombre);	
    	$talleres = new Taller();
    	
    	/*$talleres->tipos_taller = $request->get('tipos_taller');
    	$talleres->nombre = $request->get('nombre');
    	$talleres->descripcion = $request->get('descripcion');
    	$talleres->horarios = $request->get('horarios');
    	$talleres->icono = $request->get('icono');
    	$talleres->eventos_id_evento = $request->get('nombre');*/
    	
    	return $collection;
    }

    function view(){

    }
    //talleres input
    //Tipo.. combobox
    //Icono.. radiobutton
    //Evento.. Ninguno
}
