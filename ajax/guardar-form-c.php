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

    $a_motivo = "2"; // Form B // caso / motivo_consulta_id
    $a_nitem_observ = $_POST['nitem_observ_c'];

    $a_nombre = ucwords(strtolower(mysqli_real_escape_string($con, (strip_tags(trim($_POST["NombreC"]), ENT_QUOTES))))); // consultante / nombre
    $a_apellido = ucwords(strtolower(mysqli_real_escape_string($con, (strip_tags(trim($_POST["ApellidoC"]), ENT_QUOTES))))); //consultante / apellido
    $a_tipodoc = $_POST['TipoDocumentoC']; //consultante / tipo_documento
    if ($a_tipodoc == "0") {
        $a_tipodoc = "";
    }
    $a_ndoc = mysqli_real_escape_string($con, (strip_tags(trim($_POST["NumeroDocumentoC"]), ENT_QUOTES))); //consultante / documento
    $a_edad = abs((int)(mysqli_real_escape_string($con, (strip_tags(trim($_POST["EdadC"]), ENT_QUOTES))))); //consultante / edad

    $a_residencia = $_POST['ResidenciaC']; //consultante / lugar_residencia_id
    if ($a_residencia == "0") {
        $a_residencia = "";
    }
    $a_calle = mysqli_real_escape_string($con, (strip_tags(trim($_POST["CalleC"]), ENT_QUOTES))); //consultante / calle 
    $a_altura = abs((int)(mysqli_real_escape_string($con, (strip_tags(trim($_POST["AlturaC"]), ENT_QUOTES))))); //consultante / altura
    $a_pisodep = mysqli_real_escape_string($con, (strip_tags(trim($_POST["PisoDptoC"]), ENT_QUOTES))); //consultante / piso_dpto

    $a_tipotel = $_POST['TipoTelefonoC']; //consultante / tipo_telefono
    if ($a_tipotel == "0") {
        $a_tipotel = "";
    }
    $a_ntel = mysqli_real_escape_string($con, (strip_tags(trim($_POST["NumeroTelefonoC"]), ENT_QUOTES))); //consultante / numero_telefono
    $a_genero = $_POST['GeneroC']; //consultante / identidad_genero_id
    if ($a_genero == "0") {
        $a_genero = "";
    }
    $a_conyuge = $_POST['ConyugeC']; //victima / situacion_conyugal_id
    if ($a_conyuge == "0") {
        $a_conyuge = "";
    }
    $a_motivo_llamada = $_POST['MotivoLlamadaC']; //victima / identidad_genero_id
    if ($a_motivo_llamada == "0") {
        $a_motivo_llamada = "";
    }

    $a_derivaciones = $_POST['ValDerivacionesC']; // caso_derivacion / derivacion_id -> una por cada opcion seleccionada
    $a_observaciones = mysqli_real_escape_string($con, (strip_tags(trim($_POST["ObservacionesC"]), ENT_QUOTES))); // caso_observ / completar datos de la tabla    $a_intervencion = mysqli_real_escape_string($con, (strip_tags($_POST["IntervencionAD"], ENT_QUOTES))); //caso_observ / intervencion
    $a_intervencion = mysqli_real_escape_string($con, (strip_tags(trim($_POST["IntervencionC"]), ENT_QUOTES))); //caso_observ / intervencion
    $usuario = $_POST['usuario']; //caso_observ / usuario_id

    /* INICIO GUARDADO */
    $fecha_inicio = date("Y-m-d H:i:s");
    $primer_guardado = false;
    if ($num_caso == "-") {
        $primer_guardado = true;

        $sql = "INSERT INTO caso (usuario, cancelado, emergencia, origen_id, motivo_consulta_id, fecha_inicio, editando, editpor)
                            VALUES('" . $usuario . "','s','n','" . $a_origen_llamado . "','" . $a_motivo . "','" . $fecha_inicio . "', 's', '" . $usuario . "');";
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
            $sql = "INSERT INTO consultante (nombre, apellido, tipo_documento, documento, lugar_residencia_id, edad, calle, altura, piso_dpto, tipo_telefono, numero_telefono, identidad_genero_id, situacion_conyugal_id)
                            VALUES('" . $a_nombre . "','" . $a_apellido . "','" . $a_tipodoc . "','" . $a_ndoc . "','" . $a_residencia . "','" . $a_edad . "','" . $a_calle . "','" . $a_altura . "','" . $a_pisodep . "','" . $a_tipotel . "','" . $a_ntel . "','" . $a_genero . "','" . $a_conyuge . "');";
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
            $sql = "UPDATE consultante SET nombre='" . $a_nombre . "', apellido='" . $a_apellido . "', tipo_documento='" . $a_tipodoc . "', documento='" . $a_ndoc . "', lugar_residencia_id='" . $a_residencia . "', edad='" . $a_edad . "', calle='" . $a_calle . "', altura='" . $a_altura . "', piso_dpto='" . $a_pisodep . "', tipo_telefono='" . $a_tipotel . "', numero_telefono='" . $a_ntel . "', identidad_genero_id='" . $a_genero . "', situacion_conyugal_id='" . $a_conyuge . "'
                            WHERE id='" . $caso_consultante_id . "';";
            mysqli_autocommit($con, FALSE);
            $query_update_consultante = mysqli_query($con, $sql);

            // if user has been added successfully
            if (!$query_update_consultante) {
                mysqli_rollback($con);
                echo "$num_caso,error"; // update consultante" . mysqli_error($con);
                exit;
            }
        }

        /* GUARDO CASO */
        $sql_editando = "";
        if ($a_cerrar == "si") {
            $sql_editando = "', editando='n', editpor='0";
        }
        $fecha_fin = date("Y-m-d H:i:s");
        $sql = "UPDATE caso SET cancelado='n" . "', consultante_id='" . $caso_consultante_id . "', motivo_problematica_id='" . $a_motivo_llamada . "', fecha_fin='" . $fecha_fin . $sql_editando . "'
                            WHERE id='" . $num_caso . "';";
        mysqli_autocommit($con, FALSE);
        $query_update_caso = mysqli_query($con, $sql);

        // if user has been added successfully
        if (!$query_update_caso) {
            mysqli_rollback($con);
            echo "$num_caso,error"; // update caso";
            exit;
        }



        /* GUARDANDO CASO DERIVACION */
        $sql_delete = "DELETE FROM caso_derivacion WHERE caso_id = '" . $num_caso . "';";
        mysqli_autocommit($con, FALSE);
        $query_delete_derivaciones = mysqli_query($con, $sql_delete);
        if ($a_derivaciones <> "") {
            $array_derivaciones = explode(",", $a_derivaciones);

            $i = 1;
            foreach ($array_derivaciones as $deriv) {
                //INSERT
                $sql = "INSERT INTO caso_derivacion (caso_id, nitem, derivacion_id)
                            VALUES('" . $num_caso . "','" . $i . "','" . $deriv . "');";
                mysqli_autocommit($con, FALSE);
                $query_insert_derivaciones = mysqli_query($con, $sql);
                if (!$query_insert_derivaciones) {
                    mysqli_rollback($con);
                    echo "$num_caso,error"; // insert derivacion"; //"No se pudo guardar el lugar de residencia. Por favor, vuelva a intentarlo.";
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
        /* } */
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

