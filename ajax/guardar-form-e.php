<?php

include('is_logged.php'); //Archivo verifica que el usario que intenta acceder a la URL esta logueado
// checking for minimum PHP version
include_once('../include/utiles.inc.php');
if (!empty($_POST['staticNCaso'])) {
    $num_caso = $_POST['staticNCaso']; //caso / id
    /* echo $num_caso; */
    require_once ("../config/conexion.php"); //Contiene funcion que conecta a la base de datos
    $a_cerrar = $_GET['cerrar'];
    $a_origen_llamado = $_POST['ValselectOrigen']; //caso /origen_id

    $a_motivo = "4"; // Form E // caso / motivo_consulta_id
    $a_nitem_observ = $_POST['nitem_observ_e'];

    /* Consultante */
    $a_c_nombre = ucwords(strtolower(mysqli_real_escape_string($con, (strip_tags(trim($_POST["NombreCE"]), ENT_QUOTES))))); //consultante / nombre
    $a_c_apellido = ucwords(strtolower(mysqli_real_escape_string($con, (strip_tags(trim($_POST["ApellidoCE"]), ENT_QUOTES))))); //consultante / apellido

    $a_c_tipodoc = $_POST['TipoDocumentoCE']; //victima / tipo_documento
    if ($a_c_tipodoc == "0") {
        $a_c_tipodoc = "";
    }
    $a_c_ndoc = mysqli_real_escape_string($con, (strip_tags(trim($_POST["NumeroDocumentoCE"]), ENT_QUOTES))); //victima / documento
    $a_c_tipotel = $_POST['TipoTelefonoCE']; //victima / tipo_telefono
    if ($a_c_tipotel == "0") {
        $a_c_tipotel = "";
    }
    $a_c_ntel = mysqli_real_escape_string($con, (strip_tags(trim($_POST["NumeroTelefonoCE"]), ENT_QUOTES))); //victima / numero_telefono
    $a_c_residencia = $_POST['ResidenciaCE']; //consultante / lugar_residencia_id
        if ($a_c_residencia == "0") {
            $a_c_residencia = "";
        }
    $a_motivo_llamada = $_POST['MotivoLlamadaE']; //victima / identidad_genero_id
    if ($a_motivo_llamada == "0") {
        $a_motivo_llamada = "";
    }
    $a_observaciones = mysqli_real_escape_string($con, (strip_tags(trim($_POST["ObservacionesE"]), ENT_QUOTES))); // caso_observ / completar datos de la tabla

    $usuario = $_POST['usuario']; //caso_observ / usuario_id

    /* INICIO GUARDADO */
    $fecha_inicio = date("Y-m-d H:i:s");
    $primer_guardado = false;
    if ($num_caso == "-") {
        $primer_guardado = true;

        $sql = "INSERT INTO caso (usuario, cancelado, emergencia, origen_id, motivo_consulta_id, fecha_inicio, editando, editpor)
                            VALUES('" . $usuario . "','s','n','" . $a_origen_llamado . "','" . $a_motivo . "','" . $fecha_inicio . "', 's', '" . $usuario . "');";
        $sql;
        $query_n_caso = mysqli_query($con, $sql);

        // if user has been added successfully
        if ($query_n_caso) {
            $num_caso = mysqli_insert_id($con);
        } else {
            echo "error"; // crear caso"; /* mysqli_error($con); */
            exit;
        }
    }
    $sql2 = "SELECT * FROM caso WHERE id = '" . $num_caso . "';";
    $query_get_caso = mysqli_query($con, $sql2);
    $query_check_caso = mysqli_num_rows($query_get_caso);
    if ($query_check_caso == 1) {

        $row_caso = mysqli_fetch_array($query_get_caso);

        /* GUARDO CONSULTANTE */
        $caso_consultante_id = $row_caso['consultante_id']; // caso / consultante_id

        if ($caso_consultante_id == 0) {
            //INSERT
            $sql = "INSERT INTO consultante (nombre, apellido, tipo_documento, documento, tipo_telefono, numero_telefono, lugar_residencia_id)
                            VALUES('" . $a_c_nombre . "','" . $a_c_apellido . "','" . $a_c_tipodoc . "','" . $a_c_ndoc . "','" . $a_c_tipotel . "','" . $a_c_ntel . "','" . $a_c_residencia . "');";
            mysqli_autocommit($con, FALSE);
            $query_insert_consultante = mysqli_query($con, $sql);
            if ($query_insert_consultante) {
                $caso_consultante_id = mysqli_insert_id($con);
            } else {
                mysqli_rollback($con);
                echo "$num_caso,error"; // insert consultante"; //"No se pudo guardar el lugar de residencia. Por favor, vuelva a intentarlo.";
                exit;
            }
        } else {
            //UPDATE           
            $sql = "UPDATE consultante SET nombre='" . $a_c_nombre . "', apellido='" . $a_c_apellido . "', tipo_documento='" . $a_c_tipodoc . "', documento='" . $a_c_ndoc . "', tipo_telefono='" . $a_c_tipotel . "', numero_telefono='" . $a_c_ntel . "', lugar_residencia_id='" . $a_c_residencia . "'
                            WHERE id='" . $caso_consultante_id . "';";
            mysqli_autocommit($con, FALSE);
            $query_update_consultante = mysqli_query($con, $sql);

            if (!$query_update_consultante) {
                mysqli_rollback($con);
                echo "$num_caso,error"; // update consultante";
                exit;
            }
        }



        /* GUARDO CASO */
        $fecha_fin = date("Y-m-d H:i:s");
        $sql_editando = "";
        if ($a_cerrar == "si") {
            $sql_editando = "', editando='n', editpor='0";
        }
        $sql = "UPDATE caso SET cancelado='n', consultante_id='" . $caso_consultante_id . "', motivo_varios_id='" . $a_motivo_llamada . "', fecha_fin='" . $fecha_fin . $sql_editando . "'
                            WHERE id='" . $num_caso . "';";
        mysqli_autocommit($con, FALSE);
        $query_update_caso = mysqli_query($con, $sql);

        if (!$query_update_caso) {
            mysqli_rollback($con);
            echo "$num_caso,error"; // update caso: " . mysqli_error($con);
            exit;
        }

        /* GUARDANDO CASO OBSERV */
        if ($a_nitem_observ == "1") {
            $sql_delete = "DELETE FROM caso_observ WHERE caso_id = '" . $num_caso . "';";
            mysqli_autocommit($con, FALSE);
            $query_delete_observ = mysqli_query($con, $sql_delete);

            /* if ($a_observaciones <> "") { */
            //INSERT
            $sql = "INSERT INTO caso_observ (caso_id, nitem, fecha_inicio, fecha_fin, observ, usuario_id)
                            VALUES('" . $num_caso . "','" . $a_nitem_observ . "','" . $fecha_inicio . "','" . $fecha_fin . "','" . $a_observaciones . "','" . $usuario . "');";
            mysqli_autocommit($con, FALSE);
            $query_insert_observ = mysqli_query($con, $sql);
            if (!$query_insert_observ) {
                echo "error"; // insert actividad agresor"; //"No se pudo guardar el lugar de residencia. Por favor, vuelva a intentarlo.";
                exit;
            }
        }
    } else {
        echo "$num_caso,error"; // no hay caso"; /* mysqli_error($con); */
        exit;
    }
    mysqli_commit($con);
    mysqli_autocommit($con, TRUE);
    echo "$num_caso";
} else {
    echo "-,error"; // final"; //"Ha ocurrido un error. Por favor, vuelva a intentarlo.";
    exit;
}

