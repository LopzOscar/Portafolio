<?php 

session_start();

if ($_SESSION['privilegios'] !=1 ) {
	header('Location: ../index.php');
}

include_once '../template/header.php';

require_once '../class/Faq.php';

$faq = Faq::recuperarTodos();

?>
 	<!--aqui inicia la edicion del contenido del sitio-->
	 
		<div class="row well">
			<div class="col-xs-10">

			<h1> Crear pregunta frecuente <a href="guardar.php" class="btn btn-primary"> + Nuevo </a></h1>
			 <br>

			<?php if (count($faq) > 0): ?>

			<table class="table table-hover table-bordered">

				<thead>
				<tr>
					
					<th> Pregunta </th>
					<th> Respuesta </th>
					<th> </th>
					<th> </th>

				</tr>
				</thead>

				<tbody>
				<?php foreach ($faq as $registro): ?>
				
				<tr>
					<td><?php echo $registro['pregunta']; ?></td>
					<td><?php echo $registro['respuesta']; ?></td>
					<td> <a href="guardar.php?idFaq= <?php echo $registro['idFaq'] ?>" class="btn btn-success"> Editar </a></td>
					<td> <a href="eliminar.php?idFaq= <?php echo $registro['idFaq']; ?>" class="btn btn-danger" onclick="return confirm('¿Realmente desea eliminar esta Pregunta Frecuente?')"> Eliminar </a></td>
				</tr>

				<?php	endforeach;	?>
				
				</tbody>

				<!-- td cabecera  -->
				<!-- th lines de tabla   -->

			</table>

			<?php else: ?>
			<p>	No hay preguntas registradas...	</p>
		
		<?php endif; ?>
		
		</div>
	</div>

	</div>
	<!-- Fin de la seccion de edición del contenido -->
