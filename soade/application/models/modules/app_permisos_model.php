<?php
class App_permisos_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function create($item)
	{
		$data = array(
			'pe_idpermiso' => $item['pe_idpermiso'],
			'pe_nombre' => $item['pe_nombre'],
			'pe_descripcion' => $item['pe_descripcion'],
			'pe_basico' => $item['pe_basico'],
			'pe_valordefecto' => $item['pe_valordefecto']
			 ); 

		$this->db->insert('app_permisos', $data);
	}

	function get_by_id($id)
	{
		$this->db->select('*');
		$this->db->from('app_permisos');
		$this->db->where('pe_idpermiso', $id);
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

		$count_q = $this->db->get('app_permisos');
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
			$search_op  .=  ' pe_idpermiso like "%'.$search.'%" or ';
			$search_op  .=  ' pe_nombre like "%'.$search.'%" or ';
			$search_op  .=  ' pe_descripcion like "%'.$search.'%" or ';
			$search_op  .=  ' pe_basico like "%'.$search.'%" or ';
			$search_op  .=  ' pe_valordefecto like "%'.$search.'%"  ';
			$search = $search_op;
		}

		$SQL = "SELECT * from app_permisos $search ORDER BY $select_column  $order_column  LIMIT $start , $limit"; 
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
		$this->db->from('app_permisos');
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
			'pe_nombre' => $item['pe_nombre'],
			'pe_descripcion' => $item['pe_descripcion'],
			'pe_basico' => $item['pe_basico'],
			'pe_valordefecto' => $item['pe_valordefecto']
			 ); 

		$this->db->where('pe_idpermiso', $id);
		$this->db->update('app_permisos', $data);
	}

	function delete($id)
	{
		$this->db->where('pe_idpermiso', $id);
		$this->db->delete('app_permisos');
	}
}