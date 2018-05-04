<?php
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class permisos_roles extends CI_Controller
{

	private $modulo = 1;

	function __construct()
	{
		parent::__construct();
	
		$this->load->model('permisos_model');
//		$this->load->library('audit');
		$this->load->library('form_validation');
	
		
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

	function index()
	{
//		if($this->session->userdata('us_usuario'))
//		{
//
     		$data['permisos'] = $this->permisos_model->GetPermisosModulosCheckModulos($this->modulo);
     //       $data = 1;
			$this->load->view('modules/app/permisos_roles',$data);
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

	function create()
	{
		$data = array(
			're_codigo' => $this->input->post('re_codigo'),
			're_descripcion' => $this->input->post('re_descripcion'),
			're_contable' => $this->input->post('re_contable'),
			're_grupo' => $this->input->post('re_grupo'),
			're_subgrupo' => $this->input->post('re_subgrupo'),
			're_nit' => $this->input->post('re_nit'),
			're_valor_unitario' => $this->input->post('re_valor_unitario'),
			're_porcentaje_iva' => $this->input->post('re_porcentaje_iva'),
			're_costo_unitario' => $this->input->post('re_costo_unitario'),
			're_maneja_inventario' => $this->input->post('re_maneja_inventario'),
			're_costo_anterior' => $this->input->post('re_costo_anterior'),
			're_cambio_fecha' => $this->input->post('re_cambio_fecha'),
			 ); 

		$msn = array(); 

		$result=$this->adm_referencias_model->create($data);
		$data['re_idreferencias'] = $this->db->insert_id();
//		$this->AddAudit($data,GUARDAR);
		$msn['result'] =$result; 

		$msn['content'] ='Registro con exito !'; 

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

	function get_by_id()
	{
		$id =(isset ($_REQUEST['re_idreferencias'])) ? $_REQUEST['re_idreferencias'] : '';
		$result=$this->adm_referencias_model->get_by_id($id);
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

	function get_all_paginate()
	{
			
		$page	=	(isset($_REQUEST['page'])) ? $_REQUEST['page'] : ''; 	
		$limit = (isset($_REQUEST['item_por_page'])) ? $_REQUEST['item_por_page'] : 50;	
		$select_column = (isset($_REQUEST['select_column'])) ? $_REQUEST['select_column'] : '1' ;	
		$order_column  = (isset($_REQUEST['order_column'])) ? $_REQUEST['order_column'] : 'desc'; 	
		$search = (isset($_REQUEST['search_column'])) ? $_REQUEST['search_column'] : '';	
		$data = array(
			'page'=>$page,	
			'item_por_page' => $limit,	
			'select_column' => $select_column,	
			'order_column' => $order_column,	
			'search_column' => $search	
		);
	
		$data = $this->adm_referencias_model->get_all_paginate($data);
	
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

	function get_all()
	{
		
		$result=$this->adm_referencias_model->get_all();
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

	function update()
	{
		$data = array(
			're_codigo' => $this->input->post('re_codigo'),
			're_descripcion' => $this->input->post('re_descripcion'),
			're_contable' => $this->input->post('re_contable'),
			're_grupo' => $this->input->post('re_grupo'),
			're_subgrupo' => $this->input->post('re_subgrupo'),
			're_nit' => $this->input->post('re_nit'),
			're_valor_unitario' => $this->input->post('re_valor_unitario'),
			're_porcentaje_iva' => $this->input->post('re_porcentaje_iva'),
			're_costo_unitario' => $this->input->post('re_costo_unitario'),
			're_maneja_inventario' => $this->input->post('re_maneja_inventario'),
			're_costo_anterior' => $this->input->post('re_costo_anterior'),
			're_cambio_fecha' => $this->input->post('re_cambio_fecha')
			 ); 

		$msn = array(); 

		$id =$this->input->post('re_idreferencias');

		$result=$this->adm_referencias_model->update($id,$data);
		$data['re_idreferencias'] = $id;
//		$this->AddAudit($data,EDITAR);
		$msn['result'] =$result; 

		$msn['content'] ='Actualizado con exito !'; 

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

	function delete()
	{
		$data = array(
			're_codigo' => $this->input->post('re_codigo'),
			're_descripcion' => $this->input->post('re_descripcion'),
			're_contable' => $this->input->post('re_contable'),
			're_grupo' => $this->input->post('re_grupo'),
			're_subgrupo' => $this->input->post('re_subgrupo'),
			're_nit' => $this->input->post('re_nit'),
			're_valor_unitario' => $this->input->post('re_valor_unitario'),
			're_porcentaje_iva' => $this->input->post('re_porcentaje_iva'),
			're_costo_unitario' => $this->input->post('re_costo_unitario'),
			're_maneja_inventario' => $this->input->post('re_maneja_inventario'),
			're_costo_anterior' => $this->input->post('re_costo_anterior'),
			're_cambio_fecha' => $this->input->post('re_cambio_fecha')
			 ); 

		$msn = array(); 

		$id =$this->input->post('re_idreferencias');

		$result=$this->adm_referencias_model->delete($id,$data);
		$data['re_idreferencias'] = $id;
		$this->AddAudit($data,ELIMINAR);
		$msn['result'] =$result; 

		$msn['content'] ='Eliminado con exito !'; 

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

	/*public function AddAudit($add,$permiso)
	{
		
		$this->audit->setData($add);
		$this->audit->setModulo($this->modulo);
		$this->audit->setItem($add['re_idreferencias']);
		$this->audit->setPermiso($permiso);
		$this->audit->setResult('');

	}

	

	function _output($param)
	{
		$this->audit->register();
	echo	$param;
	}*/

}