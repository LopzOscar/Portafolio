<?php 
require_once '../class/Noticias.php';

$idNoticias = (isset($_REQUEST['idNoticias'])) ? $_REQUEST['idNoticias'] : null;

if ($idNoticias != null){

$noticias = Noticias::buscarPorId($idNoticias);
$noticias->eliminar(); 
unlink($noticias->getUrl());
header('Location: index.php');

} 