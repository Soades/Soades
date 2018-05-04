<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('sesiones_model');
        $this->load->model('login_model');
        $this->load->helper(array('url', 'language'));
        $this->load->model('Desktop_model');
    }

    public function Auth() {

        $username = (isset($_REQUEST['username'])) ? $_REQUEST['username'] : '';
        $password = (isset($_REQUEST['password'])) ? $_REQUEST['password'] : '';
        $codigo = (isset($_REQUEST['codigo'])) ? $_REQUEST['codigo'] : '';
        $anio = (isset($_REQUEST['anio'])) ? $_REQUEST['anio'] : '';
        $remember = (isset($_REQUEST['remember'])) ? $_REQUEST['remember'] : '';

        $session = $this->login_model->login($anio, $codigo, $username, $password, $remember);

        if ($session["session"]) {
            $mensaje = array("type" => "success", "content" => "Acceso exitoso !", "title" => "Registro");
        } else {
            $mensaje = array("type" => "error", "content" => $session["message"], "title" => "Registro");
        }

        echo json_encode($mensaje);
    }

    public function index() {

        if ($this->logged_in()) {
            $this->inicio();
        } else {
            $this->load->view('login');
        }
    }

    public function logged_in() {
        return (bool) $this->session->userdata('us_usuario');
    }

    public function inicio() {
        $newsList = array();
        $data = $this->Desktop_model->Get_menu();
        $newsList["menu"] = $data;
        $this->load->view('content/header');             // header
        $this->load->view('content/content', $newsList); // view
        $this->load->view('content/footer');
    }

    public function logout() {


        if ($this->logged_in()) {
            $add_sesiones = array(
                'se_idusuario' => $this->session->userdata('us_idusuario'),
                'se_estado' => 2,
                'se_detalle' => 'salida',
                'se_pais' => 1,
                'se_ciudad' => 1,
                'se_fecha' => date("Y-m-d H:i:s"),
            );
            $this->sesiones_model->create($add_sesiones);
        }

        $this->session->unset_userdata('us_usuario', FALSE);
        $this->session->sess_destroy();
        $this->index();
    }

    public function _render_page($view, $data = null, $returnhtml = false) {//I think this makes more sense
        $this->viewdata = (empty($data)) ? $this->data : $data;
        $view_html = $this->load->view($view, $this->viewdata, $returnhtml);
        if ($returnhtml)
            return $view_html; //This will return html on 3rd argument being true
    }

}
