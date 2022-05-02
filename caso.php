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


$sqljoin = "SELECT c.cancelado as ccancelado, c.id as idcaso, c.consultante_id as cconsultid, c.victima_id as cvictid, c.agresor_id as cagrid, c.fecha_fin as fechafin, c.denuncia as cdenuncia, c.armas as carmas, c.cubre_gastos as cgastos, c.socializo_situacion as csocializo, c.donde_recurrir as crecurrir, c.discapacidad as cdiscap, c.localizable_agresor as clocalizable, c.amenazas as camenazas, c.escolarizado as cescolarizado, c.editando as cedit, c.editpor as ceditpor, c.motivo_problematica_id as cmotivollp, c.motivo_varios_id as cmotivollv,  c.datos_ubicacion as cdatosub, c.operador_911 as coperador, "
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
    $enuso = true;
}
$desbloq_al_salir = "si";
if ($caso['cedit'] == "s" && $caso['ceditpor'] == $_SESSION['user_id']) {
    $desbloq_al_salir = "no";
}
$sqlarray = "SELECT * FROM lugar_residencia WHERE activo = 's' order by orden asc";
$queryarray = mysqli_query($con, $sqlarray);
while ($row = mysqli_fetch_array($queryarray)) {
    $lugar_residencia[$row['id']] = $row['descr'];
}

$sqlarray = "SELECT * FROM identidad_genero WHERE activo = 's' order by orden asc";
$queryarray = mysqli_query($con, $sqlarray);
while ($row = mysqli_fetch_array($queryarray)) {
    $identidad_genero[$row['id']] = $row['identidad'];
}
$sqlarray = "SELECT * FROM vinculo_consultante WHERE activo = 's' order by orden asc";
$queryarray = mysqli_query($con, $sqlarray);
while ($row = mysqli_fetch_array($queryarray)) {
    $vinculo_consultante[$row['id']] = $row['vinculo'];
}
$sqlarray = "SELECT * FROM nacionalidad WHERE activo = 's' order by orden asc";
$queryarray = mysqli_query($con, $sqlarray);
while ($row = mysqli_fetch_array($queryarray)) {
    $nacionalidad[$row['id']] = $row['descr'];
}
$sqlarray = "SELECT * FROM situacion_conyugal WHERE activo = 's' order by orden asc";
$queryarray = mysqli_query($con, $sqlarray);
while ($row = mysqli_fetch_array($queryarray)) {
    $situacion_conyugal[$row['id']] = $row['descr'];
}
$sqlarray = "SELECT * FROM tenencia_vivienda WHERE activo = 's' order by orden asc";
$queryarray = mysqli_query($con, $sqlarray);
while ($row = mysqli_fetch_array($queryarray)) {
    $tenencia_vivienda[$row['id']] = $row['descr'];
}
$sqlarray = "SELECT * FROM actividad WHERE activo = 's' order by orden asc";
$queryarray = mysqli_query($con, $sqlarray);
while ($row = mysqli_fetch_array($queryarray)) {
    $actividad[$row['id']] = $row['descr'];
}
$sqlarray = "SELECT * FROM vinculo_agresor WHERE activo = 's' order by orden asc";
$queryarray = mysqli_query($con, $sqlarray);
while ($row = mysqli_fetch_array($queryarray)) {
    $vinculo_agresor[$row['id']] = $row['vinculo'];
}
$sqlarray = "SELECT * FROM modalidad_violencia WHERE activo = 's' order by orden asc";
$queryarray = mysqli_query($con, $sqlarray);
while ($row = mysqli_fetch_array($queryarray)) {
    $modalidad_violencia[$row['id']] = $row['descr'];
}
$sqlarray = "SELECT * FROM tipo_violencia WHERE activo = 's' order by orden asc";
$queryarray = mysqli_query($con, $sqlarray);
while ($row = mysqli_fetch_array($queryarray)) {
    $tipo_violencia[$row['id']] = $row['descr'];
}
$sqlarray = "SELECT * FROM medidas_proteccion WHERE activo = 's' order by orden asc";
$queryarray = mysqli_query($con, $sqlarray);
while ($row = mysqli_fetch_array($queryarray)) {
    $medidas_proteccion[$row['id']] = $row['descr'];
}
$sqlarray = "SELECT * FROM derivacion WHERE activo = 's' order by orden asc";
$queryarray = mysqli_query($con, $sqlarray);
while ($row = mysqli_fetch_array($queryarray)) {
    $derivaciones[$row['id']] = $row['descr'];
}
$sqlarray = "SELECT * FROM motivo_problematica WHERE activo = 's' order by orden asc";
$queryarray = mysqli_query($con, $sqlarray);
while ($row = mysqli_fetch_array($queryarray)) {
    $motivo_llamada_p[$row['id']] = $row['descr'];
}
$sqlarray = "SELECT * FROM motivo_varios WHERE activo = 's' order by orden asc";
$queryarray = mysqli_query($con, $sqlarray);
while ($row = mysqli_fetch_array($queryarray)) {
    $motivo_llamada_v[$row['id']] = $row['descr'];
}
$sqlarray = "SELECT * FROM requerimiento WHERE activo = 's' order by orden asc";
$queryarray = mysqli_query($con, $sqlarray);
while ($row = mysqli_fetch_array($queryarray)) {
    $requerimiento[$row['id']] = $row['descr'];
}
$sqlarray = "SELECT * FROM tipo_maltrato WHERE activo = 's' order by orden asc";
$queryarray = mysqli_query($con, $sqlarray);
while ($row = mysqli_fetch_array($queryarray)) {
    $tipo_maltrato[$row['id']] = $row['descr'];
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
                        <button type="button" class="btn btn-custom float-right d-print-none" style="width:100px;" onclick="javascript:cancelar();" id="volver_caso">Volver</button>
                        <button type="button" class="btn btn-custom float-right d-print-none mr-3" onclick="javascript:window.print()" id="imprimir_caso">Imprimir</button>

                        <div class="row d-print-none<? /* bg-custom-light titulo-seccion */ ?>">
                            <div class='col-12'><h5 class="abm-card-title mx-2">Ver Caso <span id="loader"></span></h5></div>
                        </div>


                        <?
                        if ($enuso) {
                            ?>
                            <div id="alertaenuso" class="alert alert-danger d-print-none" style="display:block;" role="alert">
                                <? /* <button type="button" class="close"  onclick="javascript:$('#alertaenuso').hide(500)">&times;</button> */ ?>
                                <strong>Aviso!</strong>
                                <span>El caso Nº <?= $id_caso ?> se encuentra abierto y bloqueado para su edición</span>
                            </div>
                            <? /* <script>
                              setTimeout(function () {
                              $('#alertagd').hide(500);
                              }, 4000); // <-- time in milliseconds
                              </script> */ ?>
                            <?
                        }
                        ?>
                        <form class="form-horizontal" role="form" method="post" id="form_ver_caso" name="form_ver_caso">
                            <input type="hidden" id="usuario" name="usuario" value="<?= $_SESSION['user_id'] ?>">
                            <input type="hidden" id="UAcceso" name="UAcceso" value="<?= $_SESSION['acceso'] ?>">
                            <input type="hidden" id="bloqueado" name="bloqueado" value="<?= $caso['cedit'] ?>">
                            <input type="hidden" id="editpor" name="editpor" value="<?= $caso['ceditpor'] ?>">
                            <input type="hidden" id="desbloqalsalir" name="desbloqalsalir" value="<?= $desbloq_al_salir ?>">
                            <div class="form-row">
                                <div class="container-fluid" style="display:flex;">
                                    <div class="col-3">
                                        <label for="NumCaso" class="col-form-label">Nº de caso: </label>
                                        <input type="text" readonly class="form-control" id="NumCaso" name="NumCaso" placeholder="" value="<?= $id_caso ?>">
                                        <? /* <p style="font-weight:500;"><?= $id_caso ?></p> */ ?>
                                    </div>

                                    <div class="col-4">
                                        <label for="Origen" class="col-form-label text-right">Origen del llamado: </label>
                                        <input type="text" readonly class="form-control" id="Origen" name="Origen" placeholder="" value="<?= $caso['oorigen'] ?>">
                                        <? /* <p style="font-weight:500;"><?= $caso['oorigen'] ?></p> */ ?>
                                    </div>
                                    <div class="col-5">
                                        <label for="Motivo" class="col-form-label text-right">Motivo de la consulta: </label>
                                        <input type="text" readonly class="form-control" id="Motivo" name="Motivo" placeholder="" value="<?= $caso['mdescr'] ?>">
                                        <? /* <p style="font-weight:500;"><?= $caso['mdescr'] ?></p> */ ?>
                                    </div>
                                </div>    
                            </div>    
                            <?
                            if ($caso['mform'] == "B") {
                                include("include/ver-b.inc.php");
                            } else if ($caso['mform'] == "C") {
                                include("include/ver-c.inc.php");
                            } else if ($caso['mform'] == "D") {
                                include("include/ver-d.inc.php");
                            } else if ($caso['mform'] == "E") {
                                include("include/ver-e.inc.php");
                            } else if ($caso['mform'] == "F") {
                                include("include/ver-f.inc.php");
                            }
                            ?>  
                            <div class="botones-form container-fluid">


                                <div class="form-row">

                                    <div class="form-group col-12 text-center">
                                        <button type="button" style="width: 200px;" class="btn btn-custom d-print-none" onclick="javascript:cancelar();" id="descartar_caso">Volver</button>
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
<script src="<?= $hostactual ?>js/formularios.js?1"></script>

<script>
                                            window.onbeforeunload = function (evt) {
                                                if ($("#bloqueado").val() === "s") {
                                                    if ($("#desbloqalsalir").val() === "si") {
                                                        const endpoint = '<?= $hostactual ?>ajax/desbloquear-caso.php';
                                                        var formData = new FormData();
                                                        formData.append('staticNCaso', $('#NumCaso').val());
                                                        navigator.sendBeacon(endpoint, formData);
                                                    }
                                                }
                                            };

<? /*
  $(window).on("beforeunload", function () {
  var acceso = $("#UAcceso").val();
  if ($("#bloqueado").val() === "s") {
  $.ajax({
  type: 'POST',
  url: "<?= $hostactual ?>ajax/desbloquear-caso.php?",
  async: false,
  data: ({staticNCaso: $('#NumCaso').val()})
  });
  //return "Guarde o descarte el caso antes de salir.";
  } //else {
  //$(window).off("beforeunload");
  //}
  }); */ ?>

                                            $(document).ready(function () {
                                                var acceso = $("#UAcceso").val();
                                                if ($("#bloqueado").val() === "n" && acceso !== "l") {

                                                    //alert("n");
                                                    $.ajax({
                                                        type: 'POST',
                                                        url: "<?= $hostactual ?>ajax/bloquear-caso.php",
                                                        async: false,
                                                        data: ({staticNCaso: $('#NumCaso').val(), usuario: $('#usuario').val()}),
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
                                                            data: ({staticNCaso: $('#NumCaso').val()})
                                                        });

                                                        //return "Guarde o descarte el caso antes de salir.";
                                                    }
                                                }
                                                $(window).off("beforeunload");
                                                window.location.replace('<?= $hostactual ?>buscador');

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