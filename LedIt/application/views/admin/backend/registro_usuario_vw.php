<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="<?=base_url();?>libraries/img/icons/icon.png">
  <title>LedIt | Login</title>

<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?=base_url();?>libraries/libraries-backend/login-usuario-styles/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?=base_url();?>libraries/libraries-backend/login-usuario-styles/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?=base_url();?>libraries/libraries-backend/login-usuario-styles/fonts/iconic/css/material-design-iconic-font.min.css">
  <link rel="stylesheet" type="text/css" href="<?=base_url();?>libraries/libraries-backend/login-usuario-styles/css/util.css">
  <link rel="stylesheet" type="text/css" href="<?=base_url();?>libraries/libraries-backend/login-usuario-styles/css/main3.css">

   <script type="text/javascript" src="<?=base_url();?>libraries/sweetalert2/dist/sweetalert2.min.js"></script>
   <script type="text/javascript" src="<?=base_url();?>libraries/sweetalert2/dist/jquery-1.11.1.min.js"></script>
   <link rel="stylesheet" type="text/css" href="<?=base_url();?>libraries/sweetalert2/dist/sweetalert2.css">

  <link rel="stylesheet" type="text/css" media="screen" href="<?=base_url();?>libraries/ketchup/css/jquery.ketchup2.css" />
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
        <?php
                  $registro_fallo=$this->session->flashdata('registro_fallo');
                  if($registro_fallo){
                    ?>
        <script>
                    swal({
                        position: 'center',
                        title: 'Lo sentimos',
                        text: '¡ El correo ingresado esta en uso, intenta con otro !',
                        type: 'warning'
                    }); 
        </script>
                  <?php
                  }
                   ?>
        <form id="default-behavior" action="<?=base_url().'Usuario/registrarUsuario';?>" method="POST" class="login100-form validate-form">
          <span style="color: #fff;"  class="login100-form-title p-b-48">
            Ingresa tus datos
          </span>
          <div class="row">
            <div class="col-md-5 col-lg-5">
                            <div class="wrap-input100">
                                    <input class="input100" type="text" id="nombre_Usuario" name="nombre_Usuario" data-validate="validate(required, text, minlength(3), maxlengt(25))" autofocus>
                                    <span  class="focus-input100" data-placeholder="Nombre (s)"></span>
                            </div>

                            

                                <div  class="wrap-input100">
                                    <input class="input100" type="text" id="apellido_Paterno_Usuario" name="apellido_Paterno_Usuario" data-validate="validate(required, text, minlength(4), maxlengt(25))">
                                    <span  class="focus-input100" data-placeholder="Apellido Paterno"></span>
                                </div>



                                <div  class="wrap-input100">
                                    <input class="input100" type="text"  id="apellido_Materno_Usuario" name="apellido_Materno_Usuario" data-validate="validate(required, text, minlength(4), maxlengt(25))">
                                    <span  class="focus-input100" data-placeholder="Apellido Materno"></span>
                                </div>


                                <div class="wrap-input100">
                                    <input class="input100" type="text" id="calle_Usuario" name="calle_Usuario" data-validate="validate(required, text, minlength(5), maxlengt(25))" autofocus>
                                    <span  class="focus-input100" data-placeholder="Calle"></span>
                            </div>

                            

                                <div  class="wrap-input100">
                                    <input class="input100" type="text" id="numero_Interior_Usuario" name="numero_Interior_Usuario" data-validate="validate(required, text, minlength(1), maxlengt(10))">
                                    <span  class="focus-input100" data-placeholder="Número (exterior/interior)"></span>
                                </div>
            </div>         

            <div class="col-md-1 col-lg-1"></div>

            <div class="col-md-5 col-lg-5">
                            
                                 <div  class="wrap-input100">
                                    <input class="input100" type="text" id="numero_Exterior_Usuario" name="numero_Exterior_Usuario" data-validate="validate(required, number, minlength(5), maxlength(5))">
                                    <span  class="focus-input100" data-placeholder="Código postal"></span>
                                </div>

                                <div  class="wrap-input100">
                                    <input class="input100" type="text" id="telefono_Usuario" name="telefono_Usuario" data-validate="validate(required, number, minlength(10), maxlengt(15))">
                                    <span  class="focus-input100" data-placeholder="Teléfono"></span>
                                </div>

                                <div  class="wrap-input100">
                                    <input class="input100" type="text" id="correo_Usuario" name="correo_Usuario" data-validate="validate(required, email)">
                                    <span  class="focus-input100" data-placeholder="Correo electrónico"></span>
                                </div>

                                <div class="wrap-input100 validate-input">
                                  <span class="btn-show-pass">
                                    <i style="color: #fff; opacity: 1;" title="Mostrar contraseña"  class="zmdi zmdi-eye"></i>
                                  </span>
                                  <input style="opacity: 1;" class="input100" type="password" id="password" name="password" data-validate="validate(required, password ,minlength(8))">
                                  <span style="opacity: 1;" class="focus-input100" data-placeholder="Contraseña"></span>

                                  <input hidden class="input100" type="number" name="id_Privilegios_Usuario" value="4">
                                  <input hidden class="input100" type="number" name="id_Status_Usuario" value="1">
                                </div>
                               

                              <div class="wrap-login100-form-btn">
                                  <div class="login100-form-bgbtn"></div>
                                  <button class="login100-form-btn">
                                    Registrar
                                  </button>
                                </div>
                              </div>                                                    

                    </div>

                        <div style="color: #fff; opacity: 1;" class="container-login100-form-btn">
                          <span class="txt1">
                            <br>
                              ¿ Ya tienes una cuenta ? 
                            </span>
                            <a style="padding-left: 10px; color: #fff;" class="txt2" href="<?=base_url();?>Admin/index/11">
                              <br>
                               Inicia sesión&nbsp;&nbsp;|
                            </a>
                            <br>
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
  <script src="<?=base_url();?>libraries/js/validCampoFranz.js"></script>

  <script type="text/javascript">
            $(function(){

                $('#nombre_Usuario').validCampoFranz('sabcdefghijklmnñopqrstuvwxyzáéíóú');
                $('#apellido_Paterno_Usuario').validCampoFranz(' abcdefghijklmnñopqrstuvwxyzáéíóú');
                $('#apellido_Materno_Usuario').validCampoFranz(' abcdefghijklmnñopqrstuvwxyzáéíóú');
                $('#calle_Usuario').validCampoFranz(' abcdefghijklmnñopqrstuvwxyzáéíóú/'); 
                $('#numero_Interior_Usuario').validCampoFranz(' abcdefghijklmnñopqrstuvwxyz-/0123456789'); 
                $('#numero_Exterior_Usuario').validCampoFranz('0123456789');
                $('#telefono_Usuario').validCampoFranz('0123456789'); 
                $('#numInt').validCampoFranz('abcdefghijklmnñopqrstuvwxyz'); 
               
                 
            });
</script>

</body>
</html>