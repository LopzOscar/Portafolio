<?php 

require_once 'Conexion.php';

class Noticia{

	private $idNoticia;
	private $url; 
	private $noticia;
	private $fechaPub;
	private $encabezado;
	private $idCategoria;
	private $estatus;

	const TABLA = "noticias"; 

	public function __construct( $url=null, $noticia=null, $fechaPub=null, $encabezado=null, $idCategoria=null, $estatus=null, $idNoticia=null) {

		
		$this->url = $url;
		$this->noticia = $noticia;
		$this->fechaPub = $fechaPub;
		$this->encabezado = $encabezado;
		$this->idCategoria = $idCategoria;
		$this->estatus = $estatus;
		$this->idNoticia = $idNoticia;
	} 

	//GETER'S

	public function getIdNoticia(){
	return $this->idNoticia;
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

	public function getEstatus(){
	return $this->estatus; 	
	}

	//SETER'S

	public function setIdNoticia($idNoticia){
		$this->idNoticia = $idNoticia; 
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

	public function setEstatus($estatus){
		$this->estatus = $estatus; 
	}

	//METODOS

	public function guardar(){

		$conexion = new Conexion (); 

		if ($this ->idNoticia) { /* modifica */
			$consulta = $conexion->prepare('UPDATE ' . self::TABLA . ' SET url = :url, noticia = :noticia, fechaPub = :fechaPub, encabezado = :encabezado, idCategoria = :idCategoria, estatus = :estatus WHERE idNoticia = :idNoticia'); 
			$consulta->bindParam(':idNoticia', $this->idNoticia);
			$consulta->bindParam(':url', $this->url);
			$consulta->bindParam(':noticia', $this->noticia);
			$consulta->bindParam(':fechaPub', $this->fechaPub);
			$consulta->bindParam(':encabezado', $this->encabezado);
			$consulta->bindParam(':idCategoria', $this->idCategoria);
			$consulta->bindParam(':estatus', $this->estatus);
			$consulta->execute();

			/* el prepare recibe la accion a realizar sea actualizacion - edicion etc.*/
			/* .self:: hace referencia a una constante */

		}else{

		$consulta = $conexion->prepare('INSERT INTO ' . self::TABLA . ' (url, noticia, fechaPub, encabezado, idCategoria, estatus) 
			values (:url, :noticia, :fechaPub, :encabezado, :idCategoria, estatus)'); 
		    $consulta->bindParam(':url', $this->url);
			
			$consulta->bindParam(':noticia', $this->noticia);
			$consulta->bindParam(':fechaPub', $this->fechaPub);	
			$consulta->bindParam(':encabezado', $this->encabezado);
			$consulta->bindParam(':idCategoria', $this->idCategoria);
			$consulta->bindParam(':estatus', $this->estatus);
			$consulta->execute();
			$this->idNoticia = $conexion->lastInsertid(); /* nos imprime el ultimo inscrito */
		}
		$conexion = null; 
	}

	public function eliminar(){

		// echo $this->id;
		$conexion = new Conexion(); 
		$consulta = $conexion->prepare('DELETE FROM ' . self::TABLA . ' WHERE idNoticia = :idNoticia');
		$consulta->bindParam(':idNoticia', $this->idNoticia); //this es atributo de la clase  
		$consulta->execute();
		$conexion = null; 

	}

	public static function buscarPorId($idNoticia) {

		$conexion = new Conexion();
		$consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' WHERE idNoticia = :idNoticia');
		$consulta->bindParam(':idNoticia', $idNoticia); 
		$consulta->execute(); 
		$registro = $consulta->fetch();
		//print_r($registro); 
		$conexion = null; 
		if ($registro) {
		 	return new self($registro['url'], $registro['noticia'], $registro['fechaPub'], $registro['encabezado'], $registro['idCategoria'], $registro['estatus'], $idNoticia);
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

	public static function listarPorCategoria(){
		$conexion = new Conexion();
		$consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' WHERE idCategoria = :idCategoria');
		/* en los dos puntos el bindparam se puede llamar como queramos, no tiene uqe ser ese nombre |...  */
		$consulta->bindParam('idCategoria', $this->idCategoria);
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
