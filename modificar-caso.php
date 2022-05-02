<?
include ('include/is_logged.inc.php');
include ('include/mensajes.inc.php');
include ('include/utiles.inc.php');

if (!isset($_GET["id"])) {
    header("location: /casos/buscador");
}
$id_caso = $_GET["id"];

/* Connect To Database */
if (!isset($con)) {
    require_once ("config/conexion.php"); //Contiene funcion que conecta a la base de datos
}


$sqljoin = "SELECT c.cancelado as ccancelado, c.id as idcaso, c.consultante_id as cconsultid, c.victima_id as cvictid, c.agresor_id as cagrid, c.fecha_fin as fechafin, c.denuncia as cdenuncia, c.armas as carmas, c.cubre_gastos as cgastos, c.socializo_situacion as csocializo, c.donde_recurrir as crecurrir, c.discapacidad as cdiscap, c.localizable_agresor as clocalizable, c.amenazas as camenazas, c.escolarizado as cescolarizado, c.editando as cedit, c.editpor as ceditpor, c.motivo_problematica_id as cmotivollp, c.motivo_varios_id as cmotivollv, c.datos_ubicacion as cdatosub, c.operador_911 as coperador, "
        . "o.origen as oorigen, "
        . "m.descr as mdescr, m.formulario as mform, "
        . "v.apellido as vapellido, v.nombre as vnombre, v.tipo_documento as vtipodoc, v.documento as vdoc, v.edad as vedad, v.lugar_residencia_id as vresid, v.calle as vcalle, v.altura as valtura, v.piso_dpto as vpisodep, v.tipo_telefono as vtipotel, v.numero_telefono as vntel, v.identidad_genero_id as vgenero, v.nacionalidad_id as vnacion, v.situacion_conyugal_id as vconyuge, v.convive_agresor as vconvive, v.convive_meses as vmeses, v.tenencia_vivienda_id as vvivienda, v.nivel_educativo as vneduc, v.hijos as vhijos, "
        . "t.apellido as tapellido, t.nombre as tnombre, t.tipo_documento as ttipodoc, t.documento as tdoc, t.edad as tedad,t.lugar_residencia_id as tresid, t.calle as tcalle, t.altura as taltura, t.piso_dpto as tpisodep, t.tipo_telefono as ttipotel, t.numero_telefono as tntel, t.identidad_genero_id as tgenero, t.vinculo_consultante_id as tvinculo, t.situacion_conyugal_id as tconyuge, "
        . "a.apellido as aapellido, a.nombre as anombre, a.vinculo_agresor_id as avinculo, a.tipo_documento as atipodoc, a.documento as adoc, a.edad as aedad, a.nacionalidad_id as anacion, a.identidad_genero_id as agenero, a.lugar_residencia_id as aresid, a.adicciones as aadiccion, a.adicciones_observ as aadicobs, "
        . "u.usuario as user "
        . "FROM caso c "
        . "LEFT JOIN origen_llamado o ON o.id = c.origen_id "
        . "LEFT JOIN motivo_consulta m ON m.id = c.motivo_consulta_id "
        . "LEFT JOIN victima v ON v.id = c.victima_id "
        . "LEFT JOIN consultante t ON t.id = c.consultante_id "
        . "LEFT JOIN agresor a ON a.id = c.agresor_id "
        . "LEFT JOIN usuarios u ON u.id = c.usuario "
        . "WHERE c.id ='$id_caso'";
$sqljoincount = "SELECT DISTINCT count(*) AS numrows "
        . "FROM caso c "
        . "LEFT JOIN origen_llamado o ON o.id = c.origen_id "
        . "LEFT JOIN motivo_consulta m ON m.id = c.motivo_consulta_id "
        . "LEFT JOIN victima v ON v.id = c.victima_id "
        . "LEFT JOIN consultante t ON t.id = c.consultante_id "
        . "LEFT JOIN agresor a ON a.id = c.agresor_id "
        . "LEFT JOIN usuarios u ON u.id = c.usuario "
        . "WHERE c.id ='$id_caso'";
$count_query = mysqli_query($con, $sqljoincount);
//con_log($sqljoin . $sWhere);
$row = mysqli_fetch_array($count_query);
$numrows = $row['numrows'];

$query = mysqli_query($con, $sqljoin);
if ($numrows == 1) {
    //con_log($numrows);
    $caso = mysqli_fetch_array($query);
} else {
    header("location: /casos/buscador");
}
$enuso = false;
if ($caso['cedit'] == "s" && $caso['ceditpor'] <> $_SESSION['user_id']) {
    header("location: /casos/caso-$id_caso");
}
$desbloq_al_salir = "si";
if ($caso['cedit'] == "s" && $caso['ceditpor'] == $_SESSION['user_id']) {
    $desbloq_al_salir = "no";
}
if ($_SESSION['acceso'] == 'l') {
    header("location: /casos/caso-$id_caso");
}
$sqlarray = "SELECT * FROM motivo_consulta";
$queryarray = mysqli_query($con, $sqlarray);
while ($row = mysqli_fetch_array($queryarray)) {
    $formularios[$row['formulario']] = $row['descr'];
}

include ('include/header.inc.php');
?>

<body>
    <?
    include ('include/navbar.inc.php');
    include ('modal/cambiar_password.php');
    ?>

    <div class="container-fluid" style="margin-top:20px">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-10 col-xl-8 mx-auto">
                <div class="card card-signin mb-5">
                    <div class="card-body">
                        <div class="row <? /* bg-custom-light titulo-seccion */ ?>">
                            <div class='col-12'><h5 class="abm-card-title mx-2">Modificar Caso <span id="loader"></span></h5></div>
                        </div>
                        <?
                        if ($guardado || $descartado) {
                            ?>
                            <div id="alertagd" class="alert alert-success" style="display:block;" role="alert">
                                <button type="button" class="close"  onclick="javascript:$('#alertagd').hide(500)">&times;</button>
                                <strong>Aviso!</strong>
                                <span><?
                                    if ($guardado) {
                                        echo $msg_guardar_caso[1];
                                    } else if ($descartado) {
                                        echo $msg_descartar_caso[1];
                                    }
                                    ?></span>
                            </div>
                            <script>
                                setTimeout(function () {
                                    $('#alertagd').hide(500);
                                }, 4000); // <-- time in milliseconds
                            </script>
                            <?
                        }

                        include("modal/toggle_descartar_caso.php");
                        ?>

                        <form class="form-horizontal" role="form" method="post" id="form_nuevo_caso" name="form_modificar_caso">
                            <input type="hidden" id="usuario" name="usuario" value="<?= $_SESSION['user_id'] ?>">
                            <input type="hidden" id="bloqueado" name="bloqueado" value="<?= $caso['cedit'] ?>">
                            <input type="hidden" id="editpor" name="editpor" value="<?= $caso['ceditpor'] ?>">
                            <input type="hidden" id="desbloqalsalir" name="desbloqalsalir" value="<?= $desbloq_al_salir ?>">
                            <div class="col-12">
                                <div class="form-group row" style="padding-left:15px;">
                                    <label for="staticNCaso" class="col-form-label">Nº de caso: &nbsp;</label>
                                    <div class="" style="display:inline;">
                                        <input type="text" readonly class="form-control-plaintext" style="line-height: 1.1;" name="staticNCaso" id="staticNCaso" value="<?= $caso['idcaso'] ?>" tabindex="-1">
                                    </div>
                                </div>

                                <div class="form-row">

                                    <div class="form-group col-md-4">
                                        <label for="selectOrigen" class="col-form-label text-right">Origen del llamado:</label>
                                        <select class="selectpicker form-control" disabled data-live-search="true"ese es data-size="8" id="selectOrigen" name="selectOrigen">
                                            <option value="" selected><?= $caso['oorigen'] ?></option>
                                        </select>
                                        <input type="hidden" id="ValselectOrigen" name="ValselectOrigen" value="0">

                                    </div>
                                    <div class="form-group col-md-4 text-center">
                                        <label for="toggleEmergencia" class="col-form-label text-right">Emergencia:</label>

                                        <div>
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                <button class="btn btn-option <?
                                                if ($caso['mdescr'] == "Emergencia") {
                                                    echo "active";
                                                }
                                                ?>" id="toggleEmergenciaSi" disabled  onclick="javascript:mostrar_emergencia()" style="width: 50px">
                                                    <input type="radio" name="toggleEmergenciaSi"  autocomplete="off"> Si
                                                </button>

                                                <button class="btn btn-option <?
                                                if ($caso['mdescr'] != "Emergencia") {
                                                    echo "active";
                                                }
                                                ?>" id="toggleEmergenciaNo" disabled onclick="javascript:ocultar_emergencia()" style="width: 50px">
                                                    <input type="radio" name="toggleEmergenciaNo" autocomplete="off"> No
                                                </button>

                                            </div>
                                            <input type="hidden" id="toggleEmergencia" name="toggleEmergencia" value="<?
                                            if ($caso['mdescr'] != "Emergencia") {
                                                echo "No";
                                            } else {
                                                echo "Si";
                                            }
                                            ?>">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="selectMotivo" class="col-form-label text-right">Motivo de la consulta:</label>
                                        <select class="selectpicker form-control" disabled data-live-search="true" data-size="8" id="selectMotivo" name="selectMotivo">
                                            <option value="<?= $caso['mform'] ?>" selected><?= $caso['mdescr'] ?></option>
                                        </select>
                                        <input type="hidden" id="ValselectMotivo" name="ValselectMotivo" value="0">
                                    </div>
                                </div>
                            </div>
                            <div id="resultados" class="container-fluid">
                                <div id="alertaok" class="alert alert-success" style="display:none;" role="alert">
                                    <button type="button" class="close"  onclick="javascript:$('#alertaok').hide(500);$('#alertaok2').hide(500);">&times;</button>
                                    <strong>Aviso!</strong>
                                    <span id="spanok"></span>
                                </div>

                                <div id="alertabad" class="alert alert-danger" style="display:none;" role="alert">
                                    <button type="button" class="close"  onclick="javascript:$('#alertabad').hide(500);$('#alertabad2').hide(500);">&times;</button>
                                    <strong>Error!</strong> 
                                    <span id="spanbad"></span>
                                </div>

                            </div>
                            <div class="botones-form container-fluid">


                                <div class="form-row">

                                    <div class="form-group col-6 text-left">
                                        <button type="button" class="btn btn-custom mb-1" style="width:130px;" onclick="javascript:cancelar();" id="cancelar_caso">Volver</button>
                                        <?if (/*$uacceso == 's' || */$uacceso == 'a'){?>
                                        <button type="button" class='btn btn-custom mb-1' data-toggle="modal" data-target="#toggle_activo" title='Descartar caso' id="descartar_caso" >Descartar caso</button>
                                        <?}?>

                                    </div>
                                    <div class="form-group col-6 text-right">
                                        <button type="button" onclick="javascript:guardar_continuar();" class="btn btn-custom  mb-1" id="guardar_caso_c">Guardar y continuar</button>
                                        <button type="button" onclick="javascript:guardar_cerrar();" class="btn btn-custom mb-1"  id="guardar_caso">Guardar y cerrar</button>
                                    </div>
                                </div>
                            </div>
                            <?
                            if ($caso['mform'] == "B") {
                                include("include/modificar-b.inc.php");
                            } else if ($caso['mform'] == "C") {
                                include("include/modificar-c.inc.php");
                            } else if ($caso['mform'] == "D") {
                                include("include/modificar-d.inc.php");
                            } else if ($caso['mform'] == "E") {
                                include("include/modificar-e.inc.php");
                            } else if ($caso['mform'] == "F") {
                                include("include/modificar-f.inc.php");
                            }
                            ?>
                            <div id="resultados2" class="container-fluid">

                                <div id="alertaok2" class="alert alert-success" style="display:none;" role="alert">
                                    <button type="button" class="close"  onclick="javascript:$('#alertaok').hide(500);$('#alertaok2').hide(500);">&times;</button>
                                    <strong>Aviso!</strong>
                                    <span id="spanok2"></span>
                                </div>
                                <div id="alertabad2" class="alert alert-danger" style="display:none;" role="alert">
                                    <button type="button" class="close"  onclick="javascript:$('#alertabad').hide(500);$('#alertabad2').hide(500);">&times;</button>
                                    <strong>Error!</strong> 
                                    <span id="spanbad2"></span>
                                </div>

                            </div>
                            <div class="botones-form container-fluid">


                                <div class="form-row">
                                    <div class="form-group col-6 text-left">
                                        <button type="button" class="btn btn-custom mb-1" style="width:130px;" onclick="javascript:cancelar();" id="cancelar_caso2">Volver</button>
                                        <?if (/*$uacceso == 's' ||*/ $uacceso == 'a'){?>
                                        <button type="button" class='btn btn-custom mb-1' data-toggle="modal" data-target="#toggle_activo" title='Descartar caso' id="descartar_caso2" >Descartar caso</button>
                                        <?}?>

                                    </div>
                                    <div class="form-group col-6 text-right mb-1">
                                        <button type="button" class="btn btn-custom mb-1" onclick="javascript:guardar_continuar();" id="guardar_caso_c2">Guardar y continuar</button>
                                        <button type="button" class="btn btn-custom mb-1" onclick="javascript:guardar_cerrar();" id="guardar_caso2">Guardar y cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

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
<script src="<?= $hostactual ?>js/mod-formularios.js?2021"></script>

<script>
                                            window.onbeforeunload = function (evt) {
                                                if ($("#bloqueado").val() === "s") {
                                                    if ($("#desbloqalsalir").val() === "si") {
                                                        const endpoint = '<?= $hostactual ?>ajax/desbloquear-caso.php';
                                                        var formData = new FormData();
                                                        formData.append('staticNCaso', $('#staticNCaso').val());
                                                        navigator.sendBeacon(endpoint, formData);
                                                    }
                                                }
                                            };

                                            $(document).ready(function () {
                                                if ($("#bloqueado").val() === "n") {
                                                    //alert("n");
                                                    $.ajax({
                                                        type: 'POST',
                                                        url: "<?= $hostactual ?>ajax/bloquear-caso.php",
                                                        async: false,
                                                        data: ({staticNCaso: $('#staticNCaso').val(), usuario: $('#usuario').val()}),
                                                        success: function (res) {
                                                            //alert(res);
                                                            if (res === 'ok') {
                                                                $("#bloqueado").val('s');
                                                            }
                                                        }

                                                    });
                                                    //    window.location.replace('<?= $hostactual ?>nuevo-caso');
                                                    //return "Guarde o descarte el caso antes de salir.";
                                                    //} //else {
                                                    //$(window).off("beforeunload");
                                                }
                                            });



                                            function cancelar() {
                                                if ($("#bloqueado").val() === "s") {
                                                    if ($("#desbloqalsalir").val() === "si") {
                                                        $.ajax({
                                                            type: 'POST',
                                                            url: "<?= $hostactual ?>ajax/desbloquear-caso.php",
                                                            async: false,
                                                            data: ({staticNCaso: $('#staticNCaso').val(), usuario: $('#usuario').val()})
                                                        });

                                                        //return "Guarde o descarte el caso antes de salir.";
                                                    }
                                                }
                                                $(window).off("beforeunload");
                                                window.location.replace('<?= $hostactual ?>buscador');

                                            }
                                            function descartar() {
                                                $("#alertaok").hide(500);
                                                $("#alertaok2").hide(500);
                                                $("#alertabad").hide(500);
                                                $("#alertabad2").hide(500);
                                                $('#guardar_caso_c').attr('disabled', true);
                                                $('#guardar_caso').attr('disabled', true);
                                                $('#guardar_caso_c2').attr('disabled', true);
                                                $('#guardar_caso2').attr('disabled', true);
                                                $('#descartar_caso').attr('disabled', true);
                                                $('#descartar_caso2').attr('disabled', true);
                                                $('#cancelar_caso').attr('disabled', true);
                                                $('#cancelar_caso2').attr('disabled', true);
                                                $('.form-control').attr('readonly', true);
                                                $(".selectpicker").selectpicker('refresh');
                             

                                                var parametros = $('#form_nuevo_caso').serialize();
                                                $.ajax({
                                                    type: "POST",
                                                    url: "<?= $hostactual ?>ajax/descartar-caso.php",
                                                    data: parametros,
                                                    success: function (res) {
                                                        var error = res.includes("error");
                                                        if (!error) {
                                                            $(window).off("beforeunload");
                                                            window.location.replace('<?= $hostactual ?>nuevo-caso/descartado');
                                                        } else {
                                                            $("#alertaok").hide(500);
                                                            $("#alertabad").show(500);
                                                            $("#spanbad").text("<?= $msg_descartar_caso[2] ?>");
                                                            $("#alertaok2").hide(500);
                                                            $("#alertabad2").show(500);
                                                            $("#spanbad2").text("<?= $msg_descartar_caso[2] ?>");
                                                            //setTimeout(function () {
                                                            //    $("#alertabad").hide(500);
                                                            //    $("#alertabad2").hide(500);
                                                            //}, 4000); // <-- time in milliseconds
                                                            $('#guardar_caso_c').attr('disabled', false);
                                                            $('#guardar_caso').attr('disabled', false);
                                                            $('#guardar_caso_c2').attr('disabled', false);
                                                            $('#guardar_caso2').attr('disabled', false);
                                                            $('#descartar_caso').attr('disabled', false);
                                                            $('#descartar_caso2').attr('disabled', false);
                                                            $('#cancelar_caso').attr('disabled', false);
                                                            $('#cancelar_caso2').attr('disabled', false);
                                                            $('.form-control').attr('readonly', false);
                                                            $(".selectpicker").selectpicker('refresh');
                                                        }
                                                    }
                                                });
                                            }
                                            function guardar_continuar() {
                                                var formulario = $('#selectMotivo').val();
                                                var emergencia = $('#toggleEmergencia').val();

                                                /*var variable = $('#nitem_observ').val();
                                                 alert(variable);*/
                                                $("#alertaok").hide(500);
                                                $("#alertaok2").hide(500);
                                                $("#alertabad").hide(500);
                                                $("#alertabad2").hide(500);
                                                $('#guardar_caso_c').attr('disabled', true);
                                                $('#guardar_caso').attr('disabled', true);
                                                $('#guardar_caso_c2').attr('disabled', true);
                                                $('#guardar_caso2').attr('disabled', true);
                                                $('#descartar_caso').attr('disabled', true);
                                                $('#descartar_caso2').attr('disabled', true);
                                                $('#cancelar_caso').attr('disabled', true);
                                                $('#cancelar_caso2').attr('disabled', true);
                                                $('.form-control').attr('readonly', true);
                                                $(".selectpicker").selectpicker('refresh');
                                                if (formulario === "B" && emergencia === "No") {
                                                    var validado = validaFormB();
                                                    if (validado) {                               

                                                        var parametros = $('#form_nuevo_caso').serialize();
                                                        $.ajax({
                                                            type: "POST",
                                                            url: "<?= $hostactual ?>ajax/guardar-form-b.php",
                                                            data: parametros,
                                                            success: function (res) {
                                                                var error = res.includes("error");
                                                                if (!error) {

                                                                    //$("#nitem_observ").val("1");
                                                                    $('#selectOrigen').attr('disabled', true);
                                                                    $('#selectMotivo').attr('disabled', true);
                                                                    $('#toggleEmergenciaSi').attr('disabled', true);
                                                                    $('#toggleEmergenciaNo').attr('disabled', true);
                                                                    $("#alertabad").hide(500);
                                                                    $("#alertaok").show(500);
                                                                    $("#spanok").text("<?= $msg_guardar_caso[1] ?>");
                                                                    $("#alertabad2").hide(500);
                                                                    $("#alertaok2").show(500);
                                                                    $("#spanok2").text("<?= $msg_guardar_caso[1] ?>");
                                                                    setTimeout(function () {
                                                                        $("#alertaok").hide(500);
                                                                        $("#alertaok2").hide(500);
                                                                    }, 4000); // <-- time in milliseconds
                                                                    $('#guardar_caso_c').attr('disabled', false);
                                                                    $('#guardar_caso').attr('disabled', false);
                                                                    $('#guardar_caso_c2').attr('disabled', false);
                                                                    $('#guardar_caso2').attr('disabled', false);
                                                                    $('#descartar_caso').attr('disabled', false);
                                                                    $('#descartar_caso2').attr('disabled', false);
                                                                    $('#cancelar_caso').attr('disabled', false);
                                                                    $('#cancelar_caso2').attr('disabled', false);
                                                                    $('.form-control').attr('readonly', false);
                                                                    $(".selectpicker").selectpicker('refresh');
                                                                } else {
                                                                    $("#alertaok").hide(500);
                                                                    $("#alertabad").show(500);
                                                                    $("#spanbad").text("<?= $msg_guardar_caso[2] ?>");
                                                                    $("#alertaok2").hide(500);
                                                                    $("#alertabad2").show(500);
                                                                    $("#spanbad2").text("<?= $msg_guardar_caso[2] ?>");
                                                                    //setTimeout(function () {
                                                                    //    $("#alertabad").hide(500);
                                                                    //    $("#alertabad2").hide(500);
                                                                    //}, 4000); // <-- time in milliseconds
                                                                    $('#guardar_caso_c').attr('disabled', false);
                                                                    $('#guardar_caso').attr('disabled', false);
                                                                    $('#guardar_caso_c2').attr('disabled', false);
                                                                    $('#guardar_caso2').attr('disabled', false);
                                                                    $('#descartar_caso').attr('disabled', false);
                                                                    $('#descartar_caso2').attr('disabled', false);
                                                                    $('#cancelar_caso').attr('disabled', false);
                                                                    $('#cancelar_caso2').attr('disabled', false);
                                                                    $('.form-control').attr('readonly', false);
                                                                    $(".selectpicker").selectpicker('refresh');
                                                                }
                                                            }
                                                        });
                                                    }

                                                } else if (formulario === "C" && emergencia === "No") {
                                                    var validado = validaFormC();
                                                    if (validado) {                               

                                                        var parametros = $('#form_nuevo_caso').serialize();
                                                        $.ajax({
                                                            type: "POST",
                                                            url: "<?= $hostactual ?>ajax/guardar-form-c.php",
                                                            data: parametros,
                                                            success: function (res) {
                                                                var error = res.includes("error");
                                                                if (!error) {

                                                                    //$("#nitem_observ").val("1");
                                                                    $('#selectOrigen').attr('disabled', true);
                                                                    $('#selectMotivo').attr('disabled', true);
                                                                    $('#toggleEmergenciaSi').attr('disabled', true);
                                                                    $('#toggleEmergenciaNo').attr('disabled', true);
                                                                    $("#alertabad").hide(500);
                                                                    $("#alertaok").show(500);
                                                                    $("#spanok").text("<?= $msg_guardar_caso[1] ?>");
                                                                    $("#alertabad2").hide(500);
                                                                    $("#alertaok2").show(500);
                                                                    $("#spanok2").text("<?= $msg_guardar_caso[1] ?>");
                                                                    setTimeout(function () {
                                                                        $("#alertaok").hide(500);
                                                                        $("#alertaok2").hide(500);
                                                                    }, 4000); // <-- time in milliseconds
                                                                    $('#guardar_caso_c').attr('disabled', false);
                                                                    $('#guardar_caso').attr('disabled', false);
                                                                    $('#guardar_caso_c2').attr('disabled', false);
                                                                    $('#guardar_caso2').attr('disabled', false);
                                                                    $('#descartar_caso').attr('disabled', false);
                                                                    $('#descartar_caso2').attr('disabled', false);
                                                                    $('#cancelar_caso').attr('disabled', false);
                                                                    $('#cancelar_caso2').attr('disabled', false);
                                                                    $('.form-control').attr('readonly', false);
                                                                    $(".selectpicker").selectpicker('refresh');
                                                                } else {
                                                                    $("#alertaok").hide(500);
                                                                    $("#alertabad").show(500);
                                                                    $("#spanbad").text("<?= $msg_guardar_caso[2] ?>");
                                                                    $("#alertaok2").hide(500);
                                                                    $("#alertabad2").show(500);
                                                                    $("#spanbad2").text("<?= $msg_guardar_caso[2] ?>");
                                                                    //setTimeout(function () {
                                                                    //    $("#alertabad").hide(500);
                                                                    //    $("#alertabad2").hide(500);
                                                                    //}, 4000); // <-- time in milliseconds
                                                                    $('#guardar_caso_c').attr('disabled', false);
                                                                    $('#guardar_caso').attr('disabled', false);
                                                                    $('#guardar_caso_c2').attr('disabled', false);
                                                                    $('#guardar_caso2').attr('disabled', false);
                                                                    $('#descartar_caso').attr('disabled', false);
                                                                    $('#descartar_caso2').attr('disabled', false);
                                                                    $('#cancelar_caso').attr('disabled', false);
                                                                    $('#cancelar_caso2').attr('disabled', false);
                                                                    $('.form-control').attr('readonly', false);
                                                                    $(".selectpicker").selectpicker('refresh');
                                                                }
                                                            }
                                                        });
                                                    }
                                                } else if (formulario === "D" && emergencia === "No") {
                                                    var validado = validaForm();
                                                    if (validado) {                               

                                                        var parametros = $('#form_nuevo_caso').serialize();
                                                        $.ajax({
                                                            type: "POST",
                                                            url: "<?= $hostactual ?>ajax/guardar-form-d.php",
                                                            data: parametros,
                                                            success: function (res) {
                                                                var error = res.includes("error");
                                                                if (!error) {
                                                                    //$("#nitem_observ").val("1");
                                                                    $('#selectOrigen').attr('disabled', true);
                                                                    $('#selectMotivo').attr('disabled', true);
                                                                    $('#toggleEmergenciaSi').attr('disabled', true);
                                                                    $('#toggleEmergenciaNo').attr('disabled', true);
                                                                    $("#alertabad").hide(500);
                                                                    $("#alertaok").show(500);
                                                                    $("#spanok").text("<?= $msg_guardar_caso[1] ?>");
                                                                    $("#alertabad2").hide(500);
                                                                    $("#alertaok2").show(500);
                                                                    $("#spanok2").text("<?= $msg_guardar_caso[1] ?>");
                                                                    setTimeout(function () {
                                                                        $("#alertaok").hide(500);
                                                                        $("#alertaok2").hide(500);
                                                                    }, 4000); // <-- time in milliseconds
                                                                    $('#guardar_caso_c').attr('disabled', false);
                                                                    $('#guardar_caso').attr('disabled', false);
                                                                    $('#guardar_caso_c2').attr('disabled', false);
                                                                    $('#guardar_caso2').attr('disabled', false);
                                                                    $('#descartar_caso').attr('disabled', false);
                                                                    $('#descartar_caso2').attr('disabled', false);
                                                                    $('#cancelar_caso').attr('disabled', false);
                                                                    $('#cancelar_caso2').attr('disabled', false);
                                                                    $('.form-control').attr('readonly', false);
                                                                    $(".selectpicker").selectpicker('refresh');
                                                                } else {
                                                                    $("#alertaok").hide(500);
                                                                    $("#alertabad").show(500);
                                                                    $("#spanbad").text("<?= $msg_guardar_caso[2] ?>");
                                                                    $("#alertaok2").hide(500);
                                                                    $("#alertabad2").show(500);
                                                                    $("#spanbad2").text("<?= $msg_guardar_caso[2] ?>");
                                                                    //setTimeout(function () {
                                                                    //    $("#alertabad").hide(500);
                                                                    //    $("#alertabad2").hide(500);
                                                                    //}, 4000); // <-- time in milliseconds
                                                                    $('#guardar_caso_c').attr('disabled', false);
                                                                    $('#guardar_caso').attr('disabled', false);
                                                                    $('#guardar_caso_c2').attr('disabled', false);
                                                                    $('#guardar_caso2').attr('disabled', false);
                                                                    $('#descartar_caso').attr('disabled', false);
                                                                    $('#descartar_caso2').attr('disabled', false);
                                                                    $('#cancelar_caso').attr('disabled', false);
                                                                    $('#cancelar_caso2').attr('disabled', false);
                                                                    $('.form-control').attr('readonly', false);
                                                                    $(".selectpicker").selectpicker('refresh');
                                                                }
                                                            }
                                                        });
                                                    }
                                                } else if (formulario === "E" && emergencia === "No") {
                                                    var validado = validaFormE();
                                                    if (validado) {                               

                                                        var parametros = $('#form_nuevo_caso').serialize();
                                                        $.ajax({
                                                            type: "POST",
                                                            url: "<?= $hostactual ?>ajax/guardar-form-e.php",
                                                            data: parametros,
                                                            success: function (res) {
                                                                var error = res.includes("error");
                                                                if (!error) {
                                                                    //$("#nitem_observ").val("1");
                                                                    $('#selectOrigen').attr('disabled', true);
                                                                    $('#selectMotivo').attr('disabled', true);
                                                                    $('#toggleEmergenciaSi').attr('disabled', true);
                                                                    $('#toggleEmergenciaNo').attr('disabled', true);
                                                                    $("#alertabad").hide(500);
                                                                    $("#alertaok").show(500);
                                                                    $("#spanok").text("<?= $msg_guardar_caso[1] ?>");
                                                                    $("#alertabad2").hide(500);
                                                                    $("#alertaok2").show(500);
                                                                    $("#spanok2").text("<?= $msg_guardar_caso[1] ?>");
                                                                    setTimeout(function () {
                                                                        $("#alertaok").hide(500);
                                                                        $("#alertaok2").hide(500);
                                                                    }, 4000); // <-- time in milliseconds
                                                                    $('#guardar_caso_c').attr('disabled', false);
                                                                    $('#guardar_caso').attr('disabled', false);
                                                                    $('#guardar_caso_c2').attr('disabled', false);
                                                                    $('#guardar_caso2').attr('disabled', false);
                                                                    $('#descartar_caso').attr('disabled', false);
                                                                    $('#descartar_caso2').attr('disabled', false);
                                                                    $('#cancelar_caso').attr('disabled', false);
                                                                    $('#cancelar_caso2').attr('disabled', false);
                                                                    $('.form-control').attr('readonly', false);
                                                                    $(".selectpicker").selectpicker('refresh');
                                                                } else {
                                                                    $("#alertaok").hide(500);
                                                                    $("#alertabad").show(500);
                                                                    $("#spanbad").text("<?= $msg_guardar_caso[2] ?>");
                                                                    $("#alertaok2").hide(500);
                                                                    $("#alertabad2").show(500);
                                                                    $("#spanbad2").text("<?= $msg_guardar_caso[2] ?>");
                                                                    //setTimeout(function () {
                                                                    //    $("#alertabad").hide(500);
                                                                    //    $("#alertabad2").hide(500);
                                                                    //}, 4000); // <-- time in milliseconds
                                                                    $('#guardar_caso_c').attr('disabled', false);
                                                                    $('#guardar_caso').attr('disabled', false);
                                                                    $('#guardar_caso_c2').attr('disabled', false);
                                                                    $('#guardar_caso2').attr('disabled', false);
                                                                    $('#descartar_caso').attr('disabled', false);
                                                                    $('#descartar_caso2').attr('disabled', false);
                                                                    $('#cancelar_caso').attr('disabled', false);
                                                                    $('#cancelar_caso2').attr('disabled', false);
                                                                    $('.form-control').attr('readonly', false);
                                                                    $(".selectpicker").selectpicker('refresh');
                                                                }
                                                            }
                                                        });
                                                    }
                                                } else if (emergencia === "Si") {
                                                    var validado = validaForm();
                                                    if (validado) {                               

                                                        var parametros = $('#form_nuevo_caso').serialize();
                                                        $.ajax({
                                                            type: "POST",
                                                            url: "<?= $hostactual ?>ajax/guardar-form-f.php",
                                                            data: parametros,
                                                            success: function (res) {
                                                                var error = res.includes("error");
                                                                if (!error) {
                                                                    //$("#nitem_observ").val("1");
                                                                    $('#selectOrigen').attr('disabled', true);
                                                                    $('#selectMotivo').attr('disabled', true);
                                                                    $('#toggleEmergenciaSi').attr('disabled', true);
                                                                    $('#toggleEmergenciaNo').attr('disabled', true);
                                                                    $("#alertabad").hide(500);
                                                                    $("#alertaok").show(500);
                                                                    $("#spanok").text("<?= $msg_guardar_caso[1] ?>");
                                                                    $("#alertabad2").hide(500);
                                                                    $("#alertaok2").show(500);
                                                                    $("#spanok2").text("<?= $msg_guardar_caso[1] ?>");
                                                                    setTimeout(function () {
                                                                        $("#alertaok").hide(500);
                                                                        $("#alertaok2").hide(500);
                                                                    }, 4000); // <-- time in milliseconds
                                                                    $('#guardar_caso_c').attr('disabled', false);
                                                                    $('#guardar_caso').attr('disabled', false);
                                                                    $('#guardar_caso_c2').attr('disabled', false);
                                                                    $('#guardar_caso2').attr('disabled', false);
                                                                    $('#descartar_caso').attr('disabled', false);
                                                                    $('#descartar_caso2').attr('disabled', false);
                                                                    $('#cancelar_caso').attr('disabled', false);
                                                                    $('#cancelar_caso2').attr('disabled', false);
                                                                    $('.form-control').attr('readonly', false);
                                                                    $(".selectpicker").selectpicker('refresh');
                                                                } else {
                                                                    $("#alertaok").hide(500);
                                                                    $("#alertabad").show(500);
                                                                    $("#spanbad").text("<?= $msg_guardar_caso[2] ?>");
                                                                    $("#alertaok2").hide(500);
                                                                    $("#alertabad2").show(500);
                                                                    $("#spanbad2").text("<?= $msg_guardar_caso[2] ?>");
                                                                    //setTimeout(function () {
                                                                    //    $("#alertabad").hide(500);
                                                                    //    $("#alertabad2").hide(500);
                                                                    //}, 4000); // <-- time in milliseconds
                                                                    $('#guardar_caso_c').attr('disabled', false);
                                                                    $('#guardar_caso').attr('disabled', false);
                                                                    $('#guardar_caso_c2').attr('disabled', false);
                                                                    $('#guardar_caso2').attr('disabled', false);
                                                                    $('#descartar_caso').attr('disabled', false);
                                                                    $('#descartar_caso2').attr('disabled', false);
                                                                    $('#cancelar_caso').attr('disabled', false);
                                                                    $('#cancelar_caso2').attr('disabled', false);
                                                                    $('.form-control').attr('readonly', false);
                                                                    $(".selectpicker").selectpicker('refresh');
                                                                }
                                                            }
                                                        });
                                                    }

                                                }

                                            }

                                            function guardar_cerrar() {
                                                var formulario = $('#selectMotivo').val();
                                                var emergencia = $('#toggleEmergencia').val();

                                                $("#alertaok").hide(500);
                                                $("#alertaok2").hide(500);
                                                $("#alertabad").hide(500);
                                                $("#alertabad2").hide(500);
                                                $('#guardar_caso_c').attr('disabled', true);
                                                $('#guardar_caso').attr('disabled', true);
                                                $('#guardar_caso_c2').attr('disabled', true);
                                                $('#guardar_caso2').attr('disabled', true);
                                                $('#descartar_caso').attr('disabled', true);
                                                $('#descartar_caso2').attr('disabled', true);
                                                $('#cancelar_caso').attr('disabled', true);
                                                $('#cancelar_caso2').attr('disabled', true);
                                                $('.form-control').attr('readonly', true);
                                                $(".selectpicker").selectpicker('refresh');
                                                if (formulario === "B" && emergencia === "No") {
                                                    var validado = validaFormB();
                                                    if (validado) {                               
                                                        var parametros = $('#form_nuevo_caso').serialize();
                                                        $.ajax({
                                                            type: "POST",
                                                            url: "<?= $hostactual ?>ajax/guardar-form-b.php?cerrar=si",
                                                            data: parametros,
                                                            success: function (res) {
                                                                var error = res.includes("error");
                                                                if (!error) {
                                                                    $(window).off("beforeunload");
                                                                    window.location.replace('<?= $hostactual ?>nuevo-caso/guardado');
                                                                } else {
                                                                    $("#alertaok").hide(500);
                                                                    $("#alertabad").show(500);
                                                                    $("#spanbad").text("<?= $msg_guardar_caso[2] ?>");
                                                                    $("#alertaok2").hide(500);
                                                                    $("#alertabad2").show(500);
                                                                    $("#spanbad2").text("<?= $msg_guardar_caso[2] ?>");
                                                                    //setTimeout(function () {
                                                                    //    $("#alertabad").hide(500);
                                                                    //    $("#alertabad2").hide(500);
                                                                    //}, 4000); // <-- time in milliseconds
                                                                    $('#guardar_caso_c').attr('disabled', false);
                                                                    $('#guardar_caso').attr('disabled', false);
                                                                    $('#guardar_caso_c2').attr('disabled', false);
                                                                    $('#guardar_caso2').attr('disabled', false);
                                                                    $('#descartar_caso').attr('disabled', false);
                                                                    $('#descartar_caso2').attr('disabled', false);
                                                                    $('#cancelar_caso').attr('disabled', false);
                                                                    $('#cancelar_caso2').attr('disabled', false);
                                                                    $('.form-control').attr('readonly', false);
                                                                    $(".selectpicker").selectpicker('refresh');
                                                                }
                                                            }
                                                        });
                                                    } else {

                                                    }

                                                } else if (formulario === "C" && emergencia === "No") {
                                                    var validado = validaFormC();
                                                    if (validado) {                               

                                                        var parametros = $('#form_nuevo_caso').serialize();
                                                        $.ajax({
                                                            type: "POST",
                                                            url: "<?= $hostactual ?>ajax/guardar-form-c.php?cerrar=si",
                                                            data: parametros,
                                                            success: function (res) {
                                                                var error = res.includes("error");
                                                                if (!error) {
                                                                    $(window).off("beforeunload");
                                                                    window.location.replace('<?= $hostactual ?>nuevo-caso/guardado');
                                                                } else {
                                                                    $("#alertaok").hide(500);
                                                                    $("#alertabad").show(500);
                                                                    $("#spanbad").text("<?= $msg_guardar_caso[2] ?>");
                                                                    $("#alertaok2").hide(500);
                                                                    $("#alertabad2").show(500);
                                                                    $("#spanbad2").text("<?= $msg_guardar_caso[2] ?>");
                                                                    //setTimeout(function () {
                                                                    //    $("#alertabad").hide(500);
                                                                    //    $("#alertabad2").hide(500);
                                                                    //}, 4000); // <-- time in milliseconds
                                                                    $('#guardar_caso_c').attr('disabled', false);
                                                                    $('#guardar_caso').attr('disabled', false);
                                                                    $('#guardar_caso_c2').attr('disabled', false);
                                                                    $('#guardar_caso2').attr('disabled', false);
                                                                    $('#descartar_caso').attr('disabled', false);
                                                                    $('#descartar_caso2').attr('disabled', false);
                                                                    $('#cancelar_caso').attr('disabled', false);
                                                                    $('#cancelar_caso2').attr('disabled', false);
                                                                    $('.form-control').attr('readonly', false);
                                                                    $(".selectpicker").selectpicker('refresh');
                                                                }
                                                            }
                                                        });
                                                    }
                                                } else if (formulario === "D" && emergencia === "No") {
                                                    var validado = validaForm();
                                                    if (validado) {                               

                                                        var parametros = $('#form_nuevo_caso').serialize();
                                                        $.ajax({
                                                            type: "POST",
                                                            url: "<?= $hostactual ?>ajax/guardar-form-d.php?cerrar=si",
                                                            data: parametros,
                                                            success: function (res) {
                                                                var error = res.includes("error");
                                                                if (!error) {
                                                                    $(window).off("beforeunload");
                                                                    window.location.replace('<?= $hostactual ?>nuevo-caso/guardado');
                                                                } else {
                                                                    $("#alertaok").hide(500);
                                                                    $("#alertabad").show(500);
                                                                    $("#spanbad").text("<?= $msg_guardar_caso[2] ?>");
                                                                    $("#alertaok2").hide(500);
                                                                    $("#alertabad2").show(500);
                                                                    $("#spanbad2").text("<?= $msg_guardar_caso[2] ?>");
                                                                    //setTimeout(function () {
                                                                    //    $("#alertabad").hide(500);
                                                                    //    $("#alertabad2").hide(500);
                                                                    //}, 4000); // <-- time in milliseconds
                                                                    $('#guardar_caso_c').attr('disabled', false);
                                                                    $('#guardar_caso').attr('disabled', false);
                                                                    $('#guardar_caso_c2').attr('disabled', false);
                                                                    $('#guardar_caso2').attr('disabled', false);
                                                                    $('#descartar_caso').attr('disabled', false);
                                                                    $('#descartar_caso2').attr('disabled', false);
                                                                    $('#cancelar_caso').attr('disabled', false);
                                                                    $('#cancelar_caso2').attr('disabled', false);
                                                                    $('.form-control').attr('readonly', false);
                                                                    $(".selectpicker").selectpicker('refresh');
                                                                }
                                                            }
                                                        });
                                                    }
                                                } else if (formulario === "E" && emergencia === "No") {
                                                    var validado = validaFormE();
                                                    if (validado) {                               

                                                        var parametros = $('#form_nuevo_caso').serialize();
                                                        $.ajax({
                                                            type: "POST",
                                                            url: "<?= $hostactual ?>ajax/guardar-form-e.php?cerrar=si",
                                                            data: parametros,
                                                            success: function (res) {
                                                                var error = res.includes("error");
                                                                if (!error) {
                                                                    $(window).off("beforeunload");
                                                                    window.location.replace('<?= $hostactual ?>nuevo-caso/guardado');
                                                                } else {
                                                                    $("#alertaok").hide(500);
                                                                    $("#alertabad").show(500);
                                                                    $("#spanbad").text("<?= $msg_guardar_caso[2] ?>");
                                                                    $("#alertaok2").hide(500);
                                                                    $("#alertabad2").show(500);
                                                                    $("#spanbad2").text("<?= $msg_guardar_caso[2] ?>");
                                                                    //setTimeout(function () {
                                                                    //    $("#alertabad").hide(500);
                                                                    //    $("#alertabad2").hide(500);
                                                                    //}, 4000); // <-- time in milliseconds
                                                                    $('#guardar_caso_c').attr('disabled', false);
                                                                    $('#guardar_caso').attr('disabled', false);
                                                                    $('#guardar_caso_c2').attr('disabled', false);
                                                                    $('#guardar_caso2').attr('disabled', false);
                                                                    $('#descartar_caso').attr('disabled', false);
                                                                    $('#descartar_caso2').attr('disabled', false);
                                                                    $('#cancelar_caso').attr('disabled', false);
                                                                    $('#cancelar_caso2').attr('disabled', false);
                                                                    $('.form-control').attr('readonly', false);
                                                                    $(".selectpicker").selectpicker('refresh');
                                                                }
                                                            }
                                                        });
                                                    }
                                                } else if (emergencia === "Si") {
                                                    var validado = validaForm();
                                                    if (validado) {                               

                                                        var parametros = $('#form_nuevo_caso').serialize();
                                                        $.ajax({
                                                            type: "POST",
                                                            url: "<?= $hostactual ?>ajax/guardar-form-f.php?cerrar=si",
                                                            data: parametros,
                                                            success: function (res) {
                                                                var error = res.includes("error");
                                                                if (!error) {
                                                                    $(window).off("beforeunload");
                                                                    window.location.replace('<?= $hostactual ?>nuevo-caso/guardado');
                                                                } else {
                                                                    $("#alertaok").hide(500);
                                                                    $("#alertabad").show(500);
                                                                    $("#spanbad").text("<?= $msg_guardar_caso[2] ?>");
                                                                    $("#alertaok2").hide(500);
                                                                    $("#alertabad2").show(500);
                                                                    $("#spanbad2").text("<?= $msg_guardar_caso[2] ?>");
                                                                    //setTimeout(function () {
                                                                    //    $("#alertabad").hide(500);
                                                                    //    $("#alertabad2").hide(500);
                                                                    //}, 4000); // <-- time in milliseconds
                                                                    $('#guardar_caso_c').attr('disabled', false);
                                                                    $('#guardar_caso').attr('disabled', false);
                                                                    $('#guardar_caso_c2').attr('disabled', false);
                                                                    $('#guardar_caso2').attr('disabled', false);
                                                                    $('#descartar_caso').attr('disabled', false);
                                                                    $('#descartar_caso2').attr('disabled', false);
                                                                    $('#cancelar_caso').attr('disabled', false);
                                                                    $('#cancelar_caso2').attr('disabled', false);
                                                                    $('.form-control').attr('readonly', false);
                                                                    $(".selectpicker").selectpicker('refresh');
                                                                }
                                                            }
                                                        });
                                                    }
                                                }

                                            }

                                            function validaForm() {
                                                check_dato = $("#selectOrigen").val();
                                                if (check_dato === "0") {
                                                    $("#alertaok").hide(500);
                                                    $("#alertabad").show(500);
                                                    $("#spanbad").text("<?= $msg_guardar_caso_b['origen'][1] ?>");
                                                    $("#alertaok2").hide(500);
                                                    $("#alertabad2").show(500);
                                                    $("#spanbad2").text("<?= $msg_guardar_caso_b['origen'][1] ?>");

                                                    $('#guardar_caso_c').attr('disabled', false);
                                                    $('#guardar_caso').attr('disabled', false);
                                                    $('#guardar_caso_c2').attr('disabled', false);
                                                    $('#guardar_caso2').attr('disabled', false);
                                                    $('#descartar_caso').attr('disabled', false);
                                                    $('#descartar_caso2').attr('disabled', false);
                                                    $('#cancelar_caso').attr('disabled', false);
                                                    $('#cancelar_caso2').attr('disabled', false);
                                                    $('.form-control').attr('readonly', false);
                                                    $(".selectpicker").selectpicker('refresh');
                                                    $(".bootstrap-select button[data-id='selectOrigen'").focus();       // Esta función coloca el foco de escritura del usuario en el campo Nombre directamente.
                                                    return false;
                                                }
                                                $("#alertabad").hide(500);   
                                                $("#alertabad2").hide(500);  
                                                return true; // Si todo está correcto
                                            }
                                            function validaFormB() {
                                                check_dato = $("#selectOrigen").val();
                                                if (check_dato === "0") {
                                                    $("#alertaok").hide(500);
                                                    $("#alertabad").show(500);
                                                    $("#spanbad").text("<?= $msg_guardar_caso_b['origen'][1] ?>");
                                                    $("#alertaok2").hide(500);
                                                    $("#alertabad2").show(500);
                                                    $("#spanbad2").text("<?= $msg_guardar_caso_b['origen'][1] ?>");

                                                    $('#guardar_caso_c').attr('disabled', false);
                                                    $('#guardar_caso').attr('disabled', false);
                                                    $('#guardar_caso_c2').attr('disabled', false);
                                                    $('#guardar_caso2').attr('disabled', false);
                                                    $('#descartar_caso').attr('disabled', false);
                                                    $('#descartar_caso2').attr('disabled', false);
                                                    $('.form-control').attr('readonly', false);
                                                    $(".selectpicker").selectpicker('refresh');
                                                    $(".bootstrap-select button[data-id='selectOrigen'").focus();       // Esta función coloca el foco de escritura del usuario en el campo Nombre directamente.
                                                    return false;
                                                } 
                                                check_dato = $("#ValModoViolenciaAB").val();
                                                if (check_dato === "") {
                                                    $("#alertaok").hide(500);
                                                    $("#alertabad").show(500);
                                                    $("#spanbad").text("<?= $msg_guardar_caso_b['modov'][1] ?>");
                                                    $("#alertaok2").hide(500);
                                                    $("#alertabad2").show(500);
                                                    $("#spanbad2").text("<?= $msg_guardar_caso_b['modov'][1] ?>");

                                                    $('#guardar_caso_c').attr('disabled', false);
                                                    $('#guardar_caso').attr('disabled', false);
                                                    $('#guardar_caso_c2').attr('disabled', false);
                                                    $('#guardar_caso2').attr('disabled', false);
                                                    $('#descartar_caso').attr('disabled', false);
                                                    $('#descartar_caso2').attr('disabled', false);
                                                    $('.form-control').attr('readonly', false);
                                                    $(".selectpicker").selectpicker('refresh');
                                                    $(".bootstrap-select button[data-id='ModoViolenciaAB'").focus();       // Esta función coloca el foco de escritura del usuario en el campo Nombre directamente.
                                                    return false;
                                                }
                                                check_dato = $("#ValTipoViolenciaAB").val();
                                                if (check_dato === "") {
                                                    $("#alertaok").hide(500);
                                                    $("#alertabad").show(500);
                                                    $("#spanbad").text("<?= $msg_guardar_caso_b['tipov'][1] ?>");
                                                    $("#alertaok2").hide(500);
                                                    $("#alertabad2").show(500);
                                                    $("#spanbad2").text("<?= $msg_guardar_caso_b['tipov'][1] ?>");

                                                    $('#guardar_caso_c').attr('disabled', false);
                                                    $('#guardar_caso').attr('disabled', false);
                                                    $('#guardar_caso_c2').attr('disabled', false);
                                                    $('#guardar_caso2').attr('disabled', false);
                                                    $('#descartar_caso').attr('disabled', false);
                                                    $('#descartar_caso2').attr('disabled', false);
                                                    $('.form-control').attr('readonly', false);
                                                    $(".selectpicker").selectpicker('refresh');
                                                    $(".bootstrap-select button[data-id='TipoViolenciaAB'").focus();       // Esta función coloca el foco de escritura del usuario en el campo Nombre directamente.
                                                    return false;
                                                }
                                                $("#alertabad").hide(500);   
                                                $("#alertabad2").hide(500);  
                                                return true; // Si todo está correcto
                                            }
                                            function validaFormC() {
                                                check_dato = $("#selectOrigen").val();
                                                if (check_dato === "0") {
                                                    $("#alertaok").hide(500);
                                                    $("#alertabad").show(500);
                                                    $("#spanbad").text("<?= $msg_guardar_caso_b['origen'][1] ?>");
                                                    $("#alertaok2").hide(500);
                                                    $("#alertabad2").show(500);
                                                    $("#spanbad2").text("<?= $msg_guardar_caso_b['origen'][1] ?>");

                                                    $('#guardar_caso_c').attr('disabled', false);
                                                    $('#guardar_caso').attr('disabled', false);
                                                    $('#guardar_caso_c2').attr('disabled', false);
                                                    $('#guardar_caso2').attr('disabled', false);
                                                    $('#descartar_caso').attr('disabled', false);
                                                    $('#descartar_caso2').attr('disabled', false);
                                                    $('#cancelar_caso').attr('disabled', false);
                                                                    $('#cancelar_caso2').attr('disabled', false);
                                                    $('.form-control').attr('readonly', false);
                                                    $(".selectpicker").selectpicker('refresh');
                                                    $(".bootstrap-select button[data-id='selectOrigen'").focus();       // Esta función coloca el foco de escritura del usuario en el campo Nombre directamente.
                                                    return false;
                                                }
                                                check_dato = $("#MotivoLlamadaC").val();
                                                if (check_dato === "0") {
                                                    $("#alertaok").hide(500);
                                                    $("#alertabad").show(500);
                                                    $("#spanbad").text("<?= $msg_guardar_caso_ce['motivo'][1] ?>");
                                                    $("#alertaok2").hide(500);
                                                    $("#alertabad2").show(500);
                                                    $("#spanbad2").text("<?= $msg_guardar_caso_ce['motivo'][1] ?>");

                                                    $('#guardar_caso_c').attr('disabled', false);
                                                    $('#guardar_caso').attr('disabled', false);
                                                    $('#guardar_caso_c2').attr('disabled', false);
                                                    $('#guardar_caso2').attr('disabled', false);
                                                    $('#descartar_caso').attr('disabled', false);
                                                    $('#descartar_caso2').attr('disabled', false);
                                                    $('#cancelar_caso').attr('disabled', false);
                                                                    $('#cancelar_caso2').attr('disabled', false);
                                                    $('.form-control').attr('readonly', false);
                                                    $(".selectpicker").selectpicker('refresh');
                                                    $(".bootstrap-select button[data-id='MotivoLlamadaC'").focus();       // Esta función coloca el foco de escritura del usuario en el campo Nombre directamente.
                                                    return false;
                                                }


                                                $("#alertabad").hide(500);   
                                                $("#alertabad2").hide(500);  
                                                return true; // Si todo está correcto
                                            }
                                            function validaFormE() {
                                                check_dato = $("#selectOrigen").val();
                                                if (check_dato === "0") {
                                                    $("#alertaok").hide(500);
                                                    $("#alertabad").show(500);
                                                    $("#spanbad").text("<?= $msg_guardar_caso_b['origen'][1] ?>");
                                                    $("#alertaok2").hide(500);
                                                    $("#alertabad2").show(500);
                                                    $("#spanbad2").text("<?= $msg_guardar_caso_b['origen'][1] ?>");

                                                    $('#guardar_caso_c').attr('disabled', false);
                                                    $('#guardar_caso').attr('disabled', false);
                                                    $('#guardar_caso_c2').attr('disabled', false);
                                                    $('#guardar_caso2').attr('disabled', false);
                                                    $('#descartar_caso').attr('disabled', false);
                                                    $('#descartar_caso2').attr('disabled', false);
                                                    $('#cancelar_caso').attr('disabled', false);
                                                                    $('#cancelar_caso2').attr('disabled', false);
                                                    $('.form-control').attr('readonly', false);
                                                    $(".selectpicker").selectpicker('refresh');
                                                    $(".bootstrap-select button[data-id='selectOrigen'").focus();       // Esta función coloca el foco de escritura del usuario en el campo Nombre directamente.
                                                    return false;
                                                }
                                                check_dato = $("#MotivoLlamadaE").val();
                                                if (check_dato === "0") {
                                                    $("#alertaok").hide(500);
                                                    $("#alertabad").show(500);
                                                    $("#spanbad").text("<?= $msg_guardar_caso_ce['motivo'][1] ?>");
                                                    $("#alertaok2").hide(500);
                                                    $("#alertabad2").show(500);
                                                    $("#spanbad2").text("<?= $msg_guardar_caso_ce['motivo'][1] ?>");

                                                    $('#guardar_caso_c').attr('disabled', false);
                                                    $('#guardar_caso').attr('disabled', false);
                                                    $('#guardar_caso_c2').attr('disabled', false);
                                                    $('#guardar_caso2').attr('disabled', false);
                                                    $('#descartar_caso').attr('disabled', false);
                                                    $('#descartar_caso2').attr('disabled', false);
                                                    $('#cancelar_caso').attr('disabled', false);
                                                                    $('#cancelar_caso2').attr('disabled', false);
                                                    $('.form-control').attr('readonly', false);
                                                    $(".selectpicker").selectpicker('refresh');
                                                    $(".bootstrap-select button[data-id='MotivoLlamadaE'").focus();       // Esta función coloca el foco de escritura del usuario en el campo Nombre directamente.
                                                    return false;
                                                }


                                                $("#alertabad").hide(500);   
                                                $("#alertabad2").hide(500);  
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

                                            $("#toggle_form").submit(function (event) {
                                                $("#alertabad").hide(500);
                                                $("#alertaok").hide(500);
                                                $("#alertabad2").hide(500);
                                                $("#alertaok2").hide(500);
                                                var parametros = $('#form_nuevo_caso').serialize();
                                                $.ajax({
                                                    type: "POST",
                                                    url: "<?= $hostactual ?>ajax/descartar-caso.php",
                                                    data: parametros,
                                                    success: function (res) {

                                                        if (res === "ok") {
                                                            $(window).off("beforeunload");
                                                            window.location.replace('<?= $hostactual ?>nuevo-caso/descartado');

                                                        } else if (res === "error") {
                                                            $("#alertabad").hide(500);  
                                                            $("#alertaok").hide(500);
                                                            $("#alertabad2").hide(500);  
                                                            $("#alertaok2").hide(500);
                                                            $("#spanbad").text('<?= $msg_descartar_caso[2] ?>');
                                                            $("#spanbad2").text('<?= $msg_descartar_caso[2] ?>');
                                                            $("#alertabad").show(500);
                                                            $("#alertabad2").show(500);
                                                            clearTimeout(sessionStorage.getItem("timerid"));
                                                            tvar = setTimeout(function () {
                                                                $("#alertabad").fadeOut(500);
                                                                $("#alertabad2").fadeOut(500);
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
</script>

</body>
</html>