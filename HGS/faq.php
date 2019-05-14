<?php 
include_once 'template/header.php';
 require_once 'admin/class/Faq.php';

   $faq = Faq::recuperarTodos();
?>
 <!--aqui inicia la edicion -->
 

 
	<div class=" row ">

		<center><div class="col-xs-12 ">
			<center><h1 >Preguntas Frecuentes</h1></center>
			
		<?php 

      if(count($faq)>0){

        foreach ($faq as $item) {


      ?>

     <div class="col-xs-12 well">
     <h4 style="";> <?php echo $item['pregunta']?> </h4>
     
      <h4 style="";><?php echo $item['respuesta'] ?></h4>
              
     </div>
     <?php 

      }

      }else{

        echo '<p> No hay preguntas registradas... </p>';
      }
      ?>

		</div>

	</div>

<?php 
include_once 'template/footer.php';

?>
 