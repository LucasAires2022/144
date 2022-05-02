<?php
include('is_logged.php'); //Archivo verifica que el usario que intenta acceder a la URL esta logueado
include_once("../include/utiles.inc.php");

if (!empty($_POST['descr2']) && !empty($_POST['activo2'])) {
    require_once ("../config/conexion.php"); //Contiene funcion que conecta a la base de datos
    // escaping, additionally removing everything that could be (html/javascript-) code
    $alta_descr2 = mysqli_real_escape_string($con, (strip_tags(trim($_POST["descr2"]), ENT_QUOTES)));
    $alta_activo2 = mysqli_real_escape_string($con, (strip_tags($_POST["activo2"], ENT_QUOTES)));
    $row_id = intval($_POST['mod_id']); 
    // write new user's data into database
    $sql = "SELECT * FROM tenencia_vivienda WHERE descr = '" . $alta_descr2 . "' AND id <> '" . $row_id . "' ;";
    $query_check_dato_name = mysqli_query($con, $sql);
    $query_check_dato = mysqli_num_rows($query_check_dato_name);
    if ($query_check_dato == 1) {
        echo 3;
    } else {

        $sql = "UPDATE tenencia_vivienda SET descr='" . $alta_descr2 . "', activo='" . $alta_activo2 . "'
                            WHERE id='" . $row_id . "';";
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
