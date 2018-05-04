<?php
class Adm_terceros_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function create($item)
	{
		$data = array(
			'te_empresa' => $item['te_empresa'],
			'te_tipo_tercero' => $item['te_tipo_tercero'],
			'te_nit' => $item['te_nit'],
			'te_nombres' => $item['te_nombres'],
			'te_nombres2' => $item['te_nombres2'],
			'te_apellidos' => $item['te_apellidos'],
			'te_apellidos2' => $item['te_apellidos2'],
			'te_genero' => $item['te_genero'],
			'te_negocio' => $item['te_negocio'],
			'te_es_cliente' => $item['te_es_cliente'],
			'te_es_vendedor' => $item['te_es_vendedor'],
			'te_es_proveedor' => $item['te_es_proveedor'],
			'te_condiciones_pago' => $item['te_condiciones_pago'],
			'te_vendedor' => $item['te_vendedor'],
			'te_lista_precios' => $item['te_lista_precios'],
			'te_fecha_nacimiento' => $item['te_fecha_nacimiento'],
			'te_estado' => $item['te_estado'],
			'te_direccion' => $item['te_direccion'],
			'te_ciudad' => $item['te_ciudad'],
			'te_telefono' => $item['te_telefono'],
			'te_telefono2' => $item['te_telefono2'],
			'te_fax' => $item['te_fax'],
			'te_ext' => $item['te_ext'],
			'te_contacto1' => $item['te_contacto1'],
			'te_contacto2' => $item['te_contacto2'],
			'te_apartado_aereo' => $item['te_apartado_aereo'],
			'te_tipo_identificacion' => $item['te_tipo_identificacion'],
			'te_tipo_tributario' => $item['te_tipo_tributario'],
			'te_pais' => $item['te_pais'],
			'te_barrio' => $item['te_barrio'],
			'te_gran_contribuyente' => $item['te_gran_contribuyente'],
			'te_auto_retenedor' => $item['te_auto_retenedor'],
			'te_es_excento_iva' => $item['te_es_excento_iva'],
			'te_notas' => $item['te_notas'],
			'te_correo' => $item['te_correo'],
			'te_movil' => $item['te_movil'],
			'te_regimen' => $item['te_regimen'],
			'te_base_ventas' => $item['te_base_ventas'],
			'te_cupo_credito' => $item['te_cupo_credito'],
			'te_descuento' => $item['te_descuento'],
			'te_nit_real' => $item['te_nit_real'],
			'te_razon_social' => $item['te_razon_social'],
			'te_representante' => $item['te_representante'],
			'te_codigo_alterno' => $item['te_codigo_alterno'],
			'te_tarjeta' => $item['te_tarjeta'],
			'te_fidelizacion' => $item['te_fidelizacion'],
			'te_imagen' => $item['te_imagen'],
			'te_fecha_creacion' => $item['te_fecha_creacion'],
			'te_sync' => $item['te_sync']
			 ); 

		$this->db->insert('adm_terceros', $data);
	}

	function get_by_id($id)
	{
		$this->db->select('*');
		$this->db->from('adm_terceros');
		$this->db->where('te_idterceros', $id);
		$query = $this->db->get();

		if($query->num_rows()<1){
			return null;
		}
		else{
			return $query->row();
		}
	}

	

	function get_all_paginate($vars)
	{
		
		$page = $vars['page'];
		$limit         = $vars['item_por_page'];
		$select_column = $vars['select_column'];
		$order_column  = $vars['order_column'];
		$search        = $vars['search_column'];

		$start = 0;

		$count_q = $this->db->get('adm_terceros');
		$count = $count_q->num_rows();

		if($count > 0 ) {
			$total_pages = ceil($count/$limit);
		} else {
			$total_pages = 0;
		}

		if($page > $total_pages) {
			$page = $total_pages;
			$start = $limit * $page - $limit;
		}

		if($search != ''){
			$start = 0;
			$search_op  =  ' WHERE ';
			$search_op  .=  ' te_idterceros like "%'.$search.'%" or ';
			$search_op  .=  ' te_empresa like "%'.$search.'%" or ';
			$search_op  .=  ' te_tipo_tercero like "%'.$search.'%" or ';
			$search_op  .=  ' te_nit like "%'.$search.'%" or ';
			$search_op  .=  ' te_nombres like "%'.$search.'%" or ';
			$search_op  .=  ' te_nombres2 like "%'.$search.'%" or ';
			$search_op  .=  ' te_apellidos like "%'.$search.'%" or ';
			$search_op  .=  ' te_apellidos2 like "%'.$search.'%" or ';
			$search_op  .=  ' te_genero like "%'.$search.'%" or ';
			$search_op  .=  ' te_negocio like "%'.$search.'%" or ';
			$search_op  .=  ' te_es_cliente like "%'.$search.'%" or ';
			$search_op  .=  ' te_es_vendedor like "%'.$search.'%" or ';
			$search_op  .=  ' te_es_proveedor like "%'.$search.'%" or ';
			$search_op  .=  ' te_condiciones_pago like "%'.$search.'%" or ';
			$search_op  .=  ' te_vendedor like "%'.$search.'%" or ';
			$search_op  .=  ' te_lista_precios like "%'.$search.'%" or ';
			$search_op  .=  ' te_fecha_nacimiento like "%'.$search.'%" or ';
			$search_op  .=  ' te_estado like "%'.$search.'%" or ';
			$search_op  .=  ' te_direccion like "%'.$search.'%" or ';
			$search_op  .=  ' te_ciudad like "%'.$search.'%" or ';
			$search_op  .=  ' te_telefono like "%'.$search.'%" or ';
			$search_op  .=  ' te_telefono2 like "%'.$search.'%" or ';
			$search_op  .=  ' te_fax like "%'.$search.'%" or ';
			$search_op  .=  ' te_ext like "%'.$search.'%" or ';
			$search_op  .=  ' te_contacto1 like "%'.$search.'%" or ';
			$search_op  .=  ' te_contacto2 like "%'.$search.'%" or ';
			$search_op  .=  ' te_apartado_aereo like "%'.$search.'%" or ';
			$search_op  .=  ' te_tipo_identificacion like "%'.$search.'%" or ';
			$search_op  .=  ' te_tipo_tributario like "%'.$search.'%" or ';
			$search_op  .=  ' te_pais like "%'.$search.'%" or ';
			$search_op  .=  ' te_barrio like "%'.$search.'%" or ';
			$search_op  .=  ' te_gran_contribuyente like "%'.$search.'%" or ';
			$search_op  .=  ' te_auto_retenedor like "%'.$search.'%" or ';
			$search_op  .=  ' te_es_excento_iva like "%'.$search.'%" or ';
			$search_op  .=  ' te_notas like "%'.$search.'%" or ';
			$search_op  .=  ' te_correo like "%'.$search.'%" or ';
			$search_op  .=  ' te_movil like "%'.$search.'%" or ';
			$search_op  .=  ' te_regimen like "%'.$search.'%" or ';
			$search_op  .=  ' te_base_ventas like "%'.$search.'%" or ';
			$search_op  .=  ' te_cupo_credito like "%'.$search.'%" or ';
			$search_op  .=  ' te_descuento like "%'.$search.'%" or ';
			$search_op  .=  ' te_nit_real like "%'.$search.'%" or ';
			$search_op  .=  ' te_razon_social like "%'.$search.'%" or ';
			$search_op  .=  ' te_representante like "%'.$search.'%" or ';
			$search_op  .=  ' te_codigo_alterno like "%'.$search.'%" or ';
			$search_op  .=  ' te_tarjeta like "%'.$search.'%" or ';
			$search_op  .=  ' te_fidelizacion like "%'.$search.'%" or ';
			$search_op  .=  ' te_imagen like "%'.$search.'%" or ';
			$search_op  .=  ' te_fecha_creacion like "%'.$search.'%" or ';
			$search_op  .=  ' te_sync like "%'.$search.'%"  ';
			$search = $search_op;
		}

		$SQL = "SELECT * from adm_terceros $search ORDER BY $select_column  $order_column  LIMIT $start , $limit"; 
		$result_set = $this->db->query($SQL);
		$total_set = $result_set->num_rows();
		$entries = null;

		foreach ($result_set->result() as $row) {	
			$entries[] = $row;
		}

	
		$data = array(
			'page'=>$page,	
			'limit' => $total_set,	
			'total_pages' => $total_pages,	
			'total_all' => $count,	
			'rows' => $entries	
		);
	
		return array($data);
	
	}

	function get_all()
	{
		$this->db->select('*');
		$this->db->from('adm_terceros');
		$query = $this->db->get();

		if($query->num_rows()<1){
			return null;
		}
		else{
			return $query->result_array();
		}
	}

	function update($id, $item)
	{
		$data = array(
			'te_empresa' => $item['te_empresa'],
			'te_tipo_tercero' => $item['te_tipo_tercero'],
			'te_nit' => $item['te_nit'],
			'te_nombres' => $item['te_nombres'],
			'te_nombres2' => $item['te_nombres2'],
			'te_apellidos' => $item['te_apellidos'],
			'te_apellidos2' => $item['te_apellidos2'],
			'te_genero' => $item['te_genero'],
			'te_negocio' => $item['te_negocio'],
			'te_es_cliente' => $item['te_es_cliente'],
			'te_es_vendedor' => $item['te_es_vendedor'],
			'te_es_proveedor' => $item['te_es_proveedor'],
			'te_condiciones_pago' => $item['te_condiciones_pago'],
			'te_vendedor' => $item['te_vendedor'],
			'te_lista_precios' => $item['te_lista_precios'],
			'te_fecha_nacimiento' => $item['te_fecha_nacimiento'],
			'te_estado' => $item['te_estado'],
			'te_direccion' => $item['te_direccion'],
			'te_ciudad' => $item['te_ciudad'],
			'te_telefono' => $item['te_telefono'],
			'te_telefono2' => $item['te_telefono2'],
			'te_fax' => $item['te_fax'],
			'te_ext' => $item['te_ext'],
			'te_contacto1' => $item['te_contacto1'],
			'te_contacto2' => $item['te_contacto2'],
			'te_apartado_aereo' => $item['te_apartado_aereo'],
			'te_tipo_identificacion' => $item['te_tipo_identificacion'],
			'te_tipo_tributario' => $item['te_tipo_tributario'],
			'te_pais' => $item['te_pais'],
			'te_barrio' => $item['te_barrio'],
			'te_gran_contribuyente' => $item['te_gran_contribuyente'],
			'te_auto_retenedor' => $item['te_auto_retenedor'],
			'te_es_excento_iva' => $item['te_es_excento_iva'],
			'te_notas' => $item['te_notas'],
			'te_correo' => $item['te_correo'],
			'te_movil' => $item['te_movil'],
			'te_regimen' => $item['te_regimen'],
			'te_base_ventas' => $item['te_base_ventas'],
			'te_cupo_credito' => $item['te_cupo_credito'],
			'te_descuento' => $item['te_descuento'],
			'te_nit_real' => $item['te_nit_real'],
			'te_razon_social' => $item['te_razon_social'],
			'te_representante' => $item['te_representante'],
			'te_codigo_alterno' => $item['te_codigo_alterno'],
			'te_tarjeta' => $item['te_tarjeta'],
			'te_fidelizacion' => $item['te_fidelizacion'],
			'te_imagen' => $item['te_imagen'],
			'te_fecha_creacion' => $item['te_fecha_creacion'],
			'te_sync' => $item['te_sync']
			 ); 

		$this->db->where('te_idterceros', $id);
		$this->db->update('adm_terceros', $data);
	}

	function delete($id)
	{
		$this->db->where('te_idterceros', $id);
		$this->db->delete('adm_terceros');
	}
}