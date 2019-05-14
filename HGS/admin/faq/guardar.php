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
<h1>Nueva pregunta frecuente </h1>

<form method= "POST" action="guardar.php" id="formulario" >

	<?php if ($faq->getIdFaq()): ?>
	<input type="hidden" name="idFaq" value="<?php echo $faq->getIdFaq() ?>">
	<?php endif; ?>

	<label class="control-label" for="pregunta"> Pregunta </label>
	<input type="text"  name="pregunta" id="pregunta" class="form-control" value="<?php echo $faq->getPregunta() ?>" placeholder="Pregunta" required pattern="[A-Za-z9-0]+" minlength="3" maxlength="400" b? /> <br>
	
	<label class="control-label" for="respuesta"> Respuesta </label>
	<input type="text" name="respuesta" id="respuesta" class="form-control" value="<?php echo $faq->getRespuesta() ?>" placeholder="Respuesta" required pattern="[A-Za-z9-0]+" minlength="3" maxlength="400" b? /> <br> <br>
	
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

	<div class="col-xs-12 col-sm-3"></div>
</div>
<?php
}
include_once '../template/footer.php';
?>