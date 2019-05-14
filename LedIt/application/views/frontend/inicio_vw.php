<?php
/**
 * Archivo con php embebido para listado de las faqs registradas en la base de datos (FrontEnd).
 *
 *
 *
 * @category   File
 * @package    views
 * @subpackage frontend
 * @copyright  Copyright (c) 2018-2019 Revoltech Inc.
 * @version    $Id:$1.0
 * @since      File available since Release 1.0
*/
?>
  <!-- ##### Hero Area Start ##### -->
    <section class="hero-area">
        <div  style=" box-shadow: 0px 0px 10px 1px rgba(0,0,0,0.9);" class="hero-slides">
            <!-- Single Hero Slide -->
            <div class="single-hero-slide bg-img" style="background-image: url(<?=base_url();?>libraries/img/bg-img/s7.jpg); ">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <div class="hero-slides-content">
                                <h2 data-animation="fadeInUp" data-delay="100ms">Últimas tecnologías</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Single Hero Slide -->
            <div class="single-hero-slide bg-img" style="background-image: url(<?=base_url();?>libraries/img/bg-img/s4.jpg);">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <div class="hero-slides-content">
                                <h2 data-animation="fadeInUp" data-delay="100ms">de ahorro de energía</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Single Hero Slide -->
            <div class="single-hero-slide bg-img" style="background-image: url(<?=base_url();?>libraries/img/bg-img/s11.jpg);">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <div class="hero-slides-content">
                                
                                <h2 data-animation="fadeInUp" data-delay="100ms"><i data-animation="fadeInUp" data-delay="100ms" class="fa fa-lightbulb-o"></i></h2>
                                <h2 data-animation="fadeInUp" data-delay="100ms">en iluminación</h2>

                                 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <style type="text/css">
  #fondo{

  background: #0a1123;
  background: -webkit-linear-gradient(left, #0a1123, #6c87cc);
  background: -o-linear-gradient(left, #0a1123, #6c87cc);
  background: -moz-linear-gradient(left, #0a1123, #6c87cc);
  background: linear-gradient(left, #0a1123, #6c87cc);
}
  }
</style>
    <!-- ##### Hero Area End ##### -->
    <!-- ##### Featured Properties Area Start ##### -->
    <section id="fondo" class="featured-properties-area section-padding-100-50">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <div  style="background-color: #7d7d7d; border-radius: 20px;" class="section-heading wow fadeInUp">
                            <h1 style="color: #000;">Conoce nuestros nuevos productos</h1>
                            
                               <div style="background-color:  #0a1123;" class="section-heading wow fadeInUp">
                                <p style="color: #fff;">Siempre a la vanguardia con las mejores tecnologías</p>
                              </div>
                    </div>
                </div>
            </div>

            <?php
                //mostramos el mensaje de las sesiones flashdata dependiendo
                //de lo que hayamos hecho.
                $agregado = $this->session->flashdata('agregado');
                $destruido = $this->session->flashdata('destruido');
                $productoEliminado = $this->session->flashdata('productoEliminado');
                if ($agregado) {
                    ?>
                    <script>
                                    swal({
                                        position: 'center',
                                        title: 'Correcto',
                                        text: '¡ Producto agregado al carrito !',
                                        type: 'success'
                                    }); 
                        </script>
                    <?php
                }elseif($destruido){
                    ?>
                   <script>
                                    swal({
                                        position: 'center',
                                        title: 'Correcto',
                                        text: '¡ El carrito esta vacío !',
                                        type: 'success'
                                    }); 
                        </script>
                    <?php
                }elseif($productoEliminado){
                    ?>
                     <script>
                                    swal({
                                        position: 'center',
                                        title: 'Correcto',
                                        text: '¡ Producto eleiminado del carrito !',
                                        type: 'success'
                                    }); 
                        </script>
                    <?php
                }
                ?>

            <div class="row">
            <?php
                /**
                 * Generara un listado de los productos por medio del objeto declarado en la clase "Producto_Mdl".
                 */
                foreach($productos as $prod):
            ?>
                <!-- Single Featured Property -->
                <div  class="col-12 col-md-6 col-xl-4">
                    <div style="background-color: #fff;" class="single-featured-property mb-50 wow fadeInUp" data-wow-delay="100ms">

            <?=form_open(base_url().'Productos/agregarProducto')?>

                        <!-- Property Thumbnail -->
                        <div class="property-thumb">
                    <?php $ruta1=base_url(). "libraries/libraries-backend/images/thumbnails/productos/"?>
                    <?php $ruta2=base_url(). "libraries/libraries-backend/images/thumbnails/"?>

                     <?php 
                     /**
                      * El if declara que si el campo imagen_Producto no esta vacio se mostrara la imagen asignada.
                      * Pero en caso de que este vaciose le asignará una por default.
                      */
                     if ($prod->imagen_Producto != null){ ?>
                                <img src="<?=$ruta1.$prod->imagen_Producto;?>">
                     <?php }else{ ?>
                               <img src="<?=$ruta2.'ledit.png';?>">
                     <?php } ?>
                            
                            <div class="list-price">
                                <p>$<?=$prod->precio_Producto;?></p>
                            </div>
                        </div>
                        <!-- Property Content -->
                        <div style="background-color:  #0a1123; border-style: none;"  class="property-content">
                            <h5 style="color: #fff;"  align="center"><?=$prod->modelo_Producto;?></h5>
                            <p style="color: #7d7d7d;"  align="center" class="location"><?=$prod->nombre_Producto;?></p>
                             <hr style="border-style: solid; border-color: #7d7d7d;">
                            <p style="text-align: justify; font-weight: normal;">Potencia:&nbsp;&nbsp;<i style="color: #fff; font-style: normal;"><?=$prod->potencia_Producto;?></i><br>
                               Voltaje:&nbsp;&nbsp;<i style="color: #fff; font-style: normal;"><?=$prod->voltaje_Producto;?></i><br>
                               Color de luz:&nbsp;&nbsp;<i style="color: #fff; font-style: normal;"><?=$prod->color_Luz_Producto;?></i><br>
                               Material:&nbsp;&nbsp;<i style="color: #fff; font-style: normal;"><?=$prod->material_Producto;?></i><br>
                               Flijo Luminoso:&nbsp;&nbsp;<i style="color: #fff; font-style: normal;"><?=$prod->flujo_Luminoso_Producto;?></i> 
                            </p>
                            <hr style="border-style: solid; border-color: #7d7d7d;">
                            <div class="property-meta-data d-flex align-items-end justify-content-between">
                                <div style="margin-left: 55px;">
                                       
                                     <?= form_submit('action','Agregar al carrito', "class='btn btn-success'"); ?>
                                </div>
                                
                            </div>
                        </div>

                        <?= form_hidden('uri', $this->uri->segment(3)); ?>
                        <?= form_hidden('id', $prod->id_Producto); ?>
                        <?= form_close() ?>
                    </div>
                </div>
            <?php
                endforeach;
            ?>
              <div style="color: #000;" >
              <div>
                <?= $this->pagination->create_links() ?>
              </div>
            </div>
              </div>
            </div>
        </div>
    </section>

    <!-- ##### Featured Properties Area End ##### -->
    <!-- ##### Call To Action Area Start ##### -->
    <section class="call-to-action-area bg-fixed bg-overlay-black" style="background-image: url(<?=base_url();?>libraries/img/bg-img/s8.jpg)">
        <div class="container h-100">
            <div class="row align-items-center h-100">
                <div class="col-12">
                    <div class="cta-content text-center">
                        <h2 class="wow fadeInUp" data-wow-delay="200ms">¿Quiénes somos?</h2>

                        <p style="color: #ffffff; font-size: 24px; text-align: justify;" class="wow fadeInUp" data-wow-delay="300ms">
                            <i class="fa fa-arrow-right"></i><strong style="color: #696969;"> Empresa formalmente</strong> establecida especializada en iluminación con tecnología LED.
                        </p>
                        <br>

                        <p style="color: #ffffff; font-size: 24px; text-align: justify;" class="wow fadeInUp" data-wow-delay="400ms">
                            <i class="fa fa-arrow-right"></i><strong style="color: #696969;"> Ofrecemos Productos</strong>  y soluciones para un gran número de necesidades de iluminación para el hogar oficinas e industria.
                        </p>
                        <br>

                        <p style="color: #ffffff; font-size: 24px; text-align: justify;" class="wow fadeInUp" data-wow-delay="700ms">
                            <i class="fa fa-arrow-right"></i><strong style="color: #696969"> Buscamos estar siempre</strong> a la vanguardia en productos de última generación para ofrecer siempre la mejor solución y precio.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Call To Action Area End ##### -->
    <!-- ##### Editor Area Start ##### -->
    <section class="south-editor-area d-flex align-items-center">
        <!-- Editor Content -->
        <div class="editor-content-area">
            <!-- Section Heading -->
            <div class="section-heading wow fadeInUp" data-wow-delay="250ms">
                <h2>Nuestra Misión</h2>
            </div>
            <p style="font-size: 20px;" class="wow fadeInUp" data-wow-delay="500ms">
            <i class="fa fa-arrow-right"></i><strong style="color: #0a1123;"> Ofrecer las últimas tecnologías</strong> de ahorro de energía en iluminación  a precios competitivos y alta calidad.</p>
            <div class="address wow fadeInUp" data-wow-delay="750ms">
            </div>
            <div class="signature mt-50 wow fadeInUp" data-wow-delay="1000ms">
            </div>
            <div class="section-heading wow fadeInUp" data-wow-delay="250ms">
                <h2>Nuestra Visión</h2>
            </div>
            <p style="font-size: 20px;" class="wow fadeInUp" data-wow-delay="500ms">
            <i class="fa fa-arrow-right"></i><strong style="color: #0a1123;"> Vemos un mundo con recursos materiales y energéticos</strong> limitados donde un gasto eficiente e inteligente en iluminación nos asegure una vida mejor. </p>
        </div>
        <!-- Editor Thumbnail -->
        <div class="wow fadeInUp editor-thumbnail">
            <img src="<?=base_url();?>libraries/img/bg-img/s6.jpg" alt="">
        </div>
    </section>
    <!-- ##### Editor Area End ##### -->