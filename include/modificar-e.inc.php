<? /*
 * FORMULARIO E
 */ ?>
<div id="formE" class="formulario">
    <div class="row">
        <div class='col-12'><p class="formulario-title text-center mt-4"><?= $formularios['E'] ?></p></div>
    </div>

    <? /* CONSULTANTE */ ?>
    <div id="ConsultanteE">
        <div class="row">
            <div class='col-11 col-md-9 mx-auto'>
                <div class="formulario-separador formulario-subtitle">Consultante</div>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label class="col-form-label text-right" for="NombreCE">Nombre:</label>
                <input type="text" class="form-control" id="NombreCE" name="NombreCE" value='<?= $caso['tnombre'] ?>' placeholder="Nombre" maxlength="30">
            </div>
            <div class="form-group col-md-6">
                <label class="col-form-label text-right" for="ApellidoCE">Apellido:</label>
                <input type="text" class="form-control" id="ApellidoCE" name="ApellidoCE" value='<?= $caso['tapellido'] ?>' placeholder="Apellido" maxlength="30">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="TipoDocumentoCE" class="col-form-label text-right">Tipo de documento:</label>
                <select class="selectpicker form-control" data-live-search="true" data-size="8" id="TipoDocumentoCE" name="TipoDocumentoCE"  >
                    <option value="0" <?
                    if ($caso['ttipodoc'] == "") {
                        echo "selected";
                    }
                    ?>>-</option>
                    <option value="DNI" <?
                    if ($caso['ttipodoc'] == "DNI") {
                        echo "selected";
                    }
                    ?>>DNI</option>
                    <option value="DNI Extranjero" <?
                    if ($caso['ttipodoc'] == "DNI Extranjero") {
                        echo "selected";
                    }
                    ?>>DNI Extranjero</option>
                    <option value="Pasaporte" <?
                    if ($caso['ttipodoc'] == "Pasaporte") {
                        echo "selected";
                    }
                    ?>>Pasaporte</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label class=" col-form-label text-right" for="NumeroDocumentoCE">Nº de documento:</label>
                <input type="text" class="form-control numdocumento" id="NumeroDocumentoCE" name="NumeroDocumentoCE" value='<?= $caso['tdoc'] ?>' placeholder="Nº de documento" maxlength="11">
            </div>  

        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="TipoTelefonoCE" class=" col-form-label text-right">Tipo de teléfono:</label>
                <select class="selectpicker form-control" data-live-search="true" data-size="8" id="TipoTelefonoCE" name="TipoTelefonoCE"  >
                    <option value="0" <?
                    if ($caso['ttipotel'] == "") {
                        echo "selected";
                    }
                    ?>>-</option>
                    <option value="Particular fijo" <?
                    if ($caso['ttipotel'] == "Particular fijo") {
                        echo "selected";
                    }
                    ?>>Particular fijo</option>
                    <option value="Laboral" <?
                    if ($caso['ttipotel'] == "Laboral") {
                        echo "selected";
                    }
                    ?>>Laboral</option>
                    <option value="Celular" <?
                    if ($caso['ttipotel'] == "Celular") {
                        echo "selected";
                    }
                    ?>>Celular</option>
                    <option value="Mensajes" <?
                    if ($caso['ttipotel'] == "Mensajes") {
                        echo "selected";
                    }
                    ?>>Mensajes</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label class="col-form-label text-right" for="NumeroTelefonoCE">Nº de teléfono:</label>
                <input type="number" min="0" class="form-control" id="NumeroTelefonoCE" name="NumeroTelefonoCE" placeholder="Nº de teléfono" value='<?= $caso['tntel'] ?>' oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="15" pattern="[0-9]">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label class="col-form-label text-right" for="ResidenciaCE">Lugar de Residencia:</label>

                <select class="selectpicker form-control" data-live-search="true" data-size="8" data-live-search="true" id="ResidenciaCE" name="ResidenciaCE"  >
                    <option value="0" <?
                    if ($caso['tresid'] == "") {
                        echo "selected";
                    }
                    ?>>-</option>
                            <?
                            $sql = "SELECT * FROM lugar_residencia WHERE activo = 's' order by orden asc";
                            $query = mysqli_query($con, $sql);
                            while ($row = mysqli_fetch_array($query)) {
                                $valor = $row['descr'];
                                $guardar = $row['id'];
                                ?>
                        <option value="<?= $guardar ?>" <?
                        if ($caso['tresid'] == $guardar) {
                            echo "selected";
                        }
                        ?>><?= $valor ?></option>
                                <?
                            }
                            ?>
                </select>

            </div> 
            <div class="form-group col-md-6">
                <label class="col-form-label text-right" for="MotivoLlamadaE">Motivo de la llamada:</label>

                <select class="selectpicker form-control" data-live-search="true" data-size="8" id="MotivoLlamadaE" name="MotivoLlamadaE">
                    <option value="0" <?
                    if ($caso['cmotivollv'] == "") {
                        echo "selected";
                    }
                    ?>>-</option>
                            <?
                            $sql = "SELECT * FROM motivo_varios WHERE activo = 's' order by orden asc";
                            $query = mysqli_query($con, $sql);
                            while ($row = mysqli_fetch_array($query)) {
                                $valor = $row['descr'];
                                $guardar = $row['id'];
                                ?>
                        <option value="<?= $guardar ?>" <?
                        if ($caso['cmotivollv'] == $guardar) {
                            echo "selected";
                        }
                        ?>><?= $valor ?></option>
                                <?
                            }
                            ?>
                </select>

            </div> 
        </div>

        <?
        $sql2 = "SELECT c.observ as cobserv, c.fecha_fin as cfechafin, c.intervencion as cintervencion, u.usuario as user FROM caso_observ c LEFT JOIN usuarios u ON u.id = c.usuario_id  WHERE caso_id = '" . $caso['idcaso'] . "' ORDER BY nitem asc";
        $sqlcount2 = "SELECT count(*) AS numobs FROM caso_observ WHERE caso_id = '" . $caso['idcaso'] . "' ORDER BY nitem asc";
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
        <div id="seccionObservaciones">
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

            </div>
            <?
            $sql2 = "SELECT c.seguimiento as cseguimiento, c.fecha_fin as cfechafin, u.usuario as user FROM caso_seguimiento c LEFT JOIN usuarios u ON u.id = c.usuario_id  WHERE caso_id = '" . $caso['idcaso'] . "' ORDER BY nitem asc";
            $sqlcount2 = "SELECT count(*) AS numseg FROM caso_seguimiento WHERE caso_id = '" . $caso['idcaso'] . "' ORDER BY nitem asc";
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
                                            No se encontraron seguimientos / indicaciones.
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
            <div class="botones-form">


                <div class="form-row" id="nuevaObs" style="display:none;">
                    <div class="form-group col-md-12">

                        <label for="NObservacionesB" class=" col-form-label text-right">Nueva observaciones:</label>
                        <textarea class="form-control" style="resize:none;" id="NObservacionesB" name="NObservacionesB" rows="3" placeholder="Observaciones"></textarea>
                    </div>  
                </div>
                <div class="form-row" id="nuevoSeg" style="display:none;">
                    <div class="form-group col-md-12">
                        <label for="NSeguimientoB" class=" col-form-label text-right">Nuevo seguimiento / indicación:</label>
                        <textarea class="form-control" style="resize:none;" id="NSeguimientoB" name="NSeguimientoB" rows="3" placeholder="Seguimiento"></textarea>
                    </div>  
                </div>
                <div id="resultados">
                    <br/>
                    <div id="alertaobsok" class="alert alert-success" style="display:none;" role="alert">
                        <button type="button" class="close"  onclick="javascript:$('#alertaobsok').hide(500);">&times;</button>
                        <strong>Aviso!</strong>
                        <span id="spanobsok"></span>
                    </div>
                    <div id="alertaobsbad" class="alert alert-danger" style="display:none;" role="alert">
                        <button type="button" class="close"  onclick="javascript:$('#alertaobsbad').hide(500);">&times;</button>
                        <strong>Error!</strong> 
                        <span id="spanobsbad"></span>
                    </div>

                </div>

                <div class="form-row" <?
                if ($_SESSION['acceso'] == "l") {
                    echo 'style=display:none';
                }
                ?>>
                    <div class="form-group col-4 text-left">
                        <button style="display:none; width: 200px;" type="button" class="btn btn-light btn-buscar d-print-none" onclick="javascript:cancelar_observacion();" id="cancelar_obs">Cancelar</button>

                    </div>
                    <div class="form-group col-4 text-center">
                        <?
                        if ($caso['ccancelado'] != "s") {
                            ?>
                            <button <?
                            if ($enuso || $_SESSION['acceso'] == "l") {
                                echo "disabled";
                            }
                            ?> type="button" <? /* style="width: 200px;" */ ?> class="btn btn-custom d-print-none" onclick="javascript:cargar_seguimiento();" id="cargar_seg">Nuevo seguimiento / indicación</button>
                            <? } ?>
                    </div>
                    <div class="form-group col-4 text-right">
                        <?
                        if ($caso['ccancelado'] != "s") {
                            ?>
                            <button <?
                            if ($enuso || $_SESSION['acceso'] == "l") {
                                echo "disabled";
                            }
                            ?> type="button" <? /* style="width: 200px;" */ ?> class="btn btn-custom d-print-none" onclick="javascript:cargar_observacion();" id="cargar_obs">Nuevo llamado</button>
                        <? } ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<script>
    function loadobserv() {
        $.ajax({
            url: "<?= $hostactual ?>ajax/cargar-observaciones-e.php",
            type: 'POST',
            data: ({idcaso: $('#staticNCaso').val()}),
            success: function (data) {
                $("#seccionObservaciones").html(data).fadeIn(500);
            }
        });
    }
    function loadseguimiento() {
        $.ajax({
            url: "<?= $hostactual ?>ajax/cargar-seguimientos.php",
            type: 'POST',
            data: ({idcaso: $('#staticNCaso').val()}),
            success: function (data) {
                $("#seccionSeguimiento").html(data).fadeIn(500);
            }
        });
    }
    function cancelar_observacion() {
        $('#NObservacionesB').attr('readonly', false);
        $('#NSeguimientoB').attr('readonly', false);
        $('#NObservacionesB').val('');
        $('#NSeguimientoB').val('');
        $('#cancelar_obs').hide(500);
        $('#cargar_obs').show(500);
        $('#cargar_seg').show(500);
        $('#cargar_obs').text('Nuevo llamado');
        $('#cargar_seg').text('Nuevo seguimiento / indicación');
        $('#nuevaObs').hide(500);
        $('#nuevoSeg').hide(500);
        $("#alertaobsok").hide(500);
        $("#alertaobsbad").hide(500);
    }
    function cargar_observacion() {
        var acceso = $("#UAcceso").val();
        if ($('#cargar_obs').text() === 'Nuevo llamado' && acceso !== "l") {
            cancelar_observacion()
            $('#cargar_seg').hide(500);
            $("#alertaobsok").hide(500);
            $("#alertaobsbad").hide(500);
            $('#cargar_obs').text('Guardar llamado');
            $('#cancelar_obs').show(500);
            $('#nuevaObs').show(500);
            $('#NObservacionesB').focus()
        } else if ($('#cargar_obs').text() === 'Guardar llamado') {

            $("#alertaobsok").hide(500);
            $("#alertaobsbad").hide(500);
            $('#cargar_obs').attr('disabled', true);
            $('#NObservacionesB').attr('readonly', true);


            if (!($('#NObservacionesB').val() === "")) {
                $.ajax({
                    url: "<?= $hostactual ?>ajax/guardar-observ-b.php",
                    type: 'POST',
                    data: ({nobserv: $('#NObservacionesB').val(), ninterv: $('#NIntervencionB').val(), idcaso: $('#staticNCaso').val(), user: $('#usuario').val()}),
                    success: function (res) {
                        if (res === "ok") {
                            $("#alertaobsbad").hide(500);
                            $("#spanobsok").text("<?= $msg_guardar_obs[1] ?>");
                            $("#alertaobsok").show(500);
                            setTimeout(function () {
                                $("#alertaobsok").hide(500);
                            }, 4000); // <-- time in milliseconds

                            $('#cargar_obs').attr('disabled', false);
                            $('#NObservacionesB').attr('readonly', false);
                            $('#NObservacionesB').val('');
                            $('#cargar_obs').text('Nuevo llamado');
                            $('#cargar_seg').show(500);
                            $('#cancelar_obs').hide(500);
                            $('#nuevaObs').hide(500);

                            loadobserv();

                        } else {
                            $("#alertaobsok").hide(500);
                            $("#spanobsbad").text("<?= $msg_guardar_obs[2] ?>");
                            $("#alertaobsbad").show(500);

                            $('#cargar_obs').attr('disabled', false);

                            $('#NObservacionesB').attr('readonly', false);
                        }




                    }
                });
            } else {
                $("#alertaobsok").hide(500);
                $("#spanobsbad").text("<?= $msg_guardar_obs[4] ?>");
                $("#alertaobsbad").show(500);
                
                $('#cargar_obs').attr('disabled', false);
                
                $('#NObservacionesB').attr('readonly', false);
            }
        }
    }
    function cargar_seguimiento() {
        var acceso = $("#UAcceso").val();
        if ($('#cargar_seg').text() === 'Nuevo seguimiento / indicación' && acceso !== "l") {
            cancelar_observacion()
            $('#cargar_obs').hide(500);
            $("#alertaobsok").hide(500);
            $("#alertaobsbad").hide(500);
            $('#cargar_seg').text('Guardar seguimiento / indicación');
            $('#cancelar_obs').show(500);
            $('#nuevoSeg').show(500);
            $('#NSeguimientoB').focus()
        } else if ($('#cargar_seg').text() === 'Guardar seguimiento / indicación') {

            $("#alertaobsok").hide(500);
            $("#alertaobsbad").hide(500);
            $('#cargar_seg').attr('disabled', true);
            $('#NSeguimientoB').attr('readonly', true);

            if (!($('#NSeguimientoB').val() === "")) {
                $.ajax({
                    url: "<?= $hostactual ?>ajax/guardar-seguimiento.php",
                    type: 'POST',
                    data: ({nseguimiento: $('#NSeguimientoB').val(), idcaso: $('#staticNCaso').val(), user: $('#usuario').val()}),
                    success: function (res) {
                        if (res === "ok") {
                            $("#alertaobsbad").hide(500);
                            $("#spanobsok").text("<?= $msg_guardar_seg[1] ?>");
                            $("#alertaobsok").show(500);
                            setTimeout(function () {
                                $("#alertaobsok").hide(500);
                            }, 4000); // <-- time in milliseconds

                            $('#cargar_seg').attr('disabled', false);
                            $('#NSeguimientoB').attr('readonly', false);
                            $('#NSeguimientoB').val('');
                            $('#cargar_seg').text('Nuevo seguimiento / indicación');
                            $('#cargar_obs').show(500);
                            $('#cancelar_obs').hide(500);
                            $('#nuevoSeg').hide(500);

                            loadseguimiento();

                        } else {
                            $("#alertaobsok").hide(500);
                            $("#spanobsbad").text("<?= $msg_guardar_seg[2] ?>");
                            $("#alertaobsbad").show(500);

                            $('#cargar_seg').attr('disabled', false);

                            $('#NSeguimientoB').attr('readonly', false);
                        }




                    }
                });
            } else {
                $("#alertaobsok").hide(500);
                $("#spanobsbad").text("<?= $msg_guardar_seg[3] ?>");
                $("#alertaobsbad").show(500);

                $('#cargar_seg').attr('disabled', false);

                $('#NSeguimientoB').attr('readonly', false);
            }
        }
    }
</script>


