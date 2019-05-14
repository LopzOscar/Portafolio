<?php
session_start();

require_once '../admin/class/Usuario.php';



$nombre = (isset($_REQUEST['nombre'])) ? $_REQUEST['nombre'] : null;
$apellidoPat = (isset($_REQUEST['apellidoPat'])) ? $_REQUEST['apellidoPat'] : null;
$apellidoMat = (isset($_REQUEST['apellidoMat'])) ? $_REQUEST['apellidoMat'] : null;
$email = (isset($_REQUEST['email'])) ? $_REQUEST['email'] : null;
$password = (isset($_REQUEST['password'])) ? $_REQUEST['password'] : null;
$estado = (isset($_REQUEST['estado'])) ? $_REQUEST['estado'] : null;
$ciudad = (isset($_REQUEST['ciudad'])) ? $_REQUEST['ciudad'] : null;
$calle = (isset($_REQUEST['calle'])) ? $_REQUEST['calle'] : null;
$numExterior = (isset($_REQUEST['numExterior'])) ? $_REQUEST['numExterior'] : null;
$numInterior = (isset($_REQUEST['numInterior'])) ? $_REQUEST['numInterior'] : null;
$colonia = (isset($_REQUEST['colonia'])) ? $_REQUEST['colonia'] : null;
$cp = (isset($_REQUEST['cp'])) ? $_REQUEST['cp'] : null;
$telefono = (isset($_REQUEST['telefono'])) ? $_REQUEST['telefono'] : null;
$estatus = (isset($_REQUEST['estatus'])) ? $_REQUEST['estatus'] : null;
$privilegios = (isset($_REQUEST['privilegios'])) ? $_REQUEST['privilegios'] : null;



$usuario =  new Usuario();

$usuario->setNombre($nombre);
$usuario->setApellidoPat($apellidoPat);
$usuario->setApellidoMat($apellidoMat);
$usuario->setEmail($email);
$usuario->setPassword($password);
$usuario->setEstado($estado);
$usuario->setCiudad($ciudad);
$usuario->setCalle($calle);
$usuario->setNumExterior($numExterior);
$usuario->setNumInterior($numInterior);
$usuario->setColonia($colonia);
$usuario->setCp($cp);
$usuario->setTelefono($telefono);
$usuario->setEstatus($estatus);
$usuario->setPrivilegios($privilegios);
$usuario->guardar();

echo '<script>
       alert("Gracias por registrarse");
       window.location.href="../index.php";
</script>';

