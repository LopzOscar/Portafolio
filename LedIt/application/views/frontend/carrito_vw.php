<?php
$id=$this->session->userdata('id');

if(!$id){
 redirect('Admin/index/11');
}else{
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title  -->
    <title>Led It</title>
 
    <!-- Favicon  -->
    <link rel="icon" class="fa fa-lightbulb-o" href="<?=base_url();?>libraries/img/icons/icon.png">

    <!-- Style CSS -->

     <link rel="stylesheet" type="text/css" href="<?=base_url();?>libraries/sweetalert2/dist/sweetalert2.css">
    <script type="text/javascript" src="<?=base_url();?>libraries/sweetalert2/dist/sweetalert2.min.js"></script>
    <script type="text/javascript" src="<?=base_url();?>libraries/sweetalert2/dist/jquery-1.11.1.min.js"></script>
    
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>libraries/style.css"/>
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>libraries/css/custom.css"/>
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>libraries/css/main.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>libraries/scripts/wookmark/css/style.css"/> 
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>libraries/scripts/yoxview/yoxview.css"/>
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>libraries/libraries-backend/login-usuario-styles/vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>libraries/libraries-backend/login-usuario-styles/css/util.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>libraries/libraries-backend/login-usuario-styles/css/main4.css">

    <link rel="stylesheet" type="text/css" media="screen" href="<?=base_url();?>libraries/ketchup/css/jquery.ketchup.css" />
    <script type="text/javascript" src="<?=base_url();?>libraries/ketchup/js/jquery-1.4.4.min.js"></script>
    <script type="text/javascript" src="<?=base_url();?>libraries/ketchup/js/jquery.ketchup.all.min.js"></script>
    <script src="<?=base_url();?>libraries/ketchup/js/jquery.js" type="text/javascript"></script>
    <script src="<?=base_url();?>libraries/ketchup/js/jquery.ketchup.js" type="text/javascript"></script>
    <script src="<?=base_url();?>libraries/ketchup/js/jquery.ketchup.validations.js" type="text/javascript"></script>
    <script src="<?=base_url();?>libraries/ketchup/js/jquery.ketchup.helpers.js" type="text/javascript"></script>
    <script src="<?=base_url();?>libraries/ketchup/js/scaffold.js" type="text/javascript"></script>
</head>


<body class="fondo">
        <div style="margin-top: 4%;" class="container">
            <div class="row">
                 <div class="col-lg-12">
                    <div class="">
                        <!--cpntenedor principal-->
 <div>
<h1 align="center">Productos agregados al carrito</h1>
<br>
            <!--contenedor de los artículos-->
            <ul class="grid_7" id="subcontenedor">

<?php echo form_open('Productos/updateCart'); ?>

<table class="table">
    
    <?php
    $productoEliminado = $this->session->flashdata('productoEliminado');
        if($productoEliminado){
                    ?>
                     <script>
                                    swal({
                                        position: 'center',
                                        title: 'Correcto',
                                        text: '¡ Producto eliminado del carrito !',
                                        type: 'success'
                                    }); 
                        </script>
                    <?php
                }
                ?>   
 
    <tr style="background-color: #0a1123;">
        <th style="text-align: center; color: #fff">Imagen</th>
        <th style="text-align: center; color: #fff">nombre</th>
        <th style="text-align: center; color: #fff">precio</th>
        <th style="text-align: center; color: #fff">cantidad</th>
        <th style="text-align: center; color: #fff">Sub-Total</th>
        <th style="text-align: center; color: #fff">Eliminar</th>
    </tr>

    <?php $i = 1; ?>

    <?php foreach ($this->cart->contents() as $items): ?>
            <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>

        <tr>
               <td align="center"> <img align="center" width="85%" src='<?=base_url();?>libraries/libraries-backend/images/thumbnails/productos/<?=$items["img"];?>'></td>

                <td style="padding-top: 50px;" align="center" width="50%">
                      
                        <?php echo $items['name']; ?>
                        <?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>

                                <p>
                                        <?php foreach ($this->cart->product_options($items['rowid']) as 
                                        $option_name => $option_value): ?>

                                                <strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />

                                        <?php endforeach; ?>
                                </p>

                        <?php endif; ?>

                </td>
                
                <td style="padding-top: 50px;"  align="center" ><?php echo $this->cart->format_number($items['price']); ?></td>
                 <td style="padding-top: 50px;"  align="center"><?php echo form_input(array('name' => $i.'[qty]', 'value' => $items['qty'], 'maxlength' => '3', 'size' => '5')); ?>
                 <p><?php echo form_submit("Productos/updateCart", "Actualizar" , "class='btn btn-success'"); ?>
                 </p></td>
                <td  style="text-align:right; padding-top: 50px";> $<?php echo $this->cart->format_number($items['subtotal']); ?></td>
                <td style="text-align:right; padding-top: 50px"; id="eliminar"><?= anchor('Productos/eliminarProd/' . $items['rowid'], 'Eliminar') ?><span class="glyphicon glyphicon-trash"></span></td>
        </tr>

        <?php $i++; ?>

        <?php endforeach; ?>

        <tr>
                <td colspan="2"><?= anchor('Productos/eliminarCarrito', 'Vaciar carrito')?>&nbsp;&nbsp;<span class="glyphicon glyphicon-trash"></span>
                </td>
                <td   style="background-color: #0a1123; color: #fff; padding-left: 40px;" ><strong>Total</strong></td>
                <td  style="background-color: #0a1123; color: #fff; padding-left: 100px;" colspan="3">$<?php echo $this->cart->format_number($this->cart->total()); ?></td>
        </tr>


</table>
            <span class="glyphicon glyphicon-refresh"></span><a href="<?php echo base_url();?>ControlFrontEnd/index/10"> Seguir comprando</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <?= anchor('Productos/Procesar', 'Procesar Compra')?>
            <span class="glyphicon glyphicon-usd"></span>


                        
                     </div>
                </div>
           </div>
       </div>

 </body>


</html>

<?php
}
?>
