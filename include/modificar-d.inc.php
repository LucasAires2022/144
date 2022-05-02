<? /*
 * FORMULARIO D
 */ ?>
<div id="formD" class="formulario">
    <div class="row">
        <div class='col-12'><p class="formulario-title text-center mt-4"><?= $formularios['D'] ?></p></div>
    </div>

    <div class="form-group row text-center text-md-left">
        <label for="toggleConsultanteD" class="col-md-8 col-form-label">Llama el niño/a o adolescente en situación de violencia?</label>
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
                ?>" id="toggleConsultanteSiD" onclick="javascript:ocultar_sector('#ConsultanteD')" style="width: 50px">
                    <input  type="radio" name="options"  autocomplete="off"> Si
                </label>
                <label class="btn btn-option <?
                if ($llamavictima == "No") {
                    echo "active";
                }
                ?>" id="toggleConsultanteNoD" onclick="javascript:mostrar_sector('#ConsultanteD')" style="width: 50px">
                    <input  type="radio" name="options" autocomplete="off"> No
                </label>
            </div>
            <input type="hidden" id="toggleConsultanteD" name="toggleConsultanteD" value="<?= $llamavictima ?>">
        </div>
    </div>
    <? /* CONSULTANTE */ ?>
    <div id="ConsultanteD" <?
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
                <label class="col-form-label text-right" for="NombreCD">Nombre:</label>
                <input type="text" class="form-control" id="NombreCD" name="NombreCD" value="<?= $caso['tnombre'] ?>" placeholder="Nombre" maxlength="30">
            </div>
            <div class="form-group col-md-6">
                <label class="col-form-label text-right" for="ApellidoCD">Apellido:</label>
                <input type="text" class="form-control" id="ApellidoCD" name="ApellidoCD" value="<?= $caso['tapellido'] ?>" placeholder="Apellido" maxlength="30">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="TipoDocumentoCD" class="col-form-label text-right">Tipo de documento:</label>

                <select class="selectpicker form-control" data-live-search="true" data-size="8" id="TipoDocumentoCD" name="TipoDocumentoCD"  >
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
                <label class="col-form-label text-right" for="NumeroDocumentoCD">Nº de documento:</label>
                <input type="text" class="form-control numdocumento" id="NumeroDocumentoCD" name="NumeroDocumentoCD" value='<?= $caso['tdoc'] ?>' placeholder="Nº de documento" maxlength="11">
            </div>  
            <div class="form-group col-md-4">
                <label class="col-form-label text-right" for="EdadCD">Edad:</label>
                <input type="number" min="0" class="form-control" id="EdadCD" name="EdadCD" placeholder="Edad" pattern="[0-9]"  value='<?= $caso['tedad'] ?>' oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="3">
            </div>  
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="TipoTelefonoCD" class=" col-form-label text-right">Tipo de teléfono:</label>
                <select class="selectpicker form-control" data-live-search="true" data-size="8" id="TipoTelefonoCD" name="TipoTelefonoCD"  >
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
                <label class="col-form-label text-right" for="NumeroTelefonoCD">Nº de teléfono:</label>
                <input type="number" min="0" class="form-control" id="NumeroTelefonoCD" name="NumeroTelefonoCD" placeholder="Nº de teléfono" value='<?= $caso['tntel'] ?>' oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="15" pattern="[0-9]">
            </div>
            <div class="form-group col-md-4">
                <label class="col-form-label text-right" for="VinculoCD">Vinculo:</label>
                <select class="selectpicker form-control" data-live-search="true" data-size="8" id="VinculoCD" name="VinculoCD"  >
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
        <div class="form-row">
            <div class="form-group col-md-6">
                <label class="col-form-label text-right" for="ResidenciaCD">Lugar de Residencia:</label>

                <select class="selectpicker form-control" data-live-search="true" data-size="8" id="ResidenciaCD" name="ResidenciaCD"  >
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
                <label class="col-form-label text-right" for="GeneroCD">Identidad de Género:</label>

                <select class="selectpicker form-control" data-live-search="true" data-size="8" id="GeneroCD" name="GeneroCD"  >
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

        </div>

    </div>
    <? /* Fin CONSULTANTE */ ?>
    <div id="VictimaB">
        <div class="row">
            <div class='col-11 col-md-9 mx-auto'>
                <div class="formulario-separador formulario-subtitle">Niño/a, adolescente en situación de violencia</div>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label class=" col-form-label text-right" for="NombreD">Nombre:</label>
                <input type="text" class="form-control" id="NombreD" name="NombreD" value='<?= $caso['vnombre'] ?>' placeholder="Nombre" maxlength="30">
            </div> 
            <div class="form-group col-md-6">
                <label class="col-form-label text-right" for="ApellidoD">Apellido:</label>
                <input type="text" class="form-control" id="ApellidoD" name="ApellidoD" value='<?= $caso['vapellido'] ?>' placeholder="Apellido" maxlength="30">
            </div>  
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="TipoDocumentoD" class="col-form-label text-right">Tipo de documento:</label>
                <select class="selectpicker form-control" data-live-search="true" data-size="8" id="TipoDocumentoD" name="TipoDocumentoD"  >
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
                <label class=" col-form-label text-right" for="NumeroDocumentoD">Nº de documento:</label>
                <input type="text" class="form-control numdocumento" id="NumeroDocumentoD" name="NumeroDocumentoD" value='<?= $caso['vdoc'] ?>' placeholder="Nº de documento" maxlength="11">
            </div>  
            <div class="form-group col-md-4">
                <label class="col-form-label text-right" for="EdadD">Edad:</label>
                <input type="number" min="0" class="form-control" id="EdadD" name="EdadD" placeholder="Edad" value='<?= $caso['vedad'] ?>' pattern="[0-9]" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="3">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label class="col-form-label text-right" for="NacionalidadD">Nacionalidad:</label>
                <select class="selectpicker form-control" data-live-search="true" data-size="8" id="NacionalidadD" name="NacionalidadD"  >
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
                <label class="col-form-label text-right" for="ResidenciaD">Lugar de Residencia:</label>

                <select class="selectpicker form-control" data-live-search="true" data-size="8" data-live-search="true" id="ResidenciaD" name="ResidenciaD"  >
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
                <label class="col-form-label text-right" for="CalleD"><strong>Domicilio: &nbsp;</strong> Calle:</label>
                <input type="text" class="form-control" id="CalleD" name="CalleD" value='<?= $caso['vcalle'] ?>' placeholder="Calle" maxlength="50">
            </div>  
            <div class="form-group col-md-3">
                <label class="col-form-label text-right" for="AlturaD">Altura:</label>
                <input type="number" min="0" class="form-control" id="AlturaD" name="AlturaD" value='<?= $caso['valtura'] ?>' placeholder="Altura" pattern="[0-9]" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="8">
            </div>  
            <div class="form-group col-md-3">
                <label class="col-form-label text-right" for="PisoDptoD">Piso/Dpto:</label>
                <input type="text" class="form-control" id="PisoDptoD" name="PisoDptoD" value='<?= $caso['vpisodep'] ?>' placeholder="Piso/Depto" maxlength="15">
            </div>

        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="TipoTelefonoD" class=" col-form-label text-right">Tipo de teléfono:</label>

                <select class="selectpicker form-control" data-live-search="true" data-size="8" id="TipoTelefonoD" name="TipoTelefonoD"  >
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
                <label class="col-form-label text-right" for="NumeroTelefonoD">Nº de teléfono:</label>
                <input type="number" min="0" class="form-control" id="NumeroTelefonoD" name="NumeroTelefonoD" placeholder="Nº de teléfono" value='<?= $caso['vntel'] ?>' oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="15" pattern="[0-9]">
            </div>  

        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label class="col-form-label text-right" for="GeneroD">Identidad de Género:</label>

                <select class="selectpicker form-control" data-live-search="true" data-size="8" id="GeneroD" name="GeneroD"  >
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
            <div class="form-group col-md-6">
                <label class="col-form-label text-right" for="MaltratoD">Tipo de maltrato:</label>
                <?
                $sql2 = "SELECT * FROM caso_maltrato WHERE caso_id = '" . $caso['idcaso'] . "' ORDER BY nitem asc";
                $sqlcount2 = "SELECT count(*) AS nummal FROM caso_maltrato WHERE caso_id = '" . $caso['idcaso'] . "' ORDER BY nitem asc";
                $querycount2 = mysqli_query($con, $sqlcount2);
                $row = mysqli_fetch_array($querycount2);
                $nummal = $row['nummal'];
                if ($nummal <> 0) {
                    $query2 = mysqli_query($con, $sql2);
                    while ($row = mysqli_fetch_array($query2)) {
                        $c_maltrato[] = $row['tipo_maltrato_id'];
                    }
                } else {
                    $c_maltrato[] = 0;
                }
                $c_maltrato_val = "";
                ?>
                <select class="selectpicker form-control" data-live-search="true" data-size="8" data-live-search="true" multiple id="MaltratoD" name="MaltratoD[]"  >
                    <?
                    $sql = "SELECT * FROM tipo_maltrato WHERE activo = 's' order by orden asc";
                    $query = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_array($query)) {
                        $valor = $row['descr'];
                        $guardar = $row['id'];
                        if (in_array($guardar, $c_maltrato)) {
                            if ($c_maltrato_val == "") {
                                $c_maltrato_val = $guardar;
                            } else {
                                $c_maltrato_val .= ",$guardar";
                            }
                        }
                        ?>
                        <option value="<?= $guardar ?>" <?
                        if (in_array($guardar, $c_maltrato)) {
                            echo "selected";
                        }
                        ?>><?= $valor ?></option>
                                <?
                            }
                            ?>
                </select>
                <input type="hidden" name="ValMaltratoD" id="ValMaltratoD" value="<?= $c_maltrato_val ?>"/>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="IndicadoresRiesgoD" class="col-form-label">Indicadores de riesgo:</label>
                </div>

                <label for="toggleArmasD" class="col-md-6 col-form-label text-md-right">Armas?</label>
                <div class="col-md-6">
                    <div class="btn-group btn-group-toggle"  data-toggle="buttons">
                        <label class="btn btn-option <?
                        if ($caso['carmas'] == "f") {
                            echo "active";
                        }
                        ?>" id="toggleArmasFD" style="width: 70px">
                            <input  type="radio" name="options"   autocomplete="off"> Fuego
                        </label>
                        <label class="btn btn-option <?
                        if ($caso['carmas'] == "b") {
                            echo "active";
                        }
                        ?>" id="toggleArmasBD" style="width: 70px">
                            <input  type="radio" name="options"   autocomplete="off"> Blanca
                        </label>

                        <label class="btn btn-option <?
                        if ($caso['carmas'] == "n") {
                            echo "active";
                        }
                        ?>" id="toggleArmasNoD" style="width: 70px">
                            <input  type="radio" name="options"  autocomplete="off"> No
                        </label>
                    </div>
                    <input type="hidden" id="toggleArmasD" name="toggleArmasD" value="<?= $caso['carmas'] ?>">
                </div>
                <label for="toggleGastosD" class="col-md-6 col-form-label text-md-right">Cubre sus gastos?</label>
                <div class="col-md-6">
                    <div class="btn-group btn-group-toggle"  data-toggle="buttons">
                        <label class="btn btn-option <?
                        if ($caso['cgastos'] == "s") {
                            echo "active";
                        }
                        ?>" id="toggleGastosSiD" style="width: 50px">
                            <input  type="radio" name="options" autocomplete="off"> Si
                        </label>

                        <label class="btn btn-option <?
                        if ($caso['cgastos'] == "n") {
                            echo "active";
                        }
                        ?>" id="toggleGastosNoD" style="width: 50px">
                            <input  type="radio" name="options" autocomplete="off"> No
                        </label>
                    </div>
                    <input type="hidden" id="toggleGastosD" name="toggleGastosD" value="<?= $caso['cgastos'] ?>">
                </div>
                <label for="toggleSocializoD" class="col-md-6 col-form-label text-md-right">Socializó su situación?</label>
                <div class="col-md-6">
                    <div class="btn-group btn-group-toggle"  data-toggle="buttons">
                        <label class="btn btn-option <?
                        if ($caso['csocializo'] == "s") {
                            echo "active";
                        }
                        ?>" id="toggleSocializoSiD" style="width: 50px">
                            <input  type="radio" name="options" autocomplete="off"> Si
                        </label>

                        <label class="btn btn-option <?
                        if ($caso['csocializo'] == "n") {
                            echo "active";
                        }
                        ?>" id="toggleSocializoNoD" style="width: 50px">
                            <input  type="radio" name="options" autocomplete="off"> No
                        </label>
                    </div>
                    <input type="hidden" id="toggleSocializoD" name="toggleSocializoD" value="<?= $caso['csocializo'] ?>">
                </div>
                <label for="toggleRecurrirD" class="col-md-6 col-form-label text-md-right">Por urgencias tiene donde recurrir?</label>
                <div class="col-md-6">
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-option <?
                        if ($caso['crecurrir'] == "s") {
                            echo "active";
                        }
                        ?>" id="toggleRecurrirSiD" style="width: 50px">
                            <input  type="radio" name="options" autocomplete="off"> Si
                        </label>

                        <label class="btn btn-option <?
                        if ($caso['crecurrir'] == "n") {
                            echo "active";
                        }
                        ?>" id="toggleRecurrirNoD" style="width: 50px">
                            <input  type="radio" name="options"  autocomplete="off"> No
                        </label>
                    </div>
                    <input type="hidden" id="toggleRecurrirD" name="toggleRecurrirD" value="<?= $caso['crecurrir'] ?>">
                </div>
                <label for="toggleDiscapacidadD" class="col-md-6 col-form-label text-md-right">Presenta alguna discapacidad?</label>
                <div class="col-md-6">
                    <div class="btn-group btn-group-toggle"  data-toggle="buttons">
                        <label class="btn btn-option <?
                        if ($caso['cdiscap'] == "s") {
                            echo "active";
                        }
                        ?>" id="toggleDiscapacidadSiD" style="width: 50px">
                            <input  type="radio" name="options" autocomplete="off"> Si
                        </label>

                        <label class="btn btn-option <?
                        if ($caso['cdiscap'] == "n") {
                            echo "active";
                        }
                        ?>" id="toggleDiscapacidadNoD" style="width: 50px">
                            <input  type="radio" name="options" autocomplete="off"> No
                        </label>
                    </div>
                    <input type="hidden" id="toggleDiscapacidadD" name="toggleDiscapacidadD" value="<?= $caso['cdiscap'] ?>">
                </div>
                <label for="toggleLocalizarlaD" class="col-md-6 col-form-label text-md-right">Agresor puede localizarlo/a?</label>
                <div class="col-md-6">
                    <div class="btn-group btn-group-toggle"  data-toggle="buttons">
                        <label class="btn btn-option <?
                        if ($caso['clocalizable'] == "s") {
                            echo "active";
                        }
                        ?>" id="toggleLocalizarlaSiD" style="width: 50px">
                            <input  type="radio" name="options" autocomplete="off"> Si
                        </label>

                        <label class="btn btn-option <?
                        if ($caso['clocalizable'] == "n") {
                            echo "active";
                        }
                        ?>" id="toggleLocalizarlaNoD" style="width: 50px">
                            <input  type="radio" name="options" autocomplete="off"> No
                        </label>
                    </div>
                    <input type="hidden" id="toggleLocalizarlaD" name="toggleLocalizarlaD" value="<?= $caso['clocalizable'] ?>">
                </div>
                <label for="toggleAmenazasD" class="col-md-6 col-form-label text-md-right">Recibió amenazas de muerte?</label>
                <div class="col-md-6">
                    <div class="btn-group btn-group-toggle"  data-toggle="buttons">
                        <label class="btn btn-option <?
                        if ($caso['camenazas'] == "s") {
                            echo "active";
                        }
                        ?>" id="toggleAmenazasSiD" style="width: 50px">
                            <input  type="radio" name="options"  autocomplete="off"> Si
                        </label>

                        <label class="btn btn-option <?
                        if ($caso['camenazas'] == "n") {
                            echo "active";
                        }
                        ?>" id="toggleAmenazasNoD" style="width: 50px">
                            <input  type="radio" name="options" autocomplete="off"> No
                        </label>                    
                    </div>
                    <input type="hidden" id="toggleAmenazasD" name="toggleAmenazasD" value="<?= $caso['camenazas'] ?>">
                </div>
                <label for="toggleEscolarizadoD" class="col-md-6 col-form-label text-md-right">Se encuentra escolarizado?</label>
                <div class="col-md-6">
                    <div class="btn-group btn-group-toggle"  data-toggle="buttons">
                        <label class="btn btn-option <?
                        if ($caso['cescolarizado'] == "s") {
                            echo "active";
                        }
                        ?>" id="toggleEscolarizadoSiD" style="width: 50px">
                            <input  type="radio" name="options"  autocomplete="off"> Si
                        </label>

                        <label class="btn btn-option <?
                        if ($caso['cescolarizado'] == "n") {
                            echo "active";
                        }
                        ?>" id="toggleEscolarizadoNoD" style="width: 50px">
                            <input  type="radio" name="options" autocomplete="off"> No
                        </label>                    
                    </div>
                    <input type="hidden" id="toggleEscolarizadoD" name="toggleEscolarizadoD" value="<?= $caso['cescolarizado'] ?>">
                </div>
                <div class="col-12">&nbsp;</div>
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
                <label for="toggleHermanosD" class="col-form-label">Tiene hermanas/os o niñas/os convivientes?</label>
                <div>
                    <div class="btn-group btn-group-toggle"  data-toggle="buttons">
                        <label class="btn btn-option <?
                        if ($tiene_hijos == "NE") {
                            echo "active";
                        }
                        ?>" id="toggleHermanosNED" onclick="javascript:ocultar_sector('#HermanosD')">
                            <input  type="radio" name="options" autocomplete="off"> No especifica
                        </label>
                        <label class="btn btn-option <?
                        if ($tiene_hijos == "Si") {
                            echo "active";
                        }
                        ?>" id="toggleHermanosSiD" onclick="javascript:mostrar_sector('#HermanosD')" style="width: 50px">
                            <input  type="radio" name="options" autocomplete="off"> Si
                        </label>
                        <label class="btn btn-option <?
                        if ($tiene_hijos == "No") {
                            echo "active";
                        }
                        ?>" id="toggleHermanosNoD" onclick="javascript:ocultar_sector('#HermanosD')" style="width: 50px">
                            <input  type="radio" name="options" autocomplete="off"> No
                        </label>
                    </div>
                    <input type="hidden" id="toggleHermanosD" name="toggleHermanosD" value="<?= $tiene_hijos ?>">
                </div>
            </div>
        </div>
        <div id="HermanosD" <?
        if ($tiene_hijos != "Si") {
            echo 'style="display:none;"';
        }
        ?>>
            <div class="form-row">
                <div class="form-group col-md-2 mb-0">
                    <label class="col-form-label text-right" for="HGeneroD">Id. Género</label>
                </div>
                <div class="form-group col-md-2 mb-0">
                    <label class="col-form-label text-right" for="HEdadD">Edad</label>
                </div>
                <div class="form-group col-md-3 mb-0">
                    <label class="col-form-label text-right" for="HMaltratoD">Sufre maltrato</label>
                </div>
                <div class="form-group col-md-2 mb-0">
                    <label class="col-form-label text-right" for="HConviveD">Convive</label>
                </div>
                <div class="form-group col-md-3 mb-0">
                    <label class="col-form-label text-right" for="HConductaD">Conducta violenta</label>
                </div>
            </div>
            <?
            for ($x = 1; $x <= 10; $x++) {
                ?>
                <div class="form-row cloned_hijos" id="HermanoD<?= $x ?>" <?
                if ($x > $aqhijos) {
                    echo "style='display:none'";
                }
                ?>>
                    <div class="form-group col-md-2 mt-0">
                        <select class="selectpicker form-control" data-live-search="true" data-size="8" id="HGeneroD<?= $x ?>" name="HGeneroD<?= $x ?>"  >
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
                        <input type="number" min="0" class="form-control" id="HEdadD<?= $x ?>" name="HEdadD<?= $x ?>" placeholder="Edad" value="<?= $hijos[$x]['edad'] ?>" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="3">
                    </div>
                     <?
                    $h_maltrato = explode(",", $hijos[$x]['maltrato']);
                    ?>
                    <div class="form-group col-md-3 mt-0">
                        <select class="selectpicker form-control" data-live-search="true" data-size="8" multiple id="HMaltratoD<?= $x ?>" name="HMaltratoD<?= $x ?>[]"  >
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
                        <input type="hidden" name="ValHMaltratoD<?= $x ?>" id="ValHMaltratoD<?= $x ?>" value="<?=$hijos[$x]['maltrato']?>" />
                    </div>
                    <div class="form-group col-md-2 mt-0">
                        <select class="selectpicker form-control" data-live-search="true" data-size="8" id="HConviveD<?= $x ?>" name="HConviveD<?= $x ?>"  >
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
                        <select class="selectpicker form-control" data-live-search="true" data-size="8" id="HConductaD<?= $x ?>" name="HConductaD<?= $x ?>"  >
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
                    <div class="btn-group" role="group" aria-label="Hermanos">
                        <button id="btnagregarhermano" type="button" class="btn btn-custom" <?
                        if ($aqhijos == 10) {
                            echo "disabled";
                        }
                        ?> onclick="javascript:agregar_hermano()">Agregar</button>
                        <button id="btnquitarhermano" type="button" class="btn btn-custom" <?
                        if ($aqhijos == 1) {
                            echo "disabled";
                        }
                        ?> onclick="javascript:quitar_hermano()">Quitar</button>
                        <input type="hidden" id="aqhermano" name="aqhermano" value="<?= $aqhijos ?>">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="AgresorD">
        <div class="row">
            <div class='col-11 col-md-9 mx-auto'>
                <div class="formulario-separador formulario-subtitle">Datos del agresor</div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label class="col-form-label text-right" for="VinculoAD">Vinculo:</label>

                <select class="selectpicker form-control" data-live-search="true" data-size="8" id="VinculoAD" name="VinculoAD"  >
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
                <label class="col-form-label text-right" for="NombreAD">Nombre:</label>
                <input type="text" class="form-control" id="NombreAD" name="NombreAD" value="<?= $caso['anombre'] ?>" placeholder="Nombre" maxlength="30">
            </div>
            <div class="form-group col-md-4">
                <label class="col-form-label text-right" for="ApellidoAD">Apellido:</label>
                <input type="text" class="form-control" id="ApellidoAD" name="ApellidoAD" value="<?= $caso['aapellido'] ?>" placeholder="Apellido" maxlength="30">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="TipoDocumentoAD" class="col-form-label text-right">Tipo de documento:</label>
                <select class="selectpicker form-control" data-live-search="true" data-size="8" id="TipoDocumentoAD" name="TipoDocumentoAD"  >
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
                <label class=" col-form-label text-right" for="NumeroDocumentoAD">Nº de documento:</label>
                <input type="text" class="form-control numdocumento" id="NumeroDocumentoAD" name="NumeroDocumentoAD" value="<?= $caso['adoc'] ?>" placeholder="Nº de documento" maxlength="11">
            </div>  
            <div class="form-group col-md-4">
                <label class="col-form-label text-right" for="EdadAD">Edad:</label>
                <input type="number" min="0" class="form-control" id="EdadAD" name="EdadAD" placeholder="Edad" pattern="[0-9]" value="<?= $caso['aedad'] ?>" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="3">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label class="col-form-label text-right" for="NacionalidadAD">Nacionalidad:</label>
                <select class="selectpicker form-control" data-live-search="true" data-size="8" id="NacionalidadAD" name="NacionalidadAD"  >
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
                <label class="col-form-label text-right" for="GeneroAD">Identidad de Género:</label>
                <select class="selectpicker form-control" data-live-search="true" data-size="8" id="GeneroAD" name="GeneroAD"  >
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
            <div class="form-group col-md-12">
                <label for="DerivacionesAD" class="col-form-label">Derivaciones:</label>
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
                <select class="selectpicker form-control" data-live-search="true" data-size="8" data-live-search="true" multiple id="DerivacionesAD" name="DerivacionesAD[]">
                    <?
                    $sql = "SELECT * FROM derivacion WHERE motivo_consulta_id = 3 AND activo = 's' order by orden asc";
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
                <input type="hidden" name="ValDerivacionesAD" id="ValDerivacionesAD" value="<?= $c_derivacion_val ?>"/>
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


