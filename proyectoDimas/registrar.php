
<?php

    require_once 'admin/class/Usuario.php';
    

?>

    <!--   FORMULARIO      -->

        <br>
        <br>
        <br>
<header>
      <meta charset="utf-8">
        <title>Login</title>
        

        <!-- CSS -->
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans:400,700'>
        <link rel="stylesheet" href="template/css/reset.css">
        <link rel="stylesheet" href="template/css/supersized.css">
        <link rel="stylesheet" href="template/css/stylelogin.css">
        <script src="js/jquery.validate.js"></script>
        <script src="js/formulario.js"></script>
        <script type="js/jquery.js"></script>
        <script type="js/bootstrap.js"></script>
        <body>
        <div class="page-container">
           
<h1 class="textblanco"> Registrarse </h1>

<form method= "POST" action="lib/validar_registro.php" id="formulario">

   
  
    <input type="text" name="nombre" placeholder="Nombre" required /> <br>
    
   
    <input type="text" name="apellidoPat" placeholder="Apellido Paterno"  required /> <br>
    

    <input type="text" name="apellidoMat" placeholder="Apellido Materno"  required /> <br>
    

    <input type="email" name="email" placeholder="Correo Electronico" required /> <br>
    

    <input type="password" name="password" placeholder="Contraseña" required /> <br>
    
    <select name="estado">
        <option value"">Selecciona tu Estado</option>
        <option value"Michoacán" > Michoacán</option>
        <option value"Guanajuato"> Guanajuato</option>
    </select>

    <select name="ciudad">
        <option value"">Selecciona tu Ciudad</option>
        <option value"Maravatío"> Maravatío</option>
        <option value"Morelia"> Morelia</option>
        <option value"Cd  Hidalgo"> Cd Hidalgo</option>
        <option value"Acámbaro" > Acámbaro</option>
        <option value"Salvatierra"> Salvatierra</option>
        <option value"Celaya" > Celaya</option>
    </select>
        
    <input type="text" name="calle" placeholder="Calle" required /> <br>
    
    
    <input type="number" name="numExterior" placeholder="Numero Exterior"  required /> <br>
    
   
    <input type="number" name="numInterior" placeholder="Numero Interior" /> <br>
    
    
    <input type="text" name="colonia" placeholder="Colonia" required /> <br>

   
    <input type="number" name="cp" placeholder="Codigo Postal" required /> <br>
    

    <input type="text" name="telefono" placeholder="Telefono" /> <br>


    <input type="hidden" name="estatus" value="1">
            <input type="hidden" name="privilegios" value="3">
    
    <button type="submit">Registrase</button>
    <a href="index.php" class="btn btn-danger"> Cancelar </a>

    <div class="connect">

                <p>Registrarse con:</p>
                <p>
                    <a class="facebook" href="#"></a>
                    <a class="twitter" href="#"></a>
                </p>
            </div>

</form>
</div>


 <!-- Javascript -->
        <script src="js/jquery-1.8.2.min.js"></script>
        <script src="js/supersized.3.2.7.min.js"></script>
        <script src="js/supersized-init.js"></script>
        <script src="js/scripts.js"></script>

</body>
<?php

?>