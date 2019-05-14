

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title  -->
    <title>Led It</title>
 
    <!-- Favicon  -->
    <link rel="icon" class="fa fa-lightbulb-o" href="<?=base_url();?>libraries/img/icons/icon.png">

    <!-- Style CSS -->

     <link rel="stylesheet" type="text/css" href="<?=base_url();?>libraries/sweetalert2/dist/sweetalert2.css">
    <script type="text/javascript" src="<?=base_url();?>libraries/sweetalert2/dist/sweetalert2.min.js"></script>
    <script type="text/javascript" src="<?=base_url();?>libraries/sweetalert2/dist/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>libraries/style.css"/>
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>libraries/css/custom.css"/>
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>libraries/css/main.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>libraries/scripts/wookmark/css/style.css"/> 
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>libraries/scripts/yoxview/yoxview.css"/>
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>libraries/libraries-backend/login-usuario-styles/vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>libraries/libraries-backend/login-usuario-styles/css/util.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>libraries/libraries-backend/login-usuario-styles/css/main4.css">

    <link rel="stylesheet" type="text/css" media="screen" href="<?=base_url();?>libraries/ketchup/css/jquery.ketchup.css" />
    <script type="text/javascript" src="<?=base_url();?>libraries/ketchup/js/jquery-1.4.4.min.js"></script>
    <script type="text/javascript" src="<?=base_url();?>libraries/ketchup/js/jquery.ketchup.all.min.js"></script>
    <script src="<?=base_url();?>libraries/ketchup/js/jquery.js" type="text/javascript"></script>
    <script src="<?=base_url();?>libraries/ketchup/js/jquery.ketchup.js" type="text/javascript"></script>
    <script src="<?=base_url();?>libraries/ketchup/js/jquery.ketchup.validations.js" type="text/javascript"></script>
    <script src="<?=base_url();?>libraries/ketchup/js/jquery.ketchup.helpers.js" type="text/javascript"></script>
    <script src="<?=base_url();?>libraries/ketchup/js/scaffold.js" type="text/javascript"></script>

   
    
</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="south-load"></div>

    </div>
    <!-- ##### Header Area Start ##### -->
    <header class="header-area wow fadeInUp">
        <!-- Main Header Area -->
        <div class="main-header-area" id="stickyHeader">
            <div class="classy-nav-container breakpoint-off">
                <!-- Classy Menu -->
                <nav class="classy-navbar navbar justify-content-between nav" id="southNav">

                    <!-- Logo -->
                    <a class="nav-brand" href="<?=base_url();?>ControlFrontEnd/index/1"><img src="<?=base_url();?>libraries/img/icons/ledit.png" width="80px" height="5px"> <i class="fa fa-lightbulb-o"></i></a>

                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">

                        <!-- close btn -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>
                        <!-- Nav Start -->
                        <div class="classynav sobre-menu">
                            <ul>
                                <li><a href="<?=base_url();?>ControlFrontEnd/index/1">Home</a></li>
                                <li><a href="<?=base_url();?>ControlFrontEnd/index/10">Productos</a>
                                    <ul class="dropdown">
                                        <li><a href="<?=base_url();?>ControlFrontEnd/index/12">Hogar</a></li>
                                        <li><a href="<?=base_url();?>ControlFrontEnd/index/11">Exteriores </a></li>
                                        <li><a href="<?=base_url();?>ControlFrontEnd/index/10">Todos </a></li>
                                        
                                    </ul>
                                </li>
                                <li><a href="<?=base_url();?>ControlFrontEnd/index/3">Galería</a></li>
                                <li><a href="<?=base_url();?>ControlFrontEnd/index/4">FAQ</a></li>
                                <li><a href="<?=base_url();?>ControlFrontEnd/index/5">Noticias</a></li>
                                <li><a href="<?=base_url();?>ControlFrontEnd/index/6">Contacto</a></li>
                              
                                 <?php
                                    $id=$this->session->userdata('id');
                                    $perfil=$this->session->userdata('perfil');
                                    $nombre=$this->session->userdata('nombre');
                                    $usuario=$this->session->userdata('usuario');
                                    $correo=$this->session->userdata('correo');
                                 if ($usuario==1 || $usuario==2 || $usuario==3) {
                                    
                                 ?>   
                                    <li><a style="background-color: #0a1123; border-radius: 20px; text-transform: none; font-weight: normal; color: #ffff;  box-shadow: 0px 0px 10px 2px rgba(0,122,255,0.9);" href="<?=base_url();?>Admin/index/9"><i class="fa fa-eye"></i>&nbsp;Dashboard:&nbsp;<?=$nombre;?></a>
                                    </li>
                                <?php
                                    }elseif($usuario==4){

                                ?>    
                                    <li style="background-color: #7d7d7d; border-radius: 20px;"><a style="cursor: pointer; text-transform: none; font-weight: normal;"><i class="fa fa-eye"></i>&nbsp;¡Hola <?=$nombre;?>!</a>
                                        <ul class="dropdown">
                                            <li>
                                                <a style="text-transform: none; font-weight: normal; text-align: center; cursor: pointer;"><?=$correo;?></a>
                                            </li>                                          
                                            <li>
                                                <a style="text-transform: none; font-weight: normal; text-align: center;" href="<?=base_url();?>Usuario/logoutCliente">Cerrar sesión&nbsp;&nbsp;<i class="fa fa-sign-out"></i></a>
                                            </li>
                                             
                                        </ul>
                                    </li>
                                <?php
                                      }
                                ?>


                            </ul>
                            <!-- Search Form -->
                            <div class="south-search-form">
            
                                        <div style="border-radius: 30px;" class="top-header-area" id="search">
                                            <div class=" h-100 d-md-flex">


                                                 <div  class="phone-number d-flex">
                                                    <div align="center" class="number sobre col-sm-12 col-xs-12 col-md-12">
                                                        <a class="col-sm-12 col-xs-12" href="<?=base_url();?>Admin/index/11"><i class="fa fa-user"></i> Iniciar sesión</a>
                                                    </div>                                    
                                                </div>


                                                 <div style="border-radius:30px;" class="phone-number d-flex">
                                                    <div align="center" class="number sobre col-sm-12 col-xs-12 col-md-12">
                                                        <a  class="col-sm-12 col-xs-12" href="<?=base_url();?>ControlFrontEnd/carrito"><i class="fa fa-shopping-cart"></i> Mi Carrito</a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                            </div>
                            <!-- Search Button -->
                            <a href="#" class="searchbtn hidden-lg hidden-md"><i class="fa" aria-hidden="true"></i></a>
                        </div>
                        <!-- Nav End -->
                    </div>
                </nav>
                <!-- Inicio Botones usuario -->
                <div class="header-top">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="sobre col-lg-12 col-sm-12 col-12 header-top-right">

                                <?php
                                    $id=$this->session->userdata('id');
                                    $perfil=$this->session->userdata('perfil');
                                    $usuario=$this->session->userdata('usuario');
                                    $nombre=$this->session->userdata('nombre');

                                    if($usuario==1 || $usuario==2 || $usuario ==3){
                                ?>
                                    
                                <?php    
                                      }elseif($usuario==4){
                                ?>
                                      
                                    <a class="btns" href="<?=base_url();?>ControlFrontEnd/carrito"><i class="fa fa-shopping-cart"></i> Mi carrito&nbsp;

                                        <?php
                                         if($total_items=$this->cart->total_items()){
                                        ?> 
                                        <span style="background-color: #0a1123;" class="badge bg-green"><?=$total_items;?></span></a>
                                        <?php
                                             }else{
                                        ?>
                                         <span style="background-color: #0a1123;" class="badge bg-green">0</span></a>
                                        <?php
                                                }
                                      
                                              }else{
                                                ?>

                                                <a class="btns" href="<?=base_url();?>Admin/index/11"><i class="fa fa-user"></i> Iniciar sesión</a>
                                             <a class="btns" href="<?=base_url();?>ControlFrontEnd/carrito"><i class="fa fa-shopping-cart"></i> Mi carrito&nbsp;<span style="background-color: #0a1123;" class="badge bg-green">0</span></a>
                                        <?php
                                              }
                                        ?>
                            </div>
                        </div>                              
                    </div>
            </div>
               <!-- Fin Botones usuario -->
        </div>
    </header>
     <!-- ##### Header Area End ##### -->

