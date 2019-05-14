<?php 
session_start(); 
require_once '../admin/class/Usuario.php'; 

$email = (isset($_REQUEST['email']) ) ? $_REQUEST['email'] : null; 
$password = (isset($_REQUEST['password']) ) ? $_REQUEST['password'] : null; 

$usuario = new Usuario; 
$usuario->setEmail($email); 
$usuario->setPassword($password); 
$entrar = $usuario->login(); 


	if ($entrar==true) {
	
	if($_SESSION['privilegios'] != 3){

		header('location: ../admin/inx.php');

		}else{

		header('location: ../index.php');
		}
		
	}else{
	
	echo ' <script>
	alert("Datos incorrectos");
	window.location.href="../login.php";
	</script>';
}
?>