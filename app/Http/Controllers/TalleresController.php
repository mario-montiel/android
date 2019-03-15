<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection as Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Modelos\Taller;

class TalleresController extends Controller
{
	function viewTalleres(){
		$tipos_taller = DB::table('tipos_taller')->get();
		return view('TalleresUTT.Talleres.registroTalleres', compact('tipos_taller'));
	}
    function talleres(Request $request){

    	$taller = DB::table('talleres')->get();
    	//$collection = collect($taller[0]->nombre);
    	
    	//dd($request->get('radio'));
    	$talleres = new Taller();
    	$talleres->nombre = $request->get('nombre');
    	$talleres->encargado = $request->get('encargado');
    	$talleres->tipos_taller = $request->get('tipo');
    	$talleres->descripcion = $request->get('descripcion');
    	$talleres->horarios = $request->get('horarios');
    	$talleres->icono = $request->get('radio');
    	//$talleres->eventos_id_evento = 1;
    	//dd($request->get('tipo'));
    	$talleres->save();
    	
    	//return $collection;
    }

    function viewMostrarTalleres(){
    	$talleres = DB::table("talleres")->get();
    	return view('TalleresUTT.Talleres.mostrarTalleres', compact('talleres'));
    }

    function viewActualizarTalleres($id){
    	$taller = Taller::findOrFail($id);
    	$tipos_taller = DB::table('tipos_taller')->get();
		return view('TalleresUTT.Talleres.actualizarTaller', compact('taller', 'tipos_taller'));
    }

    function actualizarTaller(Request $request, $id){
    	$taller = Taller::findOrFail($id);
    	$taller->nombre = $request->get('nombre');
    	$taller->encargado = $request->get('encargado');
    	$taller->tipos_taller = $request->get('tipo');
    	$taller->descripcion = $request->get('descripcion');
    	$taller->horarios = $request->get('horarios');
    	$taller->icono = $request->get('radio');
    	$taller->save();

    	return redirect('/mostrartalleres');
    }

    function arregloJohnnyLand(){
        $deportivo = DB::table('tipos_taller')->get();
        //$deportivo = collect($deportivo)->where('');

        return $deportivo;
    }
}
