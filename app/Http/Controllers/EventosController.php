<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use App\Modelos\Evento;
use App\Modelos\Taller;
use App\Modelos\Tipo_Taller;
use Session;

class EventosController extends Controller
{
    function viewEventos(){

        //$event = Evento::all();
        $event = DB::table('eventos')
        ->leftjoin('tallleres_has_eventos','tallleres_has_eventos.eventos_id_evento', '=', 'eventos.id_evento')
        ->leftjoin('talleres', 'talleres.id_taller', '=', 'tallleres_has_eventos.tallleres_id_taller')
        ->select('eventos.id_evento','eventos.evento', 'eventos.informacion', 'eventos.fecha', 'talleres.id_taller', 'talleres.*')
        ->get();
        return view('TalleresUTT.Eventos.mostrarEventos', compact('event'));
    }

    function eventos(Request $request){

        if($request->ajax()){
            $eventos = new Evento();
            $eventos->evento = $request->evento;
            $eventos->informacion = $request->informacion;
            $eventos->fecha = $request->fecha;
            //dd($request->evento);
            $eventos->save();
            
            return $event = DB::table('eventos')->get();
        }
    }

    function actualizar(Request $request, $id){
        if($request->ajax()){
            //return $id;
            $eventos = Evento::find($id);
            //return $eventos;
            $eventos->evento = $request->evento;
            $eventos->informacion = $request->informacion;
            $eventos->fecha = $request->fecha;
            $eventos->save();

            return $event = DB::table('eventos')->get();
       }
    }

    function eliminar(Request $request, $id){
        if ($request->ajax()){
            $evento = Evento::findOrFail($id);
            $evento->delete($id);
            return $event = DB::table('eventos')->get();
        }
    }
    
    function buscador(Request $request){
        $eventos = DB::table('eventos')
                ->where('evento', 'LIKE', '%'.$request->buscador.'%')
                ->orWhere('informacion', 'LIKE', '%'.$request->buscador.'%')
                ->orWhere('fecha', 'LIKE', '%'.$request->buscador.'%')
                ->get();

            return $eventos;
    }

    function asignarevento(){
        $event = DB::table('eventos')
        ->select('eventos.id_evento','eventos.evento', 'eventos.informacion', 'eventos.fecha')
        ->join('tallleres_has_eventos','tallleres_has_eventos.eventos_id_evento', '=', 'eventos.id_evento')
        ->join('talleres', 'talleres.id_taller', '=', 'tallleres_has_eventos.tallleres_id_taller')
        ->get();

        return $event;
    }


}
