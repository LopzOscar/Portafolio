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
require_once '../class/Calificacion.php';
$calif = Calificacion::recuperarTodos();

require_once '../class/Materia.php';
$materia = Materia::recuperarTodos();

require_once '../class/Alumnos.php';
$alumno = Alumnos::recuperarTodos();

?>

	<div class="container well">
		<div class="table-responsive">
			<h1> Gestionar Calificaci&oacute;n 
				<a href="guardar.php">
				<button type="button" class="btn btn-primary">		
				<span class="glyphicon glyphicon-qrcode" ></span>
				Nuevo
				</button>
				</a>
			</h1>

			<?php if (count($calif) > 0 ): ?>
			<table class="table table-bordered table-striped table-hover">
				<thead>
				<tr>

					<th class="centrarTexto"> Calificaci&oacute;n </th>
					<th class="centrarTexto"> Materia </th>
					<th class="centrarTexto"> Alumno </th>
					<th> </th>
					<th> </th>
				</tr>
			</thead>

			<tbody>

				<?php foreach($calif as $registro): ?>

					<tr>
						<td class="centrarTexto"> <?php echo $registro['calificacion']; ?> </td>

						<td class="centrarTexto"> <?php foreach ($materia as $mat): 
						 		if($mat['idMateria'] == $registro['idMateria']){
						 			echo $mat['nombre'];
						 		}
						 	endforeach; ?> </td>
						
						<td class="centrarTexto"> <?php foreach ($alumno as $al): 
						 		if($al['idAlumno'] == $registro['idAlumno']){
						 			echo $al['nombre'];
						 		}
						 	endforeach; ?>
												
						<td class="centrarTexto"> 
							<a href="guardar.php?idCalificacion= <?php echo $registro['idCalificacion']; ?>">
							<button type="button" class="btn btn-success">		
							<span class="glyphicon glyphicon-edit" ></span>
							Editar
							</button>
							</a>
						</td>	
						
						<td class="centrarTexto">
							<a href="eliminar.php?idCalificacion= <?php echo $registro['idCalificacion']; ?>" onclick=" return confirm('¿Estas seguro de eliminarlo?')">
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

		<p> No hay calificaciones a&uacute;n </p>

		<?php endif; ?>

	</div>
</div>
<!-- Fin de la seccion de edición del contenido del sitio -->
<?php
include_once '../template/footer.php';
?>