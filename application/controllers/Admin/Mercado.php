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
        $this->load->model('ADMmercado_model');
        $this->load->model('Usuario_model');
        $this->Usuario_model->verificaLogin();
    }

    public function mostrarMercado()
    {
        $data['mercado'] = $this->ADMmercado_model->getMercado();
        $this->load->view('Admin/Header');
        $this->load->view('Admin/MercadoInfo', $data);
        $this->load->view('Admin/Footer');
    }

    public function alterar()
    {
        $this->form_validation->set_rules('nome', 'nome', 'required');
        $this->form_validation->set_rules('telefone', 'telefone', 'required');
        $this->form_validation->set_rules('endereco', 'endereco', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['mercado'] = $this->ADMmercado_model->getMercado();
            $this->load->view('Admin/Header');
            $this->load->view('Admin/FormMercado', $data);
            $this->load->view('Admin/Footer');
        } else {
            $data = array(
                'tx_nome' => $this->input->post('nome'),
                'tx_telefone' => $this->input->post('telefone'),
                'tx_telefone2' => $this->input->post('telefone2'),
                'tx_telefone3' => $this->input->post('telefone3'),
                'tx_telefone4' => $this->input->post('telefone4'),
                'tx_endereco' => $this->input->post('endereco'),
                'tx_email' => $this->input->post('email')
            );

            
            $config['upload_path']          = './uploads/logo';
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
           
            $mercado = $this->ADMmercado_model->getMercado();
            if ($this->ADMmercado_model->update(1, $data)) {                
                if($imageUpload){
                    unlink('uploads/logo/'.$mercado->img_logo);                
                }
                $this->session->set_flashdata('mensagem', 'Mercado alterado com sucesso!!!');
                redirect('Admin/Mercado/mostrarMercado');
            } else {                
                $this->session->set_flashdata('mensagem', 'Erro ao alterar mercado...');
                redirect('Admin/Mercado/Alterar');
            }
        }
    }
}
