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

    $a_motivo = "5"; // Form F // caso / motivo_consulta_id
    $a_nitem_observ = $_POST['nitem_observ_f'];

    /* Consultante */
    $a_c_nombre = ucwords(strtolower(mysqli_real_escape_string($con, (strip_tags(trim($_POST["NombreCF"]), ENT_QUOTES))))); //consultante / nombre
    $a_c_apellido = ucwords(strtolower(mysqli_real_escape_string($con, (strip_tags(trim($_POST["ApellidoCF"]), ENT_QUOTES))))); //consultante / apellido
    $a_c_tipodoc = $_POST['TipoDocumentoCF']; //consultante / tipo_documento
    if ($a_c_tipodoc == "0") {
        $a_c_tipodoc = "";
    }
    $a_c_ndoc = mysqli_real_escape_string($con, (strip_tags(trim($_POST["NumeroDocumentoCF"]), ENT_QUOTES))); //consultante / documento
    $a_c_tipotel = $_POST['TipoTelefonoCF']; //victima / tipo_telefono
    if ($a_c_tipotel == "0") {
        $a_c_tipotel = "";
    }
    $a_c_ntel = mysqli_real_escape_string($con, (strip_tags(trim($_POST["NumeroTelefonoCF"]), ENT_QUOTES))); //victima / numero_telefono

    /* Victima */
    $a_nombre = ucwords(strtolower(mysqli_real_escape_string($con, (strip_tags(trim($_POST["NombreF"]), ENT_QUOTES))))); // victima / nombre
    $a_apellido = ucwords(strtolower(mysqli_real_escape_string($con, (strip_tags(trim($_POST["ApellidoF"]), ENT_QUOTES))))); //victima / apellido
    $a_tipodoc = $_POST['TipoDocumentoF']; //victima / tipo_documento
    if ($a_tipodoc == "0") {
        $a_tipodoc = "";
    }
    $a_ndoc = mysqli_real_escape_string($con, (strip_tags(trim($_POST["NumeroDocumentoF"]), ENT_QUOTES))); //victima / documento

    $a_calle = mysqli_real_escape_string($con, (strip_tags(trim($_POST["CalleF"]), ENT_QUOTES))); //victima / calle 
    $a_altura = abs((int)(mysqli_real_escape_string($con, (strip_tags(trim($_POST["AlturaF"]), ENT_QUOTES))))); //victima / altura
    $a_pisodep = mysqli_real_escape_string($con, (strip_tags(trim($_POST["PisoDptoF"]), ENT_QUOTES))); //victima / piso_dpto
    $a_residencia = $_POST['ResidenciaF']; //victima / lugar_residencia_id
    if ($a_residencia == "0") {
        $a_residencia = "";
    }
    $a_tipotel = $_POST['TipoTelefonoF']; //victima / tipo_telefono
    if ($a_tipotel == "0") {
        $a_tipotel = "";
    }
    $a_ntel = mysqli_real_escape_string($con, (strip_tags(trim($_POST["NumeroTelefonoF"]), ENT_QUOTES))); //victima / numero_telefono
    $a_ubicacion = mysqli_real_escape_string($con, (strip_tags(trim($_POST["UbicacionF"]), ENT_QUOTES))); //victima / numero_telefono
    $a_genero = $_POST['GeneroF']; //victima / identidad_genero_id
    if ($a_genero == "0") {
        $a_genero = "";
    }



    $a_requerimiento = $_POST['ValRequerimientoF']; // caso_requerimiento / requerimiento_id -> una por cada opcion seleccionada

    $a_operador = mysqli_real_escape_string($con, (strip_tags(trim($_POST["OperadorF"]), ENT_QUOTES))); // caso_observ / completar datos de la tabla
    $a_observaciones = mysqli_real_escape_string($con, (strip_tags(trim($_POST["ObservacionesF"]), ENT_QUOTES))); // caso_observ / completar datos de la tabla
    $a_intervencion = mysqli_real_escape_string($con, (strip_tags(trim($_POST["IntervencionF"]), ENT_QUOTES))); //caso_observ / intervencion

    $usuario = $_POST['usuario']; //caso_observ / usuario_id

    /* INICIO GUARDADO */
    $fecha_inicio = date("Y-m-d H:i:s");
    $primer_guardado = false;
    if ($num_caso == "-") {
        $primer_guardado = true;

        $sql = "INSERT INTO caso (usuario, cancelado, emergencia, origen_id, motivo_consulta_id, fecha_inicio, editando , editpor)
                            VALUES('" . $usuario . "','s','s','" . $a_origen_llamado . "','" . $a_motivo . "','" . $fecha_inicio . "', 's', '" . $usuario . "');";
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
            $sql = "INSERT INTO consultante (nombre, apellido, tipo_documento, documento, tipo_telefono, numero_telefono)
                            VALUES('" . $a_c_nombre . "','" . $a_c_apellido . "','" . $a_c_tipodoc . "','" . $a_c_ndoc . "','" . $a_c_tipotel . "','" . $a_c_ntel . "');";
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
            $sql = "UPDATE consultante SET nombre='" . $a_c_nombre . "', apellido='" . $a_c_apellido . "', tipo_documento='" . $a_c_tipodoc . "', documento='" . $a_c_ndoc . "', tipo_telefono='" . $a_c_tipotel . "', numero_telefono='" . $a_c_ntel . "'
                            WHERE id='" . $caso_consultante_id . "';";
            mysqli_autocommit($con, FALSE);
            $query_update_consultante = mysqli_query($con, $sql);

            // if user has been added successfully
            if (!$query_update_consultante) {
                mysqli_rollback($con);
                echo "$num_caso,error"; // update consultante";
                exit;
            }
        }

        /* GUARDO VICTIMA */
        $caso_victima_id = $row_caso['victima_id']; // caso / victima_id
        if ($caso_victima_id == 0) {
            //INSERT
            $sql = "INSERT INTO victima (nombre, apellido, tipo_documento, documento, calle, altura, piso_dpto, tipo_telefono, numero_telefono, lugar_residencia_id, identidad_genero_id)
                            VALUES('" . $a_nombre . "','" . $a_apellido . "','" . $a_tipodoc . "','" . $a_ndoc . "','" . $a_calle . "','" . $a_altura . "','" . $a_pisodep . "','" . $a_tipotel . "','" . $a_ntel . "','" . $a_residencia . "','" . $a_genero . "');";
            mysqli_autocommit($con, FALSE);
            $query_insert_victima = mysqli_query($con, $sql);
            if ($query_insert_victima) {
                $caso_victima_id = mysqli_insert_id($con);
            } else {
                mysqli_rollback($con);
                echo "$num_caso,error"; // insert victima"; //"No se pudo guardar el lugar de residencia. Por favor, vuelva a intentarlo.";
                exit;
            }
        } else {
            //UPDATE           
            $sql = "UPDATE victima SET nombre='" . $a_nombre . "', apellido='" . $a_apellido . "', tipo_documento='" . $a_tipodoc . "', documento='" . $a_ndoc . "', calle='" . $a_calle . "', altura='" . $a_altura . "', piso_dpto='" . $a_pisodep . "', tipo_telefono='" . $a_tipotel . "', numero_telefono='" . $a_ntel . "', lugar_residencia_id='" . $a_residencia . "', identidad_genero_id='" . $a_genero . "'
                            WHERE id='" . $caso_victima_id . "';";
            mysqli_autocommit($con, FALSE);
            $query_update_victima = mysqli_query($con, $sql);

            // if user has been added successfully
            if (!$query_update_victima) {
                mysqli_rollback($con);
                echo "$num_caso,error"; // update victima";
                exit;
            }
        }


        /* GUARDO CASO */
        $fecha_fin = date("Y-m-d H:i:s");
        $sql_editando = "";
        if ($a_cerrar == "si") {
            $sql_editando = "', editando='n', editpor='0";
        }
        $sql = "UPDATE caso SET cancelado='n', consultante_id='" . $caso_consultante_id . "', victima_id='" . $caso_victima_id . "', fecha_fin='" . $fecha_fin . "', datos_ubicacion='" . $a_ubicacion . "', operador_911='" . $a_operador . $sql_editando . "'
                            WHERE id='" . $num_caso . "';";
        mysqli_autocommit($con, FALSE);
        $query_update_caso = mysqli_query($con, $sql);

        // if user has been added successfully
        if (!$query_update_caso) {
            mysqli_rollback($con);
            echo "$num_caso,error"; // update caso: " . mysqli_error($con);
            exit;
        }

        /* GUARDANDO CASO REQUERIMIENTO */
        $sql_delete = "DELETE FROM caso_requerimiento WHERE caso_id = '" . $num_caso . "';";
        mysqli_autocommit($con, FALSE);
        $query_delete_requerimiento = mysqli_query($con, $sql_delete);
        if ($a_requerimiento <> "") {
            $array_requerimiento = explode(",", $a_requerimiento);
            $i = 1;
            foreach ($array_requerimiento as $req) {
                //INSERT
                $sql = "INSERT INTO caso_requerimiento (caso_id, nitem, requerimiento_id)
                            VALUES('" . $num_caso . "','" . $i . "','" . $req . "');";
                mysqli_autocommit($con, FALSE);
                $query_insert_requerimiento = mysqli_query($con, $sql);
                if (!$query_insert_requerimiento) {
                    mysqli_rollback($con);
                    echo "$num_caso,error"; // insert actividad agresor"; //"No se pudo guardar el lugar de residencia. Por favor, vuelva a intentarlo.";
                    exit;
                }
                $i++;
            }
        }

        /* GUARDANDO CASO OBSERV */
        if ($a_nitem_observ == "1") {
            $sql_delete = "DELETE FROM caso_observ WHERE caso_id = '" . $num_caso . "';";
            mysqli_autocommit($con, FALSE);
            $query_delete_observ = mysqli_query($con, $sql_delete);

            /* if ($a_observaciones <> "" || $a_intervencion <> "") { */

            $sql = "INSERT INTO caso_observ (caso_id, nitem, fecha_inicio, fecha_fin, observ, intervencion, usuario_id)
                            VALUES('" . $num_caso . "','" . $a_nitem_observ . "','" . $fecha_inicio . "','" . $fecha_fin . "','" . $a_observaciones . "','" . $a_intervencion . "','" . $usuario . "');";
            mysqli_autocommit($con, FALSE);
            $query_insert_observ = mysqli_query($con, $sql);
            if (!$query_insert_observ) {
                mysqli_rollback($con);
                echo "$num_caso,error"; // insert actividad agresor"; //"No se pudo guardar el lugar de residencia. Por favor, vuelva a intentarlo.";
                exit;
            }
        }
        /* } */
    } else {
        echo "$num_caso,error"; // no hay caso"; /* mysqli_error($con); */
        exit;
    }
    mysqli_commit($con);
    mysqli_autocommit($con, TRUE);
    echo "$num_caso";
} else {
    echo "error"; // final"; //"Ha ocurrido un error. Por favor, vuelva a intentarlo.";
    exit;
}

