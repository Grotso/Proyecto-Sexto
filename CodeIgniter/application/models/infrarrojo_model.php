<?php

defined('BASEPATH') OR exit ('No direct script access allowed');

class Infrarrojo_model extends CI_Model{

    function __construct(){

        parent::__construct();

    }

    function ultimosRegistros(){

        $consulta = $this->db->query('SELECT * FROM ´infrarrojo´ ORDER BY ´id´ DESC LIMIT 20');
        return $consulta;

    }

    function verRegistros(){

        $consulta = $this->db->query('SELECT * FROM infrarrojo');
        return $consulta;

    }

}

?>