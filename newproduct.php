<?php 
session_start();
if ( ($_SESSION["codigo"]) !='' ) {
 ?>

<!doctype html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="description" content="Software de gestion de inventario">
    <meta name="author" content="Aldair Jimenez y Gabriel Gomez">
    <link rel="icon" href="img/Favicon/favicon3.png">

    <title>Nuevo Producto-SICI</title>
        <style type="text/css">
      .esconder{display: none;}
    </style>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css">

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/navbutton.css">
    <link href="css/fontawesome-all.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">SICI-<?php echo $_SESSION['usuario']; ?></a>
      <input class="form-control form-control-dark " id="input" type="text" placeholder="Buscar" aria-label="Buscar">
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
                <a class="nav-link active" href="productos.php">
                  <span data-feather="shopping-cart"></span>
                  Productos
                </a>
              </li>
               <!--Solo el admin tendra acceso a Usuarios-->
               <?php if (($_SESSION["rol"]) == 1) {
              
              ?>
              <li class="nav-item">
                <a class="nav-link " href="users.php">
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
                <a class="nav-link" href="#">
                  <span data-feather="bar-chart-2"></span>
                  Reportes
                </a>
              </li>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2  border-bottom">
            <h1 class="h3">Nuevo Producto</h1>
          </div>
          <div class="text-center">
           <div class="esconder alert alert-success  alert-dismissible" id="esconder" style="margin-top:18px;">
              <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                <strong>Exito!</strong> Producto añadido exitosamente.
           </div>
          <form class="needs-validation" action="newproduct.php" method="POST" novalidate>
            <div class="form-row">
              <div class="col-md-3 mb-3">
                <label for="validationCustom01">Tipo Producto</label>
                <select class="form-control" name="tipo" id="validationCustom01"  required>
                <option value="">Seleccione tipo de Producto</option>
                  <?php 
                  include 'conexion/conexion.php';
                  $consulttype=$mysqli->query('SELECT * FROM tipo_producto ORDER BY Nombre ASC')or die(mysql_error()); 
                        while($type=mysqli_fetch_array($consulttype)){ ?>
                        <option value="<?php echo $type['cod_typeproduct'] ?>"><?php echo $type["Nombre"] ?></option>
                  <?php   } ?>
                </select> 
                <div class="invalid-feedback">
                  Seleccion el tipo
                </div>
                <div class="valid-feedback">
                  Perfecto!
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="validationCustom01">Modelo Producto</label>
                <select class="form-control" name="modelo" id="validationCustom01"   required>
                <option value="">Seleccione marca de Producto</option>
                  <?php 
                  include 'conexion/conexion.php';
                  $consultmodel=$mysqli->query('SELECT * FROM model_product ORDER BY nombre ASC')or die(mysql_error()); 
                        while($model=mysqli_fetch_array($consultmodel)){ ?>
                        <option value="<?php echo $model['cod_model'] ?>"><?php echo $model["nombre"] ?></option>
                  <?php   } ?>
                </select> 
                <div class="invalid-feedback">
                  Seleccione la marca
                </div>
                <div class="valid-feedback">
                  Perfecto!
                </div>
              </div>
            <div class="col-md-3 mb-3">
              <label for="validationCustom02">Descripcion</label>
              <input type="text" class="form-control" name="Descripcion" id="validationCustom02" placeholder="Descripcion"  required>
                <div class="invalid-feedback">
                  Agregue una descripcion 
                </div>
             <div class="valid-feedback">
                Perfecto!
              </div>
            </div>
            <div class="col-md-3 mb-3">
              <label for="validationCustomUsername">Precio</label>
              <div class="input-group">
                <input type="number" class="form-control" name="precio" id="validationCustomUsername" placeholder="Precio" aria-describedby="inputGroupPrepend" required>
                <div class="invalid-feedback">
                  Ingrese un precio
                </div>
                <div class="valid-feedback">
                  Perfecto!
                </div>
              </div>
            </div>
          </div>
            <button class="btn btn-primary" type="submit">Crear</button>
            <a href="productos.php" class="btn btn-primary">Productos</a>
        </form>
          </div>
         </main>
      </div>
    </div>
      <?php
        if (isset($_POST['tipo']) && isset($_POST['Descripcion'])) {
           require_once "conexion/conexion.php";
           require_once "registernewproduct.php";
         } 
    ?>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
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
  </body>
</html>
<?php } else {
      header("Location:index.php");
  } ?>