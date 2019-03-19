<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection as Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Modelos\Taller;
use App\Modelos\Tipo_Taller;

class TalleresController extends Controller
{
	function viewTalleres(){
		$tipos_taller = DB::table('tipos_taller')->get();
		return view('TalleresUTT.Talleres.registroTalleres', compact('tipos_taller'));
	}
    function talleres(Request $request){
        $this->validate($request, [
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
            'radio.required' => 'Seleccione una imagen',]);

    	$taller = DB::table('talleres')->get();
    	//$collection = collect($taller[0]->nombre);
    	
    	//dd($request->get('radio'));
    	$talleres = new Taller();
    	$talleres->nombre = $request->get('nombre');
    	$talleres->encargado = $request->get('encargado');
    	$talleres->tipos_taller = $request->get('tipo');
    	$talleres->descripcion = $request->get('descripcion');
    	$talleres->horarios = $request->get('horarios');
    	$talleres->icono = $request->get('radio');
    	//$talleres->eventos_id_evento = 1;
    	//dd($request->get('tipo'));
    	$talleres->save();

        return redirect('/registrotalleres')
            ->with('message', 'El taller se registró correctamente, vuelva pronto');
    }

    function viewMostrarTalleres(){
    	$talleres = DB::table("talleres")
            ->join('tipos_taller','tipos_taller.id_tipotaller', '=', 'talleres.tipos_taller')
            ->select('talleres.id_taller', 'talleres.nombre', 'talleres.encargado', 'tipos_taller.tipo', 'talleres.descripcion', 'talleres.horarios')
            ->get();

    	   return view('TalleresUTT.Talleres.mostrarTalleres', compact('talleres'));
    }

    function viewActualizarTalleres($id){
    	$taller = Taller::findOrFail($id);
    	$tipos_taller = DB::table('tipos_taller')->get();
		return view('TalleresUTT.Talleres.actualizarTaller', compact('taller', 'tipos_taller'));
    }

    function actualizarTaller(Request $request, $id){
        $this->validate($request, [
            'nombre' => 'required|max:255',
            'encargado' => 'required|max:255',
            'tipo' => 'required',
            'descripcion' => 'required|max:255',
            'horarios' => 'required|max:50',
            'radio' => 'required',],

            ['nombre.required' => 'Ingrese el nombre de taller',
            'encargado.required' => 'Ingrese un encargado de taller',
            'tipo.required' => 'Ingrese el tipo de taller',
            'descripcion.required' => 'Ingrese una descripción de taller',
            'horarios.required' => 'Ingrese el horario del taller',
            'radio.required' => 'Seleccione una imagen',]);

    	$taller = Taller::findOrFail($id);
    	$taller->nombre = $request->get('nombre');
    	$taller->encargado = $request->get('encargado');
    	$taller->tipos_taller = $request->get('tipo');
    	$taller->descripcion = $request->get('descripcion');
    	$taller->horarios = $request->get('horarios');
    	$taller->icono = $request->get('radio');
    	$taller->save();

    	return redirect('/mostrartalleres')
            ->with('actualizacion', 'El taller se actualizó correctamente');
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

    function eliminarTaller($id){
        Taller::destroy($id);

        return redirect('/mostrartalleres');
    }

    public function search(Request $request){
    
        if ($request->ajax()) {
            //$query = $request->get('query');
            $changos = "";
            $tabla = DB::table('talleres')
                ->join('tipos_taller','tipos_taller.id_tipotaller', '=', 'talleres.tipos_taller')
                ->select('talleres.nombre', 'talleres.encargado', 'tipos_taller.tipo', 'talleres.descripcion', 'talleres.horarios')
                ->where('encargado', 'LIKE', '%'.$request->search.'%')
                ->orWhere('nombre', 'LIKE', '%'.$request->search.'%')
                ->orWhere('tipo', 'LIKE', '%'.$request->search.'%')
                ->orWhere('descripcion', 'LIKE', '%'.$request->search.'%')
                ->orWhere('horarios', 'LIKE', '%'.$request->search.'%')
                ->get();
            if ($tabla) {
                foreach($tabla as $tablon){
                    $changos.='<tr>'.
                             '<td>'.$tablon->nombre.'</td>'.
                             '<td>'.$tablon->encargado.'</td>'.
                             '<td>'.$tablon->tipo.'</td>'.
                             '<td>'.$tablon->descripcion.'</td>'.
                             '<td>'.$tablon->horarios.'</td>';
                }
            }
            return Response($changos);

        }
        else{
            return Response()->json(['no'=>'No se encontro nachus']);
        }
         /*if ($request->ajax()) {
            $query = $request->get('query');
            if ($query != '') {
                
            }
            else{
                $data = DB::table('talleres')
                    ->orderBy('')
            }
        }
        return $query;*/

        //$resultado = $request->resultado;

        //dd($resultado);

        /*$resultado = Taller::orderBy('encargado', 'DESC')
            ->where('encargado', 'LIKE', "%$resultado%")
            ->get();

        $talleres = DB::table("talleres")
            ->join('tipos_taller','tipos_taller.id_tipotaller', '=', 'talleres.tipos_taller')
            ->select('talleres.id_taller', 'talleres.nombre', 'talleres.encargado', 'tipos_taller.tipo', 'talleres.descripcion', 'talleres.horarios')
            //->where('talleres.encargado', 'LIKE', '%resultado%')
            ->get();

        return view('TalleresUTT.Talleres.mostrarTalleres', compact('resultado','talleres'));*/


       
    }
}
