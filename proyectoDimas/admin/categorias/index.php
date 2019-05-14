<?php 

session_start();

if ($_SESSION['privilegios'] !=1 ) {
	header('Location: ../index.php');
}

include_once '../template/header.php';

require_once '../class/Categoria.php';

$categoria = Categoria::recuperarTodos();

?>
 	<!--aqui inicia la edicion del contenido del sitio-->
	 
		<div class="row well">
			<div class="col-xs-10">

			<h1> Crear categoría <a href="guardar.php" class="btn btn-primary"> + Nuevo </a></h1>
			 <br>

			<?php if (count($categoria) > 0): ?>

			<table class="table table-hover table-bordered">

				<thead>
				<tr>
					
					<th> Categoria </th>
					<th> Descripcion </th>
					<th> </th>
					<th> </th>

				</tr>
				</thead>

				<tbody>
				<?php foreach ($categoria as $registro): ?>
				
				<tr>
					<td><?php echo $registro['nombre']; ?></td>
					<td><?php echo $registro['descripcion']; ?></td>
					<td> <a href="guardar.php?idCategoria= <?php echo $registro['idCategoria'] ?>" class="btn btn-success"> Editar </a></td>
					<td> <a href="eliminar.php?idCategoria= <?php echo $registro['idCategoria']; ?>" class="btn btn-danger" onclick="return confirm('¿Realmente desea eliminar esta Categoría?')"> Eliminar </a></td>
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
