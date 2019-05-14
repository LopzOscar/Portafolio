 <?php
/**
 * Archivo con php embebido para listado de las noticias registradas en la base de datos (FrontEnd).
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
                    <div class="breadcumb-content">
                    <div class="breadcumb-content wow fadeInUp">
                        <h3 class="breadcumb-title"><i class="fa fa-doc"></i>Noticias</h3>
                    </div>
                    <br>
                    <div class="breadcumb-content">
                         <div class="breadcumb-content wow fadeInUp">
                        <h3 class="breadcumb-title"><i class="fa fa-file"></i></h3>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->
    <section class="south-blog-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12">
                <div class="contact-heading">
                    <div class="col-12">
                    <div class="section-heading wow fadeInUp" data-wow-delay="250ms">
                        <h2>Noticias</h2>
                        <p>Mantente bien informado con noticias ecológicas</p>
                    </div>
                </div>
                </div>

                <?php
                /**
                 * Generara un listado de las noticias por medio del objeto declarado en la clase "Categoria_Mdl".
                 */
                    foreach($noticias as $noti):
                ?>
                    <!-- Single Blog Area -->
                    <div align="center" class="single-blog-area mb-50">
                        <!-- Post Thumbnail -->
                        <div class="blog-post-thumbnail wow fadeInUp">
                            
                    <?php $ruta1=base_url(). "libraries/libraries-backend/images/thumbnails/noticias/"?>
                    <?php $ruta2=base_url(). "libraries/libraries-backend/images/thumbnails/"?>
                    <?php
                    /**
                      * El if declara que si el campo imagen_Noticia no esta vacio se mostrara la imagen asignada.
                      * Pero en caso de que este vacio se le asignará una imagen por default.
                      */
                    if ($noti->imagen_Noticia != null){ ?>
                             <img width="80%" src="<?=$ruta1.$noti->imagen_Noticia;?>">

                     <?php }else{ ?>
                             <img width="50%" src="<?=$ruta2.'ledit.png';?>">
                     <?php } ?>
                        </div>
                        <!-- Post Content -->
                        <div align="center" class="post-content">
                            <!-- Date -->
                            <div class="post-date wow fadeInUp">
                                <a href="#"><?=$noti->fecha_Noticia;?></a>
                            </div>
                            <!-- Headline -->
                            <a href="#" class="headline wow fadeInUp"><?=$noti->titulo_Noticia;?></a>
                            <!-- Post Meta -->
                            <div class="post-meta wow fadeInUp">
                                <p>By <a href="#">Admin</a> | in <a href="#">Uncategorized</a> | <a href="#">2 Comments</a></p>
                            </div>
                            <p class="wow fadeInUp"><?=$noti->descripcion_Corta_Noticia."...";?></p>
                            <!-- Read More btn -->
                            <a href="#" class="btn south-btn btn-3 wow fadeInUp">Leer más</a>
                        </div>
                    </div>
                <?php
                    endforeach;
                ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Blog Area End ##### -->