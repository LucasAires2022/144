<?php

include('is_logged.php'); //Archivo verifica que el usario que intenta acceder a la URL esta logueado
// checking for minimum PHP version
include_once('../include/utiles.inc.php');
if (!empty($_POST['descr']) && !empty($_POST['activo'])) {
    require_once ("../config/conexion.php"); //Contiene funcion que conecta a la base de datos
    // escaping, additionally removing everything that could be (html/javascript-) code
    $alta_descr = mysqli_real_escape_string($con, (strip_tags(trim($_POST["descr"]), ENT_QUOTES)));
    $alta_activo = mysqli_real_escape_string($con, (strip_tags($_POST["activo"], ENT_QUOTES)));


    $sql = "SELECT * FROM origen_llamado WHERE origen = '" . $alta_descr . "';";
    $query_check_dato_name = mysqli_query($con, $sql);
    $query_check_dato = mysqli_num_rows($query_check_dato_name);
    if ($query_check_dato == 1) {
        echo 3; //"El lugar de residencia ya se encuentra cargado.";
    } else {
        $sql = "SELECT * FROM origen_llamado;";
        $query_check_vacio = mysqli_query($con, $sql);
        $query_check_vacio_num = mysqli_num_rows($query_check_vacio);
        if ($query_check_vacio_num == 0) {
            $alta_orden = 1;

            $sql = "INSERT INTO origen_llamado (descr, activo, orden)
                            VALUES('" . $alta_descr . "','" . $alta_activo . "','" . $alta_orden . "');";
            $query_new_dato_insert_vacio = mysqli_query($con, $sql);
            if ($query_new_dato_insert_vacio) {
                echo 1; //"El usuario ha sido creado con éxito.";
            } else {
                echo 4; //"No se pudo guardar el lugar de residencia. Por favor, vuelva a intentarlo.";
            }
        } else {

            $sql = "SELECT * FROM origen_llamado WHERE orden = (SELECT MAX( orden )  FROM origen_llamado);";
            $query_check_orden = mysqli_query($con, $sql);
            $query_check_orden_num = mysqli_num_rows($query_check_orden);
            if ($query_check_orden_num != 1) {
                echo 4;
            } else {
                $row = mysqli_fetch_array($query_check_orden);
                $alta_orden = $row['orden'] + 1;

                $sql = "INSERT INTO origen_llamado (origen, activo, orden)
                            VALUES('" . $alta_descr . "','" . $alta_activo . "','" . $alta_orden . "');";
                $query_new_dato_insert = mysqli_query($con, $sql);


                if ($query_new_dato_insert) {
                    echo 1; //"El usuario ha sido creado con éxito.";
                } else {
                    echo 4; //"No se pudo guardar el lugar de residencia. Por favor, vuelva a intentarlo.";
                }
            }
        }
    }
} else {
    echo 4; //"Ha ocurrido un error. Por favor, vuelva a intentarlo.";
}

