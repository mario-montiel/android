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

    function arregloJohnnyLandUusario(Request $request){
        //$usuario = Login::where("usuario", "=", $request->usuario)->get();
        $usuarios = new Login();
        $usuarios->usuario = $request->usuario;
        $usuarios->password = $request->contraseña;
        $usuarios->save();
        return redirect('/');
    }
    
    /*function arregloJohnnyLandUsuarioget(){

        if($this->siono==0){
            return Login::select("usuario")->where("usuario", "=", $this->nombre)->get();
        }
        else{
            return $obj = array('usuario' => "nada" );
        }
    }*/

    /*function arregloJohnnyLandUusarioGet(){
        return $this->siono;
    }*/

    public function rutonpruebon(Request $request){
        $usuario = new Login();
        $usuario->usuario = $request->usuario;
        $usuario->password = $request->contraseña;
        $usuario->save();
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
