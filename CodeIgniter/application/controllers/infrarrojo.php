<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Infrarrojo extends CI_Controller{

    function __construct(){
        parent::__construct();
        //$this->load->helper('form'); //se encuentra en la carpeta system
        //$this->load->model('codigo_model'); //Se carga el archivo creado en model
        $this -> load -> model('infrarrojo_model');
        $this -> load -> database();
        $this -> load -> helper('url');
    }

    function index(){
        $this -> load -> view('encabezados/header.php');
        $datos["inf"] = $this->infrarrojo_model->verRegistros();
        $this -> load -> view('infrarrojo/grafico_infrarrojo.php');
        $this -> load -> view('encabezados/footer.php');
       
    }

}

?>