<?php 
	require_once 'Conexion.php';
	
	class Compra {
		private $idCompra;
		private $folio;
		private $idUsuario;
		private $idPago;
		private $idEnvio;
		private $iva;
		private $subTotal;
		private $total;
		private $numCuenta;
		private $fechaCompra;

		const TABLE = "compras";

		function __construct($idCompra=null, $folio=null, $idUsuario=null, $idPago=null, $idEnvio=null, $iva=null, $subTotal=null, $total=null, $numCuenta=null,$fechaCompra=null) {
			$this->idCompra=$idCompra;
			$this->folio=$folio;
			$this->idUsuario=$idUsuario;
			$this->idPago=$idPago;
			$this->idEnvio=$idEnvio;
			$this->iva=$iva;
			$this->subTotal=$subTotal;
			$this->total=$total;
			$this->numCuenta=$numCuenta;
			$this->fechaCompra=$fechaCompra;
		}


		//GETER's
		public function getIdCompra(){
			return $this->idCompra;
		}

		public function getFolio(){
			return $this->folio;
		}

		public function getIdUsuario(){
			return $this->idUsuario;
		}

		public function getIdPago(){
			return $this->idPago;
		}

		public function getIdEnvio(){
			return $this->idEnvio;
		}

		public function getIva(){
			return $this->iva;
		}

		public function getSubTotal(){
			return $this->subTotal;
		}

		public function getTotal(){
			return $this->total;
		}

		public function getNumCuenta(){
			return $this->numCuenta;
		}

		public function getFechaCompra(){
			return $this->fechaCompra;
		}
		

		//SETER's
		public function setIdCompra($idCompra){
			$this->idCompra=$idCompra;
		}

		public function setFolio($folio){
			$this->folio=$folio;
		}

		public function setIdUsuario($idUsuario){
			$this->idUsuario=$idUsuario;
		}
		
		public function setIdPago($idPago){
			$this->idMPago=$idPago;
		}
		
		public function setIdEnvio($idEnvio){
			$this->idMEnvio=$idEnvio;
		}
		
		public function setIva($iva){
			$this->iva=$iva;
		}
		
		public function setSubTotal($subTotal){
			$this->subTotal=$subTotal;
		}
		
		public function setTotal($total){
			$this->total=$total;
		}
		
		public function setNumCuenta($numCuenta){
			$this->numCuenta=$numCuenta;
		}
		
		public function setFechaCompra($fechaCompra){
			$this->fechaCompra=$fechaCompra;
		}
		

		//METODOS
		public function guardar(){
			$conexion = new Conexion();

			if ($this->idCompra){
				$consulta=$conexion->prepare('UPDATE '.self::TABLE.' SET folio = :folio, idUsuario = :idUsuario, 
					idPago= :idPago, idEenvio = :idEnvio, iva = :iva, subtotal = :subTotal, total = :total, 
					num_cuenta = :numCuenta, fecha_compra = :fechaCompra WHERE idCompra= :idCompra');	
				$consulta->bindParam(':idCompra', $this->idCompra);
				$consulta->bindParam(':folio',$this->folio);
				$consulta->bindParam(':idUsuario',$this->idUsuario);
				$consulta->bindParam(':idPago',$this->idPago);
				$consulta->bindParam(':idEnvio',$this->idEnvio);
				$consulta->bindParam(':iva',$this->iva);
				$consulta->bindParam(':subTotal',$this->subTotal);
				$consulta->bindParam(':total',$this->total);
				$consulta->bindParam(':numCuenta',$this->numCuenta);
				$consulta->bindParam(':fechaCompra',$this->fechaCompra);
				$consulta->execute();
			
			}else{

				$consulta=$conexion->prepare('INSERT INTO '.self::TABLE.' (folio, idUsuario, idMPago, idMEnvio, 
					iva, subtotal, total, num_cuenta, fecha_compra) 
				VALUES (:folio, :idUsuario, :idPago, :idEnvio, :iva, :subTotal, :total, :numCuenta, :fechaCompra)');
		

			$consulta->bindParam(':folio',$this->folio);
			$consulta->bindParam(':idUsuario',$this->idUsuario);
			$consulta->bindParam(':idPago',$this->idPago);
			$consulta->bindParam(':idEnvio',$this->idEnvio);
			$consulta->bindParam(':iva',$this->iva);
			$consulta->bindParam(':subTotal',$this->subTotal);
			$consulta->bindParam(':total',$this->total);
			$consulta->bindParam(':numCuenta',$this->numCuenta);
			$consulta->bindParam(':fechaCompra',$this->fechaCompra);
			$consulta->execute();
			$conexion=null;
		}
	}

		public function eliminar(){

			// echo $this->id;
			$conexion = new Conexion(); 
			$consulta = $conexion->prepare('DELETE FROM ' .self::TABLE. ' WHERE idCompra = :idCompra');
			$consulta->bindParam(':idCompra', $this->idCompra); //this es atributo de la clase  
			$consulta->execute();
			$conexion = null; 

		}

		public static function buscarPorId($idCompra){
			$conexion = new Conexion();

			$consulta=$conexion->prepare('SELECT * FROM '.self::TABLE.' WHERE idCompra = :idCompra');
			$consulta->bindParam(':idCompra',$idCompra);
			$consulta->execute();
			$registro=$consulta->fetch();
			$conexion=null;

			if ($registro){
			   	return new self ($idCompra, $registro['folio'], $registro['idUsuario'], $registro['idPago'], $registro['idEnvio'], $registro['iva'], $registro['subtotal'], $registro['total'], $registro['num_cuenta'], $registro['fecha_compra']);
		    }else{
		    	return false;
		    }
		}

		public static function recuperarTodos(){
			$conexion = new Conexion();

			$consulta=$conexion->prepare('SELECT * FROM '.self::TABLE);
			$consulta->execute();
			$registros=$consulta->fetchAll();
			$conexion=null;
			return $registros;
		}
	}
?>