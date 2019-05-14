<?php 

session_start();

 if (!$_SESSION) {
 header('Location: ../../index.php');
 }else

 if ($_SESSION['privilegios'] == 1 || $_SESSION['privilegios'] == 2) {
 	
  }else{
 	header('Location: ../../index.php');
  }

include_once '../template/header.php';
require_once '../class/Generacion.php';

$generacion = Generacion::recuperarTodos();

?>

	<div class="container well">
		<div class="table-responsive">
			<h1> Gestionar Generaci&oacute;n 
				<a href="guardar.php">
				<button type="button" class="btn btn-primary">		
				<span class="glyphicon glyphicon-qrcode" ></span>
				Nuevo
				</button>
				</a>
			</h1>

			<?php if (count($generacion) > 0 ): ?>
			<table class="table table-bordered table-striped table-hover">
				<thead>
				<tr>

					<th class="centrarTexto"> Nombre </th>
					<th> </th>
					<th> </th>
				</tr>
			</thead>

			<tbody>

				<?php foreach($generacion as $registro): ?>

					<tr>
						<td class="centrarTexto"> <?php echo $registro['nombre']; ?> </td>
						
																	
						<td class="centrarTexto"> 
							<a href="guardar.php?idGeneracion= <?php echo $registro['idGeneracion']; ?>">
							<button type="button" class="btn btn-success">		
							<span class="glyphicon glyphicon-edit" ></span>
							Editar
							</button>
							</a>
						</td>	
						
						<td class="centrarTexto">
							<a href="eliminar.php?idGeneracion= <?php echo $registro['idGeneracion']; ?>" onclick=" return confirm('¿Estas seguro de eliminarla? Si a esta generación pertenece algún alumno, no podrá ser eliminada, asegurate de cambiar los alumnos de esta generación')">
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

		<p> No hay generaciones a&uacute;n </p>

		<?php endif; ?>

	</div>
</div>
<!-- Fin de la seccion de edición del contenido del sitio -->
<!-- <td class="centrarTexto">
						<?php foreach ($categoria as $item): 
						 	if($item['idCategoria'] == $registro['idCategoria']){
						 		echo $item['nombre'];
						 	}
						 endforeach; ?>
						</td> -->
<?php
include_once '../template/footer.php';
?>