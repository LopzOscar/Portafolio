<?php
/**
 * Clase "Usuario" contiene las funciones de agregado,listado,modificación y eliminación.
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
class Usuario extends CI_Controller {
    function __construct(){
	    parent:: __construct();
        $this->load->helper('url');
	      $this->load->model('Usuario_Mdl');
        $this->load->library('session');
}
/**
 * La función permite el acceso para administrar el sitio, en el cual se verifica el usUario y contraseña, los cuales se obtinen del formulario de login para capturar los campos.
 */
public function registrarUsuario(){

  $this->Usuario_Mdl->setNombreUsuario($this->input->post('nombre_Usuario'));
  $this->Usuario_Mdl->setApellidoPaterno($this->input->post('apellido_Paterno_Usuario'));
  $this->Usuario_Mdl->setApellidoMaterno($this->input->post('apellido_Materno_Usuario'));
  $this->Usuario_Mdl->setCalleUsuario($this->input->post('calle_Usuario'));
  $this->Usuario_Mdl->setNumeroInterior($this->input->post('numero_Interior_Usuario'));
  $this->Usuario_Mdl->setNumeroExterior($this->input->post('numero_Exterior_Usuario'));
  $this->Usuario_Mdl->setTelefonoUsuario($this->input->post('telefono_Usuario'));
  $this->Usuario_Mdl->setCorreoUsuario($this->input->post('correo_Usuario'));
  $this->Usuario_Mdl->setPassword($this->input->post('password'));
  $this->Usuario_Mdl->setIdPrivilegiosUsuario($this->input->post('id_Privilegios_Usuario'));
  $this->Usuario_Mdl->setIdStatusUsuario($this->input->post('id_Status_Usuario'));

  $verificarEmail = $this->Usuario_Mdl->verificarEmail($this->Usuario_Mdl->getCorreoUsuario());

    if($verificarEmail){
      $this->Usuario_Mdl->registrarUsuario();
      $this->session->set_flashdata('registro_exitoso', 'exitoso');
      redirect('Admin/index/11');
    }
    else{
      $this->session->set_flashdata('registro_fallo', 'fallo');
      redirect('Admin/index/10');
    }
}
/**
 * La función permite el acceso para administrar el sitio, en el cual se verifica el usUario y contraseña, los cuales se obtinen del formulario de login para capturar los campos.
 */

public function login(){
  $loginUsuario=array(
  'correo_Usuario'=>$this->input->POST('correo_Usuario'),
  'password'=>$this->input->POST('password')
  );

  $data=$this->Usuario_Mdl->login($loginUsuario['correo_Usuario'],$loginUsuario['password']);

      if($data)
      {
        $this->session->set_userdata('id',$data['id_Usuario']);
        $this->session->set_userdata('correo',$data['correo_Usuario']);
        $this->session->set_userdata('nombre',$data['nombre_Usuario']);
        $this->session->set_userdata('perfil',$data['imagen_Usuario']);
        $this->session->set_userdata('usuario',$data['id_Privilegios_Usuario']);
        $this->session->set_userdata('telefono',$data['telefono_Usuario']);
        redirect('Admin/index/14');
      }

      else{
        $this->session->set_flashdata('error_msg', 'Usuario incorrecto, intenta de nuevo');
        redirect('Admin/index/1');
      }
}


public function loginCliente(){
  $loginUsuario=array(
  'correo_Usuario'=>$this->input->POST('correo_Usuario'),
  'password'=>$this->input->POST('password')
  );

  $data=$this->Usuario_Mdl->loginCliente($loginUsuario['correo_Usuario'],$loginUsuario['password']);

      if($data)
      {
        $this->session->set_userdata('id',$data['id_Usuario']);
        $this->session->set_userdata('correo',$data['correo_Usuario']);
        $this->session->set_userdata('nombre',$data['nombre_Usuario']);
        $this->session->set_userdata('perfil',$data['imagen_Usuario']);
        $this->session->set_userdata('usuario',$data['id_Privilegios_Usuario']);
        $this->session->set_userdata('apellidoP',$data['apellido_Paterno_Usuario']);
        $this->session->set_userdata('apellidoM',$data['apellido_Materno_Usuario']);
        $this->session->set_userdata('telefono',$data['telefono_Usuario']);
        $this->session->set_userdata('calle',$data['calle_Usuario']);
        $this->session->set_userdata('numeroI',$data['numero_Interior_Usuario']);
        $this->session->set_userdata('postal',$data['numero_Exterior_Usuario']);
        
        redirect('ControlFrontEnd/index/1');
      }

      else{
        $this->session->set_flashdata('login_fallo', 'fallo login');
        redirect('Admin/index/11');
      }
}

/**
 * La función ejecuta el cierre de la sesión borrando los datos de la misma.
 */
    public function logout(){
        $this->session->sess_destroy() ;
        redirect('Admin');
    }

       public function logoutCliente(){
        $this->session->sess_destroy() ;
        redirect('ControlFrontEnd/index/1');
    }
}
?>