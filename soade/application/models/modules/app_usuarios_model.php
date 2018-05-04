<?php
class App_usuarios_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function create($item)
	{
		$data = array(
			'us_idusuario' => $item['us_idusuario'],
			'us_roles' => $item['us_roles'],
			'us_usuario' => $item['us_usuario'],
			'us_clave' => $item['us_clave'],
			'us_active' => $item['us_active'],
			'us_conectado' => $item['us_conectado'],
			'us_ultimo_acceso' => $item['us_ultimo_acceso'],
			'us_tercero' => $item['us_tercero'],
			'us_email' => $item['us_email'],
			'remember_code' => $item['remember_code'],
			'us_institucion' => $item['us_institucion'],
			'us_biografia' => $item['us_biografia'],
			'us_biografia_publica' => $item['us_biografia_publica']
			 ); 

		$this->db->insert('app_usuarios', $data);
	}

	function get_by_id($id)
	{
		$this->db->select('*');
		$this->db->from('app_usuarios');
		$this->db->where('us_idusuario', $id);
		$this->db->select('*');
		$this->db->from('app_usuarios');
		$this->db->where('us_institucion', $id);
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

		$count_q = $this->db->get('app_usuarios');
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
			$search_op  .=  ' us_idusuario like "%'.$search.'%" or ';
			$search_op  .=  ' us_roles like "%'.$search.'%" or ';
			$search_op  .=  ' us_usuario like "%'.$search.'%" or ';
			$search_op  .=  ' us_clave like "%'.$search.'%" or ';
			$search_op  .=  ' us_active like "%'.$search.'%" or ';
			$search_op  .=  ' us_conectado like "%'.$search.'%" or ';
			$search_op  .=  ' us_ultimo_acceso like "%'.$search.'%" or ';
			$search_op  .=  ' us_tercero like "%'.$search.'%" or ';
			$search_op  .=  ' us_email like "%'.$search.'%" or ';
			$search_op  .=  ' remember_code like "%'.$search.'%" or ';
			$search_op  .=  ' us_institucion like "%'.$search.'%" or ';
			$search_op  .=  ' us_biografia like "%'.$search.'%" or ';
			$search_op  .=  ' us_biografia_publica like "%'.$search.'%"  ';
			$search = $search_op;
		}

		$SQL = "SELECT * from app_usuarios $search ORDER BY $select_column  $order_column  LIMIT $start , $limit"; 
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
		$this->db->from('app_usuarios');
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
			'us_roles' => $item['us_roles'],
			'us_usuario' => $item['us_usuario'],
			'us_clave' => $item['us_clave'],
			'us_active' => $item['us_active'],
			'us_conectado' => $item['us_conectado'],
			'us_ultimo_acceso' => $item['us_ultimo_acceso'],
			'us_tercero' => $item['us_tercero'],
			'us_email' => $item['us_email'],
			'remember_code' => $item['remember_code'],
			'us_biografia' => $item['us_biografia'],
			'us_biografia_publica' => $item['us_biografia_publica']
			 ); 

		$this->db->where('us_institucion', $id);
		$this->db->update('app_usuarios', $data);
	}

	function delete($id)
	{
		$this->db->where('us_idusuario', $id);
		$this->db->where('us_institucion', $id);
		$this->db->delete('app_usuarios');
	}
}