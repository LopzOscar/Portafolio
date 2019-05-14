<?php

	require_once '../class/Generacion.php';
	
	include_once '../template/header.php';

	


	$idGeneracion = (isset($_REQUEST['idGeneracion'] )) ? $_REQUEST['idGeneracion'] : null;
	 //echo $idGeneracion;

	if ($idGeneracion){
		//si existe una id
 		// con esto se decide edita un usuario o crea uno nuevo 
		
		$generacion = Generacion::buscarPorId($idGeneracion);
	
	}else{

		$generacion = new Generacion();	
		//instancia se manda llamar al metodo (require)
		// union de clases o codigos (include)  
	}

	if ($_SERVER['REQUEST_METHOD'] == 'POST'){

		$nombre = (isset($_POST['nombre'] )) ? $_POST['nombre'] : null;
		
		
		$generacion->setNombre($nombre);
		
		$generacion->guardar();

		echo '<script>
	alert("Generaciones con el mismo nombre no serán registradas !!!");
	window.location.href="index.php";
	</script>';

		// header('Location: index.php');

	}else{
?>	
<div class= "row">
	<div class="col-xs-12 col-sm-3 "></div>

	<div class="col-xs-12 col-sm-6 well">

		<h1> Nueva Generaci&oacute;n </h1>

		<form method= "POST" action="guardar.php" id="formulario" name="formulario" >

			<?php if($generacion->getIdGeneracion()): ?>
			<input type="hidden" name="idGeneracion" value="<?php echo $generacion->getIdGeneracion() ?>">
			<?php endif; ?>

			<label class="control-label" for="nombre"> Generaci&oacute; </label>
			<input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo $generacion->getNombre() ?>" placeholder="Generación" required pattern="[A-Za-z9-0]+" minlength="3" maxlength="40" /> <br>
			
			

			<center>
				<button type="submit" class="btn btn-success" id="btn">		
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
	</div>
		<script src="../js/formulario.js"></script>
	<div class="col-xs-12 col-sm-3"></div>
</div>		
<?php
}
include_once '../template/footer.php';
?>