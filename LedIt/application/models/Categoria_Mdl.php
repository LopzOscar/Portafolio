<?php
/**
 * Clase "Categoria_Mdl" procesa y realiza las funciones de agregado,listado,modificación y eliminación interactuando deirectamente con los datos.
 *
 *
 * @category   Class/Model
 * @package    application
 * @subpackage models
 * @copyright  Copyright (c) 2018-2019 Revoltech Inc.
 * @version    Release: 1.0
 * @since      Class available since Release 1.0
 * @deprecated Class deprecated in Release 1.1
 */

/**
 * La clase extiende o hereda de "CI_Model" el cual servira para comunicarse con su controlador.
 */
class Categoria_Mdl extends CI_Model{
    function __construct(){
        parent::__construct();
    }
/**
 * La función procesa los datos y ejecuta la consulta de listado de los registros de categorias en la base de datos (FrontEnd).
 */
    public function listarCategoriaFront(){
    	$this->db->order_by('id_Categoria','DESC');
        $cat = $this->db->get_where('categorias','id_Status_Categoria = 1');
        return $cat->result();
    }
}
?>