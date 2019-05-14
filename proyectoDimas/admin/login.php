<?php
   include_once'template/header.php';
?>

       <!--Sección para editar el contenido del sitio-->
		<div class="row well">
			<h1>Iniciar sesi&oacute;n</h1>
			<form action="lib/validar_login.php" method="post">
				<label>E-mail</label>
				<input type="email" name="email"><br><br>
				<label>Password</label>
				<input type="password" name="password"><br><br>
				<input type="submit" value="Iniciar" class="btn btn-success">
			</form>
		</div>
		<!--Fin de la sección de edicion-->
<?php
  include_once'template/footer.php';
?>		