<?php
/**
 * Clase "Producto_Mdl" procesa y realiza las funciones de agregado,listado,modificación y eliminación interactuando deirectamente con los datos.
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
class Producto_Mdl extends CI_Model{
    function __construct(){
        parent::__construct();
    }
/**
 * La función procesa los datos y ejecuta la consulta de listado de los registros de productos en la base de datos (FrontEnd).
 */
    public function listarProductoFront(){
       $this->db->order_by('id_Producto','DESC');
       $prod = $this->db->get_where('productos','id_Status_Producto = 1');
       return $prod->result();
    }

      public function listarProductos(){
       $this->db->order_by('id_Producto','DESC');
       $prod = $this->db->get_where('productos','id_Status_Producto = 1');
       return $prod->result();
    }

        function porId($id) {
        $this->db->where('id_Producto', $id);
        $productos = $this->db->get('productos');
        foreach ($productos->result() as $producto) {
            $data[] = $producto;
        }
        if ($producto->stock_Producto) {
            $producto->stock_Producto = explode(',', $producto->stock_Producto);
        }
        return $producto;
    }


		 public function getProductos_paginados($por_pagina, $segmento){
		  $sql = $this->db->get_where('productos','id_Status_Producto = 1', $por_pagina, $segmento);
		  if($sql->num_rows() > 0){
		    foreach ($sql->result() as $filas) {
		      $data[] = $filas;
		    }
		    return $data;
		  }
		 }

       public function nuevaVenta($id_Venta, $id_Usuario_Venta, $cantidad_Producto, $total_Venta, $metodo_Pago_Venta, $metodo_Envio_Venta, $fecha_Venta){
        $data= array(
            'id_Venta' => $id_Venta,
            'id_Usuario_Venta' => $id_Usuario_Venta,
            'cantidad_Producto' => $cantidad_Producto,
            'total_Venta' => $total_Venta,
            'metodo_Pago_Venta' => $metodo_Pago_Venta,
            'metodo_Envio_Venta' => $metodo_Envio_Venta,
            'fecha_Venta' => $fecha_Venta
        );
       $valida=$this->db->insert('ventas', $data);
        if($valida){
          //$this->cart->destroy();
          $this->session->set_flashdata('terminada','ternimada');
          redirect('Productos/resumen');
        }
        else{
          $this->session->set_flashdata('fallo', 'fallos');
          $this->load->view('frontend/Procesar_compra');
        }
      }



		 public function totalFilas(){
		  $sql = $this->db->get('productos');
		  return $sql->num_rows();
		 }


		  public function getProductos(){
		   $sql = $this->db->get('productos');
		       return $sql->result();
		 }


}
?>