<? /*
 * FORMULARIO D
 */ ?>
<div id="formD" class="formulario" style="display:none;">
    <div class="row">
        <div class='col-12'><p class="formulario-title text-center mt-4"><?= $formularios['D'] ?></p></div>
    </div>

    <div class="form-group row text-center text-md-left">
        <label for="toggleConsultanteD" class="col-md-8 col-form-label">Llama el niño/a o adolescente en situación de violencia?</label>
        <div class="col-md-4">
            <div class="btn-group btn-group-toggle"  data-toggle="buttons">
                <label class="btn btn-option" id="toggleConsultanteSiD" onclick="javascript:ocultar_sector('#ConsultanteD')" style="width: 50px">
                    <input  type="radio" name="options"  autocomplete="off"> Si
                </label>
                <label class="btn btn-option active" id="toggleConsultanteNoD" onclick="javascript:mostrar_sector('#ConsultanteD')" style="width: 50px">
                    <input  type="radio" name="options" autocomplete="off"> No
                </label>
            </div>
            <input type="hidden" id="toggleConsultanteD" name="toggleConsultanteD" value="No">
        </div>
    </div>
    <? /* CONSULTANTE */ ?>
    <div id="ConsultanteD">
        <div class="row">
            <div class='col-11 col-md-9 mx-auto'>
                <div class="formulario-separador formulario-subtitle">Consultante</div>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label class="col-form-label text-right" for="NombreCD">Nombre:</label>
                <input type="text" class="form-control" id="NombreCD" name="NombreCD" placeholder="Nombre" maxlength="30">
            </div>
            <div class="form-group col-md-6">
                <label class="col-form-label text-right" for="ApellidoCD">Apellido:</label>
                <input type="text" class="form-control" id="ApellidoCD" name="ApellidoCD" placeholder="Apellido" maxlength="30">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="TipoDocumentoCD" class="col-form-label text-right">Tipo de documento:</label>

                <select class="selectpicker form-control" data-live-search="true" data-size="8" id="TipoDocumentoCD" name="TipoDocumentoCD"  >
                    <option value="0" selected>-</option>
                    <option value="DNI">DNI</option>
                    <option value="DNI Extranjero">DNI Extranjero</option>
                    <option value="Pasaporte">Pasaporte</option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label class="col-form-label text-right" for="NumeroDocumentoCD">Nº de documento:</label>
                <input type="text" class="form-control numdocumento" id="NumeroDocumentoCD" name="NumeroDocumentoCD" placeholder="Nº de documento" maxlength="11">
            </div>  
            <div class="form-group col-md-4">
                <label class="col-form-label text-right" for="EdadCD">Edad:</label>
                <input type="number" min="0" class="form-control" id="EdadCD" name="EdadCD" placeholder="Edad" pattern="[0-9]" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="3">
            </div>  
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="TipoTelefonoCD" class=" col-form-label text-right">Tipo de teléfono:</label>
                <select class="selectpicker form-control" data-live-search="true" data-size="8" id="TipoTelefonoCD" name="TipoTelefonoCD"  >
                    <option value="0" selected>-</option>
                    <option value="Particular fijo">Particular fijo</option>
                    <option value="Laboral">Laboral</option>
                    <option value="Celular">Celular</option>
                    <option value="Mensajes">Mensajes</option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label class="col-form-label text-right" for="NumeroTelefonoCD">Nº de teléfono:</label>
                <input type="number" min="0" class="form-control" id="NumeroTelefonoCD" name="NumeroTelefonoCD" placeholder="Nº de teléfono" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="15" pattern="[0-9]">
            </div>             
            <div class="form-group col-md-4">
                <label class="col-form-label text-right" for="VinculoCD">Vinculo:</label>
                <select class="selectpicker form-control" data-live-search="true" data-size="8" id="VinculoCD" name="VinculoCD"  >
                    <option value="0" selected>-</option>
                    <?
                    $sql = "SELECT * FROM vinculo_consultante WHERE activo = 's' order by orden asc";
                    $query = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_array($query)) {
                        $valor = $row['vinculo'];
                        $guardar = $row['id'];
                        ?>
                        <option value="<?= $guardar ?>"><?= $valor ?></option>
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
                    <option value="0" selected>-</option>
                    <?
                    $sql = "SELECT * FROM lugar_residencia WHERE activo = 's' order by orden asc";
                    $query = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_array($query)) {
                        $valor = $row['descr'];
                        $guardar = $row['id'];
                        ?>
                        <option value="<?= $guardar ?>"><?= $valor ?></option>
                        <?
                    }
                    ?>
                </select>
            </div>  
            <div class="form-group col-md-6">
                <label class="col-form-label text-right" for="GeneroCD">Identidad de Género:</label>
                <select class="selectpicker form-control" data-live-search="true" data-size="8" id="GeneroCD" name="GeneroCD"  >
                    <option value="0" selected>-</option>
                    <?
                    $sql = "SELECT * FROM identidad_genero WHERE activo = 's' order by orden asc";
                    $query = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_array($query)) {
                        $valor = $row['identidad'];
                        $guardar = $row['id'];
                        ?>
                        <option value="<?= $guardar ?>"><?= $valor ?></option>
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
                <input type="text" class="form-control" id="NombreD" name="NombreD" placeholder="Nombre" maxlength="30">
            </div> 
            <div class="form-group col-md-6">
                <label class="col-form-label text-right" for="ApellidoD">Apellido:</label>
                <input type="text" class="form-control" id="ApellidoD" name="ApellidoD" placeholder="Apellido" maxlength="30">
            </div>  
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="TipoDocumentoD" class="col-form-label text-right">Tipo de documento:</label>
                <select class="selectpicker form-control" data-live-search="true" data-size="8" id="TipoDocumentoD" name="TipoDocumentoD"  >
                    <option value="0" selected>-</option>
                    <option value="DNI">DNI</option>
                    <option value="DNI Extranjero">DNI Extranjero</option>
                    <option value="Pasaporte">Pasaporte</option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label class=" col-form-label text-right" for="NumeroDocumentoD">Nº de documento:</label>
                <input type="text" class="form-control numdocumento" id="NumeroDocumentoD" name="NumeroDocumentoD" placeholder="Nº de documento" maxlength="11">
            </div>  
            <div class="form-group col-md-4">
                <label class="col-form-label text-right" for="EdadD">Edad:</label>
                <input type="number" min="0" class="form-control" id="EdadD" name="EdadD" placeholder="Edad" pattern="[0-9]" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="3">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label class="col-form-label text-right" for="NacionalidadD">Nacionalidad:</label>
                <select class="selectpicker form-control" data-live-search="true" data-size="8" id="NacionalidadD" name="NacionalidadD"  >
                    <option value="0" selected>-</option>
                    <?
                    $sql = "SELECT * FROM nacionalidad WHERE activo = 's' order by orden asc";
                    $query = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_array($query)) {
                        $valor = $row['descr'];
                        $guardar = $row['id'];
                        ?>
                        <option value="<?= $guardar ?>"><?= $valor ?></option>
                        <?
                    }
                    ?>
                </select>
            </div> 
            <div class="form-group col-md-6">
                <label class="col-form-label text-right" for="ResidenciaD">Lugar de Residencia:</label>

                <select class="selectpicker form-control" data-live-search="true" data-size="8" data-live-search="true" id="ResidenciaD" name="ResidenciaD"  >
                    <option value="0" selected>-</option>
                    <?
                    $sql = "SELECT * FROM lugar_residencia WHERE activo = 's' order by orden asc";
                    $query = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_array($query)) {
                        $valor = $row['descr'];
                        $guardar = $row['id'];
                        ?>
                        <option value="<?= $guardar ?>"><?= $valor ?></option>
                        <?
                    }
                    ?>
                </select>

            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label class="col-form-label text-right" for="CalleD"><strong>Domicilio: &nbsp;</strong> Calle:</label>
                <input type="text" class="form-control" id="CalleD" name="CalleD" placeholder="Calle" maxlength="50">
            </div>  
            <div class="form-group col-md-3">
                <label class="col-form-label text-right" for="AlturaD">Altura:</label>
                <input type="number" min="0" class="form-control" id="AlturaD" name="AlturaD" placeholder="Altura" pattern="[0-9]" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="8">
            </div>  
            <div class="form-group col-md-3">
                <label class="col-form-label text-right" for="PisoDptoD">Piso/Dpto:</label>
                <input type="text" class="form-control" id="PisoDptoD" name="PisoDptoD" placeholder="Piso/Depto" maxlength="15">
            </div>

        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="TipoTelefonoD" class=" col-form-label text-right">Tipo de teléfono:</label>

                <select class="selectpicker form-control" data-live-search="true" data-size="8" id="TipoTelefonoD" name="TipoTelefonoD"  >
                    <option value="0" selected>-</option>
                    <option value="Particular fijo">Particular fijo</option>
                    <option value="Laboral">Laboral</option>
                    <option value="Celular">Celular</option>
                    <option value="Mensajes">Mensajes</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label class="col-form-label text-right" for="NumeroTelefonoD">Nº de teléfono:</label>
                <input type="number" min="0" class="form-control" id="NumeroTelefonoD" name="NumeroTelefonoD" placeholder="Nº de teléfono" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="15" pattern="[0-9]">
            </div>  

        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label class="col-form-label text-right" for="GeneroD">Identidad de Género:</label>

                <select class="selectpicker form-control" data-live-search="true" data-size="8" id="GeneroD" name="GeneroD"  >
                    <option value="0" selected>-</option>
                    <?
                    $sql = "SELECT * FROM identidad_genero WHERE activo = 's' order by orden asc";
                    $query = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_array($query)) {
                        $valor = $row['identidad'];
                        $guardar = $row['id'];
                        ?>
                        <option value="<?= $guardar ?>"><?= $valor ?></option>
                        <?
                    }
                    ?>
                </select>

            </div>
            <div class="form-group col-md-6">
                <label class="col-form-label text-right" for="MaltratoD">Tipo de maltrato:</label>
                <? /* <select class="form-control" id="ActividadB" name="ActividadB"  > */ ?>
                <select class="selectpicker form-control" data-live-search="true" data-size="8" data-live-search="true" multiple id="MaltratoD" name="MaltratoD[]"  >
                    <?
                    $sql = "SELECT * FROM tipo_maltrato WHERE activo = 's' order by orden asc";
                    $query = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_array($query)) {
                        $valor = $row['descr'];
                        $guardar = $row['id'];
                        ?>
                        <option value="<?= $guardar ?>"><?= $valor ?></option>
                        <?
                    }
                    ?>
                </select>
                <input type="hidden" name="ValMaltratoD" id="ValMaltratoD" />
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="IndicadoresRiesgoD" class="col-form-label">Indicadores de riesgo:</label>
                </div>

                <label for="toggleArmasD" class="col-md-6 col-form-label text-md-right">Armas?</label>
                <div class="col-md-6">
                    <div class="btn-group btn-group-toggle"  data-toggle="buttons">
                         <label class="btn btn-option" id="toggleArmasFD" style="width: 70px">
                        <input  type="radio" name="options"   autocomplete="off"> Fuego
                    </label>
                    <label class="btn btn-option" id="toggleArmasBD" style="width: 70px">
                        <input  type="radio" name="options"   autocomplete="off"> Blanca
                    </label>

                        <label class="btn btn-option active" id="toggleArmasNoD" style="width: 70px">
                            <input  type="radio" name="options"  autocomplete="off"> No
                        </label>
                    </div>
                    <input type="hidden" id="toggleArmasD" name="toggleArmasD" value="n">
                </div>
                <label for="toggleGastosD" class="col-md-6 col-form-label text-md-right">Cubre sus gastos?</label>
                <div class="col-md-6">
                    <div class="btn-group btn-group-toggle"  data-toggle="buttons">
                        <label class="btn btn-option" id="toggleGastosSiD" style="width: 50px">
                            <input  type="radio" name="options" autocomplete="off"> Si
                        </label>

                        <label class="btn btn-option active" id="toggleGastosNoD" style="width: 50px">
                            <input  type="radio" name="options" autocomplete="off"> No
                        </label>
                    </div>
                    <input type="hidden" id="toggleGastosD" name="toggleGastosD" value="n">
                </div>
                <label for="toggleSocializoD" class="col-md-6 col-form-label text-md-right">Socializó su situación?</label>
                <div class="col-md-6">
                    <div class="btn-group btn-group-toggle"  data-toggle="buttons">
                        <label class="btn btn-option" id="toggleSocializoSiD" style="width: 50px">
                            <input  type="radio" name="options" autocomplete="off"> Si
                        </label>

                        <label class="btn btn-option active" id="toggleSocializoNoD" style="width: 50px">
                            <input  type="radio" name="options" autocomplete="off"> No
                        </label>
                    </div>
                    <input type="hidden" id="toggleSocializoD" name="toggleSocializoD" value="n">
                </div>
                <label for="toggleRecurrirD" class="col-md-6 col-form-label text-md-right">Por urgencias tiene donde recurrir?</label>
                <div class="col-md-6">
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-option" id="toggleRecurrirSiD" style="width: 50px">
                            <input  type="radio" name="options" autocomplete="off"> Si
                        </label>

                        <label class="btn btn-option active" id="toggleRecurrirNoD" style="width: 50px">
                            <input  type="radio" name="options"  autocomplete="off"> No
                        </label>
                    </div>
                    <input type="hidden" id="toggleRecurrirD" name="toggleRecurrirD" value="n">
                </div>
                <label for="toggleDiscapacidadD" class="col-md-6 col-form-label text-md-right">Presenta alguna discapacidad?</label>
                <div class="col-md-6">
                    <div class="btn-group btn-group-toggle"  data-toggle="buttons">
                        <label class="btn btn-option" id="toggleDiscapacidadSiD" style="width: 50px">
                            <input  type="radio" name="options" autocomplete="off"> Si
                        </label>

                        <label class="btn btn-option active" id="toggleDiscapacidadNoD" style="width: 50px">
                            <input  type="radio" name="options" autocomplete="off"> No
                        </label>
                    </div>
                    <input type="hidden" id="toggleDiscapacidadD" name="toggleDiscapacidadD" value="n">
                </div>
                <label for="toggleLocalizarlaD" class="col-md-6 col-form-label text-md-right">Agresor puede localizarlo/a?</label>
                <div class="col-md-6">
                    <div class="btn-group btn-group-toggle"  data-toggle="buttons">
                        <label class="btn btn-option" id="toggleLocalizarlaSiD" style="width: 50px">
                            <input  type="radio" name="options" autocomplete="off"> Si
                        </label>

                        <label class="btn btn-option active" id="toggleLocalizarlaNoD" style="width: 50px">
                            <input  type="radio" name="options" autocomplete="off"> No
                        </label>
                    </div>
                    <input type="hidden" id="toggleLocalizarlaD" name="toggleLocalizarlaD" value="n">
                </div>
                <label for="toggleAmenazasD" class="col-md-6 col-form-label text-md-right">Recibió amenazas de muerte?</label>
                <div class="col-md-6">
                    <div class="btn-group btn-group-toggle"  data-toggle="buttons">
                        <label class="btn btn-option" id="toggleAmenazasSiD" style="width: 50px">
                            <input  type="radio" name="options"  autocomplete="off"> Si
                        </label>

                        <label class="btn btn-option active" id="toggleAmenazasNoD" style="width: 50px">
                            <input  type="radio" name="options" autocomplete="off"> No
                        </label>                    
                    </div>
                    <input type="hidden" id="toggleAmenazasD" name="toggleAmenazasD" value="n">
                </div>
                <label for="toggleEscolarizadoD" class="col-md-6 col-form-label text-md-right">Se encuentra escolarizado?</label>
                <div class="col-md-6">
                    <div class="btn-group btn-group-toggle"  data-toggle="buttons">
                        <label class="btn btn-option" id="toggleEscolarizadoSiD" style="width: 50px">
                            <input  type="radio" name="options"  autocomplete="off"> Si
                        </label>

                        <label class="btn btn-option active" id="toggleEscolarizadoNoD" style="width: 50px">
                            <input  type="radio" name="options" autocomplete="off"> No
                        </label>                    
                    </div>
                    <input type="hidden" id="toggleEscolarizadoD" name="toggleEscolarizadoD" value="n">
                </div>
                <div class="col-12">&nbsp;</div>
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-group col-md-12">

                <label for="toggleHermanosD" class="col-form-label">Tiene hermanas/os o niñas/os convivientes?</label>
                <div>
                    <div class="btn-group btn-group-toggle"  data-toggle="buttons">
                        <label class="btn btn-option active" id="toggleHermanosNED" onclick="javascript:ocultar_sector('#HermanosD')">
                            <input  type="radio" name="options" autocomplete="off"> No especifica
                        </label>
                        <label class="btn btn-option" id="toggleHermanosSiD" onclick="javascript:mostrar_sector('#HermanosD')" style="width: 50px">
                            <input  type="radio" name="options" autocomplete="off"> Si
                        </label>
                        <label class="btn btn-option" id="toggleHermanosNoD" onclick="javascript:ocultar_sector('#HermanosD')" style="width: 50px">
                            <input  type="radio" name="options" autocomplete="off"> No
                        </label>
                    </div>
                    <input type="hidden" id="toggleHermanosD" name="toggleHermanosD" value="No especifica">
                </div>
            </div>
        </div>
        <div id="HermanosD" style="display:none;">
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
                if ($x > 1) {
                    echo "style='display:none'";
                }
                ?>>
                    <div class="form-group col-md-2 mt-0">
                        <select class="selectpicker form-control" data-live-search="true" data-size="8" id="HGeneroD<?= $x ?>" name="HGeneroD<?= $x ?>"  >
                            <option value="0" selected>-</option>
                            <?
                            $sql = "SELECT * FROM identidad_genero WHERE activo = 's' order by orden asc";
                            $query = mysqli_query($con, $sql);
                            while ($row = mysqli_fetch_array($query)) {
                                $valor = $row['identidad'];
                                $guardar = $row['id'];
                                ?>
                                <option value="<?= $guardar ?>"><?= $valor ?></option>
                                <?
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md-2 mt-0">
                        <input type="number" min="0" class="form-control" id="HEdadD<?= $x ?>" name="HEdadD<?= $x ?>" placeholder="Edad" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="3">
                    </div>
                    <div class="form-group col-md-3 mt-0">
                        <select class="selectpicker form-control" data-live-search="true" data-size="8" multiple id="HMaltratoD<?= $x ?>" name="HMaltratoD<?= $x ?>[]"  >
                            <option value="Ninguno">Ninguno</option>
                            <option value="Testigo de violencia">Testigo de violencia</option>
                            <option value="Negligencia">Negligencia</option>
                            <option value="Emocional">Emocional</option>
                            <option value="Físico">Físico</option>
                            <option value="Sexual">Sexual</option>
                        </select>
                        <input type="hidden" name="ValHMaltratoD<?= $x ?>" id="ValHMaltratoD<?= $x ?>" />
                    </div>
                    <div class="form-group col-md-2 mt-0">
                        <select class="selectpicker form-control" data-live-search="true" data-size="8" id="HConviveD<?= $x ?>" name="HConviveD<?= $x ?>"  >
                            <option value="0" selected>-</option>
                            <option value="No especifica">No especifica</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3 mt-0">
                        <select class="selectpicker form-control" data-live-search="true" data-size="8" id="HConductaD<?= $x ?>" name="HConductaD<?= $x ?>"  >
                            <option value="0" selected>-</option>
                            <option value="No especifica">No especifica</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div>
            <? } ?>
            <div class="form-row">
                <div class="form-group col-12 text-right">
                    <div class="btn-group" role="group" aria-label="Hermanos">
                        <button id="btnagregarhermano" type="button" class="btn btn-custom" onclick="javascript:agregar_hermano()">Agregar</button>
                        <button id="btnquitarhermano" type="button" class="btn btn-custom" disabled onclick="javascript:quitar_hermano()">Quitar</button>
                        <input type="hidden" id="aqhermano" name="aqhermano" value="1">
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
                    <option value="0" selected>-</option>
                    <?
                    $sql = "SELECT * FROM vinculo_agresor WHERE activo = 's' order by orden asc";
                    $query = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_array($query)) {
                        $valor = $row['vinculo'];
                        $guardar = $row['id'];
                        ?>
                        <option value="<?= $guardar ?>"><?= $valor ?></option>
                        <?
                    }
                    ?>
                </select>

            </div>
            <div class="form-group col-md-4">
                <label class="col-form-label text-right" for="NombreAD">Nombre:</label>
                <input type="text" class="form-control" id="NombreAD" name="NombreAD" placeholder="Nombre" maxlength="30">
            </div>
            <div class="form-group col-md-4">
                <label class="col-form-label text-right" for="ApellidoAD">Apellido:</label>
                <input type="text" class="form-control" id="ApellidoAD" name="ApellidoAD" placeholder="Apellido" maxlength="30">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="TipoDocumentoAD" class="col-form-label text-right">Tipo de documento:</label>
                <select class="selectpicker form-control" data-live-search="true" data-size="8" id="TipoDocumentoAD" name="TipoDocumentoAD"  >
                    <option value="0" selected>-</option>
                    <option value="DNI">DNI</option>
                    <option value="DNI Extranjero">DNI Extranjero</option>
                    <option value="Pasaporte">Pasaporte</option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label class=" col-form-label text-right" for="NumeroDocumentoAD">Nº de documento:</label>
                <input type="text" class="form-control numdocumento" id="NumeroDocumentoAD" name="NumeroDocumentoAD" placeholder="Nº de documento" maxlength="11">
            </div>  
            <div class="form-group col-md-4">
                <label class="col-form-label text-right" for="EdadAD">Edad:</label>
                <input type="number" min="0" class="form-control" id="EdadAD" name="EdadAD" placeholder="Edad" pattern="[0-9]" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="3">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label class="col-form-label text-right" for="NacionalidadAD">Nacionalidad:</label>
                <select class="selectpicker form-control" data-live-search="true" data-size="8" id="NacionalidadAD" name="NacionalidadAD"  >
                    <option value="0" selected>-</option>
                    <?
                    $sql = "SELECT * FROM nacionalidad WHERE activo = 's' order by orden asc";
                    $query = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_array($query)) {
                        $valor = $row['descr'];
                        $guardar = $row['id'];
                        ?>
                        <option value="<?= $guardar ?>"><?= $valor ?></option>
                        <?
                    }
                    ?>
                </select>
            </div> 
            <div class="form-group col-md-6">
                <label class="col-form-label text-right" for="GeneroAD">Identidad de Género:</label>
                <select class="selectpicker form-control" data-live-search="true" data-size="8" id="GeneroAD" name="GeneroAD"  >
                    <option value="0" selected>-</option>
                    <?
                    $sql = "SELECT * FROM identidad_genero WHERE activo = 's' order by orden asc";
                    $query = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_array($query)) {
                        $valor = $row['identidad'];
                        $guardar = $row['id'];
                        ?>
                        <option value="<?= $guardar ?>"><?= $valor ?></option>
                        <?
                    }
                    ?>
                </select>
            </div> 
        </div>

        <div class="form-row">
            <div class="form-group col-md-12">

                <label for="DerivacionesAD" class="col-form-label">Derivaciones:</label>
                <select class="selectpicker form-control" data-live-search="true" data-size="8" data-live-search="true" multiple id="DerivacionesAD" name="DerivacionesAD[]">
                    <?
                    $sql = "SELECT * FROM derivacion WHERE motivo_consulta_id = 3 AND activo = 's' order by orden asc";
                    $query = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_array($query)) {
                        $valor = $row['descr'];
                        $guardar = $row['id'];
                        ?>
                        <option value="<?= $guardar ?>"><?= $valor ?></option>
                        <?
                    }
                    ?>
                </select>
                <input type="hidden" name="ValDerivacionesAD" id="ValDerivacionesAD" />
            </div>  
        </div>

        <div class="form-row">
            <div class="form-group col-md-12">

                <label for="ObservacionesAD" class=" col-form-label text-right">Observaciones:</label>
                <textarea class="form-control" style="resize:none;" id="ObservacionesAD" name="ObservacionesAD" rows="3" placeholder="Observaciones"></textarea>
            </div>  
        </div>
        <input type="hidden" id="nitem_observ_d" name="nitem_observ_d" value="1">
        <div class="form-row">
            <div class="form-group col-md-12">

                <label for="IntervencionAD" class=" col-form-label text-right">Intervención y recursos:</label>
                <textarea class="form-control" style="resize:none;" id="IntervencionAD" name="IntervencionAD" rows="3" placeholder="Intervención y recursos"></textarea>
            </div>  
        </div>

    </div>


</div>



