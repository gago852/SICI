<?php 
session_start();
error_reporting(0);
if ( ($_SESSION["codigo"]) !='' ) {
 ?>

<!doctype html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="description" content="Software de gestion de inventario">
    <meta name="author" content="Aldair Jimenez y Gabriel Gomez">
    <link rel="icon" href="img/Favicon/faviconSICI.png">
  <style>
    .esconder{
      display: none;
    }
  </style>
    <title>Cambiar Contraseña-SICI</title>

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/navbutton.css">
    <link href="css/fontawesome-all.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-dark sticky-top bg-primary flex-md-nowrap p-0">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#"><img src="img/Logo/logo2.png"> - <?php echo $_SESSION['usuario']; ?></a>

      <input class="form-control form-control-dark ">
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <div class="menu_bar">
            <a href="#" class="bt-menu"><i class="fas fa-bars"></i></a>
          </div>
        </li>
      </ul>
      <header class="header"> 
    <nav>
      <ul>
        <li><a href="#"><span data-feather="user"></span>Perfil</a></li>
        <li><a href="logout.php"><span data-feather="log-out"></span>Salir</a></li>
      </ul>
    </nav>
  </header>
    </nav>
    

    <div class="container-fluid">
      <div class="row">
       <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2  border-bottom">
            <h2>Hola <?php echo $_SESSION['nombre'].' '.$_SESSION['apellido']; ?></h2>
          </div>
          <div class="py5 text-center">
             <p class="lead">Acontinuacion encontraras las casillas para hacer el cambio de tu contraseña!</p>
          </div>
          <div class="py5 text-center">
             <p class="lead">Si no vas a realizar ningun cambio, <a href="dashboard.php" class="nav-link">ve al inicio <i class="em em-grimacing"></i></a></p> 
          </div>

          <form class="needs-validation" action="changepassword.php" method="POST" onSubmit="return validate()" novalidate>
            <div class="form-row">
              <div class="col-md-2 mb-3">
              </div>
            <div class="col-md-4 mb-3">
            <input type="hidden" name="id" value="<?php echo $Iduser; ?>">
              <label for="validationCustom02">Nueva Contraseña</label>
              <input type="password" class="form-control" name="pass1" id="validationCustom02" minlength="8"   required>
                <div class="invalid-feedback">
                  Ingrese su contraseña,al menos 8 caracteres
                </div>
             <div class="valid-feedback">
                Perfecto!
              </div>
            </div>
            <div class="col-md-4 mb-3">
              <label for="validationCustomUsername">Confirme Contraseña</label>
              <div class="input-group">
                <input type="password" class="form-control" name="pass2" id="validationCustomUsername"  aria-describedby="inputGroupPrepend" minlength="8" equalto="#validationCustom02" required>
                <div class="invalid-feedback">
                  Ingrese Contraseña,al menos 8 caracteres
                </div>
                <div class="valid-feedback">
                  Perfecto!
                </div>
              </div>
            </div>
          </div>
          <div class="alert alert-danger esconder  alert-dismissible" id="esconder2" style="margin-top:18px;">
           <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
             <strong>Error!</strong> Las contraseñas no coinciden.
          </div>
          <div class="alert alert-success  alert-dismissible" id="esconder" style="margin-top:18px;display: none">
           <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
             <strong>Exito!</strong> Contraseñas cambiadas exitosamente!
          </div>
            <button class="btn btn-primary" type="submit">Modificar</button>
            <a class="btn btn-primary" href="users.php">Cancelar</a>
        </form>


        

        

        </main>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="https://getbootstrap.com/assets/js/vendor/popper.min.js"></script>
    <script src="https://getbootstrap.com/dist/js/bootstrap.min.js"></script>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script src="js/navbutton.js"></script>
    <script src="js/menbutton.js"></script>
    <script src="js/dashboard.js"></script>
    
    <script type="text/javascript">
      
      if (screen.width<768) {

      var element = document.getElementById("input");
      element.classList.remove("w-100")
       }
    </script>
    <script>
      feather.replace()
    </script>

 <?php
   if (($_POST['pass1'] == $_POST['pass2']) && isset($_POST['submit'])) {
           require_once "conexion/conexion.php";
           require_once "registerchangepassword.php";
         }  
   if (( $_POST['pass1'] != $_POST['pass2'])) {
          echo "<script type='text/javascript'>
            var element = document.getElementById('esconder2');
            element.classList.remove('esconder');
            </script>"; 
   }
    ?>
  </body>
</html>
<?php } else {
      header("Location:index.php");
  } ?>