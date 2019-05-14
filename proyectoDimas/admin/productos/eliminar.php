<?php 
//instancia de la clase producto
require_once '../class/Producto.php'; //instancia de la clase producto.
//creas una variavle con el valor del id del producto.
$idProducto = (isset($_REQUEST['idProducto'])) ? $_REQUEST['idProducto'] : null;

if ($idProducto!= null ){ //si existe un producto obtienes un id de lo contrario es nulo.
//de la class producto obtienes la funcion buscarPorId para obtener los datos del producto.
$producto = Producto::buscarPorId($idProducto);
//eliminar un producto
$producto->eliminar(); 
//para eliminar la imagen del producto
unlink($producto->getUrl());
//redirecion al index de productos
header ('Location: index.php');

} 