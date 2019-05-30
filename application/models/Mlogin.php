<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mlogin extends CI_Model
{
    public function __construct ()
    {
        parent::__construct();
    }

    public function valida($name, $pass){
        $this->db->select('usu_usuario', 'usu_password', 'usu_tipo');
        $this->db->from('usuarios');
        $this->db->where('usu_usuario', $name);
        $this->db->where('usu_password', $pass);

        $query = $this->db->get();

        if($query->num_rows() == 1){
            return true;
        }
        return false;

    }

    public function credencial($usuario, $password){

        $query = $this->db
        ->select('*')
        ->from('usuarios')
        ->where('usu_usuario', $usuario)
        ->where('usu_password', $password)
        ->get();
       

        if($query->num_rows() == 1){
            $resultado = $query->row();
            return $resultado;
        }
        return false;
    }

    /*public function valida($request,$acceso)
    {

        switch ($acceso) {
            case '0':
                //El usuario no existe en el directorio activo o las credenciales no coinciden, habrá que ver si tiene credenciales para accceso local con los datos introducidos, antes de enviar el mensaje.                
                $query = $this->db->query("SELECT u.idUsuario,u.idDiv,u.idZona,u.nombre,u.email,u.modo,u.idProceso, p.dscProceso FROM usuario as u JOIN ct_proceso as p ON u.idProceso=p.idProceso WHERE idUsuario='".$request->usu_rpe."' AND password=md5('".$request->usu_passwd."') AND modo = 'L'");

                $result = $query->result(); //Arrreglo Asociativo

                if(!count($result))
                {
                    $result = 0;

                }
                else
                {
                    $result = $result[0];
                }
                break;
            case '1':
                //En este caso si hay ldap y las credenciales introducidas coincidieron, asi que una vez que se valida en el ldap las credenciales entonces investigamos si el rpe del usuario existe en la bd  enviando las credenciales y el modo 'A' para validar el acceso, tiene que dar click en los dos lados antes de darle el acceso.             
                $query = $this->db->query("SELECT u.idUsuario,u.idDiv,u.idZona,u.nombre,u.email,u.modo,u.idProceso, p.dscProceso, u.password FROM usuario as u JOIN ct_proceso as p ON u.idProceso=p.idProceso WHERE idUsuario='".$request->usu_rpe."'");

                $result = $query->result(); //Arrreglo Asociativo

                if(!count($result))
                {
                    $result = 0;

                }
                else
                {
                    $result = $result[0];
                    if(!$result->password)
                    {
                        $this->db->query("UPDATE usuario SET password=md5('".$request->usu_passwd."')");    
                    } 
                    

                }
                break;
            case '2':
                //Aqui no hubo LDAP, entoces hay que ver si el usuario existe en la BD, aqui podrá dar acceso tanto a los usuarios marcados como locales, asi como los de AD siempre y cuando existan en la BD dichas credenciales. 
                $query = $this->db->query("SELECT u.idUsuario,u.idDiv,u.idZona,u.nombre,u.email,u.modo,u.idProceso, p.dscProceso FROM usuario as u JOIN ct_proceso as p ON u.idProceso=p.idProceso FROM usuario WHERE idUsuario='".$request->usu_rpe."' AND password=md5('".$request->usu_passwd."')");


                $result = $query->result(); //Arrreglo Asociativo

                if(!count($result))
                {
                    $result = 0;

                }
                else
                {
                    $result = $result[0];                    
                }
                break;  

            default:
                # code...
                break;
        }



        
        return $result;
    }

    public function altatrab($trabajador)
    {
        $result = true;
        if(!$this->db->query("INSERT INTO trabajadores (trab_rpe, trab_nombre, trab_categ, trab_tc, trab_sexo, trab_fechanac, zona_id) VALUES('".$trabajador->trab_rpe."','".$trabajador->trab_nombre."','".$trabajador->trab_categ."',".$trabajador->trab_tc.",'".$trabajador->trab_sexo."','".$trabajador->trab_fechanac."',".$trabajador->zona_id.")"))
        {
            $result = false;
        }

        return $result;

    }

    public function bajatrab($trabajador)
    {
        $result = true;
        if(!$this->db->query("DELETE FROM trabajadores WHERE trab_rpe='".$trabajador->trab_rpe."'"))
        {
            $result = false;
        }

        return $result;

    }

    public function listtrab()
    {

        $query = $this->db->query("SELECT t.trab_id, t.trab_rpe, t.trab_nombre, t.trab_tc, t.trab_categ, t.trab_sexo, t.trab_fechanac, z.zona_nombre  FROM trabajadores as t JOIN zonas as z ON t.zona_id=z.zona_id");

        $result = $query->result(); //Arreglo de objetos

        if(!count($result))
        {
            $result = 0;

        }
      
        return $result;
    }

    public function traetrab($trabajador)
    {

        $query = $this->db->query("SELECT * FROM trabajadores 
            WHERE trab_rpe='".$trabajador->trab_rpe."'");

        $result = $query->result(); //Arrreglo Asociativo

        if(!count($result))
        {
            $result = 0;

        }
        else
        {
            $result = $result[0];  
        }


        
        return $result;
    }

    public function modiftrab($trabajador)
    {
        $result = true;
        if(!$this->db->query("UPDATE trabajadores SET trab_rpe='".$trabajador->trab_rpe."', trab_nombre='".$trabajador->trab_nombre."', trab_fechanac='".$trabajador->trab_fechanac."' WHERE trab_id=".$trabajador->trab_id))
        {
            $result = false;
        }

        return $result;

    }

    public function catzonas()
    {

        $query = $this->db->query("SELECT * FROM zonas");

        $result = $query->result(); //Arreglo de objetos

        if(!count($result))
        {
            $result = 0;

        }
      
        return $result;
    }

    public function get_zonas()
    {

        $query = $this->db->query("SELECT zona_id, zona_nombre from zonas");

        $result= $query->result_array(); //Arrreglo Asociativo
        
        return $result;
    }

    public function get_vm($request)
    {

        //var_dump($request);
        $query = $this->db->query("SELECT * from valoresmetricas where vm_year=".$request->vm_year." and vm_mes = " .$request->vm_mes . " and me_id=". $request->me_id . " and zona_id=".$request->zona_id);
        //echo "SELECT * from valoresmetricas where vm_year=".$request->vm_year." and vm_mes = " .$request->vm_mes . " and me_id=". $request->me_id . " and zona_id=".$request->zona_id;
        $result= $query->result(); //Arrreglo Objetos
        
        return $result;
    }

    public function get_vms($request)
    {

        //var_dump($request);
        $query = $this->db->query("SELECT vm_id, vm_mes, vm_valor_m, vm_valor_r, (CASE WHEN vm_mes = 1 THEN 'ENERO' ELSE CASE WHEN vm_mes = 2 THEN 'FEBRERO' ELSE CASE WHEN vm_mes = 3 THEN 'MARZO' ELSE CASE WHEN vm_mes = 4 THEN 'ABRIL' ELSE CASE WHEN vm_mes = 5 THEN 'MAYO' ELSE CASE WHEN vm_mes = 6 THEN 'JUNIO' ELSE CASE WHEN vm_mes = 7 THEN 'JULIO' ELSE CASE WHEN vm_mes = 8 THEN 'AGOSTO' ELSE CASE WHEN vm_mes = 9 THEN 'SEPTIEMBRE' ELSE CASE WHEN vm_mes = 10 THEN 'OCTUBRE' ELSE CASE WHEN vm_mes = 11 THEN 'NOVIEMBRE' ELSE CASE WHEN vm_mes = 12 THEN 'DICIEMBRE' ELSE NULL END END END END END END END END END END END END) AS vm_mes_nombre  from valoresmetricas where vm_year=".$request->vm_year. " and me_id=". $request->me_id . " and zona_id=".$request->zona_id. " order by vm_mes");
        //echo "SELECT * from valoresmetricas where vm_year=".$request->vm_year." and vm_mes = " .$request->vm_mes . " and me_id=". $request->me_id . " and zona_id=".$request->zona_id;
        $result= $query->result(); //Arrreglo Asociativo
        
        return $result;
    }

    public function guarda_vm($request)
    {

        $resultado = false;

        if($this->db->query("UPDATE valoresmetricas SET vm_valor_r=".$request->vm_valor_r." , vm_tsm=now() WHERE vm_id=". $request->vm_id))
        {
            $query = $this->db->query("SELECT * from valoresmetricas where vm_id=".$request->vm_id);
            $result= $query->result(); //Arrreglo Asociativo

        }
        
        return $result;
    }*/


}