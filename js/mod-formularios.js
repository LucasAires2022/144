$('.numdocumento').bind('keypress', function(e) {
  var keyCode = (e.which) ? e.which : event.keyCode;
  return !(keyCode > 31 && (keyCode < 48 || keyCode > 90) && (keyCode < 97 || keyCode > 122));
});
function mostrar_sector(cons) {
    $(cons).fadeIn(500);
}
function ocultar_sector(cons) {

    $(cons).fadeOut(500);

}
function mostrar_mes_ano(){
        if ($('#TiempoDesdeB').val() === "Meses"){
            $('#MesesB').fadeIn(500);
        } else if ($('#TiempoDesdeB').val() === "Años"){
            $('#AñosB').fadeIn(500);
        }
    }
$('#TiempoDesdeB').change(function () {
    $('.mes-año').hide();
    $('#' + $(this).val() + 'B').fadeIn(500);
});

$('#ProteccionAB').change(function () {
    $('#ValProteccionAB').val($('#ProteccionAB').val());
    if ($('#ValProteccionAB').val() === ''){
        $('#vencimiento').hide(500);
        //$('#VencimientoAB').val('0');
    } else {
        $('#vencimiento').show(500);
    }
});

$("#toggleEmergenciaNo").click(function () {
    $("#toggleEmergencia").val("No");
});
$("#toggleEmergenciaSi").click(function () {
    $("#toggleEmergencia").val("Si");
});

$("#toggleConsultanteNoB").click(function () {
    $("#toggleConsultanteB").val("No");
});
$("#toggleConsultanteSiB").click(function () {
    $("#toggleConsultanteB").val("Si");
});

$("#toggleConsultanteNoD").click(function () {
    $("#toggleConsultanteD").val("No");
});
$("#toggleConsultanteSiD").click(function () {
    $("#toggleConsultanteD").val("Si");
});

$("#toggleConviveNEB").click(function () {
    $("#toggleConviveB").val("No especifica");
});
$("#toggleConviveNoB").click(function () {
    $("#toggleConviveB").val("No");
});
$("#toggleConviveSiB").click(function () {
    $("#toggleConviveB").val("Si");
});

$("#toggleHijosNEB").click(function () {
    $("#toggleHijosB").val("No especifica");
});
$("#toggleHijosNoB").click(function () {
    $("#toggleHijosB").val("No");
});
$("#toggleHijosSiB").click(function () {
    $("#toggleHijosB").val("Si");
});

$("#toggleHermanosNED").click(function () {
    $("#toggleHermanosD").val("No especifica");
});
$("#toggleHermanosNoD").click(function () {
    $("#toggleHermanosD").val("No");
});
$("#toggleHermanosSiD").click(function () {
    $("#toggleHermanosD").val("Si");
});

$("#toggleAdiccionesNoAB").click(function () {
    $("#toggleAdiccionesAB").val("No");
});
$("#toggleAdiccionesSiAB").click(function () {
    $("#toggleAdiccionesAB").val("Si");
});

$("#toggleDenunciasNEAB").click(function () {
    $("#toggleDenunciasAB").val("No especifica");
});
$("#toggleDenunciasNoAB").click(function () {
    $("#toggleDenunciasAB").val("No");
});
$("#toggleDenunciasSiAB").click(function () {
    $("#toggleDenunciasAB").val("Si");
});

$("#toggleProteccionNEAB").click(function () {
    $("#toggleProteccionAB").val("No especifica");
});
$("#toggleProteccionNoAB").click(function () {
    $("#toggleProteccionAB").val("No");
});
$("#toggleProteccionSiAB").click(function () {
    $("#toggleProteccionAB").val("Si");
});

$("#toggleArmasNoAB").click(function () {
    $("#toggleArmasAB").val("n");
});
$("#toggleArmasFAB").click(function () {
    $("#toggleArmasAB").val("f");
});
$("#toggleArmasBAB").click(function () {
    $("#toggleArmasAB").val("b");
});

$("#toggleGastosNoAB").click(function () {
    $("#toggleGastosAB").val("n");
});
$("#toggleGastosSiAB").click(function () {
    $("#toggleGastosAB").val("s");
});

$("#toggleSocializoNoAB").click(function () {
    $("#toggleSocializoAB").val("n");
});
$("#toggleSocializoSiAB").click(function () {
    $("#toggleSocializoAB").val("s");
});

$("#toggleRecurrirNoAB").click(function () {
    $("#toggleRecurrirAB").val("n");
});
$("#toggleRecurrirSiAB").click(function () {
    $("#toggleRecurrirAB").val("s");
});

$("#toggleDiscapacidadNoAB").click(function () {
    $("#toggleDiscapacidadAB").val("n");
});
$("#toggleDiscapacidadSiAB").click(function () {
    $("#toggleDiscapacidadAB").val("s");
});

$("#toggleLocalizarlaNoAB").click(function () {
    $("#toggleLocalizarlaAB").val("n");
});
$("#toggleLocalizarlaSiAB").click(function () {
    $("#toggleLocalizarlaAB").val("s");
});

$("#toggleAmenazasNoAB").click(function () {
    $("#toggleAmenazasAB").val("n");
});
$("#toggleAmenazasSiAB").click(function () {
    $("#toggleAmenazasAB").val("s");
});

$('#ActividadB').change(function () {
    $('#ValActividadB').val($('#ActividadB').val());
});
$('#HMaltratoB1').change(function () {
    $('#ValHMaltratoB1').val($('#HMaltratoB1').val());
});
$('#HMaltratoB2').change(function () {
    $('#ValHMaltratoB2').val($('#HMaltratoB2').val());
});
$('#HMaltratoB3').change(function () {
    $('#ValHMaltratoB3').val($('#HMaltratoB3').val());
});
$('#HMaltratoB4').change(function () {
    $('#ValHMaltratoB4').val($('#HMaltratoB4').val());
});
$('#HMaltratoB5').change(function () {
    $('#ValHMaltratoB5').val($('#HMaltratoB5').val());
});
$('#HMaltratoB6').change(function () {
    $('#ValHMaltratoB6').val($('#HMaltratoB6').val());
});
$('#HMaltratoB7').change(function () {
    $('#ValHMaltratoB7').val($('#HMaltratoB7').val());
});
$('#HMaltratoB8').change(function () {
    $('#ValHMaltratoB8').val($('#HMaltratoB8').val());
});
$('#HMaltratoB9').change(function () {
    $('#ValHMaltratoB9').val($('#HMaltratoB9').val());
});
$('#HMaltratoB10').change(function () {
    $('#ValHMaltratoB10').val($('#HMaltratoB10').val());
});
$('#ActividadAB').change(function () {
    $('#ValActividadAB').val($('#ActividadAB').val());
});
$('#ModoViolenciaAB').change(function () {
    $('#ValModoViolenciaAB').val($('#ModoViolenciaAB').val());
});
$('#TipoViolenciaAB').change(function () {
    $('#ValTipoViolenciaAB').val($('#TipoViolenciaAB').val());
});
$('#DerivacionesAB').change(function () {
    $('#ValDerivacionesAB').val($('#DerivacionesAB').val());
});
$('#DerivacionesC').change(function () {
    $('#ValDerivacionesC').val($('#DerivacionesC').val());
});
$('#DerivacionesAD').change(function () {
    $('#ValDerivacionesAD').val($('#DerivacionesAD').val());
});
$('#selectOrigen').change(function () {
    $('#ValselectOrigen').val($('#selectOrigen').val());
});
$('#selectMotivo').change(function () {
    $('#ValselectMotivo').val($('#selectMotivo').val());
});
$('#RequerimientoF').change(function () {
    $('#ValRequerimientoF').val($('#RequerimientoF').val());
});
$('#MaltratoD').change(function () {
    $('#ValMaltratoD').val($('#MaltratoD').val());
});
$('#HMaltratoD1').change(function () {
    $('#ValHMaltratoD1').val($('#HMaltratoD1').val());
});
$('#HMaltratoD2').change(function () {
    $('#ValHMaltratoD2').val($('#HMaltratoD2').val());
});
$('#HMaltratoD3').change(function () {
    $('#ValHMaltratoD3').val($('#HMaltratoD3').val());
});
$('#HMaltratoD4').change(function () {
    $('#ValHMaltratoD4').val($('#HMaltratoD4').val());
});
$('#HMaltratoD5').change(function () {
    $('#ValHMaltratoD5').val($('#HMaltratoD5').val());
});
$('#HMaltratoD6').change(function () {
    $('#ValHMaltratoD6').val($('#HMaltratoD6').val());
});
$('#HMaltratoD7').change(function () {
    $('#ValHMaltratoD7').val($('#HMaltratoD7').val());
});
$('#HMaltratoD8').change(function () {
    $('#ValHMaltratoD8').val($('#HMaltratoD8').val());
});
$('#HMaltratoD9').change(function () {
    $('#ValHMaltratoD9').val($('#HMaltratoD9').val());
});
$('#HMaltratoD10').change(function () {
    $('#ValHMaltratoD10').val($('#HMaltratoD10').val());
});
$("#toggleArmasNoD").click(function () {
    $("#toggleArmasD").val("n");
});
$("#toggleArmasFD").click(function () {
    $("#toggleArmasD").val("f");
});
$("#toggleArmasBD").click(function () {
    $("#toggleArmasD").val("b");
});

$("#toggleGastosNoD").click(function () {
    $("#toggleGastosD").val("n");
});
$("#toggleGastosSiD").click(function () {
    $("#toggleGastosD").val("s");
});

$("#toggleSocializoNoD").click(function () {
    $("#toggleSocializoD").val("n");
});
$("#toggleSocializoSiD").click(function () {
    $("#toggleSocializoD").val("s");
});

$("#toggleRecurrirNoD").click(function () {
    $("#toggleRecurrirD").val("n");
});
$("#toggleRecurrirSiD").click(function () {
    $("#toggleRecurrirD").val("s");
});

$("#toggleDiscapacidadNoD").click(function () {
    $("#toggleDiscapacidadD").val("n");
});
$("#toggleDiscapacidadSiD").click(function () {
    $("#toggleDiscapacidadD").val("s");
});

$("#toggleLocalizarlaNoD").click(function () {
    $("#toggleLocalizarlaD").val("n");
});
$("#toggleLocalizarlaSiD").click(function () {
    $("#toggleLocalizarlaD").val("s");
});

$("#toggleAmenazasNoD").click(function () {
    $("#toggleAmenazasD").val("n");
});
$("#toggleAmenazasSiD").click(function () {
    $("#toggleAmenazasD").val("s");
});

$("#toggleEscolarizadoNoD").click(function () {
    $("#toggleEscolarizadoD").val("n");
});
$("#toggleEscolarizadoSiD").click(function () {
    $("#toggleEscolarizadoD").val("s");
});


function agregar_hijo() {
    $("#btnagregarhijo").attr('disabled', true);
    var numhijo = parseInt($("#aqhijos").val()) + 1;
    $('#HijoB' + numhijo).fadeIn(500);
    $("#aqhijos").val(numhijo);
    if (numhijo > 1) {
        $("#btnquitarhijo").attr('disabled', false);
    }
    if (numhijo < 10) {
        $("#btnagregarhijo").attr('disabled', false);
    }

}

function quitar_hijo() {
    $("#btnquitarhijo").attr('disabled', true);
    var numhijo = parseInt($("#aqhijos").val());
    $('#HijoB' + numhijo).fadeOut(500);
    $("#aqhijos").val(numhijo - 1);
    if (numhijo > 2) {
        $("#btnquitarhijo").attr('disabled', false);
    }
    if (numhijo <= 10) {
        $("#btnagregarhijo").attr('disabled', false);
    }

}
function agregar_hermano() {
    $("#btnagregarhermano").attr('disabled', true);
    var numhno = parseInt($("#aqhermano").val()) + 1;
    $('#HermanoD' + numhno).fadeIn(500);
    $("#aqhermano").val(numhno);
    if (numhno > 1) {
        $("#btnquitarhermano").attr('disabled', false);
    }
    if (numhno < 10) {
        $("#btnagregarhermano").attr('disabled', false);
    }

}

function quitar_hermano() {
    $("#btnquitarhermano").attr('disabled', true);
    var numhno = parseInt($("#aqhermano").val());
    $('#HermanoD' + numhno).fadeOut(500);
    $("#aqhermano").val(numhno - 1);
    if (numhno > 2) {
        $("#btnquitarhermano").attr('disabled', false);
    }
    if (numhno <= 10) {
        $("#btnagregarhermano").attr('disabled', false);
    }

}

$('.selectpicker').selectpicker({
    style: 'bs-multiple-select'
});


