<?php

defined('BASEPATH') OR exit ('No direct script access allowed');

class Ultrasonido_model extends CI_Model{

    function __construct(){

        parent::__construct();
        

    }

    function ultimosRegistros(){

        $consulta = $this->db->consulta('SELECT * FROM ´ultrasonido´ ORDER BY ´id´ DESC LIMIT 20');
        return $consulta;

    }

    function verRegistros(){

        $this->load->database();
        $consulta = $this->db->query('SELECT * FROM ultrasonido');
        return $consulta;

    }

    function grafica(){

        
        $consulta = $this->db->query('SELECT * FROM ultrasonido ORDER BY fecha DESC LIMIT 1');
        foreach($consulta->result_array() as $dist){
            echo $dist['distancia'];
        }

    }

}

?>