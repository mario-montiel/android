<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
Route::get('/', function () {
    return view('TalleresUTT.Login.login');
});
*/


//Route::get('/','LoginController@viewLogin');


//////////////////////////////////////////////////////////

Route::get('/inicio','IngenieriaSoftware@viewInicio');

//Route::get('/inicioSesion','IngenieriaSoftware@viewInicioSesion');

Route::get('/registrarse','IngenieriaSoftware@viewRegistrarse');

Route::get('/inicioLogin','IngenieriaSoftware@viewInicioLogin');

Route::get('/perfil','IngenieriaSoftware@viewPerfil');

Route::get('/verPerfil','IngenieriaSoftware@viewVerPerfil');

Route::get('/chat','IngenieriaSoftware@viewChat');

Route::get('/fotosperfil','IngenieriaSoftware@viewFotosPerfil');

Route::get('/cambioFoto','IngenieriaSoftware@viewCambioFoto');

Route::get('/seleccionFoto','IngenieriaSoftware@viewSeleccionFoto');

/////////////////////////////////////////////////////////////////////////////////

//Route::get('/', 'LoginController@viewLoading');

Route::get('/', 'HomeController@viewHome');

Route::get('/home', function () {
    $usuario = Session::get('usuario');

    if(Session::has('usuario')){
        return $usuario->api_token;
    }
    return "Nachus";
});

Route::get('/iniciosesion', 'LoginController@viewLogin');
Route::post('/iniciosesion', 'LoginController@login');
Route::get('/logout', 'LoginController@logout');


Route::get('/registrarse', 'LoginController@viewRegistroUsuario');
Route::post('/registrar', 'LoginController@registrarse');

//Route::get('/registrotalleres', 'TalleresController@viewTalleres');
Route::post('/talleres', 'TalleresController@talleres');
Route::get('/mostrartalleres', 'TalleresController@viewMostrarTalleres');
Route::get('/mostrarresultado', 'TalleresController@viewMostrarResultado');
//Route::get('/editartaller/{id}', 'TalleresController@viewActualizarTalleres');
Route::post('/editartaller/{id}', 'TalleresController@actualizarTaller');
Route::post('/eliminartaller/{id}', 'TalleresController@eliminarTaller');
Route::get('/search', 'TalleresController@search');

Route::get('/johnnyland', 'ArreglosWebSite@arregloJohnnyLand');
Route::get('/johnnylanddepo', 'ArreglosWebSite@arregloJohnnyLandDepo');
Route::get('/johnnylandcult', 'ArreglosWebSite@arregloJohnnyLandCult');
Route::get('/johnnylandcarrera', 'ArreglosWebSite@arregloJohnnyLandCarreras');
Route::get('/johnnylandcuatri', 'ArreglosWebSite@arregloJohhnyLandCuatri');
Route::get('/johnnylandsolicitud', 'ArreglosWebSite@arregloJohhnyLandSolicitud');

Route::get('/eventos', 'EventosController@viewEventos');
Route::post('/evento', 'EventosController@eventos');
Route::post('/editarevento/{id}', 'EventosController@actualizar');
Route::post('/eliminarevento/{id}', 'EventosController@eliminar');
Route::post('/asignarevento', 'EventosController@asignacion');
Route::get('/buscador', 'EventosController@buscador');

