<?php

error_reporting(E_ALL ^ E_WARNING); 

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->helper('url');
		$this->load->view('index_new');
	}

	public function valida()
	{

		$this->load->helper('url');
		$this->request = json_decode(file_get_contents('php://input'));

        $respuesta = new stdClass();

        //var_dump($this->request);

        $acceso = $this->valida_ldap($this->request);

        $this->load->database('default');
        $this->load->model('mlogin');

        switch ($acceso) {
            case '0':
                //El usuario no existe en el directorio activo o las credenciales no coinciden, habrá que ver si tiene credenciales para accceso local con los datos introducidos, antes de enviar el mensaje.
                $usuario = $this->mlogin->valida($this->request,0);

                if($usuario)
                {
                    //var_dump($usuario);


                    $this->load->library('session');
                    $this->session->set_userdata('sesion', 1);
                    $this->session->set_userdata('idUsuario',$usuario->idUsuario);
                    $this->session->set_userdata('idDiv',$usuario->idDiv);
                    $this->session->set_userdata('idZona',$usuario->idZona);                
                    $this->session->set_userdata('nombre',$usuario->nombre);
                    $this->session->set_userdata('email',$usuario->email);
                    $this->session->set_userdata('modo',$usuario->modo);
                    $this->session->set_userdata('idProceso',$usuario->idProceso);
                    $this->session->set_userdata('dscProceso',$usuario->dscProceso);


                    $respuesta->estatus = 1;
                    $respuesta->mensaje = '0 - El usuario no esta en AD pero si esta como usuario local en la BD';
                    $respuesta->datos = $usuario;

                }
                else
                {
                        $respuesta->estatus = 0;
                        $respuesta->mensaje = '0 - Usuario NO existente en DA y NO existente en BD Local';
                        $respuesta->datos = '';
                } 
                break;

            case '1':
                //En este caso si hay ldap y las credenciales introducidas coincidieron, asi que una vez que se valida en el ldap las credenciales entonces investigamos si el rpe del usuario existe en la bd  enviando las credenciales y el modo 'A' para validar el acceso, tiene que dar click en los dos lados antes de darle el acceso. 
                $usuario = $this->mlogin->valida($this->request,1);


                if($usuario)
                {

                    $this->load->library('session');
                    $this->session->set_userdata('sesion', 1);
                    $this->session->set_userdata('idUsuario',$usuario->idUsuario);
                    $this->session->set_userdata('idDiv',$usuario->idDiv);
                    $this->session->set_userdata('idZona',$usuario->idZona);                
                    $this->session->set_userdata('nombre',$usuario->nombre);
                    $this->session->set_userdata('email',$usuario->email);
                    $this->session->set_userdata('modo',$usuario->modo);
                    $this->session->set_userdata('idProceso',$usuario->idProceso);
                    $this->session->set_userdata('dscProceso',$usuario->dscProceso);

                
                    $respuesta->estatus = 1;
                    $respuesta->mensaje = '1 - Usuario en AD y en BD de SEG';
                    $respuesta->datos = $usuario;

                }
                else
                {
                        $respuesta->estatus = 0;
                        $respuesta->mensaje = '1 - Usuario en AD pero no en BD SEG';
                        $respuesta->datos = '';
                }                
                break;

            case '2':
                //Aqui no hubo LDAP, entoces hay que ver si el usuario existe en la BD, aqui podrá dar acceso tanto a los usuarios marcados como locales, asi como los de AD siempre y cuando existan en la BD dichas credenciales. 
                $usuario = $this->mlogin->valida($this->request,2);

                if($usuario)
                {
                    $this->load->library('session');
                    $this->session->set_userdata('sesion', 1);
                    $this->session->set_userdata('idUsuario',$usuario->idUsuario);
                    $this->session->set_userdata('idDiv',$usuario->idDiv);
                    $this->session->set_userdata('idZona',$usuario->idZona);                
                    $this->session->set_userdata('nombre',$usuario->nombre);
                    $this->session->set_userdata('email',$usuario->email);
                    $this->session->set_userdata('modo',$usuario->modo);
                    $this->session->set_userdata('idProceso',$usuario->idProceso);
                    $this->session->set_userdata('dscProceso',$usuario->dscProceso);


                    $respuesta->estatus = 1;
                    $respuesta->mensaje = '2 - No hubo conexion al AD pero las credenciales existen en BD de SEG, el usuario puede ser A o L';
                    $respuesta->datos = $usuario;

                }
                else
                {
                        $respuesta->estatus = 0;
                        $respuesta->mensaje = '2 - No hubo conexion al AD y el usuario No está en la BD del SEG';
                        $respuesta->datos = '';
                } 
                break;

            default:
                # code...
                break;
        }

		echo json_encode($respuesta);
		//exit();



		//$this->load->view('index');
	}

        // var_dump($request);
        // exit();

    public function valida_ldap($request)
    {
        $ds = '10.55.56.34';  //Servidor Local de Dominio
        //$ds = '10.14.1.10';  //Servidor Local de Dominio
        $dn = 'dc=cfe,dc=mx';

        if($this->pingldap($ds))
        {
            $usuario = $request->usu_rpe.'@cfe.mx';

            $ldapPuerto = 389;
            //$ldapConexion = @ldap_connect($ds,$ldapPuerto);
            $ldapConexion = ldap_connect($ds,$ldapPuerto) or die("DC N/A, PLEASE TRY AGAIN LATER.");

            if($ldapConexion){
                ldap_set_option($ldapConexion, LDAP_OPT_PROTOCOL_VERSION, 3);
                ldap_set_option($ldapConexion, LDAP_OPT_REFERRALS, 0);
                // Validamos Usuario/Contraseña
                //$ldapEnlace = @ldap_bind($ldapConexion, $usuario, $contrasena);
                $ldapEnlace = ldap_bind($ldapConexion, $usuario, $request->usu_passwd);

                if($ldapEnlace)
                {
                    // Si esta en el directorio activo
                    $acceso = 1;
                }
                else
                {
                    //Usuario o Contraseña Incorrecta
                    $acceso = 0; 
                }
            }
        }
        else
        {
            //No se pudo conectar al directorio activo
            $acceso = 2;
        }

        //echo "ACCESO en ldap " . $acceso;  

        return $acceso;      
    }

    function pingldap($host, $port=389, $timeout=1)
    {
       $op = fsockopen($host, $port, $errno, $errstr, $timeout);
       if (!$op) return 0; //AD No Disponible
       else {
          fclose($op); //Cerrar explicitamente la conexión abierta del socket
          return 1; //AD Corriendo ya se puede conectar po medio de ldap_connect
       }
    }

    //Salir para finalizar la sesión del usuario de manera segura
    public function salir()
    {

        $this->load->helper('url');
        $this->request = json_decode(file_get_contents('php://input'));

        //$this->load->database('default');
        //$this->load->model('mlogin');
            

        //$usuario = $this->mlogin->valida($this->request);


        $respuesta = new stdClass();

        $this->load->library('session');

        if($this->session->userdata('sesion'))
        {

            
            $this->session->unset_userdata('sesion');
            $this->session->sess_destroy();



            $respuesta->estatus = 1;
            $respuesta->mensaje = 'Sesion Finalizada';
            $respuesta->datos = '';

        }
        else
        {
            $respuesta->estatus = 0;
            $respuesta->mensaje = 'No existía sesión activa para el usuario';
            $respuesta->datos = '';
        }


        echo json_encode($respuesta);
        //exit();



        //$this->load->view('index');
    }


}












