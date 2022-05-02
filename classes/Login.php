<?php

/**
 * Class login
 * handles the user's login and logout process
 */
class Login {

    /**
     * @var object The database connection
     */
    private $db_connection = null;

    /**
     * @var array Collection of error messages
     */
    public $errors = array();

    /**
     * @var array Collection of success / neutral messages
     */
    public $messages = array();

    /**
     * the function "__construct()" automatically starts whenever an object of this class is created,
     * you know, when you do "$login = new Login();"
     */
    public function __construct() {
        // server should keep session data for AT LEAST 1 hour
        //ini_set('session.gc_maxlifetime', 43200);

        // each client should remember their session id for EXACTLY 1 hour
        //session_set_cookie_params(0);

        // create/read session, absolutely necessary
        session_start();
        $now = time();
        if (isset($_SESSION['discard_after']) && $now > $_SESSION['discard_after']) {
            // this session has worn out its welcome; kill it and start a brand new one
            session_unset();
            session_destroy();
            session_start();
            $_SESSION['discard_after'] = $now + 43200;
        }

        // check the possible login actions:
        // if user tried to log out (happen when user clicks logout button)
        if (isset($_GET["salir"])) {
            $this->doLogout();
        }
        // login via post data (if user just submitted a login form)
        elseif (isset($_POST["login"])) {
            $this->dologinWithPostData();
        }
    }

    /**
     * log in with post data
     */
    private function dologinWithPostData() {

        /* reCaptcha V2 (Configurar con claves del sitio una vez online) */
        /* $captcha = $_POST['g-recaptcha-response'];
          $ip = $_SERVER['REMOTE_ADDR'];
          $secretkey = "6LeIxAcTAAAAAGG-vFI1TnRWxMZNFuojJ4WifJWe";
          $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . $secretkey . "&response=" . $captcha . "&remoteip=" . $ip);
          $responseKeys = json_decode($response, true);

          if (intval($responseKeys["success"]) !== 1) {
          $this->errors[] = "Captcha inválido.";
          } else { */

        // check login form contents
        if (empty($_POST['user_name'])) {
            $this->errors[] = "Username field was empty.";
        } elseif (empty($_POST['user_password'])) {
            $this->errors[] = "Password field was empty.";
        } elseif (!empty($_POST['user_name']) && !empty($_POST['user_password'])) {
            
            // create a database connection, using the constants from config/db.php (which we loaded in index.php)
            $this->db_connection = new mysqli("localhost", "adciudad_casos", "*CASOS2136", "adciudad_dgmuj");

            // change character set to utf8 and check it
            if (!$this->db_connection->set_charset("utf8")) {
                $this->errors[] = $this->db_connection->error;
            }

            // if no connection errors (= working database connection)
            if (!$this->db_connection->connect_errno) {

                // escape the POST stuff
                $user_name = $this->db_connection->real_escape_string($_POST['user_name']);
                
                $login_password_hash = password_hash($_POST['user_password'], PASSWORD_DEFAULT);
                
                // database query, getting all the info of the selected user (allows login via email address in the
                // username field)
                
                $sql = "SELECT id, nombre, usuario, clave, acceso
                        FROM usuarios
                        WHERE usuario = '" . $user_name . "' AND activo = 's';";

                $result_of_login_check = $this->db_connection->query($sql);

                // if this user exists
                if ($result_of_login_check->num_rows == 1) {

                    // get result row (as an object)
                    $result_row = $result_of_login_check->fetch_object();

                    if (password_verify($_POST['user_password'], $result_row->clave)) {
                        
                    
                    // write user data into PHP SESSION (a file on your server)
                    $_SESSION['user_id'] = $result_row->id;
                    $_SESSION['usuario'] = $result_row->usuario;
                    $_SESSION['nombre'] = $result_row->nombre;
                    $_SESSION['acceso'] = $result_row->acceso;
                    $_SESSION['user_login_status'] = 1;
                    } else {
                        $this->errors[] = "Usuario y/o contraseña no coinciden.";
                    }
                } else {
                    $this->errors[] = "Usuario y/o contraseña incorrecta.";
                }
            } else {
                $this->errors[] = "Problema de conexión de base de datos.";
            }
        }
        /* } */
    }

    /**
     * perform the logout
     */
    public function doLogout() {
        // delete the session of the user
        $_SESSION = array();
        session_destroy();
        // return a little feeedback message
        $this->messages[] = "Te has deslogueado.";
    }

    /**
     * simply return the current state of the user's login
     * @return boolean user's login status
     */
    public function isUserLoggedIn() {
        if (isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] == 1) {
            return true;
        }
        // default return
        return false;
    }

}
