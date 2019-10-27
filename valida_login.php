<?php 
session_start();
require_once 'conexion/conexion.php';

$usu=$_REQUEST['usu'];
$pass=$_REQUEST['pass'];
$pass_hash=md5($pass);

$sql=$mysqli->query("SELECT * FROM usuarios WHERE usuario ='$usu' AND pass='$pass_hash'");
$num_res=mysqli_fetch_array($sql);
if ($num_res>0) {  
      header("Location:dashboard.php");   
}else{
	echo "<script type='text/javascript'>
   var element = document.getElementById('esconder');
   element.classList.remove('esconder');
</script>"; 
}

$_SESSION["codigo"]=$num_res["cod_usu"];
$_SESSION["nombre"]=$num_res["nom_usu"];
$_SESSION["apellido"]=$num_res["ape_usu"];
$_SESSION["usuario"]=$num_res["usuario"];
$_SESSION["rol"]=$num_res["rol"];
  