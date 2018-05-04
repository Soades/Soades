<?php

class Adm_anio_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function create($item) {
        $data = array(
            'an_nombre' => $item['an_nombre'],
            'an_descripcion' => $item['an_descripcion'],
            'an_fecha_creacion' => $item['an_fecha_creacion']
        );

        return $this->db->insert('adm_anio', $data);
    }

    function get_by_id($id) {
        $this->db->select('*');
        $this->db->from('adm_anio');
        $this->db->where('an_idanio', $id);
        $query = $this->db->get();

        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->row();
        }
    }

    function get_all_paginate($vars) {

        $page = $vars['page'];
        $limit = $vars['item_por_page'];
        $select_column = $vars['select_column'];
        $order_column = $vars['order_column'];
        $search = $vars['search_column'];

        if ($page != '' || $page != 0) {
            $start = ((int) $page - 1) * $limit;
        } else {
            $start = 0;
        }

        $count_q = $this->db->get('adm_anio');
        $count = $count_q->num_rows();

        if ($count > 0) {
            $total_pages = ceil($count / $limit);
        } else {
            $total_pages = 0;
        }

        if ($page > $total_pages) {
            $start = 0;
            $page = 1;
        }

        if ($search != '') {
            $start = 0;
            $search_op = ' WHERE ';
            $search_op .= ' an_idanio like "%' . $search . '%" or ';
            $search_op .= ' an_nombre like "%' . $search . '%" or ';
            $search_op .= ' an_descripcion like "%' . $search . '%" or ';
            $search_op .= ' an_fecha_creacion like "%' . $search . '%"  ';
            $search = $search_op;
        }

        $SQL = "SELECT * from adm_anio $search ORDER BY $select_column  $order_column  LIMIT $start , $limit";
        $result_set = $this->db->query($SQL);
        $total_set = $result_set->num_rows();
        $entries = null;

        $sql = '';

        $sql .= "<table id='app_roles_table'  class='table table-bordered kgrid tablesorter-materialize'>
			<thead>

			<tr>
				<th><a class='k-link' href='#'>#</a></th>
				<th><a class='k-link' href='#'> an_idanio</a></th> 
				<th><a class='k-link' href='#'> an_nombre</a></th> 
				<th><a class='k-link' href='#'> an_descripcion</a></th> 
				<th><a class='k-link' href='#'> an_fecha_creacion</a></th> 
			</tr>

			</thead>";

        $con = $start;
        $sql .= '<tbody>';

        foreach ($result_set->result() as $row) {
            $con = $con + 1;
            $cls = ' class="' . ($con % 2 == 0 ? "x-grid-td" : "class_B") . '"';
            $sql .= '<tr>';
            $sql .= '<td class="x-grid-cell-special" data="' . $row->an_idanio . '" >' . $con . '</td>';
            $sql .= '<td ' . $cls . ' data="' . $row->an_idanio . '" >' . $row->an_idanio . '</td>';
            $sql .= '<td ' . $cls . ' data="' . $row->an_idanio . '" >' . $row->an_nombre . '</td>';
            $sql .= '<td ' . $cls . ' data="' . $row->an_idanio . '" >' . $row->an_descripcion . '</td>';
            $sql .= '<td ' . $cls . ' data="' . $row->an_idanio . '" >' . $row->an_fecha_creacion . '</td>';
            $sql .= '<tr>';
        }


        $sql .= '</tbody>';
        $sql .= '</table>';

        $data = array(
            'page' => $page = (int) $page <= 0 ? 1 : (int) $page,
            'limit' => $total_set,
            'total_pages' => $total_pages,
            'total_all' => $count,
            'rows' => $sql
        );

        return array($data);
    }

    function get_all() {
        $this->db->select('*');
        $this->db->from('adm_anio');
        $query = $this->db->get();

        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->result_array();
        }
    }
    
    
    public function Existe($data) {
        
        $this->db->where('an_nombre',$data['an_nombre']);
               
        $query = $this->db->get("adm_anio");
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    

    function update($id, $data) {
        $this->db->where('an_idanio', $id);
        return $this->db->update('adm_anio', $data);
    }

    function delete($id) {
        $this->db->where('an_idanio', $id);
        return $this->db->delete('adm_anio');
    }

}
