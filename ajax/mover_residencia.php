<?php
include('is_logged.php'); //Archivo verifica que el usario que intenta acceder a la URL esta logueado
include_once("../include/utiles.inc.php");

//con_log("id " . $_GET['id'] . " - pos " . $_GET['pos'] . " - dir " .$_GET['dir']);


if (!empty($_GET['id']) && !empty($_GET['pos']) && !empty($_GET['dir'])) {
    require_once ("../config/conexion.php"); //Contiene funcion que conecta a la base de datos
    // escaping, additionally removing everything that could be (html/javascript-) code
    $res_id = intval($_GET['id']);
    $res_orden = intval($_GET['pos']);
    if ($_GET['dir'] == "u") {
        $res_target = $res_orden - 1;
    } else {
        $res_target = $res_orden + 1;
    }
    if ($res_target >= 1) {
        // write new user's data into database
        $sql = "SELECT * FROM lugar_residencia WHERE orden = '" . $res_target . "' ;";
        $query_check = mysqli_query($con, $sql);
        $query_check_res = mysqli_num_rows($query_check);
        if ($query_check_res == 1) {
            $row = mysqli_fetch_array($query_check);

            $prev_id = $row['id'];
            
            $sql = "UPDATE lugar_residencia SET orden = IF(id=$res_id,'$res_target','$res_orden') WHERE id IN ('$res_id','$prev_id')";
            //con_log($sql);
            $query_update = mysqli_query($con, $sql);
            if ($query_update) {
                echo 1;
            } else {
                echo 4;
            }
        } else {
            $sql = "UPDATE lugar_residencia SET orden='" . $res_target . "' WHERE id='" . $res_id . "';";
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
