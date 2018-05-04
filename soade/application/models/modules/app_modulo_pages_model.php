<?php
class App_modulo_pages_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function create($item)
	{
		$data = array(
			'mp_nombre' => $item['mp_nombre'],
			'mp_descripcion' => $item['mp_descripcion'],
			'mp_icono' => $item['mp_icono'],
			'mp_idmodulo' => $item['mp_idmodulo'],
			'mp_router' => $item['mp_router'],
			'mp_orden' => $item['mp_orden']
			 ); 

		$this->db->insert('app_modulo_pages', $data);
	}

	function get_by_id($id)
	{
		$this->db->select('*');
		$this->db->from('app_modulo_pages');
		$this->db->where('mp_idmp', $id);
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

		$count_q = $this->db->get('app_modulo_pages');
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
			$search_op  .=  ' mp_idmp like "%'.$search.'%" or ';
			$search_op  .=  ' mp_nombre like "%'.$search.'%" or ';
			$search_op  .=  ' mp_descripcion like "%'.$search.'%" or ';
			$search_op  .=  ' mp_icono like "%'.$search.'%" or ';
			$search_op  .=  ' mp_idmodulo like "%'.$search.'%" or ';
			$search_op  .=  ' mp_router like "%'.$search.'%" or ';
			$search_op  .=  ' mp_orden like "%'.$search.'%"  ';
			$search = $search_op;
		}

		$SQL = "SELECT * from app_modulo_pages $search ORDER BY $select_column  $order_column  LIMIT $start , $limit"; 
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
		$this->db->from('app_modulo_pages');
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
			'mp_nombre' => $item['mp_nombre'],
			'mp_descripcion' => $item['mp_descripcion'],
			'mp_icono' => $item['mp_icono'],
			'mp_idmodulo' => $item['mp_idmodulo'],
			'mp_router' => $item['mp_router'],
			'mp_orden' => $item['mp_orden']
			 ); 

		$this->db->where('mp_idmp', $id);
		$this->db->update('app_modulo_pages', $data);
	}

	function delete($id)
	{
		$this->db->where('mp_idmp', $id);
		$this->db->delete('app_modulo_pages');
	}
}