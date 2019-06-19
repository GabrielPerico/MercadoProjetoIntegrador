<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Categoria extends CI_Controller
{
    public function index()
    {
        $this->listar();
    }

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ADMcategoria_model');
        $this->load->model('Usuario_model');
        $this->Usuario_model->verificaLogin();
    }

    public function listar()
    {
        $data['categorias'] = $this->ADMcategoria_model->getAll();
        $data['departamentos'] = $this->ADMcategoria_model->getDepartamento();
        $this->load->view('Admin/Header');
        $this->load->view('Admin/ListaCategorias', $data);
        $this->load->view('Admin/Footer');
    }

    public function cadastrar()
    {
        $this->form_validation->set_rules('nome[]', 'nome[]', 'required');
        $this->form_validation->set_rules('descricao[]', 'descricao[]', 'required');
        $this->form_validation->set_rules('departamento[]', 'departamento[]', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['departamentos'] = $this->ADMcategoria_model->getDepartamento();
            $this->load->view('Admin/Header');
            $this->load->view('Admin/FormCategoria', $data);
            $this->load->view('Admin/Footer');
        } else {

            if (count($this->input->post("nome[]")) > 0) {
                foreach ($this->input->post('nome[]') as $k => $v) {
                    $data[] = array(
                        'tx_nome' => $this->input->post("nome[$k]"),
                        'tx_descricao' => $this->input->post("descricao[$k]"),
                        'ref_departamento' => $this->input->post("departamento[$k]")
                    );
                    $funciono = $this->ADMcategoria_model->insert($data[$k]);
                }
                if ($funciono) {
                    $this->session->set_flashdata('mensagem', 'Categoria cadastrado com sucesso!!!');
                    redirect('Admin/Categoria/Listar');
                } else {
                    $this->session->set_flashdata('mensagem', 'Erro ao cadastrar Categoria!!!');
                    redirect('Admin/Categoria/Cadastrar');
                }
            }
        }
    }

    public function alterar($id)
    {
        if ($id > 0) {

            $this->form_validation->set_rules('nome', 'nome', 'required');
            $this->form_validation->set_rules('descricao', 'descricao', 'required');

            if ($this->form_validation->run() == FALSE) {
                $data['categoria'] = $this->ADMcategoria_model->getOne($id);
                $data['departamentos'] = $this->ADMcategoria_model->getDepartamento();

                $this->load->view('Admin/Header');
                $this->load->view('Admin/FormCategoria', $data);
                $this->load->view('Admin/Footer');
            } else {
                $data = array(
                    'tx_nome' => $this->input->post('nome'),
                    'tx_descricao' => $this->input->post('descricao'),
                    'ref_departamento' => $this->input->post("departamento")
                );
                if ($this->ADMcategoria_model->update($id, $data)) {
                    $this->session->set_flashdata('mensagem', 'Categoria alterada com sucesso!!!');
                    redirect('Admin/Categoria/Listar');
                } else {
                    $this->session->set_flashdata('mensagem', 'Erro ao alterar Categoria...');
                    redirect('Admin/Categoria/Alterar/' . $id);
                }
            }
        } else {
            redirect('Admin/Categoria/Listar');
        }
    }
    public function deletar($id)
    {
        if ($id > 0) {

            if ($this->ADMcategoria_model->delete($id)) {
                $this->session->set_flashdata('mensagem', 'Categoria deletada com sucesso!!!');
            } else {
                $this->session->set_flashdata('mensagem', 'Erro ao deletar Categoria...');
            }
        }
        redirect('Admin/Categoria/Listar');
    }
}
