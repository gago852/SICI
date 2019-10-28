<?php 
$mysqli = new mysqli("localhost", "id11379003_root", "123456789", "id11379003_dbtechprosys");

EliminarUsuario($_GET['id'], $mysqli);

function EliminarUsuario($codigo, $mysqli)
{
    $sentencia="DELETE FROM usuarios WHERE cod_usu='".$codigo."'";
    $mysqli->query($sentencia) or die (mysqli_error());
}
sleep(1); // sleep for 2 seconds. Enough to display success message
   //header will execute after 2000ms(2s)
   header("location: users.php");

?>