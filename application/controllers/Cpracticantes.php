<?php
error_reporting(E_ALL ^ E_WARNING); 

defined('BASEPATH') OR exit('No direct script access allowed');

class Cpracticantes extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('Mpracticante');
        $this->load->helper('url');
        echo $this->input->post($this->security->get_csrf_token_name()); 
    }

    public function getDatos(){
        //$query = $this->db->get('practicantes')->result();

        $this->Mpracticante->getPracticantes();
        $query= $this->Mpracticante->getPracticantes();
        echo json_encode($query);
    }

    public function solicitar(){
        $this->request = json_decode(file_get_contents('php://input'));
        $datos = $this->request;
        //var_dump((int)$datos);
        $query = $this->Mpracticante->solicitarPracticante($datos);
        
        //return alert("Resultado exitoso");
        //echo json_encode($query);
    }

}