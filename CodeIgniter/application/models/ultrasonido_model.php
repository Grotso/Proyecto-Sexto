<?php

defined('BASEPATH') OR exit ('No direct script access allowed');

class BDDUltrasonido extends CI_Model{

    function __construct(){

        parent::__construct();

    }

    function ultimosRegistros(){

        $query = $this->db->query('SELECT * FROM ´sensor´ ORDER BY ´id´ DESC LIMIT 20');
        return $query;

    }

    function verRegistros(){

        $query = $this->db->query('SELECT * FROM sensor');
        return $query;

    }

}

?>