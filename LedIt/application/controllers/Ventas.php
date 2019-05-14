<?php
/**
 * Clase "DetalleVenta" se ecnuentra en proceso de desarrollo.
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
class Ventas extends CI_Controller {
    function __construct(){
        parent:: __construct();
        $this->load->model('Ventas_Mdl');
    }
}
?>