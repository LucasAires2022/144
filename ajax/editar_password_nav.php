<?php
include('is_logged.php'); //Archivo verifica que el usario que intenta acceder a la URL esta logueado
// checking for minimum PHP version

if (empty($_POST['nav_user_id_mod'])) {
    echo 2;
} else if (!empty($_POST['nav_user_id_mod']) && !empty($_POST['nav_user_password_new3']) && !empty($_POST['nav_user_password_repeat3']) && ($_POST['nav_user_password_new3'] === $_POST['nav_user_password_repeat3'])) {
    require_once ("../config/conexion.php"); //Contiene funcion que conecta a la base de datos
    include_once("../include/utiles.inc.php");
    $user_id = intval($_POST['nav_user_id_mod']);
    $user_password = trim($_POST['nav_user_password_new3']);
    // crypt the user's password with PHP 5.5's password_hash() function, results in a 60 character
    // hash string. the PASSWORD_DEFAULT constant is defined by the PHP 5.5, or if you are using
    // PHP 5.3/5.4, by the password hashing compatibility library
    $user_password_hash = password_hash($user_password, PASSWORD_DEFAULT);


    // write new user's data into database
    $sql = "UPDATE usuarios SET clave='" . $user_password_hash /* _hash */ . "' WHERE id='" . $user_id . "'";
    $query = mysqli_query($con, $sql);

    // if user has been added successfully
    if ($query) {
        echo 1;
    } else {
        echo 4;
    }
} else {
    echo 4;
}