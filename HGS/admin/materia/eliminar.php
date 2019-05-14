<?php

	require_once '../class/Materia.php';

	$idMateria = (isset($_REQUEST['idMateria'])) ? $_REQUEST['idMateria'] : null;

	if($idMateria){
		
		$materia = Materia::buscarPorId($idMateria);
		$materia->eliminar();
		header('Location: index.php');
	}