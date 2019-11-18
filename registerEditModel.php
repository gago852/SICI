<?php
session_start();
include 'conexion/conexion.php';

ModificarModel($_POST['nombre'], $_POST['id'] , $mysqli);

function ModificarModel($nombre ,$id , $mysqli)
{
    $sentencia="UPDATE model_product SET nombre='".$nombre."' WHERE cod_model='".$id."'";
    $mysqli->query($sentencia) or die (mysql_error());  
}
sleep(1); // sleep for 2 seconds. Enough to display success message
   //header will execute after 2000ms(2s)
   header("location: models.php");
?>