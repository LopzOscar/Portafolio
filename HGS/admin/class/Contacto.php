<?php 

require_once 'Conexion.php';

class Contacto{

	private $idContacto;
	private $nombre; 
	private $apellidoPat;
	private $apellidoMat;
	private $email;
	private $mensaje;

	const TABLA = "contacto"; 

	public function __construct($nombre=null, $apellidoPat=null, $apellidoMat=null,
	$email=null, $mensaje=null, $idContacto=null) {

		$this->nombre = $nombre;
		$this->apellidoPat = $apellidoPat;
		$this->apellidoMat = $apellidoMat;
		$this->email = $email;
		$this->mensaje = $mensaje;
		$this->idContacto = $idContacto;
	} 

	//GETER'S

	public function getIdContacto(){
	return $this->idContacto;
	}

	public function getNombre(){
	return $this->nombre; 	
	}

	public function getApellidoPat(){
	return $this->apellidoPat; 	
	}

	public function getApellidoMat(){
	return $this->apellidoMat; 	
	}	

	public function getEmail(){
	return $this->email; 	
	}

	public function getMensaje(){
	return $this->mensaje; 	
	}


	//SETER'S

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}
	
	public function setApellidoPat($apellidoPat){
		$this->apellidoPat = $apellidoPat; 
	}
	
	public function setApellidoMat($apellidoMat){
		$this->apellidoMat = $apellidoMat; 
	}

	public function setEmail($email){
		$this->email = $email; 
	}

	public function setMensaje($mensaje){
		$this->mensaje = $mensaje; 
	}


	//METODOS

	public function guardar(){

		$conexion = new Conexion (); 

		if ($this ->idContacto) { /* modifica */
			$consulta = $conexion->prepare('UPDATE ' . self::TABLA . ' SET nombre = :nombre, apellidoPat = :apellidoPat, apellidoMat = :apellidoMat, email = :email, mensaje = :mensaje	WHERE idContacto = :idContacto'); 
			$consulta->bindParam(':idContacto', $this->idContacto);
			$consulta->bindParam(':nombre', $this->nombre);
			$consulta->bindParam(':apellidoPat', $this->apellidoPat);
			$consulta->bindParam(':apellidoMat', $this->apellidoMat);
			$consulta->bindParam(':email', $this->email);
			$consulta->bindParam(':mensaje', $this->mensaje);
			$consulta->execute();

			/* el prepare recibe la accion a realizar sea actualizacion - edicion etc.*/
			/* .self:: hace referencia a una constante */

		}else{

		$consulta = $conexion->prepare('INSERT INTO ' . self::TABLA . ' (nombre, apellidoPat, apellidoMat, email, mensaje) 
		value (:nombre, :apellidoPat, :apellidoMat, :email, :mensaje)'); 
			
			$consulta->bindParam(':nombre', $this->nombre);
			$consulta->bindParam(':apellidoPat', $this->apellidoPat);
			$consulta->bindParam(':apellidoMat', $this->apellidoMat);
			$consulta->bindParam(':email', $this->email);
			$consulta->bindParam(':mensaje', $this->mensaje);	
			$consulta->execute();
			$this->idContacto = $conexion->lastInsertid(); /* nos imprime el ultimo inscrito */
		}
		$conexion = null; 
	}

	public function eliminar(){

		// echo $this->id;
		$conexion = new Conexion(); 
		$consulta = $conexion->prepare('DELETE FROM ' . self::TABLA . ' WHERE idContacto = :idContacto');
		$consulta->bindParam(':idContacto', $this->idContacto); //this es atributo de la clase  
		$consulta->execute();
		$conexion = null; 

	}

	public static function buscarPorId($idContacto) {

		$conexion = new Conexion();
		$consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' WHERE idContacto = :idContacto');
		$consulta->bindParam(':idContacto', $idContacto); 
		$consulta->execute(); 
		$registro = $consulta->fetch();
		//print_r($registro); 
		$conexion = null; 
		if ($registro) {

		 	return new self($registro['nombre'], $registro['apellidoPat'], $registro['apellidoMat'], $registro['email'], $registro['mensaje'], $idContacto);
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
