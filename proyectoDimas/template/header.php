<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name= "viewport" content="width=device-whidht, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<title>Boutique Dimas</title>
  <link rel="stylesheet" href="template/css/supersized.css">
	<link rel="stylesheet" type="text/css" href="template/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="template/css/style.css">
  <link rel="stylesheet" type="text/css" href="template/css/estilo.css">
  <script src="js/formulario.js"></script>
	<script src="js/jquery.js"></script>
  <script src="js/jquery.validate.js"></script>
  <script src="js/bootstrap.js"></script>
</head>

<body style="text-align: justify;">
	<div class="container">
		<div class="row">
			
			<iframe style="width: 100%; height: 300px;" frameborder="0" src="media/bann/bann1.html" ></iframe>

		</div>

<div class="row"> <!--aqui va-->
      <div class="col-xs-13 ">

        <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Inicio</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="productos.php">Productos</a></li>
       <li><a href="contacto.php">Contacto</a></li>
      <li><a href="faq.php">Preguntas Frecuentes</a></li>
       <li><a href="comentarios.php">Comentarios</a></li>
       <li><a href="quienes somos.php">¿Quiénes Somos?</a></li>
       
    

    <?php if (!isset($_SESSION['email'])){ ?>
     </ul>
   
   
      <ul class="nav navbar-nav navbar-right">




      <li><a href="registrar.php"></span> Registrarse</a></li>
      <li><a href="login.php"></span> Iniciar Sesión</a></li>
    </ul> 

 <?php }else{ ?>
</ul>
 <ul class="nav navbar-nav navbar-right">
<li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#">
        <?php if(isset($_SESSION['nombre'])){echo $_SESSION['nombre']. ' '.$_SESSION['apellidoPat']; } ?>
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="miCuenta.php?idUsuario=<?php echo $_SESSION['idUsuario']; ?>">Mi Perfil</a></li>
          <li><a href="carrito.php">Mi Carrito</a></li>
          <li><a href="logout.php"></span> Cerrar Sesión</a></li>
        </ul>
      </li>

<?php if ($_SESSION['privilegios'] == 1 || $_SESSION['privilegios'] == 2){ ?>
<li> <a href="admin/index.php"> 
C-PANEL
</a>
</li>

<?php } ?> 
      
         </ul>
<?php } ?>

  </div>
</nav>
</div>
</div>  <!-- aqui va-->


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="js/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>

  <script src="js/jquery-1.8.2.min.js"></script>
        <script src="js/supersized.3.2.7.min.js"></script>
        <script src="js/supersized-init.js"></script>
        <script src="js/scripts.js"></script>