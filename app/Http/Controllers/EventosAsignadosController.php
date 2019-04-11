<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use App\Modelos\Evento;
use App\Modelos\Taller;
use App\Modelos\Tipo_Taller;
use App\Modelos\Evento_Taller;

class EventosAsignadosController extends Controller
{
    function viewEventosAsignados(){
        $event = Evento::all();
        $talleres = DB::table('talleres')->get();
        $ta_has_ev = DB::table('tallleres_has_eventos')->get();

        return view('TalleresUTT.EventosAsignados.mostrareventosasignados', compact('event', 'talleres', 'ta_has_ev'));
    }

    function asignacion(Request $request){
        if($request->ajax()){
            $id_evento = $request->eventoselect;
            $id_taller = $request->tallerselect;
            $nombre = $request->eventasig;
            $evento = Evento::find($id_evento);
            $event = $evento->evento;
            $taller = Taller::find($id_taller);
            $talle = $taller->nombre;
            return $evento->talleres()->attach($id_taller, 
                ['nombre' => $nombre,
                'taller' => $talle,
                'evento' => $event]);
        }
    }

    function actualizarAsignacion(Request $request, $id){
        if($request->ajax()){
            $id_evento = $request->eventoselect;
            $id_taller = $request->tallerselect;
            return $id_taller = $request->tallerselect;
            $nombre = $request->eventasig;
            $evento = Evento::find($id_evento);
            $event = $evento->evento;
            $taller = Taller::find($id_taller);
            $talle = $taller->nombre;
            $evento->talleres()->updateExistingPivot($id_taller, 
                ['nombre' => $nombre,
                'taller' => $talle,
                'evento' => $event]);
            $evento->save();
       }
    }

    function eliminarpivote(Request $request){
        if($request->ajax()){
            $id_evento = $request->ev;
            $id_taller = $request->tllr;
            $nombre = $request->x;
            $evento = Evento::find($id_evento);
            $event = $evento->the_event;
            $taller = Taller::find($id_taller);
            $talle = $taller->the_taller;
            return $evento->talleres()->detach($id_taller, 
                ['nombre' => $nombre,
                'taller' => $talle,
                'evento' => $event]);
        }
    }

    function buscador(Request $request){
        $alumnos = DB::table('tallleres_has_eventos')
        ->where('nombre', 'LIKE', '%'.$request->buscadorasignado.'%')
        ->orWhere('taller', 'LIKE', '%'.$request->buscadorasignado.'%')
        ->orWhere('evento', 'LIKE', '%'.$request->buscadorasignado.'%')
        ->get();

        return $alumnos;
    }
}
