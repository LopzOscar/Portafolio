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

<div class="col-xs-12 col-sm-12" style="margin-top: 18px;">
		<div class="table-responsive" id="div6">

		<div class="col-xs-12">
			<h1 class="texto" align="center">Resúmen de venta</h1>

			<div style="float:right; margin-right: 20px;">
	        <div style="margin-left: 30px;">
	        <?php $fecha=date('d-m-Y');	?>
	        <strong>FECHA:</strong><?php echo " ".$fecha; ?>
	        </div>
	       
		</div>
    
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
     
<div class="container-fluid resumen" id="datos_cliente">
    <div class="col-xs-12 col-sm-12">
        	<h3>Datos del cliente</h3>

        	<div class="col-sm-6 col-xs-6">
        	<div><strong>USUARIO: </strong><?=$nombre." ".$apellidoP." ".$apellidoM;?></div>
        	<div><strong>DIRECCIÓN: </strong><?=$calle." ".$numero." CP.".$postal;?></a></div>
	        <div><strong>CORREO: </strong><?=$correo;?></a></div>
	        <br>
        	</div>

	        
	        
      </div>

      

			<div class="row resumen" id="datos_cliente">
					      <div class="col-xs-12">
					        	<h3>Productos</h3>   
					      </div>
					      <br>
					      <br>
					 
						<table class="table tablas_admin">
							<tr>
								<th class="table_text">IMAGEN</th>
								<th class="table_text">PRODUCTO</th>
					            <th class="table_text">PRECIO</th>
								<th class="table_text">CANTIDAD</th>
								<th class="table_text">Sub-Total</th>
							</tr>
							
							 <?php $i = 1; ?>
				                <?php foreach ($this->cart->contents() as $items): ?>
				                <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
							<tr>
								<td width="80px" height="80px" class="item_text">
									<img align="center" src='<?=base_url();?>libraries/libraries-backend/images/thumbnails/productos/<?=$items["img"];?>'>
								</td>
								<td>
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
								<td class="item_text"><?php echo $this->cart->format_number($items['price']/*,2,',','.'*/); ?>
						<td align="center" ><?php echo form_input(array('name' => $i.'[qty]', 'value' => $items['qty'], 'maxlength' => '3', 'size' => '5')); ?>
                         </td>
                          <td align="center">$<?php echo $this->cart->format_number($items['subtotal']); ?>
                        </td>
								
		
							
							</tr>
							        <?php $i++; ?>
                					<?php endforeach; ?>
                					 <tr>
                        <td align="center" colspan="2"></span>
                        </td>
                        <td class="right"><strong>Total a pagar</strong></td>
                        <td class="right" colspan="3">$<?php echo $this->cart->format_number($this->cart->total()); ?></td>
                </tr>
						</table>


							
            </div>
    </div>

 </div> 
                             <div style="margin-top: 10px;" align="center">
								<a href="<?=base_url();?>Productos/terminarVenta" class="btn btn-success">Aceptar</a>
							</div>					
</div>



