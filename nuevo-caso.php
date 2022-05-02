<?
include ('include/is_logged.inc.php');
include ('include/mensajes.inc.php');

if ($_SESSION['acceso'] == 'l') {
    header("location: /casos/buscador");
}
/* Connect To Database */
if (!isset($con)) {
    require_once ("config/conexion.php"); //Contiene funcion que conecta a la base de datos
}
include ('include/header.inc.php');
include ('include/utiles.inc.php');

$descartado = false;
$guardado = false;

if (isset($_GET["d"]) && $_GET["d"] == "s") {
    $descartado = true;
}
if (isset($_GET["g"]) && $_GET["g"] == "s") {
    $guardado = true;
}
//con_log($_GET["d"]);
//con_log($descartado);
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
                            <div class='col-12'><h5 class="abm-card-title mx-2">Nuevo Caso <span id="loader"></span></h5></div>
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
                        ?>

                        <form class="form-horizontal" role="form" method="post" id="form_nuevo_caso" name="form_nuevo_caso">
                            <input type="hidden" id="usuario" name="usuario" value="<?= $_SESSION['user_id'] ?>">
                            <div class="col-12">
                                <div class="form-group row" style="padding-left:15px;">
                                    <label for="staticNCaso" class="col-form-label">Nº de caso: &nbsp;</label>
                                    <div class="" style="display:inline;">
                                        <input type="text" readonly class="form-control-plaintext" style="line-height: 1.1;" name="staticNCaso" id="staticNCaso" value="-" tabindex="-1">
                                    </div>
                                </div>

                                <div class="form-row">

                                    <div class="form-group col-md-4">
                                        <label for="selectOrigen" class="col-form-label text-right">Origen del llamado:</label>
                                        <select class="selectpicker form-control" data-live-search="true"ese es data-size="8" id="selectOrigen" name="selectOrigen">
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
                                            ?>
                                        </select>
                                        <input type="hidden" id="ValselectOrigen" name="ValselectOrigen" value="0">

                                    </div>
                                    <div class="form-group col-md-4 text-center">
                                        <label for="toggleEmergencia" class="col-form-label text-right">Emergencia:</label>
                                        <div>
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                <button class="btn btn-option" id="toggleEmergenciaSi"  onclick="javascript:mostrar_emergencia()" style="width: 50px">
                                                    <input type="radio" name="toggleEmergenciaSi"  autocomplete="off"> Si
                                                </button>

                                                <button class="btn btn-option active" id="toggleEmergenciaNo" onclick="javascript:ocultar_emergencia()" style="width: 50px">
                                                    <input type="radio" name="toggleEmergenciaNo" autocomplete="off"> No
                                                </button>

                                            </div>
                                            <input type="hidden" id="toggleEmergencia" name="toggleEmergencia" value="No">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="selectMotivo" class="col-form-label text-right">Motivo de la consulta:</label>
                                        <select class="selectpicker form-control" data-live-search="true" data-size="8" id="selectMotivo" name="selectMotivo">
                                            <option value="0" selected>-</option>
                                            <?
                                            $sql = "SELECT * FROM motivo_consulta";
                                            $query = mysqli_query($con, $sql);

                                            while ($row = mysqli_fetch_array($query)) {

                                                $valor = $row['descr'];
                                                $guardar = $row['formulario'];
                                                $formularios[$guardar] = $valor;
                                                if ($valor <> "Emergencia") {
                                                    ?>
                                                    <option value="<?= $guardar ?>"><?= $valor ?></option>
                                                    <?
                                                }
                                            }
                                            ?>
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
                            <div class="botones-form container-fluid" style="display:none">


                                <div class="form-row">

                                    <div class="form-group col-4 text-left">
                                        <? /* <button type="button" class="btn btn-custom" onclick="javascript:descartar();" id="descartar_caso" disabled>Descartar caso</button> */ ?>
                                        <button type="button" class='btn btn-custom' data-toggle="modal" data-target="#toggle_activo" title='Descartar caso' >Descartar caso</button>  
                                    </div>
                                    <div class="form-group col-8 text-right">
                                        <button type="button" onclick="javascript:guardar_continuar();" class="btn btn-custom" id="guardar_caso_c" disabled>Guardar y continuar</button>
                                        <button type="button" onclick="javascript:guardar_cerrar();" class="btn btn-custom"  id="guardar_caso" disabled>Guardar y cerrar</button>
                                    </div>
                                </div>
                            </div>
                            <?
                            include("include/formulario-b.inc.php");
                            include("include/formulario-c.inc.php");
                            include("include/formulario-d.inc.php");
                            include("include/formulario-e.inc.php");
                            include("include/formulario-f.inc.php");
                            include("modal/toggle_descartar_caso.php");
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
                            <div class="botones-form container-fluid" style="display:none">


                                <div class="form-row">
                                    <div class="form-group col-4 text-left">
                                        <? /* <button type="button" class="btn btn-custom" onclick="javascript:descartar();" id="descartar_caso" disabled>Descartar caso</button> */ ?>
                                        <button type="button" class='btn btn-custom' data-toggle="modal" data-target="#toggle_activo" title='Descartar caso' >Descartar caso</button>
                                    </div>
                                    <div class="form-group col-8 text-right">
                                        <button type="button" class="btn btn-custom" onclick="javascript:guardar_continuar();" id="guardar_caso_c2" disabled>Guardar y continuar</button>
                                        <button type="button" class="btn btn-custom" onclick="javascript:guardar_cerrar();" id="guardar_caso2" disabled>Guardar y cerrar</button>
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
<script src="<?= $hostactual ?>js/formularios.js"></script>

<script>

                                            window.onbeforeunload = function (evt) {
                                                if ($("#staticNCaso").val() !== "-") {
                                                    const endpoint = '<?= $hostactual ?>ajax/desbloquear-caso.php';
                                                    var formData = new FormData();
                                                    formData.append('staticNCaso', $('#staticNCaso').val());
                                                    navigator.sendBeacon(endpoint, formData);
                                                }
                                            };
<? /* $(window).on("beforeunload", function () {
  if ($("#staticNCaso").val() !== "-") {
  var parametros = $('#form_nuevo_caso').serialize();
  $.ajax({
  type: 'POST',
  url: "<?= $hostactual ?>ajax/desbloquear-caso.php?",
  async: false,
  data: parametros
  });
  //return "Guarde o descarte el caso antes de salir.";
  } //else {
  //$(window).off("beforeunload");
  //}


  }); */ ?>
                                            $(window).on("load", function () {
                                                if ($("#staticNCaso").val() !== "-") {
                                                    window.location.replace('<?= $hostactual ?>nuevo-caso');
                                                    //return "Guarde o descarte el caso antes de salir.";
                                                } //else {
                                                //$(window).off("beforeunload");
                                                //}
                                            });



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
                                                                var array = res.split(",");
                                                                $("#staticNCaso").val(array[0]);
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
                                                                var array = res.split(",");
                                                                $("#staticNCaso").val(array[0]);
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
                                                                var array = res.split(",");
                                                                $("#staticNCaso").val(array[0]);
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
                                                                var array = res.split(",");
                                                                $("#staticNCaso").val(array[0]);
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
                                                                var array = res.split(",");
                                                                $("#staticNCaso").val(array[0]);
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


</script>

</body>
</html>