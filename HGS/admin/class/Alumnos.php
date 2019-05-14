<?php

require_once 'Conexion.php';

class Alumnos{

	private $idAlumno;
	private $nombre;
	private $apellidoP;
	private $apellidoM;
	private $matricula;
	private $telefono;
	private $direccion;
	private $comunidad;
	private $estatus;
	private $idGeneracion;

	const TABLA = "alumno";

	public function __construct($nombre=null, $apellidoP=null, $apellidoM=null,	$matricula=null, $telefono=null, $direccion=null, $comunidad=null, $estatus=null, $idGeneracion=null, $idAlumno=null) {

		$this->nombre = $nombre;
		$this->apellidoP = $apellidoP;
		$this->apellidoM = $apellidoM;
		$this->matricula = $matricula;
		$this->telefono = $telefono;
		$this->direccion = $direccion;
		$this->comunidad = $comunidad; 
		$this->estatus = $estatus; 
		$this->idGeneracion = $idGeneracion;
		$this->idAlumno = $idAlumno;
	}

	//GETER'S

	public function getNombre(){
	return $this->nombre;
	}

	public function getApellidoP(){
	return $this->apellidoP;
	}

	public function getApellidoM(){
	return $this->apellidoM;
	}

	public function getMatricula(){
	return $this->matricula;
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

	public function getIdAlumno(){
	return $this->idAlumno;
	}

	public function getIdGeneracion(){
	return $this->idGeneracion;
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

	public function setMatricula($matricula){
	return $this->matricula = $matricula;
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

	public function setIdGeneracion($idGeneracion){
	return $this->idGeneracion = $idGeneracion;
	}

	

	//METODOS

	public function guardar(){

		$conexion = new Conexion(); 

		if ($this ->idAlumno){
			$consulta = $conexion->prepare('UPDATE ' . self::TABLA . ' SET nombre = :nombre, apellidoP = :apellidoP, apellidoM = :apellidoM, matricula = :matricula, telefono = :telefono, direccion = :direccion, comunidad = :comunidad, estatus = :estatus, idGeneracion = :idGeneracion WHERE idAlumno = :idAlumno'); 
			$consulta->bindParam(':idAlumno', $this->idAlumno);
			$consulta->bindParam(':nombre', $this->nombre); 
			$consulta->bindParam(':apellidoP', $this->apellidoP); 
			$consulta->bindParam(':apellidoM', $this->apellidoM); 
			$consulta->bindParam(':matricula', $this->matricula);
			$consulta->bindParam(':telefono', $this->telefono);
			$consulta->bindParam(':direccion', $this->direccion);
			$consulta->bindParam(':comunidad', $this->comunidad);
			$consulta->bindParam(':estatus', $this->estatus);
			$consulta->bindParam(':idGeneracion', $this->idGeneracion);
			$consulta->execute(); 

		}else{


		$consulta = $conexion->prepare('INSERT INTO ' . self::TABLA. ' (nombre, apellidoP, apellidoM, matricula, telefono, direccion, comunidad, estatus, idGeneracion)
			value (:nombre, :apellidoP, :apellidoM, :matricula, :telefono, :direccion, :comunidad, :estatus, :idGeneracion)');

		$consulta->bindParam(':nombre', $this->nombre); 
		$consulta->bindParam(':apellidoP', $this->apellidoP);
		$consulta->bindParam(':apellidoM', $this->apellidoM);
		$consulta->bindParam(':matricula', $this->matricula);
		$consulta->bindParam(':telefono', $this->telefono);
		$consulta->bindParam(':direccion', $this->direccion);
		$consulta->bindParam(':comunidad', $this->comunidad);
		$consulta->bindParam(':estatus', $this->estatus);
		$consulta->bindParam(':idGeneracion', $this->idGeneracion);
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


	public static function buscarPorId($idAlumno) {

		$conexion = new Conexion();
		$consulta = $conexion->prepare('SELECT nombre, apellidoP, apellidoM, matricula, telefono, direccion, comunidad, estatus, idGeneracion FROM ' . self::TABLA . ' WHERE idAlumno = :idAlumno');
		$consulta->bindParam(':idAlumno', $idAlumno);
		$consulta->execute();
		$registro = $consulta->fetch();
		$conexion = null;
		if ($registro) {

		 	return new self($registro['nombre'], $registro['apellidoP'], $registro['apellidoM'], $registro['matricula'], $registro['telefono'], $registro['direccion'],	$registro['comunidad'], $registro['estatus'], $registro['idGeneracion'], $idAlumno);
		 } else {
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



	public function logIn(){

		$conexion = new Conexion();

		$consulta = $conexion ->prepare('SELECT idUsuario, email, privilegios FROM ' .self::TABLA. ' WHERE matricula=:matricula AND estatus=:estatus AND estatus = 1');
			$consulta->bindParam(':email', $this->email);
			$consulta->bindParam(':estatus', $this->estatus);
			$consulta->execute();
			$registro = $consulta->fetch();

			/* var_dump($consulta); */

			if ($registro) {

			/* $_SESSION -- variable global, no la podemos cambiar, solo obtener. igual
			que _POST, pero esta para sesiones y post para formularios sin sesion. */

				$_SESSION['idAlumno'] = $registro[0];
				$_SESSION['matricula'] = $registro[1];
				$_SESSION['estatus'] = $registro[2];

				return true;

			}else{

				return false;

			}
	}
}

/* actualizar - meter los datos a la base de datos -- editar es obtener los datos y
verlos en pantalla */

/*  */

/*  */
