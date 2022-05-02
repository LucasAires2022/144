<?
include ('../include/is_logged.inc.php');
include ('../include/mensajes.inc.php');


/* Connect To Database */
if (!isset($con)) {
    require_once ("../config/conexion.php"); //Contiene funcion que conecta a la base de datos
}
include ('../include/header.inc.php');
include ('../include/utiles.inc.php');

if ($_SESSION['acceso'] != 's' && $_SESSION['acceso'] != 'a') {
    header("location: /casos/login");
}
/* con_log("inicia session con: ".$_SESSION['orden_abm_residencia']); */
if (isset($_SESSION['orden_abm_derivacion_p']) && $_SESSION['orden_abm_derivacion_p'] != "") {
    $ordenarpor = $_SESSION['orden_abm_derivacion_p'];
    /* con_log("pasa"); */
} else {
    $ordenarpor = "aorden";
}
//con_log($ordenarpor);
?>

<body>

    <?
    include ('../include/navbar.inc.php');
    include ('../modal/cambiar_password.php');
    ?>

    <div class="container-fluid" style="margin-top:20px">
        <div class="row justify-content-center">
            <div class="col-md-11 col-lg-8 mx-auto">
                <div class="card card-signin mb-5">
                    <div class="card-body">
                        <div class="row <? /* bg-custom-light titulo-seccion */ ?>">
                            <div class='col-6'><h5 class="abm-card-title mx-2">Derivación (Violencia de Género)<span id="loader"></span></h5></div>
                            <div class="col-6" style='text-align: right;'>
                                <button onclick="limpiar_datos();" type='button' class="btn btn-custom" data-toggle="modal" data-target="#nuevoderivacion"><i class="fas fa-plus"></i> Agregar</button>
                            </div>
                        </div>
                        <?php
                        include("../modal/registro_derivacion.php");
                        include("../modal/editar_derivacion.php");
                        include("../modal/toggle_derivacion.php");
                        //include("../modal/cambiar_password.php");
                        ?>
                        <form class="form-horizontal" action="javascript:load(1, '<?= $ordenarpor ?>');" role="form" id="datos_derivacion">
                            <div class="form-group row justify-content-center">
                                <div class="col-8 col-md-6" mx-auto>
                                    <div class="input-group">

                                        <input type="text" class="form-control" id="q" placeholder="Buscar derivación" <? /* onkeyup='load(1);' DESHABILITADO PARA EVITAR CONSUMO ALTO DE SERVER */ ?>>
                                        <div class="input-group-append">
                                            <a title="Borrar" href="javascript:limpiar_buscar();" class="input-group-text  append-custom"><i class="fas fa-times"></i></a>
                                        </div>
                                    </div>


                                    <input type="hidden" id="orden_form" name="orden_form" value="<?= $ordenarpor ?>">
                                </div>
                                <div class="col-3 col-md-3" style='text-align: left;'>
                                    <button type="button" class="btn btn-light btn-buscar" onclick='load(1, "<?= $ordenarpor ?>");$("q").focus();'>
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
                                            url: '../ajax/buscar_derivacion_p.php?action=ajax&page=' + page + '&q=' + q + '&orden=' + orden,
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
                                                    /*$('#q').focus();*/
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
                                            url: '../ajax/buscar_derivacion_p.php?action=ajax&page=' + page + '&q=' + q + '&orden=' + orden,
                                            beforeSend: function (objeto) {
                                                $('#loader').html('<img src="../img/ajax-loader.gif">');
                                            },
                                            success: function (data) {
                                                $(".outer_div").html(data).fadeIn('slow');
                                                $('#loader').html('');
                                                /*$('#q').focus();*/
                                                $('[data-toggle="tooltip"]').tooltip({html: true});

                                            }
                                        });
                                    }
                                    function limpiar_buscar() {
                                        $("#q").val("");
                                        load(1);
                                    }


                                    function mover(id, pos, dir, ordenar)
                                    {
                                        var q = $("#q").val();
                                        $.ajax({
                                            type: "GET",
                                            url: "../ajax/mover_derivacion_p.php?pos=" + pos + '&dir=' + dir,
                                            data: "id=" + id, "q": q,
                                            success: function (res) {
                                                load_orden(1, ordenar);
                                            }
                                        });
                                    }

                                    $("#toggle_form").submit(function (event) {
                                        $("#alertabad").hide(500);
                                        $("#alertaok").hide(500);
                                        var parametros = $(this).serialize();
                                        $.ajax({
                                            type: "POST",
                                            url: "../ajax/toggle_derivacion.php",
                                            data: parametros,
                                            success: function (res) {
                                                if (res === "1") {
                                                    $("#alertabad").hide(500);   
                                                    $("#alertaok").hide(500);
                                                    $("#spanok").text('<?= $msg_deriv[1] ?>');
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
                                                    $("#spanok").text('<?= $msg_deriv[2] ?>');
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
                                                    $("#spanbad").text('<?= $msg_deriv[3] ?>');
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
                                                    $("#spanbad").text('<?= $msg_deriv[4] ?>');
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
    $("#guardar_derivacion").submit(function (event) {
        $('#guardar_datos').attr("disabled", true);
        $("#divnrok").hide(500);
        $("#divnrerr").hide(500);
        if (validaFormNV()) {
            var parametros = $(this).serialize();
            $.ajax({
                type: "POST",
                url: "../ajax/nuevo_derivacion_p.php",
                data: parametros,
                success: function (res) {
                    if (res === "1") {
                        $("#divnrerr").hide(500);   
                        $("#descr").val("");
                        $("#activo").val("s");
                        $('#guardar_datos').attr("disabled", false);
                        $("#spannrok").text('<?= $msg_nuderiv[1] ?>');
                        $("#divnrok").show(500);
                        load(1);
                        $("#descr").focus();
                    } else if (res === "3") {
                        $("#divnrok").hide(500);
                        $('#guardar_datos').attr("disabled", false);
                        $("#spannrerr").text('<?= $msg_nuderiv[3] ?>');
                        $("#divnrerr").show(500);
                    } else if (res === "4") {
                        $("#divnrok").hide(500);
                        $('#guardar_datos').attr("disabled", false);
                        $("#spannrerr").text('<?= $msg_nuderiv[4] ?>');
                        $("#divnrerr").show(500);
                    } else if (res === "") {
                        $("#divnrok").hide(500);
                        $('#guardar_datos').attr("disabled", false);
                        $("#spannrerr").text('<?= $msg_error_logueo[1] ?>');
                        $("#divnrerr").show(500);
                        
                    }
                }
            });
        }
        event.preventDefault();
    });

    function validaFormNV() {
        // Campos de texto
        check_dato = $("#descr").val();

        if (check_dato === "") {
            $("#divnrok").hide(500);
            $("#spannrerr").text("<?= $msg_nuderiv[5]["nombre1"] ?>");
            $("#divnrerr").show(500);
            $('#guardar_datos').attr("disabled", false);
            $("#descr").focus();       // Esta función coloca el foco de escritura del usuario en el campo Nombre directamente.
                    return false;
        } else if (check_dato.trim().length < 3 || check_dato.trim().length > 30) {
            $("#divnrok").hide(500);
            $("#spannrerr").text("<?= $msg_nuderiv[5]["nombre2"] ?>");
            $("#divnrerr").show(500);
            $('#guardar_datos').attr("disabled", false);
            $("#descr").focus();       // Esta función coloca el foco de escritura del usuario en el campo Nombre directamente.
                    return false;
        }
        $("#divnrerr").hide(500);   
        return true; // Si todo está correcto
    }

    $("#editar_derivacion").submit(function (event) {
        $('#actualizar_datos').attr("disabled", true);
        $("#diverok").hide(500);
        $("#divererr").hide(500);
        if (validaFormEV()) {
            var parametros = $(this).serialize();
            $.ajax({
                type: "POST",
                url: "../ajax/editar_derivacion_p.php",
                data: parametros,
                success: function (res) {
                    if (res === "1") {
                        $("#divererr").hide(500);   
                        $('#actualizar_datos').attr("disabled", false);
                        $("#spanerok").text('<?= $msg_edderiv[1] ?>');
                        $("#diverok").show(500);
                        load(1);
                    } else if (res === "3") {
                        $("#diverok").hide(500);
                        $('#actualizar_datos').attr("disabled", false);
                        $("#spanererr").text('<?= $msg_edderiv[3] ?>');
                        $("#divererr").show(500);
                    } else if (res === "4") {
                        $("#diverok").hide(500);
                        $('#actualizar_datos').attr("disabled", false);
                        $("#spanererr").text('<?= $msg_edderiv[4] ?>');
                        $("#divererr").show(500);
                    } else if (res === "") {
                        $("#diverok").hide(500);
                        $('#actualizar_datos').attr("disabled", false);
                        $("#spanererr").text('<?= $msg_error_logueo[1] ?>');
                        $("#divererr").show(500);

                    }
                }
            });
        }
        event.preventDefault();
    });

    function validaFormEV() {
        // Campos de texto
        check_dato = $("#descr2").val();

        if (check_dato === "") {
            $("#diverok").hide(500);
            $("#spanererr").text("<?= $msg_nuderiv[5]["nombre1"] ?>");
            $("#divererr").show(500);
            $('#actualizar_datos').attr("disabled", false);
            $("#descr").focus();       // Esta función coloca el foco de escritura del usuario en el campo Nombre directamente.
                    return false;
        } else if (check_dato.trim().length < 3 || check_dato.trim().length > 30) {
            $("#diverok").hide(500);
            $("#spanererr").text("<?= $msg_nuderiv[5]["nombre2"] ?>");
            $("#divererr").show(500);
            $('#actualizar_datos').attr("disabled", false);
            $("#descr").focus();       // Esta función coloca el foco de escritura del usuario en el campo Nombre directamente.
                    return false;
        }
        $("#divererr").hide(500);   
        return true; // Si todo está correcto
    }

    function obtener_datos(id) {
        var edescr = $("#edescr" + id).val();
        var eactivo = $("#eactivo" + id).val();
        $("#mod_id").val(id);
        $("#descr2").val(edescr);
        $("#activo2").val(eactivo);
        $("#divererr").hide();
        $("#diverok").hide();
    }

    function limpiar_datos() {
        $("#descr").val("");
        $("#activo").val("s");
        $('#guardar_datos').attr("disabled", false);
        $("#divnrerr").hide();
        $("#divnrok").hide();

    }
    function obtener_datos_toggle(id, activo) {
        $("#tog_id").val(id);
        $("#tog_activo").val(activo);
        if (activo === 's') {
            $("#toggle_titulo").text(" Habilitar ");
            $("#toggle_texto").text("<?= $msg_togderiv['s']; ?>");
        } else {
            $("#toggle_titulo").text(" Deshabilitar ");
            $("#toggle_texto").text("<?= $msg_togderiv['n']; ?>");
        }
        $("#alertabad").hide(500);
        $("#alertaok").hide(500);
    }
    $('#nuevoderivacion').on('shown.bs.modal', function () {
        $('#descr').focus();
    });

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
    $('#myModal3').on('shown.bs.modal', function () {
        $('#user_password_new3').focus();
        $('#user_password_actual3').focus();
    });
</script>


</body>
</html>