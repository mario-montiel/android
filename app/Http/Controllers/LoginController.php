<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponseRedirectResponseredirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Modelos\Login;
use Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate \ Support \ Facades \ Auth;

class LoginController extends Controller
{
    public function __construct()
    {
            $this->middleware('inicioSesion', ['except' => ['viewLogin', 'login', 'logout', 'registrarse', 'viewRegistroUsuario']]);
    }

    function viewLogin(Request $request)
    {
        $vato = DB::table('usuarios')->first();
        return view('TalleresUTT.Login.login', compact('vato'));	
    }

    function login(Request $request)
    {
        $credenciales = $this->validate($request, [
            'usuario' => 'required|max:255',
            'password' => 'required',],

            ['usuario.required' => 'Ingrese un usuario',
            'password.required' => 'Ingrese una contraseña',]);

            //return $credenciales;

        
        //dd($vato[2]->password);
        
        
        $usuario = $request->get('usuario');
        $pass = $request->get('password');
        //dd($confirmar);

        $vato = DB::table('usuarios')->where('usuario', $usuario)->first();
        
        if($vato){
            $confirmarpass = $vato->password;
            $confirmar = $vato->usuario;

            if (Hash::check($pass, $confirmarpass) && $confirmar == $usuario) {
                $user = Session::put('usuario', $vato);
                $user = Session::save('usuario', $vato);
                
            return redirect('/')
                    ->with('conected', 'Su cuenta se inició correctamente')
                    ->with('user', $user);
            }
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
            
        
        $con = $request->get('password');
        //$clave = Hash::make($con);
        //dd($con);
        $password = Hash::make($con);
        $token = Str::random(60);
        //dd($token);


        $usuario = new Login();
		$usuario->usuario = $request->get('usuario');
        $usuario->password = $password;
        $usuario->api_token = $token;
        //dd($usuario->usuario);
		$usuario->save();

		return view('TalleresUTT.Login.login');
    
	}

    function viewLoading(){
        return view('TalleresUTT.Loading.loading');
    }

    function token(){
        $user = Session::get('usuario');
        //dd($user);
        //$token = $user->api_token;
        $usuario = Login::find(1);
        return $usuario->api_token;
    }

}
