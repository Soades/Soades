<?php
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Adm_terceros extends CI_Controller
{

	private $modulo;

	function __construct()
	{
		parent::__construct();
	
		$this->load->model('permisos_model');
		$this->load->library('audit');
		$this->load->library('form_validation');
		$this->load->model('adm_terceros_model');
		
	}

	/**
		 * Function index		 
		 * Acceso a la vista						 
		 * Metodologia ajax post.
		 * 
		 * @autor Jairo torres <ingtorres1986@gmail.com>
		 * @creado   : 2018-04-30 
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
		if($this->session->userdata('us_usuario'))
		{

			$data['permisos'] = $this->permisos_model->GetPermisosModulosCheckModulos($this->modulo);
			$this->load->view('adm/view_adm_terceros',$data);
			$this->AddAudit($data,ACCESO);

		}else{

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
		 * @creado   : 2018-04-30 
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
			'te_empresa' => $this->input->post('te_empresa'),
			'te_tipo_tercero' => $this->input->post('te_tipo_tercero'),
			'te_nit' => $this->input->post('te_nit'),
			'te_nombres' => $this->input->post('te_nombres'),
			'te_nombres2' => $this->input->post('te_nombres2'),
			'te_apellidos' => $this->input->post('te_apellidos'),
			'te_apellidos2' => $this->input->post('te_apellidos2'),
			'te_genero' => $this->input->post('te_genero'),
			'te_negocio' => $this->input->post('te_negocio'),
			'te_es_cliente' => $this->input->post('te_es_cliente'),
			'te_es_vendedor' => $this->input->post('te_es_vendedor'),
			'te_es_proveedor' => $this->input->post('te_es_proveedor'),
			'te_condiciones_pago' => $this->input->post('te_condiciones_pago'),
			'te_vendedor' => $this->input->post('te_vendedor'),
			'te_lista_precios' => $this->input->post('te_lista_precios'),
			'te_fecha_nacimiento' => $this->input->post('te_fecha_nacimiento'),
			'te_estado' => $this->input->post('te_estado'),
			'te_direccion' => $this->input->post('te_direccion'),
			'te_ciudad' => $this->input->post('te_ciudad'),
			'te_telefono' => $this->input->post('te_telefono'),
			'te_telefono2' => $this->input->post('te_telefono2'),
			'te_fax' => $this->input->post('te_fax'),
			'te_ext' => $this->input->post('te_ext'),
			'te_contacto1' => $this->input->post('te_contacto1'),
			'te_contacto2' => $this->input->post('te_contacto2'),
			'te_apartado_aereo' => $this->input->post('te_apartado_aereo'),
			'te_tipo_identificacion' => $this->input->post('te_tipo_identificacion'),
			'te_tipo_tributario' => $this->input->post('te_tipo_tributario'),
			'te_pais' => $this->input->post('te_pais'),
			'te_barrio' => $this->input->post('te_barrio'),
			'te_gran_contribuyente' => $this->input->post('te_gran_contribuyente'),
			'te_auto_retenedor' => $this->input->post('te_auto_retenedor'),
			'te_es_excento_iva' => $this->input->post('te_es_excento_iva'),
			'te_notas' => $this->input->post('te_notas'),
			'te_correo' => $this->input->post('te_correo'),
			'te_movil' => $this->input->post('te_movil'),
			'te_regimen' => $this->input->post('te_regimen'),
			'te_base_ventas' => $this->input->post('te_base_ventas'),
			'te_cupo_credito' => $this->input->post('te_cupo_credito'),
			'te_descuento' => $this->input->post('te_descuento'),
			'te_nit_real' => $this->input->post('te_nit_real'),
			'te_razon_social' => $this->input->post('te_razon_social'),
			'te_representante' => $this->input->post('te_representante'),
			'te_codigo_alterno' => $this->input->post('te_codigo_alterno'),
			'te_tarjeta' => $this->input->post('te_tarjeta'),
			'te_fidelizacion' => $this->input->post('te_fidelizacion'),
			'te_imagen' => $this->input->post('te_imagen'),
			'te_fecha_creacion' => $this->input->post('te_fecha_creacion'),
			'te_sync' => $this->input->post('te_sync'),
			 ); 

		$msn = array(); 

		$result=$this->adm_terceros_model->create($data);
		$data['te_idterceros'] = $this->db->insert_id();
		$this->AddAudit($data,GUARDAR);
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
		 * @creado   : 2018-04-30 
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
		$id =(isset ($_REQUEST['te_idterceros'])) ? $_REQUEST['te_idterceros'] : '';
		$result=$this->adm_terceros_model->get_by_id($id);
		echo json_encode($result);

	}

	/**
		 * Function get_all_paginate()		 
		 * El objetivo es paginar los items						 
		 * Metodologia ajax post.
		 * 
		 * @autor Jairo torres <ingtorres1986@gmail.com>
		 * @creado   : 2018-04-30 
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
			
		$page	=	(isset($_REQUEST['page'])) ? $_REQUEST['page'] : 1; 	
		$limit = (isset($_REQUEST['item_por_page'])) ? $_REQUEST['item_por_page'] : 20;	
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
	
		$data = $this->adm_terceros_model->get_all_paginate($data);
	
		echo json_encode($data);
	
	}

	/**
		 * Functon get_all
		 * 
		 * Metodo de obtencion de todos los registros						 
		 * Metodologia ajax post.
		 * 
		 * @autor Jairo torres <ingtorres1986@gmail.com>
		 * @creado   : 2018-04-30 
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
		
		$result=$this->adm_terceros_model->get_all();
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
		 * @creado   : 2018-04-30 
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
			'te_empresa' => $this->input->post('te_empresa'),
			'te_tipo_tercero' => $this->input->post('te_tipo_tercero'),
			'te_nit' => $this->input->post('te_nit'),
			'te_nombres' => $this->input->post('te_nombres'),
			'te_nombres2' => $this->input->post('te_nombres2'),
			'te_apellidos' => $this->input->post('te_apellidos'),
			'te_apellidos2' => $this->input->post('te_apellidos2'),
			'te_genero' => $this->input->post('te_genero'),
			'te_negocio' => $this->input->post('te_negocio'),
			'te_es_cliente' => $this->input->post('te_es_cliente'),
			'te_es_vendedor' => $this->input->post('te_es_vendedor'),
			'te_es_proveedor' => $this->input->post('te_es_proveedor'),
			'te_condiciones_pago' => $this->input->post('te_condiciones_pago'),
			'te_vendedor' => $this->input->post('te_vendedor'),
			'te_lista_precios' => $this->input->post('te_lista_precios'),
			'te_fecha_nacimiento' => $this->input->post('te_fecha_nacimiento'),
			'te_estado' => $this->input->post('te_estado'),
			'te_direccion' => $this->input->post('te_direccion'),
			'te_ciudad' => $this->input->post('te_ciudad'),
			'te_telefono' => $this->input->post('te_telefono'),
			'te_telefono2' => $this->input->post('te_telefono2'),
			'te_fax' => $this->input->post('te_fax'),
			'te_ext' => $this->input->post('te_ext'),
			'te_contacto1' => $this->input->post('te_contacto1'),
			'te_contacto2' => $this->input->post('te_contacto2'),
			'te_apartado_aereo' => $this->input->post('te_apartado_aereo'),
			'te_tipo_identificacion' => $this->input->post('te_tipo_identificacion'),
			'te_tipo_tributario' => $this->input->post('te_tipo_tributario'),
			'te_pais' => $this->input->post('te_pais'),
			'te_barrio' => $this->input->post('te_barrio'),
			'te_gran_contribuyente' => $this->input->post('te_gran_contribuyente'),
			'te_auto_retenedor' => $this->input->post('te_auto_retenedor'),
			'te_es_excento_iva' => $this->input->post('te_es_excento_iva'),
			'te_notas' => $this->input->post('te_notas'),
			'te_correo' => $this->input->post('te_correo'),
			'te_movil' => $this->input->post('te_movil'),
			'te_regimen' => $this->input->post('te_regimen'),
			'te_base_ventas' => $this->input->post('te_base_ventas'),
			'te_cupo_credito' => $this->input->post('te_cupo_credito'),
			'te_descuento' => $this->input->post('te_descuento'),
			'te_nit_real' => $this->input->post('te_nit_real'),
			'te_razon_social' => $this->input->post('te_razon_social'),
			'te_representante' => $this->input->post('te_representante'),
			'te_codigo_alterno' => $this->input->post('te_codigo_alterno'),
			'te_tarjeta' => $this->input->post('te_tarjeta'),
			'te_fidelizacion' => $this->input->post('te_fidelizacion'),
			'te_imagen' => $this->input->post('te_imagen'),
			'te_fecha_creacion' => $this->input->post('te_fecha_creacion'),
			'te_sync' => $this->input->post('te_sync')
			 ); 

		$msn = array(); 

		$id =$this->input->post('te_idterceros');

		$result=$this->adm_terceros_model->update($id,$data);
		$data['te_idterceros'] = $id;
		$this->AddAudit($data,EDITAR);
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
		 * @creado   : 2018-04-30 
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
			'te_empresa' => $this->input->post('te_empresa'),
			'te_tipo_tercero' => $this->input->post('te_tipo_tercero'),
			'te_nit' => $this->input->post('te_nit'),
			'te_nombres' => $this->input->post('te_nombres'),
			'te_nombres2' => $this->input->post('te_nombres2'),
			'te_apellidos' => $this->input->post('te_apellidos'),
			'te_apellidos2' => $this->input->post('te_apellidos2'),
			'te_genero' => $this->input->post('te_genero'),
			'te_negocio' => $this->input->post('te_negocio'),
			'te_es_cliente' => $this->input->post('te_es_cliente'),
			'te_es_vendedor' => $this->input->post('te_es_vendedor'),
			'te_es_proveedor' => $this->input->post('te_es_proveedor'),
			'te_condiciones_pago' => $this->input->post('te_condiciones_pago'),
			'te_vendedor' => $this->input->post('te_vendedor'),
			'te_lista_precios' => $this->input->post('te_lista_precios'),
			'te_fecha_nacimiento' => $this->input->post('te_fecha_nacimiento'),
			'te_estado' => $this->input->post('te_estado'),
			'te_direccion' => $this->input->post('te_direccion'),
			'te_ciudad' => $this->input->post('te_ciudad'),
			'te_telefono' => $this->input->post('te_telefono'),
			'te_telefono2' => $this->input->post('te_telefono2'),
			'te_fax' => $this->input->post('te_fax'),
			'te_ext' => $this->input->post('te_ext'),
			'te_contacto1' => $this->input->post('te_contacto1'),
			'te_contacto2' => $this->input->post('te_contacto2'),
			'te_apartado_aereo' => $this->input->post('te_apartado_aereo'),
			'te_tipo_identificacion' => $this->input->post('te_tipo_identificacion'),
			'te_tipo_tributario' => $this->input->post('te_tipo_tributario'),
			'te_pais' => $this->input->post('te_pais'),
			'te_barrio' => $this->input->post('te_barrio'),
			'te_gran_contribuyente' => $this->input->post('te_gran_contribuyente'),
			'te_auto_retenedor' => $this->input->post('te_auto_retenedor'),
			'te_es_excento_iva' => $this->input->post('te_es_excento_iva'),
			'te_notas' => $this->input->post('te_notas'),
			'te_correo' => $this->input->post('te_correo'),
			'te_movil' => $this->input->post('te_movil'),
			'te_regimen' => $this->input->post('te_regimen'),
			'te_base_ventas' => $this->input->post('te_base_ventas'),
			'te_cupo_credito' => $this->input->post('te_cupo_credito'),
			'te_descuento' => $this->input->post('te_descuento'),
			'te_nit_real' => $this->input->post('te_nit_real'),
			'te_razon_social' => $this->input->post('te_razon_social'),
			'te_representante' => $this->input->post('te_representante'),
			'te_codigo_alterno' => $this->input->post('te_codigo_alterno'),
			'te_tarjeta' => $this->input->post('te_tarjeta'),
			'te_fidelizacion' => $this->input->post('te_fidelizacion'),
			'te_imagen' => $this->input->post('te_imagen'),
			'te_fecha_creacion' => $this->input->post('te_fecha_creacion'),
			'te_sync' => $this->input->post('te_sync')
			 ); 

		$msn = array(); 

		$id =$this->input->post('te_idterceros');

		$result=$this->adm_terceros_model->delete($id,$data);
		$data['te_idterceros'] = $id;
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
		 * @creado   : 2018-04-30 
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
		$this->audit->setItem($add['te_idterceros']);
		$this->audit->setPermiso($permiso);
		$this->audit->setResult('');

	}

	

	function _output($param)
	{
		$this->audit->register();
	echo	$param;
	}

}