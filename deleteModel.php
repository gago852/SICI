<?php 
$mysqli = new mysqli("localhost", "root", "", "dbtechprosys");

EliminarProducto($_GET['id'], $mysqli);

function EliminarProducto($codigo, $mysqli)
{
    $sentencia="DELETE FROM model_product WHERE cod_model='".$codigo."'";
    $mysqli->query($sentencia) or die (mysqli_error());
}
sleep(1); // sleep for 2 seconds. Enough to display success message
   //header will execute after 2000ms(2s)
   header("location: models.php");

?>