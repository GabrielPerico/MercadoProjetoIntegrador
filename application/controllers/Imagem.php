<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Imagem extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('imagem_model');
    }

    public function produto($id)
    {
        if ($id > 0) {

            $data['id'] = $id;
            $data['imagens'] = $this->imagem_model->getImagemProduto($id);
            $this->load->view('Header');
            $this->load->view('ImagemProduto', $data);
            $this->load->view('Footer');
        } else {
            redirect('Produtos/Listar');
        }
    }

    public function cadastrar($id)
    {
        if ($id > 0) {
            $this->form_validation->set_rules('id', 'id', 'required');

            if ($this->form_validation->run() == FALSE) {
                $data['id'] = $id;
                $this->load->view('Header');
                $this->load->view('FormImagemProduto', $data);
                $this->load->view('Footer');
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
