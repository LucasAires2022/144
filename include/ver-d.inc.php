<? /*
 * FORMULARIO D
 */ ?>
<div id="formD" style="margin-top:2rem;">
    <div class="container-fluid">


        <div class="form-group row text-center text-md-left">
            <label for="toggleConsultanteD" class="col-md-8 col-form-label">Llama el niño/a o adolescente en situación de violencia?</label>
            <?
            $llamavictima = "No";
            if ($caso['cconsultid'] == 0) {
                $llamavictima = "Si";
            }
            ?>
            <div class="col-md-4">
                <input type="text" readonly class="form-control" id="toggleConsultanteD" name="toggleConsultanteD" placeholder="" value="<?= $llamavictima ?>">
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
                    <input type="text" class="form-control" id="NombreCD" name="NombreCD" placeholder="" value="<?= $caso['tnombre'] ?>" readonly maxlength="30">
                </div>
                <div class="form-group col-md-6">
                    <label class="col-form-label text-right" for="ApellidoCD">Apellido:</label>
                    <input type="text" class="form-control" id="ApellidoCD" name="ApellidoCD" placeholder="" value="<?= $caso['tapellido'] ?>" readonly maxlength="30">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="TipoDocumentoCD" class="col-form-label text-right">Tipo de documento:</label>
                    <input type="text" readonly class="form-control" id="TipoDocumentoCD" name="TipoDocumentoCD" placeholder="" value="<?= $caso['ttipodoc'] ?>">
                </div>
                <div class="form-group col-md-4">
                    <label class="col-form-label text-right" for="NumeroDocumentoCD">Nº de documento:</label>
                    <input type="text" class="form-control" id="NumeroDocumentoCD" name="NumeroDocumentoCD" placeholder="" value="<?= $caso['tdoc'] ?>" readonly maxlength="11">
                </div>  
                <div class="form-group col-md-4">
                    <label class="col-form-label text-right" for="EdadCD">Edad:</label>
                    <input type="number" class="form-control" id="EdadCD" name="EdadCD" placeholder="" pattern="[0-9]" value="<?
                    if ($caso['tedad'] <> 0) {
                        echo $caso['tedad'];
                    }
                    ?>" readonly>

                </div>  
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="TipoTelefonoCD" class=" col-form-label text-right">Tipo de teléfono:</label>
                    <input type="text" readonly class="form-control" id="TipoTelefonoCD" name="TipoTelefonoCD" placeholder="" value="<?= $caso['ttipotel'] ?>">
                </div>
                <div class="form-group col-md-4">
                    <label class="col-form-label text-right" for="NumeroTelefonoCD">Nº de teléfono:</label>
                    <input type="number" readonly class="form-control" id="NumeroTelefonoCD" name="NumeroTelefonoCD" placeholder="" value="<?
                    if ($caso['tntel'] <> 0) {
                        echo $caso['tntel'];
                    }
                    ?>">
                </div>
                <div class="form-group col-md-4">
                    <label class="col-form-label text-right" for="VinculoCD">Vinculo:</label>
                    <input type="text" readonly class="form-control" id="VinculoCD" name="VinculoCD" placeholder="" value="<?= $vinculo_consultante[$caso['tvinculo']] ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="col-form-label text-right" for="ResidenciaCD">Lugar de Residencia:</label>
                    <input type="text" readonly class="form-control" id="ResidenciaCD" name="ResidenciaCD" placeholder="" value="<?= $lugar_residencia[$caso['tresid']] ?>">
                </div>  
                <div class="form-group col-md-6">
                    <label class="col-form-label text-right" for="GeneroCD">Identidad de Género:</label>
                    <input type="text" readonly class="form-control" id="GeneroCD" name="GeneroCD" placeholder="" value="<?= $identidad_genero[$caso['tgenero']] ?>">
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
                    <input type="text" class="form-control" id="NombreD" name="" value="<?= $caso['vnombre'] ?>" readonly placeholder="Nombre" maxlength="30">
                </div> 
                <div class="form-group col-md-6">
                    <label class="col-form-label text-right" for="ApellidoD">Apellido:</label>
                    <input type="text" class="form-control" id="ApellidoD" name="ApellidoD" placeholder="" value="<?= $caso['vapellido'] ?>" readonly maxlength="30">
                </div>  
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="TipoDocumentoD" class="col-form-label text-right">Tipo de documento:</label>
                    <input type="text" readonly class="form-control" id="TipoDocumentoD" name="TipoDocumentoD" placeholder="" value="<?= $caso['vtipodoc'] ?>">
                </div>
                <div class="form-group col-md-4">
                    <label class=" col-form-label text-right" for="NumeroDocumentoD">Nº de documento:</label>
                    <input type="text" class="form-control" id="NumeroDocumentoD" name="NumeroDocumentoD" placeholder="" value="<?= $caso['vdoc'] ?>" readonly maxlength="11">
                </div>  
                <div class="form-group col-md-4">
                    <label class="col-form-label text-right" for="EdadD">Edad:</label>
                    <input type="number" class="form-control" id="EdadD" name="EdadD" placeholder="Edad" pattern="[0-9]" value="<?
                    if ($caso['vedad'] <> 0) {
                        echo $caso['vedad'];
                    }
                    ?>" readonly>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="col-form-label text-right" for="NacionalidadD">Nacionalidad:</label>
                    <input type="text" readonly class="form-control" id="NacionalidadD" name="NacionalidadD" placeholder="" value="<?= $nacionalidad[$caso['vnacion']] ?>">
                </div> 
                <div class="form-group col-md-6">
                    <label class="col-form-label text-right" for="ResidenciaD">Lugar de Residencia:</label>
                    <input type="text" readonly class="form-control" id="ResidenciaD" name="ResidenciaD" placeholder="" value="<?= $lugar_residencia[$caso['vresid']] ?>">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="col-form-label text-right" for="CalleD"><strong>Domicilio: &nbsp;</strong> Calle:</label>
                    <input type="text" class="form-control" id="CalleD" name="CalleD" placeholder="" value="<?= $caso['vcalle'] ?>" readonly maxlength="50">
                </div>  
                <div class="form-group col-md-3">
                    <label class="col-form-label text-right" for="AlturaD">Altura:</label>
                    <input type="number" class="form-control" id="AlturaD" name="AlturaD" placeholder="Altura" pattern="[0-9]" value="<?
                    if ($caso['valtura'] <> 0) {
                        echo $caso['valtura'];
                    }
                    ?>" readonly>
                </div>  
                <div class="form-group col-md-3">
                    <label class="col-form-label text-right" for="PisoDptoD">Piso/Dpto:</label>
                    <input type="text" class="form-control" id="PisoDptoD" name="PisoDptoD" placeholder="" value="<?= $caso['vpisodep'] ?>" readonly maxlength="15">
                </div>

            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="TipoTelefonoD" class=" col-form-label text-right">Tipo de teléfono:</label>
                    <input type="text" readonly class="form-control" id="TipoTelefonoD" name="TipoTelefonoD" placeholder="" value="<?= $caso['vtipotel'] ?>">
                </div>
                <div class="form-group col-md-6">
                    <label class="col-form-label text-right" for="NumeroTelefonoD">Nº de teléfono:</label>
                    <input type="number" class="form-control" id="NumeroTelefonoD" name="NumeroTelefonoD" placeholder="" value="<?
                    if ($caso['vntel'] <> 0) {
                        echo $caso['vntel'];
                    }
                    ?>" readonly >
                </div>  

            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="col-form-label text-right" for="GeneroD">Identidad de Género:</label>
                    <input type="text" readonly class="form-control" id="GeneroD" name="GeneroD" placeholder="" value="<?= $identidad_genero[$caso['vgenero']] ?>">
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
                            $t_maltrato[] = $tipo_maltrato[$row['tipo_maltrato_id']];
                        }
                        if ($nummal > 1) {
                            ?>
                            <select multiple readonly disabled size="<?= $nummal ?>" class="form-control" id="MaltratoD" name="MaltratoD">
                                <? foreach ($t_maltrato as $mal) {
                                    ?>
                                    <option><?= $mal ?></option>
                                <? } ?>
                            </select>
                        <? } else { ?>
                            <input type="text" readonly class="form-control" id="MaltratoD" name="MaltratoD" placeholder="" value="<?= $t_maltrato[0] ?>">
                            <?
                        }
                    } else {
                        ?>
                        <input type="text" readonly class="form-control" id="MaltratoD" name="MaltratoD" placeholder="" value="">
                        <?
                    }
                    ?>


                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="IndicadoresRiesgoD" class="col-form-label">Indicadores de riesgo:</label>
                    </div>
                </div>
                <div class="form-row">
                    <label for="toggleArmasD" class="col-md-10 col-lg-5 col-form-label text-md-right my-1">Armas?</label>
                    <div class="col-md-2 col-lg-1">
                        <input type="text" readonly class="form-control" id="toggleArmasD" name="toggleArmasD" placeholder="" value="<?= str_replace('b', 'Blanca', str_replace(array('f', 'n'), array('Fuego', 'No'), $caso['carmas'])) ?>">
                    </div>

                    <label for="toggleGastosD" class="col-md-10 col-lg-5 col-form-label text-md-right my-1">Cubre sus gastos?</label>
                    <div class="col-md-2 col-lg-1">
                        <input type="text" readonly class="form-control" id="toggleGastosD" name="toggleGastosD" placeholder="" value="<?= str_replace(array('s', 'n'), array('Si', 'No'), $caso['cgastos']) ?>">
                    </div>

                    <label for="toggleSocializoD" class="col-md-10 col-lg-5 col-form-label text-md-right my-1">Socializó su situación?</label>
                    <div class="col-md-2 col-lg-1">
                        <input type="text" readonly class="form-control" id="toggleSocializoD" name="toggleSocializoD" placeholder="" value="<?= str_replace(array('s', 'n'), array('Si', 'No'), $caso['csocializo']) ?>">
                    </div>

                    <label for="toggleRecurrirD" class="col-md-10 col-lg-5 col-form-label text-md-right my-1">Por urgencias tiene donde recurrir?</label>
                    <div class="col-md-2 col-lg-1">
                        <input type="text" readonly class="form-control" id="toggleRecurrirD" name="toggleRecurrirD" placeholder="" value="<?= str_replace(array('s', 'n'), array('Si', 'No'), $caso['crecurrir']) ?>">
                    </div>

                    <label for="toggleDiscapacidadD" class="col-md-10 col-lg-5 col-form-label text-md-right my-1">Presenta alguna discapacidad?</label>
                    <div class="col-md-2 col-lg-1">
                        <input type="text" readonly class="form-control" id="toggleDiscapacidadD" name="toggleDiscapacidadD" placeholder="" value="<?= str_replace(array('s', 'n'), array('Si', 'No'), $caso['cdiscap']) ?>">
                    </div>
                    <label for="toggleLocalizarlaD" class="col-md-10 col-lg-5 col-form-label text-md-right my-1">Agresor puede localizarlo/a?</label>
                    <div class="col-md-2 col-lg-1">
                        <input type="text" readonly class="form-control" id="toggleLocalizarlaD" name="toggleLocalizarlaD" placeholder="" value="<?= str_replace(array('s', 'n'), array('Si', 'No'), $caso['clocalizable']) ?>">
                    </div>
                    <label for="toggleAmenazasD" class="col-md-10 col-lg-5 col-form-label text-md-right my-1">Recibió amenazas de muerte?</label>
                    <div class="col-md-2 col-lg-1">
                        <input type="text" readonly class="form-control" id="toggleAmenazasD" name="toggleAmenazasD" placeholder="" value="<?= str_replace(array('s', 'n'), array('Si', 'No'), $caso['camenazas']) ?>">
                    </div>
                    <label for="toggleEscolarizadoD" class="col-md-10 col-lg-5 col-form-label text-md-right my-1">Se encuentra escolarizado?</label>
                    <div class="col-md-2 col-lg-1">
                        <input type="text" readonly class="form-control" id="toggleEscolarizadoD" name="toggleEscolarizadoD" placeholder="" value="<?= str_replace(array('s', 'n'), array('Si', 'No'), $caso['cescolarizado']) ?>">
                    </div>
                    <div class="col-12">&nbsp;</div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">

                    <label for="toggleHermanosD" class="col-form-label">Tiene hermanas/os o niñas/os convivientes?</label>
                    <?
                    $tiene_hijos = $caso['vhijos'];
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

                                $hijos[$ch]['genero'] = $identidad_genero[$row['identidad_genero_id']];
                                $hijos[$ch]['edad'] = $temp_edad;
                                $hijos[$ch]['maltrato'] = $row['tipo_maltrato'];
                                $hijos[$ch]['convive'] = $temp_convive;
                                $hijos[$ch]['conducta'] = $temp_conducta;
                            }
                            //con_log("Hijos: $ch");
                        }
                    }
                    ?>
                    <input type="text" readonly class="form-control" id="toggleHermanosD" name="toggleHermanosD" placeholder="" value="<?= $tiene_hijos ?>">
                </div>
            </div>
            <? if ($numhijos > 0) { ?>
                <div id="HermanosD">
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
                    $x = 0;
                    for ($x = 1; $x <= $ch; $x++) {
                        //con_log("pasa $x, ");
                        ?>
                        <div class="form-row cloned_hijos" id="HijoB<?= $x ?>">
                            <div class="form-group col-md-2 my-auto">
                                <input type="text" readonly class="form-control" id="HGeneroD<?= $x ?>" name="HGeneroD<?= $x ?>" placeholder="" value="<?= $hijos[$x]['genero'] ?>">
                            </div>
                            <div class="form-group col-md-2 my-auto">
                                <input type="text" readonly class="form-control" id="HEdadD<?= $x ?>" name="HEdadD<?= $x ?>" placeholder="" maxlength="4" value="<?= $hijos[$x]['edad'] ?>" >
                            </div>
                            <div class="form-group col-md-3 my-auto">
                                <?
                                $h_maltrato = explode(",", $hijos[$x]['maltrato']);
                                $h_nummalt = count($h_maltrato);
                                //con_log("nummalt = $h_nummalt.");
                                if ($h_nummalt > 1) {
                                    ?>
                                    <select multiple readonly disabled size = "<?= $h_nummalt ?>" class = "form-control" id = "HMaltratoD<?= $x ?>" name = "HMaltratoD<?= $x ?>">
                                        <? foreach ($h_maltrato as $hmal) {
                                            ?>
                                            <option><?= $hmal ?></option>
                                        <? } ?>
                                    </select>
                                    <?
                                } else {
                                    ?>
                                    <input type="text" readonly class="form-control" id="HMaltratoD<?= $x ?>" name="HMaltratoD<?= $x ?>" placeholder="" value="<?= $hijos[$x]['maltrato'] ?>">
                                    <?
                                }
                                ?>
                            </div>
                            <div class="form-group col-md-2 my-auto">
                                <input type="text" readonly class="form-control" id="HConviveD<?= $x ?>" name="HConviveD<?= $x ?>" placeholder="" maxlength="4" value="<?= $hijos[$x]['convive'] ?>" >
                            </div>
                            <div class="form-group col-md-3 my-auto">
                                <input type="text" readonly class="form-control" id="HConductaD<?= $x ?>" name="HConductaD<?= $x ?>" placeholder="" maxlength="4" value="<?= $hijos[$x]['conducta'] ?>" >
                            </div>

                        </div>
                        <div style="height:15px; width:1px;"></div>
                    <? } ?>
                </div>
            <? } ?>
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
                    <input type="text" readonly class="form-control" id="VinculoAD" name="VinculoAD" placeholder="" value="<?= $vinculo_agresor[$caso['avinculo']] ?>">
                </div>
                <div class="form-group col-md-4">
                    <label class="col-form-label text-right" for="NombreAD">Nombre:</label>
                    <input type="text" class="form-control" id="NombreAD" name="NombreAD" placeholder="" value="<?= $caso['anombre'] ?>" readonly maxlength="30">
                </div>
                <div class="form-group col-md-4">
                    <label class="col-form-label text-right" for="ApellidoAD">Apellido:</label>
                    <input type="text" class="form-control" id="ApellidoAD" name="ApellidoAD" placeholder="Apellido" value="<?= $caso['apellido'] ?>" readonly maxlength="30">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="TipoDocumentoAD" class="col-form-label text-right">Tipo de documento:</label>
                    <input type="text" readonly class="form-control" id="TipoDocumentoAD" name="TipoDocumentoAD" placeholder="" value="<?= $caso['atipodoc'] ?>" maxlength="30">
                </div>
                <div class="form-group col-md-4">
                    <label class=" col-form-label text-right" for="NumeroDocumentoAD">Nº de documento:</label>
                    <input type="text" class="form-control" id="NumeroDocumentoAD" name="NumeroDocumentoAD" placeholder="" value="<?= $caso['adoc'] ?>" readonly maxlength="11">
                </div>  
                <div class="form-group col-md-4">
                    <label class="col-form-label text-right" for="EdadAD">Edad:</label>
                    <input type="number" class="form-control" id="EdadAD" name="EdadAD" placeholder="Edad" pattern="[0-9]" value="<?
                    if ($caso['aedad'] <> 0) {
                        echo $caso['aedad'];
                    }
                    ?>" readonly>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="col-form-label text-right" for="NacionalidadAD">Nacionalidad:</label>
                    <input type="text" readonly class="form-control" id="NacionalidadAD" name="NacionalidadAD" placeholder="" value="<?= $nacionalidad[$caso['anacion']] ?>" maxlength="11">
                </div> 
                <div class="form-group col-md-6">
                    <label class="col-form-label text-right" for="GeneroAD">Identidad de Género:</label>
                    <input type="text" readonly class="form-control" id="GeneroAD" name="GeneroAD" placeholder="" value="<?= $identidad_genero[$caso['agenero']] ?>" maxlength="11">
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
                            $c_derivacion[] = $derivaciones[$row['derivacion_id']];
                        }
                        if ($numderiv > 1) {
                            ?>
                            <select multiple readonly disabled size="<?= $numderiv ?>" class="form-control" id="DerivacionesAD" name="DerivacionesAD">
                                <? foreach ($c_derivacion as $deriv) {
                                    ?>
                                    <option><?= $deriv ?></option>
                                <? } ?>
                            </select>
                        <? } else { ?>
                            <input type="text" readonly class="form-control" id="DerivacionesAD" name="DerivacionesAD" placeholder="" value="<?= $c_derivacion[0] ?>">
                            <?
                        }
                    } else {
                        ?>
                        <input type="text" readonly class="form-control" id="DerivacionesAD" name="DerivacionesAD" placeholder="" value="">
                        <?
                    }
                    ?>
                    <input type="hidden" name="ValDerivacionesAD" id="ValDerivacionesAD" />
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


</div>
<script>
    function loadobserv() {
        $.ajax({
            url: "<?= $hostactual ?>ajax/cargar-observaciones.php",
            type: 'POST',
            data: ({idcaso: $('#NumCaso').val()}),
            success: function (data) {
                $("#seccionObservaciones").html(data).fadeIn(500);
            }
        });
    }
    function loadseguimiento() {
        $.ajax({
            url: "<?= $hostactual ?>ajax/cargar-seguimientos.php",
            type: 'POST',
            data: ({idcaso: $('#NumCaso').val()}),
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
                    data: ({nobserv: $('#NObservacionesB').val(), ninterv: $('#NIntervencionB').val(), idcaso: $('#NumCaso').val(), user: $('#usuario').val()}),
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
                    data: ({nseguimiento: $('#NSeguimientoB').val(), idcaso: $('#NumCaso').val(), user: $('#usuario').val()}),
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



