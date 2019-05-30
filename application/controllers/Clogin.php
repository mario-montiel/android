<?php

error_reporting(E_ALL ^ E_WARNING); 

defined('BASEPATH') OR exit('No direct script access allowed');

class Clogin extends CI_Controller {

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
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mlogin');
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->database('default');
    }

	public function index()
	{
		$this->load->view('login/login.php');
    }

    public function usuarios_get(){
        $query = $this->db->get('usuarios')->result();
        echo json_encode($query);
    }
    
    public function verificacion(){
		$this->form_validation->set_rules('usuario', 'Usuario', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required|callback_verifyUser');

		/*$config = array(
			array(
				'field' => 'usuario',
				'label' => 'Usuario',
				'rules' => 'required|alpha_numeric',
				'errors' => array(
					'required' => 'Campo de %s vacio',
					'alpha_numeric' => 'Solo se permiten letras en el usuario'
				),
			),
			array(
				'field' => 'password',
				'label' => 'Contraseña',
				'rules' => 'required',
				'errors' => array(
					'required' => 'Campo de %s vacio'
				)
			),
		);

		$this->form_validation->set_rules($config);*/
        $name = $this->input->post('usuario');
        $pass = $this->input->post('password');

		if($this->form_validation->run() == false){
            $this->load->library('session');
            $data = array(
                $this->session->set_userdata('sesion', 1),
                $this->session->set_userdata('usu_usuario',$name)
            );
            
			return $this->load->view('login/login.php', $data);
		}
		return $this->load->view('home/home.php');
	}

	public function verifyUser(){
		$name = $this->input->post('usuario');
        $pass = $this->input->post('password');
        
        $this->request = json_decode(file_get_contents('php://input'));

        var_dump($this->request);
        
		$this->load->model('Mlogin');
		if($this->Mlogin->valida($name, $pass)){
            //$this->session->set_userdata('za_id',$pass);
			return true;
		}
		$this->form_validation->set_message('verifyUser', 'Usuario o Contraseña son Incorrectos!!');
		return false;
    }

    //////////////////////////

   public function credenciales(){
        $this->request = json_decode(file_get_contents('php://input'));
        
        //var_dump($this->request);
        $usuario = $this->request->usu_usuario;
        $password = $this->request->usu_password;

        $respuesta = new stdClass();

        if($this->Mlogin->credencial($usuario, $password)){
            //var_dump($this->Mlogin->credencial($usuario, $password));
            $acceso= $this->Mlogin->credencial($usuario, $password);
            //var_dump($acceso);
            switch($acceso->usu_tipo){
                case "1":
                    //var_dump($usuario);
                    //print_r("ADMINISTRADOR_DIOS");
                    $this->load->library('session');
                    $this->session->set_userdata('sesion', 1);
                    $this->session->set_userdata('idUsuario',$acceso->usu_id);
                    //$this->session->set_userdata('idDiv',$acceso->idDiv);
                    //$this->session->set_userdata('idZona',$acceso->za_id);                
                    $this->session->set_userdata("nombre",$acceso->usu_usuario);



                    $respuesta->estatus = 1;
                    $respuesta->mensaje = "Usuario Administrador encontrado, Bienvenido!";
                    $respuesta->datos = $acceso;

                    //print_r($respuesta);

                    //print_r($this->session->userdata["nombre"]); valor especifico de la session
                break;
                case "2":
                    //print_r("ADMI_DIVISIONES");
                    $respuesta->estatus = 1;
                    $respuesta->mensaje = "Usuario Administrador de Divisiones encontrado, Bienvenido!";
                    $respuesta->datos = $acceso;
                break;
                case "3":
                    //print_r("ADMI_ZONA");
                    $respuesta->estatus = 1;
                    $respuesta->mensaje = "Usuario Administrador de Zonas encontrado, Bienvenido!";
                    $respuesta->datos = $acceso;
                break;
                case "4":
                    //print_r("JEFE DE DEPTO");
                    $respuesta->estatus = 1;
                    $respuesta->mensaje = "Usuario Administrador de Departamentos encontrado, Bienvenido!";
                    $respuesta->datos = $acceso;
                break;
                case "5":
                    //print_r("PRACTICANTE");
                    $respuesta->estatus = 1;
                    $respuesta->mensaje = "Usuario Practicante, Bienvenido!";
                    $respuesta->datos = $acceso;
                break;
                default:
                    
                break;
            }

            echo json_encode($respuesta);
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












