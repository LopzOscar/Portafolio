<?php

class Doctores extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('mdl_Doctores');
}

	public function index(){
		$this->load->view('Doctores/vw_home');
	}

	public function frmRegistro(){
		$this->load->view('Doctores/vw_registro');
	}

	public function registro(){
		$idDoctor = $this->input->post('idDoctor');
		$nombre = $this->input->post('nombre');
		$apellidoP = $this->input->post('apellidoP');
		$apellidoM = $this->input->post('apellidoM');
		$telefono = $this->input->post('telefono');
		$direccion = $this->input->post('direccion');
		$especialidad = $this->input->post('especialidad');
		$cedula = $this->input->post('cedula');

		$this->mdl_Doctores->registro($idDoctor, $nombre, $apellidoP, $apellidoM, $telefono, $direccion, $especialidad, $cedula);
		redirect('Doctores/listar');
		//$this->listar();

	}

	public function listar(){
		$data['doctores'] = $this->mdl_Doctores->listar();
		$this->load->view('Doctores/vw_listar',$data);

	}

	public function frmModificar($doc){
		$data['doctores'] = $this->mdl_Doctores->listarUno($doc);
		$this->load->view('Doctores/vw_modificar', $data);

	}

	public function modificar(){
		//$old_doc = $this->input->POST('old_doc');

		$idDoctor = $this->input->POST('idDoctor');
		$nombre = $this->input->POST('nombre');
		$apellidoP = $this->input->POST('apellidoP');
		$apellidoM = $this->input->POST('apellidoM');
		$telefono = $this->input->POST('telefono');
		$direccion = $this->input->POST('direccion');
		$especialidad = $this->input->POST('especialidad');
		$cedula = $this->input->POST('cedula');

		$this->mdl_Doctores->modificar($idDoctor, $nombre, $apellidoP, $apellidoM, $telefono, $direccion,
		$especialidad, $cedula);
		  redirect('Doctores/listar');
        //$this->listar();

	}

	public function eliminar($doc){
		$this->mdl_Doctores->eliminar($doc);
		$this->listar();
	}





}
