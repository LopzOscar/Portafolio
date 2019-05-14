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
                  <div>"La mejor de mí para ustedes"</div>
                   <br> 
                  <br>
              </td>

              
          </tr>
      </table>
  </header>
  <footer>
      <div id="footer_texto">Relación de Productos</div> <br>
      <br>
  </footer>

  <table border="1" id="table_info">
       <thead>
           <tr>
               <th>Id producto</th>
               <th>Nombre</th>
               <th>Stock</th>
               
           </tr>
       </thead>
       <tbody>
          <?php foreach ($productos as $producto) { ?>
            <tr>
                <td><?php echo $producto->id_Producto;?></td>
                
                <td><?php echo $producto->nombre_Producto;?></td>
                <td><?php echo $producto->stock_Producto;?></td>
            </tr>
          <?php  }?>
       </tbody>
</table>



</body>
</html>
