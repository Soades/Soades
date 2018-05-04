<?php
class App_usuarios_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function create($item)
	{
		$data = array(
			'us_idusuario' => $item['us_idusuario'],
			'us_roles' => $item['us_roles'],
			'us_usuario' => $item['us_usuario'],
			'us_clave' => $item['us_clave'],
			'us_active' => $item['us_active'],
			'us_conectado' => $item['us_conectado'],
			'us_ultimo_acceso' => $item['us_ultimo_acceso'],
			'us_tercero' => $item['us_tercero'],
			'us_email' => $item['us_email'],
			'remember_code' => $item['remember_code']
			 ); 

		$this->db->insert('app_usuarios', $data);
	}

	function get_by_id($id)
	{
		$this->db->select('*');
		$this->db->from('app_usuarios');
		$this->db->where('us_idusuario', $id);
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

		$count_q = $this->db->get('app_usuarios');
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
			$search_op  .=  ' us_idusuario like "%'.$search.'%" or ';
			$search_op  .=  ' us_roles like "%'.$search.'%" or ';
			$search_op  .=  ' us_usuario like "%'.$search.'%" or ';
			$search_op  .=  ' us_clave like "%'.$search.'%" or ';
			$search_op  .=  ' us_active like "%'.$search.'%" or ';
			$search_op  .=  ' us_conectado like "%'.$search.'%" or ';
			$search_op  .=  ' us_ultimo_acceso like "%'.$search.'%" or ';
			$search_op  .=  ' us_tercero like "%'.$search.'%" or ';
			$search_op  .=  ' us_email like "%'.$search.'%" or ';
			$search_op  .=  ' remember_code like "%'.$search.'%"  ';
			$search = $search_op;
		}

		$SQL = "SELECT * from app_usuarios $search ORDER BY $select_column  $order_column  LIMIT $start , $limit"; 
		$result_set = $this->db->query($SQL);
		$total_set = $result_set->num_rows();
		$entries = null;

		$sql = '';

		$sql .= "<table id='app_roles_table'  class='table table-bordered kgrid tablesorter-materialize'>
			<thead>

			<tr>
				<th><a class='k-link' href='#'>#</a></th>
				<th><a class='k-link' href='#'> us_idusuario</a></th> 
				<th><a class='k-link' href='#'> us_roles</a></th> 
				<th><a class='k-link' href='#'> us_usuario</a></th> 
				<th><a class='k-link' href='#'> us_clave</a></th> 
				<th><a class='k-link' href='#'> us_active</a></th> 
				<th><a class='k-link' href='#'> us_conectado</a></th> 
				<th><a class='k-link' href='#'> us_ultimo_acceso</a></th> 
				<th><a class='k-link' href='#'> us_tercero</a></th> 
				<th><a class='k-link' href='#'> us_email</a></th> 
				<th><a class='k-link' href='#'> remember_code</a></th> 
			</tr>

			</thead>";

		$con = $start;
		$sql .= '<tbody>';

		foreach ($result_set->result() as $row) {
				$con = $con + 1;
				$cls=' class="'.($con%2 == 0 ? "x-grid-td" : "class_B").'"';
				$sql .= '<tr>';
				$sql .= '<td class="x-grid-cell-special" data="'.$row->us_idusuario.'" >' . $con . '</td>';
				$sql .= '<td '.$cls.' data="'.$row->us_idusuario.'" >' . $row->us_idusuario . '</td>';
				$sql .= '<td '.$cls.' data="'.$row->us_idusuario.'" >' . $row->us_roles . '</td>';
				$sql .= '<td '.$cls.' data="'.$row->us_idusuario.'" >' . $row->us_usuario . '</td>';
				$sql .= '<td '.$cls.' data="'.$row->us_idusuario.'" >' . $row->us_clave . '</td>';
				$sql .= '<td '.$cls.' data="'.$row->us_idusuario.'" >' . $row->us_active . '</td>';
				$sql .= '<td '.$cls.' data="'.$row->us_idusuario.'" >' . $row->us_conectado . '</td>';
				$sql .= '<td '.$cls.' data="'.$row->us_idusuario.'" >' . $row->us_ultimo_acceso . '</td>';
				$sql .= '<td '.$cls.' data="'.$row->us_idusuario.'" >' . $row->us_tercero . '</td>';
				$sql .= '<td '.$cls.' data="'.$row->us_idusuario.'" >' . $row->us_email . '</td>';
				$sql .= '<td '.$cls.' data="'.$row->us_idusuario.'" >' . $row->remember_code . '</td>';
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
		$this->db->from('app_usuarios');
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
			'us_roles' => $item['us_roles'],
			'us_usuario' => $item['us_usuario'],
			'us_clave' => $item['us_clave'],
			'us_active' => $item['us_active'],
			'us_conectado' => $item['us_conectado'],
			'us_ultimo_acceso' => $item['us_ultimo_acceso'],
			'us_tercero' => $item['us_tercero'],
			'us_email' => $item['us_email'],
			'remember_code' => $item['remember_code']
			 ); 

		$this->db->where('us_idusuario', $id);
		$this->db->update('app_usuarios', $data);
	}

	function delete($id)
	{
		$this->db->where('us_idusuario', $id);
		$this->db->delete('app_usuarios');
	}
}