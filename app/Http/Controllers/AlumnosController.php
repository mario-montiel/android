<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use App\Modelos\Login;
use Carbon\Carbon;

class AlumnosController extends Controller
{
    function viewMostrarAlumnos(){
        $alumnos = Login::all();

        return view('TalleresUTT.Alumnos.mostrarAlumnos', compact('alumnos'));
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
        ->get();

        return $alumnos;
    }
}
