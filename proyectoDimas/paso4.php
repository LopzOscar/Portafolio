<?php 

	require_once 'admin/class/Usuario.php';
	require_once 'admin/class/Envio.php';
	require_once 'admin/class/Pago.php';
	include_once 'template/header.php';

    $_SESSION['idPago'] = $_POST['idPago'];
	$usuario = Usuario::buscarPorId($_SESSION['idUsuario']);
	$envio = metEnvio::buscarPorId($_SESSION['idEnvio']);
	$pago = metPago::buscarPorId($_SESSION['idPago']);

	$mi_carrito = $_SESSION['carrito'];


	//echo $_SESSION['total'];
	//echo $_SESSION['idEnvio'];
	//echo $_SESSION['idPago'];



	?>

	 <div class="col-xs-12">
    <h1 style="text-align: center">Datos de tu pedido</h1>
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
                               <?php echo $mi_carrito[$i]['cantidad']; ?>  
                               
                              </td>
                              <td>
                                <?php 
                                $subtotal = $mi_carrito[$i]['precio'] * $mi_carrito[$i]['cantidad'];
                                $total = $total + $subtotal;
                                echo '$ '.$subtotal;
                                ?>
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
                      <td></td>
                      <td></td>
                      

                    </tr>

                  </tbody>  
              </table>

             
              <?php

            }else{

            }
          
        }else{

         
        } 

        ?>


      </div>
	
	<form method="POST" action="lib/confirmar_compra.php" >

		<input type="hidden" name="folio" value="<?php echo $usuario->getIdUsuario().$usuario->getNombre().$_SESSION['idEnvio'].$_SESSION['idPago'];?>">
		<input type="hidden" name="idUsuario" value="<?php echo $_SESSION['idUsuario']; ?>">
		<input type="hidden" name="idPago" value="<?php echo $_SESSION['idPago']; ?>">
		<input type="hidden" name="idEnvio" value="<?php echo $_SESSION['idEnvio']; ?>">
		<input type="hidden" name="iva" value="<?php echo $_SESSION['total'] * .16; ?>">
		<input type="hidden" name="subTotal" value="<?php echo $_SESSION['total']; ?>">
		<input type="hidden" name="total" value="<?php echo $_SESSION['total'] + ($_SESSION['total'] * .16); ?>">
		<input type="hidden" name="numCuenta" value="<?php echo $usuario->getIdUsuario().$_SESSION['idEnvio'].$_SESSION['idPago']; ?>">
		<input type="hidden" name="fechaCompra" value="<?php echo date('Y-m-d') ?>">

	<table class="table table-hover table-bordered">
		<thead>
					<tr>
						<th> Datos del cliente</th>
						<th> pago </th>
						<th> Envi&oacute; </th>
						<th> Monto de la compra </th>
						
					</tr>
		</thead>
<tbody>

<td>
<h4>Nombre: <p><?php echo $usuario->getNombre()?> <?php echo $usuario->getApellidoPat() ?> <?php echo $usuario->getApellidoMat() ?> </p></h4>
<h4>E-mail: <p><?php echo $usuario->getEmail()?> </p></h4>		
<h4>Estado: <p><?php echo $usuario->getEstado()?> </p></h4>
<h4>Ciudad: <p><?php echo $usuario->getCiudad()?> </p></h4>
<h4>Calle: <p><?php echo $usuario->getCalle() ?> </p></h4>
<h4>Num. Exterior: <p><?php echo $usuario->getNumExterior() ?> </p></h4>
<h4>Num. Interior: <p><?php echo $usuario->getNumInterior() ?> </p></h4>
<h4>Colonia: <p><?php echo $usuario->getColonia() ?> </p></h4>
<h4>C&oacute;digo postal: <p><?php echo $usuario->getCp()?> </p></h4>
<h4>Tel&eacute;fono: <p><?php echo $usuario->getTelefono() ?> </p></h4>
</td>



<td><h4><p><?php echo $pago->getNombre()?> </p></h4>
<h4><p><?php echo $pago->getDescripcion(); ?> </p></h4></td>




	
<td><h4><p><?php echo $envio->getNombre()?> </p></h4>
<h4><p><?php echo $envio->getDescripcion(); ?> </p></h4></td>

<td><h4><p> <?php echo $_SESSION['total']; ?> </p></h4></td>


</tbody>
</table>

 <p><button type="submit" class="btn btn-primary">		
			<span class="glyphicon glyphicon-shopping-cart" ></span>
			CONFIRMAR COMPRA
			</button> </p>


			<p><a href="carrito.php">
			<button type="button" class="btn btn-danger">		
			<span class="glyphicon glyphicon-remove-circle" ></span>
			Cancelar
			</button>
			</a></p>

</form>
<?php
include_once 'template/footer.php';
?>