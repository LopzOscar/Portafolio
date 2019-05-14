<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pdfs1_model extends CI_Model{

 	function getUsuarios(){
   		$this->db->from('usuarios');
   		$this->db->order_by("nombre_Usuario");
   		$query = $this->db->get();
   		return $query->result();
 	}
}
