<?php 

require_once 'Conexion.php';

class Alumno{
	private $idAlumno; 
	private $nombre; 
	private $apellidoP; 
	private $apellidoM;
	private $telefono; 
	private $direccion;
	private $comunidad;
	private $estatus;
	private $idMateria;
	private $idCalificacion;

	const TABLA = "alumno"; 

	public function __construct($nombre=null, $apellidoP=null, $apellidoM=null, $telefono=null, $direccion=null, $comunidad=null, $estatus=null, $idMateria= null, $idCalificacion= null, $idAlumno=null) {

		$this->nombre = $nombre; 
		$this->apellidoP = $apellidoP;
		$this->apellidoM = $apellidoM; 
		$this->telefono = $telefono;
		$this->direccion = $direccion;
		$this->comunidad = $comunidad; 
		$this->estatus = $estatus; 
		$this->idMateria = $idMateria; 
		$this->idCalificacion = $idCalificacion;
		$this->idAlumno = $idAlumno; 
	}

	public function getNombre(){
	return $this->nombre;
	}

	public function getApellidoP(){
	return $this->apellidoP;
	}

	public function getApellidoM(){
	return $this->apellidoM;
	}

	public function getTelefono(){
	return $this->telefono;
	}

	public function getDireccion(){
	return $this->direccion;
	}

	public function getComunidad(){
	return $this->comunidad;
	}

	public function getEstatus(){
	return $this->estatus;
	}

	public function getIdMateria(){
	return $this->idMateria;
	}

	public function getIdCalificacion(){
	return $this->idCalificacion;
	}

	public function getIdAlumno(){
	return $this->idAlumno;
	}

	public function setNombre($nombre){
	return $this->nombre = $nombre;
	}

	public function setApellidoP($apellidoP){
	return $this->apellidoP = $apellidoP;
	}

	public function setApellidoM($apellidoM){
	return $this->apellidoM = $apellidoM;
	}

	public function setTelefono($telefono){
	return $this->telefono = $telefono;
	}

	public function setDireccion($direccion){
	return $this->direccion = $direccion;
	}

	public function setComunidad($comunidad){
	return $this->comunidad = $comunidad;
	}

	public function setEstatus($estatus){
	return $this->estatus = $estatus;
	}

	public function setIdMateria($idMateria){
	return $this->idMateria = $idMateria;
	}

	public function setIdCalificacion($idCalificacion){
	return $this->idCalificacion = $idCalificacion;
	}

	public function guardar(){

		$conexion = new Conexion(); 

		if ($this ->idAlumno){
			$consulta = $conexion->prepare('UPDATE ' . self::TABLA . 'SET nombre = :nombre, apellidoP = :apellidoP, apellidoM = :apellidoM, telefono = :telefono, direccion = :direccion, comunidad = :comunidad, estatus = :estatus, idMateria = :idMateria, idCalificacion = :idCalificacion, WHERE idAlumno = :idAlumno'); 

			$consulta->bindParam(':idAlumno', $this->idAlumno);
			$consulta->bindParam(':nombre', $this->nombre); 
			$consulta->bindParam(':apellidoP', $this->apellidoP); 
			$consulta->bindParam(':apellidoM', $this->apellidoM); 
			$consulta->bindParam(':telefono', $this->telefono);
			$consulta->bindParam(':direccion', $this->direccion);
			$consulta->bindParam(':comunidad', $this->comunidad);
			$consulta->bindParam(':estatus', $this->estatus);
			$consulta->bindParam(':idMateria', $this->idMateria);
			$consulta->bindParam(':idCalificacion', $this->idCalificacion);
			$consulta->execute(); 

		}else{

		$consulta = $conexion->prepare('INSERT INTO ' .self::TABLA. '(nombre, apellidoP, apellidoM, telefono, direccion, comunidad, estatus, idMateria, idCalificacion)
			value (:nombre, :apellidoP, :apellidoM, :telefono, :direccion, :comunidad, :estatus, :idMateria, idCalificacion)');

		$consulta->bindParam(':nombre', $this->nombre); 
		$consulta->bindParam(':apellidoP', $this->apellidoP);
		$consulta->bindParam(':apellidoM', $this->apellidoM);
		$consulta->bindParam(':telefono', $this->telefono);
		$consulta->bindParam(':direccion', $this->direccion);
		$consulta->bindParam(':comunidad', $this->comunidad);
		$consulta->bindParam(':estatus', $this->estatus);
		$consulta->bindParam(':idMateria', $this->idMateria);
		$consulta->bindParam(':idCalificacion', $this->idCalificacion);
		$consulta->execute(); 	
		$this->idAlumno = $conexion->lastInsertid(); 

		}
		$conexion = null; 

	}


	public function eliminar(){

		$conexion = new Conexion(); 
		$consulta = $conexion->prepare('DELETE FROM ' . self::TABLA . ' WHERE idAlumno = :idAlumno'); 
		$consulta->bindParam(':idAlumno', $this->idAlumno); 
		$consulta->execute(); 
		$conexion = null; 
	}

	public static function buscarPorId($idAlumno){

		$conexion = new Conexion(); 
		$consulta = $conexion->prepare('SELECT nombre, apellidoP, apellidoM, telefono, direccion, comunidad, estatus, idMateria, idCalificacion FROM ' . self::TABLA . ' WHERE idAlumno = :idAlumno'); 
		$consulta->bindParam(':idAlumno', $idAlumno); 
		$consulta->execute(); 
		$registro = $consulta->fetch(); 
		//print_r($registro); 
		$conexion = null; 
		if($registro) { 
			return new self($registro['nombre'], $registro['apellidoP'], $registro['apellidoM'], $registro['telefono'], $registro['direccion'] $registro['comunidad'], $registro['estatus'], $registro['idMateria'], $registro['idCalificacion'], $idAlumno); 
		}else{
			return false; 
		}
	}

	public function recuperarTodos(){

		$conexion = new Conexion(); 
		$consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA ); 
		$consulta->execute();
		$registros = $consulta-> fetchAll(); 
		$conexion = null; 
		return $registros; 
	}
}