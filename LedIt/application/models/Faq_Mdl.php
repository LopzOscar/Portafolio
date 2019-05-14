<?php
/**
 * Clase "Faq_Mdl" procesa y realiza las funciones de agregado,listado,modificación y eliminación interactuando deirectamente con los datos.
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
class Faq_Mdl extends CI_Model{
    function __construct(){
        parent::__construct();
    }
/**
 * La función procesa los datos y ejecuta la consulta de listado de los registros de faqs en la base de datos (FrontEnd).
 */
    public function listarFaqFront(){
    	$this->db->order_by('id_Faq','DESC');
        $faq = $this->db->get_where('faqs','id_Status_Faq = 1');
        return $faq->result();
    }
/**
 * La función solicita y muestra los datos de un registro seleccionado de faqs ubicandolo por medio del campo "id_Faq".
 */
}
?>