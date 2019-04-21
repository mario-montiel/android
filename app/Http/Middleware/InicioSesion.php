<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\DB;
use Closure;
use Session;


class InicioSesion
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //$vato = DB::table('usuarios')->first();
        $usuario = $request->get('usuario');
        $pass = $request->get('password');

        if(Session::get('usuario')){
            $yeah = Session::get('usuario');
            $vato = DB::table('usuarios')->where('usuario', $usuario)->first();
            $vato2 = DB::table('personas')->where('id_persona', $yeah->personas_id_persona)->first();
            //dd($vato2);
            if (Session::get('usuario') && $vato2->tipos_personas_id_tipo_persona == 1) {
                $usuario = $next($request);
            }
            else if($usuario == null && $pass == null){
                return redirect('/iniciosesion')
                    ->with('hacker', 'Hacker Detectado!...');
            }
            return $usuario;
        }

        if($usuario == null && $pass == null){
            return redirect('/iniciosesion')
                ->with('hacker', 'Hacker Detectado!...');
        }
        return $usuario;
    }
}
