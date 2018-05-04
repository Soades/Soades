<?php
class Adm_ingresos_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function create($item)
	{
		$data = array(
			'in_nombre' => $item['in_nombre']
			 ); 

		 return $this->db->insert('adm_ingresos', $data);
	}

	function get_by_id($id)
	{
		$this->db->select('*');
		$this->db->from('adm_ingresos');
		$this->db->where('in_idin', $id);
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

		$count_q = $this->db->get('adm_ingresos');
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
			$search_op  .=  ' in_idin like "%'.$search.'%" or ';
			$search_op  .=  ' in_nombre like "%'.$search.'%"  ';
			$search = $search_op;
		}

		$SQL = "SELECT * from adm_ingresos $search ORDER BY $select_column  $order_column  LIMIT $start , $limit"; 
		$result_set = $this->db->query($SQL);
		$total_set = $result_set->num_rows();
		$entries = null;

		$sql = '';

		$sql .= "<table id='app_roles_table'  class='table table-bordered kgrid tablesorter-materialize'>
			<thead>

			<tr>
				<th><a class='k-link' href='#'>#</a></th>
				<th><a class='k-link' href='#'> in_idin</a></th> 
				<th><a class='k-link' href='#'> in_nombre</a></th> 
			</tr>

			</thead>";

		$con = $start;
		$sql .= '<tbody>';

		foreach ($result_set->result() as $row) {
				$con = $con + 1;
				$cls = ' class="'.($con%2 == 0 ? "x-grid-td" : "class_B").'"';
				$sql .= '<tr>';
				$sql .= '<td class="x-grid-cell-special" data="'.$row->in_idin.'" >' . $con . '</td>';
				$sql .= '<td '.$cls.' data="'.$row->in_idin.'" >' . $row->in_idin . '</td>';
				$sql .= '<td '.$cls.' data="'.$row->in_idin.'" >' . $row->in_nombre . '</td>';
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
		$this->db->from('adm_ingresos');
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
			'in_nombre' => $item['in_nombre']
			 ); 

		$this->db->where('in_idin', $id);
		return $this->db->update('adm_ingresos', $data);
	}

	function delete($id)
	{
		$this->db->where('in_idin', $id);
		 return $this->db->delete('adm_ingresos');
	}
}