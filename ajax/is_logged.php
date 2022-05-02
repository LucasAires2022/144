<?
// server should keep session data for AT LEAST 1 hour
ini_set('session.gc_maxlifetime', 43200);

// each client should remember their session id for EXACTLY 1 hour
session_set_cookie_params(43200);

// create/read session, absolutely necessary
session_start();
$now = time();
if (isset($_SESSION['discard_after']) && $now > $_SESSION['discard_after']) {
    // this session has worn out its welcome; kill it and start a brand new one
    session_unset();
    session_destroy();
    session_start();
    $_SESSION['discard_after'] = $now + 43200;
    //echo "login";
    /*?>
    <script>
        window.location.replace('/casos/login');
    </script>
    <?*/
    exit;
}

// either new or old, it should live at most for another hour



if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
    //echo "login";
    /*?>
    <script>
        window.location.replace('/casos/login');
    </script>
    <?*/
    exit;
}

if (isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] == 1) {
    $uusuario = $_SESSION['usuario'];
    $unombre = $_SESSION['nombre'];
    $uacceso = $_SESSION['acceso'];
    /* if ($uacceso != "a"){
      header("location: $hostactual"."buscador");
      } */
}