<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seg extends CI_Controller {

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
		$this->load->view('index');
	}


    public function solpres($idDivision)
    {
        $this->load->database('default');
        $this->load->model('mseg');

        $this->load->library('session');

        if($this->session->userdata('sesion'))
        {

            
            $solicitudes = $this->mseg->solpres($idDivision);

            $respuesta = new stdClass();

            if($solicitudes)
            {


                $respuesta->estatus = 1;
                $respuesta->mensaje = 'Solicitudes extraidas';
                $respuesta->datos = $solicitudes;

                //$this->enviacorreo('SAFSUE - Alta de Inversion - FN','Se ha dado de alta una inversión en el SAFSUE',0);                

            }
            else
            {
                $respuesta->estatus = 0;
                $respuesta->mensaje = 'No se encontraron solicitudes para la División';
                //TODO Verificar con Alejandro que solicitudes se mostrarán
                $respuesta->datos = '';             
            }


        }
        else
        {
            $respuesta->estatus = 0;
            $respuesta->mensaje = 'No existe sesión activa para el usuario';
            $respuesta->datos = '';
        } 

        echo json_encode($respuesta);

    }

    public function bsolpres($idDivision,$termino)
    {
        $this->load->database('default');
        $this->load->model('mseg');

        $this->load->library('session');

        if($this->session->userdata('sesion'))
        {

            
            $solicitudes = $this->mseg->bsolpres($idDivision,$termino);

            $respuesta = new stdClass();

            if($solicitudes)
            {


                $respuesta->estatus = 1;
                $respuesta->mensaje = 'Solicitudes extraidas';
                $respuesta->datos = $solicitudes;

                //$this->enviacorreo('SAFSUE - Alta de Inversion - FN','Se ha dado de alta una inversión en el SAFSUE',0);                

            }
            else
            {
                $respuesta->estatus = 0;
                $respuesta->mensaje = 'No se encontraron solicitudes para la División';
                //TODO Verificar con Alejandro que solicitudes se mostrarán
                $respuesta->datos = '';             
            }


        }
        else
        {
            $respuesta->estatus = 0;
            $respuesta->mensaje = 'No existe sesión activa para el usuario';
            $respuesta->datos = '';
        } 

        echo json_encode($respuesta);

    }

    public function autsolacc()
    {

		$this->load->helper('url');
		$this->request = json_decode(file_get_contents('php://input'));

		//var_dump($this->request);
		//exit();

        $this->load->database('default');
        $this->load->model('mseg');

        $this->load->library('session');

        if($this->session->userdata('sesion'))
        {

            $idUsuario = $this->session->userdata('idUsuario');
            $solicitudes = $this->mseg->autsolacc($this->request,$idUsuario);

            $respuesta = new stdClass();

            if($solicitudes)
            {


                $respuesta->estatus = 1;
                $respuesta->mensaje = 'Registro de prestador actualizado!!';
                $respuesta->datos = $solicitudes;

                //$this->enviacorreo('SAFSUE - Alta de Inversion - FN','Se ha dado de alta una inversión en el SAFSUE',0);                

            }
            else
            {
                $respuesta->estatus = 0;
                $respuesta->mensaje = 'No se pudo actualizar el registro del prestador';
                //TODO Verificar con Alejandro que solicitudes se mostrarán
                $respuesta->datos = '';             
            }


        }
        else
        {
            $respuesta->estatus = 0;
            $respuesta->mensaje = 'No existe sesión activa para el usuario';
            $respuesta->datos = '';
        } 

        echo json_encode($respuesta);

    }

	// public function capobra()
	// {

	// 	$this->load->helper('url');
	// 	$this->request = json_decode(file_get_contents('php://input'));

	// 	$this->load->database('default');
	// 	$this->load->model('mfn');

 //        $this->load->library('session');

 //        if($this->session->userdata('sesion'))
 //        {

            
 //            $obra = $this->mfn->capobra($this->request);

 //            $respuesta = new stdClass();

 //            if($obra)
 //            {


 //                $respuesta->estatus = 1;
 //                $respuesta->mensaje = 'Obra almacenada correctamente';
 //                $respuesta->datos = $obra;

 //            }
 //            else
 //            {
 //                $respuesta->estatus = 0;
 //                $respuesta->mensaje = 'Error al tratar de almacenar la obra, conuniquese con el área de soporte!!';
 //                $respuesta->datos = '';             
 //            }


 //        }
 //        else
 //        {
 //            $respuesta->estatus = 0;
 //            $respuesta->mensaje = 'No existía sesión activa para el usuario';
 //            $respuesta->datos = '';
 //        } 




	// 	echo json_encode($respuesta);
	// 	//exit();



	// 	//$this->load->view('index');
	// }


 //    public function salir()
 //    {

 //        $this->load->helper('url');
 //        $this->request = json_decode(file_get_contents('php://input'));

 //        //$this->load->database('default');
 //        //$this->load->model('mlogin');
            

 //        //$usuario = $this->mlogin->valida($this->request);


 //        $respuesta = new stdClass();

 //        $this->load->library('session');

 //        if($this->session->userdata('sesion'))
 //        {

            
 //            $this->session->unset_userdata('sesion');
 //            $this->session->sess_destroy();



 //            $respuesta->estatus = 1;
 //            $respuesta->mensaje = 'Sesion Finalizada';
 //            $respuesta->datos = '';

 //        }
 //        else
 //        {
 //            $respuesta->estatus = 0;
 //            $respuesta->mensaje = 'No existía sesión activa para el usuario';
 //            $respuesta->datos = '';
 //        }


 //        echo json_encode($respuesta);
 //        //exit();



 //        //$this->load->view('index');
 //    }



	// public function altatrab()
	// {

	// 	$this->load->helper('url');
	// 	$this->request = json_decode(file_get_contents('php://input'));

	// 	$this->load->database('default');
	// 	$this->load->model('mlogin');
    		
	// 	$respuesta = new stdClass();

 //    		if($this->mlogin->altatrab($this->request))
 //    		{
 //    			$respuesta->estatus = 1;
 //    			$respuesta->mensaje = "Alta Exitosa";
 //    		}
 //    		else
 //    		{
 //    			$respuesta->estatus = 0;
 //    			$respuesta->mensaje = "Error al dar de alta";    			
 //    		}

	// 	echo json_encode($respuesta);
	// 	//exit();
	// 	//$this->load->view('index');
	// }

	// public function bajatrab()
	// {

	// 	$this->load->helper('url');
	// 	$this->request = json_decode(file_get_contents('php://input'));

	// 	$this->load->database('default');
	// 	$this->load->model('mlogin');
    		
	// 	$respuesta = new stdClass();

 //    		if($this->mlogin->bajatrab($this->request))
 //    		{
 //    			$respuesta->estatus = 1;
 //    			$respuesta->mensaje = "Baja Exitosa";
 //    		}
 //    		else
 //    		{
 //    			$respuesta->estatus = 0;
 //    			$respuesta->mensaje = "Error al dar de alta";    			
 //    		}

	// 	echo json_encode($respuesta);
	// 	//exit();
	// 	//$this->load->view('index');
	// }

	// public function listtrab()
	// {

	// 	$this->load->helper('url');

	// 	$this->load->database('default');
	// 	$this->load->model('mlogin');
    		

 //    		$trabajadores = $this->mlogin->listtrab();

 //    		$respuesta = new stdClass();

 //    		if($trabajadores)
 //    		{
 //    			$respuesta->estatus = 1;
 //    			$respuesta->mensaje = '';
 //    			$respuesta->datos = $trabajadores;

 //    		}
 //    		else
 //    		{
 //    			$respuesta->estatus = 0;
 //    			$respuesta->mensaje = 'No existen trabajadores en la BD';
 //    			$respuesta->datos = '';    			
 //    		}

	// 	echo json_encode($respuesta);
	// 	//exit();



	// 	//$this->load->view('index');
	// }

	// public function traetrab()
	// {

	// 	$this->load->helper('url');
	// 	$this->request = json_decode(file_get_contents('php://input'));

	// 	$this->load->database('default');
	// 	$this->load->model('mlogin');
    		

 //    		$trabajador = $this->mlogin->traetrab($this->request);

 //    		$respuesta = new stdClass();

 //    		if($trabajador)
 //    		{
 //    			$respuesta->estatus = 1;
 //    			$respuesta->mensaje = '';
 //    			$respuesta->datos = $trabajador;

 //    		}
 //    		else
 //    		{
 //    			$respuesta->estatus = 0;
 //    			$respuesta->mensaje = 'El trabajador no existe';
 //    			$respuesta->datos = '';    			
 //    		}

	// 	echo json_encode($respuesta);
	// 	//exit();



	// 	//$this->load->view('index');
	// }

	// public function modiftrab()
	// {

	// 	$this->load->helper('url');
	// 	$this->request = json_decode(file_get_contents('php://input'));

	// 	$this->load->database('default');
	// 	$this->load->model('mlogin');
    		
	// 	$respuesta = new stdClass();

 //    		if($this->mlogin->modiftrab($this->request))
 //    		{
 //    			$respuesta->estatus = 1;
 //    			$respuesta->mensaje = "Modificación Exitosa";
 //    		}
 //    		else
 //    		{
 //    			$respuesta->estatus = 0;
 //    			$respuesta->mensaje = "Error al Modificar";    			
 //    		}

	// 	echo json_encode($respuesta);
	// 	//exit();
	// 	//$this->load->view('index');
	// }

	// public function catzonas()
	// {

	// 	$this->load->helper('url');

	// 	$this->load->database('default');
	// 	$this->load->model('mlogin');
    		

 //    		$zonas = $this->mlogin->catzonas();
    		


 //    		$respuesta = new stdClass();

 //    		if($zonas)
 //    		{
 //    			$respuesta->estatus = 1;
 //    			$respuesta->mensaje = '';
 //    			$respuesta->datos = $zonas;

 //    		}
 //    		else
 //    		{
 //    			$respuesta->estatus = 0;
 //    			$respuesta->mensaje = 'No existen Zonas';
 //    			$respuesta->datos = '';    			
 //    		}

	// 	echo json_encode($respuesta);
	// 	//exit();



	// 	//$this->load->view('index');
	// }

}












