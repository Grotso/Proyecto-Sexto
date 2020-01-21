<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reportes extends CI_Controller{

    function __construct(){
        parent::__construct();
       // $this->load->helper('form'); //se encuentra en la carpeta system
       // $this->load->model('codigo_model'); //Se carga el archivo creado en model
       $this->load->helper('url');
    }

    function index(){
        $this -> load -> view('encabezados/header.php');
        $this -> load -> view('reportes/Reportes.php');
        $this -> load -> view('encabezados/footer.php');
    }

    

}

?>