<?php 

session_start();

if ($_SESSION['privilegios'] !=1 ) {
	header('Location: ../index.php');
}

include_once '../template/header.php';

require_once '../class/Envio.php';

$envio = metEnvio::recuperarTodos();

?>
 	<!--aqui inicia la edicion del contenido del sitio-->
	 
		<div class="row well">
			<div class="col-xs-10">

			<h1> Crear metodo de envi&oacute; <a href="guardar.php" class="btn btn-primary"> + Nuevo </a></h1>
			 <br>

			<?php if (count($envio) > 0): ?>

			<table class="table table-hover table-bordered">

				<thead>
				<tr>
					
					<th> Metodo de Envi&oacute; </th>
					<th> Descripci&oacute;n</th>
					<th> idEnvio</th>
					<th> </th>
					<th> </th>

				</tr>
				</thead>

				<tbody>
				<?php foreach ($envio as $registro): ?>
				
				<tr>
					<td><?php echo $registro['nombre']; ?></td>
					<td><?php echo $registro['descripcion']; ?></td>
					<td><?php echo $registro['idEnvio']; ?></td>
					<td> <a href="guardar.php?idEnvio= <?php echo $registro['idEnvio'] ?>" class="btn btn-success"> Editar </a></td>
					<td> <a href="eliminar.php?idEnvio= <?php echo $registro['idEnvio']; ?>" class="btn btn-danger" onclick="return confirm('¿Realmente desea eliminar este metodo de envió?')"> Eliminar </a></td>
				</tr>

				<?php	endforeach;	?>
				
				</tbody>

				<!-- td cabecera  -->
				<!-- th lines de tabla   -->

			</table>

			<?php else: ?>
			<p>	No hay metodos de envi&oacute;...	</p>
		
		<?php endif; ?>
		
		</div>
	</div>
		</div>
	<!-- Fin de la seccion de edición del contenido -->
