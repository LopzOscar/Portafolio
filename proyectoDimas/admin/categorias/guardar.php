<?php

	require_once '../class/Categoria.php';
	include_once '../template/header.php';

	$idCategoria = (isset($_REQUEST['idCategoria'] )) ? $_REQUEST['idCategoria'] : null;

	if ($idCategoria){
		//si existe una id
 		// con esto se decide edita un usuario o crea uno nuevo 
		
		$categoria = Categoria::buscarPorId($idCategoria);
	
	}else{

		$categoria = new Categoria();	
		//instancia se manda llamar al metodo (require)
		// union de clases o codigos (include)  
	}

	if ($_SERVER['REQUEST_METHOD'] == 'POST'){

		$nombre = (isset($_POST['nombre'] )) ? $_POST['nombre'] : null;
		$descripcion = (isset($_POST['descripcion'] )) ? $_POST['descripcion'] : null;

		$categoria->setNombre($nombre);
		$categoria->setDescripcion($descripcion);
		
		$categoria->guardar();
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
<h1> Nueva Categoria </h1>

<form method= "POST" action"guardar.php">

	<?php if ($categoria->getIdCategoria()): ?>
	<input type="hidden" name="idCategoria" value="<?php echo $categoria->getIdCategoria() ?>">
	<?php endif; ?>

	</header>

		<div id="fore">

	<label> Categoria </label>
	<input type="text"  name="nombre" value="<?php echo $categoria->getNombre() ?>" /> <br>
	
	<label> Descripcion </label>
	<input type="text" name="descripcion" value="<?php echo $categoria->getDescripcion() ?>" /> <br> <br>
	
	<input type="submit" value"Guardar" class="btn btn-success" />
	<a href="index.php" class="btn btn-danger"> Cancelar </a>

</form>
</div>
</div>
</body>

<?php
}

?>