<?php

class Conexion extends PDO{

	private $db_type= 'mysql';
	private $host= 'localhost';
	private $db_name= 'proyectodimas';
	private $user= 'root';
	private $pass= '';


	public function __construct(){
      //sobreescribe el metodo constructor de la clase 
		try{
			parent::__construct($this->db_type . ':host=' . $this->host . ';dbname=' . $this->db_name, $this->user, $this->pass);
		}catch(PDOExepton $e){
			echo 'Ha sugido un error y no puede conectarse a la base de datos. Detalle:' . $e->getMessage();
		}
		
	}

}