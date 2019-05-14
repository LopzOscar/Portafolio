<?php 

require_once 'Conexion.php';

class Usuario{

	private $idUsuario;
	private $nombre;
	
	private $email; 
	private $password;
	
	private $estatus; 
	private $privilegios; 

	const TABLA = "usuarios"; 

	public function __construct($nombre=null, $email=null, $password=null, $estatus=null, $privilegios=null, $idUsuario=null) {

		$this->nombre = $nombre;
		
		$this->email = $email;
		$this->password = $password;
		
		$this->estatus = $estatus;
		$this->privilegios = $privilegios;
		$this->idUsuario = $idUsuario;
	} 

	//GETER'S

	public function getNombre(){
	return $this->nombre; 	
	}

	
	public function getEmail(){
	return $this->email; 	
	}

	public function getPassword(){
	return $this->password; 	
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
	
	public function setEmail($email){
		$this->email = $email; 
	}

	public function setPassword($password){
		$this->password = $password; 
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
				email = :email,	password = :password, estatus = :estatus, privilegios = :privilegios WHERE idUsuario = :idUsuario'); 
			$consulta->bindParam(':idUsuario', $this->idUsuario);
			$consulta->bindParam(':nombre', $this->nombre);
			
			$consulta->bindParam(':email', $this->email);
			$consulta->bindParam(':password', $this->password);
			
			$consulta->bindParam(':estatus', $this->estatus);
			$consulta->bindParam(':privilegios', $this->privilegios);
			$consulta->execute();

			/* el prepare recibe la accion a realizar sea actualizacion - edicion etc.*/
			
			/* .self:: hace referencia a una constante */

		}else{

		$consulta = $conexion->prepare('INSERT INTO ' .self::TABLA. ' (nombre, email, 
			password, estatus, privilegios) 
		value (:nombre, :email, :password, :estatus, :privilegios)'); 
				
			$consulta->bindParam(':nombre', $this->nombre);
			
			$consulta->bindParam(':email', $this->email);
			$consulta->bindParam(':password', $this->password);
			
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
		$consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' WHERE idUsuario = :idUsuario');
		$consulta->bindParam(':idUsuario', $idUsuario); 
		$consulta->execute(); 
		$registro = $consulta->fetch();
		//print_r($registro); 
		$conexion = null; 
		if ($registro) {

		 	return new self($registro['nombre'], $registro['email'], $registro['password'], $registro['estatus'], $registro['privilegios'], $idUsuario); 

		 } else {
		 	return false; 
		 }

	}

	public static function recuperarTodos(){
		$conexion = new Conexion();
		$consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA .' WHERE idUsuario !=1');
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