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
require_once '../class/Materia.php';

$materia = Materia::recuperarTodos();

?>

	<div class="container well">
		<div class="table-responsive">
			<h1> Gestionar Materias 
				<a href="guardar.php">
				<button type="button" class="btn btn-primary">		
				<span class="glyphicon glyphicon-qrcode" ></span>
				Nuevo
				</button>
				</a>
			</h1>

			<?php if (count($materia) > 0 ): ?>
			<table class="table table-bordered table-striped table-hover">
				<thead>
				<tr>

					<th class="centrarTexto"> Materia </th>
					<th class="centrarTexto"> Descripci&oacute;n </th>
					
				</tr> 
			</thead><!--  -->

			<tbody>

				<?php foreach($materia as $registro): ?>

					<tr>
						<td class="centrarTexto"> <?php echo $registro['nombre']; ?> </td>
						<td class="centrarTexto"> <?php echo $registro['descripcion']; ?> </td>
						
						
					</tr>
				<?php endforeach; ?>

			</tbody>
		</table>

		<?php else: ?>

		<p> No hay Materias a&uacute;n </p>

		<?php endif; ?>

	</div>
</div>
<!-- Fin de la seccion de edición del contenido del sitio -->
<?php
include_once '../template/footer.php';
?>