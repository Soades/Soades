<?php
class Par_cuentas_bancarias_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function create($item)
	{
		$data = array(
			'cb_idbanco' => $item['cb_idbanco'],
			'cb_idinstitucion' => $item['cb_idinstitucion'],
			'cb_nrocuenta' => $item['cb_nrocuenta'],
			'cb_tipo' => $item['cb_tipo']
			 ); 

		$this->db->insert('par_cuentas_bancarias', $data);
	}

	function get_by_id($id)
	{
		$this->db->select('*');
		$this->db->from('par_cuentas_bancarias');
		$this->db->where('cb_idcb', $id);
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

		$count_q = $this->db->get('par_cuentas_bancarias');
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
			$search_op  .=  ' cb_idcb like "%'.$search.'%" or ';
			$search_op  .=  ' cb_idbanco like "%'.$search.'%" or ';
			$search_op  .=  ' cb_idinstitucion like "%'.$search.'%" or ';
			$search_op  .=  ' cb_nrocuenta like "%'.$search.'%" or ';
			$search_op  .=  ' cb_tipo like "%'.$search.'%"  ';
			$search = $search_op;
		}

		$SQL = "SELECT * from par_cuentas_bancarias $search ORDER BY $select_column  $order_column  LIMIT $start , $limit"; 
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
		$this->db->from('par_cuentas_bancarias');
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
			'cb_idbanco' => $item['cb_idbanco'],
			'cb_idinstitucion' => $item['cb_idinstitucion'],
			'cb_nrocuenta' => $item['cb_nrocuenta'],
			'cb_tipo' => $item['cb_tipo']
			 ); 

		$this->db->where('cb_idcb', $id);
		$this->db->update('par_cuentas_bancarias', $data);
	}

	function delete($id)
	{
		$this->db->where('cb_idcb', $id);
		$this->db->delete('par_cuentas_bancarias');
	}
}