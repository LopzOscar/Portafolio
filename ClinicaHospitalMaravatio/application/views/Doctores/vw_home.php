
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>C H M</title>
</head>
<body>

        <?=validation_errors();?>

    <form action="<?=base_url().'/index.php/Doctores/login';?>" method="post">
        <label for="nombre" >Doctor: </label><input type="text" name="nombre" value="<?=set_value('nombre');?>" ><br>
        <label for="apellidoP">Aplellido Paterno: </label><input type="text" name="apellidoP" value="<?=set_value('apellidoP');?>"> <br>
        <button type="submit">Ingresar</button>
    </form>
    <p><a href="<?=base_url().'index.php/Doctores/frmRegistro';?>">[ Registrate ]</a></p>
</body>
</html>