<?php 
include_once 'template/header.php';

require_once 'admin/class/Calificacion.php';
$calificacion = Calificacion::recuperarTodos();

require_once 'admin/class/Materia.php';
$materia = Materia::recuperarTodos();

require_once 'admin/class/Alumnos.php';
$alumno = Alumnos::recuperarTodos();

?>

<div class="container-fluid" >
	<div clas="row well" >
		
		<?php if (count($calificacion)>0) {
			foreach ($calificacion as $cal) {
		?>
		<center>

			<div clas="col-sx-12 col-md-3 well" >
				

			<table class="table table-bordered table-striped table-hover">
				<thead>
				<tr>

					<th class="centrarTexto"> Alumno </th>
					<th class="centrarTexto"> Materia </th>
					<th class="centrarTexto"> Calificacion </th>
					
				</tr>
			</thead>

			<tbody>
					<tr class="centrarTexto">
						<td> 
							<?php foreach ($alumno as $al): 
						 		if($al['idAlumno'] == $cal['idAlumno']){
						 			echo $al['nombre'];
						 		}
						 	endforeach; ?>
						</td>

						<td> 
							<?php foreach ($materia as $mat): 
						 		if($mat['idMateria'] == $cal['idMateria']){
						 			echo $mat['nombre'];
						 		}
						 	endforeach; ?>
						</td>

						<td> <?php echo $cal['calificacion']; ?> </td>
					</tr>
				

			</tbody>
		</table>




				
			</div>

		</center>

		<?php 
		} 
	}else{
		echo '<div class="row well"><p> No hay Alumnos dados de alta <p> </div>'; 
	}
	?>

<?php 
include_once 'template/footer.php'; 
?>
	</div>
</div>
