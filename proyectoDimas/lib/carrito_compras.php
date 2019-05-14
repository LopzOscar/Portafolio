<?php

//proceso para agregar...

if(isset($_POST['idProducto'])){

	

	$idProducto = (isset($_REQUEST['idProducto'])) ? $_REQUEST['idProducto'] : null;
	$url = (isset($_REQUEST['url'])) ? $_REQUEST['url'] : null;
	$nombre = (isset($_REQUEST['nombre'])) ? $_REQUEST['nombre'] : null;
	$precio = (isset($_REQUEST['precio'])) ? $_REQUEST['precio'] : null;
	$stock = (isset($_REQUEST['stock'])) ? $_REQUEST['stock'] : null;
	$cantidad = (isset($_REQUEST['cantidad'])) ? $_REQUEST['cantidad'] : null;	



	$mi_carrito[] = array ('idProducto' => $idProducto, 'url' => $url, 'nombre' => $nombre, 'precio' => $precio, 'stock' => $stock, 'cantidad' => $cantidad);

}


//Proceso para agregar un nuevo producto al carrito//
if(isset($_SESSION['carrito'])){
	$mi_carrito = $_SESSION['carrito'];
	if(isset($_POST['idProducto'])){
		$idProducto = $_POST['idProducto'];
		$url = $_POST['url'];
		$nombre = $_POST['nombre'];
		$precio = $_POST['precio'];
		$cantidad = $_POST['cantidad'];
		$stock = $_POST['stock'];

//Verificar si el producto es repetido y lo suma al ya existente

		$pos = -1;
		for($i = 0; $i < count($mi_carrito); $i++){
			if($idProducto == $mi_carrito[$i]['idProducto'] ){

				$pos = $i;
			}
		}

		if($pos != -1){
			$cuanto = $mi_carrito[$pos]['cantidad'] + $cantidad;
			$mi_carrito[$pos] = array ('idProducto'=>$idProducto, 'url'=>$url, 'nombre'=>$nombre, 'precio'=>$precio, 'cantidad'=> $cuanto, 'stock'=>$stock);

		}else{

			$mi_carrito []= array('idProducto'=>$idProducto, 'url'=>$url, 'nombre'=>$nombre, 'precio'=>$precio, 'cantidad'=> $cantidad, 'stock'=>$stock);
		}
	}
}


// Actualizar cantidad de productos del carrito de compras


	if(isset($_POST['idProductoActualizar'])){
		$idProductoActualizar = $_POST['idProductoActualizar'];
		$cantidadActualizada= $_POST['cantidadActualizada'];
		$mi_carrito[$idProductoActualizar]['cantidad'] = $cantidadActualizada;

	}



// Eliminar un producto del carrito

	if(isset($_POST['idProductoEliminar'])){
		$idProductoEliminar = $_POST['idProductoEliminar'];
		$mi_carrito[$idProductoEliminar] = NULL;

	}

	//Se crea una session del carrito de compras


	if(isset($mi_carrito)){

		$_SESSION['carrito'] = $mi_carrito;
	}