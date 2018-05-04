<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('reports/reports_model');
    }
        
    public function factura_ingresos($cons) {
       $id = $_REQUEST["id_factura"];
//        $cons = $this->input->post('ce_nombre');
       $data["datos"] = $this->reports_model->getIngresos($id);
        // $data["datos"] = $this->reports_model->getIngresos($cons);
        // echo json_encode($data);
        $this->load->view('reports/ingresos', $data);
    }

    public function index($num) {
       echo 'hola ' . $num;
    }
    
    public function reporte($id){
       $this->load->model('reports/reports_model', 'report');
       $data['datos'] = $this->report->getIngresos($id);       
       
//       $this->load->helper(array('dompdf','file'));
//       $html = $this->load->view('reports/ingreso', $data, TRUE);
//       pdf_create($html, 'Reporte');

      $this->load->view('reports/ingreso', $data, TRUE);
  
       #$data = pdf_create($html, '', false);
       #write_file('name', $data);
       #var_dump($data);
       #echo ''.$id; 
    }

}