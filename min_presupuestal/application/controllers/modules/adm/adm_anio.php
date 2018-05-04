<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Adm_anio extends CI_Controller {

    private $modulo = 19;

    function __construct() {
        parent::__construct();

        $this->load->model('permisos_model');
        $this->load->library('audit');
        $this->load->library('form_validation');
        $this->load->model('modules/adm/adm_anio_model');
    }

    /**
     * Function index		 
     * Acceso a la vista						 
     * Metodologia ajax post.
     * 
     * @autor Jairo torres <ingtorres1986@gmail.com>
     * @creado   : 2017-01-25 
     * 
     * 
     * @param type 
     * @return type
     * exceptions
     *
     * Proyecto para codenigter 
     * 
     */
    function index1() {
//		if($this->session->userdata('us_usuario'))
//		{
//
        $data['permisos'] = 1; // $this->permisos_model->GetPermisosModulosCheckModulos($this->modulo);
        $this->load->view('modules/adm/view_adm_anio', $data);
        
        $this->AddAudit($data, ACCESO);

//		}else{
//
//			$this->load->view('login');
//
//		}
    }
    
    function index() {
        if ($this->session->userdata('us_usuario')) {
            $data['permisos'] = $this->permisos_model->GetPermisosModulosCheckModulos($this->modulo);
            $data['titulo'] = "Años";
//            if ($data["permisos"]["CONSULTAR"]) {                
                $this->load->view('modules/adm/view_adm_anio', $data);
                $this->AddAudit($data, ACCESO);                
//            } else {
//                $this->load->view('errors/modulos/consultar');
//            }            
        } else {
            $this->load->view('login');
        }
    }
    
    
    

    /**
     * Functon create
     * 
     * Metodo de creacion 
     * Contiene auditoria
     * Metodologia ajax post.
     * 
     * @autor Jairo torres <ingtorres1986@gmail.com>
     * @creado   : 2017-01-25 
     * 
     * 
     * @param type 
     * @return type
     * exceptions
     *
     * Proyecto para codenigter 
     * 
     */
    function create() {
        $data = array(
            'an_nombre' => $this->input->post('an_nombre'),
            'an_descripcion' => $this->input->post('an_descripcion'),
            'an_fecha_creacion' =>date("Y-m-d H:i:s"),
            
        );

        $msn = array();

        $result = $this->adm_anio_model->create($data);
        $data['an_idanio'] = $this->db->insert_id();
        $this->AddAudit($data, GUARDAR);
        $msn['result'] = $result;
        $msn['content'] = 'Registro con exito !';


        echo json_encode($msn);
    }

    function save() {

        $id = $this->input->post('an_idanio');

        $data = array(
            'an_nombre' => $this->input->post('an_nombre'),
            'an_descripcion' => $this->input->post('an_descripcion'),
        );
        $msn = array();

        if ($id) {
            $result = $this->adm_anio_model->update($id, $data);
            $data['an_idanio'] = $id;
            $this->AddAudit($data, EDITAR);
            
            $msn['type']    = "info";
            $msn['result']  = 1;
            $msn['title']   = "Proceso";
            $msn['content'] = 'Actualizado con exito !';
        } else {
            if ($this->adm_anio_model->Existe($data)) {
              
                $msn['type']    = "error";
                $msn['result']  = 0;
                $msn['title']   = "Proceso";
                $msn['content'] = 'El año ya existe';
                        
            } else {
                $data['an_fecha_creacion'] = date("Y-m-d H:i:s");
                $result = $this->adm_anio_model->create($data);
                $data['an_idanio'] = $this->db->insert_id();
                $this->AddAudit($data, GUARDAR);
                
                $msn['type']    = "info";
                $msn['result']  = 1;
                $msn['title']   = "Proceso";
                $msn['content'] = 'Registro con exito !';
                
            }
        }



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
     * @creado   : 2017-01-25 
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
        $id = (isset($_REQUEST['an_idanio'])) ? $_REQUEST['an_idanio'] : '';
        $result = $this->adm_anio_model->get_by_id($id);
        echo json_encode($result);
    }

    /**
     * Function get_all_paginate()		 
     * El objetivo es paginar los items						 
     * Metodologia ajax post.
     * 
     * @autor Jairo torres <ingtorres1986@gmail.com>
     * @creado   : 2017-01-25 
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

        $page = (isset($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
        $limit = (isset($_REQUEST['item_por_page'])) ? $_REQUEST['item_por_page'] : 20;
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

        $data = $this->adm_anio_model->get_all_paginate($data);

        echo json_encode($data);
    }

    /**
     * Functon get_all
     * 
     * Metodo de obtencion de todos los registros						 
     * Metodologia ajax post.
     * 
     * @autor Jairo torres <ingtorres1986@gmail.com>
     * @creado   : 2017-01-25 
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

        $result = $this->adm_anio_model->get_all();
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
     * @creado   : 2017-01-25 
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

        $id = $this->input->post('an_idanio');
        $data = array(
            'an_nombre' => $this->input->post('an_nombre'),
            'an_descripcion' => $this->input->post('an_descripcion'),
            'an_fecha_creacion' => $this->input->post('an_fecha_creacion')
        );
        $msn = array();


        $result = $this->adm_anio_model->update($id, $data);
        $data['an_idanio'] = $id;
        $this->AddAudit($data, EDITAR);


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
     * @creado   : 2017-01-25 
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
            'an_nombre' => $this->input->post('an_nombre'),
            'an_descripcion' => $this->input->post('an_descripcion'),
            'an_fecha_creacion' => $this->input->post('an_fecha_creacion')
        );

        $msn = array();

        $id = $this->input->post('an_idanio');

        $result = $this->adm_anio_model->delete($id, $data);
        $data['an_idanio'] = $id;
        $this->AddAudit($data, ELIMINAR);
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
     * @creado   : 2017-01-25 
     * 
     * 
     * @param type 
     * @return type
     * exceptions
     *
     * Proyecto para codenigter 
     * 
     */
    public function AddAudit($add, $permiso) {

        $this->audit->setData($add);
        $this->audit->setModulo($this->modulo);
        $this->audit->setItem('');
        $this->audit->setPermiso($permiso);
        $this->audit->setResult('');
    }

    function _output($param) {
        $this->audit->register();
        echo $param;
    }

}
