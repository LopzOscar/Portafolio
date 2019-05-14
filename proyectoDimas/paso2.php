<?php

   include_once 'template/header.php';
   require_once 'admin/class/Envio.php';

   $envio = metEnvio::recuperarTodos(); //instancia de la clase producto donde se guardaran todas las categorias
   

  

   //if () {
   	
   //}

?>

       <!--Sección para editar el contenido del sitio-->
		<div class="row well">
           <div class="col-xs-3"> 
			 <form action="paso3.php" method="post">
		 		 	<label>Seleciona un metodo de Envi&oacute; </label>
		 		 	<select name="idEnvio">

		 		 		<option value="">Selecciona una metodo de Envi&oacute;</option>
		 		 		<?php foreach ($envio as $item2) {
		 		 		?>
		 		 		<option value="<?php echo $item2['idEnvio'] ?>"><?php echo $item2['nombre'];?></option>

		 		 		<?php
		 		 		}?>
		 		 	</select>
		 		 	<br><br>
		 		 	<input type="submit" value="Continuar">

		 		 </form>
				
		</div>
	    </div>
<div class="col-xs-12 col-md-12">
        <img src="images/dhl.png"  width="220" height="220" class="margin">
        <img src="images/red.png"  width="220" height="220" class="margin">
        <img src="images/est.png"  width="220" height="220" class="margin">
        <img src="images/fed.png"  width="220" height="220" class="margin">
</div>


		<!--Fin de la sección de edicion-->
<?php
  include_once'template/footer.php';
?>		