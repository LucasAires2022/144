<?php
include('is_logged.php'); //Archivo verifica que el usario que intenta acceder a la URL esta logueado
/* Connect To Database */
if (!isset($con)) {
    require_once ("../config/conexion.php"); //Contiene funcion que conecta a la base de datos
}
//require_once ("../config/funciones.php");//Contiene funciones varias
require_once ("../include/utiles.inc.php"); //Contiene funciones varias




$action = (isset($_REQUEST['action']) && $_REQUEST['action'] != NULL) ? $_REQUEST['action'] : '';
/* if (isset($_GET['id'])) {
  $estado = $_GET['act'];
  $numero_residencia = intval($_GET['id']);
  $upd1 = "UPDATE lugar_residencia SET activo = '$estado' WHERE id= $numero_residencia";

  if ($update1 = mysqli_query($con, $upd1)) {
  if ($estado == "n") {
  echo 1;
  } else {
  echo 2;
  }
  } else {
  if ($estado == "n") {
  echo 3;
  } else {
  echo 4;
  }
  }
  } */

if ($action == 'ajax') {

    $sqlorden = "SELECT * FROM derivacion WHERE motivo_consulta_id = 3 AND orden = (SELECT MAX( orden )  FROM derivacion WHERE motivo_consulta_id = 3);";
    /*
      SELECT *
      FROM lugar_residencia
      WHERE orden = (
      SELECT MAX( orden )  FROM lugar_residencia)
     */
    $query_max_orden = mysqli_query($con, $sqlorden);
    $query_max_orden_num = mysqli_num_rows($query_max_orden);
    $max_orden = 0;
    $min_orden = 1;
    if ($query_max_orden_num == 1) {
        $row = mysqli_fetch_array($query_max_orden);
        $max_orden = $row['orden'];
    }

    // escaping, additionally removing everything that could be (html/javascript-) code
    $q = mysqli_real_escape_string($con, (strip_tags($_REQUEST['q'], ENT_QUOTES)));
    $ordenar = $_GET['orden'];

    /* con_log("orden: " . $ordenar); */
    if (isset($ordenar) && $ordenar != "") {
        /* con_log("pasa2"); */
        $_SESSION['orden_abm_derivacion_m'] = $ordenar;
        /* con_log("orden session es  ".$_SESSION['orden_abm_residencia'] . " y ordenar es $ordenar"); */
        $ascdesc = substr($ordenar, 0, 1);
        $ordenar = substr($ordenar, 1);
    } else {
        $ascdesc = "a";
        $ordenar = "Id";
    }
    if ($ascdesc == "a") {
        $ascdesc = "asc";
    } else {
        $ascdesc = "desc";
    }
    /* con_log("orden es $ordenar y ascdesc es $ascdesc"); */

    $sWhere = " WHERE (motivo_consulta_id = 3) ";

    if (/* $_GET['q'] */$q != "") {

        $criterio = explode(" ", /* $_GET['q'] */ $q);


        foreach ($criterio as $cri) {
            $cri = trim($cri);

            $sWhere .= " AND (descr like '%$cri%') ";

            /* con_log("Cri es:$cri"); */
        }
        /* con_log("sWhere es:$sWhere"); */
    }
    //con_log("ordenar es:$ordenar");
    $sWhere .= " ORDER BY $ordenar $ascdesc";
    //con_log("sql es: SELECT count(*) AS numrows FROM lugar_residencia  $sWhere");
    include 'pagination.php'; //include pagination file
    //pagination variables
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $per_page = 50; //how much records you want to show
    $adjacents = 3; //gap between pages after number of adjacents
    $offset = ($page - 1) * $per_page;
    //Count the total number of row in your table*/
    $count_query = mysqli_query($con, "SELECT count(*) AS numrows FROM derivacion $sWhere");
    $row = mysqli_fetch_array($count_query);
    $numrows = $row['numrows'];
    $total_pages = ceil($numrows / $per_page);
    $reload = '../abm/derivacion_maltrato.php';
    //main query to fetch the data
    $sql = "SELECT * FROM derivacion $sWhere LIMIT $offset,$per_page";
    $query = mysqli_query($con, $sql);
    //loop through fetched data
    if ($numrows > 0) {
        echo mysqli_error($con);
        ?>
        <div class="table-responsive">
            <table class="table table-hover <? /* table-striped table-bordered table-hover */ ?>" style="margin-bottom:0px;">
                <tr  class="abm-header">

                    <th class="">
                        <? if ($ordenar == "orden" && $ascdesc == "asc") { ?>
                            <a class="abm-header-col" href='javascript:load_orden(1,"dorden");'>
                                Orden <i class="fas fa-caret-up"></i></a>
                        <? } else if ($ordenar == "orden" && $ascdesc == "desc") { ?>
                            <a class="abm-header-col" href='javascript:load_orden(1,"aorden");'>
                                Orden <i class="fas fa-caret-down"></i></a>
                        <? } else { ?>
                            <a class="abm-header-col" href='javascript:load_orden(1,"aorden");'>
                                Orden <i class="fas fa-caret-down" style='color:transparent;'></a>
                        <? } ?>
                    </th>
                    <th class="">
                        <? if ($ordenar == "descr" && $ascdesc == "asc") { ?>
                            <a class="abm-header-col" href='javascript:load_orden(1,"ddescr");'>
                                Vínculo <i class="fas fa-caret-up"></i></a>
                        <? } else if ($ordenar == "descr" && $ascdesc == "desc") { ?>
                            <a class="abm-header-col" href='javascript:load_orden(1,"adescr");'>
                                Vínculo <i class="fas fa-caret-down"></i></a>
                        <? } else { ?>
                            <a class="abm-header-col" href='javascript:load_orden(1,"adescr");'>
                                Vínculo <i class="fas fa-caret-down" style='color:transparent;'></a>
                        <? } ?>
                    </th>

                    <th class="tabla-acciones text-center">Mover</th>
                    <th class="tabla-acciones text-center">Acciones</th>

                </tr>
                <?php
                while ($row = mysqli_fetch_array($query)) {
                    $id_dato = $row['id'];
                    $budescr = $row['descr'];
                    $buactivo = $row['activo'];
                    $buorden = $row['orden'];
                    ?>
                    <input type="hidden" value="<?php echo $budescr; ?>" id="edescr<?php echo $id_dato; ?>">
                    <input type="hidden" value="<?php echo $buactivo; ?>" id="eactivo<?php echo $id_dato; ?>">
                    <input type="hidden" value="<?php echo $buorden; ?>" id="eorden<?php echo $id_dato; ?>">

                    <tr>
                        <td <?
                        if ($buactivo == "n") {
                            echo "class='abm-disabled'";
                        }
                        ?>>
                                <?php echo $buorden; ?>

                        </td>
                        <td <?
                        if ($buactivo == "n") {
                            echo "class='abm-disabled'";
                        }
                        ?>><?php echo $budescr; ?></td>

                        <td class="tabla-acciones text-center">
                            <? if ($buorden > $min_orden) { ?>
                                <a href="javascript:mover('<?php echo $id_dato; ?>', '<? echo $buorden; ?>','u', '<? echo $_GET['orden']; ?>' )" class='abm-header-col' title='Subir' ><i class="fas fa-chevron-up" <? /* style="font-size:1.2rem;" */ ?>></i></a> 
                                <?
                                if ($max_orden == 0 || $buorden < $max_orden) {
                                    ?>&nbsp;&nbsp;<?
                                    }
                                } /* else { ?>
                                  <span class='abm-disabled'><i class="fas fa-chevron-up"></i></span>
                                  <? } */
                                ?>

                            <? if ($max_orden == 0 || $buorden < $max_orden) { ?>
                                <a href="javascript:mover('<?php echo $id_dato; ?>', '<? echo $buorden; ?>','d', '<? echo $_GET['orden']; ?>' )" class='abm-header-col' title='Bajar' ><i class="fas fa-chevron-down" <? /* style="font-size:1.2rem;" */ ?>></i></a> 
                            <? } /* else { ?>
                              <span class='abm-disabled'><i class="fas fa-chevron-down"></i></span>
                              <? } */ ?>

                        </td>
                        <td class="tabla-acciones text-center">
                            <button onclick="obtener_datos('<?php echo $id_dato; ?>');" class='btn btn-light btn-buscar btn-acciones' data-toggle="modal" data-target="#myModal2" title='Modificar vínculo' ><i class="fas fa-edit"></i></button> 
                            <? if ($buactivo == "s") { ?>
                                <button onclick="obtener_datos_toggle('<?php echo $id_dato; ?>', 'n');" class='btn btn-light btn-buscar btn-acciones' data-toggle="modal" data-target="#toggle_activo" title='Deshabilitar vínculo' ><i class="fas fa-ban"></i></button> 
                                <? /* <button onclick="toggle_active('<?php echo $id_residencia; ?>', 'n')" class='btn btn-light btn-buscar btn-acciones' title='Deshabilitar lugar de residencia' ><i class="fas fa-ban"></i></button> */ ?>
                            <? } else { ?>
                                <button onclick="obtener_datos_toggle('<?php echo $id_dato; ?>', 's');" class='btn btn-light btn-buscar btn-acciones' data-toggle="modal" data-target="#toggle_activo" title='Habilitar vínculo' ><i class="far fa-check-circle"></i></button> 
                                <? /* <button onclick="toggle_active('<?php echo $id_residencia; ?>', 's')" class='btn btn-light btn-buscar btn-acciones' title='Habilitar lugar de residencia' ><i class="far fa-check-circle"></i></button> */ ?>
                            <? } ?>
                        </td>

                    </tr>
                    <?php
                }
                ?>
                <tr>
                    <td colspan=10 class="text-center abm-footer"><?php
                        echo paginate($reload, $page, $total_pages, $adjacents);
                        ?></td>
                </tr>
            </table>
        </div>
        <?php
    } else {
        echo "<div style='width:100%;text-align:center;'>No se han encontrado resultados</div>";
    }
}

