<?php

include('is_logged.php'); //Archivo verifica que el usario que intenta acceder a la URL esta logueado
// checking for minimum PHP version
include_once('../include/utiles.inc.php');

if (!empty($_REQUEST['idcaso']) && (!empty($_REQUEST['nobserv']) || !empty($_REQUEST['ninterv']))) {
    require_once ("../config/conexion.php"); //Contiene funcion que conecta a la base de datos
    
    $nobserv = mysqli_real_escape_string($con, (strip_tags(trim($_REQUEST['nobserv']), ENT_QUOTES)));
    $ninterv = mysqli_real_escape_string($con, (strip_tags(trim($_REQUEST['ninterv']), ENT_QUOTES)));
    $num_caso = $_REQUEST['idcaso'];
    $usuario = $_REQUEST['user'];

    
    //ARMAR ABAJO
    $sql = "SELECT * FROM caso_observ WHERE caso_id = '" . $num_caso . "';";
    $query_check_observ = mysqli_query($con, $sql);
    $query_check_num_observ = mysqli_num_rows($query_check_observ);
    if ($query_check_num_observ == 0) {
        $nitem = 1;
    } else {
        $sql = "SELECT * FROM caso_observ WHERE caso_id = '$num_caso' AND nitem = (SELECT MAX( nitem ) FROM caso_observ where caso_id = '$num_caso');";

        $query_check_nitem = mysqli_query($con, $sql);
        $query_check_nitem_num = mysqli_num_rows($query_check_nitem);
        if ($query_check_nitem_num != 1) {
            echo "error";
            exit;
        } else {
            $row = mysqli_fetch_array($query_check_nitem);
            $nitem = $row['nitem'] + 1;
        }
    }
    $fecha = date("Y-m-d H:i:s");
    $sql = "INSERT INTO caso_observ (caso_id, nitem, fecha_inicio, fecha_fin, observ, intervencion, usuario_id)
                            VALUES('" . $num_caso . "','" . $nitem . "','" . $fecha . "','" . $fecha . "','" . $nobserv . "','" . $ninterv . "','" . $usuario . "');";

    $query_insert_observ = mysqli_query($con, $sql);
    if (!$query_insert_observ) {
        echo "error";// insert actividad agresor"; //"No se pudo guardar el lugar de residencia. Por favor, vuelva a intentarlo.";
        exit;
    }

    //ARMAR ARRIBA
    echo "ok";
} else {
    echo "error"; // final"; //"Ha ocurrido un error. Por favor, vuelva a intentarlo.";
    exit;
}

