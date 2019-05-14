<?php 
 //Instancia a la clase conexión obtienes la dirección de la base de datos para acceder a la tabla de productos.
require_once 'Conexion.php'; 
 //crear la clase producto y definir sus campos de la tabla 
class Producto{ 
 
//Creas tus variables 
	private $idProducto; 
	private $url; 
	private $nombre; 
	private $precio; 
	private $stock;
	private $descripcion; 
	private $idCategoria;

	const TABLA = "productos"; //a la tabla de productos de la base de datos y toda su informacion la almacenas en TABLA
     //obtienes el valor de las variables de la base de datos.
	public function __construct($url=null, $nombre=null, $precio=null, $stock=null,
	$descripcion=null, $idCategoria=null, $idProducto=null) {
        //se asigna el valor que quieres que tenga cada una de tus variables
		$this->url = $url;
		$this->nombre = $nombre;
		$this->precio = $precio;
		$this->stock = $stock;
		$this->descripcion = $descripcion;
		$this->idCategoria = $idCategoria;
		$this->idProducto = $idProducto;
		
	} 


	//GETER'S
    //creas un get de cada una de tus variables para obtener el valor 
	public function getIdProducto(){
	return $this->idProducto; 	
	}

	public function getUrl(){
	return $this->url; 	
	}

    public function getNombre(){
	return $this->nombre; 	
	}

    public function getPrecio(){
	return $this->precio; 	
	}

	public function getStock(){
	return $this->stock; 	
	}

	public function getDescripcion(){
	 return $this->descripcion;
	}

	public function getIdCategoria(){
	return $this->idCategoria; 	
	}


	//SETER'S
    //creas un set de cada una de tus variables para  estableser  el valor 
	public function setUrl($url){
		$this->url = $url;  
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;  
	}

	public function setPrecio($precio){
		$this->precio = $precio; 
	}
	
	public function setStock($stock){
		$this->stock = $stock; 
	}

	public function setDescripcion($descripcion){
		$this->descripcion = $descripcion; 
	}

	public function setIdCategoria($idCategoria){
		$this->idCategoria = $idCategoria; 
	}

     //Guardar
	public function guardar(){

		$conexion = new Conexion (); 

		if ($this ->idProducto) { /* modifica un producto*/
			//obtienes los valores del producto a actualizar
			$consulta = $conexion->prepare('UPDATE ' . self::TABLA . ' SET url = :url, nombre = :nombre, 
				precio = :precio, stock = :stock, descripcion = :descripcion, idCategoria = :idCategoria 
				WHERE idProducto = :idProducto'); 
			//defines el valor de variables del producto a editar 
			$consulta->bindParam(':idProducto', $this->idProducto);
			$consulta->bindParam(':url', $this->url);
			$consulta->bindParam(':nombre', $this->nombre);
			$consulta->bindParam(':precio', $this->precio);
			$consulta->bindParam(':stock', $this->stock);
			$consulta->bindParam(':descripcion', $this->descripcion);
			$consulta->bindParam(':idCategoria', $this->idCategoria);
			$consulta->execute();

			/* el prepare recibe la accion a realizar sea actualizacion - edicion etc.*/
			
			/* .self:: hace referencia a una constante */

		}else{
         //nuevo producto
			//preparas consulta para agregar un ptoducto en la tabla productos te alluda self::TABLA para insertarlo en la tabla deseada
		    $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA . ' (url, nombre, precio, stock, 
			descripcion, idCategoria) value (:url, :nombre, :precio, :stock, :descripcion, :idCategoria)'); 
		    //defines el valor de variables del producto a editar 
			$consulta->bindParam(':url', $this->url);
			$consulta->bindParam(':nombre', $this->nombre);
			$consulta->bindParam(':precio', $this->precio);
			$consulta->bindParam(':stock', $this->stock);
			$consulta->bindParam(':descripcion', $this->descripcion);
			$consulta->bindParam(':idCategoria', $this->idCategoria);
			$consulta->execute();
			$this->idProducto = $conexion->lastInsertid(); /* nos imprime el ultimo inscrito */
		}
		$conexion = null; 
	}
     //Eliminar
	public function eliminar(){

		// echo $this->id;

		$conexion = new Conexion(); 
		//linea para preparar de la tabla de productos para eliminar respecto al id del producto
		$consulta = $conexion->prepare('DELETE FROM ' . self::TABLA . ' WHERE idProducto = :idProducto');
		$consulta->bindParam(':idProducto', $this->idProducto); //this es atributo de la clase  
		$consulta->execute();//ejecutar la accion
		$conexion = null; 

	}

    //buscar por ID

	public static function buscarPorId($idProducto) {
      
		$conexion = new Conexion();
		//preparas la consulta para selecionar de la tabla dependiendo del valor del id del producto
		$consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' WHERE idProducto = :idProducto');
		$consulta->bindParam(':idProducto', $idProducto); //defines el valor de la variiable 
		$consulta->execute(); 
		$registro = $consulta->fetch();
		/* fetchll metodo de PDO que permite colocar en arreglos los datos
		y los separa en caja de datos. y puedes elegir solo un dato para saber entre 
		corchetes  -- echo $return[3] y solo lista el dato 3*/
		//var_dump($registros);
		$conexion = null; 
		if ($registro) { //si ay un registro
        		//muestra los datos del producto.
		 	return new self($registro['url'], $registro['nombre'], $registro['precio'],
		 		$registro['stock'], $registro['descripcion'], $registro['idCategoria'], $idProducto); 

		 } else { //si no existe
                  //regresa un false
		 	return false; 
		 }

	}

      
    //Recuperar Todos
	public static function recuperarTodos(){
		//para selecionar todos los productos de tu tabla
		$conexion = new Conexion();
		$consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA);
		$consulta-> execute();

		/* Método static por...  */

		$registros = $consulta-> fetchAll(); 
		/* fetchll metodo de PDO que permite colocar en arreglos los datos
		y los separa en caja de datos. y puedes elegir solo un dato para saber entre 
		corchetes  -- echo $return[3] y solo lista el dato 3*/
		//var_dump($registros);
		$conexion = null;
		return $registros; 
	}

     //listar por categorias

	public function listarPorCategoria(){ //preparas la funcion
		$conexion = new Conexion(); // defines la nueva conexion
		//preparas la consulta por la conexion para selecionar de la tabla por el valor de su ID
		$consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' WHERE idCategoria = :idCategoria');
		/* en los dos puntos el bindparam se puede llamar como queramos, no tiene uqe ser ese nombre |...  */
		$consulta->bindParam(':idCategoria', $this->idCategoria);
		$consulta-> execute();

		/* Método static por...  */

		$registros = $consulta-> fetchAll(); 
		/* fetchll metodo de PDO que permite colocar en arreglos los datos
		y los separa en caja de datos. y puedes elegir solo un dato para saber entre 
		corchetes  -- echo $return[3] y solo lista el dato 3*/
		//var_dump($registros);
		$conexion = null;
		return $registros; 


	}

	}

