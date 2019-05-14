    <!-- ##### Breadcumb Area Start ##### -->
    <section class="breadcumb-area bg-img" style="background-image: url(<?=base_url();?>libraries/img/bg-img/s4.jpg); box-shadow: 0px 0px 10px 1px rgba(0,0,0,0.9);">
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
<?php
                //mostramos el mensaje de las sesiones flashdata dependiendo
                //de lo que hayamos hecho.
                $agregado = $this->session->flashdata('agregado');
                $destruido = $this->session->flashdata('destruido');
                $productoEliminado = $this->session->flashdata('productoEliminado');
                $terminado = $this->session->flashdata('terminado');
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
                }elseif($terminado){
                    ?>
                     <script>
                                    swal({
                                        position: 'center',
                                        title: 'Compra terminada',
                                        text: '¡ Gracias por su compra !',
                                        type: 'success'
                                    }); 
                        </script>
                    <?php
                }
                ?>



    <!-- ##### Breadcumb Area End ##### -->
    <!-- ##### Listing Content Wrapper Area Start ##### -->
    <section id="fondo" class="listings-content-wrapper section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                	<div  style="background-color: #7d7d7d; border-radius: 20px;" class="section-heading wow fadeInUp">
                        <h1 style="color: #000;">Elige productos de nustras diferentes categorías</h1>
                            
                               <div style="background-color:  #0a1123;" class="section-heading wow fadeInUp">
                                <p style="color: #fff;">Existe un estilo para cada persona elige el tuyo</p>
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
                 * Generara un listado de las categorías por medio del objeto declarado en la clase "Categoria_Mdl".

                 */
                foreach ($productos as $prod):
                    if ($prod->id_Categoria_Producto >= 1){            
            ?>     
                <!-- Single Featured Property -->
                <div class="col-12 col-md-6 col-xl-4">
                        <div class="single-featured-property mb-50">
                             <?=form_open(base_url().'Productos/agregarProducto')?>
                            <!-- Property Thumbnail -->
                            <div style="background-color: #fff;" class="property-thumb">
                                <?php $ruta1=base_url(). "libraries/libraries-backend/images/thumbnails/productos/"?>
                                <?php $ruta2=base_url(). "libraries/libraries-backend/images/thumbnails/"?>

                                 <?php 
                                 /**
                                  * El if declara que si el campo imagen_Categoria no esta vacio se mostrara la imagen asignada.
                                  * Pero en caso de que este vacio se le asignará una imagen por default.
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
                    }
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
    <!-- ##### Listing Content Wrapper Area End ##### -->
