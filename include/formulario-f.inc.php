<? /*
 * FORMULARIO F
 */ ?>
<div id="formF" class="formulario" style="display:none;">
    <div class="row">
        <div class='col-12'><p class="formulario-title text-center mt-4"><?=$formularios['F']?></p></div>
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
                <input type="text" class="form-control" id="NombreCF" name="NombreCF" placeholder="Nombre" maxlength="30">
            </div>
            <div class="form-group col-md-6">
                <label class="col-form-label text-right" for="ApellidoCF">Apellido:</label>
                <input type="text" class="form-control" id="ApellidoCF" name="ApellidoCF" placeholder="Apellido" maxlength="30">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="TipoDocumentoCF" class="col-form-label text-right">Tipo de documento:</label>
                <select class="selectpicker form-control" data-live-search="true" data-size="8" id="TipoDocumentoCF" name="TipoDocumentoCF"  >
                    <option value="0" selected>-</option>
                    <option value="DNI">DNI</option>
                    <option value="DNI Extranjero">DNI Extranjero</option>
                    <option value="Pasaporte">Pasaporte</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label class=" col-form-label text-right" for="NumeroDocumentoCF">Nº de documento:</label>
                <input type="text" class="form-control numdocumento" id="NumeroDocumentoCF" name="NumeroDocumentoCF" placeholder="Nº de documento" maxlength="11">
            </div>  
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="TipoTelefonoCF" class=" col-form-label text-right">Tipo de teléfono:</label>
                <select class="selectpicker form-control" data-live-search="true" data-size="8" id="TipoTelefonoCF" name="TipoTelefonoCF"  >
                    <option value="0" selected>-</option>
                    <option value="Particular fijo">Particular fijo</option>
                    <option value="Laboral">Laboral</option>
                    <option value="Celular">Celular</option>
                    <option value="Mensajes">Mensajes</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label class="col-form-label text-right" for="NumeroTelefonoCF">Nº de teléfono:</label>
                <input type="number" min="0" class="form-control" id="NumeroTelefonoCF" name="NumeroTelefonoCF" placeholder="Nº de teléfono" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="15" pattern="[0-9]">
            </div> 

        </div>
    </div>
    <? /* Fin CONSULTANTE */ ?>
    <div id="VictimaF">
        <div class="row">
            <div class='col-11 col-md-9 mx-auto'>
                <div class="formulario-separador formulario-subtitle">Persona en situación de emergencia</div>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label class=" col-form-label text-right" for="NombreF">Nombre:</label>
                <input type="text" class="form-control" id="NombreF" name="NombreF" placeholder="Nombre" maxlength="30">
            </div> 
            <div class="form-group col-md-6">
                <label class="col-form-label text-right" for="ApellidoF">Apellido:</label>
                <input type="text" class="form-control" id="ApellidoF" name="ApellidoF" placeholder="Apellido" maxlength="30">
            </div>  
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="TipoDocumentoF" class="col-form-label text-right">Tipo de documento:</label>
                <select class="selectpicker form-control" data-live-search="true" data-size="8" id="TipoDocumentoF" name="TipoDocumentoF"  >
                    <option value="0" selected>-</option>
                    <option value="DNI">DNI</option>
                    <option value="DNI Extranjero">DNI Extranjero</option>
                    <option value="Pasaporte">Pasaporte</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label class=" col-form-label text-right" for="NumeroDocumentoF">Nº de documento:</label>
                <input type="text" class="form-control numdocumento" id="NumeroDocumentoF" name="NumeroDocumentoF" placeholder="Nº de documento" maxlength="11">
            </div>  
            <?/*<div class="form-group col-md-4">
                <label class="col-form-label text-right" for="EdadB">Edad:</label>
                <input type="number" class="form-control" id="EdadB" name="EdadB" placeholder="Edad" pattern="[0-9]" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="3">
            </div>*/?>
        </div>


        <div class="form-row">
            <div class="form-group col-md-4">
                <label class="col-form-label text-right" for="CalleF"><strong>Domicilio: &nbsp;</strong> Calle:</label>
                <input type="text" class="form-control" id="CalleF" name="CalleF" placeholder="Calle" maxlength="50">
            </div>  
            <div class="form-group col-md-2">
                <label class="col-form-label text-right" for="AlturaF">Altura:</label>
                <input type="number" min="0" class="form-control" id="AlturaF" name="AlturaF" placeholder="Altura" pattern="[0-9]" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="8">
            </div>  
            <div class="form-group col-md-2">
                <label class="col-form-label text-right" for="PisoDptoF">Piso/Dpto:</label>
                <input type="text" class="form-control" id="PisoDptoF" name="PisoDptoF" placeholder="Piso/Depto" maxlength="15">
            </div>
            <div class="form-group col-md-4">
                <label class="col-form-label text-right" for="ResidenciaF">Lugar de Residencia:</label>

                <select class="selectpicker form-control" data-live-search="true" data-size="8" data-live-search="true" id="ResidenciaF" name="ResidenciaF"  >
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
                <label for="TipoTelefonoF" class=" col-form-label text-right">Tipo de teléfono:</label>

                <select class="selectpicker form-control" data-live-search="true" data-size="8" id="TipoTelefonoF" name="TipoTelefonoF"  >
                    <option value="0" selected>-</option>
                    <option value="Particular fijo">Particular fijo</option>
                    <option value="Laboral">Laboral</option>
                    <option value="Celular">Celular</option>
                    <option value="Mensajes">Mensajes</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label class="col-form-label text-right" for="NumeroTelefonoF">Nº de teléfono:</label>
                <input type="number" min="0" class="form-control" id="NumeroTelefonoF" name="NumeroTelefonoF" placeholder="Nº de teléfono" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="15" pattern="[0-9]">
            </div>  
            
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="UbicacionF" class=" col-form-label text-right">Ubicación: Más datos:</label>
                <textarea class="form-control" style="resize:none;" id="UbicacionF" name="UbicacionF" rows="1" placeholder="Ubicación: Más datos:"></textarea>
            </div>
            <div class="form-group col-md-6">
                <label class="col-form-label text-right" for="GeneroF">Identidad de Género:</label>

                <select class="selectpicker form-control" data-live-search="true" data-size="8" id="GeneroF" name="GeneroF">
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
                <label class="col-form-label text-right" for="RequerimientoF">Requerimiento:</label>
                <select class="selectpicker form-control" data-live-search="true" data-size="8" multiple id="RequerimientoF" name="RequerimientoF"  >
                    <?
                    $sql = "SELECT * FROM requerimiento WHERE activo = 's' order by orden asc";
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
                <input type="hidden" name="ValRequerimientoF" id="ValRequerimientoF" />
            </div> 
             
        </div>
        
        <div class="form-row">
            <div class="form-group col-md-12">

                <label for="OperadorF" class=" col-form-label text-right">Operador/a 911:</label>
                <textarea class="form-control" style="resize:none;" id="OperadorF" name="OperadorF" rows="3" placeholder="Operador/a 911"></textarea>
            </div>  
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">

                <label for="ObservacionesF" class=" col-form-label text-right">Observaciones:</label>
                <textarea class="form-control" style="resize:none;" id="ObservacionesF" name="ObservacionesF" rows="3" placeholder="Observaciones"></textarea>
            </div>  
        </div>
        <input type="hidden" id="nitem_observ_f" name="nitem_observ_f" value="1">
        <div class="form-row">
            <div class="form-group col-md-12">

                <label for="IntervencionF" class=" col-form-label text-right">Intervención y recursos:</label>
                <textarea class="form-control" style="resize:none;" id="IntervencionF" name="IntervencionF" rows="3" placeholder="Intervención y recursos"></textarea>
            </div>  
        </div>

    </div>


</div>

