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
        $vato = DB::table('usuarios')->first();
        $usuario = $request->get('usuario');
        $pass = $request->get('password');

        $yeah = Session::get('usuario');

        $verificacion = $yeah->privilegios;

        if (Session::get('usuario') && $verificacion == 1) {
            $usuario = $next($request);
        }
        else if($usuario == null && $pass == null){
            return redirect('/iniciosesion')
                ->with('hacker', 'Hacker Detectado!...');
        }
        return $usuario;
    }
}
