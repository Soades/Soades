<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ParGrupoAsignatura_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function Get_GrupoAsignatura() {
        $this->db->select('gs_id_gs, as_nombre, gr_nombre');
        $this->db->from('par_grupo_asignatura, par_grupos, par_asignaturas, par_estado');
        $this->db->where('gs_id_grupo = gr_id_grupo');
        $this->db->where('gs_id_asignatura = as_id_asignatura');
        $this->db->where('gr_id_estado = es_id_estado');
        $this->db->order_by('gs_id_gs', 'ASC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $newsList = array();
            foreach ($query->result() as $news) {
                $newsList[] = $news;
            }
            return($newsList);
        }
    }

    public function Get_GrupoAsignaturaBy($id) {
        $this->db->select('gs_id_gs, gs_id_asignatura, gs_id_grupo');
        $this->db->from('par_grupo_asignatura, par_grupos, par_asignaturas, par_estado');
        $this->db->where('gs_id_grupo = gr_id_grupo');
        $this->db->where('gs_id_asignatura = as_id_asignatura');
        $this->db->where('gr_id_estado = es_id_estado');
        $this->db->where('gs_id_gs', $id);
        $this->db->order_by("gs_id_gs", "ASC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $newsList = array();
            foreach ($query->result() as $news) {
                $newsList[] = $news;
            }
            return($newsList[0]);
        }
    }
    
    public function create($records) {
        $this->db->insert('par_grupo_asignatura', $records);
    }

    public function update($records) {
        $this->db->where('gs_id_gs', $records['gs_id_gs']);
        return $this->db->update('par_grupo_asignatura', $records);
    }
}
