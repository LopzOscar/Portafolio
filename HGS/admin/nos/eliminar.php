<?php

	require_once '../class/Noticias.php';

	$idNoticias = (isset($_REQUEST['idNoticias'])) ? $_REQUEST['idNoticias'] : null;

	if($idNoticias){
		
		$noticias = Noticias::buscarPorId($idNoticias);
		unlink($noticias->getUrl());
		$noticias->eliminar();
		
		header('Location: index.php');
	}