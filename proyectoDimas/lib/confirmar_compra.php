<?php
require_once '../admin/class/Compra.php';

	$folio =  (isset($_POST['folio'])) ? $_POST['folio']:null ;
	$idUsuario = (isset($_POST['idUsuario'])) ? $_POST['idUsuario']:null ;
	$idMPago = (isset($_POST['idPago'])) ? $_POST['idPago']:null ;
	$idMEnvio =  (isset($_POST['idEnvio'])) ? $_POST['idEnvio']:null ;
	$iva = (isset($_POST['iva'])) ? $_POST['iva']:null ;
	$subTotal = (isset($_POST['subTotal'])) ? $_POST['subTotal']:null ;
	$total =  (isset($_POST['total'])) ? $_POST['total']:null ;
	$numCuenta = (isset($_POST['numCuenta'])) ? $_POST['numCuenta']:null ;
	$fechaCompra = (isset($_POST['fechaCompra'])) ? $_POST['fechaCompra']:null ;
	
	$compra = new Compra();
	
	$compra->setFolio($folio);
	$compra->setIdUsuario($idUsuario);
	$compra->setIdPago($idPago);
	$compra->setIdEnvio($idEnvio);
	$compra->setIva($iva);
	$compra->setSubTotal($subTotal);
	$compra->setTotal($total);
	$compra->setNumCuenta($numCuenta);
	$compra->setFechaCompra($fechaCompra);
	
	$compra->guardar();

header('Location: ../index.php');
