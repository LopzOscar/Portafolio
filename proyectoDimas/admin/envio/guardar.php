<?php

	require_once '../class/Envio.php';
	include_once '../template/header.php';

	$idEnvio = (isset($_REQUEST['idEnvio'] )) ? $_REQUEST['idEnvio'] : null;

	if ($idEnvio){
		//si existe una id
 		// con esto se decide edita un usuario o crea uno nuevo 
		
		$envio = metEnvio::buscarPorId($idEnvio);
	
	}else{

		$envio = new metEnvio();	
		//instancia se manda llamar al metodo (require)
		// union de clases o codigos (include)  
	}

	if ($_SERVER['REQUEST_METHOD'] == 'POST'){

		$nombre = (isset($_POST['nombre'] )) ? $_POST['nombre'] : null;
		$descripcion= (isset($_POST['descripcion'] )) ? $_POST['descripcion'] : null;

		$envio->setNombre($nombre);
		$envio->setDescripcion($descripcion);
		
		$envio->guardar();
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

<h1> Agregar un nuevo metododo de envi&oacute; </h1>

<form method= "POST" action="guardar.php">

	<?php if ($envio->getIdEnvio()): ?>
	<input type="hidden" name="idEnvio" value="<?php echo $envio->getIdEnvio() ?>">
	<?php endif; ?>

		</header>
		
		<div id="fore">

	<label> Nombre </label>
	<input type="text"  name="nombre" value="<?php echo $envio->getNombre() ?>" /> <br>
	
	<label> Descripci&oacute;n </label>
	<input type="text" name="descripcion" value="<?php echo $envio->getDescripcion() ?>" /> <br> <br>
	
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