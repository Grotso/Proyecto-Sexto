<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reportes extends CI_Controller{

    function __construct(){
        parent::__construct();
       $this->load->helper('url');
       $this->load->model('ultrasonido_model');
       $this->load->model('infrarrojo_model');
    }

    function index(){
        //$this->load->library('Pdf');
        $this -> load -> view('encabezados/header.php');
        $this -> load -> view('reportes/Reportes.php');
        $this -> load -> view('encabezados/footer.php');
 
    }

    public function generarReportes(){

        $data = [];
        $html = $this->input->post('txtPDF');
        $pdfFilePath = "output_pdf_name.pdf";
        $this->ob_clean();
        $this->load->library('M_pdf');
         $this->m_pdf->pdf->WriteHTML($html);
        //$this-> ob_end_clean();
        $this->error_reporting(E_ALL);
        $this->m_pdf->pdf->Output($pdfFilePath, "D");

    }  
    
    function tablaUltrasonido(){

        $this -> load -> view('encabezados/header.php');
        $datos["ult"] = $this->ultrasonido_model->verRegistros();
        $this -> load -> view('reportes/Reportes_ultrasonido.php',$datos);
        $this -> load -> view('encabezados/footer.php');
 

    }

    function tablaInfrarrojo(){

        $this -> load -> view('encabezados/header.php');
        $datos["inf"] = $this->infrarrojo_model->verRegistros();
        $this -> load -> view('reportes/Reportes_infrarrojo.php',$datos);
        $this -> load -> view('encabezados/footer.php');

    }

    

}

?>