<?php

	require_once 'admin/class/Contacto.php';
	include_once 'template/header.php';

	$idContacto = (isset($_REQUEST['idContacto'] )) ? $_REQUEST['idContacto'] : null;

	if ($idContacto){
		//si existe una id
 		// con esto se decide edita un usuario o crea uno nuevo 
		
		$contacto = Contacto::buscarPorId($idContacto);
	
	}else{

		$contacto = new Contacto();	
		//instancia se manda llamar al metodo (require)
		// union de clases o codigos (include)  
	}

	if ($_SERVER['REQUEST_METHOD'] == 'POST'){

		$nombre = (isset($_POST['nombre'] )) ? $_POST['nombre'] : null;
		$apellidoPat = (isset($_POST['apellidoPat'] )) ? $_POST['apellidoPat'] : null;
		$apellidoMat = (isset($_POST['apellidoMat'] )) ? $_POST['apellidoMat'] : null;
		$email = (isset($_POST['email'] )) ? $_POST['email'] : null;
		$url = (isset($_POST['url'] )) ? $_POST['url'] : null;
		$mensaje = (isset($_POST['mensaje'] )) ? $_POST['mensaje'] : null;

		$contacto->setNombre($nombre);
		$contacto->setApellidoPat($apellidoPat);
		$contacto->setApellidoMat($apellidoMat);
		$contacto->setEmail($email);
		$contacto->setUrl($url);
		$contacto->setMensaje($mensaje);
		
		$contacto->guardar();
		header('Location: index.php');
	}else{
?>
<script src="js/formulario.js"></script>
	<script src="js/jquery.js"></script>
  <script src="js/jquery.validate.js"></script>
  <script src="js/bootstrap.js"></script>

<div class="row">
<div class="col-sm-9 col-md-9">
<link rel="stylesheet" type="text/css" href="admin/template/css/estilo.css">


		<div id="contenedor">
			
<h1> Contacto </h1>

<form action="" method="POST" id="formulario">

	<?php if ($contacto->getIdContacto()): ?>
	<input type="hidden" name="idContacto" value="<?php echo $contacto->getIdContacto() ?>">
	<?php endif; ?>

		<div id="fore">

	<label> Nombre </label>
	<input type="text" name="letras" id="letras"><br>
	
	<label> Apellido Paterno </label>
	<input type="text" name="apellPat" id="apellPat"> <br>
		
	<label> Apellido Materno </label>
	<input type="text" name="apellMat" id="apellMat"> <br>
	
	<label> Email </label>
	<input type="email"name="email" id="email"><br>
	
	<label> URL </label>
	<input type="text"  name="url" id="url"> <br>
	
	<label> Mensaje </label>
	<input type="text" name="cadenas" id="cadenas"/> <br> <br>
	
	<button type="submit" class="btn btn-success" id="btn">Enviar</button>
	<a href="index.php" class="btn btn-danger"> Cancelar </a>
	</div>
</form>

</div>
</div>
<!-- Sección de Promociones -->

    <div class="col-sm-3 col-md-3">

        <iframe style="width: 100%; height: 260px;" frameborder="0"   src="media/prom/prom.html" ></iframe>
        <iframe style="width: 100%; height: 260px;" frameborder="0"   src="media/log/log/log.html" ></iframe>
         <iframe style="width: 100%; height: 260px;" frameborder="0"   src="media/prom2/prom2/prom2.html" ></iframe>


       <iframe width="250" height="260" src="https://www.youtube.com/embed/3KEUFj2xzjs" frameborder="0" allowfullscreen></iframe>
    

    </div>
</div>
<?php
}
include_once 'template/footer.php';
?>