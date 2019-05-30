<?php
error_reporting(E_ALL ^ E_WARNING); 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mpracticante extends CI_Model
{
    public function __construct ()
    {
        parent::__construct();
    }

    public function getPracticantes(){
        $query = $this->db
        ->select('practicantes.prac_id,  practicantes.prac_matricula, practicantes.prac_nombre, practicantes.prac_appaterno, 
        practicantes.prac_apmaterno, escuelas.esc_nombre, practicantes.prac_email, practicantes.prac_calle, practicantes.prac_colonia,
        practicantes.prac_telefono1, practicantes.prac_telefono2, practicantes.esc_id, estados.est_nombre, ciudades.ciu_nombre, practicantes.prac_cp, 
        practicantes.estatus, tipos_escuela.te_tipo')
        ->from('practicantes')
        ->join('escuelas', 'practicantes.esc_id = escuelas.esc_id')
        ->join('tipos_escuela', 'tipos_escuela.te_id = escuelas.te_id')
        ->join('ciudades', 'escuelas.ciu_id = ciudades.ciu_id')
        ->join('estados', 'ciudades.est_id = estados.est_id')
        ->get();
        //var_dump($query);
        if($query->num_rows() >= 1){
            $resultado = $query->result();
            
            return $resultado;
        }
        return false;
    }

    public function solicitarPracticante($request){

        //Obtengo las propiedades del objeto $r
        $request = get_object_vars( $request );
        //Convierto el id de string a entero para realizar la consulta
        $num = (int)$request['$practicante'];
        
        $query = $this->db
        ->select('carreras.car_id, practicantes.prac_id, usuarios.usu_id')
        ->from('practicantes')
        ->join('escuelas', 'practicantes.esc_id = escuelas.esc_id')
        ->join('tipos_escuela', 'tipos_escuela.te_id = escuelas.te_id')
        ->join('ciudades', 'escuelas.ciu_id = ciudades.ciu_id')
        ->join('estados', 'ciudades.est_id = estados.est_id')
        ->join('solicitudes', 'solicitudes.prac_id = practicantes.prac_id')
        ->join('usuarios', 'usuarios.usu_id = solicitudes.usu_id')
        ->join('carreras', 'carreras.car_id = solicitudes.car_id')
        ->where('practicantes.prac_id', $num)
        ->get();

        //var_dump($query->result());

        if($query->num_rows() >= 1){
            $desc[] = array(
                "sol_descripcion" => "Solicitar Practicante"
            );
            
            $res_db = array(
                $query->result()[0],
            );
            //Con este método uno los 2 arreglos de arriba en solo uno ($y)
            $resultado = array_merge($res_db, $desc);
    
            $this->db->query("INSERT INTO solicitudes (sol_descripcion, 
            car_id, prac_id, usu_id) VALUES
            ('Solicitar Practicante',".$resultado[0]->car_id.",".$resultado[0]->prac_id.",".$resultado[0]->usu_id.")");

            $new_valor = array(
                'estatus' => 0
            );

            //var_dump($num);

            $this->db->where('practicantes.prac_id', $num);
            $this->db->update('practicantes', $new_valor);
            //->where('practicantes.prac_id', $num);
        }
        return false;
    }

}