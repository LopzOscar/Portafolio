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

require_once '../class/Categoria.php';

$categoria = Categoria::recuperarTodos();

?>
 	<!--aqui inicia la edicion del contenido del sitio-->
	 
		<div class="row well">

			<h1> Crear categoria 
				<a href="guardar.php">
				<button type="button" class="btn btn-primary">		
				<span class="glyphicon glyphicon-qrcode" ></span>
				Nuevo
				</button>
				</a>
			</h1>

			<?php if (count($categoria) > 0): ?>

			<table class="table table-bordered table-striped table-hover">

				<thead>
				<tr>
					
					<th class="centrarTexto"> Categoria </th>
					<th class="centrarTexto"> Descripcion </th>
					<th> </th>
					<th> </th>

				</tr>
				</thead>

				<tbody>
				<?php foreach ($categoria as $registro): ?>
				
				<tr>
					<td class="centrarTexto"><?php echo $registro['nombre']; ?></td>
					<td><?php echo $registro['descripcion']; ?></td>
					
					<td class="centrarTexto"> 
						<a href="guardar.php?idCategoria= <?php echo $registro['idCategoria'] ?>">
						<button type="button" class="btn btn-success">		
						<span class="glyphicon glyphicon-edit" ></span>
						Editar
						</button>  
						</a>
					</td>
					
					<td class="centrarTexto"> 
						<a href="eliminar.php?idCategoria= <?php echo $registro['idCategoria']; ?>" onclick=" return confirm('¿Estas seguro de eliminarlo?')">  
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