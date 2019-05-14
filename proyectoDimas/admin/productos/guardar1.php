
<?php 

require_once '../class/Producto.php';
require_once '../class/Categoria.php';
include_once '../template/header.php';

$categoria = Categoria::recuperarTodos();

$idProducto = (isset($_REQUEST['idProducto'])) ? $_REQUEST['idProducto'] : null;

if ($idProducto){ //si existe una id
 // con esto se decide edita un usuario o crea uno nuevo 

$producto = Producto::buscarPorId($idProducto); 
	}else{
		$producto = new Producto(); //instancia se manda llamar al metodo (require)
								  // union de clases o codigos (include)  
}


 ?>
<?php  
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		//variable que guarda la imagen actual
		$imagenEstablecida = (isset($_POST['imagenEstablecida'])) ? $_POST['imagenEstablecida'] : null;

		if ($_FILES['imagen']['name'] == null) {
		 	$rutaDestino= $imagenEstablecida;
		 }else{ 

		$rutaServidor = 'uploads';
		$rutaTemporal = $_FILES['imagen']['tmp_name'];
		$nombreImagen = $_FILES['imagen']['name'];
		$rutaDestino= $rutaServidor.'/'.$nombreImagen;
		move_uploaded_file($rutaTemporal, $rutaDestino);
       	}
	 	
		$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : null; 
		$precio = (isset($_POST['precio'])) ? $_POST['precio'] : null; 
		$stock = (isset($_POST['stock'])) ? $_POST['stock'] : nul; 
		$descripcion = (isset($_POST['descripcion'])) ? $_POST['descripcion'] : null; 
		$idCategoria = (isset($_POST['idCategoria'])) ? $_POST['idCategoria'] : null;

		$producto->setUrl($rutaDestino);
		$producto->setNombre($nombre);
		$producto->setPrecio($precio);
		$producto->setStock($stock);
		$producto->setDescripcion($descripcion);
		$producto->setIdCategoria($idCategoria);

		$producto->guardar();
		header('Location: index.php');

	

	}else{

		?>
		<div class="row">
			<br>
			<br>
			<div class="col-xs-10">
		<div  id="contenedor">
			<header>
	<h1 class="textblanco">Nuevo Producto</h1>
	<form  method="POST" action="guardar1.php" enctype="multipart/form-data">

		<?php if ($producto->getIdProducto()): ?>
			<input type="hidden" name="idProducto" value="<?php echo $producto->getIdProducto() ?>" />
		<?php endif; ?>

		</header>
		<div id="fore">
		    
			<label class="textblanco">Producto</label>
			  <img src="<?php echo $producto->getUrl();?>" width="100" heigth="100">
			  <input type="hidden" value="<?php echo $producto->getUrl(); ?>" name="imagenEstablecida">
			<input type="file" name="imagen" />
			<br>
			

	
		
		<label class="textblanco">Nombre</label><br>
		<input type="text" name="nombre" placeholder="Ingresa el nombre del Producto" value="<?php echo $producto->getNombre() ?>" required /> <br>

		<label class="textblanco">Precio</label><br>
		<input type="number" name="precio" placeholder="Ingresa el precio" value="<?php echo $producto->getPrecio() ?>" required /> <br>
		
		<label class="textblanco">Stock</label><br>
		<input type="number" name="stock" placeholder="Cantidad en existencia" value="<?php echo $producto->getStock() ?>" required /> <br>
		
		<label class="textblanco">Descripcion</label><br>
		<input type="text" name="descripcion" placeholder="Ingresa la Descripción del Producto" value="<?php echo $producto->getDescripcion() ?>" /> <br>
		
		<label class="textblanco">Categoria</label><br>
		<select name="idCategoria">
				<option value="">Selecci&oacute;na una categoria</option>
				<?php foreach ($categoria as $item) { ?>


				<option value="<?php echo $item['idCategoria']?>"><?php echo $item['nombre'] ?></option>
				<?php } ?> 
		</select> <br>

		<br>
		
		<input type="submit" value"Guardar" /> 
		<a href="index.php" class="btn btn-danger"> Cancelar </a>

	</form> 
	</div>	
	</div> 	
	</div>
	</div>
		<?php 
		}
		
		 ?>			

<!-- Fin de seccion de edicion para el sitio. -->
