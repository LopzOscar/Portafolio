
<?php
/**
 * Clase "Contacto_Mdl" procesa y realiza las funciones de agregado,listado,modificación y eliminación interactuando deirectamente con los datos.
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
class Contacto_Mdl extends CI_Model{
    function __construct(){
        parent::__construct();
    }
/**
 * La función procesa los datos y ejecuta la consulta de agregado de un contacto en la base de datos.
 */
    public function nuevoContacto($id_Contacto, $nombre_Contacto, $telefono_Contacto, $email_Contacto, $mensaje_Contacto, $fecha_Contacto){
        $data= array(
            'id_Contacto' => $id_Contacto,
            'nombre_Contacto' => $nombre_Contacto,
            'telefono_Contacto' => $telefono_Contacto,
            'email_Contacto' => $email_Contacto,
            'mensaje_Contacto' => $mensaje_Contacto,
            'fecha_Contacto' => $fecha_Contacto
        );
       $valida=$this->db->insert('contactos', $data);
        if($valida){

          $this->session->set_flashdata('exitoso', 'exitosos');
          redirect('ControlFrontEnd/index/6');
        }
        else{
          $this->session->set_flashdata('fallo', 'fallos');
          redirect('ControlFrontEnd/index/6');
        }
}
  
 
/**
 * La función procesa los datos y ejecuta la consulta de listado de los registros de cantactos en la base de datos (BackEnd).
 */

    public function redireccionar(){
      redirect('ControlFrontEnd/index/6');
    }

    public function listarContacto(){
        $this->db->order_by('id_Contacto','DESC');
          $cont = $this->db->get('contactos');
          return $cont->result();
    }
/**
 * La función elimina un registro seleccionado de contactos ubicandolo por medio del campo "id_Contacto".
 */
    public function eliminarContacto($c){
        $data = array('id_Contacto'=>$c);
        $this->db->where($data);
        $c = $this->db->delete('contactos');
    }
}
?>