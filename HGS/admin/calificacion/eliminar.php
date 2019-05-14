<?php

	require_once '../class/Calificacion.php';

	$idCalificacion = (isset($_REQUEST['idCalificacion'])) ? $_REQUEST['idCalificacion'] : null;

	if($idCalificacion){
		
		$cal = Calificacion::buscarPorId($idCalificacion);
		$cal->eliminar();
		header('Location: index.php');
	}