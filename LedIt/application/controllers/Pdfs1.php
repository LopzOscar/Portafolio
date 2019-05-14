<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pdfs1 extends CI_Controller {

        public function index(){
                $this->load->view('admin/backend/template/header');
        }

         function datos_bd_Us(){
                $this->load->model('Pdfs1_model');
              $this->load->library('mydompdf');

                $data['usuarios'] = $this->Pdfs1_model->getUsuarios();
                $html= $this->load->view('pdf/datos_bd_Us', $data, true);
              $this->mydompdf->load_html($html);
              $this->mydompdf->render();
                $this->mydompdf->set_base_path('./assets/css/dompdf.css'); //agregar de nuevo el css
              $this->mydompdf->stream("welcome.pdf", array("Attachment" => false));
         }

}
