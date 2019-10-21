<?php                
                require_once 'conexion/conexion.php';
                $sql=$mysqli->query('select * from productos');                
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
                  <?php 
                        $consulta=$mysqli->query('select * from usuarios where cod_usu="'.$res['cod_usu'].'"');
                        while($res2=mysqli_fetch_array($consulta)){ 
                   ?>
                  <td><?php $id= $res["cod_usu"] ?> <?php echo "<a href='viewuser.php?id=".$id."'>" . $res2['nom_usu'].' '.$res2['ape_usu'] . "</a>"; ?> </td>
                  <?php } ?>
                  <td><a href="viewproduct.php?id=<?php echo $res["codigo"]; ?>" class="nav-item" title="Ver Producto" style="color: green;"><i data-feather="file-text"></i></a> - <a href="editproduct.php?id=<?php echo $res["codigo"]; ?>" title="Editar Producto"> <span data-feather="edit"></span></a> -<a href="#" title="Eliminar Producto" style="color: red;">  <span data-feather="file-minus"></span></a></td>
                </tr>
              <?php
                    }
                ?>      