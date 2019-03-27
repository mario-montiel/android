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
    /*public function __construct()
    {
        $this->middleware('inicioSesion');
        
    }*/

	function viewTalleres(){
		$tipos_taller = DB::table('tipos_taller')->get();
		return view('TalleresUTT.Talleres.registroTalleres', compact('tipos_taller'));
	}
    function talleres(Request $request){
        /*$this->validate($request, [
            'nombre' => 'required|max:255',
            'encargado' => 'required|max:255',
            'tipo' => 'required|int|min:1',
            'descripcion' => 'required|max:255',
            'horarios' => 'required|max:50',
            'radio' => 'required',],

            ['nombre.required' => 'Ingrese un nombre',
            'encargado.required' => 'Ingrese un encargado',
            'tipo.integer' => 'Seleccione un tipo de taller',
            'descripcion.required' => 'Ingrese una descripción',
            'horarios.required' => 'Ingrese un horario',
            'radio.required' => 'Seleccione una imagen',]);*/
        if ($request->ajax()) {
            # code...
            $talleres = new Taller();
            $talleres->nombre = $request->get('nombre');
            $taller = $request->get('nombre');
            $talleres->encargado = $request->get('encargado');
            $talleres->tipos_taller = $request->get('tipo');
            $talleres->descripcion = $request->get('descripcion');
            $talleres->horarios = $request->get('horarios');
            $talleres->icono = $request->get('radio');
            $talleres->save();

            $tallerx = DB::table('talleres')
            ->select('talleres.id_taller','talleres.nombre', 'talleres.encargado', 'tipos_taller.tipo', 'talleres.descripcion', 'talleres.horarios')
            ->join('tipos_taller','tipos_taller.id_tipotaller', '=', 'talleres.tipos_taller')->get();

            return $tallerx;

           /*return redirect('/mostrartalleres')
            ->with('taller', ' se creó correctamente');*/
            /*return response()->json([
                'taller' => $taller->nombre . ' fue registrado correctamente'
             ]);*/
        }
    	
    }

    function viewMostrarTalleres(){
        $numtalleres = Taller::paginate(5);
    	$taller = DB::table('talleres')
                ->select('talleres.id_taller','talleres.nombre', 'talleres.encargado', 'tipos_taller.tipo', 'talleres.descripcion', 'talleres.horarios')
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
        /*$this->validate($request, [
            'nombre' => 'required|max:255',
            'encargado' => 'required|max:255',
            'tipo' => 'required|int|min:1',
            'descripcion' => 'required|max:255',
            'horarios' => 'required|max:50',
            'radio' => 'required',],

            ['nombre.required' => 'Ingrese el nombre de taller',
            'encargado.required' => 'Ingrese un encargado de taller',
            'tipo.integer' => 'Seleccione un tipo de taller',
            'descripcion.required' => 'Ingrese una descripción de taller',
            'horarios.required' => 'Ingrese el horario del taller',
            'radio.required' => 'Seleccione una imagen',]);*/

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

             /*return redirect('/mostrartalleres')
            ->with('actualizacion', 'El taller se actualizó correctamente');*/
        }
            /*return response()->json([
                'actualizacion' => $taller->nombre . ' fue actualizado correctamente'
             ]);*/
    }

    function eliminarTaller(Request $request, $id){
       
       
        if($request->ajax()){
            $id_taller = $request->id_taller;
             $taller = Taller::findOrFail($id);
            $taller->delete($id);
            /*return redirect('/mostrartalleres')
            ->with('eliminacion', 'El taller se actualizó correctamente');*/
            //return $eliminacion = $taller->nombre . ' fue eliminado correctamente.'; 
            /*return response()->json([
                'eliminacion' => $taller->nombre . ' fue eliminado correctamente'
             ]);*/

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

    ////////////////////////////////////







    /*function talleres(Request $request){

        $talleres = new Taller();
        $talleres->nombre = $request->get('nombre');
        $talleres->encargado = $request->get('encargado');
        $talleres->tipos_taller = $request->get('tipo');
        $talleres->descripcion = $request->get('descripcion');
        $talleres->horarios = $request->get('horarios');
        $talleres->icono = $request->get('radio');
        $talleres->save();
    }

    function viewMostrarTalleres(){
        $numtalleres = Taller::paginate(5);
        $taller = DB::table('talleres')
                ->select('talleres.id_taller','talleres.nombre', 'talleres.encargado', 'tipos_taller.tipo', 'talleres.descripcion', 'talleres.horarios')
                ->join('tipos_taller','tipos_taller.id_tipotaller', '=', 'talleres.tipos_taller')->paginate(5);
        $tipos_taller = DB::table('tipos_taller')->get();   

           return view('TalleresUTT.Talleres.mostrarTalleres', compact('taller', 'tipos_taller', 'numtalleres'));
    }

    function actualizarTaller(Request $request, $id){
       $id_taller = $request->id_taller;

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

    function arregloJohnnyLand(){
        $talleres = DB::table('talleres')->get();
        return $talleres;
    }

    function arregloJohnnyLandDepo(){
         $deportivos = Taller::where("tipos_taller", '=', "2")->get();
        return $deportivos;
    }

    function arregloJohnnyLandCult(){
         $deportivos = Taller::where("tipos_taller", '=', "1")->get();
        return $deportivos;
    }

    function eliminarTaller(Request $request, $id){
        
            Taller::destroy($id);
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
       
    }*/
}

