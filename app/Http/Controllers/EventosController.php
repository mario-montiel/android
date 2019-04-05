<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use App\Modelos\Evento;
use App\Modelos\Taller;
use App\Modelos\Tipo_Taller;
use App\Modelos\Evento_Taller;
use Session;

class EventosController extends Controller
{
    public function __construct()
    {
        $this->middleware('inicioSesion');
        
    }

    function viewEventos(Request $request){

        /*DB::table('eventos')
        ->leftjoin('tallleres_has_eventos','tallleres_has_eventos.eventos_id_evento', '=', 'eventos.id_evento')
        ->leftjoin('talleres', 'talleres.id_taller', '=', 'tallleres_has_eventos.tallleres_id_taller')
        ->select('eventos.id_evento','eventos.evento', 'eventos.informacion', 'eventos.fecha', 'talleres.id_taller', 'talleres.*')
        ->get();*/
        //$event = Evento::all();
        $event = Evento::all();
        $talleres = DB::table('talleres')->get();
        $ta_has_ev = DB::table('tallleres_has_eventos')->get();
        //$idev = '';
        /*$idev = $request->ev;
        dd($idev);
        if($request->ev != false){
            
            dd($request->ev != null);
        }*/
        /*$evento = '';
        $idev = collect();
        $the = collect();
        for ($i=0; $i < count($event); $i++) { 
            $idev[$i] = $event[$i]->id_evento;
        }
        for ($i=0; $i < count($ta_has_ev); $i++) { 
            $the[$i] = $ta_has_ev[$i]->eventos_id_evento;
        }

        for ($i=0; $i < count($ta_has_ev); $i++) { 
            if($the[$i] == $idev[$i]){
                 dd($evento = $event[$i]->evento);
               
            }
        }*/
        
        //dd($evento);

        
        //dd($the);

        return view('TalleresUTT.Eventos.mostrarEventos', compact('event', 'talleres', 'ta_has_ev'));
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

    function asignacion(Request $request){
        //Lo correcto
        //dd($id_evento);
        //return "hola";
        if($request->ajax()){
            //return $request;
            $id_evento = $request->eventoselect;
            $id_taller = $request->tallerselect;
            //return $id_taller;
            //return $id_taller;
            $evento = Evento::find($id_evento);
            //return $evento;
            $evento->talleres()->attach($id_taller);
            /*$the_nombre = new Evento_Taller();
            $the_nombre->nombre = $request->eventasig;
            $the_nombre->save();*/
            return $evento;
        }
        

        //EJEMPLO
        /*//create a new signature
        $signature = new Signature($values);
        //save the new signature and attach it to the user
        $user = User::find($id)->signatures()->save($signature);
        ----------LO CONTRARIO
        $user = User::find($user_id);
        $signature = Signature::create($values)->users()->save($user);*/
    }

    function eliminarpivote($id_evento, $id_taller){
        $evento = Evento::find($id_evento);
        $evento->talleres()->attach($id_taller);
    }


}
