<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->model('Desktop_model');
    }

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function index() {

        $newsList = array();
        $data = $this->Desktop_model->Get_desktop();
        $newsList["windows_content"] = $data["windows_content"];
        $newsList["icon_desktop"] = $data["icon_desktop"];
        $newsList["icon_desktop_bottom"] = $data["icon_desktop_bottom"];
        $newsList["menu"] = 1;//$data["menu"];
        
        $this->load->view('content/header');             // header
        $this->load->view('content/content', $newsList); // view
        $this->load->view('content/footer');             // footer
    }
    
    public function GetModulosContextMenu(){
        
        $result = $this->Desktop_model->GetModulosContextMenu();
        echo $result;
        
    }

    public function Aplicacion(){        
        $moduloId = $this->input->post('mo_idmodulo');        
        $modulos_page = $this->Desktop_model->GetModulos($moduloId);
        echo $modulos_page;
    }
    
    public function compras(){        
        $moduloId = $this->input->post('mo_idmodulo');        
        $modulos_page = $this->Desktop_model->GetModulos($moduloId);
        echo $modulos_page;
    }
    
    /*
     * app_modulos : mp_nombre 
     */
    public function parametros(){        
        $moduloId = $this->input->post('mo_idmodulo');        
        $modulos_page = $this->Desktop_model->GetModulos($moduloId);
        echo $modulos_page;
    }
    
    /*
     * app_modulos : mp_nombre 
     */
    public function referencias(){        
        $moduloId = $this->input->post('mo_idmodulo');        
        $modulos_page = $this->Desktop_model->GetModulos($moduloId);
        echo $modulos_page;
    }
    
    
     /*
     * para los terceros
     */
    public function adm_terceros(){        
        $moduloId = $this->input->post('mo_idmodulo');        
        $modulos_page = $this->Desktop_model->GetModulos($moduloId);
        echo $modulos_page;
    }
    
    
    
     public function permisos(){        
        $moduloId = $this->input->post('mo_idmodulo');        
        $modulos_page = $this->Desktop_model->GetModulos($moduloId);
        echo $modulos_page;
    }
      
    

}
