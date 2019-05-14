<?php 
session_start();
require_once '../admin/class/Usuario.php';

	$nombre = (isset($_REQUEST['nombre'] )) ? $_REQUEST['nombre'] : null;
	$email = (isset($_REQUEST['email'] )) ? $_REQUEST['email'] : null;
	$password = (isset($_REQUEST['password'] )) ? $_REQUEST['password'] : null;
	
	$estatus = (isset($_REQUEST['estatus'] )) ? $_REQUEST['estatus'] : null;
	$privilegios = (isset($_REQUEST['privilegios'] )) ? $_REQUEST['privilegios'] : null;
	
	$usuario = new Usuario();

	$usuario->setNombre($nombre);

	$usuario->setEmail($email);
	$usuario->setPassword($password);
	
	$usuario->setEstatus($estatus);
	$usuario->setPrivilegios($privilegios);

$usuario->guardar();

echo '<script>
	alert("Datos guardados correctamente!");
	window.location.href="../index.php";
	</script>';
