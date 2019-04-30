<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use App\Modelos\Persona;
use App\Modelos\Taller;
use App\Modelos\Solicitud;
use App\Modelos\Cuatrimestre;
use App\Modelos\Carrera;
use Carbon\Carbon;

class AlumnosController extends Controller
{
    public function __construct()
    {
        $this->middleware('inicioSesion');
    }

    function viewMostrarAlumnos(){
        $personas = DB::table('personas')->where('tipos_personas_id_tipo_persona', '=', 2)->get();
        $alumnos = DB::table('usuarios')
        ->select('personas.id_persona', 'personas.matricula', 'personas.nombre', 'carreras.carrera', 
        'cuatrimestre.cuatrimestre', 'talleres.taller', 'solicitudes.id_solicitudes', 'solicitudes.horas_servicio_social', 'usuarios.created_at', 
        'usuarios.updated_at', 'personas.tipos_personas_id_tipo_persona')
        ->leftjoin('personas', 'personas.id_persona', '=', 'usuarios.personas_id_persona')
        ->leftjoin('solicitudes','solicitudes.personas_id_persona', '=', 'personas.id_persona')
        ->leftjoin('talleres','talleres.id_taller', '=', 'solicitudes.tallleres_id_taller')
        ->leftjoin('cuatrimestre','cuatrimestre.id_cuatrimestre', '=', 'personas.cuatrimestre_id_cuatrimestre')
        ->leftjoin('carreras','carreras.id_carrera', '=', 'personas.carreras_id_carrera')
        ->where('personas.tipos_personas_id_tipo_persona', '=', 2)
        ->get();
        $talleres = Taller::all();
        $profesoresx2 = DB::table('personas')
        ->select('personas.id_persona', 'personas.nombre', 'talleres.id_taller', 'talleres.taller', 'usuarios.created_at', 
        'solicitudes.id_solicitudes', 'usuarios.updated_at')
        ->leftjoin('talleres', 'talleres.id_maistro', '=', 'personas.id_persona')
        ->rightjoin('usuarios', 'personas.id_persona', '=', 'usuarios.personas_id_persona')
        ->leftjoin('solicitudes','solicitudes.personas_id_persona', '=', 'personas.id_persona')
        ->where('personas.tipos_personas_id_tipo_persona', '=', 1)
        ->get();
        $horasTaller = DB::table('usuarios')
        ->select('personas.id_persona', 'personas.matricula', 'personas.nombre', 'solicitudes.horas_servicio_social')
        ->rightjoin('personas', 'personas.id_persona', '=', 'usuarios.personas_id_persona')
        ->leftjoin('solicitudes','solicitudes.personas_id_persona', '=', 'personas.id_persona')
        ->leftjoin('talleres','talleres.id_taller', '=', 'solicitudes.tallleres_id_taller')
        ->leftjoin('cuatrimestre','cuatrimestre.id_cuatrimestre', '=', 'personas.cuatrimestre_id_cuatrimestre')
        ->leftjoin('carreras','carreras.id_carrera', '=', 'personas.carreras_id_carrera')
        ->groupBy('personas.nombre')
        ->where('personas.tipos_personas_id_tipo_persona', '=', 2)
        /*->groupBy('solicitudes.horas_servicio_social', 'personas.id_persona', 'personas.matricula',
        'personas.nombre', 'carreras.carrera', 'cuatrimestre.cuatrimestre', 'talleres.taller', 'usuarios.created_at',
        'usuarios.updated_at', 'personas.tipos_personas_id_tipo_persona')*/
        ->get();
        $carrera = DB::table('carreras')->get();
        $cuatrimestre = Cuatrimestre::all();
        /*$horas = 0;
        $total = 0;
        foreach($horasTaller as $ht){
                $horas = $ht->horas_servicio_social;
                $total += $horas;
        }
        $total = 0;*/

        $horasTallerX2 = DB::table('usuarios')
        ->select('personas.id_persona', 'personas.matricula', 'personas.nombre', DB::raw('SUM("solicitudes.horas_servicio_social") AS horas_servicio_social'))
        ->join('personas', 'personas.id_persona', '=', 'usuarios.personas_id_persona')
        ->join('solicitudes','solicitudes.personas_id_persona', '=', 'personas.id_persona')
        ->join('talleres','talleres.id_taller', '=', 'solicitudes.tallleres_id_taller')
        ->join('cuatrimestre','cuatrimestre.id_cuatrimestre', '=', 'personas.cuatrimestre_id_cuatrimestre')
        ->join('carreras','carreras.id_carrera', '=', 'personas.carreras_id_carrera')
        ->where('personas.tipos_personas_id_tipo_persona', '=', 2)
        ->groupBy('personas.nombre')
        ->get();
        
        dd($horasTallerX2);
       

        return view('TalleresUTT.Alumnos.mostrarAlumnos', compact('alumnos', 'personas', 'talleres', 
        'carrera', 'cuatrimestre', 'profesoresx2', 'horasTaller', 'horasTallerX2'));
    }

    function actualizarAlumno(Request $request, $id, $idsolicitud){
        if($request->ajax()){
            $alumno = Persona::find($id);
            $alumno->matricula = $request->matricula;
            $alumno->nombre = $request->alumno;
            $alumno->carreras_id_carrera = $request->carrera;
            $alumno->cuatrimestre_id_cuatrimestre = $request->cuatrimestre;
            $alumno->save();

            $solicitud = Solicitud::find($idsolicitud);
            $solicitud->horas_servicio_social = $request->horas;
            $solicitud->tallleres_id_taller = $request->taller;
            $solicitud->save();
        }
    }

    function actualizarProfesor(Request $request, $idprofe){
        if($request->ajax()){
            $profesor = Persona::find($idprofe);
            $profesor->nombre = $request->profesor;
            $profesor->save();
        }
    }

    function eliminarProfesor(Request $request, $idtaller){
        if($request->ajax()){
            return $profesor = Taller::find($idtaller);
            $profesor->destroy();
        }
    }

    function buscador(Request $request){
        $alumnos = DB::table('usuarios')
        ->select('personas.id_persona', 'personas.matricula', 'personas.nombre', 'carreras.carrera', 
        'cuatrimestre.cuatrimestre', 'talleres.taller', 'solicitudes.id_solicitudes', 'solicitudes.horas_servicio_social', 'usuarios.created_at', 
        'usuarios.updated_at', 'personas.tipos_personas_id_tipo_persona')
        ->rightjoin('personas', 'personas.id_persona', '=', 'usuarios.personas_id_persona')
        ->leftjoin('solicitudes','solicitudes.personas_id_persona', '=', 'personas.id_persona')
        ->leftjoin('talleres','talleres.id_taller', '=', 'solicitudes.tallleres_id_taller')
        ->leftjoin('cuatrimestre','cuatrimestre.id_cuatrimestre', '=', 'personas.cuatrimestre_id_cuatrimestre')
        ->leftjoin('carreras','carreras.id_carrera', '=', 'personas.carreras_id_carrera')
        ->orWhere('matricula', 'LIKE', '%'.$request->buscadoralumno.'%')
        ->orWhere('nombre', 'LIKE', '%'.$request->buscadoralumno.'%')
        ->orWhere('horas_servicio_social', 'LIKE', '%'.$request->buscadoralumno.'%')
        ->orWhere('carrera', 'LIKE', '%'.$request->buscadoralumno.'%')
        ->get();
        return $alumnos;
    }

    function buscatesta(Request $request){
        $alumnos = DB::table('usuarios')
        ->select('personas.id_persona', 'personas.matricula', 'personas.nombre', 'carreras.carrera', 'cuatrimestre.cuatrimestre', 'talleres.taller', 'solicitudes.horas_servicio_social', 'usuarios.created_at', 'usuarios.updated_at', 'personas.tipos_personas_id_tipo_persona')
        ->rightjoin('personas', 'personas.id_persona', '=', 'usuarios.personas_id_persona')
        ->leftjoin('solicitudes','solicitudes.personas_id_persona', '=', 'personas.id_persona')
        ->leftjoin('talleres','talleres.id_taller', '=', 'solicitudes.tallleres_id_taller')
        ->leftjoin('cuatrimestre','cuatrimestre.id_cuatrimestre', '=', 'personas.cuatrimestre_id_cuatrimestre')
        ->leftjoin('carreras','carreras.id_carrera', '=', 'personas.carreras_id_carrera')
        ->orWhere('matricula', 'LIKE', '%'.$request->buscadoralumno.'%')
        ->orWhere('nombre', 'LIKE', '%'.$request->buscadoralumno.'%')
        ->orWhere('horas_servicio_social', 'LIKE', '%'.$request->buscadoralumno.'%')
        ->orWhere('carrera', 'LIKE', '%'.$request->buscadoralumno.'%')
        ->get();
        return $alumnos;
    }

}
