<?php

	require_once '../class/Alumnos.php';
	require_once '../class/Calificacion.php';
	$calificacion = Calificacion::recuperarTodos();

	$idAlumno = (isset($_REQUEST['idAlumno'])) ? $_REQUEST['idAlumno'] : null;

	if($idAlumno){
		
		$alumno = Alumnos::buscarPorId($idAlumno, $idCalificacion);
	//	$calificacion->eliminar();
		$alumno->eliminar($idCalificacion);
		header('Location: index.php');
	}