<?php 
session_start();
if ($_SESSION['privilegios'] !=1) {

	header('location:../index.php');
}

include_once '../template/header.php';
require_once '../class/Comentario.php';

$comentario = Comentario::recuperarTodos();

?>
 	<!--aqui inicia la edicion del contenido del sitio-->
	 
		<div class="row well">
			<div class="col-xs-10">

			<h1>Comentarios de los Clientes</h1>
			 <br>

			<?php if (count($comentario) > 0): ?>

			<table class="table table-hover table-bordered">

				<thead>
				<tr>
					
					<th> Email </th>
					<th> Mensaje </th>
					<th> Estatus </th>
					<th> Fecha Publicación </th>
					<th>  </th>
				

				</tr>
				</thead>

				<tbody>
				<?php foreach ($comentario as $registro): ?>
				
				<tr>
					<td><?php echo $registro['email']; ?></td>
					<td><?php echo $registro['mensaje']; ?></td>
					<td><?php echo $registro['estatus']; ?></td>
					<td><?php echo $registro['fechaPub']; ?></td>
					<td> <a href="eliminar.php?idComentario= <?php echo $registro['idComentario']; ?>" class="btn btn-danger" onclick="return confirm('¿Realmente desea eliminar este Comentario?')"> Eliminar </a></td>
				</tr>

				<?php	endforeach;	?>
				
				</tbody>

				<!-- td cabecera  -->
				<!-- th lines de tabla   -->

			</table>

			<?php else: ?>
			<p>	No hay contactos registrados...	</p>
		
		<?php endif; ?>
		
		</div>
	</div>
	</div>
	<!-- Fin de la seccion de edición del contenido -->
