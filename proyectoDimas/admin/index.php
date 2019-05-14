<?php 
session_start();
if(!$_SESSION){
  header('Location: ../login.php');
  }else{


if ($_SESSION['privilegios'] == 3) {

  header('location:../index.php');
}else{
  
}
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
  <meta>
  <meta>
  <title>Boutique Dimas C-Panel</title>
  <!-- CSS -->
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans:400,700'>
        <link rel="stylesheet" href="template/css/reset.css">
        <link rel="stylesheet" href="template/css/supersized.css">
        <link rel="stylesheet" href="template/css/stylelogin.css">
        <link rel="stylesheet" href="template/css/lat.css">
        <link rel="stylesheet" type="text/css" href="template/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="template/css/animaciones.css">
  
  
  <script type="js/jquery.js"></script>
  <script type="js/bootstrap.js"></script>
</head>
<body>

      <!-- INICIA MENU  -->

   <nav class="navbar navbar-inverse sidebar" role="navigation">
    <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">C-PANEL</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Inicio<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-th-large"></span></a></li>
        <li class="active"><a href="productos/index.php">Productos<span style="font-size:16px;" class="pull-right hidden-xs showopacity  glyphicon glyphicon-shopping-cart"></span></a></li>
        <li class="active"><a href="categorias/index.php">Categorías<span style="font-size:16px;" class="pull-right hidden-xs showopacity  glyphicon glyphicon-gift"></span></a></li>
        <li class="active"><a href="usuarios/index.php">Usuarios<span style="font-size:16px;" class="pull-right hidden-xs showopacity  glyphicon glyphicon-user"></span></a></li>
        <li class="active"><a href="comentarios/index.php">Comentarios<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-comment"></span></a></li>
        <li class="active"><a href="contacto/index.php">Contacto<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-envelope"></span></a></li>
        <li class="active"><a href="faq/index.php">Preguntas Frecuentes<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-question-sign"></span></a></li>
        <li class="active"><a href="noticias/index.php">Noticias<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-pushpin"></span></a></li>
         <li class="active"><a href="compras/index.php">Compras<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-envelope"></span></a></li>
        <li class="active"><a href="envio/index.php">Envios<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-envelope"></span></a></li>
        <li class="active"><a href="pago/index.php">Pagos<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-usd"></span></a></li>
         <li class="active"><a href="../index.php">Ver Sitio<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-eye-open"></span></a></li>
      </ul>
    </div>
  </div>
</nav>

  <!-- FINALIZA MENU  -->


    
      <div class="col-xs-10">
       <iframe style="width: 90%; height: 300px;" frameborder="0"   src="media/cp/cp.html" ></iframe>
      </div>

  <div class="container">
    <div class="row">
      <div class="col-xs-3">
        <a href="productos/index.php"><img src="images/iconProd.png" width="250px" heigth="200px" class="anim_aumentar"></a>
      </div>
      <div class="col-xs-3">
        <a href="categorias/index.php"><img src="images/iconCat.png" width="250px" heigth="200px" class="anim_aumentar"></a>
      </div>
      <div class="col-xs-3 ">
        <a href="usuarios/index.php"><img src="images/iconUsua.png" width="250px" heigth="200px" class="anim_aumentar"></a>
      </div>
      <div class="col-xs-3 ">
        <a href="comentarios/index.php"><img src="images/iconCom.png" width="250px" heigth="200px" class="anim_aumentar"></a>
      </div>
      <div class="col-xs-3">
        <a href="contacto/index.php"><img src="images/iconCon.png" width="250px" heigth="200px" class="anim_aumentar"></a>
      </div>
      <div class="col-xs-3 ">
        <a href="faq/index.php"><img src="images/iconFaq.png" width="250px" heigth="200px" class="anim_aumentar"></a>
      </div>
      <div class="col-xs-3 ">
        <a href="noticias/index.php"><img src="images/iconNot.png" width="250px" heigth="200px" class="anim_aumentar"></a>
      </div>
      <div class="col-xs-3 ">
        <a href="../index.php"><img src="images/iconSit.png" width="250px" heigth="200px" class="anim_aumentar"></a>
      </div>
    </div>
</div>

     

        </body>
       


 <!-- Javascript -->
        <script src="js/jquery-1.8.2.min.js"></script>
        <script src="js/supersized.3.2.7.min.js"></script>
        <script src="js/1supersized-init.js"></script>
        <script src="js/scripts.js"></script>
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.js"></script>
