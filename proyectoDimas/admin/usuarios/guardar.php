<?php

	require_once '../class/Usuario.php';
	include_once '../template/header.php';

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
<link rel="stylesheet" type="text/css" href="../template/css/estilo.css">
		</header>
		<body>
		<div id="contenedor">
			<header>
<h1 class="textblanco"> Nuevo Usuario </h1>

<form method= "POST" action"guardar.php">

	<?php if ($usuario->getIdUsuario()): ?>
	<input type="hidden" name="idUsuario" value="<?php echo $usuario->getIdUsuario() ?>">
	<?php endif; ?>

			</header>

	<div id="fore">

	<label class="textblanco"> Nombre </label>
	<input type="text" name="nombre" value="<?php echo $usuario->getNombre() ?>" required /> <br>
	
	<label class="textblanco"> Apellido Paterno </label>
	<input type="text" name="apellidoPat" value="<?php echo $usuario->getApellidoPat() ?>" required /> <br>
	
	<label class="textblanco"> Apellido Materno </label>
	<input type="text" name="apellidoMat" value="<?php echo $usuario->getApellidoMat() ?>" required /> <br>
	
	<label class="textblanco"> Email </label>
	<input type="email" name="email" value="<?php echo $usuario->getEmail() ?>" required /> <br>
	
	<label class="textblanco"> Password </label>
	<input type="password" name="password" value="<?php echo $usuario->getPassword() ?>" required /> <br>
	
	<label class="textblanco"> Estado </label>
	<input type="text" name="estado" value="<?php echo $usuario->getEstado() ?>" required /> <br>
	
	<label class="textblanco"> Ciudad </label>
	<input type="text" name="ciudad" value="<?php echo $usuario->getCiudad() ?>" required /> <br>
	
	<label class="textblanco"> Calle </label>
	<input type="text" name="calle" value="<?php echo $usuario->getCalle() ?>" required /> <br>
	
	<label class="textblanco"> Numero Externo </label>
	<input type="text" name="numExterior" value="<?php echo $usuario->getNumExterior() ?>" required /> <br>
	
	<label class="textblanco"> Numero Interno </label>
	<input type="text" name="numInterior" value="<?php echo $usuario->getNumInterior() ?>" /> <br>
	
	<label class="textblanco"> Colonia </label>
	<input type="text" name="colonia" value="<?php echo $usuario->getColonia() ?>" required /> <br>

	<label class="textblanco"> Codigo Postal </label>
	<input type="number" name="cp" value="<?php echo $usuario->getCP() ?>" required /> <br>
	
	<label class="textblanco"> Telefono </label>
	<input type="text" name="telefono" value="<?php echo $usuario->getTelefono() ?>" /> <br>

	<label class="textblanco"> Estatus </label>
	<input type="number" min="0" max="1" name="estatus" value="<?php if($usuario->getIdUsuario()){ echo $usuario->getEstatus(); }else{ echo '1'; } ?>" /> <br>
	
	<label class="textblanco"> Privilegios </label>
	<input type="number" min="1" max="3" name="privilegios" value="<?php if($usuario->getIdUsuario()){ echo $usuario->getPrivilegios(); }else{ echo '2'; } ?>" /> <br>
	
	<input class="textblanco" type="submit" value"Guardar" class="btn btn-success" />
	<a href="index.php" class="btn btn-danger"> Cancelar </a>

</form>
</div>
</div>
</body>
<?php
}

?>