<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class Api_Token extends Authenticatable
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
        $usuario = Session::get('usuario');
        if (Hash::check($pass, $confirmarpass)) {
            $user = Session::put('usuario', $vato);
            $user = Session::save('usuario', $vato);
        return $next($request);
        }
    }
}
