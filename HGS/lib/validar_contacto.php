<?php 
session_start();
require_once '../admin/class/Contacto.php';

	$nombre = (isset($_REQUEST['nombre'] )) ? $_REQUEST['nombre'] : null;
	$apellidoPat = (isset($_REQUEST['apellidoPat'] )) ? $_REQUEST['apellidoPat'] : null;
	$apellidoMat = (isset($_REQUEST['apellidoMat'] )) ? $_REQUEST['apellidoMat'] : null;
	$email = (isset($_REQUEST['email'] )) ? $_REQUEST['email'] : null;
	$mensaje = (isset($_REQUEST['mensaje'] )) ? $_REQUEST['mensaje'] : null;
	
	$contacto = new Contacto();

	$contacto->setNombre($nombre);
	$contacto->setApellidoPat($apellidoPat);
	$contacto->setApellidoMat($apellidoMat);
	$contacto->setEmail($email);
	$contacto->setMensaje($mensaje);

$contacto->guardar();

echo '<script>
	alert("Datos guardados correctamente!");
	window.location.href="../index.php";
	</script>';
