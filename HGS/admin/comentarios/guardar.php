<?php 

	require_once '../class/Comentario.php';
	include_once '../template/header.php'; 

	$idComentario = (isset($_REQUEST['idComentario'] )) ? $_REQUEST['idComentario'] : null;
	if($idComentario){ //si existe un id
		$comentario = Comentario::buscarPorId($idComentario);
	}else{

		$comentario = new Comentario();
	}

	
	if($_SERVER['REQUEST_METHOD'] == 'POST') {

		$email = (isset($_POST['email'] )) ? $_POST['email'] : null;
		$mensaje = (isset($_POST['mensaje'] )) ? $_POST['mensaje'] : null;
		$estatus = (isset($_POST['estatus'] )) ? $_POST['estatus'] : null;
		$fechaPub = (isset($_POST['fechaPub'] )) ? $_POST['fechaPub'] : null;

		$comentario->setEmail($email);
		$comentario->setMensaje($mensaje);
		$comentario->setEstatus($estatus);
		$comentario->setFechaPub($fechaPub);
		
		$comentario->guardar(); 
		
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
	<h1>Nuevo comentario</h1>
	<form method="POST" action="guardar.php" id="formulario" >
		
		<?php if($comentario->getIdComentario()):  ?>
		<input type="hidden" name="idComentario" value="<?php echo $comentario->getIdComentario() ?>">
		<?php endif; ?>

		<label class="control-label" for="email">Email</label>
		<input type="email" name="email" id="email" class="form-control" value="<?php echo $comentario->getEmail() ?>" placeholder="Nombre" required /> <br>

		<label class="control-label" for="mensaje">Mensaje</label> <br>
		<textarea name="mensaje" rows="4" id="mensaje" required pattern="[A-Za-z9-0]+" minlength="3" maxlength="400" class="form-control" cols="24"> <?php echo $comentario->getMensaje() ?> </textarea> <br>

		<label class="control-label" for="estatus">Estatus</label>
		<input type="number" min="0" max="1" id="estatus" class="form-control" name="estatus" value="<?php if($comentario->getIdComentario()) { echo $comentario->getEstatus(); }else{ echo'1'; } ?>" required /> <br>

		<label class="control-label" for="fechaPub">Fecha de Publicacion</label>
		<input  type="hidden" name="fechaPub" id="fechaPub" class="form-control" value="<?php echo date('Y-m-d') ?>" required /> <br>

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