<?php
session_start();
if (isset($_POST['nombre'])) {
	
	$mysqli = new mysqli("localhost", "root", "", "dbtechprosys");

    $nombre=$_POST['nombre'];
    $usuario=$_SESSION["codigo"];


    $sql=("INSERT INTO model_product(nombre,usuario) VALUES ('$nombre','$usuario')") or die (mysqli_error());

if ($mysqli->query($sql) == TRUE ){
	
    sleep(1); // sleep for 2 seconds. Enough to display success message
   //header will execute after 2000ms(2s)
   header("location: models.php");
}
else {
	header("Location:newmodels.php");
 }
} else {
	header("Location:newmodels.php");
}
?>
