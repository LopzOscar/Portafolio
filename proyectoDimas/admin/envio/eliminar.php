<?php

	require_once '../class/Envio.php';

	$idEnvio = (isset($_REQUEST['idEnvio'])) ? $_REQUEST['idEnvio'] : null;

	if($idEnvio){
		
		$envio = metEnvio::buscarPorId($idEnvio);
		$envio->eliminar();
		header('Location: index.php');
	}