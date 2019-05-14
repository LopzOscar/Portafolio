<?php 
	require_once('../class/Compra.php');
	
	$idCompra = (isset($_REQUEST['idCompra'])) ? $_REQUEST['idCompra'] : null;

	if($idCompra){

	$compra = Compra::buscarPorId($idCompra);
	$compra->eliminar();
	header('Location: index.php');
}