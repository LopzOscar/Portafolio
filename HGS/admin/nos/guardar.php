<?php

	require_once '../class/Noticias.php';
	include_once '../template/header.php';

	$idNoticias = (isset($_REQUEST['idNoticias'] )) ? $_REQUEST['idNoticias'] : null;
echo $idNoticias;
	if ($idNoticias){
		//si existe una id
 		// con esto se decide edita un usuario o crea uno nuevo 
	/*	
		$not= new Noticias();
		$not->setIdNoticias($idNoticias);
		$noticias = $not->buscarPorId($idNoticias);
		*/
		$noticias = Noticias::buscarPorId($idNoticias);
	
	}else{

		$noticias = new Noticias();	
		//instancia se manda llamar al metodo (require)
		// union de clases o codigos (include)  
	}

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		$imagen2 = (isset($_POST['imagen2'])) ? $_POST['imagen2'] : null;

		if ($_FILES['imagen']['name'] == null) {
			$rutaDestino = $imagen2;
		}else{
	 	
		if ($_FILES['imagen']['type'] == 'image/jpg' || $_FILES['imagen']['type'] == 'image/jpeg' || $_FILES['imagen']['type'] == 'image/png') {
			
			//if ($_FILES['imagen']['size'] < '5000000') {
		
			$rutaServidor = 'uploads';
			$rutaTemporal = $_FILES['imagen']['tmp_name'];
			$nombreImagen = $_FILES['imagen']['name'];
			$rutaDestino = $rutaServidor.'/'.$nombreImagen;
			move_uploaded_file($rutaTemporal, $rutaDestino);

		}else{
			header('Location: guardar.php?idNoticias'.$idNoticias.'&Error=1');
			exit;
		}
	}

		$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : null;
		$noticia = (isset($_POST['noticia'] )) ? $_POST['noticia'] : null;
		$fechaPub = (isset($_POST['fechaPub'] )) ? $_POST['fechaPub'] : null;
		
		$noticias->setUrl($rutaDestino);
		$noticias->setNombre($nombre);
		$noticias->setNoticia($noticia);
		$noticias->setFechaPub($fechaPub);
				
		$noticias->guardar();

		echo '<script>
	alert("Datos guardados correctamente!");
	window.location.href="index.php";
	</script>';

	// header('Location: index.php');
	
	}else{
?>

<div class="container-fluid">
<div class= "row">
	<div class="col-xs-12 col-sm-3 "></div>

	<div class="col-xs-12 col-sm-6 well">

	<h1> Nuevo Noticia </h1>

		<form method="POST" name="formulario" action="guardar.php" id="formulario" enctype="multipart/form-data">
<!---->
			<?php if ($noticias->getIdNoticias()): 
				?>
			<input type="hidden" name="idNoticias" value="<?php echo $noticias->getIdNoticias() ?>" />
			<?php endif; ?>

			<label> Imagen de perfil </label> <br>
			<img src="<?php echo $noticias->getUrl(); ?>" width="100" height="100" required >
			<input type="hidden" value="<?php echo $noticias->getUrl(); ?>" name="imagen2" />
			<input type="file" name="imagen" /> <br>

			<label class="control-label" for="nombre"> Nombre </label>
			<input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo $noticias->getNombre() ?>" placeholder="Nombre" required pattern="[A-Za-z9-0]+" minlength="3" maxlength="40" /> <br>
			
			<label class="control-label" for="noticia"> Descripción de la noticia </label>
			<textarea name="noticia" id="descripcion" required pattern="[A-Za-z9-0]+" minlength="3" maxlength="400" rows="4"  cols="24" class="form-control" > <?php echo $noticias->getNoticia() ?> </textarea> <br><br>
			
			<label class="control-label" for="fechaPub"> Fecha de Publicación </label>
			<input type="date" name="fechaPub" id="fechaPub" class="form-control" value="<?php echo date('Y-m-d') ?>" required /> <br>
			
			<center>
				<button type="submit" class="btn btn-success" id="btn" >		
				<span class="glyphicon glyphicon-floppy-saved" ></span>
				Guardar
				</button>
			
				<a href="index.php">
				<button type="button" class="btn btn-danger">		
				<span class="glyphicon glyphicon-remove-circle" ></span>
				Cancelar
				</button>
				</a>
			</center>

		</form>

	<div class="col-xs-12 col-sm-3"></div>
	
<?php
}
include_once '../template/footer.php';
?>