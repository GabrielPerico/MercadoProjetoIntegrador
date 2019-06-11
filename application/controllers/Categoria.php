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
        $this->load->model('categoria_model');
    }

    public function listar()
    {
        $data['categorias'] = $this->categoria_model->getAll();
        $data['departamentos'] = $this->categoria_model->getDepartamento();
        $this->load->view('Header');
        $this->load->view('ListaCategorias', $data);
        $this->load->view('Footer');
    }

    public function cadastrar()
    {
        $this->form_validation->set_rules('nome[]', 'nome[]', 'required');
        $this->form_validation->set_rules('descricao[]', 'descricao[]', 'required');
        $this->form_validation->set_rules('departamento[]', 'departamento[]', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['departamentos'] = $this->categoria_model->getDepartamento();
            $this->load->view('Header');
            $this->load->view('FormCategoria', $data);
            $this->load->view('Footer');
        } else {

            if (count($this->input->post("nome[]")) > 0) {
                foreach ($this->input->post('nome[]') as $k => $v) {
                    $data[] = array(
                        'tx_nome' => $this->input->post("nome[$k]"),
                        'tx_descricao' => $this->input->post("descricao[$k]"),
                        'ref_departamento' => $this->input->post("departamento[$k]")
                    );
                    $funciono = $this->categoria_model->insert($data[$k]);
                }
                if ($funciono) {
                    $this->session->set_flashdata('mensagem', 'Categoria cadastrado com sucesso!!!');
                    redirect('Categoria/Listar');
                } else {
                    $this->session->set_flashdata('mensagem', 'Erro ao cadastrar Categoria!!!');
                    redirect('Categoria/Cadastrar');
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
                $data['categorias'] = $this->categoria_model->getOne($id);
                $data['departamentos'] = json_encode($this->categoria_model->getDepartamento());

                $this->load->view('Header');
                $this->load->view('FormCategoria', $data);
                $this->load->view('Footer');
            } else {
                $data = array(
                    'tx_nome' => $this->input->post('nome'),
                    'tx_descricao' => $this->input->post('descricao')
                );
                if ($this->categoria_model->update($id, $data)) {
                    $this->session->set_flashdata('mensagem', 'Categoria alterada com sucesso!!!');
                    redirect('Categoria/Listar');
                } else {
                    $this->session->set_flashdata('mensagem', 'Erro ao alterar Categoria...');
                    redirect('Categoria/Alterar/' . $id);
                }
            }
        } else {
            redirect('Categoria/Listar');
        }
    }
    public function deletar($id)
    {
        if ($id > 0) {

            if ($this->categoria_model->delete($id)) {
                $this->session->set_flashdata('mensagem', 'Categoria deletada com sucesso!!!');
            } else {
                $this->session->set_flashdata('mensagem', 'Erro ao deletar Categoria...');
            }
        }
        redirect('Categoria/Listar');
    }
}
