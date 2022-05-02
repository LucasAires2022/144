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

    $a_motivo = "3"; // Form B // caso / motivo_consulta_id
    $a_nitem_observ = $_POST['nitem_observ_d'];
    $llama_victima = $_POST['toggleConsultanteD'];
    if ($llama_victima == "No") {
        $a_c_nombre = ucwords(strtolower(mysqli_real_escape_string($con, (strip_tags(trim($_POST["NombreCD"]), ENT_QUOTES))))); //consultante / nombre
        $a_c_apellido = ucwords(strtolower(mysqli_real_escape_string($con, (strip_tags(trim($_POST["ApellidoCD"]), ENT_QUOTES))))); //consultante / apellido
        $a_c_tipodoc = $_POST['TipoDocumentoCD']; //consultante / tipo_documento
        if ($a_c_tipodoc == "0") {
            $a_c_tipodoc = "";
        }
        $a_c_ndoc = mysqli_real_escape_string($con, (strip_tags(trim($_POST["NumeroDocumentoCD"]), ENT_QUOTES))); //consultante / documento
        $a_c_edad = abs((int)(mysqli_real_escape_string($con, (strip_tags(trim($_POST["EdadCD"]), ENT_QUOTES))))); //consultante /edad
        $a_c_vinculo = $_POST['VinculoCD']; //consultante / vinculo_genero_id
        if ($a_c_vinculo == "0") {
            $a_c_vinculo = "";
        }
        $a_c_tipotel = $_POST['TipoTelefonoCD']; //victima / tipo_telefono
        if ($a_c_tipotel == "0") {
            $a_c_tipotel = "";
        }
        $a_c_ntel = mysqli_real_escape_string($con, (strip_tags(trim($_POST["NumeroTelefonoCD"]), ENT_QUOTES))); //victima / numero_telefono
        $a_c_residencia = $_POST['ResidenciaCD']; //consultante / lugar_residencia_id
        if ($a_c_residencia == "0") {
            $a_c_residencia = "";
        }
        $a_c_genero = $_POST['GeneroCD']; //consultante / identidad_genero_id
        if ($a_c_genero == "0") {
            $a_c_genero = "";
        }
    } else {
        $a_c_nombre = "";
        $a_c_apellido = "";
        $a_c_tipodoc = "";
        $a_c_ndoc = "";
        $a_c_edad = "";
        $a_c_residencia = "";
        $a_c_genero = "";
        $a_c_vinculo = "";
    }


    $a_nombre = ucwords(strtolower(mysqli_real_escape_string($con, (strip_tags(trim($_POST["NombreD"]), ENT_QUOTES))))); // victima / nombre
    $a_apellido = ucwords(strtolower(mysqli_real_escape_string($con, (strip_tags(trim($_POST["ApellidoD"]), ENT_QUOTES))))); //victima / apellido
    $a_tipodoc = $_POST['TipoDocumentoD']; //victima / tipo_documento
    if ($a_tipodoc == "0") {
        $a_tipodoc = "";
    }
    $a_ndoc = mysqli_real_escape_string($con, (strip_tags(trim($_POST["NumeroDocumentoD"]), ENT_QUOTES))); //victima / documento
    $a_edad = abs((int)(mysqli_real_escape_string($con, (strip_tags(trim($_POST["EdadD"]), ENT_QUOTES))))); //victima / edad
    $a_nacionalidad = $_POST['NacionalidadD']; //victima / nacionalidad_id
    if ($a_nacionalidad == "0") {
        $a_nacionalidad = "";
    }
    $a_residencia = $_POST['ResidenciaD']; //victima / lugar_residencia_id
    if ($a_residencia == "0") {
        $a_residencia = "";
    }
    $a_calle = mysqli_real_escape_string($con, (strip_tags(trim($_POST["CalleD"]), ENT_QUOTES))); //victima / calle 
    $a_altura = abs((int)(mysqli_real_escape_string($con, (strip_tags(trim($_POST["AlturaD"]), ENT_QUOTES))))); //victima / altura
    $a_pisodep = mysqli_real_escape_string($con, (strip_tags(trim($_POST["PisoDptoD"]), ENT_QUOTES))); //victima / piso_dpto

    $a_tipotel = $_POST['TipoTelefonoD']; //victima / tipo_telefono
    if ($a_tipotel == "0") {
        $a_tipotel = "";
    }
    $a_ntel = mysqli_real_escape_string($con, (strip_tags(trim($_POST["NumeroTelefonoD"]), ENT_QUOTES))); //victima / numero_telefono
    $a_genero = $_POST['GeneroD']; //victima / identidad_genero_id
    if ($a_genero == "0") {
        $a_genero = "";
    }

    $a_maltrato = $_POST['ValMaltratoD']; //victima / situacion_conyugal_id

    $a_armas = $_POST['toggleArmasD']; // caso / armas
    $a_gastos = $_POST['toggleGastosD']; // caso / cubre_gastos
    $a_socializo = $_POST['toggleSocializoD']; // caso / socializo_situacion
    $a_recurrir = $_POST['toggleRecurrirD']; // caso / donde_recurrir
    $a_discapacidad = $_POST['toggleDiscapacidadD']; // caso / discapacidad
    $a_localizarla = $_POST['toggleLocalizarlaD']; // caso / localizable_agresor
    $a_amenazas = $_POST['toggleAmenazasD']; // caso / amenazas
    $a_escolarizado = $_POST['toggleEscolarizadoD']; // caso / escolarizado

    $a_tienehijos = $_POST['toggleHermanosD'];
    if ($a_tienehijos == "No especifica") {
        $a_tienehijos = "NE";
    }

//Hermanos -> guardar victima id en cada hijo
    $cargo_hijos = false;
    if ($a_tienehijos == "Si") {
        for ($x = 1; $x <= 10; $x++) {
            $a_hijo[$x]['genero'] = $_POST['HGeneroD' . $x]; // hijos / identidad_genero_id
            if ($a_hijo[$x]['genero'] == "0") {
                $a_hijo[$x]['genero'] = "";
            }
            $a_hijo[$x]['edad'] = abs((int)(mysqli_real_escape_string($con, (strip_tags(trim($_POST['HEdadD' . $x]), ENT_QUOTES))))); //hijos / edad
            $a_hijo[$x]['maltrato'] = $_POST['ValHMaltratoD' . $x]; //hijos / tipo_maltrato
            $a_hijo[$x]['convive'] = $_POST['HConviveD' . $x]; //hijos / convive
            if ($a_hijo[$x]['convive'] == "0") {
                $a_hijo[$x]['convive'] = "";
            }
            if ($a_hijo[$x]['convive'] == "No especifica") {
                $a_hijo[$x]['convive'] = "NE";
            }
            $a_hijo[$x]['conducta'] = $_POST['HConductaD' . $x]; //hijos / conducta
            if ($a_hijo[$x]['conducta'] == "0") {
                $a_hijo[$x]['conducta'] = "";
            }
            if ($a_hijo[$x]['conducta'] == "No especifica") {
                $a_hijo[$x]['conducta'] = "NE";
            }
            if ($a_hijo[$x]['genero'] <> "" || $a_hijo[$x]['edad'] <> "" || $a_hijo[$x]['maltrato'] <> "" || $a_hijo[$x]['convive'] <> "" || $a_hijo[$x]['conducta'] <> "") {
                $cargo_hijos = true;
            }
//echo "hijos: " . $a_hijo['genero'][$x] . " " . $a_hijo['edad'][$x] . " " . $a_hijo['maltrato'][$x] . " " . $a_hijo['convive'][$x] . " " . $a_hijo['conducta'][$x] . " | ";
        }
    }


//agresor
    $a_a_vinculo = $_POST['VinculoAD']; //agresor / vinculo_agresor_id
    if ($a_a_vinculo == "0") {
        $a_a_vinculo = "";
    }
    $a_a_nombre = ucwords(strtolower(mysqli_real_escape_string($con, (strip_tags(trim($_POST["NombreAD"]), ENT_QUOTES))))); //agresor / nombre
    $a_a_apellido = ucwords(strtolower(mysqli_real_escape_string($con, (strip_tags(trim($_POST["ApellidoAD"]), ENT_QUOTES))))); //agresor / apellido

    $a_a_tipodoc = $_POST['TipoDocumentoAD']; //agresor / tipo_documento
    if ($a_a_tipodoc == "0") {
        $a_a_tipodoc = "";
    }
    $a_a_ndoc = mysqli_real_escape_string($con, (strip_tags(trim($_POST["NumeroDocumentoAD"]), ENT_QUOTES))); //agresor / documento
    $a_a_edad = abs((int)(mysqli_real_escape_string($con, (strip_tags(trim($_POST["EdadAD"]), ENT_QUOTES))))); //agresor / edad
    $a_a_nacionalidad = $_POST['NacionalidadAD']; //agresor / nacionalidad_id
    if ($a_a_nacionalidad == "0") {
        $a_a_nacionalidad = "";
    }
    $a_a_genero = $_POST['GeneroAD']; //agresor / identidad_genero_id
    if ($a_a_genero == "0") {
        $a_a_genero = "";
    }

    $a_derivaciones = $_POST['ValDerivacionesAD']; // caso_derivacion / derivacion_id -> una por cada opcion seleccionada
    $a_observaciones = mysqli_real_escape_string($con, (strip_tags(trim($_POST["ObservacionesAD"]), ENT_QUOTES))); // caso_observ / completar datos de la tabla
    $a_intervencion = mysqli_real_escape_string($con, (strip_tags(trim($_POST["IntervencionAD"]), ENT_QUOTES))); //caso_observ / intervencion

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
        if ($llama_victima == "No") {
            if ($caso_consultante_id == 0) {
                //INSERT
                $sql = "INSERT INTO consultante (nombre, apellido, tipo_documento, documento, lugar_residencia_id, edad, identidad_genero_id, vinculo_consultante_id, tipo_telefono, numero_telefono)
                            VALUES('" . $a_c_nombre . "','" . $a_c_apellido . "','" . $a_c_tipodoc . "','" . $a_c_ndoc . "','" . $a_c_residencia . "','" . $a_c_edad . "','" . $a_c_genero . "','" . $a_c_vinculo . "','" . $a_c_tipotel . "','" . $a_c_ntel . "');";
                /* echo $sql; */
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
                $sql = "UPDATE consultante SET nombre='" . $a_c_nombre . "', apellido='" . $a_c_apellido . "', tipo_documento='" . $a_c_tipodoc . "', documento='" . $a_c_ndoc . "', lugar_residencia_id='" . $a_c_residencia . "', edad='" . $a_c_edad . "', identidad_genero_id='" . $a_c_genero . "', vinculo_consultante_id='" . $a_c_vinculo . "', tipo_telefono='" . $a_c_tipotel . "', numero_telefono='" . $a_c_ntel . "'
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
        } else {
            $caso_consultante_id = 0;
        }
        /* GUARDO VICTIMA */
        $caso_victima_id = $row_caso['victima_id']; // caso / victima_id
        if ($caso_victima_id == 0) {
            //INSERT
            $sql = "INSERT INTO victima (nombre, apellido, tipo_documento, documento, edad, calle, altura, piso_dpto, tipo_telefono, numero_telefono, lugar_residencia_id, identidad_genero_id, nacionalidad_id, hijos)
                            VALUES('" . $a_nombre . "','" . $a_apellido . "','" . $a_tipodoc . "','" . $a_ndoc . "','" . $a_edad . "','" . $a_calle . "','" . $a_altura . "','" . $a_pisodep . "','" . $a_tipotel . "','" . $a_ntel . "','" . $a_residencia . "','" . $a_genero . "','" . $a_nacionalidad . "','" . $a_tienehijos . "');";
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
            $sql = "UPDATE victima SET nombre='" . $a_nombre . "', apellido='" . $a_apellido . "', tipo_documento='" . $a_tipodoc . "', documento='" . $a_ndoc . "', edad='" . $a_edad . "', calle='" . $a_calle . "', altura='" . $a_altura . "', piso_dpto='" . $a_pisodep . "', tipo_telefono='" . $a_tipotel . "', numero_telefono='" . $a_ntel . "', lugar_residencia_id='" . $a_residencia . "', identidad_genero_id='" . $a_genero . "', nacionalidad_id='" . $a_nacionalidad . "', hijos='" . $a_tienehijos . "'
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
        /* GUARDO HERMANOS SI HAY */

        /* $sql = "SELECT * FROM hijos WHERE victima_id = '" . $caso_victima_id . "';";
          $query_get_hijos = mysqli_query($con, $sql);
          $query_check_hijos = mysqli_num_rows($query_get_hijos);
          if ($query_check_hijos > 0) { */
        $sql_delete = "DELETE FROM hijos WHERE victima_id = '" . $caso_victima_id . "';";
        mysqli_autocommit($con, FALSE);
        $query_delete_actividades = mysqli_query($con, $sql_delete);
        /* } */
        if ($cargo_hijos) {
            $i = 1;
            foreach ($a_hijo as $hijo_i) {
                if ($hijo_i['genero'] <> "" || $hijo_i['edad'] <> "" || $hijo_i['maltrato'] <> "" || $hijo_i['convive'] <> "" || $hijo_i['conducta'] <> "") {
                    //INSERT
                    $sql = "INSERT INTO hijos (victima_id, nitem, identidad_genero_id, edad, tipo_maltrato, convive, conducta)
                            VALUES('" . $caso_victima_id . "','" . $i . "','" . $hijo_i['genero'] . "','" . $hijo_i['edad'] . "','" . $hijo_i['maltrato'] . "','" . $hijo_i['convive'] . "','" . $hijo_i['conducta'] . "');";
                    mysqli_autocommit($con, FALSE);
                    $query_insert_hijo = mysqli_query($con, $sql);
                    if (!$query_insert_hijo) {
                        mysqli_rollback($con);
                        echo "$num_caso,error"; // insert hijo"; //"No se pudo guardar el lugar de residencia. Por favor, vuelva a intentarlo.";
                        exit;
                    }
                }
                $i++;
            }
        }

        /* GUARDO AGRESOR */
        $caso_agresor_id = $row_caso['agresor_id']; // caso / victima_id
        if ($caso_agresor_id == 0) {
            //INSERT
            $sql = "INSERT INTO agresor (vinculo_agresor_id, nombre, apellido, tipo_documento, documento, edad, nacionalidad_id, identidad_genero_id)
                            VALUES('" . $a_a_vinculo . "','" . $a_a_nombre . "','" . $a_a_apellido . "','" . $a_a_tipodoc . "','" . $a_a_ndoc . "','" . $a_a_edad . "','" . $a_a_nacionalidad . "','" . $a_a_genero . "');";
            mysqli_autocommit($con, FALSE);
            $query_insert_agresor = mysqli_query($con, $sql);
            if ($query_insert_agresor) {
                $caso_agresor_id = mysqli_insert_id($con);
            } else {
                mysqli_rollback($con);
                echo "$num_caso,error"; // insert agresor"; //"No se pudo guardar el lugar de residencia. Por favor, vuelva a intentarlo.";
                exit;
            }
        } else {
            //UPDATE           
            $sql = "UPDATE agresor SET vinculo_agresor_id='" . $a_a_vinculo . "', nombre='" . $a_a_nombre . "', apellido='" . $a_a_apellido . "', tipo_documento='" . $a_a_tipodoc . "', documento='" . $a_a_ndoc . "', edad='" . $a_a_edad . "', nacionalidad_id='" . $a_a_nacionalidad . "', identidad_genero_id='" . $a_a_genero . "'
                            WHERE id='" . $caso_agresor_id . "';";
            mysqli_autocommit($con, FALSE);
            $query_update_agresor = mysqli_query($con, $sql);

            // if user has been added successfully
            if (!$query_update_agresor) {
                mysqli_rollback($con);
                echo "$num_caso,error"; // update agresor";
                exit;
            }
        }

        /* GUARDO CASO */
        //$sql_update_consultante = "";
        //if ($llama_victima == "No") {
        $sql_update_consultante = "', consultante_id = '" . $caso_consultante_id;
        //}
        $sql_editando = "";
        if ($a_cerrar == "si") {

            $sql_editando = "', editando='n', editpor='0";
        }
        $fecha_fin = date("Y-m-d H:i:s");
        $sql = "UPDATE caso SET cancelado='n" . $sql_update_consultante . "', victima_id='" . $caso_victima_id . "', agresor_id='" . $caso_agresor_id . "', fecha_fin='" . $fecha_fin . "', armas='" . $a_armas . "', cubre_gastos='" . $a_gastos . "', socializo_situacion='" . $a_socializo . "', donde_recurrir='" . $a_recurrir . "', discapacidad='" . $a_discapacidad . "', localizable_agresor='" . $a_localizarla . "', amenazas='" . $a_amenazas . "', escolarizado='" . $a_escolarizado . $sql_editando . "'
                            WHERE id='" . $num_caso . "';";
        mysqli_autocommit($con, FALSE);
        $query_update_caso = mysqli_query($con, $sql);

        // if user has been added successfully
        if (!$query_update_caso) {
            mysqli_rollback($con);
            echo "$num_caso,error"; // . mysqli_error($con); //  update caso";
            exit;
        }


        /* GUARDANDO CASO MALTRATO */
        $sql_delete = "DELETE FROM caso_maltrato WHERE caso_id = '" . $num_caso . "';";
        mysqli_autocommit($con, FALSE);
        $query_delete_maltrato = mysqli_query($con, $sql_delete);
        if ($a_maltrato <> "") {
            $array_maltrato = explode(",", $a_maltrato);
            $i = 1;
            foreach ($array_maltrato as $malt) {
                //INSERT
                $sql = "INSERT INTO caso_maltrato (caso_id, nitem, tipo_maltrato_id)
                            VALUES('" . $num_caso . "','" . $i . "','" . $malt . "');";
                mysqli_autocommit($con, FALSE);
                $query_insert_maltrato = mysqli_query($con, $sql);
                if (!$query_insert_maltrato) {
                    mysqli_rollback($con);
                    echo "$num_caso,error"; // insert actividad agresor"; //"No se pudo guardar el lugar de residencia. Por favor, vuelva a intentarlo.";
                    exit;
                }
                $i++;
            }
        }
        /* GUARDANDO CASO DERIVACION */
        $sql_delete = "DELETE FROM caso_derivacion WHERE caso_id = '" . $num_caso . "';";
        mysqli_autocommit($con, FALSE);
        $query_delete_derivaciones = mysqli_query($con, $sql_delete);

        if ($a_derivaciones <> "") {
            $i = 1;
            foreach ($array_derivaciones as $deriv) {
                //INSERT
                $sql = "INSERT INTO caso_derivacion (caso_id, nitem, derivacion_id)
                            VALUES('" . $num_caso . "','" . $i . "','" . $deriv . "');";
                mysqli_autocommit($con, FALSE);
                $query_insert_derivaciones = mysqli_query($con, $sql);
                if (!$query_insert_derivaciones) {
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
            /* } */
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

