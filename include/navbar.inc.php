<nav class="navbar sticky-top navbar-expand-md navbar-dark bg-custom border-custom">
    <div class="bg-logo"></div>
    <a class="navbar-brand" href="<?= $hostactual ?>"></a>
    <? if (isset($unombre)) { ?>
        <span class="d-md-none navbar-text navbar-right">
            <?= sanear_string($unombre) ?>
        </span>
    <? } ?>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Navbar text-->

    <div class="collapse navbar-collapse" id="collapsibleNavbar">

        <ul class="navbar-nav">
            <li class="nav-item">
                <? if (isset($uusuario)) { ?>
                    <a class="nav-link" href="<?= $hostactual ?>buscador">Buscador</a>
                <? } else { ?>
                    <span class="nav-link disabled" style="cursor: default; color: rgba(255, 255, 255, 0.25);">Buscador</span>
                <? } ?>
            </li>
            <li class="nav-item">
                <? if (isset($uusuario) && $uacceso != "l") { ?>
                    <a class="nav-link" href="<?= $hostactual ?>nuevo-caso">Nuevo Caso</a>
                <? } else if ($uacceso != "l") { ?>
                    <span class="nav-link disabled" style="cursor: default; color: rgba(255, 255, 255, 0.25);">Nuevo Caso</span>
                <? } ?>
            </li>
            <?
            if (isset($uacceso) && ($uacceso == "s" || $uacceso == "a")) {
                ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        ABMs
                    </a>
                    <div class="dropdown-menu bg-custom">
                        <? if (isset($uacceso) && $uacceso == "a") { ?>
                            <a class="dropdown-item dropdown-item-custom" href="<?= $hostactual ?>abm/usuarios">ABM de Usuarios</a>
                        <? } ?>
                        <a class="dropdown-item dropdown-item-custom" href="<?= $hostactual ?>abm/actividad">ABM de Actividad</a>
                        <a class="dropdown-item dropdown-item-custom" href="<?= $hostactual ?>abm/derivacion-violencia-genero">ABM de Derivación (Violencia de Género)</a>
                        <a class="dropdown-item dropdown-item-custom" href="<?= $hostactual ?>abm/derivacion-otras-problematicas-mujer">ABM de Derivación (Otras Problemáticas Mujer)</a>
                        <a class="dropdown-item dropdown-item-custom" href="<?= $hostactual ?>abm/derivacion-maltrato">ABM de Derivación (Maltrato)</a>
                        <a class="dropdown-item dropdown-item-custom" href="<?= $hostactual ?>abm/identidad-genero">ABM de Identidad de Género</a>
                        <a class="dropdown-item dropdown-item-custom" href="<?= $hostactual ?>abm/residencia">ABM de Lugar de Residencia</a>
                        <a class="dropdown-item dropdown-item-custom" href="<?= $hostactual ?>abm/medidas-proteccion">ABM de Medidas de Protección</a>
                        <a class="dropdown-item dropdown-item-custom" href="<?= $hostactual ?>abm/modalidad-violencia">ABM de Modalidad de Violencia</a>
                        <a class="dropdown-item dropdown-item-custom" href="<?= $hostactual ?>abm/motivo-problematica">ABM de Motivo de la llamada (Problemáticas)</a>
                        <a class="dropdown-item dropdown-item-custom" href="<?= $hostactual ?>abm/motivo-varios">ABM de Motivo de la llamada (Varios)</a>
                        <a class="dropdown-item dropdown-item-custom" href="<?= $hostactual ?>abm/nacionalidad">ABM de Nacionalidad</a>
                        <a class="dropdown-item dropdown-item-custom" href="<?= $hostactual ?>abm/origen-llamado">ABM de Origen del Llamado</a>
                        <a class="dropdown-item dropdown-item-custom" href="<?= $hostactual ?>abm/requerimiento">ABM de Requerimiento</a>
                        <a class="dropdown-item dropdown-item-custom" href="<?= $hostactual ?>abm/situacion-conyugal">ABM de Situación Conyugal</a>
                        <a class="dropdown-item dropdown-item-custom" href="<?= $hostactual ?>abm/tenencia-vivienda">ABM de Tenencia de Vivienda</a>
                        <a class="dropdown-item dropdown-item-custom" href="<?= $hostactual ?>abm/tipo-maltrato">ABM de Tipo de Maltrato</a>
                        <a class="dropdown-item dropdown-item-custom" href="<?= $hostactual ?>abm/tipo-violencia">ABM de Tipo de Violencia</a>
                        <a class="dropdown-item dropdown-item-custom" href="<?= $hostactual ?>abm/vinculo-agresor">ABM de Vínculo (Agresor)</a>
                        <a class="dropdown-item dropdown-item-custom" href="<?= $hostactual ?>abm/vinculo-consultante">ABM de Vínculo (Consultante)</a>
                    </div>
                </li>  
                <?
            }
            ?>
        </ul>
        <ul class="navbar-nav ml-auto">
            <? if (isset($unombre)) { ?>
                <li class="nav-item d-none d-md-block dropdown">
                    <a class="nav-link dropdown-toggle navbar-right" href="#" id="navbardrop" data-toggle="dropdown">
                        <?= sanear_string($unombre) ?>
                    </a>
                    <div class="dropdown-menu bg-custom dropdown-menu-color">
                        <a class="dropdown-item dropdown-item-custom" onclick="get_user_id('<?php echo $_SESSION['user_id'];?>');" data-toggle="modal" data-target="#myModal3">Cambiar contraseña</a>
                    </div>
                </li>
                <li class="nav-item d-md-none">
                        <a class="nav-link d-md-none dropdown-item-custom" onclick="get_user_id('<?php echo $_SESSION['user_id'];?>');" data-toggle="modal" data-target="#myModal3">Cambiar contraseña</a>
                </li>
                <li class="navbar-nav" style="width:10px;"></li>
                <li class="nav-item">
                    <a class="nav-link d-md-none" href="<?= $hostactual ?>login/salir"><i class="fas fa-sign-out-alt"></i> Salir</a>
                    <a href="<?= $hostactual ?>login/salir" class="btn btn-outline-light d-none d-md-block mujer-btn-salir" ><i class="fas fa-sign-out-alt"></i> Salir</a>
                </li>

            <? } ?>
        </ul>

    </div>  
</nav>
<?/*
<div>

    <?php
    
    if (isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] == 1) {
        if (!isset($con)) {
            include($hostactual . "config/conexion.php");
        }
        if (!isset($$msg_epuser)) {
            $msg_epuser[1] = "La contraseña ha sido modificada.";
            $msg_epuser[2] = "No se encuentra el usuario a modificar.";
            $msg_epuser[4] = "No se pudo modificar el usuario. Por favor, vuelva a intentarlo.";
            $msg_nuuser[5]['pass1'] = "Debe ingresar una contraseña.";
            $msg_nuuser[5]['pass2'] = "La contraseña debe tener como mínimo 8 caracteres.";
            $msg_nuuser[5]['pass3'] = "La contraseña debe tener como máximo 16 caracteres.";
            $msg_nuuser[5]['pass4'] = "Las contraseñas ingresadas no coinciden.";
        }
        ?>
        <!-- Modal -->
        <div class="modal fade" id="CambiarPass" tabindex="-1" role="dialog" aria-labelledby="CambiarPass">
            <div class="modal-dialog" role="document">
                <div class="modal-content modal-custom">
                    <form class="form-horizontal was-validated" method="post" id="nav_editar_password" name="nav_editar_password" novalidate>
                        <div class="modal-header">
                            <h4 class="modal-title"><i class="fas fa-edit"></i> Cambiar contraseña</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">

                            <div id="resultados_ajax3">
                                <div id="diveperrnav" class="alert alert-danger" style="display:none;" role="alert">
                                    <button type="button" class="close"  onclick="javascript:$('#diveperrnav').hide(500);">&times;</button>
                                    <strong>Error!</strong> 
                                    <span id="spaneperrnav"></span>
                                </div>
                                <div id="divepoknav" class="alert alert-success" style="display:none;" role="alert">
                                    <button type="button" class="close"  onclick="javascript:$('#divepoknav').hide(500);">&times;</button>
                                    <strong>¡Bien hecho!</strong>
                                    <span id="spanepoknav"></span>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="row mx-auto">
                                    <div class="col-4 text-right"><label for="nav_user_password_new3" class="control-label" style="margin-top: 7px;"><strong>Contraseña</strong></label></div>
                                    <div class="col-7">
                                        <input type="password" class="form-control" id="nav_user_password_new3" name="nav_user_password_new3" placeholder="Contraseña" pattern=".{8,16}"  autocomplete="new-password" required maxlength="16">
                                        <input type="hidden" id="nav_user_id_mod" name="nav_user_id_mod" value="<?= $_SESSION['user_id'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row mx-auto">
                                    <div class="col-4 text-right"><label for="nav_user_password_repeat3" class="control-label" style="margin-top: 7px;"><strong>Repita la contraseña</strong></label></div>
                                    <div class="col-7">
                                        <input type="password" class="form-control" id="nav_user_password_repeat3" name="nav_user_password_repeat3" placeholder="Repita la contraseña" pattern=".{8,16}"  autocomplete="new-password" required maxlength="16">
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light btn-buscar" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-custom" id="nav_actualizar_datos3">Cambiar contraseña</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script>
    $("#nav_editar_password").submit(function (event) {
        alert("res");
        $('#nav_actualizar_datos3').attr("disabled", true);
        $("#divcpoknav").hide(500);
        $("#divcperrnav").hide(500);
        if (validaFormCP()) {
            var parametros = $(this).serialize();
            $.ajax({
                type: "POST",
                url: "<?= $hostactual ?>ajax/editar_password_nav.php",
                data: parametros,
                success: function (res) {
                    
                    if (res === "1") {
                        $("#diveperrnav").hide(500);   
                        $("#nav_user_password_new3").val("");
                        $("#nav_user_password_repeat3").val("");
                        $('#nav_actualizar_datos3').attr("disabled", false);
                        $("#spanepoknav").text('<?= $msg_epuser[1] ?>');
                        $("#divepoknav").show(500);
                    } else if (res === "2") {
                        $("#divepoknav").hide(500);
                        $('#nav_actualizar_datos3').attr("disabled", false);
                        $("#spaneperrnav").text('<?= $msg_epuser[2] ?>');
                        $("#diveperrnav").show(500);
                    } else if (res === "4") {
                        $("#divepoknav").hide(500);
                        $('#nav_actualizar_datos3').attr("disabled", false);
                        $("#spannuerrnav").text('<?= $msg_epuser[4] ?>');
                        $("#diveperrnav").show(500);
                    }
                }
            });
        }
        event.preventDefault();
    });
    function validaFormCP() {
        // Campos de texto

        check_dato = $("#nav_user_password_new3").val();
        check_dato_2 = $("#nav_navuser_password_repeat3").val();

        if (check_dato === "") {
            $("#divepoknav").hide(500);
            $("#diveperrnav").show(500);
            $("#spaneperrnav").text("<?= $msg_nuuser[5]["pass1"] ?>");
            $('#nav_actualizar_datos3').attr("disabled", false);
            $("#nav_user_password_new3").focus();       // Esta función coloca el foco de escritura del usuario en el campo Nombre directamente.
                    return false;
        } else if (check_dato.length < 8) {
            $("#divepoknav").hide(500);
            $("#diveperrnav").show(500);
            $("#spaneperrnav").text("<?= $msg_nuuser[5]["pass2"] ?>");
            $('#nav_actualizar_datos3').attr("disabled", false);
            $("#nav_user_password_new3").focus();       // Esta función coloca el foco de escritura del usuario en el campo Nombre directamente.
                    return false;
        } else if (check_dato.length > 16) {
            $("#divepoknav").hide(500);
            $("#diveperrnav").show(500);
            $("#spaneperrnav").text("<?= $msg_nuuser[5]["pass3"] ?>");
            $('#nav_actualizar_datos3').attr("disabled", false);
            $("#nav_user_password_new3").focus();       // Esta función coloca el foco de escritura del usuario en el campo Nombre directamente.
                    return false;
        } else if (check_dato !== check_dato_2) {
            $("#divepoknav").hide(500);
            $("#diveperrnav").show(500);
            $("#spaneperrnav").text("<?= $msg_nuuser[5]["pass4"] ?>");
            $('#nav_actualizar_datos3').attr("disabled", false);
            $("#nav_user_password_repeat3").focus();       // Esta función coloca el foco de escritura del usuario en el campo Nombre directamente.
                    return false;
        }

        $("#diveperrnav").hide(500);   
        return true; // Si todo está correcto
    }
</script>
    <? } ?>
</div>
<?*/?>