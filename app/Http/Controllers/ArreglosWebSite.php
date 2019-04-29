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
        $consulta = DB::table('usuarios')
        ->join('personas', 'usuarios.personas_id_persona', '=', 'personas.id_persona')
        ->join('tipos_personas', 'tipos_personas.id_tipo_persona', '=', 'personas.tipos_personas_id_tipo_persona')
        ->where('usuario', $request->usuario)->get();
        $vato = json_decode($consulta,true);
        $password="";
        $tipo="";
        foreach ($vato as $key => $con) {
            $password = $con['password'];
            $tipo =$con['tipo'];
        }
            return [
                'usuario' => $request->usuario,
                'password' => $password,
                'tipo' => $tipo
            ];
    }

    function solicitud(Request $request){
        $obj="";
        $id= DB::table('usuarios')
        ->join('personas', 'usuarios.personas_id_persona', '=', 'personas.id_persona')
        ->where('usuarios.usuario', $request->$usuario)->get();
        $array = json_decode($id, true);
        foreach ($array as $key => $con) {
            $obj=$con['personas_id_persona'];
        }
        $vato = DB::table('usuarios')->where('usuario', $request->$usuario)->first();
        
        $solicitud = new Solicitud();
        $solicitud->tallleres_id_taller = $request->$taller;
        $solicitud->horas_servicio_social = 0;
        $solicitud->personas_id_persona = $obj;
        $solicitud->save();
    }

    function solicitudusuario(Request $request){
        $usuario = $request->usuario;
        $vato = DB::table('usuarios')
        ->join('solicitudes','solicitudes.usuarios_id_usuario', '=', 'usuarios.id_usuario')
        ->join('talleres', 'talleres.id_taller', '=', 'solicitudes.tallleres_id_taller')
        ->select('talleres.nombre','talleres.encargado', 'usuarios.horas_servicio_social')
        ->where('usuarios.usuario', $usuario)->first();

        $taller = $vato->nombre;
        $encargado = $vato->encargado;
        $horas = $vato->horas_servicio_social;

        return[
            'taller' => $taller,
            'encargado' => $encargado,
            'horas' => $horas
        ];
    }

    function traerhoras(Request $request){
        $total=0;
        $siono=1;
        $horas = DB::table('solicitudes')
        ->join('personas', 'personas.id_persona', '=', 'solicitudes.personas_id_persona')
        ->join('usuarios', 'personas.id_persona', '=', 'usuarios.personas_id_persona')
        ->select('solicitudes.horas_servicio_social')
        ->where('usuarios.usuario', $horas)->get();
        foreach ($horas as $hr) {
            $total= $total+$hr->horas_servicio_social;
        }
        if($total==0){
            $siono=0;
        }
        return [
            'siono'=>$siono];
    }
    function horasusuario($usuario){
        $consulta = DB::table('personas AS profesores')
        ->join('talleres', 'talleres.id_maistro', '=', 'profesores.id_persona')
        ->join('solicitudes', 'solicitudes.tallleres_id_taller', '=', 'talleres.id_taller')
        ->join('personas', 'personas.id_persona', '=', 'solicitudes.personas_id_persona')
        ->join('usuarios', 'usuarios.personas_id_persona', '=', 'personas.id_persona')
        ->select('profesores.nombre AS profesor', 'talleres.taller AS taller', 'solicitudes.horas_servicio_social AS horas')
        ->where('usuarios.usuario', $usuario)->get();
        return $consulta;
    }
    
    ////////////////

    function tipodeusuario(Request $request){
        $con = $request->usuarios;
        $consulta = DB::table('usuarios')
        ->join('personas', 'personas.id_persona', '=', 'usuarios.personas_id_persona')
        ->join('tipos_personas', 'tipos_personas.id_tipo_persona', '=', 'personas.tipos_personas_id_tipo_persona')
        ->select('tipos_personas.tipo')
        ->where('usuarios.usuario', $con)->get();
        return $consulta;
    }
    function listadosalumnos($usuario){
        $consulta = DB::table('usuarios')
        ->join('personas AS profesores', 'profesores.id_persona', '=', 'usuarios.personas_id_persona')
        ->join('talleres', 'talleres.id_maistro', '=', 'profesores.id_persona')
        ->join('solicitudes', 'solicitudes.tallleres_id_taller', '=', 'talleres.id_taller')
        ->join('personas', 'personas.id_persona', '=', 'solicitudes.personas_id_persona')
        ->join('cuatrimestre', 'cuatrimestre.id_cuatrimestre', '=', 'personas.cuatrimestre_id_cuatrimestre')
        ->select('personas.matricula', 'personas.nombre', 'cuatrimestre.cuatrimestre', 'solicitudes.horas_servicio_social AS horas')
        ->where('usuarios.usuario', $usuario)->get();
        return $consulta;
    }
    function actualizadohoras(Request $id, $profe, $horas){
        $obj="";
        $consulta = DB::table('solicitudes')
        ->join('personas', 'personas.id_persona', '=', 'solicitudes.personas_id_persona')
        ->join('talleres', 'talleres.id_taller', '=', 'solicitudes.tallleres_id_taller')
        ->join('personas AS profesor', 'profesor.id_persona', '=', 'talleres.id_maistro')
        ->join('usuarios', 'usuarios.personas_id_persona', '=', 'profesor.id_persona')
        ->select('solicitudes.id_solicitudes')
        ->where('personas.matricula',$id)
        ->where('usuarios.usuario',$profe)->get();
        $array = json_decode($consulta, true);
        foreach ($array as $key => $con) {
            $obj = $con['id_solicitudes'];
        }
        $tamaño = count(str_split($horas));
        $variable="";
        for ($i=1; $i <$tamaño ; $i++) { 
            $variable=$variable.$horas[$i];
        }
        if($horas[0]=="+"){
            $solicitudeshoras = Solicitud::find($obj);
            $horasktiene=$solicitudeshoras->horas_servicio_social;
            $solicitudeshoras->horas_servicio_social = $horasktiene + $variable;
            $solicitudeshoras->save(); 
        }else{
            $solicitudeshoras = Solicitud::find($obj);
            $horasktiene=$solicitudeshoras->horas_servicio_social;
            $solicitudeshoras->horas_servicio_social = $horasktiene - $variable;
            $solicitudeshoras->save(); 
        }
    }
}
