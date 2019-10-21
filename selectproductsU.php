<?php                
                require_once 'conexion/conexion.php';
                $user=$_SESSION["codigo"];
                $sql=$mysqli->query('select * from productos where cod_usu= "'.$user.'"') or die (mysql_error());                
                while($res=mysqli_fetch_array($sql)){
                ?>
                <tr>
                  <td><?php echo $res["codigo"]; ?></td>
                  <!--Seleccionando el tipo para mostrar el nombre -->
                  <?php $consulttipo= $mysqli->query('select * from tipo_producto where cod_typeproduct="'.$res['tipo'].'" ');
                        while($type=mysqli_fetch_array($consulttipo)){ ?>

                        <td><?php echo $type["Nombre"]; ?></td>

                       <?php } ?>

                  <!--Seleccionando el Modelo para mostrar el nombre -->
                  <?php $consultmodel= $mysqli->query('select * from model_product where cod_model="'.$res['modelo'].'" ');
                        while($model=mysqli_fetch_array($consultmodel)){ ?>

                        <td><?php echo $model["nombre"]; ?></td>

                       <?php } ?>

                  <td><?php echo $res["Descripcion"]; ?></td>
                  <td><?php echo $res["precio"]; ?></td>
                  <td><a href="viewproduct.php?id=<?php echo $res["codigo"]; ?>" class="nav-item" title="Ver Producto" style="color: green;"><i data-feather="file-text"></i></a> - <a href="#" title="Editar Producto"> <span data-feather="edit"></span></a> -<a href="#" title="Eliminar Producto" style="color: red;">  <span data-feather="file-minus"></span></a></td>
                </tr>
              <?php
                    } 
                ?>      