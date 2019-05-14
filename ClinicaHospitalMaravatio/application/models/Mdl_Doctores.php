<?php

class Mdl_Doctores extends CI_Model
{

	function __construct(){
		parent::__construct();
	}

	public function registro($idDoctor, $nombre, $apellidoP, $apellidoM,
	$telefono, $direccion, $especialidad, $cedula){
		$data = array(
			'idDoctor' => $idDoctor,
			'nombre' => $nombre,
			'apellidoP' => $apellidoP,
			'apellidoM' => $apellidoM,
			'telefono' => $telefono,
			'direccion' => $direccion,
			'especialidad' => $especialidad,
			'cedula' => $cedula
		);

		$this->db->insert('doctor', $data);

	}

	public function listar(){

		$docs = $this->db->get('doctor');
		return $docs->result();

	}

	public function listarUno($idDoctor){
		$data = array('idDoctor' => $idDoctor);
		$this->db->where($data);
		$docs = $this->db->get('doctor');

		return $docs->result();

	}

	public function modificar($idDoctor, $nombre, $apellidoP, $apellidoM, $telefono, $direccion, $especialidad, $cedula){

		$data = array(

			'nombre' => $nombre,
			'apellidoP' => $apellidoP,
			'apellidoM' => $apellidoM,
			'telefono' => $telefono,
			'direccion' => $direccion,
			'especialidad' => $especialidad,
			'cedula' => $cedula
		);

		$this->db->where("idDoctor = '$idDoctor'");
		$this->db->update('doctor', $data);

	}

	public function eliminar($doc){
		$data = array ('idDoctor' => $doc);
		$this->db->where($data);
		$docs = $this->db->delete('doctor');
	}


}
