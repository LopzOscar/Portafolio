<?php
/**
 * Clase "Productos" contiene las funciones de agregado,listado,modificación y eliminación.
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
class Productos extends CI_Controller {
    function __construct(){
	    parent:: __construct();
      $this->load->helper('url');
      $this->load->model('Usuario_Mdl');
      $this->load->model('Producto_Mdl');
      $this->load->library('session');
    }


/**
 * Esta función lista todos los registros de productos existentes en la base de datos en el lado del FrontEnd.
 */
 function mostrarCarrito() {
    $data['contenido'] = 'carrito';
    $data['title'] = 'Carrito de Compras';
    $this->load->view('frontend/carrito_vw',$data);
  }

  public function Procesar(){
  $this->load->view('frontend/Procesar_compra');
  }


  public function resumen(){
  $this->load->view('frontend/resumen_venta');
}

  public function cart(){
   $this->load->view('frontend/carrito_vw');
  }

  function updateCart() {
    $data = $this->input->post();
    $this->cart->update($data);
    redirect('carrito');

  }

  public function delete() {
    $this->cart->destroy();
    redirect('carrito');

    }

  public function remove($rowid){
    $this->cart->update(array('rowid' => $rowid, 'qty' => 0));
    redirect('carrito');
    }


  function eliminarProd($rowid) 
    {
        //para eliminar un producto en especifico lo que hacemos es conseguir su id
        //y actualizarlo poniendo qty que es la cantidad a 0
        $producto = array(
            'rowid' => $rowid,
            'qty' => 0
        );
        //después simplemente utilizamos la función update de la librería cart
        //para actualizar el carrito pasando el array a actualizar
        $this->cart->update($producto);
        $this->session->set_flashdata('productoEliminado', 'El producto fue eliminado correctamente');
        redirect('ControlFrontEnd/carrito', 'refresh');
    }


   /* elimina el carrito de compras*/   
  function eliminarCarrito() {
        $this->cart->destroy();
        $this->session->set_flashdata('destruido', 'El carrito fue eliminado correctamente');
        redirect('ControlFrontEnd/index/10', 'refresh');
    }


      function terminarVenta() {
        $this->cart->destroy();
        $this->session->set_flashdata('terminado', 'El carrito fue eliminado correctamente');
        redirect('ControlFrontEnd/index/10', 'refresh');
    }


/*Agrega un porducto a carrito de compras*/




  

  function agregarProducto()
    {

                $id = $this->input->post('id');
                $producto = $this->Producto_Mdl->porId($id);
                $cantidad = 1;
                $carrito = $this->cart->contents();
         
                foreach ($carrito as $item) {
                   
                          }
             
                $insert = array(
                    'id' => $id,
                    'qty' => $cantidad,
                    'price' => $producto->precio_Producto,
                    'name' => $producto->nombre_Producto,
                    'img' => $producto->imagen_Producto
                );
               $id=$this->session->userdata('id');
               $usuario=$this->session->userdata('usuario');
               if(!$id || $usuario!=4) {
                  redirect('Admin/index/11');
               }else{
                $this->cart->insert($insert);
               }
               
                $uri = $this->input->post('uri');
                $this->session->set_flashdata('agregado', 'El producto fue agregado correctamente');
                redirect('ControlFrontEnd/index/'.$uri);
    }  


   public function nuevaVenta(){
        $id_Venta = $this->input->POST('id_Venta');
        $id_Usuario_Venta = $this->input->POST('id_Usuario_Venta');
        $cantidad_Venta = $this->input->POST('cantidad_Venta');
        $total_Venta = $this->input->POST('total_Venta');
        $metodo_Pago_Venta = $this->input->POST('metodo_Pago_Venta');
        $metodo_Envio_Venta= $this->input->POST('metodo_Envio_Venta');
        $fecha_Venta= $this->input->POST('fecha_Venta');
        $this->Producto_Mdl->nuevaVenta($id_Venta, $id_Usuario_Venta, $cantidad_Venta, $total_Venta, $metodo_Pago_Venta, $metodo_Envio_Venta, $fecha_Venta);
       
    }

}
?>
