<?php
/**
 * Clase "Usuario_Mdl" procesa y realiza las funciones de agregado,listado,modificación y eliminación interactuando deirectamente con los datos.
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
class Usuario_Mdl extends CI_Model{

  private $id_Usuario;
  private $nombre_Usuario;
  private $apellido_Paterno_Usuario;
  private $apelldio_Materno_Usuario;
  private $calle_Usuario;
  private $numero_Interior_Usuario;
  private $numero_Exterior_Usuario;
  private $telefono_Usuario;
  private $correo_Usuario;
  private $password;
  private $id_Privilegios_Usuario;
  private $id_Status_Usuario;

    function __construct($id_Usuario=null, $nombre_Usuario=null, $apellido_Paterno_Usuario=null, $apelldio_Materno_Usuario=null, $calle_Usuario=null, $numero_Interior_Usuario=null, $numero_Exterior_Usuario=null, $telefono_Usuario=null, $correo_Usuario=null, $password=null, $id_Privilegios_Usuario=null, $id_Status_Usuario=null){
    $this->id_Usuario = $id_Usuario;
    $this->nombre_Usuario = $nombre_Usuario;
    $this->apellido_Paterno_Usuario = $apellido_Paterno_Usuario;
    $this->apelldio_Materno_Usuario = $apelldio_Materno_Usuario;
    $this->calle_Usuario = $calle_Usuario;
    $this->numero_Interior_Usuario = $numero_Interior_Usuario;
    $this->numero_Exterior_Usuario = $numero_Interior_Usuario;
    $this->telefono_Usuario = $telefono_Usuario;
    $this->correo_Usuario = $correo_Usuario;
    $this->password = $password;
    $this->id_Privilegios_Usuario = $id_Privilegios_Usuario;
    $this->id_Status_Usuario = $id_Status_Usuario;
    }


public function getIdUsuario(){
  return $this->id_Usuario;
}
public function setIdUsuario($id_Usuario){
  $this->id_Usuario = $id_Usuario;
}


public function getNombreUsuario(){
  return $this->nombre_Usuario;
}
public function setNombreUsuario($nombre_Usuario){
  $this->nombre_Usuario = $nombre_Usuario;
}


public function getApelldioPaterno(){
  return $this->apellido_Paterno_Usuario;
}
public function setApellidoPaterno($apellido_Paterno_Usuario){
  $this->apellido_Paterno_Usuario = $apellido_Paterno_Usuario;
}


public function getApellidoMaterno(){
  return $this->apelldio_Materno_Usuario;
}
public function setApellidoMaterno($apelldio_Materno_Usuario){
  $this->apelldio_Materno_Usuario = $apelldio_Materno_Usuario;
}

public function getCalleUsuario(){
  return $this->calle_Usuario;
}
public function setCalleUsuario($calle_Usuario){
  $this->calle_Usuario = $calle_Usuario;
}


public function getNumeroInterior(){
  return $this->numero_Interior_Usuario;
}
public function setNumeroInterior($numero_Interior_Usuario){
  $this->numero_Interior_Usuario = $numero_Interior_Usuario;
}


public function getNumeroExterior(){
  return $this->numero_Exterior_Usuario;
}
public function setNumeroExterior($numero_Exterior_Usuario){
  $this->numero_Exterior_Usuario = $numero_Exterior_Usuario;
}


public function getTelefonoUsuario(){
  return $this->telefono_Usuario;
}
public function setTelefonoUsuario($telefono_Usuario){
  $this->telefono_Usuario = $telefono_Usuario;
}


public function getCorreoUsuario(){
  return $this->correo_Usuario;
}
public function setCorreoUsuario($correo_Usuario){
  $this->correo_Usuario = $correo_Usuario;
}


public function getPassword(){
  return $this->password;
}
public function setPassword($password){
  $this->password = $password;
}


public function getIdPrivilegiosUsuario(){
  return $this->id_Privilegios_Usuario;
}
public function setIdPrivilegiosUsuario($id_Privilegios_Usuario){
  $this->id_Privilegios_Usuario = $id_Privilegios_Usuario;
}


public function getIdStatusUsuario(){
  return $this->id_Status_Usuario;
}
public function setIdStatusUsuario($id_Status_Usuario){
  $this->id_Status_Usuario = $id_Status_Usuario;
}



/**
 * La función valida los datos ingresados en el formulario de login para conceder o denegar el acceso a la parte de administrador del sitio.
 */ 

public function registrarUsuario(){
$this->db->set('id_Usuario',0);
$this->db->set('nombre_Usuario',$this->nombre_Usuario);
$this->db->set('apellido_Paterno_Usuario',$this->apellido_Paterno_Usuario);
$this->db->set('apellido_Materno_Usuario',$this->apelldio_Materno_Usuario);
$this->db->set('calle_Usuario',$this->calle_Usuario);
$this->db->set('numero_Interior_Usuario',$this->numero_Interior_Usuario);
$this->db->set('numero_Exterior_Usuario',$this->numero_Exterior_Usuario);
$this->db->set('telefono_Usuario',$this->telefono_Usuario);
$this->db->set('correo_Usuario',$this->correo_Usuario);
$this->db->set('password',$this->password);
$this->db->set('id_Privilegios_Usuario',$this->id_Privilegios_Usuario);
$this->db->set('id_Status_Usuario',$this->id_Status_Usuario);
$this->db->insert('usuarios');
}


public function login($correo, $password){
$data = array(
'correo_Usuario' => $correo,
'password' =>$password
);

  $this->db->where($data);
  if($query=$this->db->get_where('usuarios','id_Status_Usuario = 1  AND id_Privilegios_Usuario!=4'))
  {
      return $query->row_array();
  }
  else{
    return false;
  }
}


public function loginCliente($correo, $password){
$data = array(
'correo_Usuario' => $correo,
'password' =>$password
);

  $this->db->where($data);
  if($query=$this->db->get_where('usuarios','id_Status_Usuario = 1 AND id_Privilegios_Usuario = 4'))
  {
      return $query->row_array();
  }
  else{
    return false;
  }
}


public function verificarEmail($email){
  $this->db->select('*');
  $this->db->from('usuarios');
  $this->db->where('correo_Usuario',$email);
  $query=$this->db->get();

  if($query->num_rows()>0){
    return false;
  }else{
    return true;
  }

}



}
?>