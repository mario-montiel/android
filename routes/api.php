<?php

use Illuminate\Http\Request;
use App\Modelos\Login;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::get('/home', 'LoginController@token');

Route::get('/home/{usuario}', function ($usuario) {
    $usuario = DB::table('usuarios')
        ->where('usuario', '=', $usuario)
        ->get();
    
    if(Session::has('usuario')){
        
        return [
            'id_usuario' => $usuario->id_usuario,
            'usuario' => $usuario->usuario,
            'alumno' => $usuario->alumno,
            'password' => $usuario->password,
            'api_token' => $usuario->api_token,
            'created_at' => $usuario->created_at,
        ];
        //return response()->json(Session::get('usuario'));
    }
    return $usuario;
});
