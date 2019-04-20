<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection as Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as Rq; 
use App\Modelos\Taller;
use App\Modelos\Tipo_Taller;
use Session;

class TalleresController extends Controller
{
    public function __construct()
    {
        $this->middleware('inicioSesion');
    }

	function viewTalleres(){
		$tipos_taller = DB::table('tipos_taller')->get();
		return view('TalleresUTT.Talleres.registroTalleres', compact('tipos_taller'));
	}
    function talleres(Request $request){
        if ($request->ajax()) {
            # code...
            $talleres = new Taller();
            $talleres->nombre = $request->get('nombre');
            $talleres->encargado = $request->get('encargado');
            $talleres->tipos_taller = $request->get('tipo');
            $talleres->descripcion = $request->get('descripcion');
            $talleres->horarios = $request->get('horarios');
            $talleres->icono = $request->get('radio');
            $talleres->save();

            $tallerx = DB::table('talleres')
            ->select('talleres.id_taller','talleres.nombre', 'talleres.encargado', 'tipos_taller.tipo', 'talleres.descripcion', 'talleres.horarios')
            ->join('tipos_taller','tipos_taller.id_tipotaller', '=', 'talleres.tipos_taller')->get();

            return response()->json(['taller' => 'Taller registrado correctamente']);
            
        }
    	
    }

    function viewMostrarTalleres(){
        $numtalleres = Taller::paginate(5);
    	$taller = DB::table('talleres')
                ->select('talleres.id_taller','talleres.taller', 'talleres.encargado', 'tipos_taller.tipo', 'talleres.descripcion', 'talleres.horarios')
                ->join('tipos_taller','tipos_taller.id_tipotaller', '=', 'talleres.tipos_taller')->get();//paginate(5);
        $tipos_taller = DB::table('tipos_taller')->get();   

    	   return view('TalleresUTT.Talleres.mostrarTalleres', compact('taller', 'tipos_taller', 'numtalleres'));
    }

    function viewMostrarResultado(){
        $taller = DB::table('talleres')
                ->select('talleres.id_taller','talleres.nombre', 'talleres.encargado', 'tipos_taller.tipo', 'talleres.descripcion', 'talleres.horarios')
                ->join('tipos_taller','tipos_taller.id_tipotaller', '=', 'talleres.tipos_taller')->get();

            return $taller;
    }

    function actualizarTaller(Request $request, $id){
        if($request->ajax()){
             $id_taller = $request->id_taller;
            $taller = Taller::findOrFail($id_taller);
            $taller->nombre = $request->get('nombre');
            $taller->encargado = $request->get('encargado');
            $taller->tipos_taller = $request->get('tipo');
            $taller->descripcion = $request->get('descripcion');
            $taller->horarios = $request->get('horarios');
            $taller->icono = $request->get('radio');
            $taller->save();
        }
    }

    function eliminarTaller(Request $request, $id){
       
       
        if($request->ajax()){
            $id_taller = $request->id_taller;
             $taller = Taller::findOrFail($id);
            $taller->delete($id);

             $eliminar = DB::table('talleres')
             ->select('talleres.id_taller','talleres.nombre', 'talleres.encargado', 'tipos_taller.tipo', 'talleres.descripcion', 'talleres.horarios')
             ->join('tipos_taller','tipos_taller.id_tipotaller', '=', 'talleres.tipos_taller')->get();
 
             return $eliminar;
        }

        Session::flash('eliminacion', 'eliminacion');
    }

    public function search(Request $request){
    
            $tabla = DB::table('talleres')
                ->select('talleres.id_taller','talleres.nombre', 'talleres.encargado', 'tipos_taller.tipo', 'talleres.descripcion', 'talleres.horarios')
                ->join('tipos_taller','tipos_taller.id_tipotaller', '=', 'talleres.tipos_taller')
                ->orWhere('encargado', 'LIKE', '%'.$request->search.'%')
                ->orWhere('nombre', 'LIKE', '%'.$request->search.'%')
                ->orWhere('tipo', 'LIKE', '%'.$request->search.'%')
                ->orWhere('descripcion', 'LIKE', '%'.$request->search.'%')
                ->orWhere('horarios', 'LIKE', '%'.$request->search.'%')
                ->get();

            return $tabla;
       
    }
}

