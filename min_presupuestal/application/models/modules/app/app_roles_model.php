<?php

class app_roles_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function create($data){
        return $this->db->insert('app_roles', $data);
    }
    
    public function ExisteCodigo($records) {
        $this->db->where("re_codigo", $records["re_codigo"]);
        $query = $this->db->get("adm_referencias");
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function get_by_id($id) {
        $this->db->select('*');
        $this->db->from('app_roles');
        $this->db->where('ro_idroles', $id);
        $query = $this->db->get();

        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->row();
        }
    }

    function get_all_paginate1($vars) {

        $page = $vars['page'];
        $limit = $vars['item_por_page'];
        $select_column = $vars['select_column'];
        $order_column = $vars['order_column'];
        $search = $vars['search_column'];

        $start = 0;

        $count_q = $this->db->get('app_roles');
        $count = $count_q->num_rows();

        if ($count > 0) {
            $total_pages = ceil($count / $limit);
        } else {
            $total_pages = 0;
        }

        if ($page > $total_pages) {
            $page = $total_pages;
            $start = $limit * $page - $limit;
        }

        if ($search != '') {
            $start = 0;
            $search_op = ' WHERE ';
            $search_op .= ' ro_idroles like "%' . $search . '%" or ';
            $search_op .= ' ro_nombre like "%' . $search . '%" or ';
            $search_op .= ' ro_descripcion like "%' . $search . '%" or ';
            $search_op .= ' ro_estado like "%' . $search . '%"  ';
            $search = $search_op;
        }

        $SQL = "SELECT * from app_roles $search ORDER BY $select_column  $order_column  LIMIT $start , $limit";
        $result_set = $this->db->query($SQL);
        $total_set = $result_set->num_rows();
        $entries = null;

        foreach ($result_set->result() as $row) {
            $entries[] = $row;
        }


        $data = array(
            'page' => $page,
            'limit' => $total_set,
            'total_pages' => $total_pages,
            'total_all' => $count,
            'rows' => $entries
        );

        return array($data);
    }

    function get_all_paginate($vars) {

        $page = $vars['page']; /* Paginas */
        $limit = $vars['item_por_page']; /* item por paginas */
        $select_column = $vars['select_column'];
        $order_column = $vars['order_column'];
        $search = $vars['search_column'];

        if ($page != '' || $page != 0) {
            $start = ((int) $page - 1) * $limit;
        } else {
            $start = 0;
        }

        $count_q = $this->db->get('app_roles');
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
            $search_op .= ' ro_idroles like "%' . $search . '%" or ';
            $search_op .= ' ro_nombre like "%' . $search . '%" or ';
            $search_op .= ' ro_descripcion like "%' . $search . '%" or ';
            $search_op .= ' ro_estado like "%' . $search . '%"  ';
            $search = $search_op;
        }

        $SQL = "SELECT * from app_roles $search ORDER BY $select_column  $order_column  LIMIT $start , $limit";
        $result_set = $this->db->query($SQL);
        $total_set = $result_set->num_rows();
        $entries = null;
        $sql = '';

        $sql .= "<table id='app_roles_table' cellpadding='0' cellspacing='0'  class='table table-bordered kgrid tablesorter-materialize'>

            <thead>
                <tr>
                    <th><a class='k-link' href='#'>#</a></th>
                    <th><a class='k-link' href='#'>Nombre</a></th>
                    <th><a class='k-link' href='#'>Descripcion</a></th>
                    <th><a class='k-link' href='#'>Estado</a></th>                  
                </tr>
            </thead>";

        $con = $start;
        $sql .= '<tbody>';
        foreach ($result_set->result() as $row) {
            // $entries[] = $row;
            $con = $con + 1;
            $cls = 'class="' . ($con % 2 == 0 ? "x-grid-td" : "class_B") . '"';
            $sql .= '<tr  >';
            $sql .= '<td class="x-grid-cell-special" data="' . $row->ro_idroles . '" >' . $con . '</td>';
            $sql .= '<td ' . $cls . ' >' . $row->ro_nombre . '</td>';
            $sql .= '<td ' . $cls . ' >' . $row->ro_descripcion . '</td>';
            $sql .= '<td ' . $cls . ' ><input disabled ' . ($row->ro_estado == 1 ? "checked" : "") . ' type="checkbox" id="ro_estado" name="ro_estado" ></td>';

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
        $this->db->from('app_roles');
        $query = $this->db->get();

        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->result_array();
        }
    }

    function update($id, $data) {       
        $this->db->where('ro_idroles', $id);
        return $this->db->update('app_roles', $data);
    }

    function delete($id) {
        $this->db->where('ro_idroles', $id);
        $this->db->delete('app_roles');
    }

}
