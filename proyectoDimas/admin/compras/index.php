<?php 
session_start();

if (!$_SESSION) {
	header('Location: ../../login.php');
}else

if ($_SESSION['privilegios'] == 1 || $_SESSION['privilegios'] == 2) {
	
}else{
	header('Location: ../../index.php');
}

include_once('../template/header.php');

require_once '../class/Usuario.php';
$usuario = Usuario::recuperarTodos();

require_once('../class/Compra.php');
$compra = Compra::recuperarTodos();

require_once '../class/Envio.php';
$menvio = metEnvio::recuperarTodos();

require_once '../class/Pago.php';
$mpago = metPago::recuperarTodos();

?>

<div class="container-fluid">
	<div class="row well">

		<h1> Pedidos realizados 
		<!--
			<a href="guardar.php">
			<button type="button" class="btn btn-primary">		
			<span class="glyphicon glyphicon-qrcode" ></span>
			Nuevo
			</button>
			</a>
		-->	
		</h1>

		<?php if (count($compra) > 0): ?>
		
		<table class="table table-bordered table-striped table-hover">
			<thead>
			<tr>
				<th class="centrarTexto"> Folio </th>
				<th class="centrarTexto"> Usuario </th>
				<th class="centrarTexto"> Método de envío </th>
				<th class="centrarTexto"> Método de pago </th>
				<th class="centrarTexto"> IVA </th>
				<th class="centrarTexto"> Subtotal </th>
				<th class="centrarTexto"> Total </th>
				<th class="centrarTexto"> No. Cuenta </th>
				<th class="centrarTexto"> Fecha de compra </th>
				<th> </th>
				<th> </th>
			</tr>
			</thead>
			
			<tbody>
			
			<?php foreach($compra as $registro): ?>

			<tr>
				<td class="centrarTexto"><?php echo $registro['folio']; ?></td>

				<td class="centrarTexto">
					<?php foreach ($usuario as $usu): 
					 	if($usu['idUsuario'] == $registro['idUsuario']){
						 	echo $usu['nombre'];
						 }
					endforeach;	?>
				</td>

				<td class="centrarTexto">
					<?php foreach ($menvio as $env): 
					 	if($env['idEnvio'] == $registro['idEnvio']){
						 	echo $env['nombre'];
						 }
					endforeach;	?>
				</td>

				<td class="centrarTexto">
					<?php foreach ($mpago as $pag): 
					 	if($pag['idPago'] == $registro['idPago']){
						 	echo $pag['nombre'];
						 }
					endforeach;	?>
				</td>
				
				<td class="centrarTexto"> $ <?php echo $registro['iva']; ?></td>
				<td class="centrarTexto"> $ <?php echo $registro['subtotal']; ?></td>
				<td class="centrarTexto"> $ <?php echo $registro['total']; ?></td>
				<td class="centrarTexto"><?php echo $registro['num_cuenta']; ?></td>
				<td class="centrarTexto"><?php echo $registro['fecha_compra']; ?></td>
				
				<td class="centrarTexto">
					<a href="guardar.php?idCompra=<?php echo $registro['idCompra']; ?>">
					<button type="button" class="btn btn-success">		
					<span class="glyphicon glyphicon-edit" ></span>
					Editar
					</button>
					</a>
				</td>
				
				<td class="centrarTexto">
					<a href="eliminar.php?idCompra=<?php echo $registro['idCompra']; ?>" onclick= "return confirm('¿Esta seguro que desea eliminar este pedido?')">
					<button type="button" class="btn btn-danger">			
					<span class="glyphicon glyphicon-trash" ></span>
					Eliminar
					</button>
					</a>
				</td>
			</tr>

			<?php endforeach; ?>
			
			</tbody>

		</table>
		
		<?php else: ?>
		
		<p class="centrarTexto"> No hay registros en la base de Datos </p>
			
	<?php endif; ?>

