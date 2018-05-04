<?php
class App_sesiones_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function create($item)
	{
		$data = array(
			'se_idusuario' => $item['se_idusuario'],
			'se_estado' => $item['se_estado'],
			'se_pais' => $item['se_pais'],
			'se_code' => $item['se_code'],
			'se_ciudad' => $item['se_ciudad'],
			'se_detalle' => $item['se_detalle'],
			'se_fecha' => $item['se_fecha']
			 ); 

		$this->db->insert('app_sesiones', $data);
	}

	function get_by_id($id)
	{
		$this->db->select('*');
		$this->db->from('app_sesiones');
		$this->db->where('se_idse', $id);
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

		$count_q = $this->db->get('app_sesiones');
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
			$search_op  .=  ' se_idse like "%'.$search.'%" or ';
			$search_op  .=  ' se_idusuario like "%'.$search.'%" or ';
			$search_op  .=  ' se_estado like "%'.$search.'%" or ';
			$search_op  .=  ' se_pais like "%'.$search.'%" or ';
			$search_op  .=  ' se_code like "%'.$search.'%" or ';
			$search_op  .=  ' se_ciudad like "%'.$search.'%" or ';
			$search_op  .=  ' se_detalle like "%'.$search.'%" or ';
			$search_op  .=  ' se_fecha like "%'.$search.'%"  ';
			$search = $search_op;
		}

		$SQL = "SELECT * from app_sesiones $search ORDER BY $select_column  $order_column  LIMIT $start , $limit"; 
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
		$this->db->from('app_sesiones');
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
			'se_idusuario' => $item['se_idusuario'],
			'se_estado' => $item['se_estado'],
			'se_pais' => $item['se_pais'],
			'se_code' => $item['se_code'],
			'se_ciudad' => $item['se_ciudad'],
			'se_detalle' => $item['se_detalle'],
			'se_fecha' => $item['se_fecha']
			 ); 

		$this->db->where('se_idse', $id);
		$this->db->update('app_sesiones', $data);
	}

	function delete($id)
	{
		$this->db->where('se_idse', $id);
		$this->db->delete('app_sesiones');
	}
}