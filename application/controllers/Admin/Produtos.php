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
        $this->load->model('ADMproduto_model');
        $this->load->model('Usuario_model');
        $this->Usuario_model->verificaLogin();
    }

    public function listar()
    {
        $data['produtos'] = $this->ADMproduto_model->getAll();
        $this->load->view('Admin/Header');
        $this->load->view('Admin/ListaProdutos', $data);
        $this->load->view('Admin/Footer');
    }

    public function cadastrar()
    {
        $this->form_validation->set_rules('nome', 'nome', 'required');
        $this->form_validation->set_rules('descricao', 'descricao', 'required');
        $this->form_validation->set_rules('preco', 'preco', 'required');
        $this->form_validation->set_rules('marca', 'marca', 'required');
        $this->form_validation->set_rules('parcelamentoMaximo', 'parcelamentoMaximo', 'required');
        $this->form_validation->set_rules('categoria', 'categoria', 'required');
        $this->form_validation->set_rules('fornecedor', 'fornecedor', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['categorias'] = $this->ADMproduto_model->getCategoria();
            $data['fornecedores'] = $this->ADMproduto_model->getFornecedor();
            $this->load->view('Admin/Header');
            $this->load->view('Admin/FormProdutos', $data);
            $this->load->view('Admin/Footer');
        } else {


            $data = array(
                'tx_nome' => $this->input->post('nome'),
                'tx_descricao' => $this->input->post('descricao'),
                'ref_fornecedor' => $this->input->post('fornecedor'),
                'ref_categoria' => $this->input->post('categoria'),
                'num_parcelamentoMaximo' => $this->input->post('parcelamentoMaximo'),
                'tx_marca' => $this->input->post('marca'),
                'vl_preco' => $this->input->post('preco')
            );

            if ($this->ADMproduto_model->insert($data)) {
                $this->session->set_flashdata('mensagem', 'Produto cadastrado com sucesso!!!');
                redirect('Admin/Produtos/Listar');
            } else {
                $this->session->set_flashdata('mensagem', 'Erro ao cadastrar Produto!!!');
                redirect('Admin/Produtos/Cadastrar');
            }
        }
    }

    public function alterar($id)
    {
        if ($id > 0) {

            $this->form_validation->set_rules('nome', 'nome', 'required');
            $this->form_validation->set_rules('descricao', 'descricao', 'required');
            $this->form_validation->set_rules('preco', 'preco', 'required');
            $this->form_validation->set_rules('marca', 'marca', 'required');
            $this->form_validation->set_rules('parcelamentoMaximo', 'parcelamentoMaximo', 'required');
            $this->form_validation->set_rules('categoria', 'categoria', 'required');
            $this->form_validation->set_rules('fornecedor', 'fornecedor', 'required');

            if ($this->form_validation->run() == FALSE) {
                $data['produtos'] = $this->ADMproduto_model->getOne($id);
                $data['categorias'] = $this->ADMproduto_model->getCategoria();
                $data['fornecedores'] = $this->ADMproduto_model->getFornecedor();
                $this->load->view('Admin/Header');
                $this->load->view('Admin/FormProdutos', $data);
                $this->load->view('Admin/Footer');
            } else {
                $data = array(
                    'tx_nome' => $this->input->post('nome'),
                    'tx_descricao' => $this->input->post('descricao'),
                    'ref_fornecedor' => $this->input->post('fornecedor'),
                    'ref_categoria' => $this->input->post('categoria'),
                    'num_parcelamentoMaximo' => $this->input->post('parcelamentoMaximo'),
                    'tx_marca' => $this->input->post('marca'),
                    'vl_preco' => $this->input->post('preco')
                );
                if ($this->ADMproduto_model->update($id, $data)) {
                    $this->session->set_flashdata('mensagem', 'Produtos alterada com sucesso!!!');
                    redirect('Admin/Produtos/Listar');
                } else {
                    $this->session->set_flashdata('mensagem', 'Erro ao alterar Produtos...');
                    redirect('Admin/Produtos/Alterar/' . $id);
                }
            }
        } else {
            redirect('Admin/Produtos/Listar');
        }
    }

    public function deletar($id)
    {
        if ($id > 0) {

            if ($this->ADMproduto_model->delete($id)) {
                $this->session->set_flashdata('mensagem', 'Produto deletado com sucesso!!!');
            } else {
                $this->session->set_flashdata('mensagem', 'Erro ao deletar Produto...');
            }
        }
        redirect('Admin/Produtos/Listar');
    }
}
