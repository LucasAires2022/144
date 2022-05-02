<? /*
 * FORMULARIO B
 */ ?>
<div id="formB" style="margin-top:2rem;">
    <div class="container-fluid">
        <div class="form-group row text-center text-md-left">
            <label for="toggleConsultanteB" class="col-md-8 col-form-label">Llama la persona en situación de violencia de género?</label>
            <?
            $llamavictima = "No";
            if ($caso['cconsultid'] == 0) {
                $llamavictima = "Si";
            }
            ?>
            <div class="col-md-4">
                <input type="text" readonly class="form-control" id="toggleConsultanteB" name="toggleConsultanteB" placeholder="" value="<?= $llamavictima ?>">
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
                    <input type="text" readonly class="form-control" id="NombreCB" name="NombreCB" placeholder="" value="<?= $caso['tnombre'] ?>" maxlength="30">
                </div>
                <div class="form-group col-md-6">
                    <label class="col-form-label text-right" for="ApellidoCB">Apellido:</label>
                    <input type="text" readonly class="form-control" id="ApellidoCB" name="ApellidoCB" placeholder="" value="<?= $caso['tapellido'] ?>" maxlength="30">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="TipoDocumentoCB" class="col-form-label text-right">Tipo de documento:</label>
                    <input type="text" readonly class="form-control" id="TipoDocumentoCB" name="TipoDocumentoCB" placeholder="" value="<?= $caso['ttipodoc'] ?>">

                </div>
                <div class="form-group col-md-4">
                    <label class="col-form-label text-right" for="NumeroDocumentoCB">Nº de documento:</label>
                    <input type="text" readonly class="form-control" id="NumeroDocumentoCB" name="NumeroDocumentoCB" placeholder="" value="<?= $caso['tdoc'] ?>" maxlength="11">
                </div>  
                <div class="form-group col-md-4">
                    <label class="col-form-label text-right" for="EdadCB">Edad:</label>
                    <input type="number" readonly class="form-control" id="EdadCB" name="EdadCB" placeholder="" pattern="[0-9]" value="<?
                    if ($caso['tedad'] <> 0) {
                        echo $caso['tedad'];
                    }
                    ?>">
                </div>  
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="TipoTelefonoCB" class=" col-form-label text-right">Tipo de teléfono:</label>
                    <input type="text" readonly class="form-control" id="TipoTelefonoCB" name="TipoTelefonoCB" placeholder="" value="<?= $caso['ttipotel'] ?>">
                </div>
                <div class="form-group col-md-4">
                    <label class="col-form-label text-right" for="NumeroTelefonoCB">Nº de teléfono:</label>
                    <input type="number" readonly class="form-control" id="NumeroTelefonoCB" name="NumeroTelefonoCB" placeholder="" value="<?
                    if ($caso['tntel'] <> 0) {
                        echo $caso['tntel'];
                    }
                    ?>">
                </div>  
                <div class="form-group col-md-4">
                    <label class="col-form-label text-right" for="ResidenciaCB">Lugar de Residencia:</label>
                    <input type="text" readonly class="form-control" id="ResidenciaCB" name="ResidenciaCB" placeholder="" value="<?= $lugar_residencia[$caso['tresid']] ?>">
                </div>  
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="col-form-label text-right" for="GeneroCB">Identidad de Género:</label>
                    <input type="text" readonly class="form-control" id="GeneroCB" name="GeneroCB" placeholder="" value="<?= $identidad_genero[$caso['tgenero']] ?>">
                </div>
                <div class="form-group col-md-6">
                    <label class="col-form-label text-right" for="VinculoCB">Vinculo:</label>
                    <input type="text" readonly class="form-control" id="GeneroCB" name="GeneroCB" placeholder="" value="<?= $vinculo_consultante[$caso['tvinculo']] ?>">
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
                    <input type="text" readonly class="form-control" id="NombreB" name="NombreB" placeholder="" value="<?= $caso['vnombre'] ?>" maxlength="30">
                </div> 
                <div class="form-group col-md-6">
                    <label class="col-form-label text-right" for="ApellidoB">Apellido:</label>
                    <input type="text" readonly class="form-control" id="ApellidoB" name="ApellidoB" placeholder="" value="<?= $caso['vapellido'] ?>" maxlength="30">
                </div>  
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="TipoDocumentoB" class="col-form-label text-right">Tipo de documento:</label>
                    <input type="text" readonly class="form-control" id="TipoDocumentoB" name="TipoDocumentoB" placeholder="" value="<?= $caso['vtipodoc'] ?>">
                </div>
                <div class="form-group col-md-4">
                    <label class=" col-form-label text-right" for="NumeroDocumentoB">Nº de documento:</label>
                    <input type="text" readonly class="form-control" id="NumeroDocumentoB" name="NumeroDocumentoB" placeholder="" value="<?= $caso['vdoc'] ?>" maxlength="11">
                </div>  
                <div class="form-group col-md-4">
                    <label class="col-form-label text-right" for="EdadB">Edad:</label>
                    <input type="number" readonly class="form-control" id="EdadB" name="EdadB" placeholder="" pattern="[0-9]" value="<?
                    if ($caso['vedad'] <> 0) {
                        echo $caso['vedad'];
                    }
                    ?>">
                </div>
            </div>


            <div class="form-row">
                <div class="form-group col-md-4">
                    <label class="col-form-label text-right" for="CalleB"><strong>Domicilio: &nbsp;</strong> Calle:</label>
                    <input type="text" readonly class="form-control" id="CalleB" name="CalleB" placeholder="" maxlength="50" value="<?= $caso['vcalle'] ?>">
                </div>  
                <div class="form-group col-md-2">
                    <label class="col-form-label text-right" for="AlturaB">Altura:</label>
                    <input type="number" readonly class="form-control" id="AlturaB" name="AlturaB" placeholder="" pattern="[0-9]" value="<?
                    if ($caso['valtura'] <> 0) {
                        echo $caso['valtura'];
                    }
                    ?>">
                </div>  
                <div class="form-group col-md-2">
                    <label class="col-form-label text-right" for="PisoDptoB">Piso/Dpto:</label>
                    <input type="text" readonly class="form-control" id="PisoDptoB" name="PisoDptoB" placeholder="" maxlength="15" value="<?= $caso['vpisodep'] ?>">
                </div>
                <div class="form-group col-md-4">
                    <label class="col-form-label text-right" for="ResidenciaB">Lugar de Residencia:</label>
                    <input type="text" readonly class="form-control" id="ResidenciaB" name="ResidenciaB" placeholder="" value="<?= $lugar_residencia[$caso['vresid']] ?>">
                </div>  
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="TipoTelefonoB" class=" col-form-label text-right">Tipo de teléfono:</label>
                    <input type="text" readonly class="form-control" id="TipoTelefonoB" name="TipoTelefonoB" placeholder="" value="<?= $caso['vtipotel'] ?>">
                </div>
                <div class="form-group col-md-4">
                    <label class="col-form-label text-right" for="NumeroTelefonoB">Nº de teléfono:</label>
                    <input type="number" readonly class="form-control" id="NumeroTelefonoB" name="NumeroTelefonoB" placeholder="" value="<?
                    if ($caso['vntel'] <> 0) {
                        echo $caso['vntel'];
                    }
                    ?>">
                </div>  
                <div class="form-group col-md-4">
                    <label class="col-form-label text-right" for="GeneroB">Identidad de Género:</label>
                    <input type="text" readonly class="form-control" id="GeneroB" name="GeneroB" placeholder="" value="<?= $identidad_genero[$caso['vgenero']] ?>">

                </div> 
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="col-form-label text-right" for="NacionalidadB">Nacionalidad:</label>
                    <input type="text" readonly class="form-control" id="NacionalidadB" name="NacionalidadB" placeholder="" value="<?= $nacionalidad[$caso['vnacion']] ?>">
                </div> 
                <div class="form-group col-md-6">
                    <label class="col-form-label text-right" for="ConyugeB">Situación conyugal:</label>
                    <input type="text" readonly class="form-control" id="ConyugeB" name="ConyugeB" placeholder="" value="<?= $situacion_conyugal[$caso['vconyuge']] ?>">
                </div> 
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <?
                    if ($caso['vconvive'] == "Si") {
                        $vconvive = "Si";
                    } else if ($caso['vconvive'] == "No") {
                        $vconvive = "No";
                    } else {
                        $vconvive = "No especifica";
                    }
                    ?>
                    <label for="toggleConviveB" class="col-form-label">Convive con el agresor?</label>
                    <input type="text" readonly class="form-control" id="toggleConviveB" name="toggleConviveB" placeholder="" value="<?= $vconvive ?>">

                </div>
                <?
                $vmeses = $caso['vmeses'];
                if (($vmeses % 4) == 0) {
                    $vdesde = "Años";
                    $vcantdesde = $vmeses / 12;
                    //con_log($vmeses . " / 12 = " . $vcantdesde);
                } else {
                    $vdesde = "Meses";
                    $vcantdesde = $vmeses;
                }
                ?>
                <div class="form-group col-md-4" id="TiempoB" <?
                if ($vconvive != "Si" || $vmeses == 0) {
                    echo 'style="display:none;"';
                }
                ?>>
                    <label for="TiempoDesdeB" class=" col-form-label text-right">Desde:</label>

                    <input type="text" readonly class="form-control" id="TiempoDesdeB" name="TiempoDesdeB" placeholder="" value="<?= $vdesde ?>">

                </div>
                <div class="form-group col-md-4 mes-año" <?
                if ($vconvive != "Si" || $vmeses == 0) {
                    echo 'style="display:none;"';
                }
                ?>>
                    <label for="DesdeB" class=" col-form-label text-right">&nbsp;</label>
                    <input type="number" readonly class="form-control" id="DesdeB" name="DesdeB" placeholder=""  pattern="[0-9]" value="<?= $vcantdesde ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label class="col-form-label text-right" for="ViviendaB">Tenencia de la vivienda:</label>
                    <input type="text" readonly class="form-control" id="ViviendaB" name="ViviendaB" placeholder="" value="<?= $tenencia_vivienda[$caso['vvivienda']] ?>">
                </div> 
                <div class="form-group col-md-4">
                    <label class="col-form-label text-right" for="ActividadB">Actividad:</label>
                    <?
                    $sql2 = "SELECT * FROM victima_actividad WHERE victima_id = '" . $caso['cvictid'] . "' ORDER BY nitem asc";
                    $sqlcount2 = "SELECT count(*) AS numact FROM victima_actividad WHERE victima_id = '" . $caso['cvictid'] . "' ORDER BY nitem asc";
                    $querycount2 = mysqli_query($con, $sqlcount2);
                    $row = mysqli_fetch_array($querycount2);
                    $numact = $row['numact'];
                    if ($numact <> 0) {
                        $query2 = mysqli_query($con, $sql2);
                        while ($row = mysqli_fetch_array($query2)) {
                            $victima_actividad[] = $actividad[$row['actividad_id']];
                        }
                        if ($numact > 1) {
                            ?>
                            <select multiple readonly disabled size="<?= $numact ?>" class="form-control" id="ActividadB" name="ActividadB">
                                <? foreach ($victima_actividad as $act) {
                                    ?>
                                    <option><?= $act ?></option>
                                <? } ?>
                            </select>
                        <? } else { ?>
                            <input type="text" readonly class="form-control" id="ActividadB" name="ActividadB" placeholder="" value="<?= $victima_actividad[0] ?>">
                            <?
                        }
                    } else {
                        ?>
                        <input type="text" readonly class="form-control" id="ActividadB" name="ActividadB" placeholder="" value="">
                        <?
                    }
                    ?>

                </div> 
                <div class="form-group col-md-4">
                    <label class="col-form-label text-right" for="NEducativoB">Nivel educativo alcanzado:</label>
                    <input type="text" readonly class="form-control" id="NEducativoB" name="NEducativoB" placeholder="" value="<?= $caso['vneduc'] ?>">
                </div> 
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="toggleHijosB" class="col-form-label">Tiene hijas/os?</label>
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
                    <input type="text" readonly class="form-control" id="toggleHijosB" name="toggleHijosB" placeholder="" value="<?= $tiene_hijos ?>">
                </div>
            </div>
            <? if ($numhijos > 0) { ?>
                <div id="HijosB">
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
                    $x = 0;
                    for ($x = 1; $x <= $ch; $x++) {
                        //con_log("pasa $x, ");
                        ?>
                        <div class="form-row cloned_hijos" id="HijoB<?= $x ?>">
                            <div class="form-group col-md-2 my-auto">
                                <input type="text" readonly class="form-control" id="HGeneroB<?= $x ?>" name="HGeneroB<?= $x ?>" placeholder="" value="<?= $hijos[$x]['genero'] ?>">
                            </div>
                            <div class="form-group col-md-2 my-auto">
                                <input type="text" readonly class="form-control" id="HEdadB<?= $x ?>" name="HEdadB<?= $x ?>" placeholder="" maxlength="4" value="<?= $hijos[$x]['edad'] ?>" >
                            </div>
                            <div class="form-group col-md-3 my-auto">
                                <?
                                $h_maltrato = explode(",", $hijos[$x]['maltrato']);
                                $h_nummalt = count($h_maltrato);
                                //con_log("nummalt = $h_nummalt.");
                                if ($h_nummalt > 1) {
                                    ?>
                                    <select multiple readonly disabled size = "<?= $h_nummalt ?>" class = "form-control" id = "HMaltratoB<?= $x ?>" name = "HMaltratoB<?= $x ?>">
                                        <? foreach ($h_maltrato as $hmal) {
                                            ?>
                                            <option><?= $hmal ?></option>
                                        <? } ?>
                                    </select>
                                    <?
                                } else {
                                    ?>
                                    <input type="text" readonly class="form-control" id="HMaltratoB<?= $x ?>" name="HMaltratoB<?= $x ?>" placeholder="" value="<?= $hijos[$x]['maltrato'] ?>">
                                    <?
                                }
                                ?>
                            </div>
                            <div class="form-group col-md-2 my-auto">
                                <input type="text" readonly class="form-control" id="HConviveB<?= $x ?>" name="HConviveB<?= $x ?>" placeholder="" maxlength="4" value="<?= $hijos[$x]['convive'] ?>" >
                            </div>
                            <div class="form-group col-md-3 my-auto">
                                <input type="text" readonly class="form-control" id="HConductaB<?= $x ?>" name="HConductaB<?= $x ?>" placeholder="" maxlength="4" value="<?= $hijos[$x]['conducta'] ?>" >
                            </div>

                        </div>
                        <div style="height:15px; width:1px;"></div>
                    <? } ?>
                </div>
            <? } ?>
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
                    <input type="text" readonly class="form-control" id="VinculoAB" name="VinculoAB" placeholder="" value="<?= $vinculo_agresor[$caso['avinculo']] ?>">
                </div>
                <div class="form-group col-md-4">
                    <label class="col-form-label text-right" for="NombreAB">Nombre:</label>
                    <input type="text" readonly class="form-control" id="NombreAB" name="NombreAB" placeholder="" value="<?= $caso['anombre'] ?>" maxlength="30">
                </div>
                <div class="form-group col-md-4">
                    <label class="col-form-label text-right" for="ApellidoAB">Apellido:</label>
                    <input type="text" readonly class="form-control" id="ApellidoAB" name="ApellidoAB" placeholder="" value="<?= $caso['aapellido'] ?>" maxlength="30">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="TipoDocumentoAB" class="col-form-label text-right">Tipo de documento:</label>
                    <input type="text" readonly class="form-control" id="TipoDocumentoAB" name="TipoDocumentoAB" placeholder="" value="<?= $caso['atipodoc'] ?>" maxlength="30">
                </div>
                <div class="form-group col-md-4">
                    <label class=" col-form-label text-right" for="NumeroDocumentoAB">Nº de documento:</label>
                    <input type="text" readonly class="form-control" id="NumeroDocumentoAB" name="NumeroDocumentoAB" placeholder="" value="<?= $caso['adoc'] ?>" maxlength="11">
                </div>  
                <div class="form-group col-md-4">
                    <label class="col-form-label text-right" for="EdadAB">Edad:</label>
                    <input type="number" readonly class="form-control" id="EdadAB" name="EdadAB" placeholder="" pattern="[0-9]" value="<?
                    if ($caso['aedad'] <> 0) {
                        echo $caso['aedad'];
                    }
                    ?>">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="col-form-label text-right" for="NacionalidadAB">Nacionalidad:</label>
                    <input type="text" readonly class="form-control" id="NacionalidadAB" name="NacionalidadAB" placeholder="" value="<?= $nacionalidad[$caso['anacion']] ?>" maxlength="11">
                </div> 
                <div class="form-group col-md-6">
                    <label class="col-form-label text-right" for="GeneroAB">Identidad de Género:</label>
                    <input type="text" readonly class="form-control" id="GeneroAB" name="GeneroAB" placeholder="" value="<?= $identidad_genero[$caso['agenero']] ?>" maxlength="11">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="col-form-label text-right" for="ResidenciaAB">Lugar de Residencia:</label>
                    <input type="text" readonly class="form-control" id="ResidenciaAB" name="ResidenciaAB" placeholder="" value="<?= $lugar_residencia[$caso['aresid']] ?>">
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
                            $agresor_actividad[] = $actividad[$row['actividad_id']];
                        }
                        if ($numact > 1) {
                            ?>
                            <select multiple readonly disabled size="<?= $numact ?>" class="form-control" id="ActividadAB" name="ActividadAB">
                                <? foreach ($agresor_actividad as $act) {
                                    ?>
                                    <option><?= $act ?></option>
                                <? } ?>
                            </select>
                        <? } else { ?>
                            <input type="text" readonly class="form-control" id="ActividadAB" name="ActividadAB" placeholder="" value="<?= $agresor_actividad[0] ?>">
                            <?
                        }
                    } else {
                        ?>
                        <input type="text" readonly class="form-control" id="ActividadAB" name="ActividadAB" placeholder="" value="">
                        <?
                    }
                    ?>
                </div> 
            </div>

            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="toggleAdiccionesAB" class="col-form-label">Adicciones:</label>
                    <?
                    if ($caso['aadiccion'] == "s") {
                        $aadicciones = "Si";
                    } else {
                        $aadicciones = "No";
                    }
//con_log("adicciones observ: " . $caso['aadicobs']);
                    ?>
                    <input type="text" readonly class="form-control" id="toggleAdiccionesAB" name="toggleAdiccionesAB" placeholder="" value="<?= $aadicciones ?>">
                </div>
                <div class="form-group col-md-10" id="AdiccionesAB" <?
                if ($aadicciones == "No") {
                    echo 'style="display:none;"';
                }
                ?>>
                    <label for="AdiccionesDetaleAB" class=" col-form-label text-right">Detalle:</label>
                    <textarea class="form-control" readonly style="resize:none;" id="AdiccionesDetaleAB" name="AdiccionesDetaleAB" rows="2" placeholder=""><?= $caso['aadicobs'] ?></textarea>
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
                            $modo_violencia[] = $modalidad_violencia[$row['modalidad_violencia_id']];
                        }
                        if ($nummod > 1) {
                            ?>
                            <select multiple readonly disabled size="<?= $nummod ?>" class="form-control" id="ModoViolenciaAB" name="ModoViolenciaAB">
                                <? foreach ($modo_violencia as $mod) {
                                    ?>
                                    <option><?= $mod ?></option>
                                <? } ?>
                            </select>
                        <? } else { ?>
                            <input type="text" readonly class="form-control" id="ModoViolenciaAB" name="ModoViolenciaAB" placeholder="" value="<?= $modo_violencia[0] ?>">
                            <?
                        }
                    } else {
                        ?>
                        <input type="text" readonly class="form-control" id="ModoViolenciaAB" name="ModoViolenciaAB" placeholder="" value="">
                        <?
                    }
                    ?>
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
                            $t_violencia[] = $tipo_violencia[$row['tipo_violencia_id']];
                        }
                        if ($numtipo > 1) {
                            ?>
                            <select multiple readonly disabled size="<?= $numtipo ?>" class="form-control" id="TipoViolenciaAB" name="ModoViolenciaAB">
                                <? foreach ($t_violencia as $tv) {
                                    ?>
                                    <option><?= $tv ?></option>
                                <? } ?>
                            </select>
                        <? } else { ?>
                            <input type="text" readonly class="form-control" id="TipoViolenciaAB" name="TipoViolenciaAB" placeholder="" value="<?= $t_violencia[0] ?>">
                            <?
                        }
                    } else {
                        ?>
                        <input type="text" readonly class="form-control" id="TipoViolenciaAB" name="TipoViolenciaAB" placeholder="" value="">
                        <?
                    }
                    ?>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">

                    <label for="toggleDenunciasAB" class="col-form-label">Denuncias anteriores?</label>
                    <input type="text" readonly class="form-control" id="toggleDenunciasAB" name="toggleDenunciasAB" placeholder="" value="<?= str_replace("NE", "No especifica", $caso['cdenuncia']) ?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="ProteccionAB" class="col-form-label">Medidas de protección vigentes:</label>
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
                            $m_proteccion[] = $medidas_proteccion[$row['medidas_proteccion_id']];
                            if ($row['vencimiento'] <> "") {
                                $vencimiento = date("Y-m-d", strtotime($row['vencimiento']));
                            }
                        }
                        if ($nummed > 1) {
                            ?>
                            <select multiple readonly disabled size="<?= $nummed ?>" class="form-control" id="ProteccionAB" name="ProteccionAB">
                                <? foreach ($m_proteccion as $mp) {
                                    ?>
                                    <option><?= $mp ?></option>
                                <? } ?>
                            </select>
                        <? } else { ?>
                            <input type="text" readonly class="form-control" id="TipoViolenciaAB" name="TipoViolenciaAB" placeholder="" value="<?= $m_proteccion[0] ?>">
                            <?
                        }
                    } else {
                        ?>
                        <input type="text" readonly class="form-control" id="TipoViolenciaAB" name="TipoViolenciaAB" placeholder="" value="">
                        <?
                    }
                    ?>
                </div>
                <? if ($nummed <> 0) { ?>
                    <div class="form-group col-md-4">

                        <label for="VencimientoAB" class="col-form-label">Fecha de vencimiento:</label>
                        <input type="date" readonly class="form-control" id="VencimientoAB" name="VencimientoAB" placeholder="" value="<?= $vencimiento ?>">
                    </div>
                <? } ?>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="IndicadoresRiesgoB" class="col-form-label">Indicadores de riesgo:</label>
                </div>
            </div>
            <div class="form-row">
                <label for="toggleArmasAB" class="col-md-10 col-lg-5 col-form-label text-md-right my-1">Armas?</label>
                <div class="col-md-2 col-lg-1">
                    <input type="text" readonly class="form-control" id="toggleArmasAB" name="toggleArmasAB" placeholder="" value="<?= str_replace('b', 'Blanca', str_replace(array('f', 'n'), array('Fuego', 'No'), $caso['carmas'])) ?>">
                </div>

                <label for="toggleGastosAB" class="col-md-10 col-lg-5 col-form-label text-md-right my-1">Cubre sus gastos?</label>
                <div class="col-md-2 col-lg-1">
                    <input type="text" readonly class="form-control" id="toggleGastosAB" name="toggleGastosAB" placeholder="" value="<?= str_replace(array('s', 'n'), array('Si', 'No'), $caso['cgastos']) ?>">
                </div>

                <label for="toggleSocializoAB" class="col-md-10 col-lg-5 col-form-label text-md-right my-1">Socializó su situación?</label>
                <div class="col-md-2 col-lg-1">
                    <input type="text" readonly class="form-control" id="toggleSocializoAB" name="toggleSocializoAB" placeholder="" value="<?= str_replace(array('s', 'n'), array('Si', 'No'), $caso['csocializo']) ?>">
                </div>

                <label for="toggleRecurrirAB" class="col-md-10 col-lg-5 col-form-label text-md-right my-1">Por urgencias tiene donde recurrir?</label>
                <div class="col-md-2 col-lg-1">
                    <input type="text" readonly class="form-control" id="toggleRecurrirAB" name="toggleRecurrirAB" placeholder="" value="<?= str_replace(array('s', 'n'), array('Si', 'No'), $caso['crecurrir']) ?>">
                </div>

                <label for="toggleDiscapacidadAB" class="col-md-10 col-lg-5 col-form-label text-md-right my-1">Presenta alguna discapacidad?</label>
                <div class="col-md-2 col-lg-1">
                    <input type="text" readonly class="form-control" id="toggleDiscapacidadAB" name="toggleDiscapacidadAB" placeholder="" value="<?= str_replace(array('s', 'n'), array('Si', 'No'), $caso['cdiscap']) ?>">
                </div>
                <label for="toggleLocalizarlaAB" class="col-md-10 col-lg-5 col-form-label text-md-right my-1">Agresor puede localizarla?</label>
                <div class="col-md-2 col-lg-1">
                    <input type="text" readonly class="form-control" id="toggleLocalizarlaAB" name="toggleLocalizarlaAB" placeholder="" value="<?= str_replace(array('s', 'n'), array('Si', 'No'), $caso['clocalizable']) ?>">
                </div>
                <label for="toggleAmenazasAB" class="col-md-10 col-lg-5 col-form-label text-md-right my-1">Recibió amenazas de muerte?</label>
                <div class="col-md-2 col-lg-1">
                    <input type="text" readonly class="form-control" id="toggleAmenazasAB" name="toggleAmenazasAB" placeholder="" value="<?= str_replace(array('s', 'n'), array('Si', 'No'), $caso['camenazas']) ?>">
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
                            $c_derivacion[] = $derivaciones[$row['derivacion_id']];
                        }
                        if ($numderiv > 1) {
                            ?>
                            <select multiple readonly disabled size="<?= $numderiv ?>" class="form-control" id="DerivacionesAB" name="DerivacionesAB">
                                <? foreach ($c_derivacion as $deriv) {
                                    ?>
                                    <option><?= $deriv ?></option>
                                <? } ?>
                            </select>
                        <? } else { ?>
                            <input type="text" readonly class="form-control" id="DerivacionesAB" name="DerivacionesAB" placeholder="" value="<?= $c_derivacion[0] ?>">
                            <?
                        }
                    } else {
                        ?>
                        <input type="text" readonly class="form-control" id="DerivacionesAB" name="DerivacionesAB" placeholder="" value="">
                        <?
                    }
                    ?>
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



