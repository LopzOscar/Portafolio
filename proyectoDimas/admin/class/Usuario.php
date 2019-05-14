<?php 

require_once 'Conexion.php';

class Usuario{

	private $idUsuario;
	private $nombre;
	private $apellidoPat;
	private $apellidoMat;
	private $email; 
	private $password;
	private $estado; 
	private $ciudad;
	private $calle; 
	private $numExterior;
	private $numInterior; 
	private $colonia;
	private $cp; 
	private $telefono;
	private $estatus; 
	private $privilegios; 

	const TABLA = "usuarios"; 

	public function __construct($nombre=null, $apellidoPat=null, $apellidoMat=null,	$email=null, 
		$password=null, $estado=null, $ciudad=null, $calle=null, $numExterior=null, $numInterior=null, 
		$colonia=null, $cp=null, $telefono=null, $estatus=null, $privilegios=null, $idUsuario=null) {

		$this->nombre = $nombre;
		$this->apellidoPat = $apellidoPat;
		$this->apellidoMat = $apellidoMat;
		$this->email = $email;
		$this->password = $password;
		$this->estado = $estado;
		$this->ciudad = $ciudad;
		$this->calle = $calle;
		$this->numExterior = $numExterior;
		$this->numInterior = $numInterior;
		$this->colonia = $colonia;
		$this->cp = $cp;
		$this->telefono = $telefono;
		$this->estatus = $estatus;
		$this->privilegios = $privilegios;
		$this->idUsuario = $idUsuario;
	} 

	//GETER'S

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

	public function getPassword(){
	return $this->password; 	
	}

	public function getEstado(){
	return $this->estado; 	
	}

	public function getCiudad(){
	return $this->ciudad; 	
	}

	public function getCalle(){
	return $this->calle; 	
	}

	public function getNumExterior(){
	return $this->numExterior; 	
	}

	public function getNumInterior(){
	return $this->numInterior; 	
	}

	public function getColonia(){
	return $this->colonia; 	
	}

	public function getCP(){
	return $this->cp; 	
	}

	public function getTelefono(){
	return $this->telefono; 	
	}

	public function getEstatus(){
	return $this->estatus; 	
	}

	public function getPrivilegios(){
	return $this->privilegios; 	
	}

	public function getIdUsuario(){
	 return $this->idUsuario;
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

	public function setPassword($password){
		$this->password = $password; 
	}

	public function setEstado($estado){
		$this->estado = $estado;
	}
	
	public function setCiudad($ciudad){
		$this->ciudad = $ciudad; 
	}
	
	public function setCalle($calle){
		$this->calle = $calle; 
	}

	public function setNumExterior($numExterior){
		$this->numExterior = $numExterior; 
	}

	public function setNumInterior($numInterior){
		$this->numInterior = $numInterior; 
	}

	public function setColonia($colonia){
		$this->colonia = $colonia; 
	}

	public function setCP($cp){
		$this->cp = $cp; 
	}

	public function setTelefono($telefono){
		$this->telefono = $telefono; 
	}

	public function setEstatus($estatus){
		$this->estatus = $estatus; 
	}
	
	public function setPrivilegios($privilegios){
		$this->privilegios = $privilegios; 
	}

	//METODOS

	public function guardar(){

		$conexion = new Conexion (); 

		if ($this ->idUsuario) { /* modifica */
			$consulta = $conexion->prepare('UPDATE ' . self::TABLA . ' SET nombre = :nombre, 
				apellidoPat = :apellidoPat, apellidoMat = :apellidoMat, email = :email,
				password = AES_ENCRYPT(:password,"YOLO"), estado = :estado, ciudad = :ciudad, calle = :calle,
				numExterior = :numExterior, numInterior = :numInterior, colonia = :colonia, 
				cp = :cp, telefono = :telefono, estatus = :estatus, privilegios = :privilegios
				WHERE idUsuario = :idUsuario'); 
			$consulta->bindParam(':idUsuario', $this->idUsuario);
			$consulta->bindParam(':nombre', $this->nombre);
			$consulta->bindParam(':apellidoPat', $this->apellidoPat);
			$consulta->bindParam(':apellidoMat', $this->apellidoMat);
			$consulta->bindParam(':email', $this->email);
			$consulta->bindParam(':password', $this->password);
			$consulta->bindParam(':estado', $this->estado);
			$consulta->bindParam(':ciudad', $this->ciudad);
			$consulta->bindParam(':calle', $this->calle);
			$consulta->bindParam(':numExterior', $this->numExterior);
			$consulta->bindParam(':numInterior', $this->numInterior);
			$consulta->bindParam(':colonia', $this->colonia);
			$consulta->bindParam(':cp', $this->cp);
			$consulta->bindParam(':telefono', $this->telefono);
			$consulta->bindParam(':estatus', $this->estatus);
			$consulta->bindParam(':privilegios', $this->privilegios);
			$consulta->execute();

			/* el prepare recibe la accion a realizar sea actualizacion - edicion etc.*/
			
			/* .self:: hace referencia a una constante */

		}else{

		$consulta = $conexion->prepare('INSERT INTO ' .self::TABLA. ' (nombre, apellidoPat, apellidoMat, email, 
			password, estado, ciudad, calle, numExterior, numInterior, colonia, cp, telefono, estatus, privilegios) 
		value (:nombre, :apellidoPat, :apellidoMat, :email, AES_ENCRYPT (:password,"YOLO"), :estado, :ciudad, :calle, :numExterior, 
			:numInterior, :colonia, :cp, :telefono, :estatus, :privilegios)'); 
				
			$consulta->bindParam(':nombre', $this->nombre);
			$consulta->bindParam(':apellidoPat', $this->apellidoPat);
			$consulta->bindParam(':apellidoMat', $this->apellidoMat);
			$consulta->bindParam(':email', $this->email);
			$consulta->bindParam(':password', $this->password);
			$consulta->bindParam(':estado', $this->estado);
			$consulta->bindParam(':ciudad', $this->ciudad);
			$consulta->bindParam(':calle', $this->calle);
			$consulta->bindParam(':numExterior', $this->numExterior);
			$consulta->bindParam(':numInterior', $this->numInterior);
			$consulta->bindParam(':colonia', $this->colonia);
			$consulta->bindParam(':cp', $this->cp);
			$consulta->bindParam(':telefono', $this->telefono);
			$consulta->bindParam(':estatus', $this->estatus);
			$consulta->bindParam(':privilegios', $this->privilegios);	
			$consulta->execute();
			$this->idUsuario = $conexion->lastInsertid(); /* nos imprime el ultimo inscrito */

		}
		$conexion = null; 
	}

	public function eliminar(){

		// echo $this->id;
		$conexion = new Conexion(); 
		$consulta = $conexion->prepare('DELETE FROM ' . self::TABLA . ' WHERE idUsuario = :idUsuario');
		$consulta->bindParam(':idUsuario', $this->idUsuario); //this es atributo de la clase  
		$consulta->execute();
		$conexion = null; 

	}

	public static function buscarPorId($idUsuario) {

		$conexion = new Conexion();
		$consulta = $conexion->prepare('SELECT nombre, apellidoPat, apellidoMat, email, AES_DECRYPT(password, "YOLO"), estado, ciudad, calle, numExterior, numInterior, colonia, cp, telefono, estatus, privilegios  FROM ' . self::TABLA . ' WHERE idUsuario = :idUsuario');
		$consulta->bindParam(':idUsuario', $idUsuario); 
		$consulta->execute(); 
		$registro = $consulta->fetch();
		//print_r($registro); 
		$conexion = null; 
		if ($registro) {

		 	return new self($registro['nombre'], $registro['apellidoPat'], $registro['apellidoMat'],
		 		$registro['email'], $registro['AES_DECRYPT(password, "YOLO")'], $registro['estado'],	$registro['ciudad'], 
		 		$registro['calle'], $registro['numExterior'], $registro['numInterior'], $registro['colonia'], 
		 		$registro['cp'], $registro['telefono'], $registro['estatus'], $registro['privilegios'], $idUsuario); 

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

	public function logIn(){

		$conexion = new Conexion(); 

		$consulta = $conexion ->prepare('SELECT idUsuario, nombre, apellidoPat, email, privilegios FROM ' .self::TABLA. ' WHERE email=:email AND password= AES_ENCRYPT(:password,"YOLO") AND estatus = 1');
			$consulta->bindParam(':email', $this->email); 
			$consulta->bindParam(':password', $this->password);
			$consulta->execute();
			$registro = $consulta->fetch();
   
			/* var_dump($consulta); */

			if ($registro) {
			
			/* $_SESSION -- variable global, no la podemos cambiar, solo obtener. igual 
			que _POST, pero esta para seiones y post para formularios sin sesion. */	

				$_SESSION['idUsuario'] = $registro[0]; 
				$_SESSION['nombre'] = $registro[1]; 
				$_SESSION['apellidoPat'] = $registro[2]; 
				$_SESSION['email'] = $registro[3]; 
				$_SESSION['privilegios'] = $registro[4]; 

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
