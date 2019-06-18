<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Anuncio extends CI_Controller
{
    public function index()
    {
        $this->listar();
    }

    public function __construct()
    {
        parent::__construct();
        $this->load->model('anuncio_model');
    }
    public function listar()
    {
        $data['anuncios'] = $this->anuncio_model->getAnuncios();
        $this->load->view('Header');
        $this->load->view('ListaAnuncio', $data);
        $this->load->view('Footer');
    }
    public function cadastrar()
    {
        $this->form_validation->set_rules('mostrar', 'mostrar', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Header');
            $this->load->view('FormAnuncio');
            $this->load->view('Footer');
        } else {
            $data = array(
                'sl_mostrar' => $this->input->post('mostrar')
            );
            $config['upload_path']          = './uploads/anuncios';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_width']            = 1024;
            $config['max_height']           = 768;
            $config['encrypt_name']         = true;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('userfile')) {
                $error = ($this->upload->display_errors());
                $this->session->set_flashdata('mensagem', "$error");
                redirect('Anuncio');
                exit;
            } else {
                $data['img_imagem'] = $this->upload->data('file_name');
            }
            if ($this->anuncio_model->insert($data)) {
                $this->session->set_flashdata('mensagem', 'Anuncio cadastrada com sucesso!!!');
                redirect('Anuncio');
            } else {
                unlink($data['imagem']);
                $this->session->set_flashdata('mensagem', 'Erro ao cadastrar anuncio!!!');
                redirect('Anuncio/Cadastrar');
            }
        }
    }
    public function mostrar($id, $slct)
    {
        if ($id > 0 && $slct > -1 && $slct < 2) {
            $data['sl_mostrar'] = $slct;
            $this->anuncio_model->mostrar($id, $data);
            redirect("Anuncio");
        }
    }
    public function deletar($id)
    {
        if ($id > 0) {

            if ($this->anuncio_model->delete($id)) {
                $this->session->set_flashdata('mensagem', 'Anuncio deletado com sucesso!!!');
            } else {
                $this->session->set_flashdata('mensagem', 'Erro ao deletar anuncio...');
            }
        }
        redirect('Anuncio');
    }
}
