<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="<?=base_url();?>libraries/img/icons/icon.png">
  <title>LedIt | Login</title>

	<script type="text/javascript" src="<?=base_url();?>libraries/sweetalert2/dist/sweetalert2.min.js"></script>
    <script type="text/javascript" src="<?=base_url();?>libraries/sweetalert2/dist/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>libraries/sweetalert2/dist/sweetalert2.min.css">


<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url();?>libraries/libraries-backend/login-usuario-styles/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url();?>libraries/libraries-backend/login-usuario-styles/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url();?>libraries/libraries-backend/login-usuario-styles/fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url();?>libraries/libraries-backend/login-usuario-styles/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url();?>libraries/libraries-backend/login-usuario-styles/css/main.css">
	<link rel="stylesheet" type="text/css" media="screen" href="<?=base_url();?>libraries/ketchup/css/jquery.ketchup2.css" />

	<script type="text/javascript" src="<?=base_url();?>libraries/sweetalert2/dist/sweetalert2.min.js"></script>
    <script type="text/javascript" src="<?=base_url();?>libraries/sweetalert2/dist/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>libraries/sweetalert2/dist/sweetalert2.css">

    <script type="text/javascript" src="<?=base_url();?>libraries/ketchup/js/jquery-1.4.4.min.js"></script>
    <script type="text/javascript" src="<?=base_url();?>libraries/ketchup/js/jquery.ketchup.all.min.js"></script>
    <script src="<?=base_url();?>libraries/ketchup/js/jquery.js" type="text/javascript"></script>
    <script src="<?=base_url();?>libraries/ketchup/js/jquery.ketchup.js" type="text/javascript"></script>
    <script src="<?=base_url();?>libraries/ketchup/js/jquery.ketchup.validations.js" type="text/javascript"></script>
    <script src="<?=base_url();?>libraries/ketchup/js/jquery.ketchup.helpers.js" type="text/javascript"></script>
    <script src="<?=base_url();?>libraries/ketchup/js/scaffold.js" type="text/javascript"></script>

 
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form id="default-behavior" action="<?=base_url().'Usuario/loginCliente';?>" method="POST" class="login100-form validate-form">


					<?php
		             $registro_exitoso= $this->session->flashdata('registro_exitoso');
		             $login_fallo= $this->session->flashdata('login_fallo');

		                  if($registro_exitoso){
		                    ?>
				        <script>
				                    swal({
				                        position: 'center',
				                        title: 'Correcto',
				                        text: '¡ Cuenta creada exitosamente !',
				                        type: 'success'
				                    }); 
				        </script>

		                  <?php
		                  }
		                  if($login_fallo){
		                    ?>
		                <script>
				                    swal({
				                        position: 'center',
				                        title: 'Lo sentimos',
				                        text: '¡ Usuario incorrecto, intenta de nuevo !',
				                        type: 'warning'
				                    }); 
				        </script>
		                    <?php
                  }
                  ?>

					<span class="login100-form-title p-b-48">
						<img src="<?=base_url();?>libraries/img/icons/ledit.png" width="42%">
						&nbsp;&nbsp;<i style="color: #fff; opacity: 1; font-size: 60px;" class="zmdi zmdi-accounts"></i>
					</span>

					<div class="wrap-input100 validate-input">
						<input style="opacity: 1;" class="input100" type="text" name="correo_Usuario" data-validate="validate(required, email)" autofocus>
						<span style="opacity: 1;" class="focus-input100" data-placeholder="Correo electrónico"></span>
					</div>

					<div class="wrap-input100 validate-input">
						<span class="btn-show-pass">
							<i style="color: #fff; opacity: 1;" title="Mostrar contraseña"  class="zmdi zmdi-eye"></i>
						</span>
						<input style="opacity: 1;" class="input100" type="password" name="password" data-validate="validate(required, password)">
						<span style="opacity: 1;" class="focus-input100" data-placeholder="Contraseña"></span>
					</div>
		
					<div style="color: #fff; opacity: 1;" class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Iniciar sesión
							</button>
						</div>
					<span class="txt1">
						<br>
							¿No tienes una cuenta? 
						</span>
						<a style="padding-left: 10px; color: #fff;" class="txt2" href="<?=base_url();?>Admin/index/10">
							<br>
							 Regsitrate
						</a>
						<a style="padding-left: 10px; color: #fff;" class="txt2" href="<?=base_url();?>">
							<br>
							 <span><i class="zmdi zmdi-home"></i>&nbsp;Volver</span> 
						</a>
					</div>

					 <script type="text/javascript">
			          $('#default-behavior').ketchup();
			        </script>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="<?=base_url();?>libraries/libraries-backend/login-usuario-styles/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=base_url();?>libraries/libraries-backend/login-usuario-styles/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=base_url();?>libraries/libraries-backend/login-usuario-styles/vendor/bootstrap/js/popper.js"></script>
	<script src="<?=base_url();?>libraries/libraries-backend/login-usuario-styles/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=base_url();?>libraries/libraries-backend/login-usuario-styles/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=base_url();?>libraries/libraries-backend/login-usuario-styles/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?=base_url();?>libraries/libraries-backend/login-usuario-styles/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="<?=base_url();?>libraries/libraries-backend/login-usuario-styles/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="<?=base_url();?>libraries/libraries-backend/login-usuario-styles/js/main.js"></script>

</body>
</html>