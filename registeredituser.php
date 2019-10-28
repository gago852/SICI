<?php
session_start();
$mysqli = new mysqli("localhost", "id11379003_root", "123456789", "id11379003_dbtechprosys");

ModificarUsuario($_POST['nombre'], $_POST['apellido'], $_POST['usuario'], $_POST['id'], $mysqli);

function ModificarUsuario($nom_usu, $ape_usu, $usuario, $id, $mysqli)
{
    $sentencia="UPDATE usuarios SET nom_usu='".$nom_usu."', ape_usu='".$ape_usu."', usuario='".$usuario."' WHERE cod_usu='".$id."'";
    $mysqli->query($sentencia) or die (mysqli_error());
}
sleep(1); // sleep for 2 seconds. Enough to display success message
   //header will execute after 2000ms(2s)
   header("location: users.php");
?>
