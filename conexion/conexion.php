<?php
$mysqli = new mysqli("localhost", "root", "", "dbtechprosys");
$mysqli->query("SET NAMES 'utf8'");
/* comprobar la conexión */
if ($mysqli->connect_errno) {
    printf("Falló la conexión: %s\n", $mysqli->connect_error);
    exit();
}
?>
