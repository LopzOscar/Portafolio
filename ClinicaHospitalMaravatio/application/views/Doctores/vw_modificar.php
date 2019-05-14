<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modificar</title>
</head>
<body>
    <form action="<?=base_url().'index.php/Doctores/modificar';?>" method="post">
    <?php foreach($doctores as $docs):?>
        <input type="hidden" name="idDoctor" value="<?=$docs->idDoctor;?>">
        <label for="nombre">Nombre: </label><input type="text" name="nombre" value="<?=$docs->nombre;?>"><br>
        <label for="apellidoP">Apellido Paterno: </label><input type="text" name="apellidoP" value="<?=$docs->apellidoP;?>"><br>
        <label for="apellidoM">Apellido Materno: </label><input type="text" name="apellidoM" value="<?=$docs->apellidoM;?>"><br>
        <label for="telefono"> Teléfono: </label><input type="text" name="telefono" value="<?=$docs->telefono;?>"><br>
        <label for="direccion"> Dirección: </label><input type="text" name="direccion" value="<?=$docs->direccion;?>"><br>
        <label for="especialidad"> Especialidad: </label><input type="text" name="especialidad" value="<?=$docs->especialidad;?>"><br>
        <label for="cedula"> Cédula: </label><input type="text" name="cedula" value="<?=$docs->cedula;?>"><br>


        <button type="submit">modificar</button>
    <?php endforeach;?>
    </form>
    <p><a href="<?=base_url().'index.php/Doctores/listar';?>">[ Regresar ]</a></p>
</body>
</html>
