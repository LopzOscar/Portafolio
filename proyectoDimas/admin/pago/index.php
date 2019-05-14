<?php 

session_start();

if ($_SESSION['privilegios'] !=1 ) {
	header('Location: ../index.php');
}

include_once '../template/header.php';

require_once '../class/Pago.php';

$pagos = metPago::recuperarTodos();

?>
 	<!--aqui inicia la edicion del contenido del sitio-->
	 
		<div class="row well">
			<div class="col-xs-10">

			<h1> Crear metodo de pago <a href="guardar.php" class="btn btn-primary"> + Nuevo </a></h1>
			 <br>

			<?php if (count($pagos) > 0): ?>

			<table class="table table-hover table-bordered">

				<thead>
				<tr>
					
					<th> Metodo de Pago </th>
					<th> Descripci&oacute;n</th>
					<th> idPago</th>
					<th> </th>
					<th> </th>

				</tr>
				</thead>

				<tbody>
				<?php foreach ($pagos as $registro): ?>
				
				<tr>
					<td><?php echo $registro['nombre']; ?></td>
					<td><?php echo $registro['descripcion']; ?></td>
					<td><?php echo $registro['idPago']; ?></td>
					<td> <a href="guardar.php?idPago= <?php echo $registro['idPago'] ?>" class="btn btn-success"> Editar </a></td>
					<td> <a href="eliminar.php?idPago= <?php echo $registro['idPago']; ?>" class="btn btn-danger" onclick="return confirm('¿Realmente desea eliminar este metodo de pago?')"> Eliminar </a></td>
				</tr>

				<?php	endforeach;	?>
				
				</tbody>

				<!-- td cabecera  -->
				<!-- th lines de tabla   -->

			</table>

			<?php else: ?>
			<p>	No hay metodos de pago ...	</p>
		
		<?php endif; ?>
		
		</div>
	</div>
		</div>
