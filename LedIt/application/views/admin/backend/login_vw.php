<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="<?=base_url();?>libraries/img/icons/icon.png">
  <title>Admin | Login</title>

  <!-- Bootstrap CSS -->
  <link href="<?=base_url();?>libraries/libraries-backend/login-styles/css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="<?=base_url();?>libraries/libraries-backend/login-styles/css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="<?=base_url();?>libraries/libraries-backend/login-styles/css/elegant-icons-style.css" rel="stylesheet" />
  <link href="<?=base_url();?>libraries/libraries-backend/login-styles/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="<?=base_url();?>libraries/libraries-backend/login-styles/css/style.css" rel="stylesheet">
  <link href="<?=base_url();?>libraries/libraries-backend/login-styles/css/style-responsive.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="<?=base_url();?>libraries/libraries-backend/login-usuario-styles/fonts/iconic/css/material-design-iconic-font.min.css">
  <link rel="stylesheet" type="text/css" href="<?=base_url();?>libraries/libraries-backend/login-usuario-styles/vendor/animate/animate.css">
  <link rel="stylesheet" type="text/css" href="<?=base_url();?>libraries/libraries-backend/login-usuario-styles/css/util.css">
  <link rel="stylesheet" type="text/css" href="<?=base_url();?>libraries/libraries-backend/login-usuario-styles/css/main2.css">

  <link rel="stylesheet" type="text/css" media="screen" href="<?=base_url();?>libraries/ketchup/css/jquery.ketchup.css" />
  <script type="text/javascript" src="<?=base_url();?>libraries/ketchup/js/jquery-1.4.4.min.js"></script>
  <script type="text/javascript" src="<?=base_url();?>libraries/ketchup/js/jquery.ketchup.all.min.js"></script>
  <script src="<?=base_url();?>libraries/ketchup/js/jquery.js" type="text/javascript"></script>
  <script src="<?=base_url();?>libraries/ketchup/js/jquery.ketchup.js" type="text/javascript"></script>
  <script src="<?=base_url();?>libraries/ketchup/js/jquery.ketchup.validations.js" type="text/javascript"></script>
  <script src="<?=base_url();?>libraries/ketchup/js/jquery.ketchup.helpers.js" type="text/javascript"></script>
  <script src="<?=base_url();?>libraries/ketchup/js/scaffold.js" type="text/javascript"></script>

</head>

<body class="login-img3-body">
  <div  class="container">
    <form id="default-behavior" style="border-radius: 11px;" class="login-form" action="<?=base_url().'Usuario/login';?>"  method="POST">
      <div class="login-wrap">

  <?php
  $success_msg= $this->session->flashdata('success_msg');
  $error_msg= $this->session->flashdata('error_msg');

  if($success_msg){?>
    <div align="center" class="alert alert-success">
      <?php echo $success_msg; ?>
    </div>
    <?php
      }if($error_msg){?>
        <div align="center" class="alert alert-danger">
          <?php echo $error_msg; ?>
        </div>
  <?php
    }
  ?>
        <p class="login-img"><i class="icon_lock_alt"></i></p>
        <br>
          <div  class="wrap-input100" >
            <input class="input100" type="text" name="correo_Usuario" data-validate="validate(required, email)" autofocus>
            <span  class="focus-input100" data-placeholder="Correo Electrónico"></span>
          </div>

          <div class="wrap-input100" >
            <span title="Mostrar contraseña" class="btn-show-pass">
              <i style="font-size: 18px;" class="zmdi zmdi-eye"></i>
            </span>
            <input class="input100"  type="password" name="password" data-validate="validate(required, password)">
            <span class="focus-input100" data-placeholder="Contraseña"></span>
          </div>

        <button  style="font-weight: normal;" class="btn btn-primary btn-lg btn-block" type="submit">Iniciar sesión</button>
        <a type="button" class="btn btn-info btn-lg btn-block" href="<?=base_url();?>ControlFrontEnd/index/1">Cancelar</a>

        <script type="text/javascript">
          $('#default-behavior').ketchup();
        </script>
    </form>


      <div hidden="true" class="text-right">
        <div class="credits">
            <!--
              All the links in the footer should remain intact.
              You can delete the links only if you purchased the pro version.
              Licensing information: https://bootstrapmade.com/license/
              Purchase the pro version form: https://bootstrapmade.com/buy/?theme=NiceAdmin
            -->
            <a href="https://bootstrapmade.com/">Free Bootstrap Templates</a> by <a href="https://bootstrapmade.com/">BootstrapMade</a>
          </div>
      </div>
    </div>
  </body>
</html>

<!--===============================================================================================-->
  <script src="<?=base_url();?>libraries/libraries-backend/login-usuario-styles/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="<?=base_url();?>libraries/libraries-backend/login-usuario-styles/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
  <script src="<?=base_url();?>libraries/libraries-backend/login-usuario-styles/js/main.js"></script>
