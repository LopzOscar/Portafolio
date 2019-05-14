<?php 

session_start();

if ($_SESSION['privilegios'] !=1 ) {
	header('Location: ../index.php');
}

include_once '../template/header.php';

require_once '../class/Contacto.php';

$contacto = Contacto::recuperarTodos();

?>
 	<!--aqui inicia la edicion del contenido del sitio-->
	 
		<div class="row well">
			<div class="col-xs-10">


			<h1> Mensajes de Contacto </h1>
			 <br>

			<?php if (count($contacto) > 0): ?>

			<table class="table table-hover table-bordered">

				<thead>
				<tr>
					
					<th> Nombre </th>
					<th> Apellido Paterno </th>
					<th> Apellido Materno </th>
					<th> Email </th>
					<th> URL </th>
					<th> Mensaje </th>
					<th></th>
					

				</tr>
				</thead>

				<tbody>
				<?php foreach ($contacto as $registro): ?>
				
				<tr>
					<td><?php echo $registro['nombre']; ?></td>
					<td><?php echo $registro['apellidoPat']; ?></td>
					<td><?php echo $registro['apellidoMat']; ?></td>
					<td><?php echo $registro['email']; ?></td>
					<td><?php echo $registro['url']; ?></td>
					<td><?php echo $registro['mensaje']; ?></td>
					<td> <a href="eliminar.php?idContacto= <?php echo $registro['idContacto']; ?>" class="btn btn-danger" onclick="return confirm('¿Realmente desea eliminar este Contacto?')"> Eliminar </a></td>
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
