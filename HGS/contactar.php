<?php 
include_once 'template/header.php';

require_once 'admin/class/Contacto.php';

?>
 <!--aqui inicia la edicion -->
 
	<div class="row">
		<div class="col-xs-12 col-sm-3 "></div>

		<div class="col-xs-12 col-sm-6 well">

				<div class= "row">
				<center> <div class="col-xs-12">
				<img src="images/contc.png" class=" "> 
				</div> </center>
				</div>

		<h1 class="centrarTexto">Contactar</h1>

		<form action="lib/validar_contacto.php" id="formulario" name="formulario" method="POST">

			<label class="control-label" for="nombre"> Nombre (Usa solamente mayúsculas) </label>
			<input type="text" name="nombre" pattern="[A-Z ]+" required="" id="nombre" class="form-control" placeholder="Nombre" minlength="3" maxlength="40" /> <br>
			
			<label class="control-label" for="apellidoPat"> Apellido Paterno (Usa solamente mayúsculas) </label>
			<input type="text" name="apellidoPat" pattern="[A-Z ]+" required="" id="apellidoPat" class="form-control" placeholder="Apellido Paterno" minlength="3" maxlength="40" /> <br>
			
			<label class="control-label" for="apellidoMat"> Apellido Materno (Usa solamente mayúsculas) </label>
			<input type="text" name="apellidoMat" pattern="[A-Z ]+" required="" id="apellidoMat" class="form-control" placeholder="Apellido Materno" minlength="3" maxlength="40" /> <br>
			
			<label class="control-label" for="email"> Email </label>
			<input type="email" name="email" id="email" class="form-control" required placeholder="Correo Electronico"
			value="<?php if(isset($_SESSION['email'])){echo $_SESSION['email']; } ?>"
			/> <br>
			
			<label class="control-label" for="mensaje">Mensaje</label> <br>
			<textarea name="mensaje" required="" rows="4" id="mensaje" class="form-control" cols="24" > </textarea> <br>

			<center>
			<!--
			<input type="submit" value="Contactar" id="btn"/>
			-->
			<button type="submit" class="btn btn-success" id="btn">		
			<span class="glyphicon glyphicon-ok-circle" ></span>
			Contactar
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
	<script src="js/formulario.js"></script>
<div class="col-xs-12 col-sm-3"></div>
</div>

<?php 
include_once 'template/footer.php';
?>