<?php

function cortar_string($string, $largo) {
    $marca = "<!--corte-->";

    if (strlen($string) > $largo) {
        $string = wordwrap($string, $largo, $marca);
        $string = explode($marca, $string);
        $string = $string[0];
    }
    return $string;
}

function mayus_to_upper($string) {
    $string = str_replace('á', 'Á', $string);
    $string = str_replace('é', 'É', $string);
    $string = str_replace('í', 'Í', $string);
    $string = str_replace('ó', 'Ó', $string);
    $string = str_replace('ú', 'Ú', $string);
    $string = str_replace('ñ', 'Ñ', $string);
    return $string;
}

function preparar_url($string) {
    $resultado = trim(strtolower(sanear_string_para_url($string)));
    $resultado = str_replace(" ", "-", $resultado);
    return substr($resultado, 0, 120);
}

function codificar_string($string) {

    return trim(mb_convert_encoding($string, "UTF-8", "ISO-8859-15"));
}

function sanear_string_para_url($string) {
    $string = trim(mb_convert_encoding($string, "UTF-8", "ISO-8859-15"));
    $string = str_replace(array('á', 'ä', 'Á', 'Ä'), array('a', 'a', 'A', 'A'), $string);
    $string = str_replace(array('é', 'ë', 'É', 'Ë'), array('e', 'e', 'E', 'E'), $string);
    $string = str_replace(array('í', 'ï', 'Í', 'Ï'), array('i', 'i', 'I', 'I'), $string);
    $string = str_replace(array('ó', 'ö', 'Ó', 'Ö'), array('o', 'o', 'O', 'O'), $string);
    $string = str_replace(array('ú', 'ü', 'Ú', 'Ü'), array('u', 'u', 'U', 'U'), $string);
    $string = str_replace(array('ñ', 'Ñ'), array('n', 'N'), $string);
    $string = str_replace('...', ' ', $string);
    $string = str_replace(array("\\", "¨", "º", "~", "#", "@", "|", "!", "\"", "·", "$", "%", "&", "/", "(", ")", "?", "'", "¡", "¿", "[", "^", "`", "]", "+", "}", "{", "¨", "´", ">", "< ", ";", ",", ":", ".", "¿"), '', $string);
    $string = str_replace(array('ñ', 'Ñ'), array('n', 'N'), $string);
    return $string;
}

function sanear_string($string) {

    $string = trim($string);

    $string = str_replace(
            array('á', 'ä', 'Á', 'Ä'), array('&aacute;', '&auml;', '&Aacute;', '&Auml;'), $string
    );

    $string = str_replace(
            array('é', 'ë', 'É', 'Ë'), array('&eacute;', '&euml;', '&Eacute;', '&Euml;'), $string
    );

    $string = str_replace(
            array('í', 'ï', 'Í', 'Ï'), array('&iacute;', '&iuml;', '&Iacute;', '&Iuml;'), $string
    );

    $string = str_replace(
            array('ó', 'ö', 'Ó', 'Ö'), array('&oacute;', '&ouml;', '&Oacute;', '&Ouml;'), $string
    );

    $string = str_replace(
            array('ú', 'ü', 'Ú', 'Ü'), array('&uacute;', '&uuml;', '&Uacute;', '&Uuml;'), $string
    );

    $string = str_replace(
            array('ñ', 'Ñ'), array('&ntilde;', '&Ntilde;'), $string
    );
    return $string;
}

function sanear_string_para_busqueda($string) {


    $string = str_replace('...', ' ', $string);

    $string = str_replace(
            array("\\", "¨", "º", "~",
                "#", "@", "|", "!", "\"",
                "·", "$", "%", "&", "/",
                "(", ")", "?", "'", "¡",
                "¿", "[", "^", "`", "]",
                "+", "}", "{", "¨", "´",
                ">", "< ", ";", ",", ":",
                ".", "¿", "-"), '', $string
    );

    return $string;
}

function limitar_string($string, $cant) {
    $array_str = explode(" ", $string);
    if (count($array_str) > $cant) {
        $resultado = "";
        for ($i = 0; $i < $cant; $i++) {
            $resultado .= $array_str[$i] . " ";
        }
        if (substr($resultado, -1) == "," || substr($resultado, -1) == ".") {
            $resultado = substr($resultado, 0, -1);
        }
        return trim($resultado) . "...";
    } else {
        return $string;
    }
}

function fix_tags($string) {
    $tags = explode(",", trim($string));
    if (count($tags) > 1) {
        $fixed = sanear_para_keywords(/* str_replace(' ', '', */$string/* ) */);
        if (substr($fixed, -1) == ",") {
            $fixed = substr($fixed, 0, -1);
        }
        $fixed = $fixed;
        /* echo "pasa $fixed"; */
    } else {
        $fixed = sanear_para_keywords(str_replace(" ", ",", $string));
        /* echo "no pasa"; */
    }
    return strtolower($fixed);
}

function sanear_para_keywords($string) {

    $string = trim(mb_convert_encoding($string, "UTF-8", "ISO-8859-15"));

    $string = str_replace(
            array('á', 'ä', 'Á', 'Ä'), array('a', 'a;', 'A', 'A'), $string
    );

    $string = str_replace(
            array('é', 'ë', 'É', 'Ë'), array('e', 'e', 'E', 'E'), $string
    );

    $string = str_replace(
            array('í', 'ï', 'Í', 'Ï'), array('i', 'i', 'I', 'I'), $string
    );

    $string = str_replace(
            array('ó', 'ö', 'Ó', 'Ö'), array('o', 'o', 'O', 'O'), $string
    );

    $string = str_replace(
            array('ú', 'ü', 'Ú', 'Ü'), array('u', 'u', 'U', 'U'), $string
    );

    $string = str_replace(
            array('ñ', 'Ñ'), array('n', 'N'), $string
    );

    return $string;
}

function sort_by_date($a, $b) {
    return strcmp($b['fecha'], $a['fecha']);
}

function con_log($data) {
    echo '<script>';
    echo 'console.log(' . json_encode($data) . ')';
    echo '</script>';
}

function getAcceso($str) {
    switch ($str) {
        case 'a':
            return 'Administrador';
        case 's':
            return 'Supervisor';
        case 'o':
            return 'Operador';
        case 'l':
            return 'Lector';
        default:
            return 'Lector';
    }
}

function get_string_between($string, $start, $end) {
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0)
        return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
}
