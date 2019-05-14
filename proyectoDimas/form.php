<?php 
	include_once 'template/header.php';
?>
	<script src="js/formulario1.js"></script>
		<div class="row">

				<div class="col-xs-12 col-md-9">
					<h2> JVALIDATE </h2>
					<form action="" method="post" id="formulario">

						<label>Letras </label>
						<input type="text" name="letras" id="letras"><br>

						<label>Cadenas </label>
						<input type="text" name="cadenas" id="cadenas"><br>

						<label>Email</label>
						<input type="email" name="email" id="email"><br>

						<label>Numeros</label>
						<input type="text"  name="numeros" id="numeros"><br>
						
						<button type="submit" id="btn">Enviar</button> 
					</form>
				</div>		
		</div>
	<?php 
   include_once 'template/footer.php';
	?>