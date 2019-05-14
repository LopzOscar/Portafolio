<?php 

require_once 'Conexion.php';

class Generacion{

	private $idGeneracion;
	private $nombre; 
	private $idAlumno;
	private $idMateria;
	

	const TABLA = "generacion"; 

	public function __construct($nombre=null, $idAlumno=null, $idMateria=null, $idCalificacion=null, $idGeneracion=null) {

		$this->nombre = $nombre;
		$this->idAlumno = $idAlumno;
		$this->idMateria = $idMateria;
		$this->idCalificacion = $idCalificacion;
		$this->idGeneracion = $idGeneracion;
	} 

	//GETER'S

	public function getIdGeneracion(){
	return $this->idGeneracion;
	}

	public function getNombre(){
	return $this->nombre; 	
	}

	public function getIdAlumno(){
	return $this->idAlumno; 	
	}

	public function getIdMateria(){
	return $this->idMateria; 	
	}

	public function getIdCalificacion(){
	return $this->idCalificacion; 	
	}

	//SETER'S

	// public function setIdGeneracion($idGeneracion){
	//	$this->idGeneracion = $idGeneracion; 
	// }

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function setIdAlumno($idAlumno){
		$this->idAlumno = $idAlumno; 
	}
	public function setIdMateria($idMateria){
		$this->idMateria = $idMateria; 
	}

	public function setIdCalificacion($idCalificacion){
		$this->idCalificacion = $idCalificacion; 
	}



	//METODOS

	public function guardar(){

		$conexion = new Conexion (); 

		if ($this ->idGeneracion) { /* modifica */
			$consulta = $conexion->prepare('UPDATE ' . self::TABLA . ' SET nombre = :nombre, idAlumno = :idAlumno, idMateria = :idMateria, idCalificacion = :idCalificacion WHERE idGeneracion = :idGeneracion'); 
			$consulta->bindParam(':idGeneracion', $this->idGeneracion);
			$consulta->bindParam(':nombre', $this->nombre);
			$consulta->bindParam(':idAlumno', $this->idAlumno);
			$consulta->bindParam(':idMateria', $this->idMateria);
			$consulta->bindParam(':idCalificacion', $this->idCalificacion);
			$consulta->execute();

			/* el prepare recibe la accion a realizar sea actualizacion - edicion etc.*/
			/* .self:: hace referencia a una constante */

		}else{

		$consulta = $conexion->prepare('INSERT INTO ' . self::TABLA . ' (nombre, idAlumno, idMateria, idCalificacion) 
			value (:nombre, :idAlumno, :idMateria, :idCalificacion)'); 
			$consulta->bindParam(':nombre', $this->nombre);
			$consulta->bindParam(':idAlumno', $this->idAlumno);
			$consulta->bindParam(':idMateria', $this->idMateria);
			$consulta->bindParam(':idCalificacion', $this->idCalificacion);	
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

		 	return new self($registro['nombre'], $registro['idAlumno'], $registro['idMateria'], $registro['idCalificacion'], $idGeneracion);
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
