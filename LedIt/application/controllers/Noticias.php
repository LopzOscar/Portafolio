<?php
/**
 * Clase "Noticias" contiene las funciones de agregado,listado,modificación y eliminación.
 *
 *
 * @category   Class/Controller
 * @package    application
 * @subpackage controllers
 * @copyright  Copyright (c) 2018-2019 Revoltech Inc.
 * @version    Release: 1.0
 * @since      Class available since Release 1.0
 * @deprecated Class deprecated in Release 1.1
 */
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * La clase extiende o hereda de "CI_Controller" el cual servira para interactuar con su módelo.
 */
class Noticias extends CI_Controller {
    function __construct(){
	    parent:: __construct();
	    $this->load->model('Noticias_Mdl');
    }
/**
 * Esta función lista todos los registros de noticias existentes en la base de datos en el lado del FrontEnd.
 */
    public function listarNoticiaFront(){
        $data['noticias'] = $this->Noticia_Mdl->listarNoticiaFront();
        $this->load->view('frontend/template/header'); 
        $this->load->view('frontend/galeria_vw',$data);
        $this->load->view('frontend/template/footer'); 
    }
}
?>
