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


		echo '<script>
	alert("Categorías con el mismo nombre no serán registradas !!!");
	window.location.href="index.php";
	</script>';

	//	header('Location: index.php');
	
	}else{
?>
<div class= "row">
	<div class="col-xs-12 col-sm-3 "></div>

	<div class="col-xs-12 col-sm-6 well">
<h1>Nueva categoria </h1>

<form method= "POST" action="guardar.php" id="formulario" >

	<?php if ($categoria->getIdCategoria()): ?>
	<input type="hidden" name="idCategoria" value="<?php echo $categoria->getIdCategoria() ?>">
	<?php endif; ?>

	<label class="control-label" for="nombre"> Categoria </label>
	<input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo $categoria->getNombre() ?>" placeholder="Nombre categoria" required pattern="[A-Za-z]+"        	minlength="3" maxlength="40" /> <br>
	
	<label class="control-label" for="descripcion"> Descripcion </label>
	<input type="text" name="descripcion" id="descripcion" class="form-control" value="<?php echo $categoria->getDescripcion() ?>" placeholder="Descripcion de la categoria" required pattern="[A-Za-z9-0]+" minlength="3" maxlength="400" /> <br> <br>
	
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