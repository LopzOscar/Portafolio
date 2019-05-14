<?php 

require_once 'Conexion.php';

class Comentario{

	private $idComentario;
	private $email;
	private $mensaje;
	private $estatus;
	private $fechaPub;

	const TABLA = "comentarios"; 

	public function __construct($email=null, $mensaje=null,
		$estatus=null, $fechaPub=null, $idComentario=null) {

		$this->email = $email;
		$this->mensaje = $mensaje;
		$this->estatus = $estatus;
		$this->fechaPub = $fechaPub;
		$this->idComentario = $idComentario;
	} 

	//GETER'S

	public function getIdComentario(){
	return $this->idComentario;
	}

	public function getEmail(){
	return $this->email; 	
	}

	public function getMensaje(){
	return $this->mensaje; 	
	}

	public function getEstatus(){
	return $this->estatus; 	
	}

	public function getFechaPub(){
	return $this->fechaPub; 	
	}

	//SETER'S

	public function setIdComentario($idComentario){
		$this->idComentario = $idComentario; 
	}

	public function setEmail($email){
		$this->email = $email; 
	}

	public function setMensaje($mensaje){
		$this->mensaje = $mensaje; 
	}

	public function setEstatus($estatus){
		$this->estatus = $estatus; 
	}

	public function setFechaPub($fechaPub){
		$this->fechaPub = $fechaPub; 
	}

	//METODOS

	public function guardar(){

		$conexion = new Conexion (); 

		if ($this ->idComentario) { /* modifica */
			$consulta = $conexion->prepare('UPDATE ' .self::TABLA. ' SET email = :email, mensaje = :mensaje,
				estatus = :estatus, fechaPub = :fechaPub WHERE idComentario = :idComentario'); 
			$consulta->bindParam(':idComentario', $this->idComentario);
			$consulta->bindParam(':email', $this->email);
			$consulta->bindParam(':mensaje', $this->mensaje);
			$consulta->bindParam(':estatus', $this->estatus);
			$consulta->bindParam(':fechaPub', $this->fechaPub);
			$consulta->execute();

			/* el prepare recibe la accion a realizar sea actualizacion - edicion etc.*/
			/* .self:: hace referencia a una constante */

		}else{

		$consulta = $conexion->prepare('INSERT INTO ' .self::TABLA. ' (email, mensaje, estatus, fechaPub) 
		value (:email, :mensaje, :estatus, :fechaPub)');
			$consulta->bindParam(':email', $this->email);
			$consulta->bindParam(':mensaje', $this->mensaje);
			$consulta->bindParam(':estatus', $this->estatus);
			$consulta->bindParam(':fechaPub', $this->fechaPub);	
			$consulta->execute();
			$this->idComentario = $conexion->lastInsertid(); /* nos imprime el ultimo inscrito */
		}
		$conexion = null; 
	}

	public function eliminar(){

		// echo $this->id;
		$conexion = new Conexion(); 
		$consulta = $conexion->prepare('DELETE FROM ' . self::TABLA . ' WHERE idComentario = :idComentario');
		$consulta->bindParam(':idComentario', $this->idComentario); //this es atributo de la clase  
		$consulta->execute();
		$conexion = null; 

	}

	public static function buscarPorId($idComentario) {

		$conexion = new Conexion();
		$consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' WHERE idComentario = :idComentario');
		$consulta->bindParam(':idComentario', $idComentario); 
		$consulta->execute(); 
		$registro = $consulta->fetch();
		//print_r($registro); 
		$conexion = null; 
		if ($registro) {

		 	return new self($registro['email'], $registro['mensaje'], $registro['estatus'],
		 		$registro['fechaPub'], $idComentario);
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
