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

    <title>Productos-SICI</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/navbutton.css">
    <link href="css/fontawesome-all.css" rel="stylesheet">

    <!--Scripts DataTable-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
      $(document).ready(function(){
        $('#TableProducts').DataTable({
          "language": {
            "lengthMenu": "Mostrar _MENU_ resultados por página",
            "zeroRecords": "Nada encontrado, lo sentimos",
            "info": "Viendo página _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
            "search":         "Buscar:",
            "loadingRecords": "Cargando...",
            "processing":     "Procesando...",
            "infoFiltered": "(Filtrado de _MAX_ registros totales)",
            "paginate": {
                          "first":      "First",
                          "last":       "Last",
                          "next":       "Siguiente",
                          "previous":   "Anterior"
                        },
                    }
        });
    });
    </script>
   
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
            <h1 class="h3">Productos de <?php echo $_SESSION['nombre'].' '.$_SESSION['apellido']; ?></h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
                <a href="newproduct.php" class="btn btn-sm btn-outline-secondary"><span data-feather="file-plus"></span> Nuevo Producto</a>
                <button class="btn btn-sm btn-outline-secondary"><span data-feather="download"></span> Exportar</button>
              </div>
            </div>
          </div>
         
          <div class="table-responsive">
            <table class="table table-striped table-sm" id="TableProducts">
              <thead>
                <tr>
                  <th>Codigo</th>
                  <th>Tipo</th>
                  <th>Modelo</th>
                  <th>Descripción</th>
                  <th>Precio</th>
                  <?php if (($_SESSION["rol"]) == 1){  ?> 
                  <th>Usuario</th>
                  <?php } ?>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
            <?php 
              if (($_SESSION["codigo"]) == 1) {
                include 'selectproductsA.php';
              } else {
                include 'selectproductsU.php';
              }
              
              ?>
              </tbody>
            </table>
          </div>
        </main>
         



      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
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