<?php 
include_once'template/header.php'; 
require_once'admin/class/Usuario.php';

$usuario = Usuario::buscarPorId($_SESSION['idUsuario']);

$_SESSION['total'] = $_POST['total'];




?>


</header>

		<div id="contenedor">
			<header>
<h1 class="textblanco"> Confirmar datos de pedido </h1>

<form method="POST" action="lib/validar_datos.php" >

	<?php if ($usuario->getIdUsuario()): ?>
	<input type="hidden" name="idUsuario" value="<?php echo $usuario->getIdUsuario() ?>">
	<?php endif; ?>

			</header>

	<div id="fore">

	<label class="textblanco"> Nombre </label>
	<input type="text" name="nombre" value="<?php echo $usuario->getNombre() ?>" required /> <br>
	
	<label class="textblanco"> Apellido Paterno </label>
	<input type="text" name="apellidoPat" value="<?php echo $usuario->getApellidoPat() ?>" required /> <br>
	
	<label class="textblanco"> Apellido Materno </label>
	<input type="text" name="apellidoMat" value="<?php echo $usuario->getApellidoMat() ?>" required /> <br>
	
	<label class="textblanco"> Email </label>
	<input type="email" name="email" value="<?php echo $usuario->getEmail() ?>" required /> <br>
		
	<label class="textblanco"> Estado </label>
	<input type="text" name="estado" value="<?php echo $usuario->getEstado() ?>" required /> <br>
	
	<label class="textblanco"> Ciudad </label>
	<input type="text" name="ciudad" value="<?php echo $usuario->getCiudad() ?>" required /> <br>
	
	<label class="textblanco"> Calle </label>
	<input type="text" name="calle" value="<?php echo $usuario->getCalle() ?>" required /> <br>
	
	<label class="textblanco"> Numero Externo </label>
	<input type="text" name="numExterior" value="<?php echo $usuario->getNumExterior() ?>" required /> <br>
	
	<label class="textblanco"> Numero Interno </label>
	<input type="text" name="numInterior" value="<?php echo $usuario->getNumInterior() ?>" /> <br>
	
	<label class="textblanco"> Colonia </label>
	<input type="text" name="colonia" value="<?php echo $usuario->getColonia() ?>" required /> <br>

	<label class="textblanco"> Codigo Postal </label>
	<input type="number" name="cp" value="<?php echo $usuario->getCP() ?>" required /> <br>
	
	<label class="textblanco"> Telefono </label>
	<input type="text" name="telefono" value="<?php echo $usuario->getTelefono() ?>" /> 

	<br><br>

	<button class="textblanco" type="submit" value"Guardar" class="btn btn-primary" />
	<span class="btn btn-lg btn-primary"> Continuar </span>
    </button>
    <button type="button"  class="btn bt-danger" />
	<span class="btn btn-lg btn-danger"> Cancelar pedido </span> 
    </button>

</form>
</div>
</div>


<?php  include_once'template/footer.php';?>