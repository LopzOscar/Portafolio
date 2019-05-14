<?php

	require_once '../class/Pago.php';
	include_once '../template/header.php';

	$idPago = (isset($_REQUEST['idPago'] )) ? $_REQUEST['idPago'] : null;

	if ($idPago){
		//si existe una id
 		// con esto se decide edita un usuario o crea uno nuevo 
		
		$pago = metPago::buscarPorId($idPago);
	
	}else{

		$pago = new metPago();	
		//instancia se manda llamar al metodo (require)
		// union de clases o codigos (include)  
	}

	if ($_SERVER['REQUEST_METHOD'] == 'POST'){

		$nombre = (isset($_POST['nombre'] )) ? $_POST['nombre'] : null;
		$descripcion= (isset($_POST['descripcion'] )) ? $_POST['descripcion'] : null;

		$pago->setNombre($nombre);
		$pago->setDescripcion($descripcion);
		
		$pago->guardar();
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

<h1> Agregar un nuevo metododo de pago </h1>

<form method= "POST" action="guardar.php">

	<?php if ($pago->getIdPago()): ?>
	<input type="hidden" name="idPago" value="<?php echo $pago->getIdPago() ?>">
	<?php endif; ?>

		</header>
		
		<div id="fore">

	<label> Nombre </label>
	<input type="text"  name="nombre" value="<?php echo $pago->getNombre() ?>" /> <br>
	
	<label> Descripci&oacute;n </label>
	<input type="text" name="descripcion" value="<?php echo $pago->getDescripcion() ?>" /> <br> <br>
	
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