<?php

   include_once 'template/header.php';
   require_once 'admin/class/Producto.php';
   require_once 'admin/class/Categoria.php';
   $categoria = Categoria::recuperarTodos(); //instancia de la clase producto donde se guardaran todas las categorias
   $idCategoria = (isset($_REQUEST['idCategoria'])) ? $_REQUEST['idCategoria'] : null; //se guarda el id de la categoria seleccionada


if($_SERVER['REQUEST_METHOD'] == 'POST'){


	$producto = new Producto();
	$producto->setIdCategoria($idCategoria);
	$registros = $producto->listarPorCategoria();


}else{

   $registros = Producto::recuperarTodos();
}

  

   //if () {
   	
   //}
?>
<!--Sección para editar el contenido del sitio-->
		<div class="row well">
           <div class="col-xs-3"> 
			 <form action="productos.php" method="post">
		 		 	<label>Filtrar Por: </label>
		 		 	<select name="idCategoria">

		 		 		<option value="">Selecciona una categoria</option>
		 		 		<?php foreach ($categoria as $item2) {
		 		 		?>
		 		 		<option value="<?php echo $item2['idCategoria'] ?>"><?php echo $item2['nombre'];?></option>

		 		 		<?php
		 		 		} ?>
		 		 	</select>
		 		 	<input type="submit" value="Buscar">

		 		 </form>
				
		</div>
	    </div>
<?php

	if(count($registros)>0){

				foreach ($registros as $item) {

?>

       <!--Sección para editar el contenido del sitio-->
		<div class="row well">

		<?php 

			if(count($producto)>0){

				foreach ($producto as $item) {


			?>

		 <div class="col-xs-12 col-md-3 well">
		 	<h4> <?php echo $item['nombre']  ?> </h4>
		 	<img src="admin/productos/<?php echo $item['url']; ?>" width="200" height="220">
		 	<p>Disponibles: <?php echo $item['stock']; ?> </p>
		 	<p>Precio: $<?php echo $item['precio']; ?> </p>
		 	
		 	<form action="carrito.php" method="post">

		 		<input type="hidden" name="idProducto" value="<?php echo $item['idProducto'] ?>">
		 		<input type="hidden" name="nombre" value="<?php echo $item['nombre'] ?>">
		 		<input type="hidden" name="url" value="<?php echo $item['url'] ?>">
		 		<input type="hidden" name="stock" value="<?php echo $item['stock'] ?>">
		 		<input type="hidden" name="precio" value="<?php echo $item['precio'] ?>">
		 		<input type="hidden" name="cantidad" value="1">
		 		<input type="submit" value="Agregar al carrito">
		 	
		 	</form>
		 </div>
		 <?php 

		 	}

			}else{

				echo '<p> No hay productos disponibles... </p>';
			}
			?>
		</div>
		 <ul class="pagination">
		 	<li>
		 		<a href="#" aria-label="Previus">
		 			<span aria-hidden="true">&laquo;</span>

		 		</a>
		 	</li>
  <li class="active"><a href="#">1</a></li>
  <li><a href="#">2</a></li>
  <li><a href="#">3</a></li>
  <li><a href="#">4</a></li>
  <li><a href="#">5</a></li>
<li>
		 		<a href="#" aria-label="Next">
		 			<span aria-hidden="true">&raquo;</span>

		 		</a>
		 	</li>

</ul>
		<!--Fin de la sección de edicion-->
<?php

  include_once'template/footer.php';
?>		