<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro</title>
</head>
<body>
    <form action="<?=base_url().'index.php/Doctores/registro';?>" method="post">
        <label for="nombre">Nombre </label><input type="text" name="nombre"><br>
        <label for="apellidoP">Apellido Paterno: </label><input type="text" name="apellidoP"><br>
        <label for="apellidoM">Apellido Materno: </label><input type="text" name="apellidoM"><br>
        <label for="telefono">Teléfono: </label><input type="text" name="telefono"><br>
        <label for="direccion"> Dirección: </label><input type="text" name="direccion"><br>
        <label for="especialidad"> Especialidad: </label><input type="text" name="especialidad"><br>
        <label for="cedula"> Cédula: </label><input type="text" name="cedula"><br>
        <button type="submit">Registrar</button>
    </form>
    <p><a href="<?=base_url().'index.php/Doctores/listar';?>">[ Regresar ]</a></p>
</body>
</html>