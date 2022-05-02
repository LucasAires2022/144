<? /*
 * FORMULARIO E
 */ ?>
<div id="formE" class="formulario" style="display:none;">
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
                <input type="text" class="form-control" id="NombreCE" name="NombreCE" placeholder="Nombre" maxlength="30">
            </div>
            <div class="form-group col-md-6">
                <label class="col-form-label text-right" for="ApellidoCE">Apellido:</label>
                <input type="text" class="form-control" id="ApellidoCE" name="ApellidoCE" placeholder="Apellido" maxlength="30">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="TipoDocumentoCE" class="col-form-label text-right">Tipo de documento:</label>
                <select class="selectpicker form-control" data-live-search="true" data-size="8" id="TipoDocumentoCE" name="TipoDocumentoCE"  >
                    <option value="0" selected>-</option>
                    <option value="DNI">DNI</option>
                    <option value="DNI Extranjero">DNI Extranjero</option>
                    <option value="Pasaporte">Pasaporte</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label class=" col-form-label text-right" for="NumeroDocumentoCE">Nº de documento:</label>
                <input type="text" class="form-control numdocumento" id="NumeroDocumentoCE" name="NumeroDocumentoCE" placeholder="Nº de documento" maxlength="11">
            </div>  

        </div>
        
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="TipoTelefonoCE" class=" col-form-label text-right">Tipo de teléfono:</label>
                <select class="selectpicker form-control" data-live-search="true" data-size="8" id="TipoTelefonoCE" name="TipoTelefonoCE"  >
                    <option value="0" selected>-</option>
                    <option value="Particular fijo">Particular fijo</option>
                    <option value="Laboral">Laboral</option>
                    <option value="Celular">Celular</option>
                    <option value="Mensajes">Mensajes</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label class="col-form-label text-right" for="NumeroTelefonoCE">Nº de teléfono:</label>
                <input type="number" min="0" class="form-control" id="NumeroTelefonoCE" name="NumeroTelefonoCE" placeholder="Nº de teléfono" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="15" pattern="[0-9]">
            </div> 

        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label class="col-form-label text-right" for="ResidenciaCE">Lugar de Residencia:</label>

                <select class="selectpicker form-control" data-live-search="true" data-size="8" data-live-search="true" id="ResidenciaCE" name="ResidenciaCE"  >
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
                <label class="col-form-label text-right" for="MotivoLlamadaE">Motivo de la llamada:</label>

                <select class="selectpicker form-control" data-live-search="true" data-size="8" id="MotivoLlamadaE" name="MotivoLlamadaE">
                    <option value="0" selected>-</option>
                    <?
                    $sql = "SELECT * FROM motivo_varios WHERE activo = 's' order by orden asc";
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

                <label for="ObservacionesE" class=" col-form-label text-right">Observaciones:</label>
                <textarea class="form-control" style="resize:none;" id="ObservacionesE" name="ObservacionesE" rows="3" placeholder="Observaciones"></textarea>
            </div>  
            <input type="hidden" id="nitem_observ_e" name="nitem_observ_e" value="1">
        </div>
    </div>
</div>



