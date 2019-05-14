<?php
/**
 * Clase "controlBackEnd" controla accesos y navegación entre las diferentes vistas del lado del BackEnd.
 *
 *
 * @category   Class/Controller
 * @package    application
 * @subpackage controllers
 * @copyright  Copyright (c) 2018-2019 Revoltech Inc.
 * @version    Release1.0
 * @since      Class available since Release 1.0
 * @deprecated Class deprecated in Release 1.1
 */
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * La clase extiende o hereda de "CI_Controller" el cual servira para interactuar con los modelos.
 */
class Admin extends CI_Controller {
    function __construct(){
        parent:: __construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('grocery_CRUD');
        $this->load->model('Grocery_crud_model');
        $this->load->model('Contacto_Mdl');
        $this->load->model('Usuario_Mdl');


    }
/**
 * Función que ayuda a navegar entre las views del BackEnd.
 */

	public function index($option = 1)
	{
		Switch ($option){
		    case 1:
			    $this->load->view('admin/backend/login_vw');
			    break;

			case 2:
			    $this->load->view('admin/backend/template/header');
			    $this->load->view('admin/backend/inicio_vw');
			    $this->load->view('admin/backend/template/footer');
			    break;    

		    case 3:
		        $galeria = new grocery_CRUD();
		        $galeria->set_theme('bootstrap-v4');
		        $galeria->set_table('galeria');
		        $galeria->order_by('id_Galeria','DESC');
		        $galeria->set_relation('id_Usuario_Galeria','usuarios','nombre_Usuario');
		        $galeria->set_relation('id_Status_Galeria','status','status');
		        $galeria->required_fields('id_Usuario_Galeria','titulo_Galeria','imagen_Galeria','id_Status_Galeria');
		        $usuario=$this->session->userdata('usuario');
		        if ($usuario==3) {
		        	$galeria->unset_delete('galeria');
		        }
		        $galeria->callback_add_field('id_Usuario_Galeria', function () {
		        $id=$this->session->userdata('id');
		        $nombre=$this->session->userdata('nombre');
		        $correo=$this->session->userdata('correo');
		        return "<label style='color:green; font-size:14px;'>(Sesión actual:&nbsp;&nbsp;$nombre-$correo)
		        		</label><input hidden type='text' maxlength='50' value='$id' name='id_Usuario_Galeria'>";});
		        $galeria->callback_edit_field('id_Usuario_Galeria', function () {
		        $id=$this->session->userdata('id');
		        $nombre=$this->session->userdata('nombre');
		        $correo=$this->session->userdata('correo');
		        return "<label style='color:green; font-size:14px;'>(Sesión que actualiza:&nbsp;&nbsp;$nombre-$correo)
		        		</label><input hidden type='text' maxlength='50' value='$id' name='id_Usuario_Galeria'>";});
		        $galeria->set_field_upload('imagen_Galeria','libraries/libraries-backend/images/thumbnails/galeria');
		        $galeria->display_as('id_Usuario_Galeria','Usuario que registró');
		        $galeria->display_as('titulo_Galeria','Título de imagen');
		        $galeria->display_as('imagen_Galeria','Imagen ');
		        $galeria->display_as('id_Status_Galeria','Estatus');
		        $galerias = $galeria->render();
		        $this->load->view('admin/backend/template/header');
		        $this->load->view('admin/backend/galeria/listar_vw',(array)$galerias);
		        $this->load->view('admin/backend/template/footer-grocery');
		        break;

			case 4:
				$faq = new grocery_CRUD();
				$faq->set_theme('bootstrap-v4');
		        $faq->set_table('faqs');
		        $faq->order_by('id_Faq','DESC');
		        $faq->set_relation('id_Usuario_Faq','usuarios','correo_Usuario');
		        $faq->set_relation('id_Status_Faq','status','status');
		        $faq->required_fields('id_Usuario_Faq','pregunta_Faq','respuesta_Faq','id_Status_Faq');
		        $usuario=$this->session->userdata('usuario');
		        if ($usuario==3) {
		        	$faq->unset_delete('faqs');
		        }
		        $faq->callback_add_field('id_Usuario_Faq', function () {
		        $id=$this->session->userdata('id');
		        $nombre=$this->session->userdata('nombre');
		        $correo=$this->session->userdata('correo');
		        return "<label style='color:green; font-size:14px;'>(Sesión actual:&nbsp;&nbsp;$nombre-$correo)
		        		</label><input hidden type='text' maxlength='50' value='$id' name='id_Usuario_Faq'>";});
		        $faq->callback_edit_field('id_Usuario_Faq', function () {
		        $id=$this->session->userdata('id');
		        $nombre=$this->session->userdata('nombre');
		        $correo=$this->session->userdata('correo');
		        return "<label style='color:green; font-size:14px;'>(Sesión que actualiza:&nbsp;&nbsp;$nombre-$correo)</label>
		        		<input hidden type='text' maxlength='50' value='$id' name='id_Usuario_Faq'>";});
		        $faq->display_as('id_Usuario_Faq','Usuario que registró');
		        $faq->display_as('pregunta_Faq','Pregunta');
		        $faq->display_as('respuesta_Faq','Respuesta');
		        $faq->display_as('id_Status_Faq','Estatus');
		        $faqs = $faq->render();
		        $this->load->view('admin/backend/template/header');
		        $this->load->view('admin/backend/faqs/listar_vw',(array)$faqs);
		        $this->load->view('admin/backend/template/footer-grocery');
		        break;
		    

		    case 5:
			    $noticia = new grocery_CRUD();
				$noticia->set_theme('bootstrap-v4');
		        $noticia->set_table('noticias');
		        $noticia->order_by('id_Noticia','DESC');
		        $noticia->set_relation('id_Usuario_Noticia','usuarios','nombre_Usuario');
		        $noticia->set_relation('id_Status_Noticia','status','status');
		        $noticia->required_fields('id_Usuario_Noticia','titulo_Noticia','imagen_Noticia','descripcion_Corta_Noticia','descripcion_Larga_Noticia','fecha_Noticia','id_Status_Noticia');
		        $usuario=$this->session->userdata('usuario');
		        if ($usuario==3) {
		        	$noticia->unset_delete('noticias');
		        }
		        $noticia->callback_add_field('fecha_Noticia', function () {
		        $fecha=date('d-m-Y');
		        return "<label style='color:green; font-size:14px;'>(Hoy &nbsp;&nbsp;$fecha)
		        		</label><input hidden type='text' maxlength='50' value='$fecha' name='fecha_Noticia'>";});
		        $noticia->callback_add_field('id_Usuario_Noticia', function () {
		        $id=$this->session->userdata('id');
		        $nombre=$this->session->userdata('nombre');
		        $correo=$this->session->userdata('correo');
		        return "<label style='color:green; font-size:14px;'>(Sesión actual:&nbsp;&nbsp;$nombre-$correo)
		        		</label><input hidden type='text' maxlength='50' value='$id' name='id_Usuario_Noticia'>";});
		        $noticia->callback_edit_field('id_Usuario_Noticia', function () {
		        $id=$this->session->userdata('id');
		        $nombre=$this->session->userdata('nombre');
		        $correo=$this->session->userdata('correo');
		        return "<label style='color:green; font-size:14px;'>(Sesión que actualiza:&nbsp;&nbsp;$nombre-$correo)
		        		</label><input hidden type='text' maxlength='50' value='$id' name='id_Usuario_Noticia'>";});
		        $noticia->set_field_upload('imagen_Noticia','libraries/libraries-backend/images/thumbnails/noticias');
		        $noticia->display_as('id_Usuario_Noticia','Usuario que registró');
		        $noticia->display_as('titulo_Noticia','Título de noticia');
		        $noticia->display_as('imagen_Noticia','Imagen ');
		        $noticia->display_as('descripcion_Corta_Noticia','Descripción breve');
		        $noticia->display_as('descripcion_Larga_Noticia','Descripción completa');
		        $noticia->display_as('fecha_Noticia','Fecha de publicación');
		        $noticia->display_as('id_Status_Noticia','Estatus');
		        $noticias = $noticia->render();
		        $this->load->view('admin/backend/template/header');
		        $this->load->view('admin/backend/noticias/listar_vw',(array)$noticias);
		        $this->load->view('admin/backend/template/footer-grocery');
		        break;


		    case 6:
			    $usuario = new grocery_CRUD();
				$usuario->set_theme('bootstrap-v4');
		        $usuario->set_table('usuarios');
		        $usuario->where('id_Privilegios_Usuario = "2"');
		        $usuario->or_where('id_Privilegios_Usuario = "3"');
		        $usuario->order_by('id_Privilegios_Usuario','ASC');
		        $usuario->set_relation('id_Status_Usuario','status','status');
		        $usuario->set_relation('id_Privilegios_Usuario','privilegios','privilegio');
		        $usuario->required_fields('nombre_Usuario','apellido_Paterno_Usuario','apellido_Materno_Usuario','estado_Usuario','ciudad_Usuario','calle_Usuario','numero_Interior_Usuario','numero_Exterior_Usuario','telefono_Usuario','correo_Usuario','password','id_Privilegios_Usuario','id_Status_Usuario');
		        $usuario->set_field_upload('imagen_Usuario','libraries/libraries-backend/images/thumbnails/usuarios');
		        $usuario->callback_add_field('correo_Usuario', function () {
		        return "<input class='form-control' type='email' maxlength='300' name='correo_Usuario'>";});
		        $usuario->field_type('password','password');
		       	$usuario->columns('imagen_Usuario','nombre_Usuario','apellido_Paterno_Usuario','apellido_Materno_Usuario','estado_Usuario','ciudad_Usuario','calle_Usuario','numero_Interior_Usuario','numero_Exterior_Usuario','telefono_Usuario','correo_Usuario','id_Privilegios_Usuario','id_Status_Usuario');
		        $usuario->display_as('imagen_Usuario','Avatar');
		        $usuario->display_as('nombre_Usuario','Nombre');
		        $usuario->display_as('apellido_Paterno_Usuario','Apellido paterno');
		        $usuario->display_as('apellido_Materno_Usuario','Apellido materno');
		        $usuario->display_as('estado_Usuario','Estado de residencia');
		        $usuario->display_as('ciudad_Usuario','Ciudad de residencia');
		        $usuario->display_as('calle_Usuario','Calle');
		        $usuario->display_as('numero_Interior_Usuario','No. Interior');
		        $usuario->display_as('numero_Exterior_Usuario','No. Exterior');
		        $usuario->display_as('telefono_Usuario','Teléfono');
		        $usuario->display_as('correo_Usuario','Email');
		        $usuario->display_as('password','Contraseña');
		        $usuario->display_as('id_Privilegios_Usuario','Tipo de usuario');
		        $usuario->display_as('id_Status_Usuario','Estatus');
		        $usuarios = $usuario->render();
		        $this->load->view('admin/backend/template/header');
		        $this->load->view('admin/backend/usuarios/listar_vw',(array)$usuarios);
		        $this->load->view('admin/backend/template/footer-grocery');
		        break;

		    case 7:
			    $producto = new grocery_CRUD();
				$producto->set_theme('bootstrap-v4');
		        $producto->set_table('productos');

		        $producto->order_by('id_Producto','DESC');
		        $producto->set_relation('id_Usuario_Producto','usuarios','nombre_Usuario');
		        $producto->set_relation('id_Categoria_Producto','categorias','nombre_Categoria');
		 		$producto->set_relation('id_Status_Producto','status','status');
		 		$producto->field_type('precio_Producto','number');
		        $producto->required_fields('id_Usuario_Producto','id_Categoria_Producto','imagen_Producto','modelo_Producto','nombre_Producto','potencia_Producto','voltaje_Producto','color_Luz_Producto','flujo_Luminoso_Producto','material_Producto','precio_Producto','stock_Producto','id_Status_Producto');
		        $usuario=$this->session->userdata('usuario');
		        if ($usuario==3) {
		        	$producto->unset_delete('productos');
		        }
		        $producto->callback_add_field('id_Usuario_Producto', function () {
		        $id=$this->session->userdata('id');
		        $nombre=$this->session->userdata('nombre');
		        $correo=$this->session->userdata('correo');
		        return "<label style='color:green; font-size:14px;'>(Sesión actual:&nbsp;&nbsp;$nombre-$correo)
		        		</label><input hidden type='text' maxlength='50' value='$id' name='id_Usuario_Producto'>";});
		        $producto->callback_edit_field('id_Usuario_Producto', function () {
		        $id=$this->session->userdata('id');
		        $nombre=$this->session->userdata('nombre');
		        $correo=$this->session->userdata('correo');
		        return "<label style='color:green; font-size:14px;'>(Sesión que actualiza:&nbsp;&nbsp;$nombre-$correo)
		        		</label><input hidden type='text' maxlength='50' value='$id' name='id_Usuario_Producto'>";});
		        $producto->set_field_upload('imagen_Producto','libraries/libraries-backend/images/thumbnails/productos');
		        $producto->display_as('id_Usuario_Producto','Usuario que registró');
		        $producto->display_as('id_Categoria_Producto','Categoría del producto');
		        $producto->display_as('imagen_Producto','Imagen');
		        $producto->display_as('modelo_Producto','Modelo');
		        $producto->display_as('nombre_Producto','Nombre del producto');
		        $producto->display_as('potencia_Producto','Potencia (W)');
		        $producto->display_as('voltaje_Producto','Voltaje (V)');
		        $producto->display_as('color_Luz_Producto','Color de luz');
		        $producto->display_as('flujo_Luminoso_Producto','Flujo luminoso');
		        $producto->display_as('material_Producto','Material del producto');
		        $producto->display_as('precio_Producto','Precio ($)');
		        $producto->display_as('stock_Producto','Cantidad de producto (Stock)');
		        $producto->display_as('id_Status_Producto','Estatus');
		        $productos = $producto->render();
		        $this->load->view('admin/backend/template/header');
		        $this->load->view('admin/backend/productos/listar_vw',(array)$productos);
		        $this->load->view('admin/backend/template/footer-grocery');
		        break;

		    case 8:
 				$categoria = new grocery_CRUD();
				$categoria->set_theme('bootstrap-v4');
		        $categoria->set_table('categorias');
		        $categoria->order_by('id_Categoria','DESC');
		        $categoria->set_relation('id_Status_Categoria','status','status');
		        $categoria->required_fields('nombre_Categoria','imagen_Categoria','descripcion_Categoria','id_Status_Categoria');
		        $usuario=$this->session->userdata('usuario');
		        if ($usuario==3) {
		        	$categoria->unset_delete('categorias');
		        }
		
		        $categoria->columns('nombre_Categoria','descripcion_Categoria','id_Status_Categoria');
		        $categoria->display_as('nombre_Categoria','Nombre de Categoría');
		        $categoria->display_as('imagen_Categoria','Imagen');
		        $categoria->display_as('descripcion_Categoria','Descripción');
		        $categoria->display_as('id_Status_Categoria','Estatus');
		        $categorias = $categoria->render();
		        $this->load->view('admin/backend/template/header');
		        $this->load->view('admin/backend/categorias/listar_vw',(array)$categorias);
		        $this->load->view('admin/backend/template/footer-grocery');
		        break;

		    case 9:
 				$contacto = new grocery_CRUD();
				$contacto->set_theme('bootstrap-v4');
		        $contacto->set_table('contactos');
		        $contacto->unset_add('contactos');
		        $contacto->unset_edit('contactos');
		        $contacto->order_by('id_Contacto','DESC');
		        $contacto->columns('fecha_Contacto','mensaje_Contacto','nombre_Contacto','email_Contacto','telefono_Contacto');
		         $usuario=$this->session->userdata('usuario');
		        if ($usuario==3) {
		        	$contacto->unset_delete('contactos');
		        }
		        $contacto->set_field_upload('imagen_Usuario','libraries/libraries-backend/images/thumbnails/usuarios');
		        $contacto->display_as('nombre_Contacto','Nombre del contacto');
		        $contacto->display_as('telefono_Contacto','Teléfono');
		        $contacto->display_as('email_Contacto','Correo electrónico');
		        $contacto->display_as('mensaje_Contacto','Mensaje');
		        $contacto->display_as('fecha_Contacto','Fecha');
		        $contactos = $contacto->render();
		        $this->load->view('admin/backend/template/header');
		        $this->load->view('admin/backend/contactos/listar_vw',(array)$contactos);
		        $this->load->view('admin/backend/template/footer-grocery');
		        break;

		    case 10:
		        $this->load->view('admin/backend/registro_usuario_vw');
		        break;

		    case 11:
			    $this->load->view('admin/backend/login_usuario_vw');
			    break;

			case 12:
			    $this->load->view('errors/html/error_403');    
			    break;

			case 13:
				$cliente = new grocery_CRUD();
				$cliente->set_theme('bootstrap-v4');
		        $cliente->set_table('usuarios');
		        $cliente->where('id_Privilegios_Usuario = "4"');
		        $cliente->order_by('id_Usuario','DESC');
		        $cliente->set_relation('id_Status_Usuario','status','status');
		        $cliente->set_relation('id_Privilegios_Usuario','privilegios','privilegio');
		        $usuario=$this->session->userdata('usuario');
		        if ($usuario==3) {
		        	$cliente->unset_delete('contactos');
		        	$cliente->unset_read('contactos');
		        	$cliente->unset_edit('contactos');
		        }
		        $cliente->unset_add('usuarios');
		        $cliente->field_type('password','password');
		        $cliente->edit_fields('nombre_Usuario','apellido_Paterno_Usuario','apellido_Materno_Usuario','calle_Usuario','numero_Interior_Usuario','numero_Exterior_Usuario','telefono_Usuario','correo_Usuario','id_Status_Usuario');
		       	$cliente->columns('nombre_Usuario','apellido_Paterno_Usuario','apellido_Materno_Usuario','calle_Usuario','numero_Interior_Usuario','numero_Exterior_Usuario','telefono_Usuario','correo_Usuario','id_Status_Usuario');
		        
		        $cliente->display_as('nombre_Usuario','Nombre');
		        $cliente->display_as('apellido_Paterno_Usuario','Apellido paterno');
		        $cliente->display_as('apellido_Materno_Usuario','Apellido materno');
		         $cliente->display_as('calle_Usuario','Calle');
		        $cliente->display_as('numero_Interior_Usuario','Número (exterior/interior)');
		        $cliente->display_as('numero_Exterior_Usuario','Código postal');
		        $cliente->display_as('telefono_Usuario','Teléfono');
		        $cliente->display_as('correo_Usuario','Email');
		        $cliente->display_as('id_Privilegios_Usuario','Tipo de usuario');
		        $cliente->display_as('id_Status_Usuario','Estatus');
		        $clientes = $cliente->render();
		        $this->load->view('admin/backend/template/header');
		        $this->load->view('admin/backend/clientes/listar_vw',(array)$clientes);
		        $this->load->view('admin/backend/template/footer-grocery');
		        break;

			    case 14:
			    $venta = new grocery_CRUD();
				$venta->set_theme('bootstrap-v4');
		        $venta->set_table('ventas');
		        $venta->unset_add('ventas');
		        $venta->unset_edit('');
		        $venta->order_by('id_Venta','DESC');
		        $venta->set_relation('id_Usuario_Venta','usuarios','nombre_Usuario');
		        $venta->display_as('id_Usuario_Venta','Usuario');
		        $venta->display_as('catidad_Producto','Cantidad de productos vendidos');
		        $venta->display_as('total_Venta','Total de la venta ($)');
		        $venta->display_as('metodo_Pago_Venta','Método pago');
		        $venta->display_as('metodo_Envio_Venta','Método envío');
		        $venta->display_as('fecha_Noticia','Fecha de publicación');
		        $venta->display_as('fecha_Venta','Fecha de la venta');
		        $ventas = $venta->render();
		        $this->load->view('admin/backend/template/header');
		        $this->load->view('admin/backend/ventas/listar_vw',(array)$ventas);
		        $this->load->view('admin/backend/template/footer-grocery');
			    break;
			}
		}
	}