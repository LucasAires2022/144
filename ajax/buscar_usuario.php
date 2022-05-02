<?php
include('is_logged.php'); //Archivo verifica que el usario que intenta acceder a la URL esta logueado
/* Connect To Database */
if (!isset($con)) {
    require_once ("../config/conexion.php"); //Contiene funcion que conecta a la base de datos
}
//require_once ("../config/funciones.php");//Contiene funciones varias
require_once ("../include/utiles.inc.php"); //Contiene funciones varias




$action = (isset($_REQUEST['action']) && $_REQUEST['action'] != NULL) ? $_REQUEST['action'] : '';
/*if (isset($_GET['id'])) {
    $estado = $_GET['act'];
    $numero_usuario = intval($_GET['id']);
    $upd1 = "UPDATE usuarios SET activo = '$estado' WHERE id= $numero_usuario";
    
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
}*/

if ($action == 'ajax') {
    // escaping, additionally removing everything that could be (html/javascript-) code
    $q = mysqli_real_escape_string($con, (strip_tags($_REQUEST['q'], ENT_QUOTES)));
    $ordenar = $_GET['orden'];
    
    //con_log("orden: " . $ordenar);
    if (isset($ordenar) && $ordenar != "") {
        $_SESSION['orden_abm_usuarios'] = $ordenar;
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
    //con_log("orden es $ordenar y ascdesc es $ascdesc");
    if (!isset($sWhere)) {
        $sWhere = "";
    }
    if (/* $_GET['q'] */$q != "") {

        $criterio = explode(" ", /* $_GET['q'] */ $q);

        $contador = 0;
        foreach ($criterio as $cri) {
            $cri = trim($cri);
            if ($contador == 0) {
                $sWhere = " WHERE (nombre like '%$cri%' OR usuario like '%$cri%') ";
            } else {
                $sWhere .= " AND (nombre like '%$cri%' OR usuario like '%$cri%') ";
            }
            $contador++;
            /* con_log("Cri es:$cri"); */
        }
        /* con_log("sWhere es:$sWhere"); */
        /*

          $criterio[0] = trim($criterio[0]);

          $criterio[1] = trim($criterio[1]);

          $criterio[2] = trim($criterio[2]);


          $sWhere= " WHERE (nombre like '%$criterio[0]%' OR usuario like '%$criterio[0]%') ";

          if ($criterio[1] != "") {
          $sWhere.= " AND (nombre like '%$criterio[1]%' OR usuario like '%$criterio[1]%') ";
          }

          if ($criterio[2] != "") {
          $sWhere.= " AND (nombre like '%$criterio[2]%' OR servicio like '%$criterio[2]%') ";
          } */
    }
    //con_log("ordenar es:$ordenar");
    $sWhere .= " ORDER BY $ordenar $ascdesc";
    //con_log("sql es: SELECT count(*) AS numrows FROM usuarios  $sWhere");
    include 'pagination.php'; //include pagination file
    //pagination variables
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $per_page = 50; //how much records you want to show
    $adjacents = 3; //gap between pages after number of adjacents
    $offset = ($page - 1) * $per_page;
    //Count the total number of row in your table*/
    $count_query = mysqli_query($con, "SELECT count(*) AS numrows FROM usuarios  $sWhere");
    $row = mysqli_fetch_array($count_query);
    $numrows = $row['numrows'];
    $total_pages = ceil($numrows / $per_page);
    $reload = '../abm/usuarios.php';
    //main query to fetch the data
    $sql = "SELECT * FROM usuarios $sWhere LIMIT $offset,$per_page";
    $query = mysqli_query($con, $sql);
    //loop through fetched data
    if ($numrows > 0) {
        echo mysqli_error($con);
        ?>
        <div class="table-responsive">
            <table class="table table-hover <? /* table-striped table-bordered  */ ?>" style="margin-bottom:0px;">
                <tr  class="abm-header">
                    <th class="" style="min-width: 45px;">
                        <? if ($ordenar == "Id" && $ascdesc == "asc") { ?>
                            <a class="abm-header-col" href='javascript:load_orden(1,"dId");'>
                                Id <i class="fas fa-caret-up"></i></a>
                        <? } else if ($ordenar == "Id" && $ascdesc == "desc") { ?>
                            <a class="abm-header-col" href='javascript:load_orden(1,"aId");'>
                                Id <i class="fas fa-caret-down"></i></a>
                        <? } else { ?>
                            <a class="abm-header-col" href='javascript:load_orden(1,"aId");'>
                                Id <i class="fas fa-caret-down" style='color:transparent;'></i></a>
                        <? } ?>
                    </th>
                    <th class="">
                        <? if ($ordenar == "usuario" && $ascdesc == "asc") { ?>
                            <a class="abm-header-col" href='javascript:load_orden(1,"dusuario");'>
                                Usuario <i class="fas fa-caret-up"></i></a>
                        <? } else if ($ordenar == "usuario" && $ascdesc == "desc") { ?>
                            <a class="abm-header-col" href='javascript:load_orden(1,"ausuario");'>
                                Usuario <i class="fas fa-caret-down"></i></a>
                        <? } else { ?>
                            <a class="abm-header-col" href='javascript:load_orden(1,"ausuario");'>
                                Usuario <i class="fas fa-caret-down" style='color:transparent;'></a>
                        <? } ?>
                    </th>
                    <th class="">
                        <? if ($ordenar == "nombre" && $ascdesc == "asc") { ?>
                            <a class="abm-header-col" href='javascript:load_orden(1,"dnombre");'>
                                Nombre <i class="fas fa-caret-up"></i></a>
                        <? } else if ($ordenar == "nombre" && $ascdesc == "desc") { ?>
                            <a class="abm-header-col" href='javascript:load_orden(1,"anombre");'>
                                Nombre <i class="fas fa-caret-down"></i></a>
                        <? } else { ?>
                            <a class="abm-header-col" href='javascript:load_orden(1,"anombre");'>
                                Nombre <i class="fas fa-caret-down" style='color:transparent;'></a>
                        <? } ?>
                    </th>
                    <th class="">
                        <? if ($ordenar == "acceso" && $ascdesc == "asc") { ?>
                            <a class="abm-header-col" href='javascript:load_orden(1,"dacceso");'>
                                Acceso <i class="fas fa-caret-up"></i></a>
                        <? } else if ($ordenar == "acceso" && $ascdesc == "desc") { ?>
                            <a class="abm-header-col" href='javascript:load_orden(1,"aacceso");'>
                                Acceso <i class="fas fa-caret-down"></i></a>
                        <? } else { ?>
                            <a class="abm-header-col" href='javascript:load_orden(1,"aacceso");'>
                                Acceso <i class="fas fa-caret-down" style='color:transparent;'></a>
                        <? } ?>
                    </th>
                    <th class="tabla-acciones text-center">Acciones</th>

                </tr>
                <?php
                while ($row = mysqli_fetch_array($query)) {
                    $id_usuario = $row['id'];
                    $buusuario = $row['usuario'];
                    $bunombre = $row['nombre'];
                    $buacceso = $row['acceso'];
                    $buactivo = $row['activo'];
                    ?>
                    <input type="hidden" value="<?php echo $buusuario; ?>" id="eusuario<?php echo $id_usuario; ?>">
                    <input type="hidden" value="<?php echo $bunombre; ?>" id="enombre<?php echo $id_usuario;?>">
                    <input type="hidden" value="<?php echo $buacceso; ?>" id="eacceso<?php echo $id_usuario; ?>">
                    <input type="hidden" value="<?php echo $buactivo; ?>" id="eactivo<?php echo $id_usuario; ?>">
                    

                    <tr <?
                    if (!empty($alerta)) {
                        echo "class=danger data-toggle=tooltip data-placement=center title='$alerta'";
                    }
                    ?>  >

                        <td <?
                        if ($buactivo == "n") {
                            echo "class='abm-disabled'";
                        }
                        ?>><?php echo $id_usuario; ?></td>
                        <td <?
                        if ($buactivo == "n") {
                            echo "class='abm-disabled'";
                        }
                        ?>><?php echo $buusuario; ?></td>
                        <td <?
                        if ($buactivo == "n") {
                            echo "class='abm-disabled'";
                        }
                        ?>><?php echo $bunombre; ?></td>
                        <td <?
                        if ($buactivo == "n") {
                            echo "class='abm-disabled'";
                        }
                        ?>><?php
                                if ($buactivo == "s") {
                                    echo getAcceso($buacceso);
                                } else {
                                    echo "Deshabilitado";
                                }
                                ?></td>

                        <td class="tabla-acciones text-center">
                            <? /* <button onClick="document.location.href = 'ver_usuario.php?id_usuario=<?php echo $id_usuario; ?>'" class='btn btn-light btn-buscar btn-acciones' title='Ver usuario'><i class="fas fa-eye"></i></button> */ ?>
                            <button onclick="obtener_datos('<?php echo $id_usuario; ?>', '<?echo $_SESSION['user_id'];?>');" class='btn btn-light btn-buscar btn-acciones' data-toggle="modal" data-target="#myModal2" title='Modificar usuario' ><i class="fas fa-edit"></i></button> 
                            <button class='btn btn-light btn-buscar btn-acciones' title='Cambiar contraseña' onclick="get_user_id('<?php echo $id_usuario;?>');" data-toggle="modal" data-target="#myModal3"><i class="fas fa-cog"></i></button>
                            <? if ($_SESSION['user_id'] != $id_usuario) { ?>
                                <? if ($buactivo == "s") { ?>
                            <button onclick="obtener_datos_toggle('<?php echo $id_usuario; ?>', 'n');" class='btn btn-light btn-buscar btn-acciones' data-toggle="modal" data-target="#toggle_activo" title='Deshabilitar usuario' ><i class="fas fa-ban"></i></button> 
                                    <?/*<button onclick="toggle_active('<?php echo $id_usuario; ?>', 'n')"  href="#" class='btn btn-light btn-buscar btn-acciones' title='Deshabilitar usuario' ><i class="fas fa-ban"></i></button>*/?>
                                <? } else { ?>
                            <button onclick="obtener_datos_toggle('<?php echo $id_usuario; ?>', 's');" class='btn btn-light btn-buscar btn-acciones' data-toggle="modal" data-target="#toggle_activo" title='Habilitar usuario' ><i class="far fa-check-circle"></i></button> 
                                    <?/*<button onclick="toggle_active('<?php echo $id_usuario; ?>', 's')"  href="#" class='btn btn-light btn-buscar btn-acciones' title='Habilitar usuario' ><i class="far fa-check-circle"></i></button>*/?>
                                <? } ?>
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
?>
