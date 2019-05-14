<!-- ##### Breadcumb Area Start ##### -->
    <section class="breadcumb-area bg-img" style="background-image: url(<?=base_url();?>libraries/img/bg-img/s16.jpg);">
        <div class="container h-100">

                           <?php
                     $exitoso= $this->session->flashdata('exitoso');
                     $fallo= $this->session->flashdata('fallo');

                if($exitoso){
                     ?>
                        <script>
                                    swal({
                                        position: 'center',
                                        title: 'Correcto',
                                        text: '¡ Tu mensaje ha sido enviado !',
                                        type: 'success'
                                    }); 
                        </script>

                    <?php
                          }
                          if($fallo){
                        ?>
                        <script>
                                    swal({
                                        position: 'center',
                                        title: 'Lo sentimos',
                                        text: '¡ Tu mensaje no pudo ser enviado !',
                                        type: 'warning'
                                    }); 
                        </script>
                            <?php
                  }
                  ?>
            <div class="row h-100 align-items-center">
                <div class="col-12">
                      <div class="breadcumb-content wow fadeInUp">
                        <h3 class="breadcumb-title"><i class="fa fa-doc"></i>Contacto</h3>
                    </div>
                    <br>
                    <div class="breadcumb-content">
                         <div class="breadcumb-content wow fadeInUp">
                        <h3 class="breadcumb-title"><i class="fa fa-comment"></i></h3>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->
    <section class="south-contact-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="contact-heading wow fadeInUp" data-delay="60ms">
                        <h1 style="color: #0a1123;" align="center">¿Alguna Duda? o ¿Más información? Mándanos un mensaje y nos contactaremos...</h1>
                        <hr> 
                        <h6><span class="fa fa-info-circle"></span> Contáctanos</h6>   
                    </div>
                </div>

            </div>
            <div  class="row">
                <div class="col-12 col-lg-4">
                    <div class="content-sidebar">
                        <!-- Office Hours -->
                        <div class="weekly-office-hours wow fadeInUp" data-delay="90ms">
                            <ul>
                                <li class="d-flex align-items-center justify-content-between"><span style="color: #0a1123;">Lunes - Viernes</span> <span>09:00 AM - 6:00 PM</span></li>
                                <li class="d-flex align-items-center justify-content-between"><span style="color: #0a1123;">Sábado</span> <span>09:00 AM - 5:00 PM</span></li>
                                <li class="d-flex align-items-center justify-content-between"><span style="color: #0a1123;">Domingo</span> <span>09:00 AM - 03:00 PM</span></li>
                            </ul>
                        </div>
                        <!-- Address -->
                        <div class="address mt-30 wow fadeInUp" data-delay="200ms">
                            <h6><img src="<?=base_url();?>libraries/img/icons/phone-call.png" alt=""> 447-690-07-88</h6>
                            <h6><img src="<?=base_url();?>libraries/img/icons/envelope.png" alt=""> josemanuel@ledit.mx <br> led_it@live.com</h6>
                            <h6><img src="<?=base_url();?>libraries/img/icons/location.png" alt=""> Álvaro Obregón 26-A Col. Centro CP 61250 <br> Maravatío, Michoacán.</h6>
                        </div>
                    </div>
                </div>

                <!-- Contact Form Area -->
               
                        <?php
                                $id=$this->session->userdata('id');
                                $nombre=$this->session->userdata('nombre');
                                $apellidoP=$this->session->userdata('apellidoP');
                                $apellidoM=$this->session->userdata('apellidoM');
                                $correo=$this->session->userdata('correo');
                                $telefono=$this->session->userdata('telefono');
                                $telefono=$this->session->userdata('telefono');

                        if ($id) {
                        ?>
        <div class="col-12 col-lg-8">
                    <div class="contact-form wow fadeInUp" data-delay="400ms">
                        <form id="default-behavior" action="<?=base_url().'Contactos/nuevoContacto';?>" method="POST">
                             <div align="center" class="form-group">

                            <div class="wrap-input100 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                <input class="input100" type="text" name="nombre_Contacto" data-validate="validate(required, text, minlength(10), maxlengt(50))" value="<?=$nombre." ".$apellidoP." ".$apellidoM;?>" hidden>
                                <span class="focus-input100" data-placeholder="Nombre completo"></span><br><br><?=$nombre." ".$apellidoP." ".$apellidoM;?>
                            </div>

                            <div class="row">
                                    <div class="col-lg-1 col-md-1"></div>
                                <div  class="wrap-input100 col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                    <input class="input100" type="text" name="telefono_Contacto" data-validate="validate(required, number, minlength(10), maxlengt(15))" value="<?=$telefono;?>" hidden>
                                    <span  class="focus-input100" data-placeholder="Teléfono"></span><br><br><?=$telefono;?>
                                </div>

                                    <div class="col-lg-1 col-md-1"></div>

                                 <div class="wrap-input100 col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                    <input class="input100" type="text" name="email_Contacto" data-validate="validate(required, email)" value="<?=$correo;?>" hidden>
                                    <span  class="focus-input100" data-placeholder="Correo electrónico"></span><br><br><?=$correo;?>
                                </div>


                            </div>


                            <div  class="wrap-input100 validate-input">
                                <textarea class="input100" type="text" name="mensaje_Contacto" placeholder="Mensaje" data-validate="validate(required, text, minlength(20), maxlengt(200))"></textarea>
                               
                            </div>
                            
                            <?php $fecha = date('Y-m-d');?>

                            <div hidden class="form-group">
                                <input type="text" class="form-control" name="fecha_Contacto" placeholder="Fecha" value="<?php echo $fecha;?>" required/>
                            </div>


                            <button  type="submit" class="btn south-btn btn-3">Enviar mensaje <span class="boton fa fa-send"></span></button>

                        <script type="text/javascript">
                        $('#default-behavior').ketchup();
                        </script>

                        </form>
                    </div>
                </div>
                            <?php
                        }else{ 
                            ?>
        <div class="col-12 col-lg-8">
                    <div class="contact-form wow fadeInUp" data-delay="400ms">
                        <form id="default-behavior" action="<?=base_url().'Contactos/nuevoContacto';?>" method="POST">
                             <div align="center" class="form-group">

                            <div class="wrap-input100 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                <input class="input100" type="text" name="nombre_Contacto" data-validate="validate(required, text, minlength(10), maxlengt(50))" >
                                <span class="focus-input100" data-placeholder="Nombre completo"></span>
                            </div>

                            <div class="row">
                                    <div class="col-lg-1 col-md-1"></div>
                                <div  class="wrap-input100 col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                    <input class="input100" type="text" name="telefono_Contacto" data-validate="validate(required, number, minlength(10), maxlengt(15))" >
                                    <span  class="focus-input100" data-placeholder="Teléfono"></span>
                                </div>

                                    <div class="col-lg-1 col-md-1"></div>

                                 <div class="wrap-input100 col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                    <input class="input100" type="text" name="email_Contacto" data-validate="validate(required, email)" >
                                    <span class="focus-input100" data-placeholder="Correo electrónico"></span>
                                </div>


                            </div>


                            <div  class="wrap-input100 validate-input">
                                <textarea class="input100" type="text" name="mensaje_Contacto" placeholder="Mensaje" data-validate="validate(required, text, minlength(20), maxlengt(200))"></textarea>
                               
                            </div>
                            
                            <?php $fecha = date('Y-m-d');?>

                            <div hidden class="form-group">
                                <input type="text" class="form-control" name="fecha_Contacto" placeholder="Fecha" value="<?php echo $fecha;?>" required/>
                            </div>


                            <button  type="submit" class="btn south-btn btn-3">Enviar mensaje <span class="boton fa fa-send"></span></button>

                        <script type="text/javascript">
                        $('#default-behavior').ketchup();
                        </script>

                        </form>
                    </div>
                </div>


                        <?php
                            }
                        ?>


            </div>
        </div>

    </section>


    <!-- Google Maps -->
    <div class="map-area mb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                  <div class="contact-heading wow fadeInUp" data-delay="600ms">  
                        <h1 style="color: #0a1123;" align="center">También visítanos en nuestra sucursal...</h1>
                        <hr> 
                        <h6><span class="fa fa-map-marker"></span> Ubicación</h6> 
                    </div>
                         <iframe class="googleMap wow fadeInUp" data-delay="800ms" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3751.7557738648165!2d-100.44384559999999!3d19.892532!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d2d09cc7ac5a87%3A0x6bcd2e5dc3e01cfc!2zw4FsdmFybyBPYnJlZ8OzbiAyNg!5e0!3m2!1ses!2s!4v1403459955944">
                         </iframe>
                </div>
            </div>
        </div>
    </div>

