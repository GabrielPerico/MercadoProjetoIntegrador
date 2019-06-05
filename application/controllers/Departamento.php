<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Departamento extends CI_Controller
{
    public function index()
    {
        $this->listar();
    }

    public function __construct()
    {
        parent::__construct();
        $this->load->model('departamento_model');
    }

    public function listar()
    {
        $data['departamentos'] = $this->departamento_model->getAll();
        $this->load->view('Header');
        $this->load->view('ListaDepartamentos', $data);
        $this->load->view('Footer');
    }

    public function cadastrar()
    {
        $this->form_validation->set_rules('nome', 'nome', 'required');
        $this->form_validation->set_rules('descricao', 'descricao', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('Header');
            $this->load->view('FormDepartamento');
            $this->load->view('Footer');
        } else {


            $data = array(
                'tx_nome' => $this->input->post('nome'),
                'tx_descricao' => $this->input->post('descricao'),
            );

            if ($this->departamento_model->insert($data)) {
                $this->session->set_flashdata('mensagem', 'Departamento cadastrado com sucesso!!!');
                redirect('Departamento/Listar');
            } else {
                $this->session->set_flashdata('mensagem', 'Erro ao cadastrar departamento!!!');
                redirect('Departamento/Cadastrar');
            }
        }
    }

    public function alterar($id)
    {
        if ($id > 0) {

            $this->form_validation->set_rules('nome', 'nome', 'required');
            $this->form_validation->set_rules('descricao', 'descricao', 'required');

            if ($this->form_validation->run() == FALSE) {
                $data['departamento'] = $this->departamento_model->getOne($id);
                $this->load->view('Header');
                $this->load->view('FormDepartamento', $data);
                $this->load->view('Footer');
            } else {
                $data = array(
                    'tx_nome' => $this->input->post('nome'),
                    'tx_descricao' => $this->input->post('descricao')
                );
                if ($this->departamento_model->update($id, $data)) {
                    $this->session->set_flashdata('mensagem', 'Departamento alterado com sucesso!!!');
                    redirect('Departamento/Listar');
                } else {
                    $this->session->set_flashdata('mensagem', 'Erro ao alterar departamento...');
                    redirect('Departamento/Alterar/' . $id);
                }
            }
        } else {
            redirect('Departamento/Listar');
        }
    }
    public function deletar($id)
    {
        if ($id > 0) {

            if ($this->departamento_model->delete($id)) {
                $this->session->set_flashdata('mensagem', 'Departamento deletado com sucesso!!!');
            } else {
                $this->session->set_flashdata('mensagem', 'Erro ao deletar departamento...');
            }
        }
        redirect('Departamento/Listar');
    }
}
