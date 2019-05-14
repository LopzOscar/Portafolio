<?php

	
	require_once '../class/Alumnos.php';
	require_once '../class/Generacion.php';
	include_once '../template/header.php';

	$generacion = Generacion::recuperarTodos();

	$idAlumno = (isset($_REQUEST['idAlumno'] )) ? $_REQUEST['idAlumno'] : null;

	if ($idAlumno){
		//si existe una id
 		// con esto se decide edita un usuario o crea uno nuevo 
		
		$alumno = Alumnos::buscarPorId($idAlumno);
	
	}else{

		$alumno = new Alumnos();	
		//instancia se manda llamar al metodo (require)
		// union de clases o codigos (include)  
	}

	if ($_SERVER['REQUEST_METHOD'] == 'POST'){

		$nombre = (isset($_POST['nombre'] )) ? $_POST['nombre'] : null;
		$apellidoP = (isset($_POST['apellidoP'] )) ? $_POST['apellidoP'] : null;
		$apellidoM = (isset($_POST['apellidoM'] )) ? $_POST['apellidoM'] : null;
		$matricula = (isset($_POST['matricula'] )) ? $_POST['matricula'] : null;
		$telefono = (isset($_POST['telefono'] )) ? $_POST['telefono'] : null;
		$direccion = (isset($_POST['direccion'] )) ? $_POST['direccion'] : null;
		$comunidad = (isset($_POST['comunidad'] )) ? $_POST['comunidad'] : null;
		$estatus = (isset($_POST['estatus'] )) ? $_POST['estatus'] : null;
		$idGeneracion = (isset($_POST['idGeneracion'] )) ? $_POST['idGeneracion'] : null;
		$alumno->setNombre($nombre);
		$alumno->setApellidoP($apellidoP);
		$alumno->setApellidoM($apellidoM);
		$alumno->setMatricula($matricula);
		$alumno->setTelefono($telefono);
		$alumno->setDireccion($direccion);
		$alumno->setComunidad($comunidad);
		$alumno->setEstatus($estatus);
		$alumno->setIdGeneracion($idGeneracion);	
		$alumno->guardar();
	
		echo '<script>
	alert("Datos guardados correctamente!");
	window.location.href="index.php";
	</script>';

	// header('Location: index.php');
	//	echo $alumno;
	}else{
?>
	
<div class= "row">
	<div class="col-xs-12 col-sm-3 "></div>

	<div class="col-xs-12 col-sm-6 well">

	<h1> Nuevo Alumno </h1>

		<form method="POST" action="guardar.php" id="formulario" name="formulario" >

			<?php if ($alumno->getIdAlumno()): ?>
			<input type="hidden" name="idAlumno" value="<?php echo $alumno->getIdAlumno() ?>">
			<?php endif; ?>

			<label class="control-label" for="nombre"> Nombre </label>
			<input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo $alumno->getNombre() ?>" placeholder="Nombre" /> <br>
			
			<label class="control-label" for="apellidoP"> Apellido Paterno </label>
			<input type="text" name="apellidoP" id="apellidoPat" class="form-control" value="<?php echo $alumno->getApellidoP() ?>" placeholder="Apellido Paterno" /> <br>
			
			<label class="control-label" for="apellidoM"> Apellido Materno </label>
			<input type="text" name="apellidoM" id="apellidoMat" class="form-control" value="<?php echo $alumno->getApellidoM() ?>" placeholder="Apellido Materno" /> <br>
			
			<label class="control-label" for="matricula"> Matrícula </label>
			<input type="number" name="matricula" id="matricula" class="form-control" value="<?php echo $alumno->getMatricula() ?>" placeholder="Matrícula" required pattern="^[9-0]" /> <br>
			
			<label class="control-label" for="telefono"> Telefono (Coloca ínicamente los 10 dígitos de tu telefono sin espacio intermedio)</label>
			<input type="text" name="telefono" id="telefono" class="form-control" value="<?php echo $alumno->getTelefono() ?>" placeholder="Telefono" pattern="^[4|5|6|2]\d{9}$" /> <br>

			<label class="control-label" for="direccion"> Dirección </label>
			<input type="text" name="direccion" id="direccion" class="form-control" required pattern="[A-Za-z0-9 ]+{5,100} +" value="<?php echo $alumno->getDireccion() ?>" placeholder="Dirección" /> <br>
			
			<label class="control-label" for="comunidad"> Comunidad </label>
			<input type="text" name="comunidad" id="comunidad" class="form-control" value="<?php echo $alumno->getComunidad() ?>" required pattern="[A-Za-z0-9 ]+{5,100} +" /> <br>
			
			<label class="control-label" for="estatus"> Estatus </label>
			<input type="number" min="0" max="1" id="estatus" class="form-control" name="estatus" required value="<?php if($alumno->getIdAlumno()){ echo $alumno->getEstatus(); }else{ echo '1'; } ?>" /> <br>

			<label class="control-label" for="idGeneracion"> Generaci&oacute;n </label>
			<select name="idGeneracion" required>
				<option value="">Selecciona una Generaci&oacute;n </option>
				<?php foreach ($generacion as $item) { ?>
				<option value="<?php echo $item['idGeneracion']?>" <?php if($item['idGeneracion']==$alumno->getIdGeneracion()) {echo "selected"; } ?> > <?php echo $item['nombre']; ?>  </option>
				<?php  } ?>
			</select><br>
			
			
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
		<script src="../js/formulario.js"></script>
	<div class="col-xs-12 col-sm-3"></div>
</div>
		
<?php
}
include_once '../template/footer.php';
?>