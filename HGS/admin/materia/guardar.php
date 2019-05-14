<?php

	require_once '../class/Materia.php';
	require_once '../class/Alumnos.php';
	
	include_once '../template/header.php';

	

	$idMateria = (isset($_REQUEST['idMateria'] )) ? $_REQUEST['idMateria'] : null;
	 //echo $idCalificacion;

	if ($idMateria){
		//si existe una id
 		// con esto se decide edita un usuario o crea uno nuevo 
		
		$materia = Materia::buscarPorId($idMateria);
	
	}else{

		$materia = new Materia();	
		//instancia se manda llamar al metodo (require)
		// union de clases o codigos (include)  
	}

	if ($_SERVER['REQUEST_METHOD'] == 'POST'){

		$nombre = (isset($_POST['nombre'] )) ? $_POST['nombre'] : null;
		$descripcion = (isset($_POST['descripcion'] )) ? $_POST['descripcion'] : null;
		
		$materia->setNombre($nombre);
		$materia->setDescripcion($descripcion);
		
		$materia->guardar();
		
		echo '<script>
	alert("Datos guardados correctamente!");
	window.location.href="index.php";
	</script>';

	// header('Location: index.php');

	}else{
?>	
<div class= "row">
	<div class="col-xs-12 col-sm-3 "></div>

	<div class="col-xs-12 col-sm-6 well">

		<h1> Nueva Materia </h1>

		<form method="POST" action="guardar.php" id="formulario" >

			<?php if ($materia->getIdMateria()): ?>
			<input type="hidden" name="idMateria" value="<?php echo $materia->getIdMateria() ?>">
			<?php endif; ?>

			<label class="control-label" for="nombre"> Materia </label>
			<input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo $materia->getNombre() ?>" placeholder="Materia" required pattern="[A-Za-z9-0]+" minlength="3" maxlength="50" /> <br>
			
			<label class="control-label" for="descripcion"> Descripcion </label>
			<input type="text" name="descripcion" id="descripcion" class="form-control" value="<?php echo $materia->getDescripcion() ?>" placeholder="Descripcion de la categoria" required pattern="[A-Za-z9-0]+" minlength="3" maxlength="400" /> <br> <br>
						
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
	</div>

	<div class="col-xs-12 col-sm-3"></div>
</div>		
<?php
}
include_once '../template/footer.php';
?>