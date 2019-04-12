<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponseRedirectResponseredirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Modelos\Cuatrimestre;
use App\Modelos\Carrera;
use App\Modelos\Login;
use Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate \ Support \ Facades \ Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('inicioSesion', ['except' => ['viewLogin', 'login', 'logout', 'registrarse', 'viewRegistroUsuario', 'token']]);
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
        $carreras = Carrera::all();
        $cuatrimestres = Cuatrimestre::all();
    	return view('TalleresUTT.Login.registro', compact('carreras', 'cuatrimestres'));
    }
    function registrarse(Request $request)
    {
		$this->validate($request, [
            'usuario' => 'required|max:255',
            'alumno' => 'required|max:255',
		    'password' => 'required',], 

            ['usuario.required' => 'Ingrese un usuario',
            'alumno.required' => 'Ingrese el nombre completo del alumno',
            'password.required' => 'Ingrese una contraseña',]);
            
        
        $con = $request->get('password');
        //$clave = Hash::make($con);
        //dd($con);
        $password = Hash::make($con);
        $token = Str::random(60);
        //dd($token);


        $usuario = new Login();
        $usuario->usuario = $request->get('usuario');
        $usuario->alumno = $request->get('alumno');
        $usuario->matricula = $request->matricula;
        $usuario->password = $password;
        $usuario->api_token = $token;
        $usuario->timestamps;
        $usuario->horas_servicio_social = 0;
        $usuario->carrera = $request->carrera;
        $usuario->cuatrimestre = $request->cuatrimestre;
        //dd($usuario->usuario);
		$usuario->save();

		return redirect('/iniciosesion')
                    ->with('created', 'Su cuenta se creó con éxito!');
    
	}

    function viewLoading(){
        return view('TalleresUTT.Loading.loading');
    }

    function token(){
        //$user = Session::get('usuario');
        //dd($user);
        //$token = $user->api_token;
        //$usuario = Login::findOrFail(1);
        $usuarios = Login::all();
        return response()->json($usuarios);
    }

}
