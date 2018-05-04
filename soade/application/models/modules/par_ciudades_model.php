<?php
class Par_ciudades_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function create($item)
	{
		$data = array(
			'ci_departamento' => $item['ci_departamento'],
			'ci_idciudad' => $item['ci_idciudad'],
			'ci_nombre' => $item['ci_nombre'],
			'ci_sync' => $item['ci_sync']
			 ); 

		$this->db->insert('par_ciudades', $data);
	}

	function get_by_id($id)
	{
		$this->db->select('*');
		$this->db->from('par_ciudades');
		$this->db->where('ci_idciudad', $id);
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

		$count_q = $this->db->get('par_ciudades');
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
			$search_op  .=  ' ci_departamento like "%'.$search.'%" or ';
			$search_op  .=  ' ci_idciudad like "%'.$search.'%" or ';
			$search_op  .=  ' ci_nombre like "%'.$search.'%" or ';
			$search_op  .=  ' ci_sync like "%'.$search.'%"  ';
			$search = $search_op;
		}

		$SQL = "SELECT * from par_ciudades $search ORDER BY $select_column  $order_column  LIMIT $start , $limit"; 
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
		$this->db->from('par_ciudades');
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
			'ci_departamento' => $item['ci_departamento'],
			'ci_nombre' => $item['ci_nombre'],
			'ci_sync' => $item['ci_sync']
			 ); 

		$this->db->where('ci_idciudad', $id);
		$this->db->update('par_ciudades', $data);
	}

	function delete($id)
	{
		$this->db->where('ci_idciudad', $id);
		$this->db->delete('par_ciudades');
	}
}