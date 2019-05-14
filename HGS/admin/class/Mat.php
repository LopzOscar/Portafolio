<?php 

require_once 'Conexion.php';

class Materia{

	private $idMateria;
	private $nombre; 
	private $descripcion;
	private $idAlumno;

	const TABLA = "materia"; 

	public function __construct($idMateria=null, $nombre=null, $descripcion=null, $idAlumno=null) {

		$this->nombre = $nombre;
		$this->descripcion = $descripcion;
		$this->idAlumno = $idAlumno;
		$this->idMateria = $idMateria;
	} 

	//GETER'S

	public function getIdMateria(){
	return $this->idMateria;
	}

	public function getNombre(){
	return $this->nombre; 	
	}

	public function getDescripcion(){
	return $this->descripcion; 	
	}


	public function getIdAlumno(){
	return $this->idAlumno; 	
	}

	//SETER'S

	// public function setIdMateria($idMateria){
	//	$this->idMateria = $idMateria; 
	// }
	public function setIdMateria($idMateria){
		$this->idMateria = $idMateria;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function setDescripcion($descripcion){
		$this->descripcion = $descripcion; 
	}
	public function setIdAlumno($idAlumno){
		$this->idAlumno = $idAlumno; 
	}

	//METODOS

	public function guardar(){

		$conexion = new Conexion (); 

		if ($this ->idMateria) { /* modifica */
			$consulta = $conexion->prepare('UPDATE ' . self::TABLA . ' SET nombre = :nombre, descripcion = :descripcion, idAlumno = :idAlumno WHERE idMateria = :idMateria'); 
			$consulta->bindParam(':idMateria', $this->idMateria);
			$consulta->bindParam(':nombre', $this->nombre);
			$consulta->bindParam(':descripcion', $this->descripcion);
			$consulta->bindParam(':idAlumno', $this->idAlumno);
			$consulta->execute();

			/* el prepare recibe la accion a realizar sea actualizacion - edicion etc.*/
			/* .self:: hace referencia a una constante */

		}else{

		$consulta = $conexion->prepare('INSERT INTO ' . self::TABLA . ' (nombre, descripcion, idAlumno) 
			value (:nombre, :descripcion, :idAlumno)'); 
			$consulta->bindParam(':nombre', $this->nombre);
			$consulta->bindParam(':descripcion', $this->descripcion);
			$consulta->bindParam(':idAlumno', $this->idAlumno);	
			$consulta->execute();
			$this->idMateria = $conexion->lastInsertid(); /* nos imprime el ultimo inscrito */
		}
		$conexion = null; 
	}

	public function eliminar(){

		// echo $this->id;
		$conexion = new Conexion(); 
		$consulta = $conexion->prepare('DELETE FROM ' . self::TABLA . ' WHERE idMateria = :idMateria');
		$consulta->bindParam(':idMateria', $this->idMateria); //this es atributo de la clase  
		$consulta->execute();
		$conexion = null; 

	}

	public static function buscarPorId($idMateria) {

		$conexion = new Conexion();
		$consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' WHERE idMateria = :idMateria');
		$consulta->bindParam(':idMateria', $idMateria); 
		$consulta->execute(); 
		$registro = $consulta->fetch();
		//print_r($registro); 
		$conexion = null; 
		if ($registro) {

		 	return new self($registro['nombre'], $registro['descripcion'], $registro['idAlumno'], $idMateria);
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
