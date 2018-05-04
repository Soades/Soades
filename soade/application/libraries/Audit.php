<?php

/**
 * Herramienta clace para la implementacion de auditorias del sistema.
 *
 * @author  Jairo Torres 
 * @link    ingtorres1986
 * @version 1.1 21/04/2014
 * 
 */

 class Audit {
    /**
     * Contiene la instancia de CI
     * @var $CI CodeIgniter
     */
    private $CI = NULL;
    /**
     * Contiene el resultado de la operacion ([Default] EDIT , DELETE , INSERT , ACCESS, SUCCESS, FAILURE).
     * @var $result String
     */
    private $result;
    /**
     * Contiene los datos utlizados en la operaion.
     * @var $result Mixed
     */
    private $data;
     /**
     * Contiene los datos del modulo.
     * @var $result Mixed
     */
    private $modulo;    
    /**
     * Contiene el tipo de la auditoria.
     * @var $result Mixed
     */
    private $tipo_auditoria;
    
     /**
     * Contiene el id de la fila que se modifica.
     * @var $result Mixed
     */	
    private $item;    
    /**
     * Contiene la variable que almacena el metodo que se acciona.
     * @var $result Mixed
     */	
    private $metodo;
    
    /**
     * Contiene la variable que almacena el permiso.
     * @var $result Mixed
     */	
    private $permiso;
    

    public function __construct() {
        $this->CI = &get_instance();
        $this->result = 'ACCESS';
        $this->data = NULL;
        $this->CI->load->library('user_agent');
        $this->CI->load->helper('url');
        $this->CI->load->model('auditoria_model');
       
    }

    public function getResult() {
        return $this->result;
    }

    public function setResult($result){
        if($result === TRUE)
            $this->result = 'SUCCESS';
        elseif($result === FALSE)
            $this->result = 'FAILURE';
    }

    public function getData() {
        return $this->data;
    }

    public function setData($data) {
        $this->data = $data;
    }	
	
    public function getModulo() {
        return $this->modulo;
    }

    public function setModulo($modulo) {
        $this->modulo = $modulo;
    }
    
    public function getPermiso() {
        return $this->permiso;
    }

    public function setPermiso($permiso) {
        $this->permiso = $permiso;
    }
    
    public function getTipo_auditoria(){
        return $this->tipo_auditoria;
    }
    
    public function setTipo_auditoria($tipo) {
        $this->tipo_auditoria = $tipo;
    }
	
    public function getItem() {
        return $this->item;
    }

    public function setItem($item) {
        $this->item = $item;
    }
    
    public function getMetodo() {
        return $this->metodo;
    }

    public function setMetodo($metodo) {
        $this->metodo = $metodo;
    }

    function register()
    {
        error_reporting(null);
            //$post = trim(print_r($this->CI->input->post(), TRUE));
            $data = array(
                'au_modulo' => $this->getModulo(), // id del modulo de la tabla            
                'au_usuario' => $this->CI->session->userdata('us_idusuario') == null ? 1 :$this->CI->session->userdata('us_idusuario'),
                'au_permiso' => $this->getPermiso(),
                'au_url' => base_url($this->CI->input->server('REQUEST_URI')),
                'au_so' => $this->CI->agent->platform(),
                'au_fecha' =>date("Y-m-d H:i:s"),
                'au_ip' => $this->CI->input->ip_address(),                        
                'au_navegador' => $this->CI->agent->browser(),
                'au_version' => $this->CI->agent->version(),
                'au_item' => $this->getItem(),
                'au_resultado' => $this->getResult(),	   
            );
            
           if (!empty($this->data)){	
                //$datos_format = "{\"data\":" .json_encode($this->getData()). "}";
                $array = $this->getData();                
                $data['au_data'] = json_encode($this->getData());
                $this->CI->auditoria_model->add($data);
           }
      }
}