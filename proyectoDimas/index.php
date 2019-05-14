<?php
   include_once'template/header.php';
   require_once 'admin/class/Noticias.php';
   $noticias = Noticias::recuperarTodos();
?>

       <!--Sección para editar el contenido del sitio-->

  <div class="col-sm-9 col-md-9">


          <!-- GALERIA CARRUSEL -->

      <div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="images/galeria/m1.jpg" alt="Chania">
    </div>

    <div class="item">
      <img src="images/galeria/m2.jpg" alt="Chania">
    </div>

    <div class="item">
      <img src="images/galeria/m3.jpg" alt="Flower">
    </div>

    <div class="item">
      <img src="images/galeria/m4.jpg" alt="Flower">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>



      <!-- FINALIZA GALERIA   -->
    <h1 style="text-align: center;">Noticias</h1> 
<?php 

      if(count($noticias)>0){

        foreach ($noticias as $item) {


      ?>

     <div class="col-xs-12 well">
      <h2 style="text-align: center";> <?php echo $item['nombre']?> </h2>
      <h6 style="text-align: center";><?php echo 'Fecha de publicación: '. $item['fechaPub'] ?></h6>
      <img src="admin/noticias/<?php echo $item['url']; ?>" width="500" height="300" class="center-block" >
        <p class="textjust"><input type="hidden" name="idNoticias" value="<?php echo $item['idNoticias'] ?>"></p>
        <p><?php echo $item['noticia'] ?></p>
        
        
     </div>
     <?php 

      }

      }else{

        echo '<p> No hay Noticias... </p>';
      }
      ?>

  
  <h2 style="text-align: center;">MAPA DE UBICACIÓN</h2>
    <div style="text-align: center;"><iframe src="https://www.google.com/maps/embed?pb=!1m0!3m2!1ses!2smx!4v1489721614533!6m8!1m7!1sLdpNdQ7kJNPBhQy368UTRQ!2m2!1d19.89090066512398!2d-100.4414756450991!3f171.51606847771143!4f-11.961650878507996!5f0.7820865974627469" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe></div>
    <!--Fin de la sección de edicion-->
    </div>
  

   <!-- Sección de Promociones -->

    <div class="col-sm-3 col-md-3">

        <iframe style="width: 100%; height: 260px;" frameborder="0"   src="media/prom/prom.html" ></iframe>
         <iframe width="100%" height="260" src="https://www.youtube.com/embed/3KEUFj2xzjs" frameborder="0" allowfullscreen></iframe>
        <iframe style="width: 100%; height: 260px;" frameborder="0"   src="media/prom2/prom2/prom2.html" ></iframe>
         <iframe width="100%" height="260" src="https://www.youtube.com/embed/sDQ6wlpoeZE" frameborder="0" allowfullscreen></iframe>
        <iframe style="width: 100%; height: 260px;" frameborder="0"   src="media/log/log/log.html" ></iframe>

    </div>
     

<?php
  include_once'template/footer.php';

?>    

 