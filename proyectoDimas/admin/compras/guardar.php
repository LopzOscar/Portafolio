<?php

include_once('../template/header.php');

require_once('../class/Compra.php');
$idCompra=(isset($_REQUEST['idCompra'])) ? $_REQUEST['idCompra']:null;

require_once '../class/Usuario.php';
$usuario= usuario::recuperarTodos();

require_once '../class/Envio.php';
$menvio= metEnvio::EnvioAprobados();

require_once '../class/Pago.php';
$mpago= metPago::PagoAprobados();


if ($idCompra){
	//si existe una id
 	// con esto se decide edita un usuario o crea uno nuevo 
	
	$compra = Compra::buscarPorId($idCompra);
	
	}else{

	$compra = new Compra();	
	//instancia se manda llamar al metodo (require)
	// union de clases o codigos (include)  
	}

	if($_SERVER['REQUEST_METHOD']=='POST') {
		
		$folio =  (isset($_POST['folio'])) ? $_POST['folio']:null ;
		$idUsuario = (isset($_POST['idUsuario'])) ? $_POST['idUsuario']:null ;
		$idPago = (isset($_POST['idPago'])) ? $_POST['idPago']:null ;
		$idEnvio =  (isset($_POST['idEnvio'])) ? $_POST['idEnvio']:null ;
		$iva = (isset($_POST['iva'])) ? $_POST['iva']:null ;
		$subTotal = (isset($_POST['subTotal'])) ? $_POST['subTotal']:null ;
		$total =  (isset($_POST['total'])) ? $_POST['total']:null ;
		$numCuenta = (isset($_POST['numCuenta'])) ? $_POST['numCuenta']:null ;
		$fechaCompra = (isset($_POST['fechaCompra'])) ? $_POST['fechaCompra']:null ;
		
		$compra->setFolio($folio);
		$compra->setIdUsuario($idUsuario);
		$compra->setIdPago($idPago);
		$compra->setIdEnvio($idEnvio);
		$compra->setIva($iva);
		$compra->setSubTotal($subTotal);
		$compra->setTotal($total);
		$compra->setNumCuenta($numCuenta);
		$compra->setFechaCompra($fechaCompra);
		
		$compra->guardar();
		header('Location: index.php');
	}else{
?>

<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12 col-md-3"></div>

		<div class="col-xs-12 col-md-6 well">
			<h1 class="centrarTexto">Modificar pedido</h1>

			<form action="guardar.php" method="POST">
				
				<?php if ($compra->getIdCompra()): ?>
				<input type="hidden" class="form-control" name="idCompra" value="<?php echo $compra->getIdCompra();?>"><br>
				<?php endif; ?>

				<label for="folio" class="control-label">Folio: </label>
				<input type="text" class="form-control" name="folio" id="folio" value="<?php echo $compra->getFolio();?>" required><br>
				
				<label for="idUsuario" class="control-label">Usuario: </label>
				<select name="idUsuario" class="form-control" id="idUsuario" required>
					<option>Selecciona una opción</option>
					<?php foreach ($usuario as $item): ?>
						<option value="<?php echo $item['idUsuario']; ?>">
							<?php echo $item['nombre']; ?>
						</option>				
					<?php endforeach; ?>
				</select><br><br>
				
				<label for="idPago" class="control-label">Metodo de pago: </label>
				<select name="idPago" class="form-control" id="idPago" required>
					<option>Selecciona una opción</option>
					<?php foreach ($mpago as $item): ?>
						<option value="<?php echo $item['idPago']; ?>">
							<?php echo $item['nombre']; ?>
						</option>				
					<?php endforeach; ?>
				</select><br><br>
				
				<label for="idEnvio" class="control-label">Metodo de envio: </label>
				<select name="idEnvio" class="form-control" id="idEnvio" required>
					<option>Selecciona una opción</option>
					<?php foreach ($menvio as $item): ?>
						<option value="<?php echo $item['idEnvio']; ?>">
							<?php echo $item['nombre']; ?>
						</option>				
					<?php endforeach; ?>
				</select><br><br>
			 	
			 	<label for="iva" class="control-label">IVA: </label>
			 	<input type="number" class="form-control" name="iva" id="iva" value="<?php echo $compra->getIva();?>" required><br>
			 	
			 	<label for="subTotal" class="control-label">SubTotal: </label>
			 	<input type="number" class="form-control" name="subTotal" id="subTotal" value="<?php echo $compra->getSubTotal();?>" required><br>
				
				<label for="total" class="control-label">Total: </label>
				<input type="number" class="form-control" name="total" id="total" value="<?php echo $compra->getTotal();?>" required><br>
			 	
			 	<label for="numCuenta" class="control-label">Numero de cuenta: </label>
			 	<input type="text" class="form-control" name="numCuenta" id="numCuenta" value="<?php echo $compra->getNumCuenta();?>" required><br>
				
				<label for="fechaCompra" class="control-label">Fecha de compra: </label>
				<input type="date" class="form-control" name="fechaCompra" id="fechaCompra" value="<?php echo $compra->getFechaCompra();?>" required><br>
			 	
				<center>
					<button type="submit" class="btn btn-success">		
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

		<div class="col-xs-12 col-md-3"></div>
 	
<?php 
}
require_once('../template/footer.php'); 
?>