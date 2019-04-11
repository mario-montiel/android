<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Modelos\Carrera;
use App\Modelos\Cuatrimestre;
use App\Modelos\Solicitud;
use App\Modelos\Taller;
use App\Modelos\Tipo_Taller;

class ArreglosWebSite extends Controller
{
    public $siono = 0;
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

    function arregloJohnnyLandUusario(Request $request){
        /*$usuario = Usuario::where('usuario', '=', $request->usuario)->first();
        if(sizeof($usuario)){
            $this->siono=1;
        }
        else{
            $contraseña = Usuario::where('password', '=', $request->contraseña)->first();
            if(sizeof($contraseña)){
                $this->siono=1;
            }
        }*/
        $usuario = Usuario::where("usuario", "=", $request->usuario)->get();
        if ($usuario=="[]") {
            $this->siono=1;
        }else{
            $contraseña = Usuario::where("password", "=", $request->contraseña)->get();
            if ($contraseña=="[]") {
                $this->siono=1;
            }
            else{
                $us = Usuario::select("usuario","password")->where("usuario", "=", $request->usuario)->get();
                if($us->password=$request->contraseña){
                    $this->siono=0;
                    $this->nombre=$request->usuario;
                }
            }
        }
    }
    function arregloJohnnyLandUsuarioget(){

        if($this->siono==0){
            return Usuario::select("usuario")->where("usuario", "=", $this->nombre)->get();
        }
        else{
            return $obj = array('usuario' => "nada" );
        }
    }

    function arregloJohnnyLandUusarioGet(){
        return $this->siono;
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
