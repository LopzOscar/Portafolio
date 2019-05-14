<?php 

require_once 'Conexion.php';

class metEnvio{

	private $idEnvio; 
	private $nombre; 
	private $descripcion; 


	const TABLA = "envio"; 

	public function __construct($nombre=null, $descripcion=null, $idEnvio=null) {

		$this->nombre = $nombre;
		$this->descripcion = $descripcion;
		$this->idEnvio = $idEnvio;
		
	} 


	//GETER'S

	public function getIdEnvio(){
	return $this->idEnvio; 	
	}

	public function getNombre(){
	return $this->nombre; 	
	}


	public function getDescripcion(){
	 return $this->descripcion;
	}



	//SETER'S

	public function setNombre($nombre){
		$this->nombre = $nombre; 
	}


	public function setDescripcion($descripcion){
		$this->descripcion = $descripcion; 
	}




	public function guardar(){

		$conexion = new Conexion (); 

		if ($this ->idEnvio) { /* modifica */
			$consulta = $conexion->prepare('UPDATE ' . self::TABLA . ' SET  nombre = :nombre,  descripcion = :descripcion WHERE idEnvio = :idEnvio'); 
			$consulta->bindParam(':idEnvio', $this->idEnvio);
			$consulta->bindParam(':nombre', $this->nombre);
			$consulta->bindParam(':descripcion', $this->descripcion);
			$consulta->execute();

			/* el prepare recibe la accion a realizar sea actualizacion - edicion etc.*/
			
			/* .self:: hace referencia a una constante */

		}else{

		$consulta = $conexion->prepare('INSERT INTO ' . self::TABLA . ' (nombre, descripcion) value ( :nombre, :descripcion )'); 
			$consulta->bindParam(':nombre', $this->nombre);
			$consulta->bindParam(':descripcion', $this->descripcion);
			$consulta->execute();
			$this->idEnvio = $conexion->lastInsertid(); /* nos imprime el ultimo inscrito */

		}
		$conexion = null; 
	}

	public function eliminar(){

		// echo $this->id;
		$conexion = new Conexion(); 
		$consulta = $conexion->prepare('DELETE FROM ' . self::TABLA . ' WHERE idEnvio = :idEnvio');
		$consulta->bindParam(':idEnvio', $this->idEnvio); //this es atributo de la clase  
		$consulta->execute();
		$conexion = null; 

	}

	public static function buscarPorId($idEnvio) {

		$conexion = new Conexion();
		$consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' WHERE idEnvio = :idEnvio');
		$consulta->bindParam(':idEnvio', $idEnvio); 
		$consulta->execute(); 
		$registro = $consulta->fetch();
		//print_r($registro); 
		$conexion = null; 
		if ($registro) {

		 	return new self($registro['nombre'], $registro['descripcion'],  $idEnvio); 

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


/*  */

/*  */
