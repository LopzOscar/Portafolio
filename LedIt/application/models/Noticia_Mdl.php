<?php
/**
 * Clase "Noticia_Mdl" procesa y realiza las funciones de agregado,listado,modificación y eliminación interactuando deirectamente con los datos.
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
class Noticia_Mdl extends CI_Model{
    function __construct(){
        parent::__construct();
    }
/**
 * La función procesa los datos y ejecuta la consulta de listado de los registros de noticias en la base de datos (FrontEnd).
 */
    public function listarNoticiaFront(){
       $this->db->order_by('id_Noticia','DESC');
       $noti = $this->db->get_where('noticias','id_Status_Noticia = 1');
       return $noti->result();
    }
}
?>