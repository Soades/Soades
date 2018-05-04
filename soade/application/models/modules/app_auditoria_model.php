<?php
class App_auditoria_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function create($item)
	{
		$data = array(
			'au_modulo' => $item['au_modulo'],
			'au_usuario' => $item['au_usuario'],
			'au_data' => $item['au_data'],
			'au_permiso' => $item['au_permiso'],
			'au_ip' => $item['au_ip'],
			'au_so' => $item['au_so'],
			'au_navegador' => $item['au_navegador'],
			'au_version' => $item['au_version'],
			'au_resultado' => $item['au_resultado'],
			'au_item' => $item['au_item'],
			'au_url' => $item['au_url'],
			'au_fecha' => $item['au_fecha']
			 ); 

		$this->db->insert('app_auditoria', $data);
	}

	function get_by_id($id)
	{
		$this->db->select('*');
		$this->db->from('app_auditoria');
		$this->db->where('au_idauditoria', $id);
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

		$count_q = $this->db->get('app_auditoria');
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
			$search_op  .=  ' au_idauditoria like "%'.$search.'%" or ';
			$search_op  .=  ' au_modulo like "%'.$search.'%" or ';
			$search_op  .=  ' au_usuario like "%'.$search.'%" or ';
			$search_op  .=  ' au_data like "%'.$search.'%" or ';
			$search_op  .=  ' au_permiso like "%'.$search.'%" or ';
			$search_op  .=  ' au_ip like "%'.$search.'%" or ';
			$search_op  .=  ' au_so like "%'.$search.'%" or ';
			$search_op  .=  ' au_navegador like "%'.$search.'%" or ';
			$search_op  .=  ' au_version like "%'.$search.'%" or ';
			$search_op  .=  ' au_resultado like "%'.$search.'%" or ';
			$search_op  .=  ' au_item like "%'.$search.'%" or ';
			$search_op  .=  ' au_url like "%'.$search.'%" or ';
			$search_op  .=  ' au_fecha like "%'.$search.'%"  ';
			$search = $search_op;
		}

		$SQL = "SELECT * from app_auditoria $search ORDER BY $select_column  $order_column  LIMIT $start , $limit"; 
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
		$this->db->from('app_auditoria');
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
			'au_modulo' => $item['au_modulo'],
			'au_usuario' => $item['au_usuario'],
			'au_data' => $item['au_data'],
			'au_permiso' => $item['au_permiso'],
			'au_ip' => $item['au_ip'],
			'au_so' => $item['au_so'],
			'au_navegador' => $item['au_navegador'],
			'au_version' => $item['au_version'],
			'au_resultado' => $item['au_resultado'],
			'au_item' => $item['au_item'],
			'au_url' => $item['au_url'],
			'au_fecha' => $item['au_fecha']
			 ); 

		$this->db->where('au_idauditoria', $id);
		$this->db->update('app_auditoria', $data);
	}

	function delete($id)
	{
		$this->db->where('au_idauditoria', $id);
		$this->db->delete('app_auditoria');
	}
}