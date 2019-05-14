<?php

	require_once '../class/Contacto.php';
	include_once '../template/header.php';

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
		$url = (isset($_POST['url'] )) ? $_POST['url'] : null;
		$mensaje = (isset($_POST['mensaje'] )) ? $_POST['mensaje'] : null;

		$contacto->setNombre($nombre);
		$contacto->setApellidoPat($apellidoPat);
		$contacto->setApellidoMat($apellidoMat);
		$contacto->setEmail($email);
		$contacto->setUrl($url);
		$contacto->setMensaje($mensaje);
		
		$contacto->guardar();
		header('Location: index.php');
	}else{
?>
<br>
<br>
<br>
<header>
<link rel="stylesheet" type="text/css" href="../template/css/estilo.css">
		</header>
		<body>
		<div id="contenedor">
			<header>
<h1> Contactar </h1>

<form method= "POST" action"guardar.php">

	<?php if ($contacto->getIdContacto()): ?>
	<input type="hidden" name="idContacto" value="<?php echo $contacto->getIdContacto() ?>">
	<?php endif; ?>

	</header>
		
		<div id="fore">

	<label> Nombre </label>
	<input type="text"  name="nombre" value="<?php echo $contacto->getNombre() ?>" /> <br>
	
	<label> Apellido Paterno </label>
	<input type="text" name="apellidoPat" value="<?php echo $contacto->getApellidoPat() ?>" /> <br>
		
	<label> Apellido Materno </label>
	<input type="text" name="apellidoMat" value="<?php echo $contacto->getApellidoMat() ?>" /> <br>
	
	<label> Email </label>
	<input type="email" name="email" value="<?php echo $contacto->getEmail() ?>" required /> <br>
	
	<label> URL </label>
	<input type="text" name="url" value="<?php echo $contacto->getUrl() ?>" /> <br>
	
	<label> Mensaje </label>
	<input type="text" name="mensaje" value="<?php echo $contacto->getMensaje() ?>" required /> <br> <br>
	
	<input type="submit" value"Guardar" class="btn btn-success" />
	<a href="index.php" class="btn btn-danger"> Cancelar </a>

</form>
</div>
</div>
</body>

<?php
}
include_once '../template/footer.php';
?>