<?php
session_start();
include 'conexion/conexion.php';

ModificarTipo($_POST['nombre'], $_POST['id'] , $mysqli);

function ModificarTipo($nombre ,$id , $mysqli)
{
    $sentencia="UPDATE tipo_producto SET Nombre='".$nombre."' WHERE cod_typeproduct='".$id."'";
    $mysqli->query($sentencia) or die (mysql_error());  
}
sleep(1); // sleep for 2 seconds. Enough to display success message
   //header will execute after 2000ms(2s)
   header("location: types.php");
?>