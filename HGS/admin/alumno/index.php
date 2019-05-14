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
require_once '../class/Alumnos.php';
$alumno = Alumnos::recuperarTodos();

require_once '../class/Generacion.php';
$generacion = Generacion::recuperarTodos();

?>

	<div class="container well">
		<div class="table-responsive">
			<h1> Gestionar Alumnos 
				<a href="guardar.php">
				<button type="button" class="btn btn-primary">		
				<span class="glyphicon glyphicon-qrcode" ></span>
				Nuevo
				</button>
				</a>
			</h1>

			<?php if (count($alumno) > 0 ): ?>
			<table class="table table-bordered table-striped table-hover">
				<thead>
				<tr>

					<th class="centrarTexto"> Nombre </th>
					<th class="centrarTexto"> Apellido Paterno </th>
					<th class="centrarTexto"> Apellido Materno </th>
					<th class="centrarTexto"> Matricula </th>
					<th class="centrarTexto"> Telefono </th> 
					<th class="centrarTexto"> Dirección </th>
					<th class="centrarTexto"> Comunidad </th>
					<th class="centrarTexto"> Estatus </th>
					<th class="centrarTexto"> Generaci&oacute;n </th>
					<th> </th>
					<th> </th>
				</tr>
			</thead>

			<tbody>

				<?php foreach($alumno as $registro): ?>

					<tr>
						<td class="centrarTexto"> <?php echo $registro['nombre']; ?> </td>
						<td class="centrarTexto"> <?php echo $registro['apellidoP']; ?> </td>
						<td class="centrarTexto"> <?php echo $registro['apellidoM']; ?> </td>
						<td class="centrarTexto"> <?php echo $registro['matricula']; ?> </td>
						<td class="centrarTexto"> <?php echo $registro['telefono']; ?> </td>
						<td class="centrarTexto"> <?php echo $registro['direccion']; ?> </td>
						<td class="centrarTexto"> <?php echo $registro['comunidad']; ?> </td>
						<td class="centrarTexto"> <?php
							 	if($registro['estatus']==1){
							 		echo "Activo";
							 	}else{
							 		echo "Inactivo";
							 	}
						 		?> </td>
						<td class="centrarTexto"> <?php foreach ($generacion as $gen): 
						 		if($gen['idGeneracion'] == $registro['idGeneracion']){
						 			echo $gen['nombre'];
						 		}
						 	endforeach; ?> </td>	

						<td class="centrarTexto"> 
							<a href="guardar.php?idAlumno=<?php echo $registro['idAlumno'] ?>">
							<button type="button" class="btn btn-success">		
							<span class="glyphicon glyphicon-edit" ></span>
							Editar
							</button>
							</a>
						</td>	
						
						<td class="centrarTexto">
							<a href="eliminar.php?idAlumno=<?php echo $registro['idAlumno'] ?>" onclick=" return confirm('¿Estas seguro de eliminarlo?')">
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

		<p> No hay usuarios registrados </p>

		<?php endif; ?>

	</div>
</div>
<!-- Fin de la seccion de edición del contenido del sitio -->
<?php
include_once '../template/footer.php';
?>