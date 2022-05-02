<?php
include('is_logged.php'); //Archivo verifica que el usario que intenta acceder a la URL esta logueado
// checking for minimum PHP version

if (!empty($_POST['tog_id']) && !empty($_POST['tog_activo']) ) {
    require_once ("../config/conexion.php"); //Contiene funcion que conecta a la base de datos
    include_once("../include/utiles.inc.php");
    $numero_dato = intval($_POST['tog_id']);
    $estado = $_POST['tog_activo'];
    
    $upd1 = "UPDATE vinculo_agresor SET activo = '$estado' WHERE id= $numero_dato";
    /* con_log("upd1 = $upd1"); */
    if ($update1 = mysqli_query($con, $upd1)) {
        if ($estado == "n") {
            echo 1;
        } else {
            echo 2;
        }
    } else {
        if ($estado == "n") {
            echo 3;
        } else {
            echo 4;
        }
    }
} 