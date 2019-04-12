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

        $vato = DB::table('usuarios')->where('usuario', $usuario)->first();

        $yeah = Session::get('usuario');

        if (Session::get('usuario') && Session::get('usuario')->privilegios == 1) {
            $usuario = $next($request);
        }
        else if($usuario == null && $pass == null){
            return redirect('/iniciosesion')
                ->with('hacker', 'Hacker Detectado!...');
        }
        return $usuario;
    }
}
