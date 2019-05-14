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
      <div id="footer_texto">Relación de Categorías de Categorías</div> <br>
      <br>
  </footer>

  <table border="1" id="table_info">
       <thead>
           <tr>
               <th>Id Categoría</th>
               <th>Nombre</th>
               <th>Imagen</th>
               <th>Descripción</th>
               
           </tr>
       </thead>
       <tbody>
          <?php foreach ($categorias as $categoria) { ?>
            <tr>
                <td><?php echo $categoria->id_Categoria;?></td>
                <td><?php echo $categoria->nombre_Categoria;?></td>
                <td><?php echo $categoria->imagen_Categoria;?></td>
                <td><?php echo $categoria->descripcion_Categoria;?></td>
               
           </tr>
          <?php  }?>
       </tbody>
</table>



</body>
</html>
