<?php

class Adm_institucion_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function create($item) {
        $data = array(
            'in_idinstitucion' => $item['in_idinstitucion'],
            'in_nombre' => $item['in_nombre'],
            'in_fecha' => $item['in_fecha'],
            'in_codigo' => $item['in_codigo'],
            'in_estado' => $item['in_estado'],
            'in_idarchivo' => $item['in_idarchivo']
        );

        $this->db->insert('adm_institucion', $data);
    }

    function get_by_id($id) {
        $this->db->select('*');
        $this->db->from('adm_institucion');
        $this->db->where('in_idinstitucion', $id);
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

        $start = 0;

        $count_q = $this->db->get('adm_institucion');
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
            $search_op .= ' in_idinstitucion like "%' . $search . '%" or ';
            $search_op .= ' in_nombre like "%' . $search . '%" or ';
            $search_op .= ' in_fecha like "%' . $search . '%" or ';
            $search_op .= ' in_codigo like "%' . $search . '%" or ';
            $search_op .= ' in_estado like "%' . $search . '%" or ';
            $search_op .= ' in_idarchivo like "%' . $search . '%"  ';
            $search = $search_op;
        }

        $SQL = "SELECT * from adm_institucion $search ORDER BY $select_column  $order_column  LIMIT $start , $limit";
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

    function get_all() {
        $this->db->select('*');
        $this->db->from('adm_institucion');
        $query = $this->db->get();
        $mysql_data = array();
        if ($query->num_rows() < 1) {
            return null;
        } else {
         
            foreach ($query->result() as $row) {
                $functions  = '<div class="function_buttons"><ul class="demo-btns" >';
                $functions .= '<li class="function_edit"><a  class="btn btn-primary btn-circle" data-id="'.$row->in_idinstitucion.'" data-name="'.$row->in_idinstitucion.'"><i class="fa fa-pencil"></i></a></li>';
                $functions .= '<li class="function_delete"><a class="btn btn-danger btn-circle" data-id="'.$row->in_idinstitucion.'" data-name="'.$row->in_idinstitucion.'"><i class="fa fa-trash-o"></i></a></li>';
                $functions .= '</ul></div>';
                $mysql_data[] = array(
                  "in_idinstitucion"  => $row->in_idinstitucion,
                  "in_nombre"  => $row->in_nombre,
                  "in_fecha"    => $row->in_fecha,
                  "in_codigo"    => $row->in_codigo,
                  "in_estado"    => $row->in_estado,
                  "functions"     => $functions
                );
           }
           return $mysql_data;
        }
    }
    
    
        

    function update($id, $item) {
        $data = array(
            'in_nombre' => $item['in_nombre'],
            'in_fecha' => $item['in_fecha'],
            'in_codigo' => $item['in_codigo'],
            'in_estado' => $item['in_estado'],
            'in_idarchivo' => $item['in_idarchivo']
        );

        $this->db->where('in_idinstitucion', $id);
        $this->db->update('adm_institucion', $data);
    }

    function delete($id) {
        $this->db->where('in_idinstitucion', $id);
        $this->db->delete('adm_institucion');
    }

}
