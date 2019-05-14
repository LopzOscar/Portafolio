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

require_once '../class/Comentario.php';

$comentario = Comentario::recuperarTodos();

?>
 	<!--aqui inicia la edicion del contenido del sitio-->
	 
		<div class="row well">

			<h1> Hacer comentario 
				<a href="guardar.php">
				<button type="button" class="btn btn-primary">		
				<span class="glyphicon glyphicon-qrcode" ></span>
				Nuevo
				</button>
				</a>
			</h1>

			<?php if (count($comentario) > 0): ?>

			<table class="table table-bordered table-striped table-hover">

				<thead>
				<tr>
					
					<th class="centrarTexto"> Email </th>
					<th class="centrarTexto"> Mensaje </th>
					<th class="centrarTexto"> Estatus </th>
					<th class="centrarTexto"> Fecha Publicacion </th>
					<th>  </th>
					<th>  </th>

				</tr>
				</thead>

				<tbody>
				<?php foreach ($comentario as $registro): ?>
				
				<tr>
					<td class="centrarTexto"><?php echo $registro['email']; ?></td>
					<td><?php echo $registro['mensaje']; ?></td>
					<td class="centrarTexto"><?php echo $registro['estatus']; ?></td>
					<td class="centrarTexto"><?php echo $registro['fechaPub']; ?></td>
					
					<td class="centrarTexto">
						<a href="guardar.php?idComentario= <?php echo $registro['idComentario'] ?>" > 
						<button type="button" class="btn btn-success">		
						<span class="glyphicon glyphicon-edit" ></span>
						Editar
						</button>
						</a>
					</td>
					
					<td class="centrarTexto"> 
						<a href="eliminar.php?idComentario= <?php echo $registro['idComentario']; ?>"onclick=" return confirm('¿Estas seguro de eliminarlo?')">
						<button type="button" class="btn btn-danger">		
						<span class="glyphicon glyphicon-trash" ></span>
						Eliminar
						</button>
						</a>
						</td>
				
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
	<!-- Fin de la seccion de edición del contenido -->
<?php 
include_once '../template/footer.php';
?>