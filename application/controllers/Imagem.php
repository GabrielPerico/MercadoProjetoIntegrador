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

    public function Cadastrar($id)
    {
        if ($id > 0) {
            $this->form_validation->set_rules('id', 'id', 'required');

            if ($this->form_validation->run() == FALSE) {
                $data['id'] = $id;
                $data['image'] = $this->imagem_model->getImagemProduto($id);
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

                if (!$this->upload->do_upload('userfile')) {
                    $dataImage = $this->upload->display_errors();
                } else {
                    $dataImage = $this->upload->data();
                }
                $imageUpload = false;
                if ((is_array($dataImage)) && (array_key_exists("file_name", $dataImage)) && ($dataImage['file_name']) && ($dataImage['file_name'] <> '<')) {
                    $data['img_logo'] = $dataImage['file_name'];
                    $imageUpload = true;
                }

                $imagem = $this->imagem_model->getImagemProduto($id);
                if ($this->imagem_model->update($id, $data)) {
                    if ($imageUpload) {
                        unlink('uploads/produtos/' . $imagem->img_logo);
                    }
                    $this->session->set_flashdata('mensagem', 'Mercado alterado com sucesso!!!');
                    redirect('Mercado/mostrarMercado');
                } else {
                    $this->session->set_flashdata('mensagem', 'Erro ao alterar mercado...');
                    redirect('Mercado/Alterar');
                }
            }
        }
    }
}
