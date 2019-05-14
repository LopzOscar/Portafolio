
<?php 

require_once '../class/Noticias.php';

include_once '../template/header.php';

$noticias = Noticias::recuperarTodos();

$idNoticias = (isset($_REQUEST['idNoticias'])) ? $_REQUEST['idNoticias'] : null;

if ($idNoticias){ //si existe una id
 // con esto se decide edita un usuario o crea uno nuevo 

$noticias = Noticias::buscarPorId($idNoticias); 
	}else{
		$noticias = new Noticias(); //instancia se manda llamar al metodo (require)
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
		$noticia = (isset($_POST['noticia'])) ? $_POST['noticia'] : null; 
		$fechaPub = (isset($_POST['fechaPub'])) ? $_POST['fechaPub'] : null; 
		


		$noticias->setUrl($rutaDestino);
		$noticias->setNombre($nombre);
		$noticias->setNoticia($noticia);
		$noticias->setFechaPub($fechaPub);

		$noticias->guardar();
		header('Location: index.php');

}else{
		?>
		<div class="row">
				<br>
				<br>
			<div class="col-xs-10">
		<div  id="contenedor">
			<header>
		
	<h1 class="textblanco">Nueva Noticia</h1>
</header>
	<form  method="POST" action="guardar.php" enctype="multipart/form-data">

		<?php if ($noticias->getIdNoticias()): ?>
			<input type="hidden" name="idNoticias" value="<?php echo $noticias->getIdNoticias() ?>" />
		<?php endif; ?>

		
		<div id="fore">
		    
			<label class="textblanco">Imagen</label>
			  <img src="<?php echo $noticias->getUrl(); ?>" width="100px" heigth="100px">
			  <input type="hidden" value="<?php echo $noticias->getUrl(); ?>" name="imagenEstablecida">
			<input type="file" name="imagen" >
			<br>
			
		<label class="textblanco">Nombre</label><br>
		<input type="text" name="nombre" placeholder="Ingresa el nombre del la noticia" value="<?php echo $noticias->getNombre() ?>" required /> <br>

		<label class="textblanco">Descripci&oacute;n de la noticia</label><br>
		<input type="text" name="noticia" placeholder="Ingresa la noticia" value="<?php echo $noticias->getNoticia() ?>" required /> <br>
		
		<input  type="hidden" name="fechaPub" value="<?php echo date('Y-m-d') ?>" required /> <br>
		<br>
		
		<input type="submit" value"Guardar" /> 
		<a href="index.php" class="btn btn-danger"> Cancelar </a>
</div>
	</form> 
		
	</div> 	
	</div>
	</div>
		<?php 
		}
		
		 ?>			

<!-- Fin de seccion de edicion para el sitio. -->
