<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php 
foreach($css_files as $file): ?>
  <link type="text/css" rel="stylesheet" href="<?=$file; ?>" />
<?php endforeach; ?>
</head>
<body>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
              </div>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div style="background-color: ;  box-shadow: 0px 0px 10px -5px rgba(10,17,35,0.9); border-bottom-right-radius: 20px; border-bottom-left-radius: 20px" class="x_panel">
                  <div class="x_title">  
                   <h3>Ventas <small>Listado de ventas realizadas</small></h3>               
                    <div class="clearfix"></div>
                  </div>
                  <?php echo $output; ?>
                </div>
              </div>
            </div>
          </div>
        <!-- /page content -->
  </div>
    <?php foreach($js_files as $file): ?>
        <script src="<?=$file; ?>"></script>
    <?php endforeach; ?>
    <!-- javascripts -->
    <!-- Bootstrap -->
    <script src="<?=base_url();?>libraries/libraries-backend/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?=base_url();?>libraries/libraries-backend/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?=base_url();?>libraries/libraries-backend/vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="<?=base_url();?>libraries/libraries-backend/vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="<?=base_url();?>libraries/libraries-backend/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?=base_url();?>libraries/libraries-backend/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="<?=base_url();?>libraries/libraries-backend/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?=base_url();?>libraries/libraries-backend/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="<?=base_url();?>libraries/libraries-backend/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="<?=base_url();?>libraries/libraries-backend/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?=base_url();?>libraries/libraries-backend/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?=base_url();?>libraries/libraries-backend/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="<?=base_url();?>libraries/libraries-backend/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="<?=base_url();?>libraries/libraries-backend/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?=base_url();?>libraries/libraries-backend/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="<?=base_url();?>libraries/libraries-backend/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="<?=base_url();?>libraries/libraries-backend/vendors/jszip/dist/jszip.min.js"></script>
    <script src="<?=base_url();?>libraries/libraries-backend/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="<?=base_url();?>libraries/libraries-backend/vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?=base_url();?>libraries/libraries-backend/build/js/custom.min.js"></script>
</body>
</html>

 

 
    
    