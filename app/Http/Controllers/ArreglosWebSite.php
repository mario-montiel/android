<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Modelos\Carrera;
use App\Modelos\Cuatrimestre;
use App\Modelos\Solicitud;
use App\Modelos\Taller;
use App\Modelos\Login;
use App\Modelos\Tipo_Taller;
use App\Modelos\Usuario;
use Session;

class ArreglosWebSite extends Controller
{
    public $siono=0;
    public $nombre;
    function arregloJohnnyLand(){
        return $talleres = DB::table('talleres')->get();
    }

    function arregloJohnnyLandDepo(){
         return $deportivos = Taller::where("tipos_taller", '=', "2")->get();
    }

    function arregloJohnnyLandCult(){
         return $deportivos = Taller::where("tipos_taller", '=', "1")->get();
    }

    function arregloJohnnyLandCarreras(){
    	return $carreras = DB::table('carreras')->get();
    }

    function arregloJohhnyLandCuatri(){
    	return $cuatrimestre = Cuatrimestre::all();
    }

    function arregloJohhnyLandSolicitud(){
    	return $solicitud = Solicitud::all();
    }
    
    function arregloJohnnylandHoras(){
        $talleres = Taller::all();
        $usuario = Usuario::all();
        return array($talleres->encargado, $talleres->nombre, $usuario->alumno);
    }

    function arregloJohnnyWuW(Request $request){
        $usuario = $request->usuario;
        $vato = DB::table('usuarios')->where('usuario', $usuario)->first();
        
            return [
                'usuario' => $usuario,
                'password' => $vato->password
            ];
    }

    function solicitud(Request $request){
        $usuario = $request->usuario;
        $vato = DB::table('usuarios')->where('usuario', $usuario)->first();
        
        $solicitud = new Solicitud();
        $solicitud->tallleres_id_taller = $request->taller;
        $solicitud->usuarios_id_usuario = $vato->id_usuario;
        $solicitud->save();
    }

    function solicitudusuario(Request $request){
        $usuario = $request->usuario;
        $vato = DB::table('usuarios')
        ->join('solicitudes','solicitudes.usuarios_id_usuario', '=', 'usuarios.id_usuario')
        ->join('talleres', 'talleres.id_taller', '=', 'solicitudes.tallleres_id_taller')
        ->select('talleres.nombre','talleres.encargado', 'usuarios.horas')
        ->where('usuarios.usuario', $usuario)->first()
        ->get();

        return[
            'taller' => $vato->nombre,
            'encargado' => $vato->encargado,
            'horas' => $vato->horas
        ];
    }

    

    function pruebon($a, $b, $c){
        if($a > $b && $a > $c){
            return "A es el mayor";
        }
        else if ($b > $a && $b > $c){
            return "B es el mayor";
        }
        else if($c > $b && $c > $a){
            return "C es el mayor";
        }
        else{
            return "ingrese numeros diferentes";
        }
    }
}
