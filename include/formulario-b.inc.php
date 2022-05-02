<? /*
 * FORMULARIO B
 */ ?>
<div id="formB" class="formulario" style="display:none;">
    <div class="row">
        <div class='col-12'><p class="formulario-title text-center mt-4"><?= $formularios['B'] ?></p></div>
    </div>

    <div class="form-group row text-center text-md-left">
        <label for="toggleConsultanteB" class="col-md-8 col-form-label">Llama la persona en situación de violencia de género?</label>
        <div class="col-md-4">
            <div class="btn-group btn-group-toggle"  data-toggle="buttons">
                <label class="btn btn-option" id="toggleConsultanteSiB" onclick="javascript:ocultar_sector('#ConsultanteB')" style="width: 50px">
                    <input  type="radio" name="options"  autocomplete="off"> Si
                </label>
                <label class="btn btn-option active" id="toggleConsultanteNoB" onclick="javascript:mostrar_sector('#ConsultanteB')" style="width: 50px">
                    <input  type="radio" name="options" autocomplete="off"> No
                </label>
            </div>
            <input type="hidden" id="toggleConsultanteB" name="toggleConsultanteB" value="No">
        </div>
    </div>
    <? /* CONSULTANTE */ ?>
    <div id="ConsultanteB">
        <div class="row">
            <div class='col-11 col-md-9 mx-auto'>
                <div class="formulario-separador formulario-subtitle">Consultante</div>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label class="col-form-label text-right" for="NombreCB">Nombre:</label>
                <input type="text" class="form-control" id="NombreCB" name="NombreCB" placeholder="Nombre" maxlength="30">
            </div>
            <div class="form-group col-md-6">
                <label class="col-form-label text-right" for="ApellidoCB">Apellido:</label>
                <input type="text" class="form-control" id="ApellidoCB" name="ApellidoCB" placeholder="Apellido" maxlength="30">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="TipoDocumentoCB" class="col-form-label text-right">Tipo de documento:</label>

                <select class="selectpicker form-control" data-live-search="true" data-size="8" id="TipoDocumentoCB" name="TipoDocumentoCB"  >
                    <option value="0" selected>-</option>
                    <option value="DNI">DNI</option>
                    <option value="DNI Extranjero">DNI Extranjero</option>
                    <option value="Pasaporte">Pasaporte</option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label class="col-form-label text-right" for="NumeroDocumentoCB">Nº de documento:</label>
                <input type="text" class="form-control numdocumento" id="NumeroDocumentoCB" name="NumeroDocumentoCB" placeholder="Nº de documento" maxlength="11">
            </div>  
            <div class="form-group col-md-4">
                <label class="col-form-label text-right" for="EdadCB">Edad:</label>
                <input type="number" min="0" class="form-control" id="EdadCB" name="EdadCB" placeholder="Edad" pattern="[0-9]" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="3">
            </div>  
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="TipoTelefonoCB" class=" col-form-label text-right">Tipo de teléfono:</label>

                <select class="selectpicker form-control" data-live-search="true" data-size="8" id="TipoTelefonoCB" name="TipoTelefonoCB"  >
                    <option value="0" selected>-</option>
                    <option value="Particular fijo">Particular fijo</option>
                    <option value="Laboral">Laboral</option>
                    <option value="Celular">Celular</option>
                    <option value="Mensajes">Mensajes</option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label class="col-form-label text-right" for="NumeroTelefonoCB">Nº de teléfono:</label>
                <input type="number" min="0" class="form-control" id="NumeroTelefonoCB" name="NumeroTelefonoCB" placeholder="Nº de teléfono" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="15" pattern="[0-9]">
            </div>  
            <div class="form-group col-md-4">
                <label class="col-form-label text-right" for="ResidenciaCB">Lugar de Residencia:</label>

                <select class="selectpicker form-control" data-live-search="true" data-size="8" id="ResidenciaCB" name="ResidenciaCB"  >
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
                <label class="col-form-label text-right" for="GeneroCB">Identidad de Género:</label>

                <select class="selectpicker form-control" data-live-search="true" data-size="8" id="GeneroCB" name="GeneroCB"  >
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
                <label class="col-form-label text-right" for="VinculoCB">Vinculo:</label>

                <select class="selectpicker form-control" data-live-search="true" data-size="8" id="VinculoCB" name="VinculoCB"  >
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
                <input type="text" class="form-control" id="NombreB" name="NombreB" placeholder="Nombre" maxlength="30">
            </div> 
            <div class="form-group col-md-6">
                <label class="col-form-label text-right" for="ApellidoB">Apellido:</label>
                <input type="text" class="form-control" id="ApellidoB" name="ApellidoB" placeholder="Apellido" maxlength="30">
            </div>  
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="TipoDocumentoB" class="col-form-label text-right">Tipo de documento:</label>
                <select class="selectpicker form-control" data-live-search="true" data-size="8" id="TipoDocumentoB" name="TipoDocumentoB"  >
                    <option value="0" selected>-</option>
                    <option value="DNI">DNI</option>
                    <option value="DNI Extranjero">DNI Extranjero</option>
                    <option value="Pasaporte">Pasaporte</option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label class=" col-form-label text-right" for="NumeroDocumentoB">Nº de documento:</label>
                <input type="text" class="form-control numdocumento" id="NumeroDocumentoB" name="NumeroDocumentoB" placeholder="Nº de documento" maxlength="11">
            </div>  
            <div class="form-group col-md-4">
                <label class="col-form-label text-right" for="EdadB">Edad:</label>
                <input type="number" min="0" class="form-control" id="EdadB" name="EdadB" placeholder="Edad" pattern="[0-9]" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="3">
            </div>
        </div>


        <div class="form-row">
            <div class="form-group col-md-4">
                <label class="col-form-label text-right" for="CalleB"><strong>Domicilio: &nbsp;</strong> Calle:</label>
                <input type="text" class="form-control" id="CalleB" name="CalleB" placeholder="Calle" maxlength="50">
            </div>  
            <div class="form-group col-md-2">
                <label class="col-form-label text-right" for="AlturaB">Altura:</label>
                <input type="number" min="0" class="form-control" id="AlturaB" name="AlturaB" placeholder="Altura" pattern="[0-9]" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="8">
            </div>  
            <div class="form-group col-md-2">
                <label class="col-form-label text-right" for="PisoDptoB">Piso/Dpto:</label>
                <input type="text" class="form-control" id="PisoDptoB" name="PisoDptoB" placeholder="Piso/Depto" maxlength="15">
            </div>
            <div class="form-group col-md-4">
                <label class="col-form-label text-right" for="ResidenciaB">Lugar de Residencia:</label>

                <select class="selectpicker form-control" data-live-search="true" data-size="8" data-live-search="true" id="ResidenciaB" name="ResidenciaB"  >
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
            <div class="form-group col-md-4">
                <label for="TipoTelefonoB" class=" col-form-label text-right">Tipo de teléfono:</label>

                <select class="selectpicker form-control" data-live-search="true" data-size="8" id="TipoTelefonoB" name="TipoTelefonoB"  >
                    <option value="0" selected>-</option>
                    <option value="Particular fijo">Particular fijo</option>
                    <option value="Laboral">Laboral</option>
                    <option value="Celular">Celular</option>
                    <option value="Mensajes">Mensajes</option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label class="col-form-label text-right" for="NumeroTelefonoB">Nº de teléfono:</label>
                <input type="number" min="0" class="form-control" id="NumeroTelefonoB" name="NumeroTelefonoB" placeholder="Nº de teléfono" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="15" pattern="[0-9]">
            </div>  
            <div class="form-group col-md-4">
                <label class="col-form-label text-right" for="GeneroB">Identidad de Género:</label>

                <select class="selectpicker form-control" data-live-search="true" data-size="8" id="GeneroB" name="GeneroB"  >
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
            <div class="form-group col-md-6">
                <label class="col-form-label text-right" for="NacionalidadB">Nacionalidad:</label>
                <select class="selectpicker form-control" data-live-search="true" data-size="8" id="NacionalidadB" name="NacionalidadB"  >
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
                <label class="col-form-label text-right" for="ConyugeB">Situación conyugal:</label>
                <select class="selectpicker form-control" data-live-search="true" data-size="8" id="ConyugeB" name="ConyugeB"  >
                    <option value="0" selected>-</option>
                    <?
                    $sql = "SELECT * FROM situacion_conyugal WHERE activo = 's' order by orden asc";
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
            <div class="form-group col-md-4">

                <label for="toggleConviveB" class="col-form-label">Convive con el agresor?</label>
                <div>
                    <div class="btn-group btn-group-toggle"  data-toggle="buttons">
                        <label class="btn btn-option active" id="toggleConviveNEB" onclick="javascript:ocultar_sector('#TiempoB');ocultar_sector('#AñosB');ocultar_sector('#MesesB');">
                            <input  type="radio" name="options" autocomplete="off"> No especifica
                        </label>
                        <label class="btn btn-option" id="toggleConviveSiB" onclick="javascript:mostrar_sector('#TiempoB'); mostrar_mes_ano();" style="width: 50px">
                            <input  type="radio" name="options" autocomplete="off"> Si
                        </label>
                        <label class="btn btn-option" id="toggleConviveNoB" onclick="javascript:ocultar_sector('#TiempoB');ocultar_sector('#AñosB');ocultar_sector('#MesesB');" style="width: 50px">
                            <input  type="radio" name="options" autocomplete="off"> No
                        </label>
                    </div>
                    <input type="hidden" id="toggleConviveB" name="toggleConviveB" value="No especifica">
                </div>
            </div>
            <div class="form-group col-md-4" id="TiempoB" style="display:none;">
                <label for="TiempoDesdeB" class=" col-form-label text-right">Desde:</label>

                <select class="selectpicker form-control" data-live-search="true" data-size="8" id="TiempoDesdeB" name="TiempoDesdeB"  >
                    <option value="No especifica" selected>No especifica</option>
                    <option value="Años">Años</option>
                    <option value="Meses">Meses</option>
                </select>
            </div>
            <div class="form-group col-md-4 mes-año" id="AñosB" style="display:none;">
                <label for="DesdeAB" class=" col-form-label text-right">&nbsp;</label>
                <input type="number" min="0" class="form-control" id="DesdeAB" name="DesdeAB" placeholder="Nº" pattern="[0-9]" maxlength="3">
            </div>
            <div class="form-group col-md-4 mes-año" id="MesesB" style="display:none;">
                <label for="DesdeMB" class=" col-form-label text-right">&nbsp;</label>
                <input type="number" min="0" class="form-control" id="DesdeMB" name="DesdeMB" placeholder="Nº" pattern="[0-9]" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="4">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label class="col-form-label text-right" for="ViviendaB">Tenencia de la vivienda:</label>
                <select class="selectpicker form-control" data-live-search="true" data-size="8" id="ViviendaB" name="ViviendaB"  >
                    <option value="0" selected>-</option>
                    <?
                    $sql = "SELECT * FROM tenencia_vivienda WHERE activo = 's' order by orden asc";
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
            <div class="form-group col-md-4">
                <label class="col-form-label text-right" for="ActividadB">Actividad:</label>
                <? /* <select class="form-control" id="ActividadB" name="ActividadB"  > */ ?>
                <select class="selectpicker form-control" data-live-search="true" data-size="8" data-live-search="true" multiple id="ActividadB" name="ActividadB[]"  >
                    <?
                    $sql = "SELECT * FROM actividad WHERE activo = 's' order by orden asc";
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
                <input type="hidden" name="ValActividadB" id="ValActividadB" />
            </div> 
            <div class="form-group col-md-4">
                <label class="col-form-label text-right" for="NEducativoB">Nivel educativo alcanzado:</label>
                <select class="selectpicker form-control" data-live-search="true" data-size="8" id="NEducativoB" name="NEducativoB"  >
                    <option value="0" selected>-</option>
                    <option value="Primario">Primario</option>
                    <option value="Secundario">Secundario</option>
                    <option value="Superior">Superior</option>
                    <option value="Universitario">Universitario</option>
                    <option value="Sin instrucción">Sin instrucción</option>
                </select>
            </div> 
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">

                <label for="toggleHijosB" class="col-form-label">Tiene hijas/os?</label>
                <div>
                    <div class="btn-group btn-group-toggle"  data-toggle="buttons">
                        <label class="btn btn-option active" id="toggleHijosNEB" onclick="javascript:ocultar_sector('#HijosB')">
                            <input  type="radio" name="options" autocomplete="off"> No especifica
                        </label>
                        <label class="btn btn-option" id="toggleHijosSiB" onclick="javascript:mostrar_sector('#HijosB')" style="width: 50px">
                            <input  type="radio" name="options" autocomplete="off"> Si
                        </label>
                        <label class="btn btn-option" id="toggleHijosNoB" onclick="javascript:ocultar_sector('#HijosB')" style="width: 50px">
                            <input  type="radio" name="options" autocomplete="off"> No
                        </label>
                    </div>
                    <input type="hidden" id="toggleHijosB" name="toggleHijosB" value="No especifica">
                </div>
            </div>
        </div>
        <div id="HijosB" style="display:none;">
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
                if ($x > 1) {
                    echo "style='display:none'";
                }
                ?>>
                    <div class="form-group col-md-2 mt-0">
                        <select class="selectpicker form-control" data-live-search="true" data-size="8" id="HGeneroB<?= $x ?>" name="HGeneroB<?= $x ?>"  >
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
                        <input type="number" min="0" class="form-control" id="HEdadB<?= $x ?>" name="HEdadB<?= $x ?>" placeholder="Edad" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="3">
                    </div>
                    <div class="form-group col-md-3 mt-0">
                        <select class="selectpicker form-control" data-live-search="true" data-size="8" multiple id="HMaltratoB<?= $x ?>" name="HMaltratoB<?= $x ?>[]"  >
                            <option value="Ninguno">Ninguno</option>
                            <option value="Testigo de violencia">Testigo de violencia</option>
                            <option value="Negligencia">Negligencia</option>
                            <option value="Emocional">Emocional</option>
                            <option value="Físico">Físico</option>
                            <option value="Sexual">Sexual</option>
                        </select>
                        <input type="hidden" name="ValHMaltratoB<?= $x ?>" id="ValHMaltratoB<?= $x ?>" />
                    </div>
                    <div class="form-group col-md-2 mt-0">
                        <select class="selectpicker form-control" data-live-search="true" data-size="8" id="HConviveB<?= $x ?>" name="HConviveB<?= $x ?>"  >
                            <option value="0" selected>-</option>
                            <option value="No especifica">No especifica</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3 mt-0">
                        <select class="selectpicker form-control" data-live-search="true" data-size="8" id="HConductaB<?= $x ?>" name="HConductaB<?= $x ?>"  >
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
                    <div class="btn-group" role="group" aria-label="Hijos">
                        <button id="btnagregarhijo" type="button" class="btn btn-custom" onclick="javascript:agregar_hijo()">Agregar</button>
                        <button id="btnquitarhijo" type="button" class="btn btn-custom" disabled onclick="javascript:quitar_hijo()">Quitar</button>
                        <input type="hidden" id="aqhijos" name="aqhijos" value="1">
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
                    <? /* <option value="0" selected>-</option>
                      <option value="Pareja / novio">Pareja / novio</option>
                      <option value="Ex pareja / novio">Ex pareja / novio</option>
                      <option value="Padre">Padre</option>
                      <option value="Hijas/os">Hijas/os</option>
                      <option value="Hermanas/os">Hermanas/os</option>
                      <option value="Vecinas/os">Vecinas/os</option>
                      <option value="Desconocido">Desconocido</option>
                      <option value="Superior a cargo">Superior a cargo</option> */ ?>
                </select>

            </div>
            <div class="form-group col-md-4">
                <label class="col-form-label text-right" for="NombreAB">Nombre:</label>
                <input type="text" class="form-control" id="NombreAB" name="NombreAB" placeholder="Nombre" maxlength="30">
            </div>
            <div class="form-group col-md-4">
                <label class="col-form-label text-right" for="ApellidoAB">Apellido:</label>
                <input type="text" class="form-control" id="ApellidoAB" name="ApellidoAB" placeholder="Apellido" maxlength="30">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="TipoDocumentoAB" class="col-form-label text-right">Tipo de documento:</label>
                <select class="selectpicker form-control" data-live-search="true" data-size="8" id="TipoDocumentoAB" name="TipoDocumentoAB"  >
                    <option value="0" selected>-</option>
                    <option value="DNI">DNI</option>
                    <option value="DNI Extranjero">DNI Extranjero</option>
                    <option value="Pasaporte">Pasaporte</option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label class=" col-form-label text-right" for="NumeroDocumentoAB">Nº de documento:</label>
                <input type="text" class="form-control numdocumento" id="NumeroDocumentoAB" name="NumeroDocumentoAB" placeholder="Nº de documento" maxlength="11">
            </div>  
            <div class="form-group col-md-4">
                <label class="col-form-label text-right" for="EdadAB">Edad:</label>
                <input type="number" min="0" class="form-control" id="EdadAB" name="EdadAB" placeholder="Edad" pattern="[0-9]" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="3">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label class="col-form-label text-right" for="NacionalidadAB">Nacionalidad:</label>
                <select class="selectpicker form-control" data-live-search="true" data-size="8" id="NacionalidadAB" name="NacionalidadAB"  >
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
                <label class="col-form-label text-right" for="GeneroAB">Identidad de Género:</label>
                <select class="selectpicker form-control" data-live-search="true" data-size="8" id="GeneroAB" name="GeneroAB"  >
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
            <div class="form-group col-md-6">
                <label class="col-form-label text-right" for="ResidenciaAB">Lugar de Residencia:</label>

                <select class="selectpicker form-control" data-live-search="true" data-size="8" data-live-search="true" id="ResidenciaAB" name="ResidenciaAB"  >
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
                <label class="col-form-label text-right" for="ActividadAB">Actividad:</label>
                <select class="selectpicker form-control" data-live-search="true" data-size="8" data-live-search="true" multiple id="ActividadAB" name="ActividadAB[]"  >
                    <?
                    $sql = "SELECT * FROM actividad WHERE activo = 's' order by orden asc";
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
                <input type="hidden" name="ValActividadAB" id="ValActividadAB" />
            </div> 
        </div>

        <div class="form-row">
            <div class="form-group col-md-2">

                <label for="toggleAdiccionesAB" class="col-form-label">Adicciones:</label>
                <div>
                    <div class="btn-group btn-group-toggle"  data-toggle="buttons">
                        <label class="btn btn-option" id="toggleAdiccionesSiAB" onclick="javascript:mostrar_sector('#AdiccionesAB')" style="width: 50px">
                            <input  type="radio" name="options" autocomplete="off"> Si
                        </label>
                        <label class="btn btn-option active" id="toggleAdiccionesNoAB" onclick="javascript:ocultar_sector('#AdiccionesAB')" style="width: 50px">
                            <input  type="radio" name="options" autocomplete="off"> No
                        </label>
                    </div>
                    <input type="hidden" id="toggleAdiccionesAB" name="toggleAdiccionesAB" value="No">
                </div>
            </div>
            <div class="form-group col-md-10" id="AdiccionesAB" style="display:none;">
                <label for="AdiccionesDetaleAB" class=" col-form-label text-right">Detalle:</label>
                <textarea class="form-control" style="resize:none;" id="AdiccionesDetaleAB" name="AdiccionesDetaleAB" rows="2" placeholder="Detalle"></textarea>
            </div>

        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label class="col-form-label text-right" for="ModoViolenciaAB">Modalidad de violencia:</label>
                <select class="selectpicker form-control" data-live-search="true" data-size="8" data-live-search="true" multiple id="ModoViolenciaAB" name="ModoViolenciaAB[]"  >
                    <?
                    $sql = "SELECT * FROM modalidad_violencia WHERE activo = 's' order by orden asc";
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
                <input type="hidden" name="ValModoViolenciaAB" id="ValModoViolenciaAB" />
            </div>  
            <div class="form-group col-md-6">
                <label class="col-form-label text-right" for="TipoViolenciaAB">Tipo de violencia:</label>
                <select class="selectpicker form-control" data-live-search="true" data-size="8" data-live-search="true" multiple id="TipoViolenciaAB" name="TipoViolenciaAB[]"  >
                    <?
                    $sql = "SELECT * FROM tipo_violencia WHERE activo = 's' order by orden asc";
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
                <input type="hidden" name="ValTipoViolenciaAB" id="ValTipoViolenciaAB" />
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">

                <label for="toggleDenunciasAB" class="col-form-label">Denuncias anteriores?</label>
                <div>
                    <div class="btn-group btn-group-toggle"  data-toggle="buttons">
                        <label class="btn btn-option active" id="toggleDenunciasNEAB">
                            <input  type="radio" name="options" autocomplete="off"> No especifica
                        </label>
                        <label class="btn btn-option" id="toggleDenunciasSiAB" style="width: 50px">
                            <input  type="radio" name="options" autocomplete="off"> Si
                        </label>
                        <label class="btn btn-option" id="toggleDenunciasNoAB" style="width: 50px">
                            <input  type="radio" name="options" autocomplete="off"> No
                        </label>
                    </div>
                    <input type="hidden" id="toggleDenunciasAB" name="toggleDenunciasAB" value="No especifica">
                </div>
            </div>
            <div class="form-group col-md-4">

                <label for="ProteccionAB" class="col-form-label">Medidas de protección vigentes:</label>
                <? /* <div>
                  <div class="btn-group btn-group-toggle"  data-toggle="buttons">
                  <label class="btn btn-option active" id="toggleProteccionNEAB">
                  <input  type="radio" name="options" autocomplete="off"> No especifica
                  </label>
                  <label class="btn btn-option" id="toggleProteccionSiAB" style="width: 50px">
                  <input  type="radio" name="options" autocomplete="off"> Si
                  </label>
                  <label class="btn btn-option" id="toggleProteccionNoAB" style="width: 50px">
                  <input  type="radio" name="options" autocomplete="off"> No
                  </label>
                  </div>
                  <input type="hidden" id="toggleProteccionAB" name="toggleProteccionAB" value="No especifica">
                  </div> */ ?>
                <select class="selectpicker form-control" data-live-search="true" data-size="8" data-live-search="true" multiple id="ProteccionAB" name="ProteccionAB[]"  >
                    <?
                    $sql = "SELECT * FROM medidas_proteccion WHERE activo = 's' order by orden asc";
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
                <input type="hidden" name="ValProteccionAB" id="ValProteccionAB" />
            </div>
            <div class="form-group col-md-4" id="vencimiento" style="display:none">
                <label for="VencimientoAB" class="col-form-label">Fecha de vencimiento:</label>
                <input type="date" class="form-control" id="VencimientoAB" name="VencimientoAB" placeholder="">
            </div>

        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="IndicadoresRiesgoB" class="col-form-label">Indicadores de riesgo:</label>
            </div>

            <label for="toggleArmasAB" class="col-md-6 col-form-label text-md-right">Armas?</label>
            <div class="col-md-6">
                <div class="btn-group btn-group-toggle"  data-toggle="buttons">
                    <label class="btn btn-option" id="toggleArmasFAB" style="width: 70px">
                        <input  type="radio" name="options"   autocomplete="off"> Fuego
                    </label>
                    <label class="btn btn-option" id="toggleArmasBAB" style="width: 70px">
                        <input  type="radio" name="options"   autocomplete="off"> Blanca
                    </label>
                    <label class="btn btn-option active" id="toggleArmasNoAB" style="width: 70px">
                        <input  type="radio" name="options"  autocomplete="off"> No
                    </label>
                </div>
                <input type="hidden" id="toggleArmasAB" name="toggleArmasAB" value="n">
            </div>
            <label for="toggleGastosAB" class="col-md-6 col-form-label text-md-right">Cubre sus gastos?</label>
            <div class="col-md-6">
                <div class="btn-group btn-group-toggle"  data-toggle="buttons">
                    <label class="btn btn-option" id="toggleGastosSiAB" style="width: 50px">
                        <input  type="radio" name="options" autocomplete="off"> Si
                    </label>

                    <label class="btn btn-option active" id="toggleGastosNoAB" style="width: 50px">
                        <input  type="radio" name="options" autocomplete="off"> No
                    </label>
                </div>
                <input type="hidden" id="toggleGastosAB" name="toggleGastosAB" value="n">
            </div>
            <label for="toggleSocializoAB" class="col-md-6 col-form-label text-md-right">Socializó su situación?</label>
            <div class="col-md-6">
                <div class="btn-group btn-group-toggle"  data-toggle="buttons">
                    <label class="btn btn-option" id="toggleSocializoSiAB" style="width: 50px">
                        <input  type="radio" name="options" autocomplete="off"> Si
                    </label>

                    <label class="btn btn-option active" id="toggleSocializoNoAB" style="width: 50px">
                        <input  type="radio" name="options" autocomplete="off"> No
                    </label>
                </div>
                <input type="hidden" id="toggleSocializoAB" name="toggleSocializoAB" value="n">
            </div>
            <label for="toggleRecurrirAB" class="col-md-6 col-form-label text-md-right">Por urgencias tiene donde recurrir?</label>
            <div class="col-md-6">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-option" id="toggleRecurrirSiAB" style="width: 50px">
                        <input  type="radio" name="options" autocomplete="off"> Si
                    </label>

                    <label class="btn btn-option active" id="toggleRecurrirNoAB" style="width: 50px">
                        <input  type="radio" name="options"  autocomplete="off"> No
                    </label>
                </div>
                <input type="hidden" id="toggleRecurrirAB" name="toggleRecurrirAB" value="n">
            </div>
            <label for="toggleDiscapacidadAB" class="col-md-6 col-form-label text-md-right">Presenta alguna discapacidad?</label>
            <div class="col-md-6">
                <div class="btn-group btn-group-toggle"  data-toggle="buttons">
                    <label class="btn btn-option" id="toggleDiscapacidadSiAB" style="width: 50px">
                        <input  type="radio" name="options" autocomplete="off"> Si
                    </label>

                    <label class="btn btn-option active" id="toggleDiscapacidadNoAB" style="width: 50px">
                        <input  type="radio" name="options" autocomplete="off"> No
                    </label>
                </div>
                <input type="hidden" id="toggleDiscapacidadAB" name="toggleDiscapacidadAB" value="n">
            </div>
            <label for="toggleLocalizarlaAB" class="col-md-6 col-form-label text-md-right">Agresor puede localizarla?</label>
            <div class="col-md-6">
                <div class="btn-group btn-group-toggle"  data-toggle="buttons">
                    <label class="btn btn-option" id="toggleLocalizarlaSiAB" style="width: 50px">
                        <input  type="radio" name="options" autocomplete="off"> Si
                    </label>

                    <label class="btn btn-option active" id="toggleLocalizarlaNoAB" style="width: 50px">
                        <input  type="radio" name="options" autocomplete="off"> No
                    </label>
                </div>
                <input type="hidden" id="toggleLocalizarlaAB" name="toggleLocalizarlaAB" value="n">
            </div>
            <label for="toggleAmenazasAB" class="col-md-6 col-form-label text-md-right">Recibió amenazas de muerte?</label>
            <div class="col-md-6">
                <div class="btn-group btn-group-toggle"  data-toggle="buttons">
                    <label class="btn btn-option" id="toggleAmenazasSiAB" style="width: 50px">
                        <input  type="radio" name="options"  autocomplete="off"> Si
                    </label>

                    <label class="btn btn-option active" id="toggleAmenazasNoAB" style="width: 50px">
                        <input  type="radio" name="options" autocomplete="off"> No
                    </label>                    
                </div>
                <input type="hidden" id="toggleAmenazasAB" name="toggleAmenazasAB" value="n">
            </div>
            <div class="col-12">&nbsp;</div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">

                <label for="DerivacionesAB" class="col-form-label">Derivaciones:</label>
                <select class="selectpicker form-control" data-live-search="true" data-size="8" data-live-search="true" multiple id="DerivacionesAB" name="DerivacionesAB[]">
                    <?
                    $sql = "SELECT * FROM derivacion WHERE motivo_consulta_id = 1 AND activo = 's' order by orden asc";
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
                <input type="hidden" name="ValDerivacionesAB" id="ValDerivacionesAB" />
            </div>  
        </div>

        <div class="form-row">
            <div class="form-group col-md-12">

                <label for="ObservacionesAB" class=" col-form-label text-right">Observaciones:</label>
                <textarea class="form-control" style="resize:none;" id="ObservacionesAB" name="ObservacionesAB" rows="3" placeholder="Observaciones"></textarea>
            </div>  
        </div>
        <input type="hidden" id="nitem_observ" name="nitem_observ" value="1">
        <div class="form-row">
            <div class="form-group col-md-12">

                <label for="IntervencionAB" class=" col-form-label text-right">Intervención y recursos:</label>
                <textarea class="form-control" style="resize:none;" id="IntervencionAB" name="IntervencionAB" rows="3" placeholder="Intervención y recursos"></textarea>
            </div>  
        </div>

    </div>


</div>



