<?php

	require_once '../class/Pago.php';

	$idPago = (isset($_REQUEST['idPago'])) ? $_REQUEST['idPago'] : null;

	if($idPago){
		
		$pago = MetPago::buscarPorId($idPago);
		$pago->eliminar();
		header('Location: index.php');
	}