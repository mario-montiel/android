<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponseRedirectResponseredirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Modelos\Tipo_Persona;
use App\Modelos\Cuatrimestre;
use App\Modelos\Persona;
use App\Modelos\Carrera;
use App\Modelos\Usuario;
use App\Modelos\Login;
use Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate \ Support \ Facades \ Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('inicioSesion', ['except' => ['viewLogin', 'login', 'logout', 'registrarse', 'viewRegistroUsuario', 'token', 'viewRegistroPersona', 'registrarPersona']]);
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

    function viewRegistroPersona()
    {
        $carreras = Carrera::all();
        $cuatrimestres = Cuatrimestre::all();
        $tpPersonas = Tipo_Persona::all();
    	return view('TalleresUTT.Login.registro', compact('carreras', 'cuatrimestres', 'tpPersonas'));
    }
    function registrarPersona(Request $request)
    {
    
        if($request->tpersona == 1){
            $this->validate($request, [
                'usuario' => 'required|max:255',
                'password' => 'required|max:255',
                'alumno' => 'required|max:255',
                'tpersona' => 'required|integer',
                'clave' => 'required'], 
    
                ['usuario.required' => 'Ingrese el nombre de un usuario',
                'password.required' => 'Ingrese una contraseña',
                'alumno.required' => 'Ingrese el nombre completo del alumno',
                'tpersona.required' => 'Seleccione un tipo de persona',
                'tpersona.integer' => 'Seleccione un tipo de persona',
                'clave' => 'Ingrese la clave de autentificación del profesor']);
        }
        else if($request->tpersona == 2){
		$this->validate($request, [
            'usuario' => 'required|max:255',
            'password' => 'required|max:255',
            'alumno' => 'required|max:255',
            'matricula' => 'required|max:255',
            'seccion' => 'required|max:1',
            'tpersona' => 'required|integer'], 

            ['usuario.required' => 'Ingrese el nombre de un usuario',
            'password.required' => 'Ingrese una contraseña',
            'alumno.required' => 'Ingrese el nombre completo del alumno',
            'matricula.required' => 'Ingrese la matrícula',
            'seccion.required' => 'Ingrese una sección',
            'seccion.max' => 'La sección debe contener solo 1 caracter',
            'tpersona.required' => 'Seleccione un tipo de persona',
            'tpersona.integer' => 'Seleccione un tipo de persona']);
        }
        else{
            $this->validate($request, [
                'tpersona' => 'required|integer'], 
    
                ['tpersona.required' => 'Seleccione un tipo de persona',
                'tpersona.integer' => 'Seleccione un tipo de persona']);
        }

        $us3r = $request->usuario;
        $vato = DB::table('usuarios')->where('usuario', $us3r)->first();
        
        if(!$vato){
                $con = $request->get('password');
                $password = Hash::make($con);
                $token = Str::random(60);
        
                $persona = new Persona();
                $persona->nombre = $request->get('alumno');
                if($request->tpersona == 2){
                    $persona->matricula = $request->get('matricula');
                    $persona->seccion = $request->get('seccion');
                    $persona->carreras_id_carrera =$request->carrera;
                    $persona->cuatrimestre_id_cuatrimestre = $request->cuatrimestre;
                }
                $persona->tipos_personas_id_tipo_persona = $request->tpersona;
                $persona->save();
        
                $person = Session::put('persona', $persona);
                $person = Session::get('persona', $persona);
                
                $usuario = new Usuario();
                $usuario->usuario = $request->usuario;
                $usuario->password = $password;
                $usuario->api_token = $token;
                $usuario->timestamps;
                $usuario->personas_id_persona = $person->id_persona;
                $usuario->save();
    
                return redirect('/registrar')
                        ->with('correcto', 'Su cuenta se creó correctamente');
            
        }
                return redirect('/registrar')
                        ->with('fail', 'Esta cuenta ya existe, porfavor poner otra cuenta');
    }
    
    function viewRegistroUsuario()
    {
        $carreras = Carrera::all();
        $cuatrimestres = Cuatrimestre::all();
        $tpPersonas = Tipo_Persona::all();
    	return view('TalleresUTT.Login.usuario', compact('carreras', 'cuatrimestres', 'tpPersonas'));
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
        $usuario->carreras_id_carrera = $request->carrera;
        $usuario->cuatrimestre_id_cuatrimestre = $request->cuatrimestre;
        $usuario->privilegios = 2;
        //dd($usuario->usuario);
		$usuario->save();

		return redirect('/registraralumno')
                    ->with('correcto', 'Su cuenta se creó correctamente');
    
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
