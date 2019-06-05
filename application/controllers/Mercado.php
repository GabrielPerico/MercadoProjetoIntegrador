<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mercado extends CI_Controller
{

    public function index()
    {
        $this->mostrarMercado();
    }

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mercado_model');
    }

    public function mostrarMercado()
    {
        $data['mercado'] = $this->mercado_model->getMercado();
        $this->load->view('Header');
        $this->load->view('MercadoInfo', $data);
        $this->load->view('Footer');
    }

    public function alterar()
    {
        $this->form_validation->set_rules('nome', 'nome', 'required');
        $this->form_validation->set_rules('telefone', 'telefone', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['mercado'] = $this->mercado_model->getMercado();
            $this->load->view('Header');
            $this->load->view('FormMercado', $data);
            $this->load->view('Footer');
        } else {
            $data = array(
                'tx_nome' => $this->input->post('nome'),
                'tx_telefone' => $this->input->post('telefone'),
                'tx_email' => $this->input->post('email')
            );
            $config['upload_path']          = './uploads/logo';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_width']            = 1024;
            $config['max_height']           = 768;
            $config['encrypt_name']         = true;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('userfile')) {
                $error = ($this->upload->display_errors());
                $this->session->set_flashdata('mensagem', "$error");
                redirect('Mercado/mostrarMercado');
                exit;
            } else {
                $data['img_logo'] = $this->upload->data('file_name');
            }
            $mercado = $this->mercado_model->getMercado();
            if ($this->mercado_model->update(1, $data)) {
                unlink('uploads/logo/'.$mercado->img_logo);
                $this->session->set_flashdata('mensagem', 'Mercado alterado com sucesso!!!');
                redirect('Mercado/mostrarMercado');
            } else {
                unlink($data['imagem']);
                $this->session->set_flashdata('mensagem', 'Erro ao alterar mercado...');
                redirect('Mercado/Alterar');
            }
        }
    }
}
