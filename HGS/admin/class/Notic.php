<?php 

require_once 'Conexion.php';

class Noticias{

	private $idNoticias;
	private $url; 
	private $noticia;
	private $fechaPub;
	private $encabezado;
	private $idCategoria;

	const TABLA = "noticias"; 

	public function __construct($idNoticias=null, $url=null, $noticia=null, $fechaPub=null, $encabezado=null, $idCategoria=null) {

		
		$this->url = $url;
		$this->noticia = $noticia;
		$this->fechaPub = $fechaPub;
		$this->encabezado = $encabezado;
		$this->idCategoria = $idCategoria;
		$this->idNoticias = $idNoticias;
	} 

	//GETER'S

	public function getIdNoticias(){
	return $this->idNoticias;
	}

	public function getUrl(){
	return $this->url; 	
	}

	public function getNoticia(){
	return $this->noticia;	
	}

	public function getFechaPub(){
	return $this->fechaPub;
	}

	public function getEncabezado(){
	return $this->encabezado; 	
	}

	public function getIdCategoria(){
	return $this->idCategoria; 	
	}

	//SETER'S

	public function setIdNoticias($idNoticias){
		$this->idNoticias = $idNoticias; 
	}

	public function setUrl($url){
		$this->url = $url;
	}

	public function setNoticia($noticia){
		$this->noticia = $noticia;
	}

	public function setFechaPub($fechaPub){
		$this->fechaPub = $fechaPub;
	}

	public function setEncabezado($encabezado){
		$this->encabezado = $encabezado; 
	}

	public function setIdCategoria($idCategoria){
		$this->idCategoria = $idCategoria; 
	}

	//METODOS

	public function guardar(){

		$conexion = new Conexion (); 

		if ($this ->idNoticias) { /* modifica */
			$consulta = $conexion->prepare('UPDATE ' . self::TABLA . ' SET url = :url, noticia = :noticia, fechaPub = :fechaPub, encabezado = :encabezado, idCategoria = :idCategoria WHERE idNoticias = :idNoticias'); 
			$consulta->bindParam(':idNoticias', $this->idNoticias);
			$consulta->bindParam(':url', $this->url);
			$consulta->bindParam(':noticia', $this->noticia);
			$consulta->bindParam(':fechaPub', $this->fechaPub);
			$consulta->bindParam(':encabezado', $this->encabezado);
			$consulta->bindParam(':idCategoria', $this->idCategoria);
			$consulta->execute();

			/* el prepare recibe la accion a realizar sea actualizacion - edicion etc.*/
			/* .self:: hace referencia a una constante */

		}else{

		$consulta = $conexion->prepare('INSERT INTO ' . self::TABLA . ' (url, noticia, fechaPub, encabezado, idCategoria) 
			value (:url, :noticia, :fechaPub :encabezado, :idCategoria,)'); 
		    $consulta->bindParam(':url', $this->url);
			$consulta->bindParam(':noticia', $this->noticia);
			$consulta->bindParam(':fechaPub', $this->fechaPub);	
			$consulta->bindParam(':encabezado', $this->encabezado);
			$consulta->bindParam(':idCategoria', $this->idCategoria);
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
		 	return new self($registro['url'], $registro['noticia'], $registro['fechaPub'], $registro['encabezado'], $registro['idCategoria'], $idNoticias);
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
