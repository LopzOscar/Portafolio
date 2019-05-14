<?php 

	require_once 'admin/class/Comentario.php';
	include_once 'template/header.php'; 


	$comentario = Comentario::recuperarTodos();

	?>
	<div class="row">
<div class="col-sm-9 col-md-9">
<h2 style="text-align: center">Comentarios Recientes</h2>
	<?php  
				if (count($comentario)>0){
					foreach ($comentario as $item){
						?>
						<div class="col-xs-12 well">

							<h4> <?php echo $item['email'];?></h4>
							<p> <?php echo $item['mensaje'];?></p>
							<p> <?php echo $item['fechaPub'];?></p>
						</div>
						<?php 
					}
				}else{
					echo '<p> No existen comentarios, agrege uno nuevo';
				}
				?>


		<div class="col-sm-12 col-md-12">
			<header>
				<link rel="stylesheet" type="text/css" href="admin/template/css/estilo.css">

			</header>
			<body>
			<div  id="contenedor"> 


	<h1>Nuevo Comentario</h1>
	<form method="POST" action="lib/validar_comentario.php">
		

		<label>Email</label>
		<input type="email" name="email"  required /> <br>

		<label>Mensaje</label> <br>
		<textarea name="mensaje" rows="4" cols="24"> </textarea> <br>

		
		<input type="hidden" type="number" min="0" max="1" name="estatus"  required /> <br>

		<!--<label>Fecha de Publicacion</label>-->
		<input  type="hidden" name="fechaPub" value="<?php echo date('Y-m-d') ?>" required /> <br>

		<input type="submit" value"Guardar" class="btn btn-success"/>
		<a href="index.php" class="btn btn-danger"> Cancelar </a>

	</form>
	</div>
	</div>
</div>

 <!-- Sección de Promociones -->

    <div class="col-sm-3 col-md-3">

        
        <iframe style="width: 100%; height: 260px;" frameborder="0"   src="media/prom/prom.html" ></iframe>
        <iframe style="width: 100%; height: 260px;" frameborder="0"   src="media/log/log/log.html" ></iframe>
         <iframe width="100%" height="260" src="https://www.youtube.com/embed/3KEUFj2xzjs" frameborder="0" allowfullscreen></iframe>
        <iframe style="width: 100%; height: 260px;" frameborder="0"   src="media/prom2/prom2/prom2.html" ></iframe>
         <iframe width="100%" height="260" src="https://www.youtube.com/embed/sDQ6wlpoeZE" frameborder="0" allowfullscreen></iframe>

    </div>
</div>
</body>

<?php

include_once 'template/footer.php';
?>		