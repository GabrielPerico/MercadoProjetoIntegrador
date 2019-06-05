<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produtos extends CI_Controller
{
    public function index()
    {
        $this->listar();
    }

    public function __construct()
    {
        parent::__construct();
        $this->load->model('produto_model');
    }

    public function listar()
    {
        $data['produtos'] = $this->produto_model->getAll();
        $this->load->view('Header');
        $this->load->view('ListaProdutos', $data);
        $this->load->view('Footer');
    }

    public function cadastrar()
    {
        $this->form_validation->set_rules('nome', 'nome', 'required');
        $this->form_validation->set_rules('descricao', 'descricao', 'required');
        $this->form_validation->set_rules('departamento', 'departamento', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['categorias'] = $this->produto_model->getCategoria();
            $data['fornecedores'] = $this->produto_model->getFornecedor();
            $this->load->view('Header');
            $this->load->view('FormProdutos', $data);
            $this->load->view('Footer');
        } else {


            $data = array(
                'tx_nome' => $this->input->post('nome'),
                'tx_descricao' => $this->input->post('descricao'),
                'ref_departamento' => $this->input->post('departamento'),
            );

            if ($this->produto_model->insert($data)) {
                $this->session->set_flashdata('mensagem', 'Produto cadastrado com sucesso!!!');
                redirect('Produtos/Listar');
            } else {
                $this->session->set_flashdata('mensagem', 'Erro ao cadastrar Produto!!!');
                redirect('Produtos/Cadastrar');
            }
        }
    }

    public function alterar($id)
    {
        if ($id > 0) {

            $this->form_validation->set_rules('nome', 'nome', 'required');
            $this->form_validation->set_rules('descricao', 'descricao', 'required');

            if ($this->form_validation->run() == FALSE) {
                $data['produtos'] = $this->produto_model->getOne($id);
                $data['departamentos'] = $this->produto_model->getDepartamento();
                $this->load->view('Header');
                $this->load->view('FormProdutos', $data);
                $this->load->view('Footer');
            } else {
                $data = array(
                    'tx_nome' => $this->input->post('nome'),
                    'tx_descricao' => $this->input->post('descricao')
                );
                if ($this->produto_model->update($id, $data)) {
                    $this->session->set_flashdata('mensagem', 'Produtos alterada com sucesso!!!');
                    redirect('Produtos/Listar');
                } else {
                    $this->session->set_flashdata('mensagem', 'Erro ao alterar Produtos...');
                    redirect('Produtos/Alterar/' . $id);
                }
            }
        } else {
            redirect('Produtos/Listar');
        }
    }
    public function deletar($id)
    {
        if ($id > 0) {

            if ($this->produto_model->delete($id)) {
                $this->session->set_flashdata('mensagem', 'Produtos deletada com sucesso!!!');
            } else {
                $this->session->set_flashdata('mensagem', 'Erro ao deletar Produtos...');
            }
        }
        redirect('Produtos/Listar');
    }
}
