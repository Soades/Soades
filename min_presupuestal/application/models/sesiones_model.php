<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * Hace parte de la base de datos conexion
 * para optimizar la recurrencia a las bases de 
 * datos
 * sessiones de usuarios 
 *  */

class Sesiones_model extends CI_Model {
   
    public function __construct() {
        parent::__construct();
    }

    public function create($records) {
        $this->db->insert("app_sesiones", $records);
    }

}
