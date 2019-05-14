<?php 

require_once 'Conexion.php';

class Faq{

	private $idFaq;
	private $pregunta; 
	private $respuesta;

	const TABLA = "faq"; 

	public function __construct($pregunta=null, $respuesta=null, $idFaq=null) {

		$this->pregunta = $pregunta;
		$this->respuesta = $respuesta;
		$this->idFaq = $idFaq;
	} 

	//GETER'S

	public function getIdFaq(){
	return $this->idFaq;
	}

	public function getPregunta(){
	return $this->pregunta; 	
	}

	public function getRespuesta(){
	return $this->respuesta; 	
	}


	//SETER'S

	public function setIdFaq($idFaq){
		$this->idFaq = $idFaq; 
	}

	public function setPregunta($pregunta){
		$this->pregunta = $pregunta;
	}

	public function setRespuesta($respuesta){
		$this->respuesta = $respuesta; 
	}


	//METODOS

	public function guardar(){

		$conexion = new Conexion (); 

		if ($this ->idFaq) { /* modifica */
			$consulta = $conexion->prepare('UPDATE ' . self::TABLA . ' SET pregunta = :pregunta,
			 respuesta = :respuesta	WHERE idFaq = :idFaq'); 
			$consulta->bindParam(':idFaq', $this->idFaq);
			$consulta->bindParam(':pregunta', $this->pregunta);
			$consulta->bindParam(':respuesta', $this->respuesta);
			$consulta->execute();

			/* el prepare recibe la accion a realizar sea actualizacion - edicion etc.*/
			/* .self:: hace referencia a una constante */

		}else{

		$consulta = $conexion->prepare('INSERT INTO ' . self::TABLA . ' (pregunta, respuesta) 
			values (:pregunta, :respuesta)'); 
			$consulta->bindParam(':pregunta', $this->pregunta);
			$consulta->bindParam(':respuesta', $this->respuesta);	
			$consulta->execute();
			$this->idFaq = $conexion->lastInsertid(); /* nos imprime el ultimo inscrito */
		}
		$conexion = null; 
	}

	public function eliminar(){

		// echo $this->id;
		$conexion = new Conexion(); 
		$consulta = $conexion->prepare('DELETE FROM ' . self::TABLA . ' WHERE idFaq = :idFaq');
		$consulta->bindParam(':idFaq', $this->idFaq); //this es atributo de la clase  
		$consulta->execute();
		$conexion = null; 

	}

	public static function buscarPorId($idFaq) {

		$conexion = new Conexion();
		$consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' WHERE idFaq = :idFaq');
		$consulta->bindParam(':idFaq', $idFaq); 
		$consulta->execute(); 
		$registro = $consulta->fetch();
		//print_r($registro); 
		$conexion = null; 
		if ($registro) {
		 	return new self($registro['pregunta'], $registro['respuesta'], $idFaq);
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
