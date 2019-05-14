<?php 

require_once 'Conexion.php';

class Noticias{

	private $idNoticias;
	private $url; 
	private $nombre;
	private $noticia;
	private $fechaPub;

	const TABLA = "noticias"; 

	public function __construct($idNoticias=null, $url=null, $nombre=null, $noticia=null, $fechaPub=null) {

		
		$this->url = $url;
		$this->nombre = $nombre;
		$this->noticia = $noticia;
		$this->fechaPub = $fechaPub;
		$this->idNoticias = $idNoticias;
	} 

	//GETER'S

	public function getIdNoticias(){
	return $this->idNoticias;
	}

	public function getUrl(){
	return $this->url; 	
	}

	public function getNombre(){
	return $this->nombre; 	
	}

	public function getNoticia(){
	return $this->noticia;	
	}

	public function getFechaPub(){
	return $this->fechaPub;
	}


	//SETER'S

	public function setIdNoticias($idNoticias){
		$this->idNoticias = $idNoticias; 
	}

	public function setUrl($url){
		$this->url = $url;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre; 
	}

	public function setNoticia($noticia){
		$this->noticia = $noticia;
	}

	public function setFechaPub($fechaPub){
		$this->fechaPub = $fechaPub;
	}


	//METODOS

	public function guardar(){

		$conexion = new Conexion (); 

		if ($this ->idNoticias) { /* modifica */
			$consulta = $conexion->prepare('UPDATE ' . self::TABLA . ' SET url = :url, nombre = :nombre,
			 noticia = :noticia, fechaPub = :fechaPub WHERE idNoticias = :idNoticias'); 
			$consulta->bindParam(':idNoticias', $this->idNoticias);
			$consulta->bindParam(':url', $this->url);
			$consulta->bindParam(':nombre', $this->nombre);
			$consulta->bindParam(':noticia', $this->noticia);
			$consulta->bindParam(':fechaPub', $this->fechaPub);
			$consulta->execute();

			/* el prepare recibe la accion a realizar sea actualizacion - edicion etc.*/
			/* .self:: hace referencia a una constante */

		}else{

		$consulta = $conexion->prepare('INSERT INTO ' . self::TABLA . ' (url, nombre, noticia, fechaPub) 
			values (:url, :nombre, :noticia, :fechaPub)'); 
		    $consulta->bindParam(':url', $this->url);
			$consulta->bindParam(':nombre', $this->nombre);
			$consulta->bindParam(':noticia', $this->noticia);
			$consulta->bindParam(':fechaPub', $this->fechaPub);	
			$consulta->execute();
			$this->idNoticias = $conexion->lastInsertid(); /* nos imprime el ultimo inscrito */
		}
		$conexion = null; 
	}

	public function eliminar(){

		// echo $this->id;
		$conexion = new Conexion(); 
		$consulta = $conexion->prepare('DELETE FROM ' . self::TABLA . ' WHERE idNoticias = :idNoticias');
		$consulta->bindParam(':idNoticias', $this->idNoticias); //this es atributo de la clase  
		$consulta->execute();
		$conexion = null; 

	}

	public static function buscarPorId($idNoticias) {

		$conexion = new Conexion();
		$consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' WHERE idNoticias = :idNoticias');
		$consulta->bindParam(':idNoticias', $idNoticias); 
		$consulta->execute(); 
		$registro = $consulta->fetch();
		//print_r($registro); 
		$conexion = null; 
		if ($registro) {
		 	return new self($registro['url'], $registro['nombre'], $registro['noticia'], $registro['fechaPub'], $idNoticias);
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
