<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class app_roles extends CI_Controller {

    private $modulo = 1;

    function __construct() {
        parent::__construct();

        $this->load->model('permisos_model');
	$this->load->library('audit');
        $this->load->library('form_validation');
        $this->load->model('modules/app/app_roles_model');
    }

    /**
     * Function index		 
     * Acceso a la vista						 
     * Metodologia ajax post.
     * 
     * @autor Jairo torres <ingtorres1986@gmail.com>
     * @creado   : 2016-06-07 
     * 
     * 
     * @param type 
     * @return type
     * exceptions
     *
     * Proyecto para codenigter 
     * 
     */
    function index() {
//		if($this->session->userdata('us_usuario'))
//		{
//
        $data['permisos'] = $this->permisos_model->GetPermisosModulosCheckModulos($this->modulo);
        //       $data = 1;
        $this->load->view('modules/app/roles', $data);
//			$this->AddAudit($data,ACCESO);
//
//		}else{
//
//			$this->load->view('login');
//
//		}
    }

    /**
     * Functon create
     * 
     * Metodo de creacion 
     * Contiene auditoria
     * Metodologia ajax post.
     * 
     * @autor Jairo torres <ingtorres1986@gmail.com>
     * @creado   : 2016-06-07 
     * 
     * 
     * @param type 
     * @return type
     * exceptions
     *
     * Proyecto para codenigter 
     * 
     */
    
    
    function save(){
            
        $id = $this->input->post('ro_idroles');
        $msn = array();
        $data = array(
            'ro_nombre' => $this->input->post('ro_nombre'),
            'ro_descripcion' => $this->input->post('ro_descripcion'),
            'ro_estado' => $this->input->post('ro_estado'),
        );
        
        if($id){
       
            $result = $this->app_roles_model->update($id, $data);
            $data['ro_idroles'] = $id;
            $this->AddAudit($data,EDITAR);
            $msn['type'] = "info";
            $msn['result'] = $result;
            $msn['title'] = "Mensaje";
            $msn['content'] = 'Actualizado con exito !';
                    
        } else {
                
            $result = $this->app_roles_model->create($data);
            $data['ro_idroles'] = $this->db->insert_id();
            $this->AddAudit($data,GUARDAR);
            $msn['type'] = "info";
            $msn['result'] = $result;
            $msn['title'] = "Mensaje";
            $msn['content'] = 'Registro con exito !';            
        }    
        

        echo json_encode($msn);        
        
    }
    
    function create() {
        $data = array(
            'ro_nombre' => $this->input->post('ro_nombre'),
            'ro_descripcion' => $this->input->post('ro_descripcion'),
            'ro_estado' => $this->input->post('ro_estado'),
        );

        $msn = array();

        $result = $this->app_roles_model->create($data);
        $data['ro_idroles'] = $this->db->insert_id();
        //$this->AddAudit($data,GUARDAR);
        $msn['result'] = $result;
        $msn['content'] = 'Registro con exito !';

        echo json_encode($msn);
    }

    /**
     * Functon get_by_id
     * 
     * Metodo de obtencion de registro
     * mediante el id de la tabla						 
     * Metodologia ajax post.
     * 
     * @autor Jairo torres <ingtorres1986@gmail.com>
     * @creado   : 2016-06-07 
     * 
     * 
     * @param type 
     * @return type
     * exceptions
     *
     * Proyecto para codenigter 
     * 
     */
    function get_by_id() {
        $id = (isset($_REQUEST['ro_idroles'])) ? $_REQUEST['ro_idroles'] : '';
        $result = $this->app_roles_model->get_by_id($id);
        echo json_encode($result);
    }

    /**
     * Function get_all_paginate()		 
     * El objetivo es paginar los items						 
     * Metodologia ajax post.
     * 
     * @autor Jairo torres <ingtorres1986@gmail.com>
     * @creado   : 2016-06-07 
     * 
     * 
     * @param type 
     * @return type
     * exceptions
     *
     * Proyecto para codenigter 
     * 
     */
    function get_all_paginate() {

        $page = (isset($_REQUEST['page'])) ? $_REQUEST['page'] : '';
        $limit = (isset($_REQUEST['item_por_page'])) ? $_REQUEST['item_por_page'] : 50;
        $select_column = (isset($_REQUEST['select_column'])) ? $_REQUEST['select_column'] : '1';
        $order_column = (isset($_REQUEST['order_column'])) ? $_REQUEST['order_column'] : 'desc';
        $search = (isset($_REQUEST['search_column'])) ? $_REQUEST['search_column'] : '';
        $data = array(
            'page' => $page,
            'item_por_page' => $limit,
            'select_column' => $select_column,
            'order_column' => $order_column,
            'search_column' => $search
        );

        $data = $this->app_roles_model->get_all_paginate($data);

        echo json_encode($data);
    }

    /**
     * Functon get_all
     * 
     * Metodo de obtencion de todos los registros						 
     * Metodologia ajax post.
     * 
     * @autor Jairo torres <ingtorres1986@gmail.com>
     * @creado   : 2016-06-07 
     * 
     * 
     * @param type 
     * @return type
     * exceptions
     *
     * Proyecto para codenigter 
     * 
     */
    function get_all() {

        $result = $this->app_roles_model->get_all();
        echo json_encode($result);
    }

    /**
     * Functon update
     * 
     * Metodo de actualizacion y edicion 
     * Contiene auditoria
     * Metodologia ajax post.
     * 
     * @autor Jairo torres <ingtorres1986@gmail.com>
     * @creado   : 2016-12-22 
     * 
     * 
     * @param type 
     * @return type
     * exceptions
     *
     * Proyecto para codenigter 
     * 
     */
    function update() {
        $data = array(
            'ro_nombre' => $this->input->post('ro_nombre'),
            'ro_descripcion' => $this->input->post('ro_descripcion'),
            'ro_estado' => $this->input->post('ro_estado')
        );

        $msn = array();

        $id = $this->input->post('ro_idroles');

        $result = $this->app_roles_model->update($id, $data);
        $data['ro_idroles'] = $id;
        //$this->AddAudit($data,EDITAR);
        $msn['result'] = $result;

        $msn['content'] = 'Actualizado con exito !';

        echo json_encode($msn);
    }

    /**
     * Functon delete
     * 
     * Metodo de eliminacion
     * Contiene auditoria						 
     * Metodologia ajax post.
     * 
     * @autor Jairo torres <ingtorres1986@gmail.com>
     * @creado   : 2016-12-22 
     * 
     * 
     * @param type 
     * @return type
     * exceptions
     *
     * Proyecto para codenigter 
     * 
     */
    function delete() {
        $data = array(
            'ro_nombre' => $this->input->post('ro_nombre'),
            'ro_descripcion' => $this->input->post('ro_descripcion'),
            'ro_estado' => $this->input->post('ro_estado')
        );

        $msn = array();

        $id = $this->input->post('ro_idroles');

        $result = $this->app_roles_model->delete($id, $data);
        $data['ro_idroles'] = $id;
        //$this->AddAudit($data,ELIMINAR);
        $msn['result'] = $result;

        $msn['content'] = 'Eliminado con exito !';

        echo json_encode($msn);
    }

    /**
     * Function AddAudit
     * Function _output
     * Metodo de registro de eventos para la auditoria						 
     * Metodologia ajax post.
     * 
     * @autor Jairo torres <ingtorres1986@gmail.com>
     * @creado   : 2016-06-07 
     * 
     * 
     * @param type 
     * @return type
     * exceptions
     *
     * Proyecto para codenigter 
     * 
     */
    public function AddAudit($add,$permiso)
    {

      $this->audit->setData($add);
      $this->audit->setModulo($this->modulo);
      $this->audit->setItem($add['ro_idroles']);
      $this->audit->setPermiso($permiso);
      $this->audit->setResult('');

    }

    function _output($param)
    {
      $this->audit->register();
      echo $param;
    } 
}
