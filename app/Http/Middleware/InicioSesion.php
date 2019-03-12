<?php

namespace App\Http\Middleware;

use Closure;

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
        //dd($vato->contraseña);

        if ($vato->usuario == $usuario && $vato->contraseña == $pass) {
           return $next($request);
        }
       
       return redirect('/inicioSesion');
        
    }
}
