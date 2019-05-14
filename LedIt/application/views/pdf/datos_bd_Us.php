<html>
  <head>
      <link rel="stylesheet" type="text/css" href="./assets/css/dompdf.css">
  </head>

<body>

  <header>
      <table>
          <tr>
              <td id="header_logo">
                  <img id="logo" src="./././assets/images/hd1.png">

                  <br>
              </td>
              <td id="header_texto">
                  <div><h1>LED it</h1></div>
                  <div>  Alvaro Obregon 26-A Col. Centro CP 61250 
                         Maravatio, Michoacan.</div>
                  <div>  . </div>
                  <div>"Luz que brilla naturalmente"</div>
                   <br> 
                  <br>
              </td>

              
          </tr>
      </table>
  </header>
  <footer>
      <div id="footer_texto">Relación de Usuarios</div> <br>
      <br>
  </footer>

  <table border="1" id="table_info">
       <thead>
           <tr>
               <th>Id Usuario</th>
               <th>Nombre</th>
               <th>Apellido Paterno</th>
               <th>Apellido Materno</th>
               <th>Teléfono</th>
              
               
           </tr>
       </thead>
       <tbody>
          <?php foreach ($usuarios as $usuario) { ?>
            <tr>
                <td><?php echo $usuario->id_Usuario;?></td>
                
                <td><?php echo $usuario->nombre_Usuario;?></td>
                <td><?php echo $usuario->apellido_Paterno_Usuario;?></td>
                <td><?php echo $usuario->apellido_Materno_Usuario;?></td>
                <td><?php echo $usuario->telefono_Usuario;?></td>
                
           </tr>
          <?php  }?>
       </tbody>
</table>



</body>
</html>
