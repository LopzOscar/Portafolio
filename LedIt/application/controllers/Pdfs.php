<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pdfs extends CI_Controller {

        public function index(){
                $this->load->view('admin/backend/template/header');
        }

         function datos_bd(){
                $this->load->model('Pdfs_model');
              $this->load->library('mydompdf');

                $data['productos'] = $this->Pdfs_model->getUsuarios();
                $html= $this->load->view('pdf/datos_bd', $data, true);
              $this->mydompdf->load_html($html);
              $this->mydompdf->render();
                $this->mydompdf->set_base_path('./assets/css/dompdf.css'); //agregar de nuevo el css
              $this->mydompdf->stream("welcome.pdf", array("Attachment" => false));
         }

}
