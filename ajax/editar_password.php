<?php

include('is_logged.php'); //Archivo verifica que el usario que intenta acceder a la URL esta logueado
// checking for minimum PHP version

if (empty($_POST['user_id_mod'])) {
    echo 2;// . " - usuario:" . $_POST['user_id_mod'];
} else if (!empty($_POST['user_id_mod']) && !empty($_POST['user_password_new3']) && !empty($_POST['user_password_repeat3']) && ($_POST['user_password_new3'] === $_POST['user_password_repeat3'])) {
    require_once ("../config/conexion.php"); //Contiene funcion que conecta a la base de datos
    include_once("../include/utiles.inc.php");
    $user_id = intval($_POST['user_id_mod']);
    $session_u_id = intval($_POST['session_u_id']);
    $user_password = trim($_POST['user_password_new3']);
    $user_password_hash = password_hash($user_password, PASSWORD_DEFAULT);
    if ($user_id == $session_u_id) {
        $user_actual = trim($_POST['user_password_actual3']);
        $user_actual_hash = password_hash($user_password3, PASSWORD_DEFAULT);
        $sql = "SELECT * FROM usuarios WHERE id='" . $session_u_id . "'";
        $query = mysqli_query($con, $sql);
        $query_check_user = mysqli_num_rows($query);
        if ($query_check_user == 1) {
            $row = mysqli_fetch_array($query);
            if (password_verify($user_actual, $row['clave'])) {

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
                echo 5;
            }
        } else {
            echo 4;
        }
    } else {
        // write new user's data into database
        $sql = "UPDATE usuarios SET clave='" . $user_password_hash /* _hash */ . "' WHERE id='" . $user_id . "'";
        $query = mysqli_query($con, $sql);

        // if user has been added successfully
        if ($query) {
            echo 1;
        } else {
            echo 4;
        }
    }
} else {
    echo 4;
}    