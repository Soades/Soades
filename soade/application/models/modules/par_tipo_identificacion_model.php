<?php
class Par_tipo_identificacion_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function create($item)
	{
		$data = array(
			'ti_nombre' => $item['ti_nombre']
			 ); 

		$this->db->insert('par_tipo_identificacion', $data);
	}

	function get_by_id($id)
	{
		$this->db->select('*');
		$this->db->from('par_tipo_identificacion');
		$this->db->where('ti_idti', $id);
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

		$count_q = $this->db->get('par_tipo_identificacion');
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
			$search_op  .=  ' ti_idti like "%'.$search.'%" or ';
			$search_op  .=  ' ti_nombre like "%'.$search.'%"  ';
			$search = $search_op;
		}

		$SQL = "SELECT * from par_tipo_identificacion $search ORDER BY $select_column  $order_column  LIMIT $start , $limit"; 
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
		$this->db->from('par_tipo_identificacion');
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
			'ti_nombre' => $item['ti_nombre']
			 ); 

		$this->db->where('ti_idti', $id);
		$this->db->update('par_tipo_identificacion', $data);
	}

	function delete($id)
	{
		$this->db->where('ti_idti', $id);
		$this->db->delete('par_tipo_identificacion');
	}
}