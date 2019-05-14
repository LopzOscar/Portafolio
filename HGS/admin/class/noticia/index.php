<?php 

session_start();

if($_SESSION['privilegios'] != 1 ){

	header('location: ../index.php');
}

include_once '../template/header.php';
require_once'../class/Noticias.php';

$noticias = Noticias::recuperarTodos();

 ?>

 	<!-- seccion para editar el contenido del sitio   -->

			<div class="row well">

				<div class="col-xs-10">

					<h1>Noticias <a href="guardar1.php" class="btn btn-primary"> + Nuevo </a> </h1>
					 <br>

					<?php if(count($noticias) > 0): ?>

				<table class="table table-hover table-bordered">
					<thead>
					<tr>
						<th> Imagen </th>
						<th> Nombre </th>
						<th> Noticia </th>
						<th> Fecha de Publicaci&oacute;n </th>
						<th>  </th>
						<th>  </th>
					</tr>
					</thead>

					<tbody>

						<?php foreach($noticias as $registro):  ?>

					<tr>
						<td> <img src="<?php echo $registro['url']; ?>" width="150" height="150"> </td>
						<td> <?php echo $registro['nombre']; ?> </td>
						<td> <?php echo $registro['noticia']; ?> </td>
						<td> <?php echo $registro['fechaPub']; ?> </td>

						<td> <a href="guardar1.php?idNoticias=<?php echo $registro['idNoticias'] ?>" class="btn btn-success"> Editar</a></td>
						<td> <a href="eliminar.php?idNoticias=<?php echo $registro['idNoticias'] ?>" class="btn btn-danger" onclick="return confirm('¿Realmente desea eliminar esta noticia?')" > Eliminar </a></td>
					</tr>

					<?php  endforeach; ?>

					</tbody>
						<!-- td cabecera  -->
						<!-- th lines de tabla   -->

				</table>	

			<?php else: ?>

			<p>No hay noticias </p>
		<?php endif; ?>

				</div>
			</div>

			<!-- Fin de seccion de edicion para el sitio. -->

