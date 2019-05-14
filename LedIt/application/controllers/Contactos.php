 <?php
/**
 * Clase "Contacto" contiene las funciones de agregado,listado y eliminación.
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
class Contactos extends CI_Controller {
    function __construct(){
        parent:: __construct();
        $this->load->model('Contacto_Mdl');
    }
/**
 * La función agrega un nuevo registro de contactos a la base de datos, es el que recibe los datos desde el formulario de la parte del FrontEnd.
 */


    public function nuevoContacto(){
        $id_Contacto = $this->input->POST('id_Contacto');
        $nombre_Contacto = $this->input->POST('nombre_Contacto');
        $telefono_Contacto = $this->input->POST('telefono_Contacto');
        $email_Contacto = $this->input->POST('email_Contacto');
        $mensaje_Contacto = $this->input->POST('mensaje_Contacto');
        $fecha_Contacto = $this->input->POST('fecha_Contacto');
        $this->Contacto_Mdl->nuevoContacto($id_Contacto, $nombre_Contacto, $telefono_Contacto, $email_Contacto, $mensaje_Contacto, $fecha_Contacto);
       
    }

/**
 * Esta función lista todos los registros de contactos existentes en la base de datos en el lado del BackEnd.
 */ 
    public function listarContacto(){
        $data['contactos'] = $this->Contacto_Mdl->listarContacto();
        $this->load->view('admin/backend/template/header');  
        $this->load->view('admin/backend/contactos/listar_vw',$data);
        $this->load->view('admin/backend/template/footer'); 
    }
/**
 * Esta función elimina un registro seleccionado de contactos.
 */
    public function eliminarContacto($c){        
        $this->Contacto_Mdl->eliminarContacto($c);
        redirect('Contactos/listarContacto');
    }
}
?>