<?php

	require_once '../class/Calificacion.php';
	require_once '../class/Alumnos.php';
	require_once '../class/Materia.php';
	include_once '../template/header.php';

	$materia = Materia::recuperarTodos();
	$alumno = Alumnos::recuperarTodos(); 


	$idCalificacion = (isset($_REQUEST['idCalificacion'] )) ? $_REQUEST['idCalificacion'] : null;
	 //echo $idCalificacion;

	if ($idCalificacion){
		//si existe una id
 		// con esto se decide edita un usuario o crea uno nuevo 
		
		$cal = Calificacion::buscarPorId($idCalificacion);
	
	}else{

		$cal = new Calificacion();	
		//instancia se manda llamar al metodo (require)
		// union de clases o codigos (include)  
	}

	if ($_SERVER['REQUEST_METHOD'] == 'POST'){

		$calificacion = (isset($_POST['calificacion'] )) ? $_POST['calificacion'] : null;
		$idMateria = (isset($_POST['idMateria'] )) ? $_POST['idMateria'] : null;
		$idAlumno = (isset($_POST['idAlumno'] )) ? $_POST['idAlumno'] : null;
		$cal->setCalificacion($calificacion);
		$cal->setIdMateria($idMateria);
		$cal->setIdAlumno($idAlumno);
		$cal->guardar();
		
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

		<h1> Nueva Calificaci&oacute;n </h1>

		<form method= "POST" action="guardar.php" id="formulario" >

			<?php if($cal->getIdCalificacion()): ?>
			<input type="hidden" name="idCalificacion" value="<?php echo $cal->getIdCalificacion() ?>">
			<?php endif; ?>

			<label class="control-label" for="calificacion"> Calificaci&oacute;n </label>
			<input type="number" name="calificacion" id="calificacion" class="form-control" required pattern="[9-0]+" min="1" max="10" value="<?php echo $cal->getCalificacion() ?>" placeholder="Calificación"  /> <br>
			
			<label class="control-label" for="idMateria"> Materia </label>
			<select name="idMateria" required>
				<option value="">Selecciona una Materia </option>
				<?php foreach ($materia as $item) { ?>
				<option value="<?php echo $item['idMateria']?>" <?php if($item['idMateria']==$cal->getIdMateria()) {echo "selected"; } ?> > <?php echo $item['nombre']; ?>  </option>
				<?php  } ?>
			</select><br>
			
			<label class="control-label" for="idAlumno"> Alumno </label>
			<select name="idAlumno" required>
				<option value="">Selecciona un Alumno </option>
				<?php foreach ($alumno as $item) { ?>
				<option value="<?php echo $item['idAlumno']?>" <?php if($item['idAlumno']==$cal->getIdAlumno()) {echo "selected"; } ?> > <?php echo $item['nombre']; ?>  </option>
				<?php  } ?>
			</select><br>

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

	<div class="col-xs-12 col-sm-3"></div>
</div>		
<?php
}
include_once '../template/footer.php';
?>