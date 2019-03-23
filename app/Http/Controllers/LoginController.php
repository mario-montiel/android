<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponseRedirectResponseredirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Modelos\Login;
use Session;

class LoginController extends Controller
{
    public function __construct()
    {
            $this->middleware('inicioSesion', ['except' => ['viewLogin', 'login', 'logout']]);
    }

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
            $user = Session::put('usuario', $usuario);
            $user = Session::save('usuario', $usuario);
            $user = Session::get('usuario', $usuario);
            
           return view('TalleresUTT.Home.home')
                ->with('conectado', 'Se cuenta se inició correctamente')
                ->with('user', $user);
        }

        if ($usuario == null && $pass == null) {
           return redirect('/iniciosesion')
                ->with('hacker', 'Hacker Detectado!...');
        }
       
        return redirect('/iniciosesion')
                ->with('userIncorrecto', 'Cuenta o Contraseña incorrectas');  
    }

    function logout(){
        Session::flush();

        return redirect('/iniciosesion')
            ->with('logout', 'Su cuenta ha sido cerrada');
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
