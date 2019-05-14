<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class MiControlador extends CI_Controller{
		public function index($option=1){
			
			$this->load->view('plantilla/header');
			$this->load->view('plantilla/nav');
			
			 

			 switch ($option) {
				 case 1:$this->load->view('vista2');
					break;
				 case 2:$this->load->view('directorio');
					break;
				 case 3:$this->load->view('servicios');
					break;
			     case 4: $this->load->view('articulos');
					break;
				 case 5: $this->load->view('contactanos');
					break;
			}

			 
				$this->load->view('plantilla/footer');
					
	}
}