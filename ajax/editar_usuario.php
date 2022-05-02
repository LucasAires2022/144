<?php
include('is_logged.php'); //Archivo verifica que el usario que intenta acceder a la URL esta logueado
include_once("../include/utiles.inc.php");

if (!preg_match('/^[a-z\d]{8,16}$/i', $_POST['usuario2'])) {
    echo 2;
} elseif (!empty($_POST['usuario2']) && !empty($_POST['nombre2']) && !empty($_POST['acceso2']) && !empty($_POST['activo2']) && strlen($_POST['usuario2']) <= 16 && strlen($_POST['usuario2']) >= 8 && preg_match('/^[a-z\d]{8,16}$/i', $_POST['usuario2'])) {
    require_once ("../config/conexion.php"); //Contiene funcion que conecta a la base de datos
    // escaping, additionally removing everything that could be (html/javascript-) code
    $alta_usuario2 = strtolower(mysqli_real_escape_string($con, (strip_tags(trim($_POST["usuario2"]), ENT_QUOTES))));
    $alta_nombre2 = mysqli_real_escape_string($con, (strip_tags(trim($_POST["nombre2"]), ENT_QUOTES)));
    $alta_acceso2 = mysqli_real_escape_string($con, (strip_tags($_POST["acceso2"], ENT_QUOTES)));
    $alta_activo2 = mysqli_real_escape_string($con, (strip_tags($_POST["activo2"], ENT_QUOTES)));
    $user_id = intval($_POST['mod_id']);
    // write new user's data into database
    $sql = "SELECT * FROM usuarios WHERE usuario = '" . $alta_usuario2 . "' AND id <> '" . $user_id . "' ;";
    $query_check_user_name = mysqli_query($con, $sql);
    $query_check_user = mysqli_num_rows($query_check_user_name);
    if ($query_check_user == 1) {
        echo 3;
    } else {

        $sql = "UPDATE usuarios SET usuario='" . $alta_usuario2 . "', nombre='" . $alta_nombre2 . "', acceso='" . $alta_acceso2 . "', activo='" . $alta_activo2 . "'
                            WHERE id='" . $user_id . "';";
        $query_update = mysqli_query($con, $sql);

        // if user has been added successfully
        if ($query_update) {
            echo 1;
        } else {
            echo 4;
        }
    }
} else {
    echo 4;
}
