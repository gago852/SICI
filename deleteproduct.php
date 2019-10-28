<?php 
$mysqli = new mysqli("localhost", "id11379003_root", "123456789", "id11379003_dbtechprosys");

EliminarProducto($_GET['id'], $mysqli);

function EliminarProducto($codigo, $mysqli)
{
    $sentencia="DELETE FROM productos WHERE codigo='".$codigo."'";
    $mysqli->query($sentencia) or die (mysqli_error());
}
sleep(1); // sleep for 2 seconds. Enough to display success message
   //header will execute after 2000ms(2s)
   header("location: productos.php");

?>