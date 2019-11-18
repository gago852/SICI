<?php
session_start();
error_reporting(0);
 if (($_SESSION["rol"]) == 2 ) 
 {
    header("Location:AccessDenied.php");  
 }  
 ?>
 <?php                
  require_once 'conexion/conexion.php';
  $Iduser = $_GET['id'];
  $sql=("select * from usuarios where cod_usu = $Iduser");   
  $num_res=$mysqli->query($sql);             
  $res=mysqli_fetch_array($num_res);
  $id=$res["cod_usu"];
  $name=$res["nom_usu"];
  $lastname=$res["ape_usu"];
  $user=$res["usuario"];
  $pass=$res['pass'];
  $rol=$res['rol'];
  ?>
<?php 
if ( ($_SESSION["codigo"]) !='' ) {
 ?>
<?php 
  require_once 'conexion/conexion.php';
  $Iduser = $_GET['id'];

  $consul=("SELECT * FROM usuarios WHERE cod_usu= $Iduser");
  $consulta=$mysqli->query($consul);
  $num_rows=mysqli_fetch_array($consulta);

  if ($num_rows==0){ 
    header("Location:UserNotFound.php");
  }

 ?>
<!doctype html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="description" content="Software de gestion de inventario">
    <meta name="author" content="Aldair Jimenez y Gabriel Gomez">
    <link rel="icon" href="img/Favicon/faviconSICI.png">

    <title>Editar Usuario - SICI</title>
    <style type="text/css">
      .esconder{display: none;}
    </style>
    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css">

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/navbutton.css">
    <link href="css/fontawesome-all.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
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
      <div class="menu_bar2">
            <a href="#" class="bt-menu"><span class="icon-list2"></span>Menu</a>
          </div>
        <nav class="col-md-2  bg-light sidebar" id="nav">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link" href="dashboard.php">
                  <span data-feather="home"></span>
                  Inicio <span class="sr-only">(current)</span>
                </a>
              </li>
              <!--<li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file"></span>
                  Ordenes
                </a>
              </li>-->
              <li class="nav-item">
                <a class="nav-link" href="productos.php">
                  <span data-feather="shopping-cart"></span>
                  Productos
                </a>
              </li>
               <!--Solo el admin tendra acceso a Usuarios-->
               <?php if (($_SESSION["rol"]) == 1) {
              
              ?>
              <li class="nav-item">
                <a class="nav-link active" href="users.php">
                  <span data-feather="users"></span>
                  Usuarios
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="types.php">
                  <span data-feather="type"></span>
                  Tipos Productos
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="models.php">
                  <span data-feather="list"></span>
                  Modelos Productos
                </a>
              </li>
              <?php } ?>
              <li class="nav-item">
                <a class="nav-link" href="support.php">
                  <span data-feather="bar-chart-2"></span>
                  Soporte
                </a>
              </li>
            </ul>
          </div>
        </nav>
          <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2  border-bottom">
            <h1 class="h3">Editar Usuario</h1>
          </div>

          <div class="text-center">
          <div class="esconder alert alert-success  alert-dismissible" id="esconder" style="margin-top:18px;">
              <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                <strong>Exito!</strong> Usuario modificado exitosamente.
           </div>
          <form class="needs-validation" action="registeredituser.php" method="POST" novalidate>
            <div class="form-row">
              <div class="col-md-4 mb-3">
              <input type="hidden" name="id" value="<?php echo $Iduser; ?>">
                <label for="validationCustom01">Nombre</label>
                <input type="text" class="form-control" name="nombre" id="validationCustom01" value="<?php echo  $name; ?>"  required>
                <div class="invalid-feedback">
                  Ingrese su nombre
                </div>
                <div class="valid-feedback">
                  Perfecto!
                </div>
              </div>
            <div class="col-md-4 mb-3">
              <label for="validationCustom02">Apellido</label>
              <input type="text" class="form-control" name="apellido" id="validationCustom02" value="<?php echo  $lastname; ?>"  required>
                <div class="invalid-feedback">
                  Ingrese su apellido
                </div>
             <div class="valid-feedback">
                Perfecto!
              </div>
            </div>
            <div class="col-md-4 mb-3">
              <label for="validationCustomUsername">Usuario</label>
              <div class="input-group">
                <input type="text" class="form-control" name="usuario" id="validationCustomUsername" value="<?php echo  $user; ?>" aria-describedby="inputGroupPrepend" required>
                <div class="invalid-feedback">
                  Ingrese Usuario
                </div>
                <div class="valid-feedback">
                  Perfecto!
                </div>
              </div>
            </div>
          </div>
            <button class="btn btn-primary" type="submit">Modificar</button>
            <a class="btn btn-primary" href="users.php">Cancelar</a>
        </form>
          </div>
         </main>
      </div>
    </div>
    <?php
        if (isset($_POST['nombre']) && isset($_POST['apellido'])) {
           require_once "conexion/conexion.php";
           require_once "registeredituser.php";
         } 
    ?>
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

           <script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>

    <!-- Graphs -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script>
      var ctx = document.getElementById("myChart");
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
          datasets: [{
            data: [15339, 21345, 18483, 24003, 23489, 24092, 12034],
            lineTension: 0,
            backgroundColor: 'transparent',
            borderColor: '#007bff',
            borderWidth: 4,
            pointBackgroundColor: '#007bff'
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: false
              }
            }]
          },
          legend: {
            display: false,
          }
        }
      });
    </script> -->
  </body>
</html>
<?php } else {
      header("Location:index.php");
  } ?>