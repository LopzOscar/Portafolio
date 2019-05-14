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

require_once '../class/Usuario.php';
$usuario = Usuario::recuperarTodos();

?>

	<div class="container well">
		<div class="table-responsive">
			<h1> Gestionar Usuarios 
				<a href="guardar.php">
				<button type="button" class="btn btn-primary">		
				<span class="glyphicon glyphicon-qrcode" ></span>
				Nuevo
				</button>
				</a>
			</h1>

			<?php if (count($usuario) > 0 ): ?>
			<table class="table table-bordered table-striped table-hover">
				<thead>
				<tr>

					<th class="centrarTexto"> Nombre </th>
					<th class="centrarTexto"> Email </th>
					
					<th> </th>
					<th> </th>
				</tr>
			</thead>

			<tbody>

				<?php foreach($usuario as $registro): ?>

					<tr>
						<td class="centrarTexto"> <?php echo $registro['nombre']; ?> </td>
						<td class="centrarTexto"> <?php echo $registro['email']; ?> </td>
						
						<td class="centrarTexto"> 
							<a href="guardar.php?idUsuario= <?php echo $registro['idUsuario']; ?>">
							<button type="button" class="btn btn-success">		
							<span class="glyphicon glyphicon-edit" ></span>
							Editar
							</button>
							</a>
						</td>	
						
						<td class="centrarTexto">
							<a href="eliminar.php?idUsuario= <?php echo $registro['idUsuario']; ?>" onclick=" return confirm('¿Estas seguro de eliminarlo?')">
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