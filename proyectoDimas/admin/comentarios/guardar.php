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
		
		header ('Location: ../../index.php');
	
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

	<h1>Guardar Comentario</h1>
	<form method="POST" action="guardar.php">
		
		<?php if($comentario->getIdComentario()):  ?>
		<input type="hidden" name="idComentario" value="<?php echo $comentario->getIdComentario() ?>">
		<?php endif; ?>

		</header>
		
		<div id="fore">

		<label>Email</label>
		<input type="email" name="email" value="<?php echo $comentario->getEmail() ?>" required /> <br>

		<label>Mensaje</label> <br>
		<textarea name="mensaje" rows="4" cols="24"> <?php echo $comentario->getMensaje() ?> </textarea> <br>

		<label>Estatus</label>
		<input type="number" min="0" max="1" name="estatus" value="<?php if($comentario->getIdComentario()) { echo $comentario->getEstatus(); }else{ echo'1'; } ?>" required /> <br>

		<!--<label>Fecha de Publicacion</label>-->
		<input  type="hidden" name="fechaPub" value="<?php echo date('Y-m-d') ?>" required /> <br>

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