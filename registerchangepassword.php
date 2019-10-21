<?php
session_start();
include 'conexion/conexion.php';
$pass_hash=md5($_POST['pass1']);

ModificarUsuario($pass_hash, $_POST['id'], $mysqli);

function ModificarUsuario($pass1, $id,$mysqli)
{
    $sentencia="UPDATE usuarios SET pass='".$pass1."' WHERE cod_usu='".$id."'";
    $mysql->query($sentencia) or die (mysql_error());  
}

echo "<script type='text/javascript'>
   var element = document.getElementById('esconder');
   element.removeAttribute('style');
</script>"; 
?>
 