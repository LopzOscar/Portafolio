<?php
   error_reporting(0);
   include_once'template/header.php';
   require_once 'lib/carrito_compras.php';
?>

       <!--Sección para editar el contenido del sitio-->
		<div class="row well">
			
      <div class="col-xs-12">

        <h1>Mi Carrito</h1>

        <?php 

           if(isset($_SESSION['email'])){

            
              $num_productos =0;

              for($i=0; $i < count($mi_carrito); $i++ ){

                if($mi_carrito[$i] != NULL){

                  $num_productos = $num_productos +1;

                }


            }

            if($num_productos > 0){

              ?> 

              <table class="table">
                  <thead>
                      <th>Imagen</th>
                      <th>Producto</th>
                      <th>Precio</th>
                      <th>Cantidad</th>
                      <th>SubTotal</th>
                  </thead>
                  <tbody>
                      <?php
                      if(isset($mi_carrito)){
                        $total = 0;
                        for($i=0; $i<count($mi_carrito); $i++ ){

                          if($mi_carrito[$i] != NULL){

                            ?>
                            <tr>
                              <td> <img src="admin/productos/<?php echo $mi_carrito[$i]['url']; ?>" width="100" height="100"></td>
                              <td> <?php echo $mi_carrito[$i]['nombre']; ?> </td>
                              <td> <?php echo '$ '. $mi_carrito[$i]['precio']; ?></td>
                              <td>
                                <form action="carrito.php" method="post">
                                  <input type="hidden" name="idProductoActualizar" value="<?php echo $i; ?>" >
                                  <input id="inp" type="number" name="cantidadActualizada" min="1" max="<?php echo $mi_carrito[$i]['stock'] ?>" value="<?php echo $mi_carrito[$i]['cantidad']; ?>" >
                                  <input type="image" name="update" src="images/update.png" width="80" height="80">
                                </form>
                              </td>
                              <td>
                                <?php 
                                $subtotal = $mi_carrito[$i]['precio'] * $mi_carrito[$i]['cantidad'];
                                $total = $total + $subtotal;
                                echo '$ '.$subtotal;
                                ?>
                              </td>
                              <td>
                                <form action="carrito.php" method="post">
                                  <input type="hidden" name="idProductoEliminar" value="<?php echo $i; ?>" >
                                  <input type="image" name="delete" src="images/delete.png" width="60px" height="60px">
                                </form>

                              </td>

                            </tr>
                            <?php
                        }
                      }
                    }
                    ?>
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td>Total</td>
                      <td> <?php echo '$ '.$total; ?></td>

                    </tr>

                  </tbody>  
              </table>

              <form action="proceso_compra.php" method="post">
                <input type="hidden" name="total" value="<?php echo $total; ?>">
                <a href="productos.php" class="btn btn-lg btn-success">Seguir Comprando</a>
                <input type="submit" value="Comprar" class="btn btn-lg btn-primary">
              </form>
              <?php

            }else{

              echo '<p> No hay productos en el carrito <a href="productos.php"> comprar ahora </a> </p>';
            }
          
        }else{

          echo '<p> Vaya parese que aun no ingresas a tu cuenta, Ingresa a tu cuenta para poder comprar <a href="login.php"> Iniciar Sesión </a></p>';
          echo '<p> Si aún no eres miembro te invitamos a <a href="registrar.php"> Registrarte </a> </p>';
        } 

        ?>


      </div>
    </div>
<?php
  include_once'template/footer.php';
?>		