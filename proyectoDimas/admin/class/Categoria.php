<?php 

require_once 'Conexion.php';

class Categoria{

	private $idCategoria;
	private $nombre; 
	private $descripcion;

	const TABLA = "categorias"; 

	public function __construct($nombre=null, $descripcion=null, $idCategoria=null) {

		$this->nombre = $nombre;
		$this->descripcion = $descripcion;
		$this->idCategoria = $idCategoria;
	} 

	//GETER'S

	public function getIdCategoria(){
	return $this->idCategoria;
	}

	public function getNombre(){
	return $this->nombre; 	
	}

	public function getDescripcion(){
	return $this->descripcion; 	
	}


	//SETER'S

	public function setIdCategoria($idCategoria){
		$this->idCategoria = $idCategoria; 
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function setDescripcion($descripcion){
		$this->descripcion = $descripcion; 
	}


	//METODOS

	public function guardar(){

		$conexion = new Conexion (); 

		if ($this ->idCategoria) { /* modifica */
			$consulta = $conexion->prepare('UPDATE ' . self::TABLA . ' SET nombre = :nombre,
			 descripcion = :descripcion	WHERE idCategoria = :idCategoria'); 
			$consulta->bindParam(':idCategoria', $this->idCategoria);
			$consulta->bindParam(':nombre', $this->nombre);
			$consulta->bindParam(':descripcion', $this->descripcion);
			$consulta->execute();

			/* el prepare recibe la accion a realizar sea actualizacion - edicion etc.*/
			/* .self:: hace referencia a una constante */

		}else{

		$consulta = $conexion->prepare('INSERT INTO ' . self::TABLA . ' (nombre, descripcion) 
			values (:nombre, :descripcion)'); 
			$consulta->bindParam(':nombre', $this->nombre);
			$consulta->bindParam(':descripcion', $this->descripcion);	
			$consulta->execute();
			$this->idCategoria = $conexion->lastInsertid(); /* nos imprime el ultimo inscrito */
		}
		$conexion = null; 
	}

	public function eliminar(){

		// echo $this->id;
		$conexion = new Conexion(); 
		$consulta = $conexion->prepare('DELETE FROM ' . self::TABLA . ' WHERE idCategoria = :idCategoria');
		$consulta->bindParam(':idCategoria', $this->idCategoria); //this es atributo de la clase  
		$consulta->execute();
		$conexion = null; 

	}

	public static function buscarPorId($idCategoria) {

		$conexion = new Conexion();
		$consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' WHERE idCategoria = :idCategoria');
		$consulta->bindParam(':idCategoria', $idCategoria); 
		$consulta->execute(); 
		$registro = $consulta->fetch();
		//print_r($registro); 
		$conexion = null; 
		if ($registro) {

		 	return new self($registro['nombre'], $registro['descripcion'], $idCategoria);
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

} 

/* actualizar - meter los datos a la base de datos -- editar es obtener los datos y 
verlos en pantalla */

/*  */

/*  */
