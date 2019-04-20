<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use App\Modelos\Login;
use Carbon\Carbon;

class AlumnosController extends Controller
{
    public function __construct()
    {
        $this->middleware('inicioSesion');
    }

    function viewMostrarAlumnos(){
        $personas = DB::table('personas')->where('tipos_personas_id_tipo_persona', '=', 2)->get();
        $alumnos = DB::table('personas')
                ->select('personas.matricula', 'personas.nombre', 'personas.carreras_id_carrera', 'personas.cuatrimestre_id_cuatrimestre', 'solicitudes.horas_servicio_social')
                ->leftjoin('solicitudes','solicitudes.personas_id_persona', '=', 'personas.id_persona')
                ->leftjoin('talleres','talleres.id_taller', '=', 'solicitudes.tallleres_id_taller')
                ->get();


        return view('TalleresUTT.Alumnos.mostrarAlumnos', compact('alumnos', 'personas'));
    }

    function actualizarAlumno(Request $request, $id){
        if($request->ajax()){
            $alumno = Login::find($id);
            $alumno->usuario = $request->usuario;
            $alumno->alumno = $request->alumno;
            $alumno->horas_Servicio_social = $request->horas;
            $alumno->save();

            return $alumno;
        }
    }

    function buscador(Request $request){
        $alumnos = DB::table('usuarios')
        ->where('usuario', 'LIKE', '%'.$request->buscadoralumno.'%')
        ->orWhere('alumno', 'LIKE', '%'.$request->buscadoralumno.'%')
        ->orWhere('horas_servicio_social', 'LIKE', '%'.$request->buscadoralumno.'%')
        ->orWhere('matricula', 'LIKE', '%'.$request->buscadoralumno.'%')
        ->get();

        return $alumnos;
    }

    //matricula, nombre, carrera, cuatrimestre(si alcanza el tiempo; "temporizador"), taller, horas,
}
