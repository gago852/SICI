 <?php 
session_start();
error_reporting(0);
if ( ($_SESSION["codigo"]) =='' ) {
 ?>
<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Software de gestion de inventario">
    <meta name="author" content="Aldair Jimenez y Gabriel Gomez">
    <link rel="icon" href="img/Favicon/faviconSICI.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>SICI</title>

    <!-- Bootstrap core CSS -->
    
    <style>
      .esconder{display: none;}
    </style>
    <!-- Custom styles for this template -->
    <link href="css/estilos.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form action="index.php" method="POST" class="form-signin">
      <img class="mb-3ss" src="img/Logo/logo.png" alt="SICI 2019" width="260" height="90">
      <h1 class="h3 mb-3 font-weight-normal">Inicie Sesion</h1>

      <label for="usu" class="sr-only">Usuario</label>
      <input type="text" name="usu" id="usu" class="form-control" placeholder="Usuario">
      
      <label for="pass" class="sr-only">Contraseña</label>
      <input type="password" name="pass" id="pass" class="form-control" placeholder="Contraseña">
      <div class="esconder alert alert-danger fade in alert-dismissible" id="esconder" style="margin-top:18px;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
        <strong>Error!</strong> Usuario o contraseña incorrectos.
      </div>
      <div class="esconder alert alert-danger fade in alert-dismissible" id="nofound" style="margin-top:18px;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
        <strong>Error!</strong> Usuario no existe.
      </div>
      <input type="submit" value="Ingresar" class="btn btn-lg btn-primary btn-block">
      <p class="mt-5 mb-3 text-muted">&copy; 2019</p>
    </form>
    <?php
        if (isset($_POST['usu']) && isset($_POST['pass'])) {
           require_once "conexion/conexion.php";
           require_once "valida_login.php";
         } 
    ?>
  </body>
</html>
<?php } else {
      header("Location:dashboard.php");
  } ?>