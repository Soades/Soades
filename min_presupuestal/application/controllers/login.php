<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {

    public function __construct() {
        parent::__construct();        

        $this->load->model('sesiones_model');
        $this->load->model('login_model');
        $this->load->library(array('ion_auth', 'form_validation'));
        $this->load->helper(array('url', 'language'));
        $this->config->load('constantes/ion_auth', TRUE);
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'constantes/ion_auth'),
                $this->config->item('error_end_delimiter', 'constantes/ion_auth'));
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
        $newdata = array(
            'us_usuario' => '',
        );

        $ip = $_SERVER['REMOTE_ADDR'];
        //$details = $this->DetectGeo($ip);

        $add_sesiones = array(
            'se_idusuario' => $this->session->userdata('us_id_usuario'),
            'se_estado' => 2,
            'se_detalle' => 'salida',
            'se_pais' => 1,
            'se_ciudad' => 1,
            'se_fecha' => date("Y-m-d H:i:s"),
        );

        $this->sesiones_model->create($add_sesiones);
        $this->session->unset_userdata($newdata);
        $this->session->sess_destroy();
        $this->index();
    }

    public function Auth1() {
        $username = (isset($_REQUEST['username'])) ? $_REQUEST['username'] : '';
        $password = (isset($_REQUEST['password'])) ? $_REQUEST['password'] : '';
        $remember = (isset($_REQUEST['remember'])) ? $_REQUEST['remember'] : '';

        $session = $this->login_model->login($username, $password, $remember);

        if ($session["session"]) {
            $mensaje = array("type" => "success", "content" => "Acceso exitoso !", "title" => "Registro");
        } else {
            $mensaje = array("type" => "error", "content" => $session["message"], "title" => "Registro");
        }


        /*
          if($remember){
          $this->session->set_userdata('remember_me', true);
          }

          //echo $this->config->item('track_login_attempts', 'ion_auth');

          $mensaje = "";

          if (empty($username)) {
          return FALSE;
          }

          $user = $this->login_model->get_user_by_username($username);

          if ($user != FALSE) {

          if (md5($password) == $user->us_clave) {
          // Inactive
          if (!$user->us_active) {
          $mensaje =  array("type" => "error", "content" =>  "Lo sentimos , clave incorrecta !", "title" => "Registro");
          } else {

          $ip = $_SERVER['REMOTE_ADDR'];

          $add_sesiones = array(
          'se_idusuario' => $user->us_idusuario,
          'se_fecha' => date("Y-m-d H:i:s"),
          );

          $this->login_model->update(
          array(
          "us_idusuario" => $user->us_idusuario,
          "us_conectado" => 1
          )
          );

          $add_sesiones['se_estado'] = 1;
          $add_sesiones['se_pais'] = 1; //$details->geobytescountry;
          $add_sesiones['se_code'] = 1;//strtolower($details->geobytesinternet);
          $add_sesiones['se_ciudad'] = 1;//$details->geobytescity;
          $add_sesiones['se_detalle'] = 'acceso exitoso';

          $this->session->set_userdata($user);
          $this->session->set_userdata($add_sesiones);
          $this->sesiones_model->create($add_sesiones);
          //$this->config->item('lockout_time', 'constantes/ion_auth')
          //$this->config->item('track_login_attempts', 'ion_auth')
          $mensaje =  array("type" => "success", "content" => "Acceso exitoso !" , "title" => "Registro");
          }
          } else {
          $mensaje =  array("type" => "error", "content" =>  "Lo sentimos , clave incorrecta !", "title" => "Registro");
          }
          } else {
          $mensaje =  array("type" => "error", "content" =>  "Lo sentimos , el usuario no existe!", "title" => "Registro");
          } */

        // the user is not logging in so display the login page
        // set the flash data error message if there is one
        //  $this->data['message'] = "f";			
        echo json_encode($mensaje);
    }

    public function _render_page($view, $data = null, $returnhtml = false) {//I think this makes more sense
        $this->viewdata = (empty($data)) ? $this->data : $data;
        $view_html = $this->load->view($view, $this->viewdata, $returnhtml);
        if ($returnhtml)
            return $view_html; //This will return html on 3rd argument being true
    }

}
