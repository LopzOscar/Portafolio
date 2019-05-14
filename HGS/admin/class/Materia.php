<?php 

require_once 'Conexion.php';

class Materia{

	private $idMateria;
	private $nombre;
	private $descripcion; 
	
	
	const TABLA = "materia"; 

	public function __construct($nombre=null, $descripcion=null, $idMateria=null) {

		$this->nombre = $nombre;
		$this->descripcion = $descripcion;
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

		
	//SETER'S

	
	
	public function setNombre($nombre){
		$this->nombre = $nombre; 
	}

	public function setDescripcion($descripcion){
		$this->descripcion = $descripcion; 
	}

	

	//METODOS

	public function guardar(){

		$conexion = new Conexion (); 

		if ($this ->idMateria) { /* modifica */
			$consulta = $conexion->prepare('UPDATE ' . self::TABLA . ' SET nombre = :nombre, 
				descripcion = :descripcion WHERE idMateria = :idMateria'); 
			$consulta->bindParam(':idMateria', $this->idMateria);
			$consulta->bindParam(':nombre', $this->nombre);
			$consulta->bindParam(':descripcion', $this->descripcion);
			$consulta->execute();

			/* el prepare recibe la accion a realizar sea actualizacion - edicion etc.*/
			
			/* .self:: hace referencia a una constante */

		}else{

		$consulta = $conexion->prepare('INSERT INTO ' .self::TABLA. ' (nombre, descripcion) 
		value (:nombre, :descripcion)'); 
				
			$consulta->bindParam(':nombre', $this->nombre);
			$consulta->bindParam(':descripcion', $this->descripcion);
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

		 	return new self($registro['nombre'], $registro['descripcion'], $idMateria); 

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

	public function logIn(){

		$conexion = new Conexion(); 

		$consulta = $conexion ->prepare('SELECT idUsuario, email, privilegios FROM ' .self::TABLA. ' WHERE email=:email AND password=:password AND estatus = 1');
			$consulta->bindParam(':email', $this->email); 
			$consulta->bindParam(':password', $this->password);
			$consulta->execute();
			$registro = $consulta->fetch();
   
			/* var_dump($consulta); */

			if ($registro) {
			
			/* $_SESSION -- variable global, no la podemos cambiar, solo obtener. igual 
			que _POST, pero esta para seiones y post para formularios sin sesion. */	

				$_SESSION['idUsuario'] = $registro[0]; 
				$_SESSION['email'] = $registro[1]; 
				$_SESSION['privilegios'] = $registro[2]; 

				return true; 

			}else{

				return false;

			}
	}
} 