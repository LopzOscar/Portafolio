<?php
require_once '../admin/class/Comentario.php';
	
	$email = (isset($_REQUEST['email'] )) ? $_REQUEST['email'] : null;
	$mensaje = (isset($_REQUEST['mensaje'] )) ? $_REQUEST['mensaje'] : null;
	$estatus = (isset($_REQUEST['estatus'] )) ? $_REQUEST['estatus'] : null;
	$fechaPub = (isset($_REQUEST['fechaPub'] )) ? $_REQUEST['fechaPub'] : null;

	$comentario = new Comentario();

	$comentario->setEmail($email);
	$comentario->setMensaje($mensaje);
	$comentario->setEstatus($estatus);
	$comentario->setFechaPub($fechaPub);
	
	$comentario->guardar();

echo '<script>
	alert("Datos guardados correctamente!");
	window.location.href="../comentarios.php";
	</script>';
