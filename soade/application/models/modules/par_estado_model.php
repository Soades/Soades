<?php
class Par_estado_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function create($item)
	{
		$data = array(
			'es_nombre' => $item['es_nombre']
			 ); 

		$this->db->insert('par_estado', $data);
	}

	function get_by_id($id)
	{
		$this->db->select('*');
		$this->db->from('par_estado');
		$this->db->where('es_idestado', $id);
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

		$count_q = $this->db->get('par_estado');
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
			$search_op  .=  ' es_idestado like "%'.$search.'%" or ';
			$search_op  .=  ' es_nombre like "%'.$search.'%"  ';
			$search = $search_op;
		}

		$SQL = "SELECT * from par_estado $search ORDER BY $select_column  $order_column  LIMIT $start , $limit"; 
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
		$this->db->from('par_estado');
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
			'es_nombre' => $item['es_nombre']
			 ); 

		$this->db->where('es_idestado', $id);
		$this->db->update('par_estado', $data);
	}

	function delete($id)
	{
		$this->db->where('es_idestado', $id);
		$this->db->delete('par_estado');
	}
}