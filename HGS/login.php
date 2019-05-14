<!DOCTYPE>
<html lang="es">
<head>

	<meta charset="UTF-8">
	<meta name= "viewport" content="width=device-whidth, initial-scale=1">
	
	<title>HGS-LogIn</title>
	
	<link rel="stylesheet" type="text/css" href="template/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="template/css/style.css">
	
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.js"></script>

</head>

<body>
	<div class="container-fluid">
	
	<div class= "row">
	<center> <div class="col-xs-12">
			<img src="images/user.png" class=" "> 
		</div> </center>
	</div>

	<div class ="row">
		<div class="col-xs-12"> </div>
	</div>

	<div class="row">
		<div class="col-xs-12 col-sm-4"> </div>

		<div class="col-xs-12 col-sm-4 well">
			<center>
				<h1>Iniciar Sesi&oacute;n</h1>
			</center>

			<form action="lib/validar_login.php" method="POST">

			<label class="control-label" for="email">Email</label>
			<input type="email" name="email" id="email" class="form-control" required > <br>
			
			<label class="control-label" for="password">Password</label>
			<input type="password" name="password" id="password" class="form-control" required > <br>

			<center>
				<p>
				<button type="submit" class="btn btn-success">		
				<span class="glyphicon glyphicon-share" ></span>
				Enviar
				</button>
				</p>
				
				<p>
				<a href="registrar.php">
				<button type="button" class="btn btn-primary">		
				<span class="glyphicon glyphicon-user" ></span>
				Registrar
				</button>
				</a>
				</p>
				
			</center>
		</form>
	<div class="col-xs-12 col-sm-4"></div>
</div>

</div>	

</body>
</html>

