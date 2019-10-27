<?php
session_start(); 
 ?>
 <?php                
  require_once 'conexion/conexion.php';
  $Idproduct = $_GET['id'];
  $sql=("select * from productos where codigo = $Idproduct");   
  $num_res=$mysqli->query($sql);             
  $res=mysqli_fetch_array($num_res);
  $id=$res["codigo"];
  $type=$res["tipo"];
  $model=$res["modelo"];
  $description=$res["Descripcion"];
  $price=$res["precio"];
  $creatorUser=$res['cod_usu'];
  ?>
  <?php 
  require_once 'conexion/conexion.php';
  $Idproduct = $_GET['id'];

  $consul=("SELECT * FROM productos WHERE codigo = $Idproduct");
  $consulta=$mysqli->query($consul);
  $num_rows=mysqli_fetch_array($consulta);
  $creatorUser=$num_rows['cod_usu'];

  if (($num_rows==0) || (($_SESSION["codigo"])!=$creatorUser)){ 
    header("Location:AccessDenied.php");
  }

 ?>
<?php 
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

    <title>Viendo Producto-SICI</title>

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
                <a class="nav-link active" href="dashboard.php">
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
                <a class="nav-link" href="users.php">
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
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
                <button class="btn btn-sm btn-outline-secondary">Compartir</button>
                <button class="btn btn-sm btn-outline-secondary">Exportar</button>
              </div>
            </div>
          </div>

          <div class="table-responsive">
            <table class="table table-striped  table-sm">
              <thead>
                <tr>
                  <th>#</th>
                  <th><?php echo $id; ?></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                    <th>Tipo Producto</th>
                   <!--Seleccionando el tipo para mostrar el nombre -->
                  <?php $consulttipo= $mysqli->query('select * from tipo_producto where cod_typeproduct="'.$res['tipo'].'" ');
                        while($type=mysqli_fetch_array($consulttipo)){ ?>

                        <th><?php echo $type["Nombre"]; ?></th>

                       <?php } ?>
                  </tr>
                  <tr>
                      <th>Modelo</th>
                  <!--Seleccionando el Modelo para mostrar el nombre -->
                  <?php $consultmodel= $mysqli->query('select * from model_product where cod_model="'.$res['modelo'].'" ');
                        while($model=mysqli_fetch_array($consultmodel)){ ?>

                        <th><?php echo $model["nombre"]; ?></th>

                       <?php } ?>
                </tr>
                <tr>
                <th>Descripción</th>
                  <th><?php echo $description; ?></th>
                </tr>
                <tr>
                <th>Precio</th>
                  <th>
                  <?php 
                    echo $price;
                  ?>
                      
                    </th>
                </tr>
                <tr>
                <th>Usuario</th>
                <th><?php 
                        $consulta=$mysqli->query('select * from usuarios where cod_usu="'.$res['cod_usu'].'"');
                        while($res2=mysqli_fetch_array($consulta)){ 
                   ?>
                  <?php $id= $res["cod_usu"] ?> <?php echo "<a href='viewuser.php?id=".$id."'>" . $res2['nom_usu'].' '.$res2['ape_usu'] . "</a>"; ?>
                  <?php } ?></th>
                </tr>
                
              </tbody>
            </table>

            <a class="btn btn-primary" href="productos.php">Volver</a>
            
          </div>
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