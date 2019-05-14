<?php

	require_once '../class/Usuario.php';
	include_once '../template/header.php';


	$idUsuario = (isset($_REQUEST['idUsuario'] )) ? $_REQUEST['idUsuario'] : null;
// echo $idUsuario;

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
		$email = (isset($_POST['email'] )) ? $_POST['email'] : null;
		$password = (isset($_POST['password'] )) ? $_POST['password'] : null;
		$estatus = (isset($_POST['estatus'] )) ? $_POST['estatus'] : null;
		$privilegios = (isset($_POST['privilegios'] )) ? $_POST['privilegios'] : null;
		$usuario->setNombre($nombre);
		$usuario->setEmail($email);
		$usuario->setPassword($password);
		$usuario->setEstatus($estatus);
		$usuario->setPrivilegios($privilegios);
		
		$usuario->guardar();
		
	echo '<script>
	alert("Datos guardados correctamente!");
	window.location.href="index.php";
	</script>';

	// header('Location: index.php');
		
	}else{
?>
	
<div class= "row">
	<div class="col-xs-12 col-sm-3 "></div>

	<div class="col-xs-12 col-sm-6 well">

	<h1> Nuevo usuario </h1>

		<form method= "POST" action="guardar.php" id="formulario" name="formulario">

			<?php if($usuario->getIdUsuario()): ?>
			<input type="hidden" name="idUsuario" value="<?php echo $usuario->getIdUsuario() ?>">
			<?php endif; ?>

			<label class="control-label" for="nombre"> Nombre </label>
			<input type="text" name="nombre"  id="nombre" class="form-control" value="<?php echo $usuario->getNombre() ?>" placeholder="Nombre" /> <br>
			
			<label class="control-label" for="email"> Email </label>
			<input type="text" name="email" id="email" class="form-control" value="<?php echo $usuario->getEmail() ?>" placeholder= "Correo Electronico" required /> <br>
			
			<label class="control-label" for="password"> Password </label>
			<input type="password" name="password" id="password" class="form-control" value="<?php echo $usuario->getPassword() ?>" placeholder="Contraseña" /> <br>

			<!--<label class="control-label" for="estatus"> Estatus </label> -->
			<input type="hidden"  id="estatus" class="form-control" name="estatus" required pattern="^[9-0]" min="1" max="2" value="<?php if($usuario->getIdUsuario()){ echo $usuario->getEstatus(); }else{ echo '1'; } ?>" /> <br>
			
			<!-- <label class="control-label" for="privilegios"> Privilegios </label> -->
			<input type="hidden" min="2" max="2" id="privilegios" class="form-control" name="privilegios" required value="<?php if($usuario->getIdUsuario()){ echo $usuario->getPrivilegios(); }else{ echo '2'; } ?>" /> <br>
			
			<center>
				<button type="submit" class="btn btn-success" id="btn">		
				<span class="glyphicon glyphicon-floppy-saved" ></span>
				Guardar
				</button>
			
				<a href="index.php">
				<button type="button" class="btn btn-danger">		
				<span class="glyphicon glyphicon-remove-circle" ></span>
				Cancelar
				</button>
				</a>
			</center>

		</form>
	</div>
		<script src="../js/formulario.js"></script>
	<div class="col-xs-12 col-sm-3"></div>
</div>		
<?php
}
include_once '../template/footer.php';
?>