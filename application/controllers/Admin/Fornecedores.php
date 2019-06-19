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
        $this->load->model('ADMfornecedores_model');
        $this->load->model('Usuario_model');
        $this->Usuario_model->verificaLogin();
    }

    public function listar()
    {
        $data['fornecedores'] = $this->ADMfornecedores_model->getAll();
        $this->load->view('Admin/Header');
        $this->load->view('Admin/ListaFornecedores', $data);
        $this->load->view('Admin/Footer');
    }
    public function cadastrar()
    {
        $this->form_validation->set_rules('nome', 'nome', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('telefone', 'telefone', 'required');
        $this->form_validation->set_rules('endereco', 'endereco', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Admin/Header');
            $this->load->view('Admin/FormFornecedor');
            $this->load->view('Admin/Footer');
        } else {
            $data = array(
                'tx_nome' => $this->input->post('nome'),
                'tx_endereco' => $this->input->post('endereco'),
                'tx_telefone' => $this->input->post('telefone'),
                'tx_email' => $this->input->post('email')
            );

            if ($this->ADMfornecedores_model->insert($data)) {
                $this->session->set_flashdata('mensagem', 'Fornecedor cadastrado com sucesso!!!');
                redirect('Admin/Fornecedores/Listar');
            } else {
                $this->session->set_flashdata('mensagem', 'Erro ao cadastrar fornecedor!!!');
                redirect('Admin/Fornecedores/Cadastrar');
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
                $data['fornecedor'] = $this->ADMfornecedores_model->getOne($id);
                $this->load->view('Admin/Header');
                $this->load->view('Admin/FormFornecedor', $data);
                $this->load->view('Admin/Footer');
            } else {
                $data = array(
                    'tx_nome' => $this->input->post('nome'),
                    'tx_endereco' => $this->input->post('endereco'),
                    'tx_telefone' => $this->input->post('telefone'),
                    'tx_email' => $this->input->post('email')
                );
                if ($this->ADMfornecedores_model->update($id, $data)) {
                    $this->session->set_flashdata('mensagem', 'Fornecedor alterada com sucesso!!!');
                    redirect('Admin/Fornecedores/Listar');
                } else {
                    $this->session->set_flashdata('mensagem', 'Erro ao alterar Fornecedor...');
                    redirect('Admin/Fornecedores/Alterar/' . $id);
                }
            }
        } else {
            redirect('Admin/Fornecedores/Listar');
        }
    }

    public function deletar($id)
    {
        if ($id > 0) {

            if ($this->ADMfornecedores_model->delete($id)) {
                $this->session->set_flashdata('mensagem', 'Fornecedor deletado com sucesso!!!');
            } else {
                $this->session->set_flashdata('mensagem', 'Erro ao deletar fornecedor...');
            }
        }
        redirect('Admin/Fornecedores/Listar');
    }
}
