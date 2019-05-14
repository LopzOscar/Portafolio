
<?php 
//instancia de la clase producto
require_once '../class/Producto.php';
//instancia de la clase categoria
require_once '../class/Categoria.php';
//incluir el diseño almacenado en el header de la carpeta template
include_once '../template/header.php'; 

$categoria = Categoria::recuperarTodos(); 

$idProducto = (isset($_REQUEST['idProducto'])) ? $_REQUEST['idProducto'] : null;

if ($idProducto){ //si existe una id
 // con esto se decide edita un producto o crea uno nuevo 
//de la clase producto obtienes la función buscarPorId
$producto = Producto::buscarPorId($idProducto); 
	}else{//si no existe el producto agregas uno nuevo
		$producto = new Producto(); //instancia se manda llamar al metodo (require)
								  // union de clases o codigos (include)  
}


 ?>
<?php  
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
         //selecion del tipo de la imagen
		if($_FILES['imagen']['type']== 'image/jpeg' || $_FILES['imagen']['type'] == 'image/jpg' ||
		 $_FILES['imagen']['type'] == 'image/png'  ){ 

		$rutaServidor = 'uploads'; //nombre de la carpeta para guardar las imagenes
		$rutaTemporal = $_FILES['imagen']['tmp_name'];//ruta temporal
		$nombreImagen = $_FILES['imagen']['name'];//nombre de la imagen
		$rutaDestino= $rutaServidor.'/'.$nombreImagen;//ruta de la imagen

		move_uploaded_file($rutaTemporal, $rutaDestino);
	 	//creas las variables y obtienes su valor si editas
		$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : null; 
		$precio = (isset($_POST['precio'])) ? $_POST['precio'] : null; 
		$stock = (isset($_POST['stock'])) ? $_POST['stock'] : null; 
		$descripcion = (isset($_POST['descripcion'])) ? $_POST['descripcion'] : null; 
		$idCategoria = (isset($_POST['idCategoria'])) ? $_POST['idCategoria'] : null;
        //devines las variables
		$producto->setUrl($rutaDestino);
		$producto->setNombre($nombre);
		$producto->setPrecio($precio);
		$producto->setStock($stock);
		$producto->setDescripcion($descripcion);
		$producto->setIdCategoria($idCategoria);

		$producto->guardar();
		//redirecion al index
		header('Location: index.php');

	}else{
   		//escript para mensaje si elige un formato de imagen diferente de los establecidos
		echo '<script>
		alert("Solo se admiten documentos | .pdf");
		window.location.href="guardar.php";
		</script>';

	}

	}else{

		?>
		<div class="row"> <!--div de formulario-->
			<br>
			<br>
			<div class="col-xs-10"><!--div de formulario-->
		<div  id="contenedor">
			<header>
	<h1 class="textblanco">Nuevo Producto</h1><!--nombre en h1 como titulo--> 
	<!--inici form para al dar en enviar guardar el producto-->
	<form  method="POST" action="guardar.php" enctype="multipart/form-data">

		<?php if ($producto->getIdProducto()): ?>
			<input type="hidden" name="idProducto" value="<?php echo $producto->getIdProducto() ?>" />
		<?php endif; ?>

		</header>
		<div id="fore">
		    <!--selecionar una imagen dandole nombre y acerlo requerido para que lo agrege-->
			<label class="textblanco">Imagen del Producto</label><!-- class="textBlanco" se usa para hacer el texto del 
			formulario en blanco-->
			<input class="textblanco" type="file" name="imagen" required />
			<br>
			

	
		
		<label class="textblanco">Nombre</label><br><!--nombre que aparece en cuadro del formulario-->
		<!--linea para definirlo de tipo texto, nombre, una descripcion denre del cuadro de informacion, valor que envia el nombre-->
		<input type="text" name="nombre" placeholder="Ingresa el nombre del Producto" value="<?php echo $producto->getNombre() ?>" required /> <br>

		<label class="textblanco">Precio</label><br><!--nombre que aparece en cuadro del formulario-->
		<!--linea para definirlo de tipo texto, nombre, una descripcion denre del cuadro de informacion, valor que envia el precio-->
		<input type="number" name="precio" placeholder="Ingresa el precio" value="<?php echo $producto->getPrecio() ?>" required /> <br>
		
		<label class="textblanco">Stock</label><br><!--nombre que aparece en cuadro del formulario-->
		<!--linea para definirlo de tipo texto, nombre, una descripcion denre del cuadro de informacion, valor que envia el stock-->
		<input type="number" name="stock" placeholder="Cantidad en existencia" value="<?php echo $producto->getStock() ?>" required /> <br>
		
		<label class="textblanco">Descripcion</label><br><!--nombre que aparece en cuadro del formulario-->
		<!--linea para definirlo de tipo texto, nombre, una descripcion denre del cuadro de informacion, valor que envia la descripcion-->
		<input type="text" name="descripcion" placeholder="Ingresa la Descripción del Producto" value="<?php echo $producto->getDescripcion() ?>" /> <br>
		
		<label class="textblanco">Categoria</label><br><!--nombre que aparece en cuadro del formulario-->
		<select name="idCategoria">
				<option value="" class="textblanco">Selecci&oacute;na una categoria</option>
				<!--foreach par hacer la seleción decategorias-->
				<?php foreach ($categoria as $item) { ?>

                 <!--al dar selecionar uestra el nombre de las categorias
					obtenidad del idCategoria y imprimidas con echo $item['nombre']-->
				<option value="<?php echo $item['idCategoria']?>"><?php echo $item['nombre'] ?></option>
				<?php } ?> 
		</select> <br>

		<br>
		
		<input type="submit" value"Guardar" /> <!--botón con accion de enviar todos los datos-->
		<a href="index.php" class="btn btn-danger"> Cancelar </a><!--boton de canselar agregar o editar un producto y te envia al index-->

	</form> 
	</div>	
	</div> 	
	</div>
	</div>
		<?php //cerrar codigo php
		}
		
		 ?>			


