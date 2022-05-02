<?php
include('is_logged.php'); //Archivo verifica que el usario que intenta acceder a la URL esta logueado
// checking for minimum PHP version
include_once('../include/utiles.inc.php');

/*con_log("controla alta");
  con_log("Nombre: " . $_POST['usuario']);*/
if (!preg_match('/^[a-z\d]{8,16}$/i', $_POST['usuario'])) {
    echo 2;
} else if (!empty($_POST['usuario']) && !empty($_POST['nombre']) && !empty($_POST['acceso']) && !empty($_POST['activo']) && strlen($_POST['usuario']) <= 16 && strlen($_POST['usuario']) >= 8 && preg_match('/^[a-z\d]{8,16}$/i', $_POST['usuario']) && !empty($_POST['user_password_1']) && !empty($_POST['user_password_2']) && ($_POST['user_password_1'] === $_POST['user_password_2'])) {
    require_once ("../config/conexion.php"); //Contiene funcion que conecta a la base de datos
    // escaping, additionally removing everything that could be (html/javascript-) code
    $alta_usuario = strtolower(mysqli_real_escape_string($con, (strip_tags(trim($_POST["usuario"]), ENT_QUOTES))));
    $alta_nombre = mysqli_real_escape_string($con, (strip_tags(trim($_POST["nombre"]), ENT_QUOTES)));
    $alta_acceso = mysqli_real_escape_string($con, (strip_tags($_POST["acceso"], ENT_QUOTES)));
    $alta_activo = mysqli_real_escape_string($con, (strip_tags($_POST["activo"], ENT_QUOTES)));
    $alta_password = trim($_POST['user_password_1']);
    /* $date_added = date("Y-m-d H:i:s"); */
    // crypt the user's password with PHP 5.5's password_hash() function, results in a 60 character
    // hash string. the PASSWORD_DEFAULT constant is defined by the PHP 5.5, or if you are using
    // PHP 5.3/5.4, by the password hashing compatibility library
    $alta_password_hash = password_hash($alta_password, PASSWORD_DEFAULT);
    // check if user or email address already exists
    $sql = "SELECT * FROM usuarios WHERE usuario = '" . $alta_usuario . "';";
    $query_check_user_name = mysqli_query($con, $sql);
    $query_check_user = mysqli_num_rows($query_check_user_name);
    if ($query_check_user == 1) {
        echo 3;
    } else {
        // write new user's data into database
        $sql = "INSERT INTO usuarios (usuario, clave, nombre, acceso, activo)
                            VALUES('" . $alta_usuario . "','" . $alta_password_hash . "','" . $alta_nombre . "', '" . $alta_acceso . "', '" . $alta_activo . "');";
        $query_new_user_insert = mysqli_query($con, $sql);

        // if user has been added successfully
        if ($query_new_user_insert) {
            echo 1;
        } else {
            echo 4;
        }
    }
} else {
    echo 4;
}