<?php
class Adm_resoluciones_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function create($item)
	{
		$data = array(
			're_numero' => $item['re_numero'],
			're_fecha' => $item['re_fecha'],
			're_concepto' => $item['re_concepto']
			 ); 

		 return $this->db->insert('adm_resoluciones', $data);
	}

	function get_by_id($id)
	{
		$this->db->select('*');
		$this->db->from('adm_resoluciones');
		$this->db->where('re_idre', $id);
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

		$count_q = $this->db->get('adm_resoluciones');
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
			$search_op  .=  ' re_idre like "%'.$search.'%" or ';
			$search_op  .=  ' re_numero like "%'.$search.'%" or ';
			$search_op  .=  ' re_fecha like "%'.$search.'%" or ';
			$search_op  .=  ' re_concepto like "%'.$search.'%"  ';
			$search = $search_op;
		}

		$SQL = "SELECT * from adm_resoluciones $search ORDER BY $select_column  $order_column  LIMIT $start , $limit"; 
		$result_set = $this->db->query($SQL);
		$total_set = $result_set->num_rows();
		$entries = null;

		$sql = '';

		$sql .= "<table id='app_roles_table'  class='table table-bordered kgrid tablesorter-materialize'>
			<thead>

			<tr>
				<th><a class='k-link' href='#'>#</a></th>
				<th><a class='k-link' href='#'> re_idre</a></th> 
				<th><a class='k-link' href='#'> re_numero</a></th> 
				<th><a class='k-link' href='#'> re_fecha</a></th> 
				<th><a class='k-link' href='#'> re_concepto</a></th> 
			</tr>

			</thead>";

		$con = $start;
		$sql .= '<tbody>';

		foreach ($result_set->result() as $row) {
				$con = $con + 1;
				$cls = ' class="'.($con%2 == 0 ? "x-grid-td" : "class_B").'"';
				$sql .= '<tr>';
				$sql .= '<td class="x-grid-cell-special" data="'.$row->re_idre.'" >' . $con . '</td>';
				$sql .= '<td '.$cls.' data="'.$row->re_idre.'" >' . $row->re_idre . '</td>';
				$sql .= '<td '.$cls.' data="'.$row->re_idre.'" >' . $row->re_numero . '</td>';
				$sql .= '<td '.$cls.' data="'.$row->re_idre.'" >' . $row->re_fecha . '</td>';
				$sql .= '<td '.$cls.' data="'.$row->re_idre.'" >' . $row->re_concepto . '</td>';
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
		$this->db->from('adm_resoluciones');
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
			're_numero' => $item['re_numero'],
			//'re_fecha' => $item['re_fecha'],
			're_concepto' => $item['re_concepto']
			 ); 

		$this->db->where('re_idre', $id);
		return $this->db->update('adm_resoluciones', $data);
	}

	function delete($id)
	{
		$this->db->where('re_idre', $id);
		 return $this->db->delete('adm_resoluciones');
	}
}