<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdmCuadreCaja_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function Get_Curdate(){
        // $query = $this->db->query("SELECT CURDATE()Fecha");
        if ($query->num_rows() > 0) {
            return($query->result());
        }
    }

    public function Get_MDiarioBy($fecha){
        $query = $this->db->query("SELECT M.md_codigo, DATE_FORMAT(M.md_fecha, '%d/%m/%Y')md_fecha, M.md_detalle,
                                    FORMAT(M.md_debe, 0)md_debe, M.md_haber,
                    (SELECT SUM(N.md_debe-N.md_haber) FROM adm_movimiento_diario N WHERE N.md_id_md <= M.md_id_md AND 
        DATE_FORMAT(md_fecha, '%Y-%m-%d') = '$fecha') Saldo
 FROM adm_movimiento_diario M WHERE DATE_FORMAT(md_fecha, '%Y-%m-%d') = '$fecha'");
        if ($query->num_rows() > 0) {
            $newsList = array();
            foreach ($query->result() as $news) {
                $newsList[] = $news;
            }
            return($newsList);
        }
    }

    public function create($records){
        $this->db->insert('adm_cierre_caja', $records);;
    }

}