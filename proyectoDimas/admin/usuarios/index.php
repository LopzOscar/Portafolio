<?php 

session_start();

if ($_SESSION['privilegios'] !=1 ) {
	header('Location: ../index.php');
}

include_once '../template/header.php';

require_once '../class/Usuario.php';

$usuario = Usuario::recuperarTodos();

?>

	<div class= "row well">
		<div class="col-xs-10">
			
			<h1>Usuarios <a href="guardar.php" class="btn btn-primary"> + Nuevo </a></h1>
			 <br>

			<?php if (count($usuario) > 0 ): ?>

			<table class="table table-hover table-bordered">
				<thead>
				<tr>

					<th> Nombre </th>
					<th> Apellido Paterno </th>
					<th> Apellido Materno </th>
					<th> Email </th>
					<th> Telefono </th>
					<th> Estatus </th>
					<th> Privilegios </th>
					<th> </th>
					<th> </th>
				</tr>
			</thead>

			<tbody>

				<?php foreach($usuario as $registro): ?>

					<tr>
						<td> <?php echo $registro['nombre']; ?> </td>
						<td> <?php echo $registro['apellidoPat']; ?> </td>
						<td> <?php echo $registro['apellidoMat']; ?> </td>
						<td> <?php echo $registro['email']; ?> </td>
						<td> <?php echo $registro['telefono']; ?> </td>
						<td> <?php echo $registro['estatus']; ?> </td>
						<td> <?php echo $registro['privilegios']; ?> </td>
						<td> <a href="guardar.php?idUsuario=<?php echo $registro['idUsuario'] ?>" class="btn btn-success"> Editar </a> </td>
						<td> <a href="eliminar.php?idUsuario=<?php echo $registro['idUsuario'] ?>" class="btn btn-danger" onclick="return confirm('¿Realmente desea eliminar este Usuario?')"> Eliminar </a> </td>
					</tr>
				<?php endforeach; ?>

			</tbody>
		</table>

		<?php else: ?>

		<p> No hay usuarios registrados </p>

		<?php endif; ?>

	</div>
</div>
</div>
<!-- Fin de la seccion de edición del contenido del sitio -->
