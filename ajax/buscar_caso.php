<?php
include('is_logged.php'); //Archivo verifica que el usario que intenta acceder a la URL esta logueado
/* Connect To Database */


if (!isset($con)) {
    require_once ("../config/conexion.php"); //Contiene funcion que conecta a la base de datos
}
//require_once ("../config/funciones.php");//Contiene funciones varias
require_once ("../include/utiles.inc.php"); //Contiene funciones varias





$action = (isset($_REQUEST['action']) && $_REQUEST['action'] != NULL) ? $_REQUEST['action'] : '';

if ($action == 'ajax') {

    // escaping, additionally removing everything that could be (html/javascript-) code
    $q = mysqli_real_escape_string($con, (strip_tags(trim($_REQUEST['q']), ENT_QUOTES)));
    $q_origen = $_REQUEST['Origen'];
    $q_motivo = $_REQUEST['Motivo'];
    $q_fechad = mysqli_real_escape_string($con, (strip_tags(trim($_REQUEST['FechaDesde']), ENT_QUOTES)));
    $q_fechah = mysqli_real_escape_string($con, (strip_tags(trim($_REQUEST['FechaHasta']), ENT_QUOTES)));
    $q_ncaso = mysqli_real_escape_string($con, (strip_tags(trim($_REQUEST['NumCaso']), ENT_QUOTES)));
    $q_ndoc = mysqli_real_escape_string($con, (strip_tags(trim($_REQUEST['NumeroDoc']), ENT_QUOTES)));
    $q_usuario = $_REQUEST['Usuario'];
    $q_residencia = $_REQUEST['Residencia'];
    $q_apellido = mysqli_real_escape_string($con, (strip_tags(trim($_REQUEST['Apellido']), ENT_QUOTES)));
    $q_nombre = mysqli_real_escape_string($con, (strip_tags(trim($_REQUEST['Nombre']), ENT_QUOTES)));

    $ordenar = $_GET['orden'];

    /* con_log("orden: " . $ordenar); */
    if (isset($ordenar) && $ordenar != "") {
        /* con_log("pasa2"); */
        $_SESSION['orden_buscador'] = $ordenar;
        //$ordenar = str_replace("-", ".", $ordenar);
        /* con_log("orden session es  ".$_SESSION['orden_abm_residencia'] . " y ordenar es $ordenar"); */
        $ascdesc = substr($ordenar, 0, 1);
        $ordenar = substr($ordenar, 1);
    } else {
        $ascdesc = "a";
        $ordenar = "idcaso";
    }
    if ($ascdesc == "a") {
        $ascdesc = "asc";
    } else {
        $ascdesc = "desc";
    }
    /* con_log("orden es $ordenar y ascdesc es $ascdesc"); */
    if (!isset($sWhere)) {
        $sWhere = "";
    }
    if ($q != "") {
        $q_parsed = get_string_between($q, '\"', '\"');
        //con_log("q1 es $q |");
        $q = str_replace($q_parsed, '', $q);
        //con_log("q2 es $q |");
        $q = str_replace('\"\"', '', $q);
        //con_log("q3 es $q |");
        //con_log("|cadena recortada: $q_parsed | cadena completa: $q |");
        $criterio = explode(" ", $q);
        /* $haycomillas = false;
          if (strlen($q_parsed) > 0) {
          $haycomillas = true;
          } */
        $contador = 0;
        if ($haycomillas) {
            if ($sWhere == "") {
                $sWhere = " WHERE (co.observ like '%$q_parsed%' || co.intervencion like '%$q_parsed%' || d.descr like '%$q_parsed%') ";
            } else {
                $sWhere .= " AND (co.observ like '%$q_parsed%' || co.intervencion like '%$q_parsed%' || d.descr like '%$q_parsed%') ";
            }
        }
        foreach ($criterio as $cri) {
            $cri = trim($cri);
            /* if ($haycomillas) {
              $cri = str_replace('\\"', '', $cri);
              $cri = str_replace('"\\', '', $cri);

              } */
            if ($cri <> "") {
                if ($sWhere == "") {
                    $sWhere = " WHERE (co.observ like '%$cri%' || co.intervencion like '%$cri%' || d.descr like '%$cri%') ";
                } else {
                    $sWhere .= " AND (co.observ like '%$cri%' || co.intervencion like '%$cri%' || d.descr like '%$cri%') ";
                }
            }
        }
    }

    if ($q_motivo <> "0") {
        if ($sWhere == "") {
            $sWhere = " WHERE (c.motivo_consulta_id = '$q_motivo') ";
        } else {
            $sWhere .= " AND (c.motivo_consulta_id = '$q_motivo') ";
        }
    }
    if ($q_origen <> "0") {
        if ($sWhere == "") {
            $sWhere = " WHERE (c.origen_id = '$q_origen') ";
        } else {
            $sWhere .= " AND (c.origen_id = '$q_origen') ";
        }
    }
    if ($q_usuario <> "0") {
        if ($sWhere == "") {
            $sWhere = " WHERE (c.usuario = '$q_usuario') ";
        } else {
            $sWhere .= " AND (c.usuario = '$q_usuario') ";
        }
    }
    if ($q_residencia <> "0") {
        if ($sWhere == "") {
            $sWhere = " WHERE (v.lugar_residencia_id = '$q_residencia' || t.lugar_residencia_id ='$q_residencia') ";
        } else {
            $sWhere .= " AND (v.lugar_residencia_id = '$q_residencia' || t.lugar_residencia_id ='$q_residencia') ";
        }
    }

    $q_desde = "";
    if ($q_fechad <> "") {
        $q_desde = date("Y-m-d", strtotime($q_fechad));
    }
    $q_hasta = "";
    if ($q_fechah <> "") {
        $q_hasta = date("Y-m-d H:i:s", strtotime($q_fechah . " 23:59:59"));
    }
    if ($q_desde <> "" && $q_hasta <> "") {
        if ($sWhere == "") {
            $sWhere = " WHERE (c.fecha_fin BETWEEN '$q_desde' AND '$q_hasta') ";
        } else {
            $sWhere .= " AND (c.fecha_fin BETWEEN '$q_desde' AND '$q_hasta') ";
        }
    } else if ($q_desde <> "") {
        if ($sWhere == "") {
            $sWhere = " WHERE (c.fecha_fin >= '$q_desde') ";
        } else {
            $sWhere .= " AND (c.fecha_fin >= '$q_desde') ";
        }
    } else if ($q_hasta <> "") {
        if ($sWhere == "") {
            $sWhere = " WHERE (c.fecha_fin <= ('$q_hasta' + INTERVAL 1 DAY)) ";
        } else {
            $sWhere .= " AND (c.fecha_fin <= ('$q_hasta' + INTERVAL 1 DAY)) ";
        }
    }
    if ($q_ncaso <> "") {
        if ($sWhere == "") {
            $sWhere = " WHERE (c.id like '%$q_ncaso%') ";
        } else {
            $sWhere .= " AND (c.id like '%$q_ncaso%') ";
        }
    }
    if ($q_ncaso <> "") {
        if ($sWhere == "") {
            $sWhere = " WHERE (c.id = '$q_ncaso') ";
        } else {
            $sWhere .= " AND (c.id = '$q_ncaso') ";
        }
    }
    if ($q_ndoc <> "" && $q_ndoc <> "0") {
        if ($sWhere == "") {
            $sWhere = " WHERE (v.documento like '%$q_ndoc%' || t.documento like '%$q_ndoc%' || a.documento like '%$q_ndoc%') ";
        } else {
            $sWhere .= " AND (v.documento like '%$q_ndoc%' || t.documento like '%$q_ndoc%' || a.documento like '%$q_ndoc%') ";
        }
    }
    if ($q_apellido <> "") {
        if ($sWhere == "") {
            $sWhere = " WHERE (v.apellido like '%$q_apellido%' || t.apellido like '%$q_apellido%' || a.apellido like '%$q_apellido%') ";
        } else {
            $sWhere .= " AND (v.apellido like '%$q_apellido%' || t.apellido like '%$q_apellido%' || a.apellido like '%$q_apellido%') ";
        }
    }
    if ($q_nombre <> "") {
        if ($sWhere == "") {
            $sWhere = " WHERE (v.nombre like '%$q_nombre%' || t.nombre like '%$q_nombre%' || a.nombre like '%$q_nombre%') ";
        } else {
            $sWhere .= " AND (v.nombre like '%$q_nombre%' || t.nombre like '%$q_nombre%' || a.nombre like '%$q_nombre%') ";
        }
    }



    //con_log("sWhere es:$sWhere");
    //("ordenar es:$ordenar");

    if ($ordenar == "tapellido") {
        $ordenamiento = "$ordenar $ascdesc, tnombre $ascdesc, idcaso $ascdesc";
    } else if ($ordenar == "vapellido") {
        $ordenamiento = "$ordenar $ascdesc, vnombre $ascdesc, idcaso $ascdesc";
    } else if ($ordenar == "aapellido") {
        $ordenamiento = "$ordenar $ascdesc, anombre $ascdesc, idcaso $ascdesc";
    } else {
        $ordenamiento = "$ordenar $ascdesc, idcaso $ascdesc";
    }
    $sOrder = /* "AND c.cancelado='n' */ " ORDER BY $ordenamiento ";


    
    include 'pagination.php'; //include pagination file
    //pagination variables
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $per_page = 50; //how much records you want to show
    $adjacents = 3; //gap between pages after number of adjacents
    $offset = ($page - 1) * $per_page;
    //Count the total number of row in your table*/

    /*
      SELECT
      p.product_name,
      o.order_id,
      i.item_id,
      o.order_date
      FROM
      production.products p
      LEFT JOIN sales.order_items i
      ON i.product_id = p.product_id
      LEFT JOIN sales.orders o
      ON o.order_id = i.order_id
      ORDER BY
      order_id;

      numero de caso, origen, motivo de consulta, apellidos y nombres, fecha, usuario, cantidad de observaciones


     */
    $sqljoin = "SELECT DISTINCT c.cancelado as ccancelado, c.id as idcaso, o.origen as oorigen, m.descr as mdescr, v.apellido as vapellido, v.nombre as vnombre, t.apellido as tapellido, t.nombre as tnombre, a.apellido as aapellido, a.nombre as anombre, c.fecha_fin as fechafin, u.usuario as user, c.editando as ceditando, c.editpor as ceditpor, uu.usuario as ceditporuser, "//, co.observ as observ, co.intervencion as interv "
            . "	( SELECT max(nitem) FROM caso_observ co WHERE co.caso_id = c.id) as coentradas "
            . "FROM caso c "
            . "LEFT JOIN origen_llamado o ON o.id = c.origen_id "
            . "LEFT JOIN motivo_consulta m ON m.id = c.motivo_consulta_id "
            . "LEFT JOIN victima v ON v.id = c.victima_id "
            . "LEFT JOIN consultante t ON t.id = c.consultante_id "
            . "LEFT JOIN agresor a ON a.id = c.agresor_id "
            . "LEFT JOIN caso_observ co ON co.caso_id = c.id "
            . "LEFT JOIN caso_derivacion cd ON cd.caso_id = c.id "
            . "LEFT JOIN derivacion d ON d.id = cd.derivacion_id "
            . "LEFT JOIN usuarios u ON u.id = c.usuario "
            . "LEFT JOIN usuarios uu ON uu.id = c.editpor ";
    $sqljoincount = "SELECT count(DISTINCT(c.id)) as numrows "//, c.cancelado as ccancelado, c.id as idcaso, o.origen as oorigen, m.descr as mdescr, v.apellido as vapellido, v.nombre as vnombre, t.apellido as tapellido, t.nombre as tnombre, a.apellido as aapellido, a.nombre as anombre, c.fecha_fin as fechafin, c.usuario as user, c.editando as ceditando, c.editpor as ceditpor, uu.usuario as ceditporuser "//, co.observ as observ, co.intervencion as interv  "
            . "FROM caso c "
            . "LEFT JOIN origen_llamado o ON o.id = c.origen_id "
            . "LEFT JOIN motivo_consulta m ON m.id = c.motivo_consulta_id "
            . "LEFT JOIN victima v ON v.id = c.victima_id "
            . "LEFT JOIN consultante t ON t.id = c.consultante_id "
            . "LEFT JOIN agresor a ON a.id = c.agresor_id "
            . "LEFT JOIN caso_observ co ON co.caso_id = c.id "
            . "LEFT JOIN caso_derivacion cd ON cd.caso_id = c.id "
            . "LEFT JOIN derivacion d ON d.id = cd.derivacion_id "
            . "LEFT JOIN usuarios u ON u.id = c.usuario "
            . "LEFT JOIN usuarios uu ON uu.id = c.editpor";
    $count_query = mysqli_query($con, "$sqljoincount $sWhere");
    //con_log("$sqljoincount $sWhere $sOrder");
    $row = mysqli_fetch_array($count_query);
    $numrows = $row['numrows'];
    ?>
    <div class="form-group row" style="margin-top:0px;">
        <label class="col-md-12 control-label text-left">Cantidad de casos encontrados: <big><?= $numrows ?></big></label>
    </div>
    <?
    $total_pages = ceil($numrows / $per_page);
    $reload = '../buscador.php';
    //main query to fetch the data
    $sql = "$sqljoin $sWhere $sOrder LIMIT $offset,$per_page";
    //con_log("sql es: $sql");
    //echo $sql;
    $query = mysqli_query($con, $sql);
    //loop through fetched data
    if ($numrows > 0) {
        echo mysqli_error($con);
        ?>
        <div class="table-responsive">
            <table class="table table-hover <? /* table-striped table-bordered table-hover */ ?> text-center" style="margin-bottom:0px;">
                <tr  class="abm-header">
                    <th style="min-width: 45px;">
                        <? if ($ordenar == "idcaso" && $ascdesc == "asc") { ?>
                            <a class="abm-header-col" href='javascript:load_orden(1,"didcaso");'>
                                Caso Nº <i class="fas fa-caret-up"></i></a>
                        <? } else if ($ordenar == "idcaso" && $ascdesc == "desc") { ?>
                            <a class="abm-header-col" href='javascript:load_orden(1,"aidcaso");'>
                                Caso Nº <i class="fas fa-caret-down"></i></a>
                        <? } else { ?>
                            <a class="abm-header-col" href='javascript:load_orden(1,"aidcaso");'>
                                Caso Nº</a>
                        <? } ?>
                    </th>
                    <th>
                        <? if ($ordenar == "oorigen" && $ascdesc == "asc") { ?>
                            <a class="abm-header-col" href='javascript:load_orden(1,"doorigen");'>
                                Origen <i class="fas fa-caret-up"></i></a>
                        <? } else if ($ordenar == "oorigen" && $ascdesc == "desc") { ?>
                            <a class="abm-header-col" href='javascript:load_orden(1,"aoorigen");'>
                                Origen <i class="fas fa-caret-down"></i></a>
                        <? } else { ?>
                            <a class="abm-header-col" href='javascript:load_orden(1,"aoorigen");'>
                                Origen</a>
                        <? } ?>
                    </th>
                    <th>
                        <? if ($ordenar == "mdescr" && $ascdesc == "asc") { ?>
                            <a class="abm-header-col" href='javascript:load_orden(1,"dmdescr");'>
                                Motivo <i class="fas fa-caret-up"></i></a>
                        <? } else if ($ordenar == "mdescr" && $ascdesc == "desc") { ?>
                            <a class="abm-header-col" href='javascript:load_orden(1,"amdescr");'>
                                Motivo <i class="fas fa-caret-down"></i></a>
                        <? } else { ?>
                            <a class="abm-header-col" href='javascript:load_orden(1,"amdescr");'>
                                Motivo</a>
                        <? } ?>
                    </th>
                    <th colspan="1">
                        <? if ($ordenar == "tapellido" && $ascdesc == "asc") { ?>
                            <a class="abm-header-col" href='javascript:load_orden(1,"dtapellido");'>
                                Consultante <i class="fas fa-caret-up"></i></a>
                        <? } else if ($ordenar == "tapellido" && $ascdesc == "desc") { ?>
                            <a class="abm-header-col" href='javascript:load_orden(1,"atapellido");'>
                                Consultante <i class="fas fa-caret-down"></i></a>
                        <? } else { ?>
                            <a class="abm-header-col" href='javascript:load_orden(1,"atapellido");'>
                                Consultante</a>
                        <? } ?>
                    </th>
                    <th colspan="1">
                        <? if ($ordenar == "vapellido" && $ascdesc == "asc") { ?>
                            <a class="abm-header-col" href='javascript:load_orden(1,"dvapellido");'>
                                Victima <i class="fas fa-caret-up"></i></a>
                        <? } else if ($ordenar == "vapellido" && $ascdesc == "desc") { ?>
                            <a class="abm-header-col" href='javascript:load_orden(1,"avapellido");'>
                                Victima <i class="fas fa-caret-down"></i></a>
                        <? } else { ?>
                            <a class="abm-header-col" href='javascript:load_orden(1,"avapellido");'>
                                Victima</a>
                        <? } ?>
                    </th>
                    <th colspan="1">
                        <? if ($ordenar == "aapellido" && $ascdesc == "asc") { ?>
                            <a class="abm-header-col" href='javascript:load_orden(1,"daapellido");'>
                                Agresor <i class="fas fa-caret-up"></i></a>
                        <? } else if ($ordenar == "aapellido" && $ascdesc == "desc") { ?>
                            <a class="abm-header-col" href='javascript:load_orden(1,"aaapellido");'>
                                Agresor <i class="fas fa-caret-down"></i></a>
                        <? } else { ?>
                            <a class="abm-header-col" href='javascript:load_orden(1,"aaapellido");'>
                                Agresor</a>
                        <? } ?>
                    </th>
                    <th>
                        <? if ($ordenar == "fechafin" && $ascdesc == "asc") { ?>
                            <a class="abm-header-col" href='javascript:load_orden(1,"dfechafin");'>
                                Fecha<? /* de última<br/>actualizacion */ ?> <i class="fas fa-caret-up"></i></a>
                        <? } else if ($ordenar == "fechafin" && $ascdesc == "desc") { ?>
                            <a class="abm-header-col" href='javascript:load_orden(1,"afechafin");'>
                                Fecha<? /* de última<br/>actualizacion */ ?> <i class="fas fa-caret-down"></i></a>
                        <? } else { ?>
                            <a class="abm-header-col" href='javascript:load_orden(1,"afechafin");'>
                                Fecha<? /* de última<br/>actualizacion */ ?></a>
                        <? } ?>
                    </th>
                    <th>
                         <? if ($ordenar == "coentradas" && $ascdesc == "asc") { ?>
                            <a class="abm-header-col" href='javascript:load_orden(1,"dcoentradas");'>
                                Observ. <i class="fas fa-caret-up"></i></a>
                        <? } else if ($ordenar == "coentradas" && $ascdesc == "desc") { ?>
                            <a class="abm-header-col" href='javascript:load_orden(1,"acoentradas");'>
                                Observ. <i class="fas fa-caret-down"></i></a>
                        <? } else { ?>
                            <a class="abm-header-col" href='javascript:load_orden(1,"acoentradas");'>
                                Observ.</a>
                        <? } ?>
                    </th>
                    <th>
                        <? if ($ordenar == "user" && $ascdesc == "asc") { ?>
                            <a class="abm-header-col" href='javascript:load_orden(1,"duser");'>
                                Usuario <i class="fas fa-caret-up"></i></a>
                        <? } else if ($ordenar == "user" && $ascdesc == "desc") { ?>
                            <a class="abm-header-col" href='javascript:load_orden(1,"auser");'>
                                Usuario <i class="fas fa-caret-down"></i></a>
                        <? } else { ?>
                            <a class="abm-header-col" href='javascript:load_orden(1,"auser");'>
                                Usuario</a>
                        <? } ?>
                    </th>
                    <th>
                        <? if ($ordenar == "ceditando" && $ascdesc == "asc") { ?>
                            <a class="abm-header-col" href='javascript:load_orden(1,"dceditando");'>
                                Editando <i class="fas fa-caret-up"></i></a>
                        <? } else if ($ordenar == "ceditando" && $ascdesc == "desc") { ?>
                            <a class="abm-header-col" href='javascript:load_orden(1,"aceditando");'>
                                Editando <i class="fas fa-caret-down"></i></a>
                        <? } else { ?>
                            <a class="abm-header-col" href='javascript:load_orden(1,"aceditando");'>
                                Editando</a>
                        <? } ?>
                    </th>


                    <th class="tabla-acciones text-center" >Acciones</th>

                </tr>

                <?php
                while ($row = mysqli_fetch_array($query)) {
                    $id_caso = $row['idcaso'];
                    $bucancelado = $row['ccancelado'];
                    $bfecha_f = strtotime($row['fechafin']);
                    $bfecha_f = date("d/m/y" /* g:i A" */, $bfecha_f);
                    $borigen = $row['oorigen'];
                    $bmotivo = $row['mdescr'];
                    $bcapellido = $row['tapellido'];
                    $bcnombre = $row['tnombre'];
                    $bvapellido = $row['vapellido'];
                    $bvnombre = $row['vnombre'];
                    $baapellido = $row['aapellido'];
                    $banombre = $row['anombre'];
                    $buactivo = $row['ceditando'];
                    $bcant_entradas = $row['coentradas'];
                    
                    if ($bcapellido <> "" && $bcnombre <> "") {

                        $bcapnom = ucwords(strtolower($bcapellido . ", " . $bcnombre));
                    } else if ($bcapellido <> "") {
                        $bcapnom = ucwords(strtolower($bcapellido));
                    } else {
                        $bcapnom = ucwords(strtolower($bcnombre));
                    }
                    if ($bvapellido <> "" && $bvnombre <> "") {
                        $bvapnom = ucwords(strtolower($bvapellido . ", " . $bvnombre));
                    } else if ($bvapellido <> "") {
                        $bvapnom = ucwords(strtolower($bvapellido));
                    } else {
                        $bvapnom = ucwords(strtolower($bvnombre));
                    }
                    if ($baapellido <> "" && $banombre <> "") {
                        $baapnom = ucwords(strtolower($baapellido . ", " . $banombre));
                    } else if ($baapellido <> "") {
                        $baapnom = ucwords(strtolower($baapellido));
                    } else {
                        $baapnom = ucwords(strtolower($banombre));
                    }

                    $buser = $row['user'];
                    $beditpor = $row['ceditpor'];
                    $beditporuser = $row['ceditporuser'];
                    ?>
                    <? /* <input type="hidden" value="<?php echo $bfecha_i; ?>" id="edescr<?php echo $id_caso; ?>">
                      <input type="hidden" value="<?php echo $bfecha_f; ?>" id="eactivo<?php echo $id_caso; ?>"> */ ?>


                    <tr>
                        <td <?
                        if ($bucancelado == "s") {
                            echo "class='abm-disabled'";
                        }
                        ?>>
                                <?= $id_caso ?>
                        </td>
                        <td <?
                        if ($bucancelado == "s") {
                            echo "class='abm-disabled'";
                        }
                        ?>><?= $borigen ?></td>
                        <td <?
                        if ($bucancelado == "s") {
                            echo "class='abm-disabled'";
                        }
                        ?>><?= $bmotivo ?></td>
                        <td <?
                        if ($bucancelado == "s") {
                            echo "class='abm-disabled'";
                        }
                        ?>><?= $bcapnom ?></td>
                            <? /* <td <? 
                              if ($bucancelado == "s") {
                              echo "class='abm-disabled'";
                              }
                              ?>><?= $bcnombre?></td> */ ?>
                        <td <?
                        if ($bucancelado == "s") {
                            echo "class='abm-disabled'";
                        }
                        ?>><?= $bvapnom/* $bvapellido */ ?></td>
                            <? /* <td <? 
                              if ($bucancelado == "s") {
                              echo "class='abm-disabled'";
                              }
                              ?>><?= $bvnombre?></td> */ ?>
                        <td <?
                        if ($bucancelado == "s") {
                            echo "class='abm-disabled'";
                        }
                        ?>><?= $baapnom ?></td>
                            <? /* <td <? 
                              if ($bucancelado == "s") {
                              echo "class='abm-disabled'";
                              }
                              ?>><?= $banombre?></td>?> */ ?>
                        <td <?
                        if ($bucancelado == "s") {
                            echo "class='abm-disabled'";
                        }
                        ?>><?= $bfecha_f ?></td>
                        <td <?
                        if ($bucancelado == "s") {
                            echo "class='abm-disabled'";
                        }
                        ?>><? if ($bcant_entradas == null) {echo "0";} else {echo $bcant_entradas;}?></td>
                        <td <?
                        if ($bucancelado == "s") {
                            echo "class='abm-disabled'";
                        }
                        ?>><?= $buser ?></td>
                        <td <?
                        if ($bucancelado == "s") {
                            echo "class='abm-disabled'";
                        }
                        ?>><?= $beditporuser ?></td>

                        <?
                        if ($bucancelado == "s") {
                            if ($_SESSION['acceso'] != "a") {
                                ?>
                                <td class="tabla-acciones text-center">
                                    <a href="<?= $hostactual . "caso-" . $id_caso ?>" class='btn btn-light btn-buscar btn-acciones' title='Ver caso'><i class="far fa-eye"></i></i></a> 
                                </td>
                                <?/*<td class='abm-disabled'>Cancelado</td>*/?>
                                <?
                            } else {
                                ?>
                                <td class="tabla-acciones text-center">
                                    <a href="<?= $hostactual . "caso-" . $id_caso ?>" class='btn btn-light btn-buscar btn-acciones' title='Ver caso'><i class="far fa-eye"></i></i></a> 
                                    <button onclick="recuperar_caso('<?php echo $id_caso; ?>');" class='btn btn-light btn-buscar btn-acciones' data-toggle="modal" data-target="#recuperar_caso" title='Recuperar caso' ><i class="fas fa-undo-alt"></i></button> 
                                </td>
                                <?
                            }
                        } else {
                            ?>
                            <td class="tabla-acciones text-center">
                                <a href="<?= $hostactual . "caso-" . $id_caso ?>" class='btn btn-light btn-buscar btn-acciones' title='Ver caso'><i class="far fa-eye"></i></i></a> 
                                <? if ($_SESSION['acceso'] != "l") { ?>
                                    <a href="<?= $hostactual . "modificar-caso-" . $id_caso ?>" class='btn btn-light btn-buscar btn-acciones' title='Modificar caso'><i class="fas fa-edit"></i></a> 
                                <? } ?>
                                <? if ($_SESSION['acceso'] == "s" || $_SESSION['acceso'] == "a" || $_SESSION['acceso'] == "o") { ?>
                                    <? if ($buactivo == "s" && ($_SESSION['acceso'] != "o" || $_SESSION['user_id'] == $beditpor)) { ?>
                                        <button onclick="desbloquear_caso('<?php echo $id_caso; ?>');" class='btn btn-light btn-buscar btn-acciones' data-toggle="modal" data-target="#toggle_activo" title='Desbloquear caso' ><i class="fas fa-lock-open"></i></button> 
                                        <? /* <button onclick="toggle_active('<?php echo $id_usuario; ?>', 'n')"  href="#" class='btn btn-light btn-buscar btn-acciones' title='Deshabilitar usuario' ><i class="fas fa-ban"></i></button> */ ?>
                                        <?
                                    }
                                }
                                ?>

                            </td>
                    <? } ?>

                    </tr>
                    <?php
                }
                ?>
                <tr>
                    <td colspan="13" class="text-center abm-footer"><?php
                echo paginate($reload, $page, $total_pages, $adjacents);
                ?></td>
                </tr>
            </table>
        </div>
        <?php
    }
}

