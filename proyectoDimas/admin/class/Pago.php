<?php 

require_once 'Conexion.php';

class metPago{

	private $idPago; 
	private $nombre; 
	private $descripcion; 


	const TABLA = "pago"; 

	public function __construct($nombre=null, $descripcion=null, $idPago=null) {

		$this->nombre = $nombre;
		$this->descripcion = $descripcion;
		$this->idPago = $idPago;
		
	} 


	//GETER'S

	public function getIdPago(){
	return $this->idPago; 	
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

		if ($this ->idPago) { /* modifica */
			$consulta = $conexion->prepare('UPDATE ' . self::TABLA . ' SET  nombre = :nombre,  descripcion = :descripcion WHERE idPago = :idPago'); 
			$consulta->bindParam(':idPago', $this->idPago);
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
			$this->idPago = $conexion->lastInsertid(); /* nos imprime el ultimo inscrito */

		}
		$conexion = null; 
	}

	public function eliminar(){

		// echo $this->id;
		$conexion = new Conexion(); 
		$consulta = $conexion->prepare('DELETE FROM ' . self::TABLA . ' WHERE idPago = :idPago');
		$consulta->bindParam(':idPago', $this->idPago); //this es atributo de la clase  
		$consulta->execute();
		$conexion = null; 

	}

	public static function buscarPorId($idPago) {

		$conexion = new Conexion();
		$consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' WHERE idPago = :idPago');
		$consulta->bindParam(':idPago', $idPago); 
		$consulta->execute(); 
		$registro = $consulta->fetch();
		//print_r($registro); 
		$conexion = null; 
		if ($registro) {

		 	return new self($registro['nombre'], $registro['descripcion'],  $idPago); 

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
