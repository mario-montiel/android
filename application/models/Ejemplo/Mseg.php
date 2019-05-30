<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mseg extends CI_Model
{
    public function __construct ()
    {
        parent::__construct();
    }

    public function solpres($idDivision)
    {
        //DATE_FORMAT(TIMEDIFF(DATE_ADD(p.feRegistro, INTERVAL sr.dias DAY),now()), '%d:%H:%m') as restan

        $query = $this->db->query("SELECT p.*, LPAD(p.idPrestador,8,'0') as foliop, d.division, sr.dscEstado, sr.idEstado, sr.edoOK, DATE_ADD(p.feRegistro, INTERVAL sr.dias DAY) as limite, idPrestador as id, 'Sol. Acceso SEG' as asunto,concat(timestampdiff(day, now(), DATE_ADD(p.feRegistro, INTERVAL sr.dias DAY)),'d ',lpad(mod(timestampdiff(hour, now(), DATE_ADD(p.feRegistro, INTERVAL sr.dias DAY)), 24), 2, '0'),'h') as restan, DATE_ADD(p.feRegistro, INTERVAL sr.dias DAY) as termina, if(LOCATE('-',concat(timestampdiff(day, now(), DATE_ADD(p.feRegistro, INTERVAL sr.dias DAY)),'d ',lpad(mod(timestampdiff(hour, now(), DATE_ADD(p.feRegistro, INTERVAL sr.dias DAY)), 24), 2, '0'),'h')),'danger','') as _rowVariant  

              FROM prestador as p JOIN gral_division as d ON p.idDiv=d.idDiv JOIN st_registro as sr ON p.idEstado=sr.idEstado WHERE p.idDiv='".$idDivision."' ORDER BY restan DESC");

        $result = $query->result(); //Arrreglo Asociativo

        if(!count($result))
        {
            $result = 0;

        }
        // else
        // {
        //     $result = $result[0];  
        // }


        
        return $result;
    }


    public function bsolpres($idDivision,$termino)
    {
        if($termino == "Todos")
        {
            $query = $this->db->query("SELECT p.*, LPAD(p.idPrestador,8,'0') as foliop, d.division, sr.dscEstado, sr.idEstado, sr.edoOK, DATE_ADD(p.feRegistro, INTERVAL sr.dias DAY) as limite, idPrestador as id, 'Sol. Acceso SEG' as asunto, concat(timestampdiff(day, now(), DATE_ADD(p.feRegistro, INTERVAL sr.dias DAY)),'d ',lpad(mod(timestampdiff(hour, now(), DATE_ADD(p.feRegistro, INTERVAL sr.dias DAY)), 24), 2, '0'),'h') as restan, if(LOCATE('-',concat(timestampdiff(day, now(), DATE_ADD(p.feRegistro, INTERVAL sr.dias DAY)),'d ',lpad(mod(timestampdiff(hour, now(), DATE_ADD(p.feRegistro, INTERVAL sr.dias DAY)), 24), 2, '0'),'h')),'danger','') as _rowVariant  FROM prestador as p JOIN gral_division as d ON p.idDiv=d.idDiv JOIN st_registro as sr ON p.idEstado=sr.idEstado WHERE p.idDiv='".$idDivision."' ORDER BY restan DESC");
        }
        else
        {
            $query = $this->db->query("SELECT p.*, LPAD(p.idPrestador,8,'0') as foliop, d.division, sr.dscEstado, sr.idEstado, sr.edoOK, DATE_ADD(p.feRegistro, INTERVAL sr.dias DAY) as limite, idPrestador as id, 'Sol. Acceso SEG' as asunto, concat(timestampdiff(day, now(), DATE_ADD(p.feRegistro, INTERVAL sr.dias DAY)),'d ',lpad(mod(timestampdiff(hour, now(), DATE_ADD(p.feRegistro, INTERVAL sr.dias DAY)), 24), 2, '0'),'h') as restan, if(LOCATE('-',concat(timestampdiff(day, now(), DATE_ADD(p.feRegistro, INTERVAL sr.dias DAY)),'d ',lpad(mod(timestampdiff(hour, now(), DATE_ADD(p.feRegistro, INTERVAL sr.dias DAY)), 24), 2, '0'),'h')),'danger','') as _rowVariant FROM prestador as p JOIN gral_division as d ON p.idDiv=d.idDiv JOIN st_registro as sr ON p.idEstado=sr.idEstado WHERE p.idDiv='".$idDivision."' AND (empresa LIKE ('%".$termino."%') OR responsable LIKE ('%".$termino."%')) ORDER BY restan DESC ");

        }
        
        $result = $query->result(); //Arrreglo Asociativo

        if(!count($result))
        {
            $result = 0;

        }

        return $result;
    }

    public function autsolacc($request, $idUsuario)
    {


        $result = true;
        //Intentamos insertar la nueva obra


        //$this->db->query("SET autocommit = 0");
        $this->db->query("START TRANSACTION");

        if(!$this->db->query("UPDATE prestador SET idEstado = ".$request->solic_prestador->edoOK." WHERE idPrestador = ".$request->solic_prestador->idPrestador.""))
        {
            //Falló
            $this->db->query("ROLLBACK");
            $result = false;
        }
        else
        {

            //Agregamos a la bitacora de movimientos la alta de la inversión
            // echo "INSERT INTO log_estados (idPrestador, idEstado, feEstado, ip, observaciones, idUsuario) VALUES(".$request->solic_prestador->idPrestador.",".$request->solic_prestador->idEstado.",now(),'10.14.1.1','".$request->ob_autoriza."','".$idUsuario."')";
            // exit();
            // if(!$this->db->query("INSERT INTO log_estados (idPrestador, idEstado, feEstado, ip, observaciones, idUsuario) VALUES(".$request->solic_prestador->idPrestador.",".$request->solic_prestador->idEstado.",now(),'10.14.1.1','".$request->ob_autoriza."','12121')"))
            
            if(!$this->db->query("INSERT INTO log_estados (idPrestador, idEstado, feEstado, ip, observaciones, idUsuario) VALUES(".$request->solic_prestador->idPrestador.",".$request->solic_prestador->idEstado.",now(),'10.14.1.1','".$request->ob_autoriza."','".$idUsuario."')"))
            {
                            $this->db->query("ROLLBACK");
                            $result = false;
                            //TODO: Implementar el borrado de la obra ya que no se pudo almacenar su estatus
            } 
            else
            {
                //echo "SIIIIIIIIIIIII";
                $this->db->query("COMMIT");   // :) Siiiiii!!!

            }

        }

        $this->db->query("COMMIT");

        if($result)
        {
            $result = $this->solpres($request->solic_prestador->idDiv);             
        }

        return $result;

    }


    public function capobra($obra)
    {
        $result = true;
        if(!$this->db->query("INSERT INTO obras (ob_numob, ob_year, ob_inversion, ob_benefic, ob_viviendas, ob_montot, ob_descpago, ob_importe, ob_folio, zona_id) VALUES(".$obra->ob_numob.",".$obra->ob_year.",".$obra->ob_inversion.",".$obra->ob_benefic.",".$obra->ob_viviendas.",'".$obra->ob_montot."','".$obra->ob_descpago."',".$obra->ob_importe.",'".$obra->ob_importe."',1)"))
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
    }


}