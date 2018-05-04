<?php
class Adm_jornada_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function create($item)
	{
		$data = array(
			'jo_nombre' => $item['jo_nombre'],
			'jo_orden' => $item['jo_orden']
			 ); 

		 return $this->db->insert('adm_jornada', $data);
	}

	function get_by_id($id)
	{
		$this->db->select('*');
		$this->db->from('adm_jornada');
		$this->db->where('jo_idjornada', $id);
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

		$count_q = $this->db->get('adm_jornada');
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
			$search_op  .=  ' jo_idjornada like "%'.$search.'%" or ';
			$search_op  .=  ' jo_nombre like "%'.$search.'%" or ';
			$search_op  .=  ' jo_orden like "%'.$search.'%"  ';
			$search = $search_op;
		}

		$SQL = "SELECT * from adm_jornada $search ORDER BY $select_column  $order_column  LIMIT $start , $limit"; 
		$result_set = $this->db->query($SQL);
		$total_set = $result_set->num_rows();
		$entries = null;

		$sql = '';

		$sql .= "<table id='app_roles_table'  class='table table-bordered kgrid tablesorter-materialize'>
			<thead>

			<tr>
				<th><a class='k-link' href='#'>#</a></th>
				<th><a class='k-link' href='#'> jo_idjornada</a></th> 
				<th><a class='k-link' href='#'> jo_nombre</a></th> 
				<th><a class='k-link' href='#'> jo_orden</a></th> 
			</tr>

			</thead>";

		$con = $start;
		$sql .= '<tbody>';

		foreach ($result_set->result() as $row) {
				$con = $con + 1;
				$cls = ' class="'.($con%2 == 0 ? "x-grid-td" : "class_B").'"';
				$sql .= '<tr>';
				$sql .= '<td class="x-grid-cell-special" data="'.$row->jo_idjornada.'" >' . $con . '</td>';
				$sql .= '<td '.$cls.' data="'.$row->jo_idjornada.'" >' . $row->jo_idjornada . '</td>';
				$sql .= '<td '.$cls.' data="'.$row->jo_idjornada.'" >' . $row->jo_nombre . '</td>';
				$sql .= '<td '.$cls.' data="'.$row->jo_idjornada.'" >' . $row->jo_orden . '</td>';
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
		$this->db->from('adm_jornada');
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
			'jo_nombre' => $item['jo_nombre'],
			'jo_orden' => $item['jo_orden']
			 ); 

		$this->db->where('jo_idjornada', $id);
		return $this->db->update('adm_jornada', $data);
	}

	function delete($id)
	{
		$this->db->where('jo_idjornada', $id);
		 return $this->db->delete('adm_jornada');
	}
}