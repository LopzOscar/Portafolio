<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listar Doctores</title>
</head>
<body>
    <a href="<?=base_url().'index.php/Doctores/frmRegistro'?>">Nuevo</a>
    <table>
            <thead>
            <tr>
                <th>Identifiacdor de Doctor</th>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Telefono</th>
                <th>Direccion</th>
                <th>Especialidad</th>
                <th>Cédula</th>
                <th colspan="2">Acciones</th>
            </tr>
            </thead>
        <?php
        // con el objeto usuarios es como se obtiene los datosdesde el controlador
        foreach($doctores as $doctor):
        ?>
            <tbody>
                <tr>
                    <td><?=$doctor->idDoctor;?></td>
                    <td><?=$doctor->nombre;?></td>
                    <td><?=$doctor->apellidoP;?></td>
                    <td><?=$doctor->apellidoM;?></td>
                    <td><?=$doctor->telefono;?></td>
                    <td><?=$doctor->direccion;?></td>
                    <td><?=$doctor->especialidad;?></td>
                    <td><?=$doctor->cedula;?></td>
                    <td><a href="<?=base_url().'index.php/Doctores/frmModificar/'.$doctor->idDoctor;?>"> Modificar</td>
                    <td><a href="<?=base_url().'index.php/Doctores/eliminar/'.$doctor->idDoctor;?>">Eliminar</a></td>
                </tr>
            </tbody>
            <?php
        endforeach;
    ?>
    </table>



</body>
</html>