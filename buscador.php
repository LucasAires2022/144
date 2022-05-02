<?
include ('include/is_logged.inc.php');
include ('include/mensajes.inc.php');


/* Connect To Database */
if (!isset($con)) {
    require_once ("config/conexion.php"); //Contiene funcion que conecta a la base de datos
}
include ('include/header.inc.php');
include ('include/utiles.inc.php');

/* if ($_SESSION['acceso'] != 's' && $_SESSION['acceso'] != 'a') {
  header("location: /casos/login");
  } */
/* con_log("inicia session con: ".$_SESSION['orden_abm_residencia']); */
if (isset($_SESSION['orden_buscador']) && $_SESSION['orden_buscador'] != "") {
    $ordenarpor = $_SESSION['orden_buscador'];
    /* con_log("pasa"); */
    if ($ordenarpor == "idcaso") {
        $ordenarpor = "aidcaso";
    }
} else {
    $ordenarpor = "didcaso";
}
//con_log($ordenarpor);

$usuario = $_SESSION['usuario'];
$lectornacion = "144nacion";
?>

<body>

    <?
    include ('include/navbar.inc.php');
    include ('modal/cambiar_password.php');
    ?>

    <div class="container-fluid" style="margin-top:20px">
        <div class="row justify-content-center">
            <div class="col-md-11 col-lg-11 mx-auto">
                <div class="card card-signin mb-5">
                    <div class="card-body">
                        <div class="row <? /* bg-custom-light titulo-seccion */ ?>">
                            <div class='col-6'><h5 class="abm-card-title mx-2">Buscador <span id="loader"></span></h5></div>
                        </div>
                        <?php
                        //include("modal/registro_residencia.php");
                        //include("modal/editar_residencia.php");
                        include("modal/toggle_caso.php");
                        include("modal/recuperar_caso.php");
                        ?>
                        <form class="form-horizontal" action="javascript:load(1, '<?= $ordenarpor ?>');" role="form" id="datos_buscador">


                            <div class="form-row">
                                <div class="form-group col-md-3" style="margin-top:2px; margin-bottom:3px">
                                    <label for="Motivo" class="col-form-label text-right">Motivo de la consulta:</label>
                                    <div class="input-group">
                                        <select class="selectpicker form-control" data-live-search="true" data-size="8" id="Motivo" name="Motivo">
                                            <?
                                            /*if ($usuario == $lectornacion) {

                                                $sql = "SELECT * FROM motivo_consulta";
                                                $query = mysqli_query($con, $sql);

                                                while ($row = mysqli_fetch_array($query)) {

                                                    $valor = $row['descr'];
                                                    $guardar = $row['id'];
                                                    $formularios[$guardar] = $valor;
                                                    if ($row['id'] == 1) {
                                                        ?>
                                                        <option value="<?= $guardar ?>" selected><?= $valor ?></option>
                                                        <?
                                                    }
                                                }
                                            } else {*/
                                                ?>
                                                <option value="0" selected>-</option>
                                                <?
                                                $sql = "SELECT * FROM motivo_consulta";
                                                $query = mysqli_query($con, $sql);

                                                while ($row = mysqli_fetch_array($query)) {

                                                    $valor = $row['descr'];
                                                    $guardar = $row['id'];
                                                    $formularios[$guardar] = $valor;
                                                    ?>
                                                    <option value="<?= $guardar ?>"><?= $valor ?></option>
                                                    <?
                                                }
                                            /*}*/
                                            ?>
                                        </select>
                                        <? if ($usuario != $lectornacion) { ?>
                                            <div class="input-group-append">
                                                <a title="Borrar" href="javascript:limpiar_select('Motivo')" class="input-group-text  append-custom"><i class="fas fa-times"></i></a>
                                            </div>
                                        <? } ?>
                                    </div>
                                    <? /* <input type="hidden" id="ValselectMotivo" name="ValselectMotivo" value="0"> */ ?>
                                </div>
                                <div class="form-group col-md-3" style="margin-top:2px; margin-bottom:3px">
                                    <label for="Origen" class="col-form-label text-right">Origen del llamado:</label>
                                    <div class="input-group">
                                        <select class="selectpicker form-control" data-live-search="true"ese es data-size="8" id="Origen" name="Origen">
                                            <?
                                            if ($usuario == $lectornacion) {

                                                $sql = "SELECT * FROM origen_llamado  WHERE activo = 's' order by orden asc";
                                                $query = mysqli_query($con, $sql);
                                                while ($row = mysqli_fetch_array($query)) {
                                                    $valor = $row['origen'];
                                                    $guardar = $row['id'];
                                                    if ($row['id'] == 2) {
                                                        ?>
                                                        <option value="<?= $guardar ?>" selected><?= $valor ?></option>
                                                        <?
                                                    }
                                                }
                                            } else {
                                                ?>

                                                <option value="0" selected>-</option>
                                                <?
                                                $sql = "SELECT * FROM origen_llamado  WHERE activo = 's' order by orden asc";
                                                $query = mysqli_query($con, $sql);
                                                while ($row = mysqli_fetch_array($query)) {
                                                    $valor = $row['origen'];
                                                    $guardar = $row['id'];
                                                    ?>
                                                    <option value="<?= $guardar ?>"><?= $valor ?></option>
                                                    <?
                                                }
                                            }
                                            ?>
                                        </select>
                                        <? if ($usuario != $lectornacion) { ?>
                                            <div class="input-group-append">
                                                <a title="Borrar" href="javascript:limpiar_select('Origen')" class="input-group-text  append-custom"><i class="fas fa-times"></i></a>
                                            </div>
                                        <? } ?>
                                    </div>
                                    <? /* <input type="hidden" id="ValselectOrigen" name="ValselectOrigen" value="0"> */ ?>

                                </div>
                                <div class="form-group col-md-3" style="margin-top:2px; margin-bottom:3px">
                                    <label for="FechaDesde" class="col-form-label">Fecha desde:</label>
                                    <div class="input-group">
                                        <input class="form-control" type="date" value="" id="FechaDesde" name="FechaDesde">
                                        <div class="input-group-append">
                                            <a title="Borrar" href="javascript:$('#FechaDesde').val('');$('#FechaDesde').focus();" class="input-group-text  append-custom"><i class="fas fa-times"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-3" style="margin-top:2px; margin-bottom:3px">
                                    <label for="FechaHasta" class="col-form-label">Fecha hasta:</label>
                                    <div class="input-group">
                                        <input class="form-control" type="date" value="" id="FechaHasta" name="FechaHasta">
                                        <div class="input-group-append">
                                            <a title="Borrar" href="javascript:$('#FechaHasta').val('');$('#FechaHasta').focus();" class="input-group-text  append-custom"><i class="fas fa-times"></i></a>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-3" style="margin-top:2px; margin-bottom:3px">
                                    <label class="col-form-label text-right" for="NumCaso">Nº de caso:</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" id="NumCaso" name="NumCaso" placeholder="Nº de caso" maxlength="30" min="1">
                                        <div class="input-group-append">
                                            <a title="Borrar" href="javascript:$('#NumCaso').val('');$('#NumCaso').focus();" class="input-group-text  append-custom"><i class="fas fa-times"></i></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-3" style="margin-top:2px; margin-bottom:3px">
                                    <label class=" col-form-label text-right" for="NumeroDoc">Nº de documento:</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="NumeroDoc" name="NumeroDoc" placeholder="Nº de documento" maxlength="11">
                                        <div class="input-group-append">
                                            <a title="Borrar" href="javascript:$('#NumeroDoc').val('');$('#NumeroDoc').focus();" class="input-group-text  append-custom"><i class="fas fa-times"></i></a>
                                        </div>
                                    </div>
                                </div>  
                                <div class="form-group col-md-3" style="margin-top:2px; margin-bottom:3px">
                                    <label class="col-form-label text-right" for="Residencia">Lugar de Residencia:</label>
                                    <div class="input-group">
                                        <select class="selectpicker form-control" data-live-search="true" data-size="8" data-live-search="true" id="Residencia" name="Residencia"  >
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
                                        <div class="input-group-append">
                                            <a title="Borrar" href="javascript:limpiar_select('Residencia')" class="input-group-text  append-custom"><i class="fas fa-times"></i></a>
                                        </div>
                                    </div>

                                </div>
				<div class="form-group col-md-3" style="margin-top:2px; margin-bottom:3px">
                                    <label class="col-form-label text-right" for="Residencia">Usuario:</label>
                                    <div class="input-group">
                                        <select class="selectpicker form-control" data-live-search="true" data-size="8" data-live-search="true" id="Usuario" name="Usuario"  >
                                            <option value="0" selected>-</option>
                                            <?
                                            $sql = "SELECT * FROM usuarios WHERE activo = 's' order by usuario asc";
                                            $query = mysqli_query($con, $sql);
                                            while ($row = mysqli_fetch_array($query)) {
                                                $valor = $row['usuario'];
                                                $guardar = $row['id'];
                                                ?>
                                                <option value="<?= $guardar ?>"><?= $valor ?></option>
                                                <?
                                            }
                                            ?>
                                        </select>
                                        <div class="input-group-append">
                                            <a title="Borrar" href="javascript:limpiar_select('Usuario')" class="input-group-text  append-custom"><i class="fas fa-times"></i></a>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="form-row mb-3">
                                <div class="form-group col-md-4" style="margin-top:2px; margin-bottom:3px">
                                    <label class="col-form-label text-right" for="Apellido">Apellido:</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="Apellido" name="Apellido" placeholder="Apellido" maxlength="30">
                                        <div class="input-group-append">
                                            <a title="Borrar" href="javascript:$('#Apellido').val('');$('#Apellido').focus();" class="input-group-text  append-custom"><i class="fas fa-times"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-4" style="margin-top:2px; margin-bottom:3px">
                                    <label class="col-form-label text-right" for="Nombre">Nombre:</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="Nombre" name="Nombre" placeholder="Nombre" maxlength="30">
                                        <div class="input-group-append">
                                            <a title="Borrar" href="javascript:$('#Nombre').val('');$('#Nombre').focus();" class="input-group-text  append-custom"><i class="fas fa-times"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-4" style="margin-top:2px; margin-bottom:3px">
                                    <label class=" col-form-label text-right" for="q">Texto a buscar:</label>
                                    <div class="input-group">

                                        <input type="text" class="form-control" id="q" name="q" placeholder="Texto a buscar" <? /* onkeyup='load(1);' DESHABILITADO PARA EVITAR CONSUMO ALTO DE SERVER */ ?>>
                                        <div class="input-group-append">
                                            <a title="Borrar" href="javascript:$('#q').val('');$('#q').focus();" class="input-group-text  append-custom"><i class="fas fa-times"></i></a>
                                        </div>

                                    </div>


                                    <input type="hidden" id="orden_form" name="orden_form" value="<?= $ordenarpor ?>">
                                </div>

                            </div>
                            <div class="form-row">
                                <div class="form-group col-5 text-right">
                                    <button type="button" class="btn btn-light btn-buscar" style="width:200px;" onclick="limpiar_buscador()">
                                        <i class="fas fa-times"></i> Limpiar busqueda</button>
                                </div>
                                <div class="col-2"></div>
                                <div class="form-group col-5 text-left">
                                    <button type="submit" class="btn btn-custom" style="width:200px;" onclick='load(1, "<?= $ordenarpor ?>");$("q").focus();'>
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
<script src="<?= $hostactual ?>js/bootstrap-select.js"></script>

<script>
                                    $('.selectpicker').selectpicker({
                                        style: 'bs-multiple-select'
                                    });
                                    function limpiar_select(nombre) {
                                        $('#' + nombre).selectpicker('val', 0);
                                        $('#' + nombre).selectpicker('refresh');
                                        $(".bootstrap-select button[data-id='" + nombre + "'").focus();
                                    }

                                    function limpiar_buscador() {
                                        /*$('#q').val('');
                                         $('#Nombre').val('');
                                         $('#Apellido').val('');
                                         $('#NumeroDoc').val('');*/
                                        $('.form-control').val('');
                                        $('.selectpicker').selectpicker('val', 0);
                                        $('.selectpicker').selectpicker('refresh');
                                    }

                                    $(document).ready(function () {
                                        var ordenado = '<?= $ordenarpor ?>';
                                        if (ordenado === "") {
                                            load(1);
                                        } else {
                                            load_orden(1, ordenado);
                                        }

                                    });

                                    function load(page) {
                                        var orden = $("#orden_form").val();
                                        $("#loader").fadeIn('slow');
                                        var parametros = $('#datos_buscador').serialize();
                                        $.ajax({
                                            url: 'ajax/buscar_caso.php?action=ajax&page=' + page + '&orden=' + orden,
                                            data: parametros,
                                            beforeSend: function (objeto) {
                                                $('#loader').html('<img src="img/ajax-loader.gif">');
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
                                        $("#orden_form").val(orden);
                                        $("#loader").fadeIn('slow');
                                        var parametros = $('#datos_buscador').serialize();
                                        $.ajax({
                                            url: 'ajax/buscar_caso.php?action=ajax&page=' + page + '&orden=' + orden,
                                            data: parametros,
                                            beforeSend: function (objeto) {
                                                $('#loader').html('<img src="img/ajax-loader.gif">');
                                            },
                                            success: function (data) {
                                                if (data === "") {
                                                    // $("#alertabad").hide(0);  
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

                                    function desbloquear_caso(id) {
                                        $("#staticNCaso").val(id);
                                        $("#toggle_texto").text("Se desbloqueará el caso Nº " + id + " ¿Está seguro?");
                                        $("#alertabad").hide(500);
                                        $("#alertaok").hide(500);
                                    }

                                    $("#toggle_form").submit(function (event) {
                                        $("#alertabad").hide(500);
                                        $("#alertaok").hide(500);
                                        var parametros = $(this).serialize();
                                        $.ajax({
                                            type: "POST",
                                            url: "<?= $hostactual ?>ajax/desbloquear-caso.php",
                                            data: parametros,
                                            success: function (res) {
                                                if (res === "ok") {
                                                    $("#alertabad").hide(500);   
                                                    $("#alertaok").hide(500);
                                                    $("#spanok").text('<?= $msg_caso_desbloq[1] ?>');
                                                    $("#alertaok").show(500);
                                                    clearTimeout(sessionStorage.getItem("timerid"));
                                                    tvar = setTimeout(function () {

                                                        $("#alertaok").fadeOut(500);
                                                    }, 3000);
                                                    sessionStorage.setItem("timerid", tvar);
                                                    load(1);
                                                    $("#toggle_activo").modal('hide');//ocultamos el modal
                                                    $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
                                                    $('.modal-backdrop').remove();//eliminamos el backdrop del modal
                                                } else if (res === "error") {
                                                    $("#alertabad").hide(500);  
                                                    $("#alertaok").hide(500);
                                                    $("#spanbad").text('<?= $msg_caso_desbloq[2] ?>');
                                                    $("#alertabad").show(500);
                                                    clearTimeout(sessionStorage.getItem("timerid"));
                                                    tvar = setTimeout(function () {

                                                        $("#alertabad").fadeOut(500);
                                                    }, 3000);
                                                    sessionStorage.setItem("timerid", tvar);
                                                    load(1, "<?= $ordenarpor ?>");
                                                    $("#toggle_activo").modal('hide');//ocultamos el modal
                                                    $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
                                                    $('.modal-backdrop').remove();//eliminamos el backdrop del modal
                                                }

                                            }
                                        });

                                        event.preventDefault();
                                    });
                                    function recuperar_caso(id) {
                                        $("#NCaso").val(id);
                                        $("#recuperar_texto").text("Desea recuperar el caso Nº " + id + "?");
                                        $("#alertabad").hide(500);
                                        $("#alertaok").hide(500);
                                    }

                                    $("#recuperar_form").submit(function (event) {
                                        $("#alertabad").hide(500);
                                        $("#alertaok").hide(500);
                                        var parametros = $(this).serialize();
                                        $.ajax({
                                            type: "POST",
                                            url: "<?= $hostactual ?>ajax/recuperar-caso.php",
                                            data: parametros,
                                            success: function (res) {
                                                if (res === "ok") {
                                                    $("#alertabad").hide(500);   
                                                    $("#alertaok").hide(500);
                                                    $("#spanok").text('<?= $msg_recuperar_caso[1] ?>');
                                                    $("#alertaok").show(500);
                                                    clearTimeout(sessionStorage.getItem("timerid"));
                                                    tvar = setTimeout(function () {

                                                        $("#alertaok").fadeOut(500);
                                                    }, 3000);
                                                    sessionStorage.setItem("timerid", tvar);
                                                    load(1);
                                                    $("#recuperar_caso").modal('hide');//ocultamos el modal
                                                    $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
                                                    $('.modal-backdrop').remove();//eliminamos el backdrop del modal
                                                } else if (res === "error") {
                                                    $("#alertabad").hide(500);  
                                                    $("#alertaok").hide(500);
                                                    $("#spanbad").text('<?= $msg_recuperar_caso[2] ?>');
                                                    $("#alertabad").show(500);
                                                    clearTimeout(sessionStorage.getItem("timerid"));
                                                    tvar = setTimeout(function () {

                                                        $("#alertabad").fadeOut(500);
                                                    }, 3000);
                                                    sessionStorage.setItem("timerid", tvar);
                                                    load(1, "<?= $ordenarpor ?>");
                                                    $("#recuperar_caso").modal('hide');//ocultamos el modal
                                                    $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
                                                    $('.modal-backdrop').remove();//eliminamos el backdrop del modal
                                                }

                                            }
                                        });

                                        event.preventDefault();
                                    });



</script>
</body>
</html>