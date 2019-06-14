<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Promocao extends CI_Controller
{ 
    public function index()
    {
        $this->listar();
    }

    public function __construct()
    {
        parent::__construct();
        $this->load->model('promocao_model');
    }

    public function listar()
    {
        $data['promocoes'] = $this->promocao_model->getAll();
        $this->load->view('Header');
        $this->load->view('ListaPromocao', $data);
        $this->load->view('Footer');
    }

    public function cadastrar()
    {
        $this->form_validation->set_rules('nome', 'nome', 'required');
        $this->form_validation->set_rules('dtInicio', 'dtInicio', 'required');
        $this->form_validation->set_rules('dtFim', 'dtFim', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Header');
            $this->load->view('FormPromocao');
            $this->load->view('Footer');
        } else {
            $data = array(
                'tx_nome' => $this->input->post('nome'),
                'dt_inicioDaPromocao' => $this->input->post('dtInicio'),
                'dt_fimDaPromocao' => $this->input->post('dtFim')
            );

            if ($this->fornecedores_model->insert($data)) {
                $this->session->set_flashdata('mensagem', 'Promoção cadastrada com sucesso!!!');
                redirect('Promocao/Listar');
            } else {
                $this->session->set_flashdata('mensagem', 'Erro ao cadastrar promoção!!!');
                redirect('Promocao/Cadastrar');
            }
        }
    }
}
