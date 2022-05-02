<? /*
 * FORMULARIO B
 */ ?>
<div id="formB" class="formulario">
    <div class="row">
        <div class='col-12'><p class="formulario-title text-center mt-4"><?= $formularios['B'] ?></p></div>
    </div>

    <div class="form-group row text-center text-md-left">
        <label for="toggleConsultanteB" class="col-md-8 col-form-label">Llama la persona en situación de violencia de género?</label>
        <?
        $llamavictima = "No";
        if ($caso['cconsultid'] == 0) {
            $llamavictima = "Si";
        }
        ?>
        <div class="col-md-4">
            <div class="btn-group btn-group-toggle"  data-toggle="buttons">
                <label class="btn btn-option <?
                if ($llamavictima == "Si") {
                    echo "active";
                }
                ?>" id="toggleConsultanteSiB" onclick="javascript:ocultar_sector('#ConsultanteB')" style="width: 50px">
                    <input  type="radio" name="options"  autocomplete="off"> Si
                </label>
                <label class="btn btn-option <?
                if ($llamavictima == "No") {
                    echo "active";
                }
                ?>" id="toggleConsultanteNoB" onclick="javascript:mostrar_sector('#ConsultanteB')" style="width: 50px">
                    <input  type="radio" name="options" autocomplete="off"> No
                </label>
            </div>
            <input type="hidden" id="toggleConsultanteB" name="toggleConsultanteB" value="<?= $llamavictima ?>">
        </div>
    </div>
    <? /* CONSULTANTE */ ?>
    <div id="ConsultanteB" <?
    if ($llamavictima == "Si") {
        echo 'style="display:none"';
    }
    ?>>
        <div class="row">
            <div class='col-11 col-md-9 mx-auto'>
                <div class="formulario-separador formulario-subtitle">Consultante</div>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label class="col-form-label text-right" for="NombreCB">Nombre:</label>
                <input type="text" class="form-control" id="NombreCB" name="NombreCB" placeholder="Nombre" value='<?= $caso['tnombre'] ?>' maxlength="30">
            </div>
            <div class="form-group col-md-6">
                <label class="col-form-label text-right" for="ApellidoCB">Apellido:</label>
                <input type="text" class="form-control" id="ApellidoCB" name="ApellidoCB" placeholder="Apellido" value='<?= $caso['tapellido'] ?>' maxlength="30">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="TipoDocumentoCB" class="col-form-label text-right">Tipo de documento:</label>

                <select class="selectpicker form-control" data-live-search="true" data-size="8" id="TipoDocumentoCB" name="TipoDocumentoCB"  >
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
            <div class="form-group col-md-4">
                <label class="col-form-label text-right" for="NumeroDocumentoCB">Nº de documento:</label>
                <input type="text" class="form-control numdocumento" id="NumeroDocumentoCB" name="NumeroDocumentoCB" placeholder="Nº de documento" value='<?= $caso['tdoc'] ?>' maxlength="11">
            </div>  
            <div class="form-group col-md-4">
                <label class="col-form-label text-right" for="EdadCB">Edad:</label>
                <input type="number" min="0" class="form-control" id="EdadCB" name="EdadCB" placeholder="Edad" pattern="[0-9]" value='<?= $caso['tedad'] ?>' oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="3">
            </div>  
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="TipoTelefonoCB" class=" col-form-label text-right">Tipo de teléfono:</label>

                <select class="selectpicker form-control" data-live-search="true" data-size="8" id="TipoTelefonoCB" name="TipoTelefonoCB"  >
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
            <div class="form-group col-md-4">
                <label class="col-form-label text-right" for="NumeroTelefonoCB">Nº de teléfono:</label>
                <input type="number" min="0" class="form-control" id="NumeroTelefonoCB" name="NumeroTelefonoCB" placeholder="Nº de teléfono" value='<?= $caso['tntel'] ?>' oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="15" pattern="[0-9]">
            </div>
            <div class="form-group col-md-4">
                <label class="col-form-label text-right" for="ResidenciaCB">Lugar de Residencia:</label>

                <select class="selectpicker form-control" data-live-search="true" data-size="8" id="ResidenciaCB" name="ResidenciaCB"  >
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
            
        </div>
        <div class="form-row">  
            <div class="form-group col-md-6">
                <label class="col-form-label text-right" for="GeneroCB">Identidad de Género:</label>

                <select class="selectpicker form-control" data-live-search="true" data-size="8" id="GeneroCB" name="GeneroCB"  >
                    <option value="0" <?
                    if ($caso['tgenero'] == "") {
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
                        if ($caso['tgenero'] == $guardar) {
                            echo "selected";
                        }
                        ?>><?= $valor ?></option>
                                <?
                            }
                            ?>
                </select>


            </div>
            <div class="form-group col-md-6">
                <label class="col-form-label text-right" for="VinculoCB">Vinculo:</label>

                <select class="selectpicker form-control" data-live-search="true" data-size="8" id="VinculoCB" name="VinculoCB"  >
                    <option value="0" <?
                    if ($caso['tvinculo'] == "") {
                        echo "selected";
                    }
                    ?>>-</option>
                            <?
                            $sql = "SELECT * FROM vinculo_consultante WHERE activo = 's' order by orden asc";
                            $query = mysqli_query($con, $sql);
                            while ($row = mysqli_fetch_array($query)) {
                                $valor = $row['vinculo'];
                                $guardar = $row['id'];
                                ?>
                        <option value="<?= $guardar ?>" <?
                        if ($caso['tvinculo'] == $guardar) {
                            echo "selected";
                        }
                        ?>><?= $valor ?></option>
                                <?
                            }
                            ?>
                </select>

            </div>
        </div>

    </div>
    <? /* Fin CONSULTANTE */ ?>
    <div id="VictimaB">
        <div class="row">
            <div class='col-11 col-md-9 mx-auto'>
                <div class="formulario-separador formulario-subtitle">Persona en situación de violencia de género</div>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label class=" col-form-label text-right" for="NombreB">Nombre:</label>
                <input type="text" class="form-control" id="NombreB" name="NombreB" placeholder="Nombre" value='<?= $caso['vnombre'] ?>' maxlength="30">
            </div> 
            <div class="form-group col-md-6">
                <label class="col-form-label text-right" for="ApellidoB">Apellido:</label>
                <input type="text" class="form-control" id="ApellidoB" name="ApellidoB" placeholder="Apellido" value='<?= $caso['vapellido'] ?>' maxlength="30">
            </div>  
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="TipoDocumentoB" class="col-form-label text-right">Tipo de documento:</label>
                <select class="selectpicker form-control" data-live-search="true" data-size="8" id="TipoDocumentoB" name="TipoDocumentoB"  >
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
            <div class="form-group col-md-4">
                <label class=" col-form-label text-right" for="NumeroDocumentoB">Nº de documento:</label>
                <input type="text" class="form-control numdocumento" id="NumeroDocumentoB" name="NumeroDocumentoB" placeholder="Nº de documento" value='<?= $caso['vdoc'] ?>' maxlength="11">
            </div>  
            <div class="form-group col-md-4">
                <label class="col-form-label text-right" for="EdadB">Edad:</label>
                <input type="number" min="0" class="form-control" id="EdadB" name="EdadB" placeholder="Edad" value='<?= $caso['vedad'] ?>' pattern="[0-9]" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="3">
            </div>
        </div>


        <div class="form-row">
            <div class="form-group col-md-4">
                <label class="col-form-label text-right" for="CalleB"><strong>Domicilio: &nbsp;</strong> Calle:</label>
                <input type="text" class="form-control" id="CalleB" name="CalleB" value='<?= $caso['vcalle'] ?>' placeholder="Calle" maxlength="50">
            </div>  
            <div class="form-group col-md-2">
                <label class="col-form-label text-right" for="AlturaB">Altura:</label>
                <input type="number" min="0" class="form-control" id="AlturaB" name="AlturaB" placeholder="Altura" value='<?= $caso['valtura'] ?>' pattern="[0-9]" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="8">
            </div>  
            <div class="form-group col-md-2">
                <label class="col-form-label text-right" for="PisoDptoB">Piso/Dpto:</label>
                <input type="text" class="form-control" id="PisoDptoB" name="PisoDptoB" placeholder="Piso/Depto" value='<?= $caso['vpisodep'] ?>' maxlength="15">
            </div>
            <div class="form-group col-md-4">
                <label class="col-form-label text-right" for="ResidenciaB">Lugar de Residencia:</label>

                <select class="selectpicker form-control" data-live-search="true" data-size="8" data-live-search="true" id="ResidenciaB" name="ResidenciaB"  >
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
            <div class="form-group col-md-4">
                <label for="TipoTelefonoB" class=" col-form-label text-right">Tipo de teléfono:</label>

                <select class="selectpicker form-control" data-live-search="true" data-size="8" id="TipoTelefonoB" name="TipoTelefonoB"  >
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
            <div class="form-group col-md-4">
                <label class="col-form-label text-right" for="NumeroTelefonoB">Nº de teléfono:</label>
                <input type="number" min="0" class="form-control" id="NumeroTelefonoB" name="NumeroTelefonoB" placeholder="Nº de teléfono" value='<?= $caso['vntel'] ?>' oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="15" pattern="[0-9]">
            </div>  
            <div class="form-group col-md-4">
                <label class="col-form-label text-right" for="GeneroB">Identidad de Género:</label>

                <select class="selectpicker form-control" data-live-search="true" data-size="8" id="GeneroB" name="GeneroB"  >
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
            <div class="form-group col-md-6">
                <label class="col-form-label text-right" for="NacionalidadB">Nacionalidad:</label>
                <select class="selectpicker form-control" data-live-search="true" data-size="8" id="NacionalidadB" name="NacionalidadB"  >
                    <option value="0" <?
                    if ($caso['vnacion'] == "") {
                        echo "selected";
                    }
                    ?>>-</option>
                            <?
                            $sql = "SELECT * FROM nacionalidad WHERE activo = 's' order by orden asc";
                            $query = mysqli_query($con, $sql);
                            while ($row = mysqli_fetch_array($query)) {
                                $valor = $row['descr'];
                                $guardar = $row['id'];
                                ?>
                        <option value="<?= $guardar ?>" <?
                        if ($caso['vnacion'] == $guardar) {
                            echo "selected";
                        }
                        ?>><?= $valor ?></option>
                                <?
                            }
                            ?>
                </select>
            </div> 
            <div class="form-group col-md-6">
                <label class="col-form-label text-right" for="ConyugeB">Situación conyugal:</label>
                <select class="selectpicker form-control" data-live-search="true" data-size="8" id="ConyugeB" name="ConyugeB"  >
                    <option value="0" <?
                    if ($caso['vconyuge'] == "") {
                        echo "selected";
                    }
                    ?>>-</option>
                            <?
                            $sql = "SELECT * FROM situacion_conyugal WHERE activo = 's' order by orden asc";
                            $query = mysqli_query($con, $sql);
                            while ($row = mysqli_fetch_array($query)) {
                                $valor = $row['descr'];
                                $guardar = $row['id'];
                                ?>
                        <option value="<?= $guardar ?>" <?
                        if ($caso['vconyuge'] == $guardar) {
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
            <div class="form-group col-md-4">

                <label for="toggleConviveB" class="col-form-label">Convive con el agresor?</label>
                <?
                if ($caso['vconvive'] == "Si") {
                    $vconvive = "Si";
                } else if ($caso['vconvive'] == "No") {
                    $vconvive = "No";
                } else {
                    $vconvive = "No especifica";
                }


                $vmeses = $caso['vmeses'];
                if ($vmeses == 0) {
                    $vdesde = "No especifica";
                    $vcantdesde = 0;
                } else if (($vmeses % 4) == 0) {
                    $vdesde = "Años";
                    $vcantdesde = $vmeses / 12;

                    //con_log($vmeses . " / 12 = " . $vcantdesde);
                } else {
                    $vdesde = "Meses";
                    $vcantdesde = $vmeses;
                }
                ?>

                <div>
                    <div class="btn-group btn-group-toggle"  data-toggle="buttons">
                        <label class="btn btn-option <?
                        if ($vconvive == "No especifica") {
                            echo "active";
                        }
                        ?>" id="toggleConviveNEB" onclick="javascript:ocultar_sector('#TiempoB');ocultar_sector('#AñosB');ocultar_sector('#MesesB');">
                            <input  type="radio" name="options" autocomplete="off"> No especifica
                        </label>
                        <label class="btn btn-option <?
                        if ($vconvive == "Si") {
                            echo "active";
                        }
                        ?>" id="toggleConviveSiB" onclick="javascript:mostrar_sector('#TiempoB'); mostrar_mes_ano();" style="width: 50px">
                            <input  type="radio" name="options" autocomplete="off"> Si
                        </label>
                        <label class="btn btn-option <?
                        if ($vconvive == "No") {
                            echo "active";
                        }
                        ?>" id="toggleConviveNoB" onclick="javascript:ocultar_sector('#TiempoB');ocultar_sector('#AñosB');ocultar_sector('#MesesB');" style="width: 50px">
                            <input  type="radio" name="options" autocomplete="off"> No
                        </label>
                    </div>
                    <input type="hidden" id="toggleConviveB" name="toggleConviveB" value="<?= $vconvive ?>">
                </div>
            </div>

            <div class="form-group col-md-4" id="TiempoB" <?
            if ($vconvive != "Si") {
                echo 'style="display:none;"';
            }
            ?>>
                <label for="TiempoDesdeB" class=" col-form-label text-right">Desde:</label>

                <select class="selectpicker form-control" data-live-search="true" data-size="8" id="TiempoDesdeB" name="TiempoDesdeB"  >
                    <option value="No especifica" <?
                    if ($vmeses == 0) {
                        echo "selected";
                    }
                    ?>>No especifica</option>
                    <option value="Años" <?
                    if ($vdesde == "Años") {
                        echo "selected";
                    }
                    ?>>Años</option>
                    <option value="Meses" <?
                    if ($vdesde == "Meses") {
                        echo "selected";
                    }
                    ?>>Meses</option>
                </select>
            </div>
            <div class="form-group col-md-4 mes-año" id="AñosB" <?
            if ($vdesde != "Años") {
                echo 'style="display:none;"';
            }
            ?>>
                <label for="DesdeAB" class=" col-form-label text-right">&nbsp;</label>
                <input type="number" min="0" class="form-control" id="DesdeAB" name="DesdeAB" value='<?
                if ($vdesde == "Años") {
                    echo $vcantdesde;
                }
                ?>' placeholder="Nº" pattern="[0-9]" maxlength="3">
            </div>
            <div class="form-group col-md-4 mes-año" id="MesesB" <?
            if ($vdesde != "Meses") {
                echo 'style="display:none;"';
            }
            ?>>
                <label for="DesdeMB" class=" col-form-label text-right">&nbsp;</label>
                <input type="number" min="0" class="form-control" id="DesdeMB" name="DesdeMB" value='<?
                if ($vdesde == "Meses") {
                    echo $vcantdesde;
                }
                ?>' placeholder="Nº" pattern="[0-9]" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="4">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label class="col-form-label text-right" for="ViviendaB">Tenencia de la vivienda:</label>
                <select class="selectpicker form-control" data-live-search="true" data-size="8" id="ViviendaB" name="ViviendaB"  >
                    <option value="0" <?
                    if ($caso['vvivienda'] == "") {
                        echo "selected";
                    }
                    ?>>-</option>
                            <?
                            $sql = "SELECT * FROM tenencia_vivienda WHERE activo = 's' order by orden asc";
                            $query = mysqli_query($con, $sql);
                            while ($row = mysqli_fetch_array($query)) {
                                $valor = $row['descr'];
                                $guardar = $row['id'];
                                ?>
                        <option value="<?= $guardar ?>" <?
                        if ($caso['vvivienda'] == $guardar) {
                            echo "selected";
                        }
                        ?>><?= $valor ?></option>
                                <?
                            }
                            ?>
                </select>
            </div> 
            <div class="form-group col-md-4">
                <?
                $sql2 = "SELECT * FROM victima_actividad WHERE victima_id = '" . $caso['cvictid'] . "' ORDER BY nitem asc";
                $sqlcount2 = "SELECT count(*) AS numact FROM victima_actividad WHERE victima_id = '" . $caso['cvictid'] . "' ORDER BY nitem asc";
                $querycount2 = mysqli_query($con, $sqlcount2);
                $row = mysqli_fetch_array($querycount2);
                $numact = $row['numact'];
                if ($numact <> 0) {
                    $query2 = mysqli_query($con, $sql2);
                    while ($row = mysqli_fetch_array($query2)) {
                        $victima_actividad[] = $row['actividad_id'];
                    }
                } else {
                    $victima_actividad[] = 0;
                }

                $victima_actividad_val = "";
                ?>
                <label class="col-form-label text-right" for="ActividadB">Actividad:</label>
                <select class="selectpicker form-control" data-live-search="true" data-size="8" data-live-search="true" multiple id="ActividadB" name="ActividadB[]"  >
                    <?
                    $sql = "SELECT * FROM actividad WHERE activo = 's' order by orden asc";
                    $query = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_array($query)) {

                        $valor = $row['descr'];
                        $guardar = $row['id'];
                        if (in_array($guardar, $victima_actividad)) {
                            if ($victima_actividad_val == "") {
                                $victima_actividad_val = $guardar;
                            } else {
                                $victima_actividad_val .= ",$guardar";
                            }
                        }
                        ?>
                        <option value="<?= $guardar ?>" <?
                        if (in_array($guardar, $victima_actividad)) {
                            echo "selected";
                        }
                        ?>><?= $valor ?></option>
                                <?
                            }
                            ?>
                </select>
                <input type="hidden" name="ValActividadB" id="ValActividadB" value="<?= $victima_actividad_val ?>"/>
            </div> 
            <div class="form-group col-md-4">
                <label class="col-form-label text-right" for="NEducativoB">Nivel educativo alcanzado:</label>
                <select class="selectpicker form-control" data-live-search="true" data-size="8" id="NEducativoB" name="NEducativoB"  >
                    <option value="0" <?
                    if ($caso['vneduc'] == "") {
                        echo "selected";
                    }
                    ?>>-</option>
                    <option value="Primario" <?
                    if ($caso['vneduc'] == "Primario") {
                        echo "selected";
                    }
                    ?>>Primario</option>
                    <option value="Secundario" <?
                    if ($caso['vneduc'] == "Secundario") {
                        echo "selected";
                    }
                    ?>>Secundario</option>
                    <option value="Superior" <?
                    if ($caso['vneduc'] == "Superior") {
                        echo "selected";
                    }
                    ?>>Superior</option>
                    <option value="Universitario" <?
                    if ($caso['vneduc'] == "Universitario") {
                        echo "selected";
                    }
                    ?>>Universitario</option>
                    <option value="Sin instrucción" <?
                    if ($caso['vneduc'] == "Sin instrucción") {
                        echo "selected";
                    }
                    ?>>Sin instrucción</option>
                </select>
            </div> 
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <?
                $tiene_hijos = $caso['vhijos'];
                $numhijos = 0;
                if ($tiene_hijos == "Si") {
                    $sql2 = "SELECT * FROM hijos WHERE victima_id = '" . $caso['cvictid'] . "' ORDER BY nitem asc";
                    $sqlcount2 = "SELECT count(*) AS numhijos FROM hijos WHERE victima_id = '" . $caso['cvictid'] . "' ORDER BY nitem asc";
                    $querycount2 = mysqli_query($con, $sqlcount2);
                    $row = mysqli_fetch_array($querycount2);
                    $numhijos = $row['numhijos'];
                    if ($numhijos > 0) {
                        $ch = 0;
                        $query2 = mysqli_query($con, $sql2);
                        while ($row = mysqli_fetch_array($query2)) {
                            $ch++;
                            if ($row['convive'] == "NE") {
                                $temp_convive = "No especifica";
                            } else {
                                $temp_convive = $row['convive'];
                            }
                            if ($row['conducta'] == "NE") {
                                $temp_conducta = "No especifica";
                            } else {
                                $temp_conducta = $row['conducta'];
                            }
                            if ($row['edad'] == 0) {
                                $temp_edad = "";
                            } else {
                                $temp_edad = $row['edad'];
                            }

                            $hijos[$ch]['genero'] = $row['identidad_genero_id'];
                            $hijos[$ch]['edad'] = $temp_edad;
                            $hijos[$ch]['maltrato'] = $row['tipo_maltrato'];
                            $hijos[$ch]['convive'] = $temp_convive;
                            $hijos[$ch]['conducta'] = $temp_conducta;
                        }
                    }
                }

                for ($x = $numhijos + 1; $x <= 10; $x++) {
                    //con_log($x);
                    $hijos[$x]['genero'] = "";
                    $hijos[$x]['edad'] = "";
                    $hijos[$x]['maltrato'] = "";
                    $hijos[$x]['convive'] = "";
                    $hijos[$x]['conducta'] = "";
                }
                $aqhijos = $numhijos;
                if ($aqhijos == 0) {
                    $aqhijos = 1;
                }
                ?>
                <label for="toggleHijosB" class="col-form-label">Tiene hijas/os?</label>
                <div>
                    <div class="btn-group btn-group-toggle"  data-toggle="buttons">
                        <label class="btn btn-option <?
                        if ($tiene_hijos == "NE") {
                            echo "active";
                        }
                        ?>" id="toggleHijosNEB" onclick="javascript:ocultar_sector('#HijosB')">
                            <input  type="radio" name="options" autocomplete="off"> No especifica
                        </label>
                        <label class="btn btn-option <?
                        if ($tiene_hijos == "Si") {
                            echo "active";
                        }
                        ?>" id="toggleHijosSiB" onclick="javascript:mostrar_sector('#HijosB')" style="width: 50px">
                            <input  type="radio" name="options" autocomplete="off"> Si
                        </label>
                        <label class="btn btn-option <?
                        if ($tiene_hijos == "No") {
                            echo "active";
                        }
                        ?>" id="toggleHijosNoB" onclick="javascript:ocultar_sector('#HijosB')" style="width: 50px">
                            <input  type="radio" name="options" autocomplete="off"> No
                        </label>
                    </div>
                    <input type="hidden" id="toggleHijosB" name="toggleHijosB" value="<?= $tiene_hijos ?>">
                </div>
            </div>
        </div>
        <div id="HijosB" <?
        if ($tiene_hijos != "Si") {
            echo 'style="display:none;"';
        }
        ?>>
            <div class="form-row">
                <div class="form-group col-md-2 mb-0">
                    <label class="col-form-label text-right" for="HGeneroB">Id. Género</label>
                </div>
                <div class="form-group col-md-2 mb-0">
                    <label class="col-form-label text-right" for="HEdadB">Edad</label>
                </div>
                <div class="form-group col-md-3 mb-0">
                    <label class="col-form-label text-right" for="HMaltratoB">Sufre maltrato</label>
                </div>
                <div class="form-group col-md-2 mb-0">
                    <label class="col-form-label text-right" for="HConviveB">Convive</label>
                </div>
                <div class="form-group col-md-3 mb-0">
                    <label class="col-form-label text-right" for="HConductaB">Conducta violenta</label>
                </div>
            </div>
            <?
            for ($x = 1; $x <= 10; $x++) {
                ?>
                <div class="form-row cloned_hijos" id="HijoB<?= $x ?>" <?
                if ($x > $aqhijos) {
                    echo "style='display:none'";
                }
                ?>>
                    <div class="form-group col-md-2 mt-0">
                        <select class="selectpicker form-control" data-live-search="true" data-size="8" id="HGeneroB<?= $x ?>" name="HGeneroB<?= $x ?>"  >
                            <option value="0" <?
                            if ($hijos[$x]['genero'] == "") {
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
                                if ($hijos[$x]['genero'] == $guardar) {
                                    echo "selected";
                                }
                                ?>><?= $valor ?></option>
                                        <?
                                    }
                                    ?>
                        </select>
                    </div>
                    <div class="form-group col-md-2 mt-0">
                        <input type="number" min="0" class="form-control" id="HEdadB<?= $x ?>" name="HEdadB<?= $x ?>" value="<?= $hijos[$x]['edad'] ?>" placeholder="Edad" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="3">
                    </div>
                    <?
                    $h_maltrato = explode(",", $hijos[$x]['maltrato']);
                    ?>
                    <div class="form-group col-md-3 mt-0">
                        <select class="selectpicker form-control" data-live-search="true" data-size="8" multiple id="HMaltratoB<?= $x ?>" name="HMaltratoB<?= $x ?>[]"  >
                            <option value="Ninguno" <?
                            if (in_array("Ninguno", $h_maltrato)) {
                                echo "selected";
                            }
                            ?>>Ninguno</option>
                            <option value="Testigo de violencia" <?
                            if (in_array("Testigo de violencia", $h_maltrato)) {
                                echo "selected";
                            }
                            ?>>Testigo de violencia</option>
                            <option value="Negligencia" <?
                            if (in_array("Negligencia", $h_maltrato)) {
                                echo "selected";
                            }
                            ?>>Negligencia</option>
                            <option value="Emocional" <?
                            if (in_array("Emocional", $h_maltrato)) {
                                echo "selected";
                            }
                            ?>>Emocional</option>
                            <option value="Físico" <?
                            if (in_array("Físico", $h_maltrato)) {
                                echo "selected";
                            }
                            ?>>Físico</option>
                            <option value="Sexual" <?
                            if (in_array("Sexual", $h_maltrato)) {
                                echo "selected";
                            }
                            ?>>Sexual</option>
                        </select>
                        <input type="hidden" name="ValHMaltratoB<?= $x ?>" id="ValHMaltratoB<?= $x ?>" value="<?= $hijos[$x]['maltrato'] ?>" />
                    </div>
                    <div class="form-group col-md-2 mt-0">
                        <select class="selectpicker form-control" data-live-search="true" data-size="8" id="HConviveB<?= $x ?>" name="HConviveB<?= $x ?>"  >
                            <option value="0" <?
                            if ($hijos[$x]['convive'] == "") {
                                echo "selected";
                            }
                            ?>>-</option>
                            <option value="No especifica" <?
                            if ($hijos[$x]['convive'] == "No especifica") {
                                echo "selected";
                            }
                            ?>>No especifica</option>
                            <option value="Si" <?
                            if ($hijos[$x]['convive'] == "Si") {
                                echo "selected";
                            }
                            ?>>Si</option>
                            <option value="No" <?
                            if ($hijos[$x]['convive'] == "No") {
                                echo "selected";
                            }
                            ?>>No</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3 mt-0">
                        <select class="selectpicker form-control" data-live-search="true" data-size="8" id="HConductaB<?= $x ?>" name="HConductaB<?= $x ?>"  >
                            <option value="0" <?
                            if ($hijos[$x]['conducta'] == "") {
                                echo "selected";
                            }
                            ?>>-</option>
                            <option value="No especifica" <?
                            if ($hijos[$x]['conducta'] == "No especifica") {
                                echo "selected";
                            }
                            ?>>No especifica</option>
                            <option value="Si" <?
                            if ($hijos[$x]['conducta'] == "Si") {
                                echo "selected";
                            }
                            ?>>Si</option>
                            <option value="No" <?
                            if ($hijos[$x]['conducta'] == "No") {
                                echo "selected";
                            }
                            ?>>No</option>
                        </select>
                    </div>
                </div>
            <? } ?>
            <div class="form-row">
                <div class="form-group col-12 text-right">
                    <div class="btn-group" role="group" aria-label="Hijos">
                        <button id="btnagregarhijo" type="button" class="btn btn-custom" <?
                        if ($aqhijos == 10) {
                            echo "disabled";
                        }
                        ?> onclick="javascript:agregar_hijo()">Agregar</button>
                        <button id="btnquitarhijo" type="button" class="btn btn-custom" <?
                        if ($aqhijos == 1) {
                            echo "disabled";
                        }
                        ?> onclick="javascript:quitar_hijo()">Quitar</button>
                        <input type="hidden" id="aqhijos" name="aqhijos" value="<?= $aqhijos ?>">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="AgresorB">
        <div class="row">
            <div class='col-11 col-md-9 mx-auto'>
                <div class="formulario-separador formulario-subtitle">Datos del agresor</div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label class="col-form-label text-right" for="VinculoAB">Vinculo:</label>

                <select class="selectpicker form-control" data-live-search="true" data-size="8" id="VinculoAB" name="VinculoAB"  >
                    <option value="0" <?
                    if ($caso['avinculo'] == "") {
                        echo "selected";
                    }
                    ?>>-</option>
                            <?
                            $sql = "SELECT * FROM vinculo_agresor WHERE activo = 's' order by orden asc";
                            $query = mysqli_query($con, $sql);
                            while ($row = mysqli_fetch_array($query)) {
                                $valor = $row['vinculo'];
                                $guardar = $row['id'];
                                ?>
                        <option value="<?= $guardar ?>" <?
                        if ($caso['avinculo'] == $guardar) {
                            echo "selected";
                        }
                        ?>><?= $valor ?></option>
                                <?
                            }
                            ?>
                </select>

            </div>
            <div class="form-group col-md-4">
                <label class="col-form-label text-right" for="NombreAB">Nombre:</label>
                <input type="text" class="form-control" id="NombreAB" name="NombreAB" value="<?= $caso['anombre'] ?>" placeholder="Nombre" maxlength="30">
            </div>
            <div class="form-group col-md-4">
                <label class="col-form-label text-right" for="ApellidoAB">Apellido:</label>
                <input type="text" class="form-control" id="ApellidoAB" name="ApellidoAB" value="<?= $caso['aapellido'] ?>" placeholder="Apellido" maxlength="30">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="TipoDocumentoAB" class="col-form-label text-right">Tipo de documento:</label>
                <select class="selectpicker form-control" data-live-search="true" data-size="8" id="TipoDocumentoAB" name="TipoDocumentoAB"  >
                    <option value="0" <?
                    if ($caso['atipodoc'] == "") {
                        echo "selected";
                    }
                    ?>>-</option>
                    <option value="DNI" <?
                    if ($caso['atipodoc'] == "DNI") {
                        echo "selected";
                    }
                    ?>>DNI</option>
                    <option value="DNI Extranjero" <?
                    if ($caso['atipodoc'] == "DNI Extranjero") {
                        echo "selected";
                    }
                    ?>>DNI Extranjero</option>
                    <option value="Pasaporte" <?
                    if ($caso['atipodoc'] == "Pasaporte") {
                        echo "selected";
                    }
                    ?>>Pasaporte</option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label class=" col-form-label text-right" for="NumeroDocumentoAB">Nº de documento:</label>
                <input type="text" class="form-control numdocumento" id="NumeroDocumentoAB" name="NumeroDocumentoAB" value="<?= $caso['adoc'] ?>" placeholder="Nº de documento" maxlength="11">
            </div>  
            <div class="form-group col-md-4">
                <label class="col-form-label text-right" for="EdadAB">Edad:</label>
                <input type="number" min="0" class="form-control" id="EdadAB" name="EdadAB" placeholder="Edad" value="<?= $caso['aedad'] ?>" pattern="[0-9]" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="3">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label class="col-form-label text-right" for="NacionalidadAB">Nacionalidad:</label>
                <select class="selectpicker form-control" data-live-search="true" data-size="8" id="NacionalidadAB" name="NacionalidadAB"  >
                    <option value="0" <?
                    if ($caso['anacion'] == "") {
                        echo "selected";
                    }
                    ?>>-</option>
                            <?
                            $sql = "SELECT * FROM nacionalidad WHERE activo = 's' order by orden asc";
                            $query = mysqli_query($con, $sql);
                            while ($row = mysqli_fetch_array($query)) {
                                $valor = $row['descr'];
                                $guardar = $row['id'];
                                ?>
                        <option value="<?= $guardar ?>" <?
                        if ($caso['anacion'] == $guardar) {
                            echo "selected";
                        }
                        ?>><?= $valor ?></option>
                                <?
                            }
                            ?>
                </select>
            </div> 
            <div class="form-group col-md-6">
                <label class="col-form-label text-right" for="GeneroAB">Identidad de Género:</label>
                <select class="selectpicker form-control" data-live-search="true" data-size="8" id="GeneroAB" name="GeneroAB"  >
                    <option value="0" <?
                    if ($caso['agenero'] == "") {
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
                        if ($caso['agenero'] == $guardar) {
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
                <label class="col-form-label text-right" for="ResidenciaAB">Lugar de Residencia:</label>

                <select class="selectpicker form-control" data-live-search="true" data-size="8" data-live-search="true" id="ResidenciaAB" name="ResidenciaAB"  >
                    <option value="0" <?
                    if ($caso['aresid'] == "") {
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
                        if ($caso['aresid'] == $guardar) {
                            echo "selected";
                        }
                        ?>><?= $valor ?></option>
                                <?
                            }
                            ?>
                </select>

            </div>  
            <div class="form-group col-md-6">
                <label class="col-form-label text-right" for="ActividadAB">Actividad:</label>
                <?
                $sql2 = "SELECT * FROM agresor_actividad WHERE agresor_id = '" . $caso['cagrid'] . "' ORDER BY nitem asc";
                $sqlcount2 = "SELECT count(*) AS numact FROM agresor_actividad WHERE agresor_id = '" . $caso['cagrid'] . "' ORDER BY nitem asc";
                $querycount2 = mysqli_query($con, $sqlcount2);
                $row = mysqli_fetch_array($querycount2);
                $numact = $row['numact'];
                if ($numact <> 0) {
                    $query2 = mysqli_query($con, $sql2);
                    while ($row = mysqli_fetch_array($query2)) {
                        $agresor_actividad[] = $row['actividad_id'];
                    }
                } else {
                    $agresor_actividad[] = 0;
                }
                $agresor_actividad_val = "";
                ?>
                <select class="selectpicker form-control" data-live-search="true" data-size="8" data-live-search="true" multiple id="ActividadAB" name="ActividadAB[]"  >
                    <?
                    $sql = "SELECT * FROM actividad WHERE activo = 's' order by orden asc";
                    $query = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_array($query)) {
                        $valor = $row['descr'];
                        $guardar = $row['id'];

                        if (in_array($guardar, $agresor_actividad)) {
                            if ($agresor_actividad_val == "") {
                                $agresor_actividad_val = $guardar;
                            } else {
                                $agresor_actividad_val .= ",$guardar";
                            }
                        }
                        ?>
                        <option value="<?= $guardar ?>" <?
                        if (in_array($guardar, $agresor_actividad)) {
                            echo "selected";
                        }
                        ?>><?= $valor ?></option>
                                <?
                            }
                            ?>
                </select>
                <input type="hidden" name="ValActividadAB" id="ValActividadAB" value="<?= $agresor_actividad_val ?>" />
            </div> 
        </div>

        <div class="form-row">
            <div class="form-group col-md-2">

                <label for="toggleAdiccionesAB" class="col-form-label">Adicciones:</label>
                <div>
                    <div class="btn-group btn-group-toggle"  data-toggle="buttons">
                        <label class="btn btn-option <?
                        if ($caso['aadiccion'] == "s") {
                            echo "active";
                        }
                        ?>" id="toggleAdiccionesSiAB" onclick="javascript:mostrar_sector('#AdiccionesAB')" style="width: 50px">
                            <input  type="radio" name="options" autocomplete="off"> Si
                        </label>
                        <label class="btn btn-option <?
                        if ($caso['aadiccion'] == "n") {
                            echo "active";
                        }
                        ?>" id="toggleAdiccionesNoAB" onclick="javascript:ocultar_sector('#AdiccionesAB')" style="width: 50px">
                            <input  type="radio" name="options" autocomplete="off"> No
                        </label>
                    </div>
                    <input type="hidden" id="toggleAdiccionesAB" name="toggleAdiccionesAB" value="No">
                </div>
            </div>
            <div class="form-group col-md-10" id="AdiccionesAB" <?
            if ($caso['aadiccion'] == "n") {
                echo 'style="display:none;"';
            }
            ?>>
                <label for="AdiccionesDetaleAB" class=" col-form-label text-right">Detalle:</label>
                <textarea class="form-control" style="resize:none;" id="AdiccionesDetaleAB" name="AdiccionesDetaleAB" rows="2" placeholder="Detalle"><?= $caso['aadicobs'] ?></textarea>
            </div>

        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label class="col-form-label text-right" for="ModoViolenciaAB">Modalidad de violencia:</label>
                <?
                $sql2 = "SELECT * FROM caso_modalidad WHERE caso_id = '" . $caso['idcaso'] . "' ORDER BY nitem asc";
                $sqlcount2 = "SELECT count(*) AS nummod FROM caso_modalidad WHERE caso_id = '" . $caso['idcaso'] . "' ORDER BY nitem asc";
                $querycount2 = mysqli_query($con, $sqlcount2);
                $row = mysqli_fetch_array($querycount2);
                $nummod = $row['nummod'];
                if ($nummod <> 0) {
                    $query2 = mysqli_query($con, $sql2);
                    while ($row = mysqli_fetch_array($query2)) {
                        $modo_violencia[] = $row['modalidad_violencia_id'];
                    }
                } else {
                    $modo_violencia[] = 0;
                }

                $modo_violencia_val = "";
                ?>
                <select class="selectpicker form-control" data-live-search="true" data-size="8" data-live-search="true" multiple id="ModoViolenciaAB" name="ModoViolenciaAB[]"  >
                    <?
                    $sql = "SELECT * FROM modalidad_violencia WHERE activo = 's' order by orden asc";
                    $query = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_array($query)) {
                        $valor = $row['descr'];
                        $guardar = $row['id'];
                        if (in_array($guardar, $modo_violencia)) {
                            if ($modo_violencia_val == "") {
                                $modo_violencia_val = $guardar;
                            } else {
                                $modo_violencia_val .= ",$guardar";
                            }
                        }
                        ?>
                        <option value="<?= $guardar ?>" <?
                        if (in_array($guardar, $modo_violencia)) {
                            echo "selected";
                        }
                        ?>><?= $valor ?></option>
                                <?
                            }
                            ?>
                </select>
                <input type="hidden" name="ValModoViolenciaAB" id="ValModoViolenciaAB" value="<?= $modo_violencia_val ?>"/>
            </div>  
            <div class="form-group col-md-6">
                <label class="col-form-label text-right" for="TipoViolenciaAB">Tipo de violencia:</label>
                <?
                $sql2 = "SELECT * FROM caso_tipo WHERE caso_id = '" . $caso['idcaso'] . "' ORDER BY nitem asc";
                $sqlcount2 = "SELECT count(*) AS numtipo FROM caso_tipo WHERE caso_id = '" . $caso['idcaso'] . "' ORDER BY nitem asc";
                $querycount2 = mysqli_query($con, $sqlcount2);
                $row = mysqli_fetch_array($querycount2);
                $numtipo = $row['numtipo'];
                if ($numtipo <> 0) {
                    $query2 = mysqli_query($con, $sql2);
                    while ($row = mysqli_fetch_array($query2)) {
                        $tipo_violencia[] = $row['tipo_violencia_id'];
                    }
                } else {
                    $tipo_violencia[] = 0;
                }
                $tipo_violencia_val = "";
                ?>
                <select class="selectpicker form-control" data-live-search="true" data-size="8" data-live-search="true" multiple id="TipoViolenciaAB" name="TipoViolenciaAB[]"  >
                    <?
                    $sql = "SELECT * FROM tipo_violencia WHERE activo = 's' order by orden asc";
                    $query = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_array($query)) {
                        $valor = $row['descr'];
                        $guardar = $row['id'];
                        if (in_array($guardar, $tipo_violencia)) {
                            if ($tipo_violencia_val == "") {
                                $tipo_violencia_val = $guardar;
                            } else {
                                $tipo_violencia_val .= ",$guardar";
                            }
                        }
                        ?>
                        <option value="<?= $guardar ?>" <?
                        if (in_array($guardar, $tipo_violencia)) {
                            echo "selected";
                        }
                        ?>><?= $valor ?></option>
                                <?
                            }
                            ?>
                </select>
                <input type="hidden" name="ValTipoViolenciaAB" id="ValTipoViolenciaAB" value="<?= $tipo_violencia_val ?>"/>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <?
                if ($caso['cdenuncia'] == "Si") {
                    $cdenuncia = "Si";
                } else if ($caso['cdenuncia'] == "No") {
                    $cdenuncia = "No";
                } else {
                    $cdenuncia = "No especifica";
                }
                ?>
                <label for="toggleDenunciasAB" class="col-form-label">Denuncias anteriores?</label>
                <div>
                    <div class="btn-group btn-group-toggle"  data-toggle="buttons">
                        <label class="btn btn-option <?
                        if ($cdenuncia == "No especifica") {
                            echo "active";
                        }
                        ?>" id="toggleDenunciasNEAB">
                            <input  type="radio" name="options" autocomplete="off"> No especifica
                        </label>
                        <label class="btn btn-option <?
                        if ($cdenuncia == "Si") {
                            echo "active";
                        }
                        ?>" id="toggleDenunciasSiAB" style="width: 50px">
                            <input  type="radio" name="options" autocomplete="off"> Si
                        </label>
                        <label class="btn btn-option <?
                        if ($cdenuncia == "No") {
                            echo "active";
                        }
                        ?>" id="toggleDenunciasNoAB" style="width: 50px">
                            <input  type="radio" name="options" autocomplete="off"> No
                        </label>
                    </div>
                    <input type="hidden" id="toggleDenunciasAB" name="toggleDenunciasAB" value="<?= $caso['cdenuncia'] ?>">
                </div>
            </div>
            <div class="form-group col-md-4">
                <?
                $sql2 = "SELECT * FROM caso_medidas WHERE caso_id = '" . $caso['idcaso'] . "' ORDER BY nitem asc";
                $sqlcount2 = "SELECT count(*) AS nummed FROM caso_medidas WHERE caso_id = '" . $caso['idcaso'] . "' ORDER BY nitem asc";
                $querycount2 = mysqli_query($con, $sqlcount2);
                $row = mysqli_fetch_array($querycount2);
                $nummed = $row['nummed'];
                $vencimiento = "";
                if ($nummed <> 0) {
                    $query2 = mysqli_query($con, $sql2);
                    while ($row = mysqli_fetch_array($query2)) {
                        $medidas_proteccion[] = $row['medidas_proteccion_id'];
                        
                        if ($row['vencimiento'] <> "") {
                            $vencimiento = date("Y-m-d", strtotime($row['vencimiento']));
                        }
                    }
                } else {
                    $medidas_proteccion[] = 0;
                }
                $medidas_proteccion_val = "";
                ?>
                <label for="toggleProteccionAB" class="col-form-label">Medidas de protección vigentes:</label>
                <select class="selectpicker form-control" data-live-search="true" data-size="8" data-live-search="true" multiple id="ProteccionAB" name="ProteccionAB[]"  >
                    <?
                    $sql = "SELECT * FROM medidas_proteccion WHERE activo = 's' order by orden asc";
                    $query = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_array($query)) {
                        $valor = $row['descr'];
                        $guardar = $row['id'];
                        if (in_array($guardar, $medidas_proteccion)) {
                            if ($medidas_proteccion_val == "") {
                                $medidas_proteccion_val = $guardar;
                            } else {
                                $medidas_proteccion_val .= ",$guardar";
                            }
                        }
                        ?>
                        <option value="<?= $guardar ?>" <?
                        if (in_array($guardar, $medidas_proteccion)) {
                            echo "selected";
                        }
                        ?>><?= $valor ?></option>
                                <?
                            }
                            ?>
                </select>
                <input type="hidden" name="ValProteccionAB" id="ValProteccionAB" value="<?= $medidas_proteccion_val ?>"/>
            </div>
            <div class="form-group col-md-4" id="vencimiento" <? if ($medidas_proteccion_val == "") {
                                echo "style='display:none'";
                            } ?>>
                <label for="VencimientoAB" class="col-form-label">Fecha de vencimiento:</label>
                <input type="date" class="form-control" id="VencimientoAB" name="VencimientoAB" <?if ($vencimiento <> ""){ echo "value='".$vencimiento."'";}?>>
            </div>

        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="IndicadoresRiesgoB" class="col-form-label">Indicadores de riesgo:</label>
            </div>

            <label for="toggleArmasAB" class="col-md-6 col-form-label text-md-right">Armas?</label>
            <div class="col-md-6">
                <div class="btn-group btn-group-toggle"  data-toggle="buttons">
                    <label class="btn btn-option <?
                    if ($caso['carmas'] == "f") {
                        echo "active";
                    }
                    ?>" id="toggleArmasFAB" style="width: 70px">
                        <input  type="radio" name="options"   autocomplete="off"> Fuego
                    </label>
                    <label class="btn btn-option <?
                    if ($caso['carmas'] == "b") {
                        echo "active";
                    }
                    ?>" id="toggleArmasBAB" style="width: 70px">
                        <input  type="radio" name="options"   autocomplete="off"> Blanca
                    </label>

                    <label class="btn btn-option <?
                    if ($caso['carmas'] == "n") {
                        echo "active";
                    }
                    ?>" id="toggleArmasNoAB" style="width: 70px">
                        <input  type="radio" name="options"  autocomplete="off"> No
                    </label>
                </div>
                <input type="hidden" id="toggleArmasAB" name="toggleArmasAB" value="<?= $caso['carmas'] ?>">
            </div>
            <label for="toggleGastosAB" class="col-md-6 col-form-label text-md-right">Cubre sus gastos?</label>
            <div class="col-md-6">
                <div class="btn-group btn-group-toggle"  data-toggle="buttons">
                    <label class="btn btn-option <?
                    if ($caso['cgastos'] == "s") {
                        echo "active";
                    }
                    ?>" id="toggleGastosSiAB" style="width: 50px">
                        <input  type="radio" name="options" autocomplete="off"> Si
                    </label>

                    <label class="btn btn-option <?
                    if ($caso['cgastos'] == "n") {
                        echo "active";
                    }
                    ?>" id="toggleGastosNoAB" style="width: 50px">
                        <input  type="radio" name="options" autocomplete="off"> No
                    </label>
                </div>
                <input type="hidden" id="toggleGastosAB" name="toggleGastosAB" value="<?= $caso['cgastos'] ?>">
            </div>
            <label for="toggleSocializoAB" class="col-md-6 col-form-label text-md-right">Socializó su situación?</label>
            <div class="col-md-6">
                <div class="btn-group btn-group-toggle"  data-toggle="buttons">
                    <label class="btn btn-option <?
                    if ($caso['csocializo'] == "s") {
                        echo "active";
                    }
                    ?>" id="toggleSocializoSiAB" style="width: 50px">
                        <input  type="radio" name="options" autocomplete="off"> Si
                    </label>

                    <label class="btn btn-option <?
                    if ($caso['csocializo'] == "n") {
                        echo "active";
                    }
                    ?>" id="toggleSocializoNoAB" style="width: 50px">
                        <input  type="radio" name="options" autocomplete="off"> No
                    </label>
                </div>
                <input type="hidden" id="toggleSocializoAB" name="toggleSocializoAB" value="<?= $caso['csocializo'] ?>">
            </div>
            <label for="toggleRecurrirAB" class="col-md-6 col-form-label text-md-right">Por urgencias tiene donde recurrir?</label>
            <div class="col-md-6">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-option <?
                    if ($caso['crecurrir'] == "s") {
                        echo "active";
                    }
                    ?>" id="toggleRecurrirSiAB" style="width: 50px">
                        <input  type="radio" name="options" autocomplete="off"> Si
                    </label>

                    <label class="btn btn-option <?
                    if ($caso['crecurrir'] == "n") {
                        echo "active";
                    }
                    ?>" id="toggleRecurrirNoAB" style="width: 50px">
                        <input  type="radio" name="options"  autocomplete="off"> No
                    </label>
                </div>
                <input type="hidden" id="toggleRecurrirAB" name="toggleRecurrirAB" value="<?= $caso['crecurrir'] ?>">
            </div>
            <label for="toggleDiscapacidadAB" class="col-md-6 col-form-label text-md-right">Presenta alguna discapacidad?</label>
            <div class="col-md-6">
                <div class="btn-group btn-group-toggle"  data-toggle="buttons">
                    <label class="btn btn-option <?
                    if ($caso['cdiscap'] == "s") {
                        echo "active";
                    }
                    ?>" id="toggleDiscapacidadSiAB" style="width: 50px">
                        <input  type="radio" name="options" autocomplete="off"> Si
                    </label>

                    <label class="btn btn-option <?
                    if ($caso['cdiscap'] == "n") {
                        echo "active";
                    }
                    ?>" id="toggleDiscapacidadNoAB" style="width: 50px">
                        <input  type="radio" name="options" autocomplete="off"> No
                    </label>
                </div>
                <input type="hidden" id="toggleDiscapacidadAB" name="toggleDiscapacidadAB" value="<?= $caso['cdiscap'] ?>">
            </div>
            <label for="toggleLocalizarlaAB" class="col-md-6 col-form-label text-md-right">Agresor puede localizarla?</label>
            <div class="col-md-6">
                <div class="btn-group btn-group-toggle"  data-toggle="buttons">
                    <label class="btn btn-option <?
                    if ($caso['clocalizable'] == "s") {
                        echo "active";
                    }
                    ?>" id="toggleLocalizarlaSiAB" style="width: 50px">
                        <input  type="radio" name="options" autocomplete="off"> Si
                    </label>

                    <label class="btn btn-option <?
                    if ($caso['clocalizable'] == "n") {
                        echo "active";
                    }
                    ?>" id="toggleLocalizarlaNoAB" style="width: 50px">
                        <input  type="radio" name="options" autocomplete="off"> No
                    </label>
                </div>
                <input type="hidden" id="toggleLocalizarlaAB" name="toggleLocalizarlaAB" value="<?= $caso['clocalizable'] ?>">
            </div>
            <label for="toggleAmenazasAB" class="col-md-6 col-form-label text-md-right">Recibió amenazas de muerte?</label>
            <div class="col-md-6">
                <div class="btn-group btn-group-toggle"  data-toggle="buttons">
                    <label class="btn btn-option <?
                    if ($caso['camenazas'] == "s") {
                        echo "active";
                    }
                    ?>" id="toggleAmenazasSiAB" style="width: 50px">
                        <input  type="radio" name="options"  autocomplete="off"> Si
                    </label>

                    <label class="btn btn-option <?
                    if ($caso['camenazas'] == "n") {
                        echo "active";
                    }
                    ?>" id="toggleAmenazasNoAB" style="width: 50px">
                        <input  type="radio" name="options" autocomplete="off"> No
                    </label>                    
                </div>
                <input type="hidden" id="toggleAmenazasAB" name="toggleAmenazasAB" value="<?= $caso['camenazas'] ?>">
            </div>
            <div class="col-12">&nbsp;</div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">

                <label for="DerivacionesAB" class="col-form-label">Derivaciones:</label>
                <?
                $sql2 = "SELECT * FROM caso_derivacion WHERE caso_id = '" . $caso['idcaso'] . "' ORDER BY nitem asc";
                $sqlcount2 = "SELECT count(*) AS numderiv FROM caso_derivacion WHERE caso_id = '" . $caso['idcaso'] . "' ORDER BY nitem asc";
                $querycount2 = mysqli_query($con, $sqlcount2);
                $row = mysqli_fetch_array($querycount2);
                $numderiv = $row['numderiv'];
                if ($numderiv <> 0) {
                    $query2 = mysqli_query($con, $sql2);
                    while ($row = mysqli_fetch_array($query2)) {
                        $c_derivacion[] = $row['derivacion_id'];
                    }
                } else {
                    $c_derivacion[] = 0;
                }
                $c_derivacion_val = "";
                ?>
                <select class="selectpicker form-control" data-live-search="true" data-size="8" data-live-search="true" multiple id="DerivacionesAB" name="DerivacionesAB[]">
                    <?
                    $sql = "SELECT * FROM derivacion WHERE motivo_consulta_id = 1 AND activo = 's' order by orden asc";
                    $query = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_array($query)) {
                        $valor = $row['descr'];
                        $guardar = $row['id'];
                        if (in_array($guardar, $c_derivacion)) {
                            if ($c_derivacion_val == "") {
                                $c_derivacion_val = $guardar;
                            } else {
                                $c_derivacion_val .= ",$guardar";
                            }
                        }
                        ?>
                        <option value="<?= $guardar ?>" <?
                        if (in_array($guardar, $c_derivacion)) {
                            echo "selected";
                        }
                        ?>><?= $valor ?></option>
                                <?
                            }
                            ?>
                </select>
                <input type="hidden" name="ValDerivacionesAB" id="ValDerivacionesAB" value="<?= $c_derivacion_val ?>"/>
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
                    <label for="IntervencionAB" class=" col-form-label text-right">Intervención y recursos:</label>
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
                        <textarea class="form-control" style="resize:none;" id="NIntervencionB" name="NIntervencionB" rows="3" placeholder="Intervención y recursos"></textarea>
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
        $('#cargar_seg').text('Nuevo seguimiento / indicación');
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


