
<?php 

session_start(); //al iniciar sesión 

if($_SESSION['privilegios'] != 1 ){ //si los privilegios son diferentes a 1

	header('location: ../index.php'); //te redireciona al index normal de usuario y no al C-Panel
}

include_once '../template/header.php'; //obtiene el diseño del header de el sitio
require_once'../class/Producto.php';

//de la clase productos recuperas lo productos de la base de datos
$producto = Producto::recuperarTodos();

 ?>

 	<!-- seccion para editar el contenido del sitio   -->

			<div class="row well">

				<div class="col-xs-10"> <!--contenedor-->
						<!--texto de titulo y boton para agregar un nuevo producto con redirección a guardar.php-->
					<h1>Administrar Productos <a href="guardar.php" class="btn btn-primary"> + Nuevo </a> </h1>
					 <br>

					<?php if(count($producto) > 0): ?><!--si existe un producto-->

				<table class="table table-hover table-bordered"> <!--dar diseño a la tabla de productos, inicia la abla-->
					<thead>
					<tr>
						<!--nombre de los campos de la tabla como titulos-->
						<th> Imagen </th>
						<th> Nombre </th>
						<th> Precio </th>
						<th> Stock </th>
						<th> Descripción </th>
						<th> Categoría </th>
						<th>  </th>
						<th>  </th>
					</tr>
					</thead>

					<tbody><!--inicia el cuerpo de la tabla-->

						<?php foreach($producto as $registro ):  ?> <!--los productos se guardan en registro-->

					<tr>
						<!-- se imprimern los datos del producto acomodandose acorde alos th de los titulos  de la tabla-->
						<td><img src="<?php echo $registro['url']; ?>" width="150" height="150"></td>
						<td><?php echo $registro['nombre']; ?></td>
						<td><?php echo $registro['precio']; ?></td>
						<td><?php echo $registro['stock']; ?></td>
						<td><?php echo $registro['descripcion']; ?></td>
						<td><?php echo $registro['idCategoria']; ?></td>
						<!--Botón en todos los productos que te envia a guardar1.php con los datos del producto en el id para su edición-->
						<td> <a href="guardar1.php?idProducto= <?php echo $registro['idProducto'] ?>" class="btn btn-success"> Editar</a></td>
						<!--Botón de eliminar en todos los productos aparece, se envia el id a eliminar.php para eliminarlo con un mensaje de confirmacion para advertir de la acción-->
						<td> <a href="eliminar.php?idProducto= <?php echo $registro['idProducto']; ?>" class="btn btn-danger" 
							onclick="return confirm('¿Realmente desea eliminar este Producto?')"> Eliminar </a></td>
					</tr>

					<?php  endforeach; ?>

					</tbody><!--se sierra el cuerpo de la tabla-->
						<!-- td cabecera  -->
						<!-- th lines de tabla   -->

				</table><!--se sierra la tabla-->

			<?php else: ?> <!--si no existen productos se muestra un mensaje-->

			<p>No hay productos registrados </p>
		<?php endif; ?>

				</div><!--serrar div de contenedor-->

				

			</div><!--serrar div de contenedor-->



