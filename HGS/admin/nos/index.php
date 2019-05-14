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
require_once '../class/Noticias.php';
$noticias = Noticias::recuperarTodos();

?>
<div class="container-fluid">
	<div class="row well">
		<div class="table-responsive">
			<h1> Nueva Noticia 
				<a href="guardar.php">
				<button type="button" class="btn btn-primary">		
				<span class="glyphicon glyphicon-qrcode" ></span>
				Nuevo
				</button>
				</a>
			</h1>

			<?php if (count($noticias) > 0 ): ?>
			<table class="table table-bordered table-striped table-hover">
				
			<thead>
				<tr>
					<th class="centrarTexto"> Imagen </th>
					<th class="centrarTexto"> Nombre </th>
					<th class="centrarTexto"> Noticia </th>
					<th class="centrarTexto"> Fecha de Publicaci&oacute;n </th>
					<th> </th>
					<th> </th>
				</tr>
			</thead>

			<tbody>

				<?php foreach($noticias as $registro): ?>

					<tr>
						<td class="centrarTexto"><img src="<?php echo $registro['url']; ?>" width="75" height="75"></td>
						<td class="centrarTexto"> <?php echo $registro['nombre']; ?> </td>
						<td class="centrarTexto"> <?php echo $registro['noticia']; ?> </td>
						<td class="centrarTexto"> <?php echo $registro['fechaPub']; ?> </td>
												
						<td class="centrarTexto"> 
							<a href="guardar.php?idNoticias=<?php echo $registro['idNoticias'] ?>">
							<button type="button" class="btn btn-success">		
							<span class="glyphicon glyphicon-edit" ></span>
							Editar
							</button>
							</a>
						</td>	
						
						<td class="centrarTexto">
							<a href="eliminar.php?idNoticias=<?php echo $registro['idNoticias'] ?>" onclick=" return confirm('¿Esta seguro que desea eliminar la noticia ?')">
							<button type="button" class="btn btn-danger">		
							<span class="glyphicon glyphicon-trash" ></span>
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
<!-- Fin de la seccion de edición del contenido del sitio -->
<?php
include_once '../template/footer.php';
?>