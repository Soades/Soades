<?php
class Adm_anio_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function create($item)
	{
		$data = array(
			'an_nombre' => $item['an_nombre'],
			'an_descripcion' => $item['an_descripcion'],
			'an_fecha_creacion' => $item['an_fecha_creacion']
			 ); 

		$this->db->insert('adm_anio', $data);
	}

	function get_by_id($id)
	{
		$this->db->select('*');
		$this->db->from('adm_anio');
		$this->db->where('an_idanio', $id);
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

		$count_q = $this->db->get('adm_anio');
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
			$search_op  .=  ' an_idanio like "%'.$search.'%" or ';
			$search_op  .=  ' an_nombre like "%'.$search.'%" or ';
			$search_op  .=  ' an_descripcion like "%'.$search.'%" or ';
			$search_op  .=  ' an_fecha_creacion like "%'.$search.'%"  ';
			$search = $search_op;
		}

		$SQL = "SELECT * from adm_anio $search ORDER BY $select_column  $order_column  LIMIT $start , $limit"; 
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
		$this->db->from('adm_anio');
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
			'an_nombre' => $item['an_nombre'],
			'an_descripcion' => $item['an_descripcion'],
			'an_fecha_creacion' => $item['an_fecha_creacion']
			 ); 

		$this->db->where('an_idanio', $id);
		$this->db->update('adm_anio', $data);
	}

	function delete($id)
	{
		$this->db->where('an_idanio', $id);
		$this->db->delete('adm_anio');
	}
}