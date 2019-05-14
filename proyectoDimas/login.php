
<!DOCTYPE html>
<html lang="en" class="no-js">

 

        <meta charset="utf-8">
        <title>Login</title>
        

        <!-- CSS -->
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans:400,700'>
        <link rel="stylesheet" href="template/css/reset.css">
        <link rel="stylesheet" href="template/css/supersized.css">
        <link rel="stylesheet" href="template/css/stylelogin.css">
        <script src="js/formulario.js"></script>
    <script src="js/jquery.js"></script>
  <script src="js/jquery.validate.js"></script>
  <script src="js/bootstrap.js"></script>

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

  

        <div class="page-container">
            <h1>Login</h1>
            <form action="lib/validar_login.php" method="post">
            	 
                <input type="text" name="email" id="email" class="username" placeholder="Username">
                <input type="password" name="password" id="password" class="password" placeholder="Password">
                <button type="submit" id="btn">Iniciar Sesión</button>
                <div class="error"><span>+</span></div>
               
            </form><br>
            <a class href="index.php">Cancelar</a>

            <div class="connect">

                <p>Iniciar con:</p>
                <p>
                    <a class="facebook" href="#"></a>
                    <a class="twitter" href="#"></a>
                </p>
            </div>
        </div>

        <!-- Javascript -->
        <script src="js/jquery-1.8.2.min.js"></script>
        <script src="js/supersized.3.2.7.min.js"></script>
        <script src="js/supersized-init.js"></script>
        <script src="js/scripts.js"></script>


</html>
