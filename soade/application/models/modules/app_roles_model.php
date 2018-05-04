<?php
class App_roles_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function create($item)
	{
		$data = array(
			'ro_nombre' => $item['ro_nombre'],
			'ro_descripcion' => $item['ro_descripcion'],
			'ro_estado' => $item['ro_estado']
			 ); 

		$this->db->insert('app_roles', $data);
	}

	function get_by_id($id)
	{
		$this->db->select('*');
		$this->db->from('app_roles');
		$this->db->where('ro_idroles', $id);
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

		$count_q = $this->db->get('app_roles');
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
			$search_op  .=  ' ro_idroles like "%'.$search.'%" or ';
			$search_op  .=  ' ro_nombre like "%'.$search.'%" or ';
			$search_op  .=  ' ro_descripcion like "%'.$search.'%" or ';
			$search_op  .=  ' ro_estado like "%'.$search.'%"  ';
			$search = $search_op;
		}

		$SQL = "SELECT * from app_roles $search ORDER BY $select_column  $order_column  LIMIT $start , $limit"; 
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
		$this->db->from('app_roles');
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
			'ro_nombre' => $item['ro_nombre'],
			'ro_descripcion' => $item['ro_descripcion'],
			'ro_estado' => $item['ro_estado']
			 ); 

		$this->db->where('ro_idroles', $id);
		$this->db->update('app_roles', $data);
	}

	function delete($id)
	{
		$this->db->where('ro_idroles', $id);
		$this->db->delete('app_roles');
	}
}