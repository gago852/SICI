<?php
session_start();
if (isset($_POST['nombre'])) {
	
	$mysqli = new mysqli("localhost", "id11379003_root", "123456789", "id11379003_dbtechprosys");

    $nombre=$_POST['nombre'];
    $usuario=$_SESSION["codigo"];


    $sql=("INSERT INTO tipo_producto(Nombre,usuario) VALUES ('$nombre','$usuario')") or die (mysql_error());

if ($mysqli->query($sql) == TRUE ){
	
	sleep(1); // sleep for 2 seconds. Enough to display success message
   //header will execute after 2000ms(2s)
   header("location: types.php");
}
else {
	header("Location:newtypes.php");
 }
} else {
	header("Location:newtypes.php");
}
?>
