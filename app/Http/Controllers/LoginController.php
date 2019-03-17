<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponseRedirectResponseredirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Modelos\Login;
use Session;

class LoginController extends Controller
{
    function viewLogin(Request $request)
    {
        $vato = DB::table('usuarios')->first();
        return view('TalleresUTT.Login.login', compact('vato'));	
    }

    function login(Request $request)
    {
        $this->validate($request, [
            'usuario' => 'required|max:255',
            'password' => 'required',],

            ['usuario.required' => 'Ingrese un usuario',
            'password.required' => 'Ingrese una contraseña',]);

        $vato = DB::table('usuarios')->first();

        $usuario = $request->get('usuario');
        $pass = $request->get('password');
        //dd($vato->usuario);

        if ($vato->usuario == $usuario && $vato->contraseña == $pass) {
           return redirect('/registrotalleres');
        }
       
       return redirect('/iniciosesion');

        
    }

    function viewRegistroUsuario()
    {
    	return view('TalleresUTT.Login.registro');
    }
    function registrarse(Request $request)
    {
		$this->validate($request, [
		    'usuario' => 'required|max:255',
		    'password' => 'required',], 

		    ['usuario.required' => 'Ingrese un usuario',
    		'password.required' => 'Ingrese una contraseña',]);



        $usuario = new Login();
		$usuario->usuario = $request->get('usuario');
		$usuario->contraseña = $request->get('password');
		$usuario->save();

		return view('TalleresUTT.Login.login');
    
	}

    function viewLoading(){
        return view('TalleresUTT.Loading.loading');
    }

}
