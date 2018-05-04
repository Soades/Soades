<?php
class Adm_tipo_matriculas_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function create($item)
	{
		$data = array(
			'tm_nombre' => $item['tm_nombre'],
			'tm_orden' => $item['tm_orden']
			 ); 

		 return $this->db->insert('adm_tipo_matriculas', $data);
	}

	function get_by_id($id)
	{
		$this->db->select('*');
		$this->db->from('adm_tipo_matriculas');
		$this->db->where('tm_idtm', $id);
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

		$count_q = $this->db->get('adm_tipo_matriculas');
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
			$search_op  .=  ' tm_idtm like "%'.$search.'%" or ';
			$search_op  .=  ' tm_nombre like "%'.$search.'%" or ';
			$search_op  .=  ' tm_orden like "%'.$search.'%"  ';
			$search = $search_op;
		}

		$SQL = "SELECT * from adm_tipo_matriculas $search ORDER BY $select_column  $order_column  LIMIT $start , $limit"; 
		$result_set = $this->db->query($SQL);
		$total_set = $result_set->num_rows();
		$entries = null;

		$sql = '';

		$sql .= "<table id='app_roles_table'  class='table table-bordered kgrid tablesorter-materialize'>
			<thead>

			<tr>
				<th><a class='k-link' href='#'>#</a></th>
				<th><a class='k-link' href='#'> tm_idtm</a></th> 
				<th><a class='k-link' href='#'> tm_nombre</a></th> 
				<th><a class='k-link' href='#'> tm_orden</a></th> 
			</tr>

			</thead>";

		$con = $start;
		$sql .= '<tbody>';

		foreach ($result_set->result() as $row) {
				$con = $con + 1;
				$cls = ' class="'.($con%2 == 0 ? "x-grid-td" : "class_B").'"';
				$sql .= '<tr>';
				$sql .= '<td class="x-grid-cell-special" data="'.$row->tm_idtm.'" >' . $con . '</td>';
				$sql .= '<td '.$cls.' data="'.$row->tm_idtm.'" >' . $row->tm_idtm . '</td>';
				$sql .= '<td '.$cls.' data="'.$row->tm_idtm.'" >' . $row->tm_nombre . '</td>';
				$sql .= '<td '.$cls.' data="'.$row->tm_idtm.'" >' . $row->tm_orden . '</td>';
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
		$this->db->from('adm_tipo_matriculas');
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
			'tm_nombre' => $item['tm_nombre'],
			'tm_orden' => $item['tm_orden']
			 ); 

		$this->db->where('tm_idtm', $id);
		return $this->db->update('adm_tipo_matriculas', $data);
	}

	function delete($id)
	{
		$this->db->where('tm_idtm', $id);
		 return $this->db->delete('adm_tipo_matriculas');
	}
}