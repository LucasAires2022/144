<? /*
 * FORMULARIO F
 */ ?>
<div id="formF" class="formulario">
    <div class="row">
        <div class='col-12'><p class="formulario-title text-center mt-4"><?= $formularios['F'] ?></p></div>
    </div>

    <? /* CONSULTANTE */ ?>
    <div id="ConsultanteF">
        <div class="row">
            <div class='col-11 col-md-9 mx-auto'>
                <div class="formulario-separador formulario-subtitle">Consultante</div>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label class="col-form-label text-right" for="NombreCF">Nombre:</label>
                <input type="text" class="form-control" id="NombreCF" name="NombreCF" value='<?= $caso['tnombre'] ?>' placeholder="Nombre" maxlength="30">
            </div>
            <div class="form-group col-md-6">
                <label class="col-form-label text-right" for="ApellidoCF">Apellido:</label>
                <input type="text" class="form-control" id="ApellidoCF" name="ApellidoCF" value='<?= $caso['tapellido'] ?>' placeholder="Apellido" maxlength="30">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="TipoDocumentoCF" class="col-form-label text-right">Tipo de documento:</label>
                <select class="selectpicker form-control" data-live-search="true" data-size="8" id="TipoDocumentoCF" name="TipoDocumentoCF"  >
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
                <label class=" col-form-label text-right" for="NumeroDocumentoCF">N?? de documento:</label>
                <input type="text" class="form-control numdocumento" id="NumeroDocumentoCF" value='<?= $caso['tdoc'] ?>' name="NumeroDocumentoCF" placeholder="N?? de documento" maxlength="11">
            </div>  
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="TipoTelefonoCF" class=" col-form-label text-right">Tipo de tel??fono:</label>

                <select class="selectpicker form-control" data-live-search="true" data-size="8" id="TipoTelefonoCF" name="TipoTelefonoCF"  >
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
                <label class="col-form-label text-right" for="NumeroTelefonoCF">N?? de tel??fono:</label>
                <input type="number" min="0" class="form-control" id="NumeroTelefonoCF" name="NumeroTelefonoCF" placeholder="N?? de tel??fono" value='<?= $caso['tntel'] ?>' oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="15" pattern="[0-9]">
            </div>
        </div>

    </div>
    <? /* Fin CONSULTANTE */ ?>
    <div id="VictimaF">
        <div class="row">
            <div class='col-11 col-md-9 mx-auto'>
                <div class="formulario-separador formulario-subtitle">Persona en situaci??n de emergencia</div>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label class=" col-form-label text-right" for="NombreF">Nombre:</label>
                <input type="text" class="form-control" id="NombreF" name="NombreF" value='<?= $caso['vnombre'] ?>' placeholder="Nombre" maxlength="30">
            </div> 
            <div class="form-group col-md-6">
                <label class="col-form-label text-right" for="ApellidoF">Apellido:</label>
                <input type="text" class="form-control" id="ApellidoF" name="ApellidoF" value='<?= $caso['vapellido'] ?>' placeholder="Apellido" maxlength="30">
            </div>  
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="TipoDocumentoF" class="col-form-label text-right">Tipo de documento:</label>
                <select class="selectpicker form-control" data-live-search="true" data-size="8" id="TipoDocumentoF" name="TipoDocumentoF"  >
                    <option value="0" <?
                    if ($caso['vtipodoc'] == "") {
                        echo "selected";
                    }
                    ?>>-</option>
                    <option value="DNI" <?
                    if ($caso['vtipodoc'] == "DNI") {
                        echo "selected";
                    }
                    ?>>DNI</option>
                    <option value="DNI Extranjero" <?
                    if ($caso['vtipodoc'] == "DNI Extranjero") {
                        echo "selected";
                    }
                    ?>>DNI Extranjero</option>
                    <option value="Pasaporte" <?
                    if ($caso['vtipodoc'] == "Pasaporte") {
                        echo "selected";
                    }
                    ?>>Pasaporte</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label class=" col-form-label text-right" for="NumeroDocumentoF">N?? de documento:</label>
                <input type="text" class="form-control numdocumento" id="NumeroDocumentoF" value='<?= $caso['vdoc'] ?>' name="NumeroDocumentoF" placeholder="N?? de documento" maxlength="11">
            </div>  
        </div>


        <div class="form-row">
            <div class="form-group col-md-4">
                <label class="col-form-label text-right" for="CalleF"><strong>Domicilio: &nbsp;</strong> Calle:</label>
                <input type="text" class="form-control" id="CalleF" name="CalleF" value='<?= $caso['vcalle'] ?>' placeholder="Calle" maxlength="50">
            </div>  
            <div class="form-group col-md-2">
                <label class="col-form-label text-right" for="AlturaF">Altura:</label>
                <input type="number" min="0" class="form-control" id="AlturaF" name="AlturaF" value='<?= $caso['valtura'] ?>' placeholder="Altura" pattern="[0-9]" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="8">
            </div>  
            <div class="form-group col-md-2">
                <label class="col-form-label text-right" for="PisoDptoF">Piso/Dpto:</label>
                <input type="text" class="form-control" id="PisoDptoF" name="PisoDptoF" value='<?= $caso['vpisodep'] ?>' placeholder="Piso/Depto" maxlength="15">
            </div>
            <div class="form-group col-md-4">
                <label class="col-form-label text-right" for="ResidenciaF">Lugar de Residencia:</label>

                <select class="selectpicker form-control" data-live-search="true" data-size="8" data-live-search="true" id="ResidenciaF" name="ResidenciaF"  >
                    <option value="0" <?
                    if ($caso['vresid'] == "") {
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
                        if ($caso['vresid'] == $guardar) {
                            echo "selected";
                        }
                        ?>><?= $valor ?></option>
                                <?
                            }
                            ?>
                </select>

            </div> 
        </div>



        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="TipoTelefonoF" class=" col-form-label text-right">Tipo de tel??fono:</label>

                <select class="selectpicker form-control" data-live-search="true" data-size="8" id="TipoTelefonoF" name="TipoTelefonoF"  >
                    <option value="0" <?
                    if ($caso['vtipotel'] == "") {
                        echo "selected";
                    }
                    ?>>-</option>
                    <option value="Particular fijo" <?
                    if ($caso['vtipotel'] == "Particular fijo") {
                        echo "selected";
                    }
                    ?>>Particular fijo</option>
                    <option value="Laboral" <?
                    if ($caso['vtipotel'] == "Laboral") {
                        echo "selected";
                    }
                    ?>>Laboral</option>
                    <option value="Celular" <?
                    if ($caso['vtipotel'] == "Celular") {
                        echo "selected";
                    }
                    ?>>Celular</option>
                    <option value="Mensajes" <?
                    if ($caso['vtipotel'] == "Mensajes") {
                        echo "selected";
                    }
                    ?>>Mensajes</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label class="col-form-label text-right" for="NumeroTelefonoF">N?? de tel??fono:</label>
                <input type="number" min="0" class="form-control" id="NumeroTelefonoF" name="NumeroTelefonoF" value='<?= $caso['vntel'] ?>' placeholder="N?? de tel??fono" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="15" pattern="[0-9]">
            </div>  

        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="UbicacionF" class=" col-form-label text-right">Ubicaci??n: M??s datos:</label>
                <textarea class="form-control" style="resize:none;" id="UbicacionF" name="UbicacionF" rows="1" placeholder="Ubicaci??n: M??s datos:"><?= $caso['cdatosub'] ?></textarea>
            </div>
            <div class="form-group col-md-6">
                <label class="col-form-label text-right" for="GeneroF">Identidad de G??nero:</label>

                <select class="selectpicker form-control" data-live-search="true" data-size="8" id="GeneroF" name="GeneroF">
                    <option value="0" <?
                    if ($caso['vgenero'] == "") {
                        echo "selected";
                    }
                    ?>>-</option>
                            <?
                            $sql = "SELECT * FROM identidad_genero WHERE activo = 's' order by orden asc";
                            $query = mysqli_query($con, $sql);
                            while ($row = mysqli_fetch_array($query)) {
                                $valor = $row['identidad'];
                                $guardar = $row['id'];
                                ?>
                        <option value="<?= $guardar ?>" <?
                        if ($caso['vgenero'] == $guardar) {
                            echo "selected";
                        }
                        ?>><?= $valor ?></option>
                                <?
                            }
                            ?>
                </select>

            </div> 
        </div>

        <div class="form-row">
            <div class="form-group col-md-12">
                <label class="col-form-label text-right" for="RequerimientoF">Requerimiento:</label>
                <?
                $sql2 = "SELECT * FROM caso_requerimiento WHERE caso_id = '" . $caso['idcaso'] . "' ORDER BY nitem asc";
                $sqlcount2 = "SELECT count(*) AS numreq FROM caso_requerimiento WHERE caso_id = '" . $caso['idcaso'] . "' ORDER BY nitem asc";
                $querycount2 = mysqli_query($con, $sqlcount2);
                $row = mysqli_fetch_array($querycount2);
                $numreq = $row['numreq'];
                if ($numreq <> 0) {
                    $query2 = mysqli_query($con, $sql2);
                    while ($row = mysqli_fetch_array($query2)) {
                        $c_requerimiento[] = $row['requerimiento_id'];
                    }
                } else {
                    $c_requerimiento[] = 0;
                }
                $c_requerimiento_val = "";
                ?>
                <select class="selectpicker form-control" data-live-search="true" data-size="8" multiple id="RequerimientoF" name="RequerimientoF"  >
                    <?
                    $sql = "SELECT * FROM requerimiento WHERE activo = 's' order by orden asc";
                    $query = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_array($query)) {
                        $valor = $row['descr'];
                        $guardar = $row['id'];
                        if (in_array($guardar, $c_requerimiento)) {
                            if ($c_requerimiento_val == "") {
                                $c_requerimiento_val = $guardar;
                            } else {
                                $c_requerimiento_val .= ",$guardar";
                            }
                        }
                        ?>
                        <option value="<?= $guardar ?>" <?
                        if (in_array($guardar, $c_requerimiento)) {
                            echo "selected";
                        }
                        ?>><?= $valor ?></option>
                                <?
                            }
                            ?>
                </select>
                <input type="hidden" name="ValRequerimientoF" id="ValRequerimientoF" value="<?= $c_requerimiento_val ?>" />
            </div> 

        </div>

        <div class="form-row">
            <div class="form-group col-md-12">

                <label for="OperadorF" class=" col-form-label text-right">Operador/a 911:</label>
                <textarea class="form-control" style="resize:none;" id="OperadorF" name="OperadorF" rows="3" placeholder="Operador/a 911"><?= $caso['coperador'] ?></textarea>
            </div>  
        </div>
        <?
        $sql2 = "SELECT c.observ as cobserv, c.fecha_fin as cfechafin, c.intervencion as cintervencion, u.usuario as user FROM caso_observ c LEFT JOIN usuarios u ON u.id = c.usuario_id  WHERE caso_id = '" . $caso['idcaso'] . "' ORDER BY nitem asc";
        $sqlcount2 = "SELECT count(*) AS numobs FROM caso_observ WHERE caso_id = '" . $caso['idcaso'] . "' ORDER BY nitem asc";
        $querycount2 = mysqli_query($con, $sqlcount2);
        $row = mysqli_fetch_array($querycount2);
        $numobs = $row['numobs'];
        $co = 0;
        $ci = 0;
        if ($numobs <> 0) {
            $query2 = mysqli_query($con, $sql2);

            while ($row = mysqli_fetch_array($query2)) {
                if ($row['cobserv'] <> "") {
                    $co++;
                    $c_observ[$co]['observ'] = $row['cobserv'];
                    $c_observ[$co]['fecha'] = $row['cfechafin'];
                    $c_observ[$co]['usuario'] = $row['user'];
                }
                if ($row['cintervencion'] <> "") {
                    $ci++;
                    $c_interv[$ci]['interv'] = $row['cintervencion'];
                    $c_interv[$ci]['fecha'] = $row['cfechafin'];
                    $c_interv[$ci]['usuario'] = $row['user'];
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


            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="IntervencionAB" class=" col-form-label text-right">Intervenci??n y recursos:</label>
                    <div class="table-responsive">
                        <table class="table table-hover <? /* table-striped  table-hover table-bordered */ ?> text-center" style="margin-bottom:0px;">
                            <tr  class="abm-header">
                                <th>
                                    <a class="abm-header-col">Intervencion y recursos</a>
                                </th>
                                <th>
                                    <a class="abm-header-col">Fecha</a>
                                </th>
                                <th>
                                    <a class="abm-header-col">Usuario</a>
                                </th>
                            </tr>
                            <?
                            if ($ci > 0) {
                                for ($xi = 1; $xi <= $ci; $xi++) {
                                    $cifecha = strtotime($c_interv[$xi]['fecha']);
                                    $cifecha = date("d/m/y - H:i", $cifecha);
                                    ?>
                                    <tr <?
                                    if ($xi == $ci) {
                                        echo 'class="tabla-ultima-linea"';
                                    }
                                    ?>>
                                        <td>
                                            <?= $c_interv[$xi]['interv'] ?>
                                        </td>
                                        <td>
                                            <?= $cifecha ?>
                                        </td>
                                        <td>
                                            <?= $c_interv[$xi]['usuario'] ?>
                                        </td>
                                    </tr>
                                    <?
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="3">
                                        No se encontraron intervenciones y recursos.
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
                <div class="form-row" id="nuevaInt" style="display:none;">
                    <div class="form-group col-md-12">
                        <label for="NIntervencionB" class=" col-form-label text-right">Nueva intervencion y recursos:</label>
                        <textarea class="form-control" style="resize:none;" id="NIntervencionB" name="NIntervencionB" rows="3" placeholder="Intervenci??n y recursos"></textarea>
                    </div>  
                </div>
                <div class="form-row" id="nuevoSeg" style="display:none;">
                    <div class="form-group col-md-12">
                        <label for="NSeguimientoB" class=" col-form-label text-right">Nuevo seguimiento / indicaci??n:</label>
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
                            ?> type="button" <? /* style="width: 200px;" */ ?> class="btn btn-custom d-print-none" onclick="javascript:cargar_seguimiento();" id="cargar_seg">Nuevo seguimiento / indicaci??n</button>
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
<script>
    function loadobserv() {
        $.ajax({
            url: "<?= $hostactual ?>ajax/cargar-observaciones.php",
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
        $('#NIntervencionB').attr('readonly', false);
        $('#NSeguimientoB').attr('readonly', false);
        $('#NObservacionesB').val('');
        $('#NIntervencionB').val('');
        $('#NSeguimientoB').val('');
        $('#cancelar_obs').hide(500);
        $('#cargar_obs').show(500);
        $('#cargar_seg').show(500);
        $('#cargar_obs').text('Nuevo llamado');
        $('#cargar_seg').text('Nuevo seguimiento / indicaci??n');
        $('#nuevaObs').hide(500);
        $('#nuevaInt').hide(500);
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
            $('#nuevaInt').show(500);
            $('#NObservacionesB').focus()
        } else if ($('#cargar_obs').text() === 'Guardar llamado') {

            $("#alertaobsok").hide(500);
            $("#alertaobsbad").hide(500);
            $('#cargar_obs').attr('disabled', true);
            $('#NObservacionesB').attr('readonly', true);
            $('#NIntervencionB').attr('readonly', true);


            if (!($('#NObservacionesB').val() === "" && $('#NIntervencionB').val() === "")) {
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
                            $('#NIntervencionB').attr('readonly', false);
                            $('#NObservacionesB').val('');
                            $('#NIntervencionB').val('');
                            $('#cargar_obs').text('Nuevo llamado');
                            $('#cargar_seg').show(500);
                            $('#cancelar_obs').hide(500);
                            $('#nuevaObs').hide(500);
                            $('#nuevaInt').hide(500);

                            loadobserv();

                        } else {
                            $("#alertaobsok").hide(500);
                            $("#spanobsbad").text("<?= $msg_guardar_obs[2] ?>");
                            $("#alertaobsbad").show(500);

                            $('#cargar_obs').attr('disabled', false);
                            
                            $('#NObservacionesB').attr('readonly', false);
                            $('#NIntervencionB').attr('readonly', false);
                        }




                    }
                });
            } else {
                $("#alertaobsok").hide(500);
                $("#spanobsbad").text("<?= $msg_guardar_obs[3] ?>");
                $("#alertaobsbad").show(500);

                $('#cargar_obs').attr('disabled', false);

                $('#NObservacionesB').attr('readonly', false);
                $('#NIntervencionB').attr('readonly', false);
            }
        }
    }
    function cargar_seguimiento() {
        var acceso = $("#UAcceso").val();
        if ($('#cargar_seg').text() === 'Nuevo seguimiento / indicaci??n' && acceso !== "l") {
            cancelar_observacion()
            $('#cargar_obs').hide(500);
            $("#alertaobsok").hide(500);
            $("#alertaobsbad").hide(500);
            $('#cargar_seg').text('Guardar seguimiento / indicaci??n');
            $('#cancelar_obs').show(500);
            $('#nuevoSeg').show(500);
            $('#NSeguimientoB').focus()
        } else if ($('#cargar_seg').text() === 'Guardar seguimiento / indicaci??n') {

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
                            $('#cargar_seg').text('Nuevo seguimiento / indicaci??n');
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
