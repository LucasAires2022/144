<?php
include('is_logged.php'); //Archivo verifica que el usario que intenta acceder a la URL esta logueado
// checking for minimum PHP version
include_once('../include/utiles.inc.php');
if (!empty($_REQUEST['idcaso'])) {
    require_once ("../config/conexion.php"); //Contiene funcion que conecta a la base de datos

    $num_caso = $_REQUEST['idcaso'];

    $sql2 = "SELECT c.observ as cobserv, c.fecha_fin as cfechafin, c.intervencion as cintervencion, u.usuario as user FROM caso_observ c LEFT JOIN usuarios u ON u.id = c.usuario_id  WHERE caso_id = '" . $num_caso . "' ORDER BY nitem asc";
    $sqlcount2 = "SELECT count(*) AS numobs FROM caso_observ WHERE caso_id = '" . $num_caso . "' ORDER BY nitem asc";
    $querycount2 = mysqli_query($con, $sqlcount2);
    $row = mysqli_fetch_array($querycount2);
    $numobs = $row['numobs'];
    $co = 0;
    if ($numobs <> 0) {
        $query2 = mysqli_query($con, $sql2);

        while ($row = mysqli_fetch_array($query2)) {
            if ($row['cobserv'] <> "") {
                $co++;
                $c_observ[$co]['observ'] = $row['cobserv'];
                $c_observ[$co]['fecha'] = $row['cfechafin'];
                $c_observ[$co]['usuario'] = $row['user'];
            }
        }
    }
    ?>
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="ObservacionesAB" class=" col-form-label text-right">Observaciones:</label>
            <div class="table-responsive">
                <table class="table table-hover <? /* table-striped  table-hover table-bordered */ ?> text-center" style="margin-bottom:0px;">
                    <tr  class="abm-header">
                        <th>
                            <a class="abm-header-col">Observacion</a>
                        </th>
                        <th>
                            <a class="abm-header-col">Fecha</a>
                        </th>
                        <th>
                            <a class="abm-header-col">Usuario</a>
                        </th>
                    </tr>
                    <?
                    if ($co > 0) {
                        for ($xo = 1; $xo <= $co; $xo++) {
                            $cofecha = strtotime($c_observ[$xo]['fecha']);
                            $cofecha = date("d/m/y - H:i", $cofecha);
                            ?>
                            <tr <?
                if ($xo == $co) {
                    echo 'class="tabla-ultima-linea"';
                }
                            ?>>
                                <td>
                                    <?= $c_observ[$xo]['observ'] ?>
                                </td>
                                <td>
                                    <?= $cofecha ?>
                                </td>
                                <td>
                                    <?= $c_observ[$xo]['usuario'] ?>
                                </td>
                            </tr>

                            <?
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="3">
                                No se encontraron observaciones.
                            </td>
                        </tr>
                        <?
                    }
                    ?>
                </table>
            </div>
        </div>  
    </div>

    <?
}

