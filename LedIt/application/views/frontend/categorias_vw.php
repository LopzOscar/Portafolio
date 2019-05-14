<?php
/**
 * Archivo con php embebido para listado de las categorías registradas en la base de datos (FrontEnd).
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
    <!-- ##### Breadcumb Area Start ##### -->
    <section class="breadcumb-area bg-img" style="background-image: url(<?=base_url();?>libraries/img/bg-img/s4.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-content wow fadeInUp">
                        <h3 class="breadcumb-title">Productos</h3>
                    </div>
                    <br>
                     <div class="breadcumb-content wow fadeInUp">
                        <h3 class="breadcumb-title"><i class="fa fa-lightbulb-o"></i></h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->
    <!-- ##### Listing Content Wrapper Area Start ##### -->
    <section class="listings-content-wrapper section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                	<div class="section-heading wow fadeInUp">
                            <h2>Elige productos de nustras diferentes categorías</h2>
                            <p>Existe un estilo para cada persona elige el tuyo</p>
                        </div>
                </div>
            </div>
            <div class="row">
            <?php
                /**
                 * Generara un listado de las categorías por medio del objeto declarado en la clase "Categoria_Mdl".
                 */
                foreach ($categorias as $cat):
            ?>     
                <!-- Single Featured Property -->
                <div class="col-12 col-md-6 col-xl-4">
                	<a href="<?=base_url();?>">
	                    <div class="single-featured-property mb-50">
	                        <!-- Property Thumbnail -->
	                        <div class="property-thumb">
	                            <?php $ruta1=base_url(). "libraries/libraries-backend/images/thumbnails/categorias/"?>
                              <?php $ruta2=base_url(). "libraries/libraries-backend/images/thumbnails/"?>

                                 <?php 
                                 /**
                                  * El if declara que si el campo imagen_Categoria no esta vacio se mostrara la imagen asignada.
                                  * Pero en caso de que este vacio se le asignará una imagen por default.
                                  */
                                 if ($cat->imagen_Categoria != null){ ?>
                                           <img src="<?=$ruta1.$cat->imagen_Categoria;?>">
                                 <?php }else{ ?>
                                           <img src="<?=$ruta2.'ledit.png';?>">
                                 <?php } ?>
	                        </div>
	                        <!-- Property Content -->
	                        <div class="property-content">
	                            <h5 align="center"><?=$cat->nombre_Categoria;?></h5>
                                <p></p>
	                            <p align="center" class="location"> <span><i style="font-size: 45px;" class="fa fa-lightbulb-o"></i></span></p>
                                <hr>
	                            <p style="text-align: justify;"><?=$cat->descripcion_Categoria;?></p>
	                           
	                        </div>
	                    </div>
                    </a>
                </div>             
          <?php
              endforeach;
          ?>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="south-pagination d-flex justify-content-end">                       
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Listing Content Wrapper Area End ##### -->
