<?php

class Par_paises_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function create($item) {
     

        return $this->db->insert('par_paises', $item);
    }
    
    
    public function existe($id) {        
        $this->db->select('*');
        $this->db->from('par_paises');
        $this->db->where('pa_idpais', $id);
        $query = $this->db->get();
        return $query->num_rows() > 0;
    }

    function get_by_id($id) {
        $this->db->select('*');
        $this->db->from('par_paises');
        $this->db->where('pa_idpais', $id);
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

        $count_q = $this->db->get('par_paises');
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
            $search_op .= ' pa_idpais like "%' . $search . '%" or ';
            $search_op .= ' pa_nombre like "%' . $search . '%" or ';
            $search_op .= ' pa_sync like "%' . $search . '%"  ';
            $search = $search_op;
        }

        $SQL = "SELECT * from par_paises $search ORDER BY $select_column  $order_column  LIMIT $start , $limit";
        $result_set = $this->db->query($SQL);
        $total_set = $result_set->num_rows();
        $entries = null;

        $sql = '';

        $sql .= "<table id='app_roles_table'  class='table table-bordered kgrid tablesorter-materialize'>
			<thead>

			<tr>
				<th><a class='k-link' href='#'>#</a></th>
				<th><a class='k-link' href='#'> pa_idpais</a></th> 
				<th><a class='k-link' href='#'> pa_nombre</a></th> 
				<th><a class='k-link' href='#'> pa_sync</a></th> 
			</tr>

			</thead>";

        $con = $start;
        $sql .= '<tbody>';

        foreach ($result_set->result() as $row) {
            $con = $con + 1;
            $cls = ' class="' . ($con % 2 == 0 ? "x-grid-td" : "class_B") . '"';
            $sql .= '<tr>';
            $sql .= '<td class="x-grid-cell-special" data="' . $row->pa_idpais . '" >' . $con . '</td>';
            $sql .= '<td ' . $cls . ' data="' . $row->pa_idpais . '" >' . $row->pa_idpais . '</td>';
            $sql .= '<td ' . $cls . ' data="' . $row->pa_idpais . '" >' . $row->pa_nombre . '</td>';
            $sql .= '<td ' . $cls . ' data="' . $row->pa_idpais . '" >' . $row->pa_sync . '</td>';
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
        $this->db->from('par_paises');
        $query = $this->db->get();

        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->result_array();
        }
    }

    function update($id, $item) {
  
        $this->db->where('pa_idpais', $id);
        return $this->db->update('par_paises', $item);
    }

    function delete($id) {
        $this->db->where('pa_idpais', $id);
        return $this->db->delete('par_paises');
    }

}
