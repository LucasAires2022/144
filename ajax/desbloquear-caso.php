<?php

//include('is_logged.php'); //Archivo verifica que el usario que intenta acceder a la URL esta logueado
// checking for minimum PHP version
include_once('../include/utiles.inc.php');
if (!empty($_REQUEST['staticNCaso'])) {
    $num_caso = $_REQUEST['staticNCaso']; //caso / id
    require_once ("../config/conexion.php"); //Contiene funcion que conecta a la base de datos
    
    if ($num_caso <> "-") {
        $sql = "UPDATE caso SET editando='n', editpor='0' 
                            WHERE id='" . $num_caso . "';";
        mysqli_autocommit($con, TRUE);
        $query_update_caso = mysqli_query($con, $sql);

        // if user has been added successfully
        if (!$query_update_caso) {
            echo "error"; // update caso";
            exit;
        }
    }
    echo "ok";
} else {
    echo "error"; // final"; //"Ha ocurrido un error. Por favor, vuelva a intentarlo.";
    exit;
}

