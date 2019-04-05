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
