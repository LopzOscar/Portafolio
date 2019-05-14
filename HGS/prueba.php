<?php 
include_once 'template/header.php';

require_once 'admin/class/Contacto.php';

?>
<form action="" id="formulario" name="formulario" method="POST">

			<label class="control-label" for="nombre"> Nombre </label>
			<input type="text" name="nombre" id="nombre" placeholder="Nombre" /> <br>
			
			<label class="control-label" for="apellidoPat"> Apellido Paterno </label>
			<input type="text" name="apellidoPat" id="apellidoPat" class="form-control" placeholder="Apellido Paterno" /> <br>
			
			<label class="control-label" for="apellidoMat"> Apellido Materno </label>
			<input type="text" name="apellidoMat" id="apellidoMat" class="form-control" placeholder="Apellido Materno" /> <br>
			
			<label class="control-label" for="email"> Email </label>
			<input type="email" name="email" id="email" class="form-control" placeholder="Correo Electronico"
			value="<?php if(isset($_SESSION['email'])){echo $_SESSION['email']; } ?>"
			/> <br>
			
			<label class="control-label" for="mensaje">Mensaje</label> <br>
			<textarea name="mensaje" rows="4" id="mensaje" class="form-control" cols="24" > </textarea> <br>

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

		
		</form>
<script src="js/formulario.js"></script>
<?php 
include_once 'template/footer.php';
?>