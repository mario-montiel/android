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


Route::get('/','LoginController@viewLogin');


//////////////////////////////////////////////////////////

Route::get('/inicio','IngenieriaSoftware@viewInicio');

Route::get('/inicioSesion','IngenieriaSoftware@viewInicioSesion');

Route::get('/registrarse','IngenieriaSoftware@viewRegistrarse');

Route::get('/inicioLogin','IngenieriaSoftware@viewInicioLogin');

Route::get('/perfil','IngenieriaSoftware@viewPerfil');

Route::get('/verPerfil','IngenieriaSoftware@viewVerPerfil');

Route::get('/chat','IngenieriaSoftware@viewChat');

Route::get('/fotosperfil','IngenieriaSoftware@viewFotosPerfil');

Route::get('/cambioFoto','IngenieriaSoftware@viewCambioFoto');

Route::get('/seleccionFoto','IngenieriaSoftware@viewSeleccionFoto');

/////////////////////////////////////////////////////////////////////////////////

Route::get('/inicioSesion', 'LoginController@viewLogin');
Route::post('/inicioSesion', 'LoginController@login');

Route::get('/registrarse', 'LoginController@viewRegistroUsuario');
Route::post('/registrar', 'LoginController@registrarse');

Route::get('/registroTalleres', 'TalleresController@viewTalleres');
Route::post('/talleres', 'TalleresController@talleres');
Route::get('/mostrartalleres', 'TalleresController@viewMostrarTalleres');
Route::get('/editartaller/{id}', 'TalleresController@viewActualizarTalleres');
Route::PUT('/editartaller/{id}', 'TalleresController@actualizarTaller');

Route::get('/JohnnyLand', 'TalleresController@arregloJohnnyLand');
Route::get('/JohnnyLandDepo', 'TalleresController@arregloJohnnyLandDepo');
Route::get('/JohnnyLandCult', 'TalleresController@arregloJohnnyLandCult');
