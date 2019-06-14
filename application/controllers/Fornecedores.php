<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fornecedores extends CI_Controller
{
    public function index()
    {
        $this->listar();
    }

    public function __construct()
    {
        parent::__construct();
        $this->load->model('fornecedores_model');
    }

    public function listar()
    {
        $data['fornecedores'] = $this->fornecedores_model->getAll();
        $this->load->view('Header');
        $this->load->view('ListaFornecedores', $data);
        $this->load->view('Footer');
    }
    public function cadastrar()
    {
        $this->form_validation->set_rules('nome', 'nome', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('telefone', 'telefone', 'required');
        $this->form_validation->set_rules('endereco', 'endereco', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Header');
            $this->load->view('FormFornecedor');
            $this->load->view('Footer');
        } else {
            $data = array(
                'tx_nome' => $this->input->post('nome'),
                'tx_endereco' => $this->input->post('endereco'),
                'tx_telefone' => $this->input->post('telefone'),
                'tx_email' => $this->input->post('email')
            );

            if ($this->fornecedores_model->insert($data)) {
                $this->session->set_flashdata('mensagem', 'Fornecedor cadastrado com sucesso!!!');
                redirect('Fornecedores/Listar');
            } else {
                $this->session->set_flashdata('mensagem', 'Erro ao cadastrar fornecedor!!!');
                redirect('Fornecedores/Cadastrar');
            }
        }
    }

    public function alterar($id)
    {
        if ($id > 0) {

            $this->form_validation->set_rules('nome', 'nome', 'required');
            $this->form_validation->set_rules('email', 'email', 'required');
            $this->form_validation->set_rules('telefone', 'telefone', 'required');
            $this->form_validation->set_rules('endereco', 'endereco', 'required');

            if ($this->form_validation->run() == FALSE) {
                $data['fornecedor'] = $this->fornecedores_model->getOne($id);
                $this->load->view('Header');
                $this->load->view('FormFornecedor', $data);
                $this->load->view('Footer');
            } else {
                $data = array(
                    'tx_nome' => $this->input->post('nome'),
                    'tx_endereco' => $this->input->post('endereco'),
                    'tx_telefone' => $this->input->post('telefone'),
                    'tx_email' => $this->input->post('email')
                );
                if ($this->fornecedores_model->update($id, $data)) {
                    $this->session->set_flashdata('mensagem', 'Fornecedor alterada com sucesso!!!');
                    redirect('Fornecedores/Listar');
                } else {
                    $this->session->set_flashdata('mensagem', 'Erro ao alterar Fornecedor...');
                    redirect('Fornecedores/Alterar/' . $id);
                }
            }
        } else {
            redirect('Fornecedores/Listar');
        }
    }

    public function deletar($id)
    {
        if ($id > 0) {

            if ($this->fornecedores_model->delete($id)) {
                $this->session->set_flashdata('mensagem', 'Fornecedor deletado com sucesso!!!');
            } else {
                $this->session->set_flashdata('mensagem', 'Erro ao deletar fornecedor...');
            }
        }
        redirect('Fornecedores/Listar');
    }
}
