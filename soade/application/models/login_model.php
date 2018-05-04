<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login_model extends CI_Model {

    /**
     * Holds an array of tables used
     *
     * @var array
     * */
    public $tables = array();

    /**
     * Identity
     *
     * @var string
     * */
    public $identity;
    public $CI;
    
    
    private static $lenguaje;
    
  
    
    

    public function __construct() {
        parent::__construct();
        $this->CI = & get_instance();
        $this->CI->lang->load('login','spanish');
        self::$lenguaje = $this->CI->lang;
        
        $this->load->config('constantes/ion_auth', TRUE);
        $this->load->dbforge();
        $this->tables = $this->config->item('tables', 'constantes/ion_auth');
        //initialize data
        $this->identity_column = $this->config->item('identity', 'constantes/ion_auth');
    }

    protected function makeTimeFromSeconds($total_seconds) {
        $horas = floor($total_seconds / 3600);
        $minutes = (($total_seconds / 60) % 60);
        $seconds = ($total_seconds % 60);

        $time['horas'] = str_pad($horas, 2, "0", STR_PAD_LEFT);
        $time['minutes'] = str_pad($minutes, 2, "0", STR_PAD_LEFT);
        $time['seconds'] = str_pad($seconds, 2, "0", STR_PAD_LEFT);

        $time = implode(':', $time);

        return $time;
    }

    public function existe_anio($anio) {
        $query = $this->db->select('*')
                ->where("an_nombre", $anio)
                ->limit(1)
                ->order_by('an_idanio', 'desc')
                ->get("adm_anio");
        return $query->num_rows() < 0 ? false : $query->row();
    }

    public function existe_institucion($codigo) {
        $query = $this->db->select('*')
                ->where("in_codigo", $codigo)
                ->where("in_estado", 1)
                ->limit(1)
                ->order_by('in_idinstitucion', 'desc')
                ->get("adm_institucion");
        return $query->num_rows() < 0 ? false : $query->row();
    }

    public function login($anio, $codigo, $identity, $password, $remember = FALSE) {
        $session = array();

        if (empty($identity) || empty($password)) {
            $session["message"] = "Error al logearse , usuario o clave son requeridos.";
            $session["session"] = FALSE;
            return $session;
        }

        if (empty($anio) || empty($codigo)) {
            $session["message"] = "Error al logearse , Año y nit son requeridos.";
            $session["session"] = FALSE;
            return $session;
        }

        $anio = $this->existe_anio($anio);

        if (!$anio) {
            $session["message"] = "Error al logearse , el año de trabajo no existe.";
            $session["session"] = FALSE;
            return $session;
        }

        /*
          $institucion = $this->existe_institucion($codigo);

          if (!$institucion) {
          $session["message"] = "Error al logearse , el nit de la institucion no existe o no se encuentra habilitada.";
          $session["session"] = FALSE;
          return $session;
          } */


        $query = $this->db->select('*')
                ->where($this->identity_column, $identity)
                ->join('app_roles', 'app_roles.ro_idroles = us_roles')
                ->join('adm_terceros', 'adm_terceros.te_nit = us_tercero', 'left')
                ->join('adm_institucion', 'adm_institucion.in_idinstitucion = us_institucion', 'left')
                ->limit(1)
                ->order_by('us_idusuario', 'desc')
                ->get("app_usuarios");


        if ($this->is_time_locked_out($identity)) {
            $session["message"] = "El número de segundos para bloquear una cuenta debido a los intentos fallidos son ";
            $session["message"] .= $this->makeTimeFromSeconds($this->config->item('lockout_time', 'constantes/ion_auth'));
            $session["message"] .= " , restantes ";
            $session["message"] .= $this->makeTimeFromSeconds($this->get_last_attempt_time($identity) - (time() - $this->config->item('lockout_time', 'constantes/ion_auth')));
            $session["session"] = FALSE;
            return $session;
        }

        if ($query->num_rows() === 1) {
            $user = $query->row();
            if (!$user->in_estado) {
                $session["message"] = "Lo sentimos, la institucion esta inactiva !";
                $session["session"] = FALSE;
                return $session;
            } elseif (md5($password) == $user->us_clave) {
                if ($user->us_active == 0) {
                    $session["message"] = "Lo sentimos, el usuario esta inactivo";
                    $session["session"] = FALSE;
                    return $session;
                }
                
                $this->set_session($user);
                $this->update_last_login($user->us_idusuario);
                $this->clear_login_attempts($identity);
                
                $add_sesiones = array(
                    'se_idusuario' => $this->session->userdata('us_idusuario'),
                    'se_estado' => 1,
                    'se_detalle' => 'entrada',
                    'se_pais' => 1,
                    'se_ciudad' => 1,
                    'se_fecha' => date("Y-m-d H:i:s"),
                );     

                $this->sesiones_model->create($add_sesiones);
                
                if ($remember && $this->config->item('remember_users', 'constantes/ion_auth')) {
                    $this->remember_user($user->us_idusuario);
                }
                $session["message"] = "Acceso exitoso";
                $session["session"] = TRUE;
                return $session;
            }
        }

        $this->increase_login_attempts($identity);

        $session["message"] = "Error al logearse";
        $session["session"] = FALSE;
        return $session;
    }

    /**
     * Borramos los intentos de inicio de sesión
     * Based on code from Tank Auth, by Ilya Konyukhov (https://github.com/ilkon/Tank-Auth)
     *
     * @param string $identity
     * */
    public function clear_login_attempts($identity, $expire_period = 86400) {
        if ($this->config->item('track_login_attempts', 'constantes/ion_auth')) {
            $ip_address = $this->_prepare_ip($this->input->ip_address());
            $this->db->where(array('li_ip_address' => $ip_address, 'li_login' => $identity));
            // Purge obsolete login attempts
            $this->db->or_where('li_time <', time() - $expire_period, FALSE);
            return $this->db->delete($this->tables['login_attempts']);
        }
        return FALSE;
    }

    /**
     * Actualizamos el último acceso
     *
     * @return bool
     * @author Jairo torres
     * */
    public function update_last_login($id) {
        //$this->trigger_events('update_last_login');

        $this->load->helper('date');

        //$this->trigger_events('extra_where');

        $this->db->update($this->tables['users'], array('us_ultimo_acceso' => time()), array('us_idusuario' => $id));

        return $this->db->affected_rows() == 1;
    }

    /**
     * Generates a random salt value.
     *
     * Salt generation code taken from https://github.com/ircmaxell/password_compat/blob/master/lib/password.php
     *
     * @return void
     * @author Anthony Ferrera
     * */
    public function salt() {

        $raw_salt_len = 16;

        $buffer = '';
        $buffer_valid = false;

        if (function_exists('mcrypt_create_iv') && !defined('PHALANGER')) {
            $buffer = mcrypt_create_iv($raw_salt_len, MCRYPT_DEV_URANDOM);
            if ($buffer) {
                $buffer_valid = true;
            }
        }

        if (!$buffer_valid && function_exists('openssl_random_pseudo_bytes')) {
            $buffer = openssl_random_pseudo_bytes($raw_salt_len);
            if ($buffer) {
                $buffer_valid = true;
            }
        }

        if (!$buffer_valid && @is_readable('/dev/urandom')) {
            $f = fopen('/dev/urandom', 'r');
            $read = strlen($buffer);
            while ($read < $raw_salt_len) {
                $buffer .= fread($f, $raw_salt_len - $read);
                $read = strlen($buffer);
            }
            fclose($f);
            if ($read >= $raw_salt_len) {
                $buffer_valid = true;
            }
        }

        if (!$buffer_valid || strlen($buffer) < $raw_salt_len) {
            $bl = strlen($buffer);
            for ($i = 0; $i < $raw_salt_len; $i++) {
                if ($i < $bl) {
                    $buffer[$i] = $buffer[$i] ^ chr(mt_rand(0, 255));
                } else {
                    $buffer .= chr(mt_rand(0, 255));
                }
            }
        }

        $salt = $buffer;

        // encode string with the Base64 variant used by crypt
        $base64_digits = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/';
        $bcrypt64_digits = './ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $base64_string = base64_encode($salt);
        $salt = strtr(rtrim($base64_string, '='), $base64_digits, $bcrypt64_digits);

        $salt = substr($salt, 0, $this->salt_length);


        return $salt;
    }

    /**
     * remember_user
     *
     * @return bool
     * @author Ben Edmunds
     * */
    public function remember_user($id) {
        //$this->trigger_events('pre_remember_user');

        if (!$id) {
            return FALSE;
        }

        $user = $this->user($id)->row();

        $salt = $this->salt();

        $this->db->update($this->tables['users'], array('remember_code' => $salt), array('us_idusuario' => $id));

        if ($this->db->affected_rows() > -1) {
            // if the user_expire is set to zero we'll set the expiration two years from now.
            if ($this->config->item('user_expire', 'constantes/ion_auth') === 0) {
                $expire = (60 * 60 * 24 * 365 * 2);
            }
            // otherwise use what is set
            else {
                $expire = $this->config->item('user_expire', 'constantes/ion_auth');
            }

            set_cookie(array(
                'name' => $this->config->item('identity_cookie_name', 'constantes/ion_auth'),
                'value' => $user->{$this->identity_column},
                'expire' => $expire
            ));

            set_cookie(array(
                'name' => $this->config->item('remember_cookie_name', 'constantes/ion_auth'),
                'value' => $salt,
                'expire' => $expire
            ));

            //$this->trigger_events(array('post_remember_user', 'remember_user_successful'));
            return TRUE;
        }

        //$this->trigger_events(array('post_remember_user', 'remember_user_unsuccessful'));
        return FALSE;
    }

    public function set_session($user) {

        //$this->trigger_events('pre_set_session');


        $session_data = array(
          'identity' => $user->{$this->identity_column},
          $this->identity_column => $user->{$this->identity_column},
          'email' => $user->us_email,
          'us_idusuario' => $user->us_idusuario, //everyone likes to overwrite id so we'll use user_id
          'old_last_login' => $user->us_ultimo_acceso,
          'in_nombre' => $user->in_nombre,
                  
          );
        
        
        
        $this->session->set_userdata($session_data);

        /*
          $session_data = array(
          'identity' => $user->{$this->identity_column},
          $this->identity_column => $user->{$this->identity_column},
          'email' => $user->us_email,
          'user_id' => $user->us_idusuario, //everyone likes to overwrite id so we'll use user_id
          'old_last_login' => $user->us_ultimo_acceso
          );

          $session_data_ins = array(
          'nombre_institucion' => $inst->in_nombre,
          );

          $this->session->set_userdata($session_data);
          $this->session->set_userdata($session_data_ins); */

        //$this->trigger_events('post_set_session');

        return TRUE;
    }

    /**
     * Son máximos intentos de inicio de sesión superados
     * Based on code from Tank Auth, by Ilya Konyukhov (https://github.com/ilkon/Tank-Auth)
     *
     * @param string $identity
     * @return boolean
     * */
    public function is_max_login_attempts_exceeded($identity) {
        if ($this->config->item('track_login_attempts', 'constantes/ion_auth')) {
            $max_attempts = $this->config->item('maximum_login_attempts', 'constantes/ion_auth');
            if ($max_attempts > 0) {
                $attempts = $this->get_attempts_num($identity);
                return $attempts >= $max_attempts;
            }
        }
        return FALSE;
    }

    /**
     * Obtener un booleano para determinar si una cuenta debe bloquearse debido a
     * Superó los intentos de inicio de sesión dentro de un período determinado
     *
     * @return	boolean
     */
    public function is_time_locked_out($identity) {
        return $this->is_max_login_attempts_exceeded($identity) && $this->get_last_attempt_time($identity) > time() - $this->config->item('lockout_time', 'constantes/ion_auth');
    }

    /**
     * Get the time of the last time a login attempt occured from given IP-address or identity
     *
     * @param	string $identity
     * @return	int
     */
    public function get_last_attempt_time($identity) {
        if ($this->config->item('track_login_attempts', 'constantes/ion_auth')) {
            $ip_address = $this->_prepare_ip($this->input->ip_address());

            $this->db->select('li_time');
            if ($this->config->item('track_login_ip_address', 'constantes/ion_auth'))
                $this->db->where('li_ip_address', $ip_address);
            else if (strlen($identity) > 0)
                $this->db->or_where('li_login', $identity);
            $this->db->order_by('li_idli', 'desc');
            $qres = $this->db->get($this->tables['login_attempts'], 1);

            if ($qres->num_rows() > 0) {
                return $qres->row()->li_time;
            }
        }

        return 0;
    }

    /**
     * Get number of attempts to login occured from given IP-address or identity
     * Based on code from Tank Auth, by Ilya Konyukhov (https://github.com/ilkon/Tank-Auth)
     *
     * @param	string $identity
     * @return	int
     */
    public function get_attempts_num($identity) {
        if ($this->config->item('track_login_attempts', 'constantes/ion_auth')) {
            $ip_address = $this->_prepare_ip($this->input->ip_address());
            $this->db->select('1', FALSE);
            if ($this->config->item('track_login_ip_address', 'constantes/ion_auth')) {
                $this->db->where('li_ip_address', $ip_address);
                $this->db->where('li_login', $identity);
            } else if (strlen($identity) > 0)
                $this->db->or_where('li_login', $identity);
            $qres = $this->db->get($this->tables['login_attempts']);
            return $qres->num_rows();
        }
        return 0;
    }

    /**
     * increase_login_attempts
     * Based on code from Tank Auth, by Ilya Konyukhov (https://github.com/ilkon/Tank-Auth)
     *
     * @param string $identity
     * */
    public function increase_login_attempts($identity) {

        if ($this->config->item('track_login_attempts', 'constantes/ion_auth')) {
            $ip_address = $this->_prepare_ip($this->input->ip_address());
            return $this->db->insert($this->tables['login_attempts'], array('li_ip_address' => $ip_address, 'li_login' => $identity, 'li_time' => time()));
        }
        return FALSE;
    }

    protected function _prepare_ip($ip_address) {
        // just return the string IP address now for better compatibility
        return $ip_address;
    }

    /**
     * Bitauth::get_user_by_username()
     *
     * Get a user by unique username
     */
    public function get_user_by_username($username) {


        $query = $this->db->query("
                 select * from app_usuarios
                 left join app_roles ON
                 app_usuarios.us_roles = app_roles.ro_idroles
                 left join par_estado ON
                 app_usuarios.us_estado = par_estado.es_idestado
                 left join adm_terceros ON 
                 us_tercero = te_cedula
                 where app_usuarios.us_usuario = '" . $username . "'
                 ");



        if ($query && $query->num_rows()) {
            $ret = array();
            $result = $query->result();
            foreach ($result as $row) {
                $ret[] = $row;
            }
            return $ret[0];
        }
        return FALSE;
    }

    public function GetUsuariosConectadas() {


        $query = $this->db->query("
                        select * from app_usuarios
                        left join app_roles ON
                        app_usuarios.us_roles = app_roles.ro_idroles
                        left join par_estado ON
                        app_usuarios.us_estado = par_estado.es_idestado
                        left join adm_terceros ON 
                        us_tercero = te_cedula                 
                     ");

        if ($query->num_rows() > 0) {
            $newsList = array();
            foreach ($query->result() as $news) {
                $img = ($news->us_imagen == "") ? BASE . 'resources/images/public/no_img_180.png' : BASE . "resources/archivos/images/" . $news->us_imagen;
                $news->us_imagen = $img;
                $newsList[] = $news;
            }
            return($newsList);
        }
    }

    public function update($records) {
        $this->db->where("us_idusuario", $records['us_idusuario']);
        return $this->db->update("app_usuarios", $records);
    }

}

?>