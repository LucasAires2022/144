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
    $q = mysqli_real_escape_string($con, (strip_tags($_REQUEST['q'], ENT_QUOTES)));
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
        $ordenar = "c.id";
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
    if (/* $_GET['q'] */$q != "") {

        $criterio = explode(" ", /* $_GET['q'] */ $q);

        $contador = 0;
        foreach ($criterio as $cri) {
            $cri = trim($cri);
            if ($contador == 0) {
                $sWhere = " WHERE (c.id like '%$cri%') ";
            } else {
                $sWhere .= " AND (c.id like '%$cri%') ";
            }
            $contador++;
            /* con_log("Cri es:$cri"); */
        }
        /* con_log("sWhere es:$sWhere"); */
    }
    //con_log("ordenar es:$ordenar");
    /* if ($sWhere == "") {
      $sWhere .= "WHERE c.cancelado='n' ORDER BY $ordenar $ascdesc";
      } else { */
    $sWhere .= /* "AND c.cancelado='n' */ " ORDER BY $ordenar $ascdesc";
    /* } */

    //con_log("sql es: SELECT count(*) AS numrows FROM lugar_residencia  $sWhere");
    include 'pagination.php'; //include pagination file
    //pagination variables
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $per_page = 25; //how much records you want to show
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
    $sqljoin = "SELECT c.cancelado as ccancelado, c.id as idcaso, o.origen as oorigen, m.descr as mdescr, v.apellido as vapellido, v.nombre as vnombre, t.apellido as tapellido, t.nombre as tnombre, a.apellido as aapellido, a.nombre as anombre, c.fecha_fin as fechafin, c.usuario as user "
            . "FROM caso c "
            . "LEFT JOIN origen_llamado o ON o.id = c.origen_id "
            . "LEFT JOIN motivo_consulta m ON m.id = c.motivo_consulta_id "
            . "LEFT JOIN victima v ON v.id = c.victima_id "
            . "LEFT JOIN consultante t ON t.id = c.consultante_id "
            . "LEFT JOIN agresor a ON a.id = c.agresor_id ";
    $sqljoincount = "SELECT count(*) AS numrows, c.cancelado as ccancelado, c.id as idcaso, o.origen as oorigen, m.descr as mdescr, v.apellido as vapellido, v.nombre as vnombre, t.apellido as tapellido, t.nombre as tnombre, a.apellido as aapellido, a.nombre as anombre, c.fecha_fin as fechafin, c.usuario as user  "
            . "FROM caso c "
            . "LEFT JOIN origen_llamado o ON o.id = c.origen_id "
            . "LEFT JOIN motivo_consulta m ON m.id = c.motivo_consulta_id "
            . "LEFT JOIN victima v ON v.id = c.victima_id "
            . "LEFT JOIN consultante t ON t.id = c.consultante_id "
            . "LEFT JOIN agresor a ON a.id = c.agresor_id ";
    $count_query = mysqli_query($con, "$sqljoincount $sWhere");
    //con_log($sqljoincount . $sWhere);
    $row = mysqli_fetch_array($count_query);
    $numrows = $row['numrows'];
    $total_pages = ceil($numrows / $per_page);
    $reload = '../buscador.php';
    //main query to fetch the data
    $sql = "$sqljoin $sWhere LIMIT $offset,$per_page";
    $query = mysqli_query($con, $sql);
    //loop through fetched data
    if ($numrows > 0) {
        echo mysqli_error($con);
        ?>
        <div class="table-responsive">
            <table class="table table-hover <? /* table-striped table-bordered table-hover */ ?> text-center" style="margin-bottom:0px;">
                <tr  class="abm-header">
                    <th class="" rowspan="2" style="min-width: 45px;">
                        <? if ($ordenar == "idcaso" && $ascdesc == "asc") { ?>
                            <a class="abm-header-col" href='javascript:load_orden(1,"didcaso");'>
                                Caso Nº <i class="fas fa-caret-up"></i></a>
                        <? } else if ($ordenar == "idcaso" && $ascdesc == "desc") { ?>
                            <a class="abm-header-col" href='javascript:load_orden(1,"aidcaso");'>
                                Caso Nº <i class="fas fa-caret-down"></i></a>
                        <? } else { ?>
                            <a class="abm-header-col" href='javascript:load_orden(1,"aidcaso");'>
                                Caso Nº <i class="fas fa-caret-down" style='display:none;color:transparent;'></i></a>
                        <? } ?>
                    </th>
                    <th class="" rowspan="2">
                        <? if ($ordenar == "oorigen" && $ascdesc == "asc") { ?>
                            <a class="abm-header-col" href='javascript:load_orden(1,"doorigen");'>
                                Origen <i class="fas fa-caret-up"></i></a>
                        <? } else if ($ordenar == "oorigen" && $ascdesc == "desc") { ?>
                            <a class="abm-header-col" href='javascript:load_orden(1,"aoorigen");'>
                                Origen <i class="fas fa-caret-down"></i></a>
                        <? } else { ?>
                            <a class="abm-header-col" href='javascript:load_orden(1,"aoorigen");'>
                                Origen <i class="fas fa-caret-down" style='display:none;color:transparent;'></i></a>
                        <? } ?>
                    </th>
                    <th class="" rowspan="2">
                        <? if ($ordenar == "mdescr" && $ascdesc == "asc") { ?>
                            <a class="abm-header-col" href='javascript:load_orden(1,"dmdescr");'>
                                Motivo <i class="fas fa-caret-up"></i></a>
                        <? } else if ($ordenar == "mdescr" && $ascdesc == "desc") { ?>
                            <a class="abm-header-col" href='javascript:load_orden(1,"amdescr");'>
                                Motivo <i class="fas fa-caret-down"></i></a>
                        <? } else { ?>
                            <a class="abm-header-col" href='javascript:load_orden(1,"amdescr");'>
                                Motivo <i class="fas fa-caret-down" style='display:none;color:transparent;'></i></a>
                        <? } ?>
                    </th>
                    <th class="justify-content-center" colspan="2">
                        Consultante
                    </th>
                    <th class="justify-content-center" colspan="2">
                        Victima
                    </th>
                    <th class="justify-content-center" colspan="2">
                        Agresor
                    </th>
                    <th class="" rowspan="2">
                        <? if ($ordenar == "fechafin" && $ascdesc == "asc") { ?>
                            <a class="abm-header-col" href='javascript:load_orden(1,"dfechafin");'>
                                Fecha<? /* de última<br/>actualizacion */ ?> <i class="fas fa-caret-up"></i></a>
                        <? } else if ($ordenar == "fechafin" && $ascdesc == "desc") { ?>
                            <a class="abm-header-col" href='javascript:load_orden(1,"afechafin");'>
                                Fecha<? /* de última<br/>actualizacion */ ?> <i class="fas fa-caret-down"></i></a>
                        <? } else { ?>
                            <a class="abm-header-col" href='javascript:load_orden(1,"afechafin");'>
                                Fecha<? /* de última<br/>actualizacion */ ?> <i class="fas fa-caret-down" style='display:none;color:transparent;'></i></a>
                        <? } ?>
                    </th>
                    <th class="" rowspan="2">
                        <? if ($ordenar == "user" && $ascdesc == "asc") { ?>
                            <a class="abm-header-col" href='javascript:load_orden(1,"duser");'>
                                Usuario<? /* de última<br/>actualizacion */ ?> <i class="fas fa-caret-up"></i></a>
                        <? } else if ($ordenar == "user" && $ascdesc == "desc") { ?>
                            <a class="abm-header-col" href='javascript:load_orden(1,"auser");'>
                                Usuario<? /* de última<br/>actualizacion */ ?> <i class="fas fa-caret-down"></i></a>
                        <? } else { ?>
                            <a class="abm-header-col" href='javascript:load_orden(1,"auser");'>
                                Usuario<? /* de última<br/>actualizacion */ ?> <i class="fas fa-caret-down" style='display:none;color:transparent;'></i></a>
                        <? } ?>
                    </th>


                    <th class="tabla-acciones text-center" rowspan="2">Acciones</th>

                </tr>
                <tr  class="abm-header">
                    <th class="">
                        <? if ($ordenar == "tapellido" && $ascdesc == "asc") { ?>
                            <a class="abm-header-col" href='javascript:load_orden(1,"dtapellido");'>
                                Apellido <i class="fas fa-caret-up"></i></a>
                        <? } else if ($ordenar == "tapellido" && $ascdesc == "desc") { ?>
                            <a class="abm-header-col" href='javascript:load_orden(1,"atapellido");'>
                                Apellido <i class="fas fa-caret-down"></i></a>
                        <? } else { ?>
                            <a class="abm-header-col" href='javascript:load_orden(1,"atapellido");'>
                                Apellido</a>
                        <? } ?>
                    </th>
                    <th class="">
                        <? if ($ordenar == "tnombre" && $ascdesc == "asc") { ?>
                            <a class="abm-header-col" href='javascript:load_orden(1,"dtnombre");'>
                                Nombre <i class="fas fa-caret-up"></i></a>
                        <? } else if ($ordenar == "tnombre" && $ascdesc == "desc") { ?>
                            <a class="abm-header-col" href='javascript:load_orden(1,"atnombre");'>
                                Nombre <i class="fas fa-caret-down"></i></a>
                        <? } else { ?>
                            <a class="abm-header-col" href='javascript:load_orden(1,"atnombre");'>
                                Nombre</a>
                        <? } ?>
                    </th>
                    <th class="">
                        <? if ($ordenar == "vapellido" && $ascdesc == "asc") { ?>
                            <a class="abm-header-col" href='javascript:load_orden(1,"dvapellido");'>
                                Apellido <i class="fas fa-caret-up"></i></a>
                        <? } else if ($ordenar == "vapellido" && $ascdesc == "desc") { ?>
                            <a class="abm-header-col" href='javascript:load_orden(1,"avapellido");'>
                                Apellido <i class="fas fa-caret-down"></i></a>
                        <? } else { ?>
                            <a class="abm-header-col" href='javascript:load_orden(1,"avapellido");'>
                                Apellido</a>
                        <? } ?>
                    </th>
                    <th class="">
                        <? if ($ordenar == "vnombre" && $ascdesc == "asc") { ?>
                            <a class="abm-header-col" href='javascript:load_orden(1,"dvnombre");'>
                                Nombre <i class="fas fa-caret-up"></i></a>
                        <? } else if ($ordenar == "vnombre" && $ascdesc == "desc") { ?>
                            <a class="abm-header-col" href='javascript:load_orden(1,"avnombre");'>
                                Nombre <i class="fas fa-caret-down"></i></a>
                        <? } else { ?>
                            <a class="abm-header-col" href='javascript:load_orden(1,"avnombre");'>
                                Nombre</a>
                        <? } ?>
                    </th>
                    <th class="">
                        <? if ($ordenar == "aapellido" && $ascdesc == "asc") { ?>
                            <a class="abm-header-col" href='javascript:load_orden(1,"daapellido");'>
                                Apellido <i class="fas fa-caret-up"></i></a>
                        <? } else if ($ordenar == "aapellido" && $ascdesc == "desc") { ?>
                            <a class="abm-header-col" href='javascript:load_orden(1,"aaapellido");'>
                                Apellido <i class="fas fa-caret-down"></i></a>
                        <? } else { ?>
                            <a class="abm-header-col" href='javascript:load_orden(1,"aaapellido");'>
                                Apellido</a>
                        <? } ?>
                    </th>
                    <th class="">
                        <? if ($ordenar == "anombre" && $ascdesc == "asc") { ?>
                            <a class="abm-header-col" href='javascript:load_orden(1,"danombre");'>
                                Nombre <i class="fas fa-caret-up"></i></a>
                        <? } else if ($ordenar == "anombre" && $ascdesc == "desc") { ?>
                            <a class="abm-header-col" href='javascript:load_orden(1,"aanombre");'>
                                Nombre <i class="fas fa-caret-down"></i></a>
                        <? } else { ?>
                            <a class="abm-header-col" href='javascript:load_orden(1,"aanombre");'>
                                Nombre</a>
                        <? } ?>
                    </th>
                    
                </tr>
                
                <?php
                while ($row = mysqli_fetch_array($query)) {
                    $id_caso = $row['idcaso'];
                    $buactivo = $row['ccancelado'];
                    /* con_log("id: ".$row['idcaso'] . " "); */
                    /* $bfecha_i = $row['fecha_inicio']; */
                    $bfecha_f = strtotime($row['fechafin']);
                    //$fecha_temp = strtotime($bfecha_f);
                    $bfecha_f = date("d/m/y" /* g:i A" */, $bfecha_f);
                    $borigen = $row['oorigen'];
                    $bmotivo = $row['mdescr'];
                    $bcapellido = $row['tapellido'];
                    $bcnombre = $row['tnombre'];
                    $bvapellido = $row['vapellido'];
                    $bvnombre = $row['vnombre'];
                    $baapellido = $row['aapellido'];
                    $banombre = $row['anombre'];
                    $buser = $row['user'];
                    ?>
                    <?/*<input type="hidden" value="<?php echo $bfecha_i; ?>" id="edescr<?php echo $id_caso; ?>">
                    <input type="hidden" value="<?php echo $bfecha_f; ?>" id="eactivo<?php echo $id_caso; ?>">*/?>


                    <tr>
                        <td <?
                        if ($buactivo == "n") {
                            echo "class='abm-disabled'";
                        }
                        ?>>
                        <?= $id_caso ?>
                        </td>
                        <td <? 
                          if ($buactivo == "n") {
                          echo "class='abm-disabled'";
                          } 
                        ?>><?= $borigen ?></td>
                        <td <? 
                          if ($buactivo == "n") {
                          echo "class='abm-disabled'";
                          } 
                        ?>><?= $bmotivo ?></td>
                        <td <? 
                          if ($buactivo == "n") {
                          echo "class='abm-disabled'";
                          } 
                        ?>><?= $bcapellido ?></td>
                        <td <? 
                          if ($buactivo == "n") {
                          echo "class='abm-disabled'";
                          } 
                        ?>><?= $bcnombre?></td>
                         <td <? 
                          if ($buactivo == "n") {
                          echo "class='abm-disabled'";
                          } 
                        ?>><?= $bvapellido ?></td>
                        <td <? 
                          if ($buactivo == "n") {
                          echo "class='abm-disabled'";
                          } 
                        ?>><?= $bvnombre?></td>
                         <td <? 
                          if ($buactivo == "n") {
                          echo "class='abm-disabled'";
                          } 
                        ?>><?= $baapellido ?></td>
                        <td <? 
                          if ($buactivo == "n") {
                          echo "class='abm-disabled'";
                          } 
                        ?>><?= $banombre?></td>
                        <td <? 
                          if ($buactivo == "n") {
                          echo "class='abm-disabled'";
                          } 
                        ?>><?= $bfecha_f ?></td>
                        <td <? 
                          if ($buactivo == "n") {
                          echo "class='abm-disabled'";
                          } 
                        ?>><?= $buser?></td>
                        <td class="tabla-acciones text-center">
                            <button onclick="obtener_datos('<?php echo $id_caso; ?>');" class='btn btn-light btn-buscar btn-acciones' data-toggle="modal" data-target="#myModal2" title='Ver caso' ><i class="fas fa-edit"></i></button> 

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
    }
}

