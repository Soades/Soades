<?php
class App_modulo_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function create($item)
	{
		$data = array(
			'mo_idmodulo' => $item['mo_idmodulo'],
			'mo_nombre' => $item['mo_nombre'],
			'mo_descripcion' => $item['mo_descripcion'],
			'mo_clasevista' => $item['mo_clasevista'],
			'mo_icono' => $item['mo_icono'],
			'mo_estado' => $item['mo_estado'],
			'mo_modulo' => $item['mo_modulo'],
			'mo_router' => $item['mo_router'],
			'mo_orden' => $item['mo_orden'],
			'mo_idmenuparent' => $item['mo_idmenuparent']
			 ); 

		$this->db->insert('app_modulo', $data);
	}

	function get_by_id($id)
	{
		$this->db->select('*');
		$this->db->from('app_modulo');
		$this->db->where('mo_idmodulo', $id);
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

		$count_q = $this->db->get('app_modulo');
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
			$search_op  .=  ' mo_idmodulo like "%'.$search.'%" or ';
			$search_op  .=  ' mo_nombre like "%'.$search.'%" or ';
			$search_op  .=  ' mo_descripcion like "%'.$search.'%" or ';
			$search_op  .=  ' mo_clasevista like "%'.$search.'%" or ';
			$search_op  .=  ' mo_icono like "%'.$search.'%" or ';
			$search_op  .=  ' mo_estado like "%'.$search.'%" or ';
			$search_op  .=  ' mo_modulo like "%'.$search.'%" or ';
			$search_op  .=  ' mo_router like "%'.$search.'%" or ';
			$search_op  .=  ' mo_orden like "%'.$search.'%" or ';
			$search_op  .=  ' mo_idmenuparent like "%'.$search.'%"  ';
			$search = $search_op;
		}

		$SQL = "SELECT * from app_modulo $search ORDER BY $select_column  $order_column  LIMIT $start , $limit"; 
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
		$this->db->from('app_modulo');
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
			'mo_nombre' => $item['mo_nombre'],
			'mo_descripcion' => $item['mo_descripcion'],
			'mo_clasevista' => $item['mo_clasevista'],
			'mo_icono' => $item['mo_icono'],
			'mo_estado' => $item['mo_estado'],
			'mo_modulo' => $item['mo_modulo'],
			'mo_router' => $item['mo_router'],
			'mo_orden' => $item['mo_orden'],
			'mo_idmenuparent' => $item['mo_idmenuparent']
			 ); 

		$this->db->where('mo_idmodulo', $id);
		$this->db->update('app_modulo', $data);
	}

	function delete($id)
	{
		$this->db->where('mo_idmodulo', $id);
		$this->db->delete('app_modulo');
	}
}