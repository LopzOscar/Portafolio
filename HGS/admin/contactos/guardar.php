<?php

	require_once '../class/Contacto.php';
	include_once '../template/header.php';
?>
	
<?php	

	$idContacto = (isset($_REQUEST['idContacto'] )) ? $_REQUEST['idContacto'] : null;

	if ($idContacto){
		//si existe una id
 		// con esto se decide edita un usuario o crea uno nuevo 
		
		$contacto = Contacto::buscarPorId($idContacto);
	
	}else{

		$contacto = new Contacto();	
		//instancia se manda llamar al metodo (require)
		// union de clases o codigos (include)  
	}

	if ($_SERVER['REQUEST_METHOD'] == 'POST'){

		$nombre = (isset($_POST['nombre'] )) ? $_POST['nombre'] : null;
		$apellidoPat = (isset($_POST['apellidoPat'] )) ? $_POST['apellidoPat'] : null;
		$apellidoMat = (isset($_POST['apellidoMat'] )) ? $_POST['apellidoMat'] : null;
		$email = (isset($_POST['email'] )) ? $_POST['email'] : null;
		$mensaje = (isset($_POST['mensaje'] )) ? $_POST['mensaje'] : null;

		$contacto->setNombre($nombre);
		$contacto->setApellidoPat($apellidoPat);
		$contacto->setApellidoMat($apellidoMat);
		$contacto->setEmail($email);
		$contacto->setMensaje($mensaje);
		
		$contacto->guardar();
		
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
<h1>Nuevo contacto </h1>

<form method= "POST" action="guardar.php" id="formulario" name="formulario" enctype="multipart/form-data" >

	<?php if ($contacto->getIdContacto()): ?>
	<input type="hidden" name="idContacto" value="<?php echo $contacto->getIdContacto() ?>"/>
	<?php endif; ?>

	<label class="control-label" for="nombre"> Nombre </label>
	<input type="text"  name="nombre" id="nombre" class="form-control"  value="<?php echo $contacto->getNombre() ?>" placeholder="Nombre"  /> <br>
	
	<label class="control-label" for="apellidoPat"> Apellido Paterno </label>
	<input type="text" name="apellidoPat" id="apellidoPat" class="form-control" value="<?php echo $contacto->getApellidoPat() ?>" placeholder="Apellido Paterno"  /> <br>
		
	<label class="control-label" for="apellidoMat"> Apellido Materno </label>
	<input type="text" name="apellidoMat" id="apellidoMat" class="form-control" value="<?php echo $contacto->getApellidoMat() ?>" placeholder="Apellido Materno"  /> <br>
	
	<label class="control-label" for="email"> Email </label>
	<input type="email" name="email" id="email" class="form-control" value="<?php echo $contacto->getEmail() ?>" placeholder="Email" required readonly /> <br>
	
	<label class="control-label" for="mensaje" > Mensaje </label>
	<textarea name="mensaje" rows="4" cols="24" id="mensaje" class="form-control" > <?php echo $contacto->getMensaje() ?> </textarea> <br><br>
	
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

<!--
<div id="alert"> hola </div>

<script type="text/javascript">
		function Validar(){
			var nombre = document.getElementById('nombre').value; 
			var apellidoPat = document.getElementById('apellidoPat').value; 
			var apellidoMat = document.getElementById('apellidoMat').value; 
			var email = document.getElementById('email').value; 
			var mensaje = document.getElementById('mensaje').value; 

			if(nombre==""){
				$('#alert').html('Debes ingresar un nombre').slideDown(500); 
			}
		}
	</script> -->