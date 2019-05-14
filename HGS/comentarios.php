<?php 
include_once 'template/header.php';

require_once 'admin/class/Comentario.php';

$comentario = Comentario::recuperarTodos();

?>
 <!--aqui inicia la edicion -->

<div class= "row">
	<div class="col-xs-12 col-sm-3 "></div>
	<div class="col-xs-12 col-sm-6 well">
	<h1 class="centrarTexto">Escribe tu comentario</h1>
	<form action="lib/validar_comentario.php" method="POST" >
		
		<label class="control-label" for="email"> <span class="glyphicon glyphicon-envelope" ></span> Email </label>
		<input type="email" name="email" id="email" class="form-control" placeholder="Logueate o escribe un correo para contactarte"
		value="<?php if(isset($_SESSION['email'])){echo $_SESSION['email']; } ?>"
		required /> <br>

		<label class="control-label" for="mensaje"> <span class="glyphicon glyphicon-comment" ></span> Mensaje </label> <br>
		<textarea name="mensaje" rows="4" id="mensaje" class="form-control" cols="24" required pattern="[A-Za-z9-0]+" minlength="3" maxlength="400" > </textarea> <br>

		<label class="control-label" for="estatus"></label>
		<input type="hidden" min="0" max="1" id="estatus" class="form-control" name="estatus" value="<?php echo '1' ?>" required /> <br>

		<label class="control-label" for="fechaPub"></label>
		<input  type="hidden" name="fechaPub" id="fechaPub" class="form-control" value="<?php echo date('Y-m-d') ?>" required /> <br>

		<center>
			<button type="submit" class="btn btn-success">		
			<span class="glyphicon glyphicon-floppy-saved" ></span>
			Publicar
			</button>
			
			<a href="index.php">
			<button type="button" class="btn btn-danger">		
			<span class="glyphicon glyphicon-floppy-remove" ></span>
			Cancelar
			</button>
			</a>
			<!--
		<p><input type="submit" value"Guardar" class="btn btn-success"/></p>
		<a href="comentarios.php" class="btn btn-danger"> Cancelar </a>
			-->
		</center>

	</form>
	</div>

<div class="row">

	<?php 
		if (count($comentario)>0) {
			foreach ($comentario as $item) {		
	?>

		<div class="col-xs-12 well">
			<h4>	<?php echo $item['email']; ?>	</h4>
			<p>	Mensaje: <?php echo $item['mensaje']; ?>	</p>
			<p>	Fecha: <?php echo $item['fechaPub']; ?>	</p>

<!--
		<form action="carrito.php" method="POST">
			<input type="hidden" name="nombre" value="<?php echo $item['nombre']; ?>">
			<input type="hidden" name="url" value="<?php echo $item['url']; ?>">
			<input type="hidden" name="stock" value="<?php echo $item['stock']; ?>">
			<input type="hidden" name="precio" value="<?php echo $item['precio']; ?>">
			<input type="hidden" name="cantidad" value="1">

			<input type="submit" value="COMPRAR">

		</form>
-->

		</div>

	<?php
			}
	 }else{ 
		echo '<p> No hay comentarios disponibles aún.';
	}
	?>
	</div>


<div class="col-xs-12 col-sm-3 "></div>
</div>

<?php 
include_once 'template/footer.php';
?>
