
<!-- ##### Footer Area Start ##### -->
    <footer class=" wow fadeInUp footer-area section-padding-100-0 bg-img gradient-background-overlay" style="background-image: url(<?=base_url();?>libraries/img/bg-img/s1.jpg);" data-delay="200ms">
        <!-- Main Footer Area -->
        <div class="main-footer-area">
            <div class="container">
                <div class="row">
                    <!-- Single Footer Widget -->
                    <div class="col-12 col-sm-6 col-xl-6">
                        <div class="footer-widget-area mb-100">

                            <!-- Widget Title -->
                            <div class="widget-title">
                                <h6>Contáctanos</h6>
                            </div>

                            <div class="footer-logo my-4">
                               <div class="address">
                                <h6><img src="<?=base_url();?>libraries/img/icons/phone-call.png" alt=""><strong> 447-690-07-88</strong></h6>
                                <h6><img src="<?=base_url();?>libraries/img/icons/envelope.png" alt=""><strong> josemanuel@ledit.mx <br> led_it@live.com</strong></h6>
                                <h6><img src="<?=base_url();?>libraries/img/icons/location.png" alt=""><strong> Álvaro Obregón 26-A Col. Centro CP 61250 <br> Maravatío, Michoacán.</strong></h6>

                            </div>
                            </div>
                            
                        </div>
                    </div>
                    <!-- Single Footer Widget -->
                    <div class="col-12 col-sm-6 col-xl-6">
                        <div class="footer-widget-area mb-100">
                            <!-- Widget Title -->
                            <div class="widget-title">
                                <h6>Horarios</h6>
                            </div>
                            <!-- Office Hours -->
                            <div class="weekly-office-hours">
                                <ul>
                                    <li class="d-flex align-items-center justify-content-between"><span><strong>Lunes - Viernes</strong></span><span>09:00 AM - 6:00 PM</span></li>
                                    <li class="d-flex align-items-center justify-content-between"><span><strong>Sábado<strong></strong></span><span>09:00 AM - 5:00 PM</span></li>
                                    <li class="d-flex align-items-center justify-content-between"><span><strong>Domingo<strong></span><span>09:00 AM - 03:00 PM</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Copywrite Text -->
        <div style="background-color: #0a1123;" class="copywrite-text d-flex align-items-center justify-content-center">
            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
&copy; <script>document.write(new Date().getFullYear());</script> Todos los derechos reservados | Led It  <i class="fa fa-lightbulb-o" aria-hidden="true"></i><a hidden="true" href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        </div>
    </footer>
    <!-- ##### Footer Area End ##### -->
<!--===============================================================================================-->
<script src="<?=base_url();?>libraries/libraries-backend/login-usuario-styles/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="<?=base_url();?>libraries/libraries-backend/login-usuario-styles/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
  <script src="<?=base_url();?>libraries/libraries-backend/login-usuario-styles/js/main.js"></script>

    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    <script src="<?=base_url();?>libraries/js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="<?=base_url();?>libraries/js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="<?=base_url();?>libraries/js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="<?=base_url();?>libraries/js/plugins.js"></script>
    <script src="<?=base_url();?>libraries/js/classy-nav.min.js"></script>
    <script src="<?=base_url();?>libraries/js/jquery-ui.min.js"></script>
    <!-- Active js -->
    <script src="<?=base_url();?>libraries/js/active.js"></script>
    <script src="<?=base_url();?>libraries/js/script-menu.js"></script>
    <!-- Google Maps -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAwuyLRa1uKNtbgx6xAJVmWy-zADgegA2s"></script>
    <script src="<?=base_url();?>libraries/js/map-active.js"></script>

     <!-- Galeria -->
    <script src="<?=base_url();?>libraries/scripts/default.js" type="text/javascript"></script>
    <script src="<?=base_url();?>libraries/scripts/wookmark/js/jquery.wookmark.js" type="text/javascript"></script>
    <script src="<?=base_url();?>libraries/scripts/yoxview/yox.js" type="text/javascript"></script>
    <script src="<?=base_url();?>libraries/scripts/yoxview/jquery.yoxview-2.21.js" type="text/javascript"></script>
    
    <script type="text/javascript">
    $(window).load(function () {var options = {autoResize: true,container: $('#gridArea'),offset: 10};var handler = $('#tiles li');handler.wookmark(options);$('#tiles li').each(function () { var imgm = 0; if($(this).find('img').length>0)imgm=parseInt($(this).find('img').not('p img').css('margin-bottom')); var newHeight = $(this).find('img').height() + imgm + $(this).find('div').height() + $(this).find('h4').height() + $(this).find('p').not('blockquote p').height() + $(this).find('iframe').height() + $(this).find('blockquote').height() + 5;if($(this).find('iframe').height()) newHeight = newHeight+15;$(this).css('height', newHeight + 'px');});handler.wookmark(options);handler.wookmark(options);});
    </script>

    <script type="text/javascript">
    $(document).ready(function () {$('.yoxview').yoxview({autoHideInfo:true,renderInfoPin:false,backgroundColor:'#696969',backgroundOpacity:0.9,infoBackColor:'#0a1123',infoBackOpacity:1});$('.yoxview a img').hover(function(){$(this).animate({opacity:0.7},300)},function(){$(this).animate({opacity:1},300)});});
    </script>


    </body>
</html>