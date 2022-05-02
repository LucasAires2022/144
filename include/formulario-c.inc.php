<? /*
 * FORMULARIO C
 */ ?>
<div id="formC" class="formulario" style="display:none;">
    <div class="row">
        <div class='col-12'><p class="formulario-title text-center mt-4"><?= $formularios['C'] ?></p></div>
    </div>

    <? /* CONSULTANTE */ ?>
    <div id="ConsultanteC">
        <div class="row">
            <div class='col-11 col-md-9 mx-auto'>
                <div class="formulario-separador formulario-subtitle">Consultante</div>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label class="col-form-label text-right" for="NombreC">Nombre:</label>
                <input type="text" class="form-control" id="NombreC" name="NombreC" placeholder="Nombre" maxlength="30">
            </div>
            <div class="form-group col-md-6">
                <label class="col-form-label text-right" for="ApellidoC">Apellido:</label>
                <input type="text" class="form-control" id="ApellidoC" name="ApellidoC" placeholder="Apellido" maxlength="30">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="TipoDocumentoC" class="col-form-label text-right">Tipo de documento:</label>
                <select class="selectpicker form-control" data-live-search="true" data-size="8" id="TipoDocumentoC" name="TipoDocumentoC"  >
                    <option value="0" selected>-</option>
                    <option value="DNI">DNI</option>
                    <option value="DNI Extranjero">DNI Extranjero</option>
                    <option value="Pasaporte">Pasaporte</option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label class=" col-form-label text-right" for="NumeroDocumentoC">Nº de documento:</label>
                <input type="text" class="form-control numdocumento" id="NumeroDocumentoC" name="NumeroDocumentoC" placeholder="Nº de documento" maxlength="11">
            </div>  
            <div class="form-group col-md-4">
                <label class="col-form-label text-right" for="EdadC">Edad:</label>
                <input type="number" min="0" class="form-control" id="EdadC" name="EdadC" placeholder="Edad" pattern="[0-9]" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="3">
            </div>
        </div>
        <div class="form-row">

            <div class="form-group col-md-4">
                <label class="col-form-label text-right" for="CalleC"><strong>Domicilio: &nbsp;</strong> Calle:</label>
                <input type="text" class="form-control" id="CalleC" name="CalleC" placeholder="Calle" maxlength="50">
            </div>  
            <div class="form-group col-md-2">
                <label class="col-form-label text-right" for="AlturaC">Altura:</label>
                <input type="number" min="0" class="form-control" id="AlturaC" name="AlturaC" placeholder="Altura" pattern="[0-9]" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="8">
            </div>  
            <div class="form-group col-md-2">
                <label class="col-form-label text-right" for="PisoDptoC">Piso/Dpto:</label>
                <input type="text" class="form-control" id="PisoDptoC" name="PisoDptoC" placeholder="Piso/Depto" maxlength="15">
            </div>
            <div class="form-group col-md-4">
                <label class="col-form-label text-right" for="ResidenciaC">Lugar de Residencia:</label>

                <select class="selectpicker form-control" data-live-search="true" data-size="8" data-live-search="true" id="ResidenciaC" name="ResidenciaC"  >
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
                <label for="TipoTelefonoC" class=" col-form-label text-right">Tipo de teléfono:</label>

                <select class="selectpicker form-control" data-live-search="true" data-size="8" id="TipoTelefonoC" name="TipoTelefonoC"  >
                    <option value="0" selected>-</option>
                    <option value="Particular fijo">Particular fijo</option>
                    <option value="Laboral">Laboral</option>
                    <option value="Celular">Celular</option>
                    <option value="Mensajes">Mensajes</option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label class="col-form-label text-right" for="NumeroTelefonoC">Nº de teléfono:</label>
                <input type="number" min="0" class="form-control" id="NumeroTelefonoC" name="NumeroTelefonoC" placeholder="Nº de teléfono" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="15" pattern="[0-9]">
            </div>  
            <div class="form-group col-md-4">
                <label class="col-form-label text-right" for="GeneroC">Identidad de Género:</label>
                <select class="selectpicker form-control" data-live-search="true" data-size="8" id="GeneroC" name="GeneroC"  >
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
                <label class="col-form-label text-right" for="ConyugeC">Situación conyugal:</label>
                <select class="selectpicker form-control" data-live-search="true" data-size="8" id="ConyugeC" name="ConyugeC"  >
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
            <div class="form-group col-md-6">
                <label class="col-form-label text-right" for="MotivoLlamadaC">Motivo de la llamada:</label>

                <select class="selectpicker form-control" data-live-search="true" data-size="8" id="MotivoLlamadaC" name="MotivoLlamadaC">
                    <option value="0" selected>-</option>
                    <?
                    $sql = "SELECT * FROM motivo_problematica WHERE activo = 's' order by orden asc";
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
            <div class="form-group col-md-12">

                <label for="DerivacionesC" class="col-form-label">Derivaciones:</label>
                <select class="selectpicker form-control" data-live-search="true" data-size="8" data-live-search="true" multiple id="DerivacionesC" name="DerivacionesC[]">
                    <?
                    $sql = "SELECT * FROM derivacion WHERE motivo_consulta_id = 2 AND activo = 's' order by orden asc";
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
                <input type="hidden" name="ValDerivacionesC" id="ValDerivacionesC" />
            </div>  
        </div>

        <div class="form-row">
            <div class="form-group col-md-12">

                <label for="ObservacionesC" class=" col-form-label text-right">Observaciones:</label>
                <textarea class="form-control" style="resize:none;" id="ObservacionesC" name="ObservacionesC" rows="3" placeholder="Observaciones"></textarea>
            </div>  
        </div>
        <input type="hidden" id="nitem_observ_c" name="nitem_observ_c" value="1">
        <div class="form-row">
            <div class="form-group col-md-12">

                <label for="IntervencionC" class=" col-form-label text-right">Intervención y recursos:</label>
                <textarea class="form-control" style="resize:none;" id="IntervencionC" name="IntervencionC" rows="3" placeholder="Intervención y recursos"></textarea>
            </div>  
        </div>

    </div>
   
    


</div>

