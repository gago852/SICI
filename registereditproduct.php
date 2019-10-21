<?php
session_start();
include 'conexion/conexion.php';

ModificarUsuario($_POST['tipo'], $_POST['modelo'], $_POST['Descripcion'], $_POST['precio'], $_POST['id'], $mysqli);

function ModificarUsuario($tipo, $modelo, $Descripcion, $precio, $id, $mysqli)
{
    $sentencia="UPDATE productos SET tipo='".$tipo."', modelo='".$modelo."', Descripcion='".$Descripcion."', precio='".$precio."' WHERE codigo='".$id."'";
    $mysqli->query($sentencia) or die (mysql_error());  
}
sleep(1); // sleep for 2 seconds. Enough to display success message
   //header will execute after 2000ms(2s)
   header("location: productos.php");
?>
