<?php

	require_once '../class/Generacion.php';

	$idGeneracion = (isset($_REQUEST['idGeneracion'])) ? $_REQUEST['idGeneracion'] : null;

	if($idGeneracion){
		
		$generacion = Generacion::buscarPorId($idGeneracion);
		$generacion->eliminar();
		header('Location: index.php');
	}