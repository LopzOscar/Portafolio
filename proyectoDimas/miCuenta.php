


<?php

    require_once 'admin/class/Usuario.php';
    

    $idUsuario = (isset($_REQUEST['idUsuario'] )) ? $_REQUEST['idUsuario'] : null;

    if ($idUsuario){
        //si existe una id
        // con esto se decide edita un usuario o crea uno nuevo 
        
        $usuario = Usuario::buscarPorId($idUsuario);
    
    }else{

        $usuario = new Usuario();   
        //instancia se manda llamar al metodo (require)
        // union de clases o codigos (include)  
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

        $nombre = (isset($_POST['nombre'] )) ? $_POST['nombre'] : null;
        $apellidoPat = (isset($_POST['apellidoPat'] )) ? $_POST['apellidoPat'] : null;
        $apellidoMat = (isset($_POST['apellidoMat'] )) ? $_POST['apellidoMat'] : null;
        $email = (isset($_POST['email'] )) ? $_POST['email'] : null;
        $password = (isset($_POST['password'] )) ? $_POST['password'] : null;
        $estado = (isset($_POST['estado'] )) ? $_POST['estado'] : null;
        $ciudad = (isset($_POST['ciudad'] )) ? $_POST['ciudad'] : null;
        $calle = (isset($_POST['calle'] )) ? $_POST['calle'] : null;
        $numExterior = (isset($_POST['numExterior'] )) ? $_POST['numExterior'] : null;
        $numInterior = (isset($_POST['numInterior'] )) ? $_POST['numInterior'] : null;
        $colonia = (isset($_POST['colonia'] )) ? $_POST['colonia'] : null;
        $cp = (isset($_POST['cp'] )) ? $_POST['cp'] : null;
        $telefono = (isset($_POST['telefono'] )) ? $_POST['telefono'] : null;
        $estatus = (isset($_POST['estatus'] )) ? $_POST['estatus'] : null;
        $privilegios = (isset($_POST['privilegios'] )) ? $_POST['privilegios'] : null;
        $usuario->setNombre($nombre);
        $usuario->setApellidoPat($apellidoPat);
        $usuario->setApellidoMat($apellidoMat);
        $usuario->setEmail($email);
        $usuario->setPassword($password);
        $usuario->setEstado($estado);
        $usuario->setCiudad($ciudad);
        $usuario->setCalle($calle);
        $usuario->setNumExterior($numExterior);
        $usuario->setNumInterior($numInterior);
        $usuario->setColonia($colonia);
        $usuario->setCP($cp);
        $usuario->setTelefono($telefono);
        $usuario->setEstatus($estatus);
        $usuario->setPrivilegios($privilegios);
        $usuario->guardar();
        header('Location: index.php');
    }else{
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
        
        <body>
        <div class="page-container">
           
<h1 class="textblanco"> Editar Cuenta </h1>

<form method= "POST" action"guardar.php">

    <?php if ($usuario->getIdUsuario()): ?>
    <input type="hidden" name="idUsuario" value="<?php echo $usuario->getIdUsuario() ?>">
    <?php endif; ?>

        


    <label>Nombre</label>
    <input type="text" name="nombre"  value="<?php echo $usuario->getNombre() ?>" required/> <br><br>
    
    <label>Apellido Materno</label>
    <input type="text" name="apellidoPat"  value="<?php echo $usuario->getApellidoPat() ?>"  required/> <br><br>
    
    <label>Apellido Paterno</label>
    <input type="text" name="apellidoMat"  value="<?php echo $usuario->getApellidoMat() ?>"  required/> <br><br>
    
    <label>Direccion de E-mail</label>
    <input type="email" name="email"  value="<?php echo $usuario->getEmail() ?>" required /> <br><br>
    
    <label>Contraseña</label>
    <input type="password" name="password"  value="<?php echo $usuario->getPassword() ?>" required /> <br><br>
    
    <label>Estado</label>
    <input type="text" name="estado"  value="<?php echo $usuario->getEstado() ?>" required /> <br><br>
    
    <label>Ciudad</label>
    <input type="text" name="ciudad"  value="<?php echo $usuario->getCiudad() ?>" required  /> <br><br>
    
    <label>Calle</label>
    <input type="text" name="calle"  value="<?php echo $usuario->getCalle() ?>" required  /> <br><br>
    
    <label>Número Exterior</label>
    <input type="number" name="numExterior"  value="<?php echo $usuario->getNumExterior() ?>" required /> <br><br>
    
    <label>Número Interior</label>
    <input type="number" name="numInterior"  value="<?php echo $usuario->getNumInterior() ?>" /> <br><br>
    
    <label>Colonia</label>
    <input type="text" name="colonia"  value="<?php echo $usuario->getColonia() ?>" required /> <br><br>

    <label>Codigo postal</label>
    <input type="number" name="cp" value="<?php echo $usuario->getCP() ?>"  required /> <br><br>
    
    <label>Teléfono</label>
    <input type="text" name="telefono"  value="<?php echo $usuario->getTelefono() ?>" required /> <br>
    
    <button type="submit">Actualizar</button>
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
}

?>