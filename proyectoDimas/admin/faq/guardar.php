<?php

	require_once '../class/Faq.php';
	include_once '../template/header.php';

	$idFaq = (isset($_REQUEST['idFaq'] )) ? $_REQUEST['idFaq'] : null;

	if ($idFaq){
		//si existe una id
 		// con esto se decide edita un usuario o crea uno nuevo 
		
		$faq = Faq::buscarPorId($idFaq);
	
	}else{

		$faq = new Faq();	
		//instancia se manda llamar al metodo (require)
		// union de clases o codigos (include)  
	}

	if ($_SERVER['REQUEST_METHOD'] == 'POST'){

		$pregunta = (isset($_POST['pregunta'] )) ? $_POST['pregunta'] : null;
		$respuesta = (isset($_POST['respuesta'] )) ? $_POST['respuesta'] : null;

		$faq->setPregunta($pregunta);
		$faq->setRespuesta($respuesta);
		
		$faq->guardar();
		header('Location: index.php');
	}else{
?>
<br>
<br>
<br>
<header>
<link rel="stylesheet" type="text/css" href="../template/css/estilo.css">
		</header>
		<body>
		<div id="contenedor">
			<header>

<h1> Agregar Pregunta Frecuente </h1>

<form method= "POST" action"guardar.php">

	<?php if ($faq->getIdFaq()): ?>
	<input type="hidden" name="idFaq" value="<?php echo $faq->getIdFaq() ?>">
	<?php endif; ?>

		</header>
		
		<div id="fore">

	<label> Pregunta </label>
	<input type="text"  name="pregunta" value="<?php echo $faq->getPregunta() ?>" /> <br>
	
	<label> Respuesta </label>
	<input type="text" name="respuesta" value="<?php echo $faq->getRespuesta() ?>" /> <br> <br>
	
	<input type="submit" value"Guardar" class="btn btn-success" />
	<a href="index.php" class="btn btn-danger"> Cancelar </a>

</form>
</div>
</div>
</body>

<?php
}

?>