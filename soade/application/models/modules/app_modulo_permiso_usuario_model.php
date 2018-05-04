<?php
class App_modulo_permiso_usuario_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function create($item)
	{
		$data = array(
			'mpu_usuario_id' => $item['mpu_usuario_id'],
			'mpu_modulo_permiso_id' => $item['mpu_modulo_permiso_id'],
			'mpu_permitir' => $item['mpu_permitir']
			 ); 

		$this->db->insert('app_modulo_permiso_usuario', $data);
	}

	function get_by_id($id)
	{
		$this->db->select('*');
		$this->db->from('app_modulo_permiso_usuario');
		$this->db->where('mpu_idmpu', $id);
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

		$count_q = $this->db->get('app_modulo_permiso_usuario');
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
			$search_op  .=  ' mpu_idmpu like "%'.$search.'%" or ';
			$search_op  .=  ' mpu_usuario_id like "%'.$search.'%" or ';
			$search_op  .=  ' mpu_modulo_permiso_id like "%'.$search.'%" or ';
			$search_op  .=  ' mpu_permitir like "%'.$search.'%"  ';
			$search = $search_op;
		}

		$SQL = "SELECT * from app_modulo_permiso_usuario $search ORDER BY $select_column  $order_column  LIMIT $start , $limit"; 
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
		$this->db->from('app_modulo_permiso_usuario');
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
			'mpu_usuario_id' => $item['mpu_usuario_id'],
			'mpu_modulo_permiso_id' => $item['mpu_modulo_permiso_id'],
			'mpu_permitir' => $item['mpu_permitir']
			 ); 

		$this->db->where('mpu_idmpu', $id);
		$this->db->update('app_modulo_permiso_usuario', $data);
	}

	function delete($id)
	{
		$this->db->where('mpu_idmpu', $id);
		$this->db->delete('app_modulo_permiso_usuario');
	}
}