<!DOCTYPE html>
<html lang="es">

    <?php
    //$hostactual = "http://$_SERVER[HTTP_HOST]/mujer/";
    $hostactual = "https://$_SERVER[HTTP_HOST]/casos/";
    ?>

    <head>
        <title>Registro de Casos 0800 66 MUJER / 144 CABA</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="noindex,follow"/>
        <meta name="webmaster" content="Alejandro Salerno"/>
        <link rel="shortcut icon" href="<?=$hostactual?>img/mujer.png"/>
        <link rel=icon href='<?=$hostactual?>img/mujer.png' sizes="32x32" type="image/png">


        <link href="<?= $hostactual ?>css/bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="<?= $hostactual ?>css/bootstrap-select.css" rel="stylesheet" type="text/css" />
        <link href="<?= $hostactual ?>css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= $hostactual ?>css/mujer.css?v=20191223" rel="stylesheet" type="text/css" />

        <?
        if (isset($ubicacion) && $ubicacion == "LOGIN") {
            ?>
            <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <? }
        ?>

    </head>



