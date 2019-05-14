<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pdfs2_model extends CI_Model{

 	function getUsuarios(){
   		$this->db->from('categorias');
   		$this->db->order_by("nombre_Categoria");
   		$query = $this->db->get();
   		return $query->result();
 	}
}
