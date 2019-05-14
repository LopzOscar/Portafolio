<?php

   include_once 'template/header.php';
   require_once 'admin/class/Faq.php';

   $faq = Faq::recuperarTodos();

?>

       <!--Sección para editar el contenido del sitio-->
		<div class="row">
			<div class="col-sm-9 col-md-9">
			<div class="col-xs-12 ">
			<h1 style="text-align: center;">Preguntas Frecuentes</h1>
			</div>


		<?php 

			if(count($faq )>0){
				foreach ($faq  as $item) {
         


			?>
					 	<div class="col-xs-12 confaq1 well">
					 		
		 	<h2><p><?php echo $item['pregunta']; ?> </p></h2>
		 	<h3><p><?php echo $item['respuesta']; ?> </p></h3>
		 	</div>
		 
		 	<br>	
		 <?php 

		 	}

			}else{

				echo '<p> No hay productos disponibles... </p>';
			}
			?>
		
		<!--Fin de la sección de edicion-->
		 <!-- Sección de Promociones -->
</div>
    <div class="col-sm-3 col-md-3">

        <iframe style="width: 100%; height: 260px;" frameborder="0"   src="media/gal1/gal1.html" ></iframe>
        <iframe style="width: 100%; height: 260px;" frameborder="0"   src="media/prom/prom.html" ></iframe>
         <iframe width="100%" height="260" src="https://www.youtube.com/embed/3KEUFj2xzjs" frameborder="0" allowfullscreen></iframe>
        <iframe style="width: 100%; height: 260px;" frameborder="0"   src="media/prom2/prom2/prom2.html" ></iframe>
         <iframe width="100%" height="260" src="https://www.youtube.com/embed/sDQ6wlpoeZE" frameborder="0" allowfullscreen></iframe>
       
    

    </div>
     </div>
<?php
  include_once'template/footer.php';
?>		