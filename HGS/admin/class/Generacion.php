<?php 

require_once 'Conexion.php';

class Generacion{

	private $idGeneracion;
	private $nombre;
		
	const TABLA = "generacion"; 

	public function __construct($nombre=null, $idGeneracion=null) {

		$this->nombre = $nombre;
		
		$this->idGeneracion = $idGeneracion;
	} 

	//GETER'S

	public function getIdGeneracion(){
	return $this->idGeneracion; 	
	}

	
	public function getNombre(){
	return $this->nombre; 	
	}

	
	//SETER'S

	public function setIdGeneracion($idGeneracion){
		$this->idGeneracion = $idGeneracion;
	}
	
	public function setNombre($nombre){
		$this->nombre = $nombre; 
	}

	
	//METODOS

	public function guardar(){

		$conexion = new Conexion (); 

		if ($this ->idGeneracion) { /* modifica */
			$consulta = $conexion->prepare('UPDATE ' . self::TABLA . ' SET nombre = :nombre WHERE idGeneracion = :idGeneracion'); 
			$consulta->bindParam(':idGeneracion', $this->idGeneracion);
			$consulta->bindParam(':nombre', $this->nombre);
			
			$consulta->execute();

			/* el prepare recibe la accion a realizar sea actualizacion - edicion etc.*/
			
			/* .self:: hace referencia a una constante */

		}else{

		$consulta = $conexion->prepare('INSERT INTO ' .self::TABLA. ' (nombre) 
		value (:nombre)'); 
				
			$consulta->bindParam(':nombre', $this->nombre);
			
			$consulta->execute();
			$this->idGeneracion = $conexion->lastInsertid(); /* nos imprime el ultimo inscrito */

		}
		$conexion = null; 
	}

	public function eliminar(){

		// echo $this->id;
		$conexion = new Conexion(); 
		$consulta = $conexion->prepare('DELETE FROM ' . self::TABLA . ' WHERE idGeneracion = :idGeneracion');
		$consulta->bindParam(':idGeneracion', $this->idGeneracion); //this es atributo de la clase  
		$consulta->execute();
		$conexion = null; 

	}

	public static function buscarPorId($idGeneracion) {

		$conexion = new Conexion();
		$consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' WHERE idGeneracion = :idGeneracion');
		$consulta->bindParam(':idGeneracion', $idGeneracion); 
		$consulta->execute(); 
		$registro = $consulta->fetch();
		//print_r($registro); 
		$conexion = null; 
		if ($registro) {

		 	return new self($registro['nombre'], $idGeneracion); 

		 } else {
		 	return false; 
		 }

	}

	public static function recuperarTodos(){
		$conexion = new Conexion();
		$consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA );
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
