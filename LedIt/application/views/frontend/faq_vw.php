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
    <!-- ##### Breadcumb Area Start ##### -->
    <section class="breadcumb-area bg-img" style="background-image: url(<?=base_url();?>libraries/img/bg-img/s4.jpg);  box-shadow: 0px 0px 10px 1px rgba(0,0,0,0.9);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-content wow fadeInUp">
                        <h3 class="breadcumb-title">Faq</h3>
                    </div>
                    <br>
                     <div class="breadcumb-content wow fadeInUp">
                        <h3 class="breadcumb-title"><i class="fa fa-question"></i></h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->
    
   <!-- ##### Testimonials Area Start ##### -->
    <section class="south-testimonials-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading wow fadeInUp" data-wow-delay="250ms">
                        <h2>Preguntas Frecuentes</h2>
                        <p>Cualquier tipo de duda que tengas aqui podras resolverla</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="testimonials-slides owl-carousel wow fadeInUp" data-wow-delay="500ms">
                        <!-- Single Testimonial Slide -->
                    <?php
                    /**
                     * Generara un listado de las faqs por medio del objeto declarado en la clase "Faq_Mdl".
                     */
                        foreach($faqs as $faq):
                    ?>
                        <div class="single-testimonial-slide text-center">
                            <h5><?=$faq->pregunta_Faq;?></h5>
                            <p><?=$faq->respuesta_Faq;?></p>
                            <div class="testimonial-author-info">
                                <img src="<?=base_url();?>libraries/img/bg-img/s2.jpg" alt="">
                                <p>Led It<span></span></p>
                            </div>
                        </div>
                    <?php
                        endforeach;
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Testimonials Area End ##### -->
