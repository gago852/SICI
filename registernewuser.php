<?php
if (isset($_POST['nombre'])) {
	
	$mysqli = new mysqli("localhost", "id11379003_root", "123456789", "id11379003_dbtechprosys");

    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $usuario=$_POST['usuario'];
    $contraseña=$_POST['password'];
    $rol=$_POST['rol'];
    $pass_hash=md5($contraseña);

    //$pass_hash=password_hash($contraseña, PASSWORD_DEFAULT, array("cost"=>12));


    $sql=("INSERT INTO usuarios(nom_usu,ape_usu,usuario,pass,rol,estado) VALUES ('$nombre','$apellido','$usuario','$pass_hash','$rol',1)");

if ($mysqli->query($sql) == TRUE ){
	
	sleep(1); // sleep for 2 seconds. Enough to display success message
   //header will execute after 2000ms(2s)
   header("location: users.php");
}
else {
	header("Location:newuser.php");
 }
} else {
	header("Location:newuser.php");
}
?>
