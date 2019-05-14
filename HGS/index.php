<?php 
include_once 'template/header.php';
 require_once 'admin/class/Noticias.php';

   $not = Noticias::recuperarTodos();
?>
 <!--aqui inicia la edicion -->
 

 
	<div class=" row ">

		<center><div class="col-xs-12 ">
			<center><h1 >Noticias</h1></center>
			
		<?php 

      if(count($not)>0){

        foreach ($not as $item) {


      ?>

     <div class="col-xs-12 well">
     <h1 style="text-align: center";> <?php echo $item['nombre']?> </h1>
     
      <h6 style="text-align: center";><?php echo 'Fecha de publicación: '. $item['fechaPub'] ?></h6>
      <img src="admin/nos/<?php echo $item['url']; ?>" width="500" height="300" class="center-block" >
        <p class="textjust"><input type="hidden" name="idNoticia" value="<?php echo $item['idNoticia'] ?>"></p>
        <p><?php echo $item['noticia'] ?></p>
        
        
     </div>
     <?php 

      }

      }else{

        echo '<p> No hay Noticias... </p>';
      }
      ?>

		</div>

	</div>

<?php 
include_once 'template/footer.php';
//  <h2 style="text-align: center";> <?php echo $item['noticia']--cerrar PHp </h2>
?>
 