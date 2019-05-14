<?php
session_start();

require_once '../admin/class/Usuario.php'; 


$email = (isset($_REQUEST['email']) ) ? $_REQUEST['email'] : null;
$password = (isset($_REQUEST['password']) ) ? $_REQUEST['password'] : null;


$usuario = new Usuario;

$usuario->setEmail($email);
$usuario->setPassword($password);
$entrar = $usuario->login();


if ($entrar == true) {

    if ($_SESSION['privilegios'] == 3){

    	header('location: ../index.php');
    }else{
    	header('location: ../admin/index.php');
    }

}else{

	echo '<script> alert("Usuario o Contraseña Incorrectos Verifica tus Datos.!"); window.location.href="../login.php" </script>';
}


?>