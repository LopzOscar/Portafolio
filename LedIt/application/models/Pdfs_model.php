<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pdfs_model extends CI_Model{

 	function getUsuarios(){
   		$this->db->from('productos');
   		$this->db->order_by("nombre_Producto");
   		$query = $this->db->get();
   		return $query->result();
 	}
}
