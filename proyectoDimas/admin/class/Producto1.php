<?php 

require_once 'Conexion.php';

class Producto{

	private $idProducto; 
	private $url; 
	private $nombre; 
	private $precio; 
	private $stock;
	private $descripcion; 
	private $idCategoria;

	const TABLA = "productos"; 

	public function __construct($url=null, $nombre=null, $precio=null, $stock=null,
	$descripcion=null, $idCategoria=null, $idProducto=null) {

		$this->url = $url;
		$this->nombre = $nombre;
		$this->precio = $precio;
		$this->stock = $stock;
		$this->descripcion = $descripcion;
		$this->idCategoria = $idCategoria;
		$this->idProducto = $idProducto;
		
	} 


	//GETER'S

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


	public function guardar(){

		$conexion = new Conexion (); 

		if ($this ->idProducto) { /* modifica */
			$consulta = $conexion->prepare('UPDATE ' . self::TABLA . ' SET url = :url, nombre = :nombre, 
				precio = :precio, stock = :stock, descripcion = :descripcion, idCategoria = :idCategoria 
				WHERE idProducto = :idProducto'); 
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

		$consulta = $conexion->prepare('INSERT INTO ' . self::TABLA . ' (url, nombre, precio, stock, 
			descripcion, idCategoria) value (:url, :nombre, :precio, :stock, :descripcion, :idCategoria)'); 
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

	public function eliminar(){

		// echo $this->id;
		$conexion = new Conexion(); 
		$consulta = $conexion->prepare('DELETE FROM ' . self::TABLA . ' WHERE idProducto = :idProducto');
		$consulta->bindParam(':idProducto', $this->idProducto); //this es atributo de la clase  
		$consulta->execute();
		$conexion = null; 

	}

	public static function buscarPorId($idProducto) {

		$conexion = new Conexion();
		$consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' WHERE idProducto = :idProducto');
		$consulta->bindParam(':idProducto', $idProducto); 
		$consulta->execute(); 
		$registro = $consulta->fetch();
		//print_r($registro); 
		$conexion = null; 
		if ($registro) {

		 	return new self($registro['url'], $registro['nombre'], $registro['precio'],
		 		$registro['stock'], $registro['descripcion'], $registro['idCategoria'], $idProducto); 

		 } else {
		 	return false; 
		 }

	}

	public static function recuperarTodos(){
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


	public static function listarPorCategoria(){
		$conexion = new Conexion();
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

/* actualizar - meter los datos a la base de datos -- editar es obtener los datos y 
verlos en pantalla */

/*  */

/*  */
