<?php
include('is_logged.php'); //Archivo verifica que el usario que intenta acceder a la URL esta logueado
include_once("../include/utiles.inc.php");

//con_log("id " . $_GET['id'] . " - pos " . $_GET['pos'] . " - dir " .$_GET['dir']);


if (!empty($_GET['id']) && !empty($_GET['pos']) && !empty($_GET['dir'])) {
    require_once ("../config/conexion.php"); //Contiene funcion que conecta a la base de datos
    // escaping, additionally removing everything that could be (html/javascript-) code
    $dato_id = intval($_GET['id']);
    $dato_orden = intval($_GET['pos']);
    if ($_GET['dir'] == "u") {
        $dato_target = $dato_orden - 1;
    } else {
        $dato_target = $dato_orden + 1;
    }
    if ($dato_target >= 1) {
        // write new user's data into database
        $sql = "SELECT * FROM actividad WHERE orden = '" . $dato_target . "' ;";
        $query_check = mysqli_query($con, $sql);
        $query_check_dato = mysqli_num_rows($query_check);
        if ($query_check_dato == 1) {
            $row = mysqli_fetch_array($query_check);

            $prev_id = $row['id'];
            
            $sql = "UPDATE actividad SET orden = IF(id=$dato_id,'$dato_target','$dato_orden') WHERE id IN ('$dato_id','$prev_id')";
            //con_log($sql);
            $query_update = mysqli_query($con, $sql);
            if ($query_update) {
                echo 1;
            } else {
                echo 4;
            }
        } else {
            $sql = "UPDATE actividad SET orden='" . $dato_target . "' WHERE id='" . $dato_id . "';";
            $query_update = mysqli_query($con, $sql);
            // if user has been added successfully
            if ($query_update) {
                echo 1;
            } else {
                echo 4;
            }
        }
    } else {
        echo 4 . "target";
    }
} else {
    echo 4 . "ultimo";
}
