<?php
include('is_logged.php'); //Archivo verifica que el usario que intenta acceder a la URL esta logueado
// checking for minimum PHP version
include_once('../include/utiles.inc.php');
if (!empty($_REQUEST['idcaso'])) {
    require_once ("../config/conexion.php"); //Contiene funcion que conecta a la base de datos

    $num_caso = $_REQUEST['idcaso'];

    $sql2 = "SELECT c.seguimiento as cseguimiento, c.fecha_fin as cfechafin, u.usuario as user FROM caso_seguimiento c LEFT JOIN usuarios u ON u.id = c.usuario_id  WHERE caso_id = '" . $num_caso . "' ORDER BY nitem asc";
    $sqlcount2 = "SELECT count(*) AS numseg FROM caso_seguimiento WHERE caso_id = '" . $num_caso . "' ORDER BY nitem asc";
    $querycount2 = mysqli_query($con, $sqlcount2);
    $row = mysqli_fetch_array($querycount2);
    $numseg = $row['numseg'];
    $cs = 0;
    if ($numseg <> 0) {
        $query2 = mysqli_query($con, $sql2);

        while ($row = mysqli_fetch_array($query2)) {
            if ($row['cseguimiento'] <> "") {
                $cs++;
                $c_seguimiento[$cs]['seguimiento'] = $row['cseguimiento'];
                $c_seguimiento[$cs]['fecha'] = $row['cfechafin'];
                $c_seguimiento[$cs]['usuario'] = $row['user'];
            }
        }
    }
    ?>
    <div id="seccionSeguimiento">
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="SeguimientoAB" class=" col-form-label text-right">Seguimientos:</label>
                <div class="table-responsive">
                    <table class="table table-hover <? /* table-striped  table-hover table-bordered */ ?> text-center" style="margin-bottom:0px;">
                        <tr  class="abm-header">
                            <th>
                                <a class="abm-header-col">Seguimiento</a>
                            </th>
                            <th>
                                <a class="abm-header-col">Fecha</a>
                            </th>
                            <th>
                                <a class="abm-header-col">Usuario</a>
                            </th>
                        </tr>
                        <?
                        if ($cs > 0) {
                            for ($xs = 1; $xs <= $cs; $xs++) {
                                $csfecha = strtotime($c_seguimiento[$xs]['fecha']);
                                $csfecha = date("d/m/y - H:i", $csfecha);
                                ?>
                                <tr <?
                                if ($xs == $cs) {
                                    echo 'class="tabla-ultima-linea"';
                                }
                                ?>>
                                    <td>
                                        <?= $c_seguimiento[$xs]['seguimiento'] ?>
                                    </td>
                                    <td>
                                        <?= $csfecha ?>
                                    </td>
                                    <td>
                                        <?= $c_seguimiento[$xs]['usuario'] ?>
                                    </td>
                                </tr>

                                <?
                            }
                        } else {
                            ?>
                            <tr>
                                <td colspan="3">
                                    No se encontraron seguimientos.
                                </td>
                            </tr>
                            <?
                        }
                        ?>
                    </table>
                </div>
            </div>  
        </div>
    </div>
    <?
}

