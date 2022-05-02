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

    $a_motivo = "1"; // Form B // caso / motivo_consulta_id
    $a_nitem_observ = $_POST['nitem_observ'];
    $llama_victima = $_POST['toggleConsultanteB'];
    if ($llama_victima == "No") {
        $a_c_nombre = ucwords(strtolower(mysqli_real_escape_string($con, (strip_tags(trim($_POST["NombreCB"]), ENT_QUOTES))))); //consultante / nombre
        $a_c_apellido = ucwords(strtolower(mysqli_real_escape_string($con, (strip_tags(trim($_POST["ApellidoCB"]), ENT_QUOTES))))); //consultante / apellido
        $a_c_tipodoc = $_POST['TipoDocumentoCB']; //consultante / tipo_documento
        if ($a_c_tipodoc == "0") {
            $a_c_tipodoc = "";
        }
        $a_c_ndoc = mysqli_real_escape_string($con, (strip_tags(trim($_POST["NumeroDocumentoCB"]), ENT_QUOTES))); //consultante / documento
        $a_c_edad = abs((int)(mysqli_real_escape_string($con, (strip_tags(trim($_POST["EdadCB"]), ENT_QUOTES))))); //consultante /edad
        $a_c_tipotel = $_POST['TipoTelefonoCB']; //victima / tipo_telefono
        if ($a_c_tipotel == "0") {
            $a_c_tipotel = "";
        }
        $a_c_ntel = mysqli_real_escape_string($con, (strip_tags(trim($_POST["NumeroTelefonoCB"]), ENT_QUOTES))); //victima / numero_telefono
        $a_c_residencia = $_POST['ResidenciaCB']; //consultante / lugar_residencia_id
        if ($a_c_residencia == "0") {
            $a_c_residencia = "";
        }
        $a_c_genero = $_POST['GeneroCB']; //consultante / identidad_genero_id
        if ($a_c_genero == "0") {
            $a_c_genero = "";
        }
        $a_c_vinculo = $_POST['VinculoCB']; //consultante / vinculo_genero_id
        if ($a_c_vinculo == "0") {
            $a_c_vinculo = "";
        }
    } else {
        $a_c_nombre = "";
        $a_c_apellido = "";
        $a_c_tipodoc = "";
        $a_c_ndoc = "";
        $a_c_edad = "";
        $a_c_tipotel = "";
        $a_c_ntel = "";
        $a_c_residencia = "";
        $a_c_genero = "";
        $a_c_vinculo = "";
    }


    $a_nombre = ucwords(strtolower(mysqli_real_escape_string($con, (strip_tags(trim($_POST["NombreB"]), ENT_QUOTES))))); // victima / nombre
    $a_apellido = ucwords(strtolower(mysqli_real_escape_string($con, (strip_tags(trim($_POST["ApellidoB"]), ENT_QUOTES))))); //victima / apellido
    $a_tipodoc = $_POST['TipoDocumentoB']; //victima / tipo_documento
    if ($a_tipodoc == "0") {
        $a_tipodoc = "";
    }
    $a_ndoc = mysqli_real_escape_string($con, (strip_tags(trim($_POST["NumeroDocumentoB"]), ENT_QUOTES))); //victima / documento
    $a_edad = abs((int)(mysqli_real_escape_string($con, (strip_tags(trim($_POST["EdadB"]), ENT_QUOTES))))); //victima / edad
    $a_calle = mysqli_real_escape_string($con, (strip_tags(trim($_POST["CalleB"]), ENT_QUOTES))); //victima / calle 
    $a_altura = abs((int)(mysqli_real_escape_string($con, (strip_tags(trim($_POST["AlturaB"]), ENT_QUOTES))))); //victima / altura
    $a_pisodep = mysqli_real_escape_string($con, (strip_tags(trim($_POST["PisoDptoB"]), ENT_QUOTES))); //victima / piso_dpto
    $a_residencia = $_POST['ResidenciaB']; //victima / lugar_residencia_id
    if ($a_residencia == "0") {
        $a_residencia = "";
    }
    $a_tipotel = $_POST['TipoTelefonoB']; //victima / tipo_telefono
    if ($a_tipotel == "0") {
        $a_tipotel = "";
    }
    $a_ntel = mysqli_real_escape_string($con, (strip_tags(trim($_POST["NumeroTelefonoB"]), ENT_QUOTES))); //victima / numero_telefono
    $a_genero = $_POST['GeneroB']; //victima / identidad_genero_id
    if ($a_genero == "0") {
        $a_genero = "";
    }
    $a_nacionalidad = $_POST['NacionalidadB']; //victima / nacionalidad_id
    if ($a_nacionalidad == "0") {
        $a_nacionalidad = "";
    }
    $a_conyuge = $_POST['ConyugeB']; //victima / situacion_conyugal_id
    if ($a_conyuge == "0") {
        $a_conyuge = "";
    }
    $a_convive = $_POST['toggleConviveB']; //victima / convive_agresor
    if ($a_convive == "No especifica") {
        $a_convive = "NE";
    }
    if ($a_convive == "Si") {
        $a_convive_desde[1] = $_POST['TiempoDesdeB'];
        if ($a_convive_desde[1] == "Años") {
            $a_convive_desde[2] = intval(mysqli_real_escape_string($con, (strip_tags(trim($_POST["DesdeAB"]), ENT_QUOTES)))) * 12; //victima / convive_meses
        } else if ($a_convive_desde[1] == "Meses") {
            $a_convive_desde[2] = mysqli_real_escape_string($con, (strip_tags(trim($_POST["DesdeMB"]), ENT_QUOTES))); //victima / convive_meses
        } else {
            $a_convive_desde[2] = "";
        }
    } else {
        $a_convive_desde[1] = "";
        $a_convive_desde[2] = "";
    }
    $a_vivienda = $_POST['ViviendaB']; // victima / tenencia_vivienda_id
    if ($a_vivienda == "0") {
        $a_vivienda = "";
    }
    $a_actividad = $_POST['ValActividadB']; //victima_actividad / actividad_id //una por cada actividad

    $a_neduc = $_POST['NEducativoB']; //victima / nivel_educativo
    if ($a_neduc == "0") {
        $a_neduc = "";
    }
    $a_tienehijos = $_POST['toggleHijosB'];
    if ($a_tienehijos == "No especifica") {
        $a_tienehijos = "NE";
    }

    //Hijos -> guardar victima id en cada hijo
    $cargo_hijos = false;
    if ($a_tienehijos == "Si") {
        for ($x = 1; $x <= 10; $x++) {
            $a_hijo[$x]['genero'] = $_POST['HGeneroB' . $x]; // hijos / identidad_genero_id
            if ($a_hijo[$x]['genero'] == "0") {
                $a_hijo[$x]['genero'] = "";
            }
            $a_hijo[$x]['edad'] = abs((int)(mysqli_real_escape_string($con, (strip_tags(trim($_POST['HEdadB' . $x]), ENT_QUOTES))))); //hijos / edad
            $a_hijo[$x]['maltrato'] = $_POST['ValHMaltratoB' . $x]; //hijos / tipo_maltrato
            $a_hijo[$x]['convive'] = $_POST['HConviveB' . $x]; //hijos / convive
            if ($a_hijo[$x]['convive'] == "0") {
                $a_hijo[$x]['convive'] = "";
            }
            if ($a_hijo[$x]['convive'] == "No especifica") {
                $a_hijo[$x]['convive'] = "NE";
            }
            $a_hijo[$x]['conducta'] = $_POST['HConductaB' . $x]; //hijos / conducta
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
    $a_a_vinculo = $_POST['VinculoAB']; //agresor / vinculo_agresor_id
    if ($a_a_vinculo == "0") {
        $a_a_vinculo = "";
    }
    $a_a_nombre = ucwords(strtolower(mysqli_real_escape_string($con, (strip_tags(trim($_POST["NombreAB"]), ENT_QUOTES))))); //agresor / nombre
    $a_a_apellido = ucwords(strtolower(mysqli_real_escape_string($con, (strip_tags(trim($_POST["ApellidoAB"]), ENT_QUOTES))))); //agresor / apellido

    $a_a_tipodoc = $_POST['TipoDocumentoAB']; //agresor / tipo_documento
    if ($a_a_tipodoc == "0") {
        $a_a_tipodoc = "";
    }
    $a_a_ndoc = mysqli_real_escape_string($con, (strip_tags(trim($_POST["NumeroDocumentoAB"]), ENT_QUOTES))); //agresor / documento
    $a_a_edad = abs((int)(mysqli_real_escape_string($con, (strip_tags(trim($_POST["EdadAB"]), ENT_QUOTES))))); //agresor / edad
    $a_a_nacionalidad = $_POST['NacionalidadAB']; //agresor / nacionalidad_id
    if ($a_a_nacionalidad == "0") {
        $a_a_nacionalidad = "";
    }
    $a_a_genero = $_POST['GeneroAB']; //agresor / identidad_genero_id
    if ($a_a_genero == "0") {
        $a_a_genero = "";
    }
    $a_a_residencia = $_POST['ResidenciaAB']; //victima / lugar_residencia_id
    if ($a_residencia == "0") {
        $a_residencia = "";
    }
    //guardar en agresor_actividad VER
    $a_a_actividad = $_POST['ValActividadAB']; //agresor_actividad / actividad_id //una por cada actividad

    $a_a_adicciones = $_POST['toggleAdiccionesAB']; //agresor / adicciones
    if ($a_a_adicciones == "Si") {
        $a_a_adicciones = "s";
        $a_a_adicciones_detalle = mysqli_real_escape_string($con, (strip_tags(trim($_POST["AdiccionesDetaleAB"]), ENT_QUOTES))); //agresor / adicciones_observ
    } else {
        $a_a_adicciones_detalle = "";
        $a_a_adicciones = "n";
    }

    $a_modo_violencia = $_POST['ValModoViolenciaAB']; // caso_modalidad / modalidad_violencia_id -> una por cada opcion seleccionada
    $a_tipo_violencia = $_POST['ValTipoViolenciaAB']; // caso_tipo / tipo_violencia_id -> una por cada opcion seleccionada

    $a_denuncias = $_POST['toggleDenunciasAB']; // caso / denuncia
    if ($a_denuncias == "No especifica") {
        $a_denuncias = "NE";
    }
    $a_proteccion = $_POST['ValProteccionAB']; // caso_medidas / medidas_proteccion_id -> una por cada opcion seleccionada
    $a_vencimiento = $_POST['VencimientoAB']; // caso_medidas / vencimiento -> una por cada opcion seleccionada

    /* $a_proteccion = $_POST['toggleProteccionAB']; // caso / medidas_proteccion
      if ($a_proteccion == "No especifica") {
      $a_proteccion = "NE";
      } */

    $a_armas = $_POST['toggleArmasAB']; // caso / armas
    $a_gastos = $_POST['toggleGastosAB']; // caso / cubre_gastos
    $a_socializo = $_POST['toggleSocializoAB']; // caso / socializo_situacion
    $a_recurrir = $_POST['toggleRecurrirAB']; // caso / donde_recurrir
    $a_discapacidad = $_POST['toggleDiscapacidadAB']; // caso / discapacidad
    $a_localizarla = $_POST['toggleLocalizarlaAB']; // caso / localizable_agresor
    $a_amenazas = $_POST['toggleAmenazasAB']; // caso / amenazas

    $a_derivaciones = $_POST['ValDerivacionesAB']; // caso_derivacion / derivacion_id -> una por cada opcion seleccionada
    $a_observaciones = mysqli_real_escape_string($con, (strip_tags(trim($_POST["ObservacionesAB"]), ENT_QUOTES))); // caso_observ / completar datos de la tabla
    $a_intervencion = mysqli_real_escape_string($con, (strip_tags(trim($_POST["IntervencionAB"]), ENT_QUOTES))); //caso_observ / intervencion

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
        //mysqli_begin_transaction($enlace, MYSQLI_TRANS_START_READ_ONLY);

        /* GUARDO CONSULTANTE */
        $caso_consultante_id = $row_caso['consultante_id']; // caso / consultante_id
        //echo "llama victima: " .$llama_victima;
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
            $sql = "INSERT INTO victima (nombre, apellido, tipo_documento, documento, edad, calle, altura, piso_dpto, tipo_telefono, numero_telefono, lugar_residencia_id, identidad_genero_id, nivel_educativo, nacionalidad_id, situacion_conyugal_id, convive_agresor, convive_meses, tenencia_vivienda_id, hijos)
                            VALUES('" . $a_nombre . "','" . $a_apellido . "','" . $a_tipodoc . "','" . $a_ndoc . "','" . $a_edad . "','" . $a_calle . "','" . $a_altura . "','" . $a_pisodep . "','" . $a_tipotel . "','" . $a_ntel . "','" . $a_residencia . "','" . $a_genero . "','" . $a_neduc . "','" . $a_nacionalidad . "','" . $a_conyuge . "','" . $a_convive . "','" . $a_convive_desde[2] . "','" . $a_vivienda . "','" . $a_tienehijos . "');";
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
            $sql = "UPDATE victima SET nombre='" . $a_nombre . "', apellido='" . $a_apellido . "', tipo_documento='" . $a_tipodoc . "', documento='" . $a_ndoc . "', edad='" . $a_edad . "', calle='" . $a_calle . "', altura='" . $a_altura . "', piso_dpto='" . $a_pisodep . "', tipo_telefono='" . $a_tipotel . "', numero_telefono='" . $a_ntel . "', lugar_residencia_id='" . $a_residencia . "', identidad_genero_id='" . $a_genero . "', nivel_educativo='" . $a_neduc . "', nacionalidad_id='" . $a_nacionalidad . "', situacion_conyugal_id='" . $a_conyuge . "', convive_agresor='" . $a_convive . "', convive_meses='" . $a_convive_desde[2] . "', tenencia_vivienda_id='" . $a_vivienda . "', hijos='" . $a_tienehijos . "'
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
        /* GUARDO ACTIVIDAD VICTIMA SI HAY */
        $sql_delete = "DELETE FROM victima_actividad WHERE victima_id = '" . $caso_victima_id . "';";
        mysqli_autocommit($con, FALSE);
        $query_delete_actividades = mysqli_query($con, $sql_delete);
        if ($a_actividad <> "") {
            $array_actividad = explode(",", $a_actividad);
            /* $sql = "SELECT * FROM victima_actividad WHERE victima_id = '" . $caso_victima_id . "';";
              mysqli_autocommit($con, FALSE);
              $query_get_actividades = mysqli_query($con, $sql);
              $query_check_actividades = mysqli_num_rows($query_get_actividades);
              if ($query_check_actividades > 0) { */

            /* } */
            $i = 1;
            foreach ($array_actividad as $act) {
                //INSERT
                $sql = "INSERT INTO victima_actividad (victima_id, nitem, actividad_id)
                            VALUES('" . $caso_victima_id . "','" . $i . "','" . $act . "');";
                mysqli_autocommit($con, FALSE);
                $query_insert_victima = mysqli_query($con, $sql);
                if (!$query_insert_victima) {
                    mysqli_rollback($con);
                    echo "$num_caso,error"; // insert actividad victima"; //"No se pudo guardar el lugar de residencia. Por favor, vuelva a intentarlo.";
                    exit;
                }
                $i++;
            }
        }
        /* GUARDO HIJOS SI HAY */
        /* $sql = "SELECT * FROM hijos WHERE victima_id = '" . $caso_victima_id . "';";
          mysqli_autocommit($con, FALSE);
          $query_get_hijos = mysqli_query($con, $sql);
          $query_check_hijos = mysqli_num_rows($query_get_hijos);
          if ($query_check_hijos > 0) { */
        $sql_delete = "DELETE FROM hijos WHERE victima_id = '" . $caso_victima_id . "';";
        mysqli_autocommit($con, FALSE);
        $query_delete_hijos = mysqli_query($con, $sql_delete);
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
            $sql = "INSERT INTO agresor (vinculo_agresor_id, nombre, apellido, tipo_documento, documento, edad, nacionalidad_id, identidad_genero_id, lugar_residencia_id, adicciones, adicciones_observ)
                            VALUES('" . $a_a_vinculo . "','" . $a_a_nombre . "','" . $a_a_apellido . "','" . $a_a_tipodoc . "','" . $a_a_ndoc . "','" . $a_a_edad . "','" . $a_a_nacionalidad . "','" . $a_a_genero . "','" . $a_a_residencia . "','" . $a_a_adicciones . "','" . $a_a_adicciones_detalle . "');";
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
            $sql = "UPDATE agresor SET vinculo_agresor_id='" . $a_a_vinculo . "', nombre='" . $a_a_nombre . "', apellido='" . $a_a_apellido . "', tipo_documento='" . $a_a_tipodoc . "', documento='" . $a_a_ndoc . "', edad='" . $a_a_edad . "', nacionalidad_id='" . $a_a_nacionalidad . "', identidad_genero_id='" . $a_a_genero . "', lugar_residencia_id='" . $a_a_residencia . "', adicciones='" . $a_a_adicciones . "', adicciones_observ='" . $a_a_adicciones_detalle . "'
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

        $sql_delete = "DELETE FROM agresor_actividad WHERE agresor_id = '" . $caso_agresor_id . "';";
        mysqli_autocommit($con, FALSE);
        $query_delete_actividades = mysqli_query($con, $sql_delete);
        /* GUARDO ACTIVIDAD AGRESOR */
        if ($a_a_actividad <> "") {
            $array_a_actividad = explode(",", $a_a_actividad);
            /*  $sql = "SELECT * FROM agresor_actividad WHERE agresor_id = '" . $caso_agresor_id . "';";
              mysqli_autocommit($con, FALSE);
              $query_get_actividades = mysqli_query($con, $sql);
              $query_check_actividades = mysqli_num_rows($query_get_actividades);
              if ($query_check_actividades > 0) { */

            /* } */
            $i = 1;
            foreach ($array_a_actividad as $act) {
                //INSERT
                $sql = "INSERT INTO agresor_actividad (agresor_id, nitem, actividad_id)
                            VALUES('" . $caso_agresor_id . "','" . $i . "','" . $act . "');";
                mysqli_autocommit($con, FALSE);
                $query_insert_agresor = mysqli_query($con, $sql);
                if (!$query_insert_agresor) {
                    mysqli_rollback($con);
                    echo "$num_caso,error"; // insert actividad agresor"; //"No se pudo guardar el lugar de residencia. Por favor, vuelva a intentarlo.";
                    exit;
                }
                $i++;
            }
        }

        /* GUARDO CASO */
        //$sql_update_consultante = "";
        /* if ($llama_victima == "No") { */
        $sql_update_consultante = "', consultante_id='" . $caso_consultante_id;
        /* } */
        $sql_editando = "";
        if ($a_cerrar == "si") {

            $sql_editando = "', editando='n', editpor='0";
        }
        $fecha_fin = date("Y-m-d H:i:s");
        $sql = "UPDATE caso SET cancelado='n" . $sql_update_consultante . "', victima_id='" . $caso_victima_id . "', agresor_id='" . $caso_agresor_id . "', fecha_fin='" . $fecha_fin . "', denuncia='" . $a_denuncias . "', armas='" . $a_armas . "', cubre_gastos='" . $a_gastos . "', socializo_situacion='" . $a_socializo . "', donde_recurrir='" . $a_recurrir . "', discapacidad='" . $a_discapacidad . "', localizable_agresor='" . $a_localizarla . "', amenazas='" . $a_amenazas . $sql_editando . "'
                            WHERE id='" . $num_caso . "';";
        mysqli_autocommit($con, FALSE);
        $query_update_caso = mysqli_query($con, $sql);

        // if user has been added successfully
        if (!$query_update_caso) {
            mysqli_rollback($con);
            echo "$num_caso,error"; // update caso";
            exit;
        }
        $sql_delete = "DELETE FROM caso_modalidad WHERE caso_id = '" . $num_caso . "';";
        mysqli_autocommit($con, FALSE);
        $query_delete_modo_v = mysqli_query($con, $sql_delete);
        /* GUARDANDO CASO MODALIDAD */
        if ($a_modo_violencia <> "") {
            $array_modo_violencia = explode(",", $a_modo_violencia);
            /* $sql = "SELECT * FROM caso_modalidad WHERE caso_id = '" . $num_caso . "';";
              mysqli_autocommit($con, FALSE);
              $query_get_modo_v = mysqli_query($con, $sql);
              $query_check_modo_v = mysqli_num_rows($query_get_modo_v);
              if ($query_check_modo_v > 0) { */

            /* } */
            $i = 1;
            foreach ($array_modo_violencia as $modo_v) {
                //INSERT
                $sql = "INSERT INTO caso_modalidad (caso_id, nitem, modalidad_violencia_id)
                            VALUES('" . $num_caso . "','" . $i . "','" . $modo_v . "');";
                mysqli_autocommit($con, FALSE);
                $query_insert_modo_v = mysqli_query($con, $sql);
                if (!$query_insert_modo_v) {
                    mysqli_rollback($con);
                    echo "$num_caso,error"; // insert actividad agresor"; //"No se pudo guardar el lugar de residencia. Por favor, vuelva a intentarlo.";
                    exit;
                }
                $i++;
            }
        }
        /* GUARDANDO CASO TIPO */
        $sql_delete = "DELETE FROM caso_tipo WHERE caso_id = '" . $num_caso . "';";
        mysqli_autocommit($con, FALSE);
        $query_delete_tipo_v = mysqli_query($con, $sql_delete);
        if ($a_tipo_violencia <> "") {
            $array_tipo_violencia = explode(",", $a_tipo_violencia);
            /*  $sql = "SELECT * FROM caso_tipo WHERE caso_id = '" . $num_caso . "';";
              $query_get_tipo_v = mysqli_query($con, $sql);
              $query_check_tipo_v = mysqli_num_rows($query_get_tipo_v);
              if ($query_check_tipo_v > 0) { */

            /* } */
            $i = 1;
            foreach ($array_tipo_violencia as $tipo_v) {
                //INSERT
                $sql = "INSERT INTO caso_tipo (caso_id, nitem, tipo_violencia_id)
                            VALUES('" . $num_caso . "','" . $i . "','" . $tipo_v . "');";
                mysqli_autocommit($con, FALSE);
                $query_insert_tipo_v = mysqli_query($con, $sql);
                if (!$query_insert_tipo_v) {
                    mysqli_rollback($con);
                    echo "$num_caso,error"; // insert actividad agresor"; //"No se pudo guardar el lugar de residencia. Por favor, vuelva a intentarlo.";
                    exit;
                }
                $i++;
            }
        }
        /* GUARDANDO CASO MEDIDAS PROTECCION */
        $sql_delete = "DELETE FROM caso_medidas WHERE caso_id = '" . $num_caso . "';";
        mysqli_autocommit($con, FALSE);
        $query_delete_medidas_p = mysqli_query($con, $sql_delete);
        if ($a_proteccion <> "") {
            $array_medidas_proteccion = explode(",", $a_proteccion);
            /*  $sql = "SELECT * FROM caso_tipo WHERE caso_id = '" . $num_caso . "';";
              $query_get_tipo_v = mysqli_query($con, $sql);
              $query_check_tipo_v = mysqli_num_rows($query_get_tipo_v);
              if ($query_check_tipo_v > 0) { */

            /* } */
            $i = 1;
            foreach ($array_medidas_proteccion as $medidas_p) {
                //INSERT
                $sql = "INSERT INTO caso_medidas (caso_id, nitem, medidas_proteccion_id, vencimiento)
                            VALUES('" . $num_caso . "','" . $i . "','" . $medidas_p . "','" . $a_vencimiento . "');";
                mysqli_autocommit($con, FALSE);
                $query_insert_medidas_p = mysqli_query($con, $sql);
                if (!$query_insert_medidas_p) {
                    mysqli_rollback($con);
                    echo "$num_caso,error"; // medidas - " . $sql . " -" . mysqli_error($con); // insert caso medidas"; //"No se pudo guardar el lugar de residencia. Por favor, vuelva a intentarlo.";
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
            $array_derivaciones = explode(",", $a_derivaciones);
            /* $sql = "SELECT * FROM caso_derivacion WHERE caso_id = '" . $num_caso . "';";
              $query_get_derivaciones = mysqli_query($con, $sql);
              $query_check_derivaciones = mysqli_num_rows($query_get_derivaciones);
              if ($query_check_derivaciones > 0) { */

            /* } */
            $i = 1;
            foreach ($array_derivaciones as $deriv) {
                //INSERT
                $sql = "INSERT INTO caso_derivacion (caso_id, nitem, derivacion_id)
                            VALUES('" . $num_caso . "','" . $i . "','" . $deriv . "');";

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
            //INSERT


            /* $sql = "SELECT * FROM caso_observ WHERE caso_id = '" . $num_caso . "' AND nitem ='" . $a_nitem_observ . "';";
              mysqli_autocommit($con, FALSE);
              $query_get_caso_observ = mysqli_query($con, $sql);
              $query_check_caso_observ = mysqli_num_rows($query_get_caso_observ);
              if ($query_check_caso_observ > 0) {
              $sql = "UPDATE caso_observ SET fecha_fin='" . $fecha_fin . "', observ='" . $a_observaciones . "', intervencion='" . $a_intervencion . "', usuario_id='" . $usuario . "'
              WHERE caso_id='" . $num_caso . "' AND nitem ='" . $a_nitem_observ . "';";
              mysqli_autocommit($con, FALSE);
              $query_update_observ = mysqli_query($con, $sql);

              if (!$query_update_observ) {
              echo "error"; // update caso";
              exit;
              }
              } else { */


            $sql = "INSERT INTO caso_observ (caso_id, nitem, fecha_inicio, fecha_fin, observ, intervencion, usuario_id)
                            VALUES('" . $num_caso . "','" . $a_nitem_observ . "','" . $fecha_inicio . "','" . $fecha_fin . "','" . $a_observaciones . "','" . $a_intervencion . "','" . $usuario . "');";
            mysqli_autocommit($con, FALSE);
            $query_insert_observ = mysqli_query($con, $sql);
            if (!$query_insert_observ) {
                mysqli_rollback($con);
                echo "$num_caso,error"; // insert caso_observ " . $sql; //"No se pudo guardar el lugar de residencia. Por favor, vuelva a intentarlo.";
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

