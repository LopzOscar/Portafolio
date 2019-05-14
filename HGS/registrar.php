<?php 
include_once 'template/header.php';
?>
<div class="row">
		<div class="col-xs-12 col-sm-3 "></div>

		<div class="col-xs-12 col-sm-6 well">
		<h1>Registrar</h1>

		<form action="lib/validar_registro.php" method="POST">
			
			<label class="control-label" for="nombre"> Nombre </label>
			<input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre" required /> <br>
			
			<label class="control-label" for="email"> Correo Electronico </label>
			<input type="email" name="email" id="email" class="form-control" placeholder="Email" required /> <br>
			
			<label class="control-label" for="password"> Contraseña </label>
			<input type="password" name="password" id="password" class="form-control" placeholder="Password" required /> <br>

			<input type="hidden" name="estatus" value="1">
			<input type="hidden" name="privilegios" value="2">

			<center>
				<button type="submit" class="btn btn-success">		
				<span class="glyphicon glyphicon-ok-circle" ></span>
				Enviar
				</button>
			
				<a href="index.php">
				<button type="button" class="btn btn-danger">		
				<span class="glyphicon glyphicon-remove-circle" ></span>
				Cancelar
				</button>
				</a>
				<!--
			<p><input type="submit" value"Registrar" class="btn btn-success"/></p>
			<a href="index.php" class="btn btn-danger"> Cancelar </a>
				-->
			</center>
		
		</form>
	</div>
<div class="col-xs-12 col-sm-3"></div>
</div>
<?php 
include_once 'template/footer.php';
?>