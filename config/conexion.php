<?php
# conectare la base de datos
$db_host = "127.0.0.1";
$db_user = "root";
$db_pass = "";
$db_name = "sistema144";

$con = @mysqli_connect($db_host/*0DB_HOST*/,$db_user /*DB_USER*/,$db_pass /*DB_PASS*/,$db_name /*DB_NAME*/);
if (!$con) {
    die("imposible conectarse: " . mysqli_error($con));
}
if (@mysqli_connect_errno()) {
    die("Conexión falló: " . mysqli_connect_errno() . " : " . mysqli_connect_error());
}
mysqli_set_charset($con, 'utf8');

date_default_timezone_set('America/Argentina/Buenos_Aires');
?>
