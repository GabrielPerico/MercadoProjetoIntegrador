<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Imagem extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ADMimagem_model');
        $this->load->model('Usuario_model');
        $this->Usuario_model->verificaLogin();
    }

    public function produto($id)
    {
        if ($id > 0) {

            $data['id'] = $id;
            $data['imagens'] = $this->ADMimagem_model->getImagemProduto($id);
            $this->load->view('Admin/Header');
            $this->load->view('Admin/ImagemProduto', $data);
            $this->load->view('Admin/Footer');
        } else {
            redirect('Admin/Produtos/Listar');
        }
    }

    public function cadastrar($id)
    {
        if ($id > 0) {
            $this->form_validation->set_rules('id', 'id', 'required');

            if ($this->form_validation->run() == FALSE) {
                $data['id'] = $id;
                $this->load->view('Admin/FormImagemProduto', $data);
            } else {
                $config['upload_path']          = './uploads/produtos';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_width']            = 1024;
                $config['max_height']           = 768;
                $config['encrypt_name']         = true;
                $this->load->library('upload', $config);

                for ($i = 0; $i < count($_FILES['userfile']['tmp_name']); $i++) {
                    $this->upload->do_upload("userfile[$i]");
                    $dataImage = $this->upload->display_errors();
                    echo $dataImage;
                }
            }
        }
    }
}
