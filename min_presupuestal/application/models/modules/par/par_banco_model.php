<?php
class Par_banco_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function create($item)
	{
		$data = array(
			'ba_codigo' => $item['ba_codigo'],
			'ba_nombre' => $item['ba_nombre']
			 ); 

		 return $this->db->insert('par_banco', $data);
	}

	function get_by_id($id)
	{
		$this->db->select('*');
		$this->db->from('par_banco');
		$this->db->where('ba_idbanco', $id);
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

		if($page != '' || $page != 0) { 
			$start = ((int)$page - 1) * $limit;
		} else {
			$start = 0;
		}

		$count_q = $this->db->get('par_banco');
		$count = $count_q->num_rows();

		if($count > 0 ) {
			$total_pages = ceil($count/$limit);
		} else {
			$total_pages = 0;
		}

		if($page > $total_pages) {
			$start = 0;
			$page = 1;
		}

		if($search != ''){
			$start = 0;
			$search_op  =  ' WHERE ';
			$search_op  .=  ' ba_idbanco like "%'.$search.'%" or ';
			$search_op  .=  ' ba_codigo like "%'.$search.'%" or ';
			$search_op  .=  ' ba_nombre like "%'.$search.'%"  ';
			$search = $search_op;
		}

		$SQL = "SELECT * from par_banco $search ORDER BY $select_column  $order_column  LIMIT $start , $limit"; 
		$result_set = $this->db->query($SQL);
		$total_set = $result_set->num_rows();
		$entries = null;

		$sql = '';

		$sql .= "<table id='app_roles_table'  class='table table-bordered kgrid tablesorter-materialize'>
			<thead>

			<tr>
				<th><a class='k-link' href='#'>#</a></th>
				<th><a class='k-link' href='#'> ba_idbanco</a></th> 
				<th><a class='k-link' href='#'> ba_codigo</a></th> 
				<th><a class='k-link' href='#'> ba_nombre</a></th> 
			</tr>

			</thead>";

		$con = $start;
		$sql .= '<tbody>';

		foreach ($result_set->result() as $row) {
				$con = $con + 1;
				$cls = ' class="'.($con%2 == 0 ? "x-grid-td" : "class_B").'"';
				$sql .= '<tr>';
				$sql .= '<td class="x-grid-cell-special" data="'.$row->ba_idbanco.'" >' . $con . '</td>';
				$sql .= '<td '.$cls.' data="'.$row->ba_idbanco.'" >' . $row->ba_idbanco . '</td>';
				$sql .= '<td '.$cls.' data="'.$row->ba_idbanco.'" >' . $row->ba_codigo . '</td>';
				$sql .= '<td '.$cls.' data="'.$row->ba_idbanco.'" >' . $row->ba_nombre . '</td>';
				$sql .= '<tr>';
		}


			$sql .= '</tbody>';
			$sql .= '</table>';
	
		$data = array(
			'page' => $page = (int)$page <= 0 ? 1 : (int) $page,	
			'limit' => $total_set,	
			'total_pages' => $total_pages,	
			'total_all' => $count,	
			'rows' => $sql	
		);
	
		return array($data);
	
	}

	function get_all()
	{
		$this->db->select('*');
		$this->db->from('par_banco');
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
			'ba_codigo' => $item['ba_codigo'],
			'ba_nombre' => $item['ba_nombre']
			 ); 

		$this->db->where('ba_idbanco', $id);
		return $this->db->update('par_banco', $data);
	}

	function delete($id)
	{
		$this->db->where('ba_idbanco', $id);
		 return $this->db->delete('par_banco');
	}
}