<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use App\Modelos\Login;
use App\Modelos\Taller;
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
                ->select('personas.matricula', 'personas.nombre', 'personas.carreras_id_carrera', 'personas.cuatrimestre_id_cuatrimestre', 'talleres.taller', 'solicitudes.horas_servicio_social', 'usuarios.created_at', 'usuarios.updated_at')
                ->rightjoin('personas', 'personas.id_persona', '=', 'usuarios.personas_id_persona')
                ->leftjoin('solicitudes','solicitudes.personas_id_persona', '=', 'personas.id_persona')
                ->rightjoin('talleres','talleres.id_taller', '=', 'solicitudes.tallleres_id_taller')
                ->where('personas.tipos_personas_id_tipo_persona', '=', 2)
                ->get();
        $talleres = Taller::all();

        return view('TalleresUTT.Alumnos.mostrarAlumnos', compact('alumnos', 'personas', 'talleres'));
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

}
