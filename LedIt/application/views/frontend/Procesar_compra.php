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


<!DOCTYPE html>
<html>
    <head>
        <title>Compra</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap Core CSS -->
        <link href="<?php echo base_url();?>css/bootstrap.css" rel="stylesheet">
        <style type="text/css">
</style>
</head>
<body class="fondo">
<div class="container">
 <div class="row">
  <div class="col-md-9">
           <!-- user image section-->
                        <div class="user-section">
                            <div class="user-section-inner">
                                <img src="<?php echo base_url();?>assets/img/user.jpg" alt="">
                            </div>
                            <div class="user-info">
                                <div><h5><?php echo $this->session->userdata('identity'); ?></h5>
                                </div>

                                <div style="margin-top: 5%;" class="user-text-online">
                                    <h1 align="center">Detalle de Compra</h1>
                                    <br>
                                </div>
                            </div>
                        </div>
           <!--end user image section-->
   <table class="table table-bordered">
            <tr style="background-color: #0a1123;">
                <th style="text-align: center; color: #fff" >Imagen</th>
                <th style="text-align: center; color: #fff" >Nombre</th>
                <th style="text-align: center; color: #fff" >Precio</th>
                <th style="text-align: center; color: #fff" >Cantidad</th>
                <th style="text-align: center; color: #fff" >Sub-Total</th>
            </tr>

                <?php $i = 1; ?>
                <?php foreach ($this->cart->contents() as $items): ?>
                <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
            <tr>

                 <td align="center"> 
                   <img align="center" src='<?=base_url();?>libraries/libraries-backend/images/thumbnails/productos/<?=$items["img"];?>'>
                </td>
                       
                <td width="40%">
                                
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
                        
                        <td ><?php echo $this->cart->format_number($items['price']/*,2,',','.'*/); ?></td>

                         <td align="center" ><?php echo form_input(array('name' => $i.'[qty]', 'value' => $items['qty'], 'maxlength' => '3', 'size' => '5')); ?>
                         </td>
                        <td style="text-align:right">$<?php echo $this->cart->format_number($items['subtotal']); ?>
                        </td>
                     
                </tr>

                <?php $i++; ?>

                <?php endforeach; ?>

                <tr>
                        <td colspan="2"><?= anchor('Productos/cart', 'Volver al carrito')?>&nbsp;<span class="glyphicon glyphicon-shopping-cart"></span>
                        </td>
                        <td class="right"><strong>Total</strong></td>
                        <td class="right" colspan="3">$<?php echo $this->cart->format_number($this->cart->total()); ?></td>
                </tr>

  </table>
      
  </div>
    <div style="margin-top: 10%;" class="col-md-3">

<form action="<?php echo base_url();?>Productos/nuevaVenta" method="POST">
         

<?php
        $id=$this->session->userdata('id');
        $correo=$this->session->userdata('correo');
        $nombre=$this->session->userdata('nombre');
        $usuario=$this->session->userdata('usuario');
        $apellidoP=$this->session->userdata('apellidoP');
        $apellidoM=$this->session->userdata('apellidoM');
        $telefono=$this->session->userdata('telefono');
        $calle=$this->session->userdata('calle');
        $numero=$this->session->userdata('numeroI');
        $postal=$this->session->userdata('postal');
        $total_items=$this->cart->total_items();
        $total=$this->cart->total();
        $fecha=date('Y-m-d');
?>
    <label><h3>Datos personales</h3></label><br>
    <label><input hidden type="text" name="id_Usuario_Venta" value="<?=$id;?>"><h5>Nombre: <?=$nombre." ".$apellidoP." ".$apellidoM;?></h5></label>
    <label><h5>Calle: <?=$calle;?></h5></label>
    <label><h5>No. <?=$numero;?></h5></label>
    <label><h5>Código postal: <?=$postal;?></h5></label>
    <label><h5>Teléfono: <?=$telefono;?></h5></label>
    <input hidden type="text" name="cantidad_Venta" value="<?=$total_items;?>">
    <input hidden type="text" name="total_Venta" value="<?=$total;?>">
    <input hidden type="text" name="fecha_Venta" value="<?=$fecha;?>">
  

  <hr>

  <label><h3>Método de Pago</h3></label><br>
  <select required name="metodo_Pago_Venta">
      <option value="null">--Selecciona una opción---</option>
      <option value="Transferencia">Tranferencia</option>
      <option value="Depósito bancario">Depósito bancario</option>
  </select>

  <label><h3>Método de envío</h3></label><br>
  <select required name="metodo_Envio_Venta">
      <option value="null">--Selecciona una opción---</option>
      <option value="DHL">DHL</option>
      <option value="FedEx">FedEx</option>
      <option value="Estafeta">Estafeta</option>
  </select>
  </div>

      
         <?php $i = 1; ?>

                    <?php foreach ($this->cart->contents() as $items): ?>
                            <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
        <input hidden  name="item_name" value="<?php echo $items['name']; ?>" />
        <!--Aquí debemos de poner el nombre del producto para poder identificarlo-->
        <input hidden  name="item_number" value="Numero de referencia del producto" />
        <!--Nº de referencia del procuto, este campo es simplemente informativo-->
        <input hidden name="quantity" value="<?php echo $items['qty']; ?>" />
                            <?php $i++; ?>

                    <?php endforeach; ?>


    <a href="<?=base_url();?>Productos/eliminarCarrito" type="button" class="btn btn-danger">Cancelar compra</a>
    <button type="submit" class="btn btn-success">Terminar compra</button>

    </form>

 </div>
</div>
</body>
</html>
<?php
}
?>