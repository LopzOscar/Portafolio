<?php 

require_once 'Conexion.php';

class Calificacion{

	private $idCalificacion;
	private $calificacion;
	private $idMateria; 
	private $idAlumno;
	
	const TABLA = "calificaciones"; 

	public function __construct($calificacion=null, $idMateria=null, $idAlumno=null, $idCalificacion=null) {

		$this->calificacion = $calificacion;
		$this->idMateria = $idMateria;
		$this->idAlumno = $idAlumno;
		$this->idCalificacion = $idCalificacion;
	} 

	//GETER'S

	public function getIdCalificacion(){
	return $this->idCalificacion; 	
	}

	
	public function getCalificacion(){
	return $this->calificacion; 	
	}

	public function getIdMateria(){
	return $this->idMateria; 	
	}

	
	public function getIdAlumno(){
	return $this->idAlumno; 	
	}

	
	//SETER'S

	public function setIdCalificacion($idCalificacion){
		$this->idCalificacion = $idCalificacion;
	}
	
	public function setCalificacion($calificacion){
		$this->calificacion = $calificacion; 
	}

	public function setIdMateria($idMateria){
		$this->idMateria = $idMateria; 
	}

	public function setIdAlumno($idAlumno){
		$this->idAlumno = $idAlumno; 
	}
	
	

	//METODOS

	public function guardar(){

		$conexion = new Conexion (); 

		if ($this ->idCalificacion) { /* modifica */
			$consulta = $conexion->prepare('UPDATE ' . self::TABLA . ' SET calificacion = :calificacion, 
				idMateria = :idMateria,	idAlumno = :idAlumno WHERE idCalificacion = :idCalificacion'); 
			$consulta->bindParam(':idCalificacion', $this->idCalificacion);
			$consulta->bindParam(':calificacion', $this->calificacion);
			$consulta->bindParam(':idMateria', $this->idMateria);
			$consulta->bindParam(':idAlumno', $this->idAlumno);
			$consulta->execute();

			/* el prepare recibe la accion a realizar sea actualizacion - edicion etc.*/
			
			/* .self:: hace referencia a una constante */

		}else{

		$consulta = $conexion->prepare('INSERT INTO ' .self::TABLA. ' (calificacion, idMateria, idAlumno) 
		value (:calificacion, :idMateria, :idAlumno)'); 
				
			$consulta->bindParam(':calificacion', $this->calificacion);
			$consulta->bindParam(':idMateria', $this->idMateria);
			$consulta->bindParam(':idAlumno', $this->idAlumno);
			$consulta->execute();
			$this->idCalificacion = $conexion->lastInsertid(); /* nos imprime el ultimo inscrito */

		}
		$conexion = null; 
	}

	public function eliminar(){

		// echo $this->id;
		$conexion = new Conexion(); 
		$consulta = $conexion->prepare('DELETE FROM ' . self::TABLA . ' WHERE idCalificacion = :idCalificacion');
		$consulta->bindParam(':idCalificacion', $this->idCalificacion); //this es atributo de la clase  
		$consulta->execute();
		$conexion = null; 

	}

	public static function buscarPorId($idCalificacion) {

		$conexion = new Conexion();
		$consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' WHERE idCalificacion = :idCalificacion');
		$consulta->bindParam(':idCalificacion', $idCalificacion); 
		$consulta->execute(); 
		$registro = $consulta->fetch();
		//print_r($registro); 
		$conexion = null; 
		if ($registro) {

		 	return new self($registro['calificacion'], $registro['idMateria'], $registro['idAlumno'], $idCalificacion); 

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
public  function listarPorIdAl(){
		$conexion = new Conexion();
		$consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' WHERE idAlumno = :idAlumno');
		/* en los dos puntos el bindparam se puede llamar como queramos, no tiene uqe ser ese nombre |...  */
		$consulta->bindParam(':idAlumno', $this->idAlumno);
		$consulta-> execute();
		
		/* Método static por...  */

		$registros = $consulta-> fetchAll(); 
		/* fetchll metodo de PDO que permite colocar en arreglos los datos
		y los separa en caja de datos. y puedes elegir solo un dato para saber entre 
		corchetes  -- echo $return[3] y solo lista el dato 3*/
		//var_dump($registros);
		$conexion = null;
		return $registros; 
		print_r($registros);
	}

	}