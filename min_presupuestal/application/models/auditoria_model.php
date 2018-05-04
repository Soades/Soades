<?php

/**
 * Clase que realiza las operaciones en BD de auditoria del sistema.
 *
 * @author  Jairo torres <ingtorres1986@gmail.com>  
 * @version 1.0 21/04/2013
 * @version 1.0 21/04/2013
 */
class Auditoria_model extends CI_Model {

    /**
     * Contiene el nombre de la tabla donde se almacena los datos.
     * @var $table string
     */
    private $table = NULL;

    public function __construct() {
        parent::__construct();
        $this->table = 'app_auditoria';
    }

    /**
     * Metodo que almacena en BD los datos contenidos en $param.
     *
     * @param   array   $param
     * @author  Jairo torres <ingtorres1986@gmail.com>  
     * @version 1.0 21/04/2013
     * @version 1.0 21/04/2013
     */
    function add($param) {
        $this->db->insert($this->table, $param);
        return ($this->db->affected_rows()) ? TRUE : FALSE;
    }

    public function Get_AuditDetails($modulo, $usuario) {

        $this->db->select("*");
        $this->db->from("app_auditoria");
        $this->db->where("au_modulo", $modulo);
        $this->db->where("au_usuario", $usuario);
        $this->db->join("app_modulos", 'mo_idmodulo = au_modulo', 'left');
        $this->db->join("app_usuarios", 'us_idusuario = au_usuario', 'left');
        $this->db->join("app_permisos", 'pe_idpermiso = au_permiso', 'left');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $newsList = array();
            foreach ($query->result() as $news) {
                if ($news->au_data != null)
                    return $news->au_data;
            }
        }
    }

    public function Get_Auditoria($modulo, $item) {

        $this->db->select("*");
        $this->db->from("app_auditoria");
        $this->db->where("au_modulo", $modulo);
        $this->db->where("au_item", $item);
        $this->db->join("app_modulos", 'mo_idmodulo = au_modulo', 'left');
        $this->db->join("app_usuarios", 'us_idusuario = au_usuario', 'left');
        $this->db->join("app_permisos", 'pe_idpermiso = au_permiso', 'left');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $newsList = array();
            foreach ($query->result() as $news) {
                $newsList[] = $news;
            }
            return($newsList);
        }
    }

    public function Get_Audit() {

        $this->db->select("*");
        $this->db->from("app_auditoria");
        $this->db->join("app_modulos", 'mo_idmodulo = au_modulo', 'left');
        $this->db->join("app_usuarios", 'us_idusuario = au_usuario', 'left');
        $this->db->join("app_permisos", 'pe_idpermiso = au_permiso', 'left');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $newsList = array();
            foreach ($query->result() as $news) {
                $newsList[] = $news;
            }
            return($newsList);
        }
    }

}
