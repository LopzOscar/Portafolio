<?php

	require_once '../class/Faq.php';

	$idFaq = (isset($_REQUEST['idFaq'])) ? $_REQUEST['idFaq'] : null;

	if($idFaq){
		
		$faq = Faq::buscarPorId($idFaq);
		$faq->eliminar();
		header('Location: index.php');
	}