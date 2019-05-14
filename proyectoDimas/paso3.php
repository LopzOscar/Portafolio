<?php

   include_once 'template/header.php';

   require_once 'admin/class/Usuario.php';
	require_once 'admin/class/Envio.php';
	require_once 'admin/class/Pago.php';
	include_once 'template/header.php';

   $pago = MetPago::recuperarTodos(); //instancia de la clase producto donde se guardaran todas las categorias

   $_SESSION['idEnvio'] = $_POST['idEnvio'];
   


  

   //if () {
   	
   //}

?>

       <!--Sección para editar el contenido del sitio-->
		<div class="row well">
           <div class="col-xs-3"> 
			 <form action="paso4.php" method="post">
		 		 	<label>Seleciona un metodo de Pago </label>
		 		 	<select name="idPago">

		 		 		<option value="">Selecciona una metodo de pago</option>
		 		 		<?php foreach ($pago as $item2) {
		 		 		?>
		 		 		<option value="<?php echo $item2['idPago'] ?>"><?php echo $item2['nombre'];?></option>

		 		 		<?php
		 		 		}?>
		 		 	</select>
		 		 	<br><br>
		 		 	<input type="submit" value="Continuar">

		 		 </form>
				
		</div>
	    </div>

		<!--Fin de la sección de edicion-->
<?php
  include_once'template/footer.php';
?>