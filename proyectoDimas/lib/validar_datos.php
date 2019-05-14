<?php
    session_start();
    require_once '../admin/class/Usuario.php';
    

    $idUsuario = (isset($_REQUEST['idUsuario'] )) ? $_REQUEST['idUsuario'] : null;

    if ($idUsuario){
        //si existe una id
        // con esto se decide edita un usuario o crea uno nuevo 
        
        $usuario = Usuario::buscarPorId($idUsuario);
    
    }

   

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
header('Location: ../paso2.php');