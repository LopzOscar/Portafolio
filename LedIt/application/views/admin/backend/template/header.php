
<?php
$id=$this->session->userdata('id');
$perfil=$this->session->userdata('perfil');
$usuario=$this->session->userdata('usuario');

if($usuario==4){
 redirect('Admin/index/12');
}elseif ($usuario==1 || $usuario==2 || $usuario==3) {
  
?>

  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?=base_url();?>libraries/img/icons/icon.png">

   <title>LedIt | Admin</title>

    <!-- Bootstrap -->
    <link href="<?=base_url();?>libraries/libraries-backend/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?=base_url();?>libraries/libraries-backend/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?=base_url();?>libraries/libraries-backend/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?=base_url();?>libraries/libraries-backend/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="<?=base_url();?>libraries/libraries-backend/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url();?>libraries/libraries-backend/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url();?>libraries/libraries-backend/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url();?>libraries/libraries-backend/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url();?>libraries/libraries-backend/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="<?=base_url();?>libraries/libraries-backend/build/css/custom.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>libraries/libraries-backend/login-usuario-styles/css/main2.css">
    
    <script type="text/javascript" src="<?=base_url();?>libraries/sweetalert2/dist/sweetalert2.min.js"></script>
    <script type="text/javascript" src="<?=base_url();?>libraries/sweetalert2/dist/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>libraries/sweetalert2/dist/sweetalert2.min.css">

  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?=base_url();?>Admin/index/2" class="site_title"><i class="fa fa-lightbulb-o"></i><span><img style="margin-left: 5%;" width="40%" src="<?=base_url();?>libraries/libraries-backend/images/ledit.png"></span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <?php
                if(!$perfil){
                ?>  
                  <img src="<?=base_url().'libraries/libraries-backend/images/thumbnails/ledit.png'.$this->session->userdata('perfil');?>" class="img-circle profile_img">
                <?php  
                  }elseif ($perfil) {
                ?>    
                  <img src="<?=base_url().'libraries/libraries-backend/images/thumbnails/usuarios/'.$this->session->userdata('perfil');?>" class="img-circle profile_img">
                <?php    
                  }
                ?>

              </div>
              <div class="profile_info">
                <span>Bienvenido,</span>
                <h2><?=$this->session->userdata('nombre');?></h2>
              </div>
                <!-- /menu footer buttons -->
            </div>
            <br>
            <!-- /menu profile quick info -->
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-clone"></i> Dashboard <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                             <?php 
                          if ($usuario==1 || $usuario==2) {
                        ?>    
                        <li><a class="" href="<?=base_url();?>Admin/index/14">Ventas</a></li>
                        <li><a class="" href="<?=base_url();?>Admin/index/9">Contactos&nbsp;&nbsp;</a></li>
                        
                        <?php    
                          }else{ 
                        ?>
                        <?php    
                          }
                        ?>
                      
                      <li><a class="" href="<?=base_url();?>Admin/index/7">Productos</a></li>
                      <li><a class="" href="<?=base_url();?>Admin/index/8">Categorías</a></li>
                        <?php 
                          if ($usuario==1 || $usuario==2) {
                        ?>    
                          <li><a class="" href="<?=base_url();?>Admin/index/6">Administradores</a></li>
                        <?php    
                          }else{ 
                        ?>
                        <?php    
                          }
                        ?> 
                      <li><a class="" href="<?=base_url();?>Admin/index/13">Usuarios</a></li>
                      <li><a class="" href="<?=base_url();?>Admin/index/3">Galería</a></li>
                      <li><a class="" href="<?=base_url();?>Admin/index/4">FAQ'S</a></li>
                      <li><a class="" href="<?=base_url();?>Admin/index/5">Noticias</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a title="Ocultar/Mostrar" id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <ul class="nav navbar-nav navbar-right">

                 

                <li class="">
                  <a title="Opciones de sesión"  href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                     <?php
                if(!$perfil){
                ?>  
                   <img src="<?=base_url().'libraries/libraries-backend/images/thumbnails/ledit.png'.$this->session->userdata('perfil');?>"><?=$this->session->userdata('correo');?>
                    <span class=" fa fa-angle-down"></span>
                <?php  
                  }elseif ($perfil) {
                ?>    
                   <img src="<?=base_url().'libraries/libraries-backend/images/thumbnails/usuarios/'.$this->session->userdata('perfil');?>"><?=$this->session->userdata('correo');?>
                    <span class=" fa fa-angle-down"></span>
                <?php    
                  }
                ?>
                  </a>

                <ul class="dropdown-menu dropdown-usermenu pull-right">
                <?php 
                  if ($usuario==2) {
                    $user1="Administrador";
                ?>    
                    <li><a><i class="fa fa-user pull-right"></i><?=$user1;?></a></li>
                <?php
                  }elseif ($usuario==3) {
                       $user2="Usuario";
                ?>
                    <li><a><i class="fa fa-user pull-right"></i><?=$user2;?></a></li>
                <?php    
                  }else{
                     $user3="Super Administrador";
                ?>
                    <li><a><i class="fa fa-user pull-right"></i><?=$user3;?></a></li>
                <?php    
                  }
                ?> 
                    <li><a title="Cerrar de sesión"  href="<?=base_url();?>Usuario/logout"><i class="fa fa-sign-out pull-right"></i>Log Out</a></li>
                  </ul>
                </li>


                <li>
                  <a class="hidden-xs hidden-sm" style="background-color: #7d7d7d; box-shadow: 0px 0px 10px -5px rgba(10,17,35,0.9);" href="<?=base_url();?>ControlFrontEnd/index/1"><i style="color: #fff;" class="fa fa-eye"></i><span style="color: #fff;"> Visualizar sitio</span></a>
                </li>

              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
<?php
}else{
  redirect('Admin/index/12');
}




