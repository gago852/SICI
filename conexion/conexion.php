<?php
$mysqli = new mysqli("localhost", "id11379003_root", "123456789", "id11379003_dbtechprosys");
$mysqli->query("SET NAMES 'utf8'");
/* comprobar la conexión */
if ($mysqli->connect_errno) {
    printf("Falló la conexión: %s\n", $mysqli->connect_error);
    exit();
}
?>
