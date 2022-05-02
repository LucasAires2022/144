<?
include ('../include/is_logged.inc.php');
include ('../include/mensajes.inc.php');


/* Connect To Database */
if (!isset($con)) {
    require_once ("../config/conexion.php"); //Contiene funcion que conecta a la base de datos
}
include ('../include/header.inc.php');
include ('../include/utiles.inc.php');

if ($_SESSION['acceso'] <> 'a') {
    header("location: /casos/login");
}

if (isset($_SESSION['orden_abm_usuarios']) && $_SESSION['orden_abm_usuarios'] != "") {
    $ordenarpor = $_SESSION['orden_abm_usuarios'];
} else {
    $ordenarpor = "aId";
}
/* con_log($ordenarpor); */
?>

<body>

    <?
    include ('../include/navbar.inc.php');
    ?>

    <div class="container-fluid" style="margin-top:20px">
        <div class="row justify-content-center">
            <div class="col-md-11 col-lg-8 mx-auto">
                <div class="card card-signin mb-5">
                    <div class="card-body">
                        <div class="row <? /* bg-custom-light titulo-seccion */ ?>">
                            <div class='col-6'><h5 class="abm-card-title mx-2">Usuarios <span id="loader"></span></h5></div>
                            <div class="col-6" style='text-align: right;'>
                                <button onclick="limpiar_datos();" type='button' class="btn btn-custom" data-toggle="modal" data-target="#nuevoUsuario"><i class="fas fa-plus"></i> Agregar</button>

                            </div>
                        </div>
                        <?php
                        include("../modal/registro_usuarios.php");
                        include("../modal/editar_usuarios.php");
                        include("../modal/toggle_usuario.php");
                        include("../modal/cambiar_password.php");
                        ?>
                        <form class="form-horizontal" action="javascript:load(1, '<?= $ordenarpor ?>');" role="form" id="datos_usuarios">
                            <div class="form-group row justify-content-center">
                                <div class="col-8 col-md-6" mx-auto>
                                    <div class="input-group">

                                        <input type="text" class="form-control" id="q" placeholder="Buscar usuario" <? /* onkeyup='load(1);' DESHABILITADO PARA EVITAR CONSUMO ALTO DE SERVER */ ?>>
                                        <div class="input-group-append">
                                            <a title="Borrar" href="javascript:limpiar_buscar();" class="input-group-text  append-custom"><i class="fas fa-times"></i></a>
                                        </div>
                                    </div>

                                    <input type="hidden" id="orden_form" name="orden_form" value="<?= $ordenarpor ?>">
                                </div>
                                <div class="col-3 col-md-3" style='text-align: left;'>
                                    <button type="button" class="btn btn-light btn-buscar" onclick='load(1, "Id");$("q").focus();'>
                                        <i class="fas fa-search"></i> Buscar</button>

                                </div>

                            </div>

                        </form>
                        <div id="resultados">

                            <div id="alertaok" class="alert alert-success" style="display:none;" role="alert">
                                <button type="button" class="close"  onclick="javascript:$('#alertaok').hide(500);">&times;</button>
                                <strong>Aviso!</strong>
                                <span id="spanok"></span>
                            </div>
                            <div id="alertabad" class="alert alert-danger" style="display:none;" role="alert">
                                <button type="button" class="close"  onclick="javascript:$('#alertabad').hide(500);">&times;</button>
                                <strong>Error!</strong> 
                                <span id="spanbad"></span>
                            </div>

                        </div><!-- Carga los datos ajax -->
                        <div class='outer_div'></div><!-- Carga los datos ajax -->
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


</div>


<script src="<?= $hostactual ?>js/jquery-3.4.1.min.js"></script>
<script src="<?= $hostactual ?>js/popper1.14.7.min.js"></script>
<script src="<?= $hostactual ?>js/bootstrap.js"></script>
<script>
                                    $(document).ready(function () {
                                        load(1);
                                        var ordenado = '<?= $ordenarpor ?>';
                                        if (ordenado === "") {
                                            load(1);
                                        } else {
                                            load_orden(1, ordenado);
                                        }

                                    });

                                    function load(page) {
                                        var q = $("#q").val();
                                        var orden = $("#orden_form").val();
                                        $("#loader").fadeIn('slow');
                                        $.ajax({
                                            url: '../ajax/buscar_usuario.php?action=ajax&page=' + page + '&q=' + q + '&orden=' + orden,
                                            beforeSend: function (objeto) {
                                                $('#loader').html('<img src="../img/ajax-loader.gif">');
                                            },
                                            success: function (data) {
                                                if (data === "") {
                                                    //$("#alertabad").hide(0);  
                                                    $("#alertaok").hide(500);
                                                    $("#spanbad").text('<?= $msg_error_logueo[1] ?>');
                                                    $("#alertabad").show(500);

                                                    $(".outer_div").html(data).fadeIn('slow');
                                                    $('#loader').html('');
                                                    /*$('#q').focus();*/
                                                    $('[data-toggle="tooltip"]').tooltip({html: true});
                                                } else {
                                                    $(".outer_div").html(data).fadeIn('slow');
                                                    $('#loader').html('');
                                                    $('[data-toggle="tooltip"]').tooltip({html: true});
                                                }
                                            }
                                        });
                                    }
                                    function load_orden(page, orden) {
                                        var q = $("#q").val();
                                        $("#orden_form").val(orden);
                                        $("#loader").fadeIn('slow');
                                        $.ajax({
                                            url: '../ajax/buscar_usuario.php?action=ajax&page=' + page + '&q=' + q + '&orden=' + orden,
                                            beforeSend: function (objeto) {
                                                $('#loader').html('<img src="../img/ajax-loader.gif">');
                                            },
                                            success: function (data) {
                                                if (data === "") {
                                                    //$("#alertabad").hide(0);  
                                                    $("#alertaok").hide(500);
                                                    $("#spanbad").text('<?= $msg_error_logueo[1] ?>');
                                                    $("#alertabad").show(500);

                                                    $(".outer_div").html(data).fadeIn('slow');
                                                    $('#loader').html('');
                                                    /*$('#q').focus();*/
                                                    $('[data-toggle="tooltip"]').tooltip({html: true});
                                                } else {
                                                    $(".outer_div").html(data).fadeIn('slow');
                                                    $('#loader').html('');
                                                    $('[data-toggle="tooltip"]').tooltip({html: true});
                                                }
                                            }
                                        });
                                    }
                                    function limpiar_buscar() {
                                        $("#q").val("");
                                        load(1);
                                        $("q").focus();
                                    }

                                    $("#toggle_form").submit(function (event) {
                                        $("#alertabad").hide(500);
                                        $("#alertaok").hide(500);
                                        var parametros = $(this).serialize();
                                        $.ajax({
                                            type: "POST",
                                            url: "../ajax/toggle_usuario.php",
                                            data: parametros,
                                            success: function (res) {
                                                if (res === "1") {
                                                    $("#alertabad").hide(500);   
                                                    $("#alertaok").hide(500);
                                                    $("#spanok").text('<?= $msg_resid[1] ?>');
                                                    $("#alertaok").show(500);
                                                    clearTimeout(sessionStorage.getItem("timerid"));
                                                    tvar = setTimeout(function () {

                                                        $("#alertaok").fadeOut(500);
                                                    }, 3000);
                                                    sessionStorage.setItem("timerid", tvar);
                                                    load(1, "<?= $ordenarpor ?>");
                                                    $("#toggle_activo").modal('hide');//ocultamos el modal
                                                    $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
                                                    $('.modal-backdrop').remove();//eliminamos el backdrop del modal
                                                } else if (res === "2") {
                                                    $("#alertabad").hide(500);  
                                                    $("#alertaok").hide(500);
                                                    $("#spanok").text('<?= $msg_resid[2] ?>');
                                                    $("#alertaok").show(500);
                                                    clearTimeout(sessionStorage.getItem("timerid"));
                                                    tvar = setTimeout(function () {

                                                        $("#alertaok").fadeOut(500);
                                                    }, 3000);
                                                    sessionStorage.setItem("timerid", tvar);
                                                    load(1, "<?= $ordenarpor ?>");
                                                    $("#toggle_activo").modal('hide');//ocultamos el modal
                                                    $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
                                                    $('.modal-backdrop').remove();//eliminamos el backdrop del modal
                                                } else if (res === "3") {
                                                    $("#alertabad").hide(500);
                                                    $("#alertaok").hide(500);    
                                                    $("#spanbad").text('<?= $msg_resid[3] ?>');
                                                    $("#alertabad").show(500);
                                                    clearTimeout(sessionStorage.getItem("timerid"));
                                                    tvar = setTimeout(function () {

                                                        $("#alertabad").fadeOut(500);
                                                    }, 3000);
                                                    sessionStorage.setItem("timerid", tvar);
                                                    $("#toggle_activo").modal('hide');//ocultamos el modal
                                                    $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
                                                    $('.modal-backdrop').remove();//eliminamos el backdrop del modal
                                                } else if (res === "4") {
                                                    $("#alertabad").hide(500);
                                                    $("#alertaok").hide(500);    
                                                    $("#spanbad").text('<?= $msg_resid[4] ?>');
                                                    $("#alertabad").show(500);
                                                    clearTimeout(sessionStorage.getItem("timerid"));
                                                    tvar = setTimeout(function () {

                                                        $("#alertabad").fadeOut(500);
                                                    }, 3000);
                                                    sessionStorage.setItem("timerid", tvar);
                                                    $("#toggle_activo").modal('hide');//ocultamos el modal
                                                    $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
                                                    $('.modal-backdrop').remove();//eliminamos el backdrop del modal
                                                } else if (res === "") {
                                                    //$("#alertabad").hide(0);  
                                                    $("#alertaok").hide(500);
                                                    $("#spanbad").text('<?= $msg_error_logueo[1] ?>');
                                                    $("#alertabad").show(500);

                                                    $(".outer_div").html(data).fadeIn('slow');
                                                    $('#loader').html('');
                                                    /*$('#q').focus();*/
                                                    $('[data-toggle="tooltip"]').tooltip({html: true});
                                                    $("#toggle_activo").modal('hide');//ocultamos el modal
                                                    $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
                                                    $('.modal-backdrop').remove();//eliminamos el backdrop del modal
                                                }

                                            }
                                        });

                                        event.preventDefault();
                                    });


</script>
<script>
    $("#guardar_usuario").submit(function (event) {
        //function abm_guardar_usuario() {
        $('#guardar_datos').attr("disabled", true);
        $("#divnuok").hide(500);
        $("#divnuerr").hide(500);
        if (validaFormNU()) {
            var parametros = $(this).serialize();
            $.ajax({
                type: "POST",
                url: "../ajax/nuevo_usuario.php",
                data: parametros,
                success: function (res) {
                    if (res === "1") {
                        $("#divnuerr").hide(500);   
                        $("#usuario").val("");
                        $("#nombre").val("");
                        $("#acceso").val("o");
                        $("#activo").val("s");
                        $("#user_password_1").val("");
                        $("#user_password_2").val("");
                        $('#guardar_datos').attr("disabled", false);
                        $("#spannuok").text('<?= $msg_nuuser[1] ?>');
                        $("#divnuok").show(500);
                        load(1);
                        $("#usuario").focus();
                    } else if (res === "2") {
                        $("#divnuok").hide(500);
                        $('#guardar_datos').attr("disabled", false);
                        $("#spannuerr").text('<?= $msg_nuuser[2] ?>');
                        $("#divnuerr").show(500);
                        $("#usuario").focus();
                    } else if (res === "3") {
                        $("#divnuok").hide(500);
                        $('#guardar_datos').attr("disabled", false);
                        $("#spannuerr").text('<?= $msg_nuuser[3] ?>');
                        $("#divnuerr").show(500);
                    } else if (res === "4") {
                        $("#divnuok").hide(500);
                        $('#guardar_datos').attr("disabled", false);
                        $("#spannuerr").text('<?= $msg_nuuser[4] ?>');
                        $("#divnuerr").show(500);
                    } else if (res === "") {
                        $("#divnuok").hide(500);
                        $('#guardar_datos').attr("disabled", false);
                        $("#spannuerr").text('<?= $msg_error_logueo[1] ?>');
                        $("#divnuerr").show(500);
                    }
                }
            });
        }
        event.preventDefault();
    });

    function validaFormNU() {
        // Campos de texto
        check_dato = $("#usuario").val();

        if (check_dato === "") {
            $("#divnuok").hide(500);
            $("#spannuerr").text("<?= $msg_nuuser[5]["usuario1"] ?>");
            $("#divnuerr").show(500);
            $('#guardar_datos').attr("disabled", false);
            $("#usuario").focus();       // Esta función coloca el foco de escritura del usuario en el campo Nombre directamente.
                    return false;
        } else if (check_dato.length < 8 || check_dato.length > 16) {
            $("#divnuok").hide(500);
            $("#spannuerr").text("<?= $msg_nuuser[5]["usuario2"] ?>");
            $("#divnuerr").show(500);
            $('#guardar_datos').attr("disabled", false);
            $("#usuario").focus();       // Esta función coloca el foco de escritura del usuario en el campo Nombre directamente.
                    return false;
        }
        check_dato = $("#nombre").val();

        if (check_dato === "") {
            $("#divnuok").hide(500);
            $("#spannuerr").text("<?= $msg_nuuser[5]["nombre1"] ?>");
            $("#divnuerr").show(500);
            $('#guardar_datos').attr("disabled", false);
            $("#nombre").focus();       // Esta función coloca el foco de escritura del usuario en el campo Nombre directamente.
                    return false;
        } else if (check_dato.trim().length < 3 || check_dato.trim().length > 50) {
            $("#divnuok").hide(500);
            $("#spannuerr").text("<?= $msg_nuuser[5]["nombre2"] ?>");
            $("#divnuerr").show(500);
            $('#guardar_datos').attr("disabled", false);
            $("#nombre").focus();       // Esta función coloca el foco de escritura del usuario en el campo Nombre directamente.
                    return false;
        }

        check_dato = $("#user_password_1").val();
        check_dato_2 = $("#user_password_2").val();

        if (check_dato === "") {
            $("#divnuok").hide(500);
            $("#spannuerr").text("<?= $msg_nuuser[5]["pass1"] ?>");
            $("#divnuerr").show(500);
            $('#guardar_datos').attr("disabled", false);
            $("#user_password_1").focus();       // Esta función coloca el foco de escritura del usuario en el campo Nombre directamente.
                    return false;
        } else if (check_dato.trim().length < 8) {
            $("#divnuok").hide(500);
            $("#spannuerr").text("<?= $msg_nuuser[5]["pass2"] ?>");
            $("#divnuerr").show(500);
            $('#guardar_datos').attr("disabled", false);
            $("#user_password_1").focus();       // Esta función coloca el foco de escritura del usuario en el campo Nombre directamente.
                    return false;
        } else if (check_dato.trim().length > 16) {
            $("#divnuok").hide(500);
            $("#spannuerr").text("<?= $msg_nuuser[5]["pass3"] ?>");
            $("#divnuerr").show(500);
            $('#guardar_datos').attr("disabled", false);
            $("#user_password_1").focus();       // Esta función coloca el foco de escritura del usuario en el campo Nombre directamente.
                    return false;
        } else if (check_dato !== check_dato_2) {
            $("#divnuok").hide(500);
            $("#spannuerr").text("<?= $msg_nuuser[5]["pass4"] ?>");
            $("#divnuerr").show(500);
            $('#guardar_datos').attr("disabled", false);
            $("#user_password_2").focus();       // Esta función coloca el foco de escritura del usuario en el campo Nombre directamente.
                    return false;
        }

        $("#divnuerr").hide(500);   
        return true; // Si todo está correcto
    }

    $("#editar_usuario").submit(function (event) {
        $('#actualizar_datos').attr("disabled", true);
        $("#diveuok").hide(500);
        $("#diveuerr").hide(500);
        if (validaFormEU()) {
            var parametros = $(this).serialize();
            $.ajax({
                type: "POST",
                url: "../ajax/editar_usuario.php",
                data: parametros,
                success: function (res) {
                    if (res === "1") {
                        $("#diveuerr").hide(500);   
                        $('#actualizar_datos').attr("disabled", false);
                        $("#spaneuok").text('<?= $msg_eduser[1] ?>');
                        $("#diveuok").show(500);
                        load(1);
                    } else if (res === "2") {
                        $("#diveuok").hide(500);
                        $('#actualizar_datos').attr("disabled", false);
                        $("#spaneuerr").text('<?= $msg_eduser[2] ?>');
                        $("#diveuerr").show(500);
                        $("#usuario2").focus();
                    } else if (res === "3") {
                        $("#diveuok").hide(500);
                        $('#actualizar_datos').attr("disabled", false);
                        $("#spaneuerr").text('<?= $msg_eduser[3] ?>');
                        $("#diveuerr").show(500);
                    } else if (res === "4") {
                        $("#diveuok").hide(500);
                        $('#actualizar_datos').attr("disabled", false);
                        $("#spaneuerr").text('<?= $msg_eduser[4] ?>');
                        $("#diveuerr").show(500);
                    } else if (res === "") {
                        $("#diveuok").hide(500);
                        $('#actualizar_datos').attr("disabled", false);
                        $("#spaneuerr").text('<?= $msg_error_logueo[1] ?>');
                        $("#diveuerr").show(500);
                    }
                }
            });
        }
        event.preventDefault();
    });

    function validaFormEU() {
        // Campos de texto
        check_dato = $("#usuario2").val();

        if (check_dato === "") {
            $("#diveuok").hide(500);
            $("#spaneuerr").text("<?= $msg_nuuser[5]["usuario1"] ?>");
            $("#diveuerr").show(500);
            $('#actualizar_datos').attr("disabled", false);
            $("#usuario2").focus();       // Esta función coloca el foco de escritura del usuario en el campo Nombre directamente.
                    return false;
        } else if (check_dato.length < 8 || check_dato.length > 16) {
            $("#diveuok").hide(500);
            $("#spaneuerr").text("<?= $msg_nuuser[5]["usuario2"] ?>");
            $("#diveuerr").show(500);
            $('#actualizar_datos').attr("disabled", false);
            $("#usuario2").focus();       // Esta función coloca el foco de escritura del usuario en el campo Nombre directamente.
                    return false;
        }
        check_dato = $("#nombre2").val();

        if (check_dato === "") {
            $("#diveuok").hide(500);
            $("#spaneuerr").text("<?= $msg_nuuser[5]["nombre1"] ?>");
            $("#diveuerr").show(500);
            $('#actualizar_datos').attr("disabled", false);
            $("#nombre2").focus();       // Esta función coloca el foco de escritura del usuario en el campo Nombre directamente.
                    return false;
        } else if (check_dato.trim().length < 3 || check_dato.trim().length > 50) {
            $("#diveuok").hide(500);
            $("#spaneuerr").text("<?= $msg_nuuser[5]["nombre2"] ?>");
            $("#diveuerr").show(500);
            $('#actualizar_datos').attr("disabled", false);
            $("#nombre2").focus();       // Esta función coloca el foco de escritura del usuario en el campo Nombre directamente.
                    return false;
        }

        $("#diveuerr").hide();   
        return true; // Si todo está correcto
    }


    $("#editar_password").submit(function (event) {
        $('#actualizar_datos3').attr("disabled", true);
        $("#divepok").hide(500);
        $("#diveperr").hide(500);
        var propio = false;
        if ($("#user_id_mod").val() === $("#session_u_id").val()) {
            propio = true;
        }
        if (validaFormCP(propio)) {
            var parametros = $(this).serialize();
            $.ajax({
                type: "POST",
                url: "<?= $hostactual ?>ajax/editar_password.php",
                data: parametros,
                success: function (res) {
                    if (res === "1") {
                        $("#diveperr").hide(500);   
                        $("#user_password_actual3").val("");
                        $("#user_password_new3").val("");
                        $("#user_password_repeat3").val("");
                        $('#actualizar_datos3').attr("disabled", false);
                        $("#spanepok").text('<?= $msg_epuser[1] ?>');
                        $("#divepok").show(500);
                    } else if (res === "2") {
                        $("#divepok").hide(500);
                        $('#actualizar_datos3').attr("disabled", false);
                        $("#spaneperr").text('<?= $msg_epuser[2] ?>');
                        $("#diveperr").show(500);
                    } else if (res === "4") {
                        $("#divepok").hide(500);
                        $('#actualizar_datos3').attr("disabled", false);
                        $("#spaneperr").text('<?= $msg_epuser[4] ?>');
                        $("#diveperr").show(500);
                    } else if (res === "5") {
                        $("#divepok").hide(500);
                        $('#actualizar_datos3').attr("disabled", false);
                        $("#spaneperr").text('<?= $msg_epuser[5] ?>');
                        $("#diveperr").show(500);
                    } else if (res === "") {
                        $("#divepok").hide(500);
                        $("#spaneperr").text('<?= $msg_error_logueo[1] ?>');
                        $('#actualizar_datos3').attr("disabled", false);
                        $("#diveperr").show(500);
                    }
                }
            });
        }
        event.preventDefault();
    });
    function validaFormCP(propio) {
        // Campos de texto

        check_dato = $("#user_password_new3").val();
        check_dato_2 = $("#user_password_repeat3").val();

        if (propio) {
            check_dato_3 = $("#user_password_actual3").val();
            if (check_dato_3 === "") {
                $("#divepok").hide(500);
                $("#diveperr").show(500);
                $("#spaneperr").text("<?= $msg_nuuser[5]["pass5"] ?>");
                $('#actualizar_datos3').attr("disabled", false);
                $("#user_password_actual3").focus();       // Esta función coloca el foco de escritura del usuario en el campo Nombre directamente.
                        return false;
            } else if (check_dato_3.length < 8) {
                $("#divepok").hide(500);
                $("#diveperr").show(500);
                $("#spaneperr").text("<?= $msg_nuuser[5]["pass2"] ?>");
                $('#actualizar_datos3').attr("disabled", false);
                $("#user_password_actual3").focus();       // Esta función coloca el foco de escritura del usuario en el campo Nombre directamente.
                        return false;
            } else if (check_dato_3.length > 16) {
                $("#divepok").hide(500);
                $("#diveperr").show(500);
                $("#spaneperr").text("<?= $msg_nuuser[5]["pass3"] ?>");
                $('#actualizar_datos3').attr("disabled", false);
                $("#user_password_actual3").focus();       // Esta función coloca el foco de escritura del usuario en el campo Nombre directamente.
                        return false;
            }
        }

        if (check_dato === "") {
            $("#divepok").hide(500);
            $("#diveperr").show(500);
            $("#spaneperr").text("<?= $msg_nuuser[5]["pass1"] ?>");
            $('#actualizar_datos3').attr("disabled", false);
            $("#user_password_new3").focus();       // Esta función coloca el foco de escritura del usuario en el campo Nombre directamente.
                    return false;
        } else if (check_dato.length < 8) {
            $("#divepok").hide(500);
            $("#diveperr").show(500);
            $("#spaneperr").text("<?= $msg_nuuser[5]["pass2"] ?>");
            $('#actualizar_datos3').attr("disabled", false);
            $("#user_password_new3").focus();       // Esta función coloca el foco de escritura del usuario en el campo Nombre directamente.
                    return false;
        } else if (check_dato.length > 16) {
            $("#divepok").hide(500);
            $("#diveperr").show(500);
            $("#spaneperr").text("<?= $msg_nuuser[5]["pass3"] ?>");
            $('#actualizar_datos3').attr("disabled", false);
            $("#user_password_new3").focus();       // Esta función coloca el foco de escritura del usuario en el campo Nombre directamente.
                    return false;
        } else if (check_dato !== check_dato_2) {
            $("#divepok").hide(500);
            $("#diveperr").show(500);
            $("#spaneperr").text("<?= $msg_nuuser[5]["pass4"] ?>");
            $('#actualizar_datos3').attr("disabled", false);
            $("#user_password_repeat3").focus();       // Esta función coloca el foco de escritura del usuario en el campo Nombre directamente.
                    return false;
        }

        $("#diveperr").hide(500);   
        return true; // Si todo está correcto
    }

    function get_user_id(id) {
        var id_suser = '<?= $_SESSION['user_id'] ?>';
        $("#user_id_mod").val(id);
        $("#session_u_id").val(id_suser);
        if (id === id_suser) {
            $("#Sector-contraseña-actual").show();
        } else {
            $("#Sector-contraseña-actual").hide();
        }
        $('#user_password_new3').val("");
        $('#user_password_repeat3').val("");
        $('#actualizar_datos3').attr("disabled", false);
        $("#diveperr").hide();
        $("#divepok").hide();
    }

    function obtener_datos(id, idsesion) {
        var eusuario = $("#eusuario" + id).val();
        var enombre = $("#enombre" + id).val();
        var eacceso = $("#eacceso" + id).val();
        var eactivo = $("#eactivo" + id).val();

        $("#mod_id").val(id);
        $("#usuario2").val(eusuario);
        $("#nombre2").val(enombre);
        $("#acceso2").val(eacceso);
        $("#activo2").val(eactivo);

        if (id === idsesion) {
            $('#activo2').attr('disabled', 'disabled');
            $('#acceso2').attr('disabled', 'disabled');
        } else {
            $('#activo2').attr('disabled', false);
            $('#acceso2').attr('disabled', false);
        }
        $("#diveuerr").hide();
        $("#diveuok").hide();
    }
    function limpiar_datos() {
        $("#usuario").val("");
        $("#nombre").val("");
        $("#acceso").val("o");
        $("#activo").val("s");
        $("#user_password_1").val("");
        $("#user_password_2").val("");
        $('#guardar_datos').attr("disabled", false);
        $("#divnuerr").hide();
        $("#divnuok").hide();

    }
    function obtener_datos_toggle(id, activo) {
        $("#tog_id").val(id);
        $("#tog_activo").val(activo);
        if (activo === 's') {
            $("#toggle_user_titulo").text(" Habilitar ");
            $("#toggle_user_texto").text("<?= $msg_toguser['s']; ?>");
        } else {
            $("#toggle_user_titulo").text(" Deshabilitar ");
            $("#toggle_user_texto").text("<?= $msg_toguser['n']; ?>");
        }
        $("#alertabad").hide(500);
        $("#alertaok").hide(500);
    }
    $('#nuevoUsuario').on('shown.bs.modal', function () {
        $('#usuario').focus();
    });
    $('#myModal3').on('shown.bs.modal', function () {
        $('#user_password_new3').focus();
        $('#user_password_actual3').focus();
    });
</script>


</body>
</html>