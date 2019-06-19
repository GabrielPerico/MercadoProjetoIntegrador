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
        $this->load->model('ADMdepartamento_model');
        $this->load->model('Usuario_model');
        $this->Usuario_model->verificaLogin();
    }

    public function listar()
    {
        $data['departamentos'] = $this->ADMdepartamento_model->getAll();
        $this->load->view('Admin/Header');
        $this->load->view('Admin/ListaDepartamentos', $data);
        $this->load->view('Admin/Footer');
    }

    public function cadastrar()
    {
        $this->form_validation->set_rules('nome[]', 'nome[]', 'required');
        $this->form_validation->set_rules('descricao[]', 'descricao[]', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('Admin/Header');
            $this->load->view('Admin/FormDepartamento');
            $this->load->view('Admin/Footer');
        } else {

            if (count($this->input->post("nome[]")) > 0) {
                foreach ($this->input->post('nome[]') as $k => $v) {
                    $data[] = array(
                        'tx_nome' => $this->input->post("nome[$k]"),
                        'tx_descricao' => $this->input->post("descricao[$k]")
                    );
                    $funciono = $this->ADMdepartamento_model->insert($data[$k]);
                }
                if($funciono){
                    $this->session->set_flashdata('mensagem', 'Departamento cadastrado com sucesso!!!');
                    redirect('Admin/Departamento/Listar');
                } else {
                    $this->session->set_flashdata('mensagem', 'Erro ao cadastrar departamento!!!');
                    redirect('Admin/Departamento/Cadastrar');
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
                $data['departamento'] = $this->ADMdepartamento_model->getOne($id);
                $this->load->view('Admin/Header');
                $this->load->view('Admin/FormDepartamento', $data);
                $this->load->view('Admin/Footer');
            } else {
                $data = array(
                    'tx_nome' => $this->input->post('nome'),
                    'tx_descricao' => $this->input->post('descricao')
                );
                if ($this->ADMdepartamento_model->update($id, $data)) {
                    $this->session->set_flashdata('mensagem', 'Departamento alterado com sucesso!!!');
                    redirect('Admin/Departamento/Listar');
                } else {
                    $this->session->set_flashdata('mensagem', 'Erro ao alterar departamento...');
                    redirect('Admin/Departamento/Alterar/' . $id);
                }
            }
        } else {
            redirect('Admin/Departamento/Listar');
        }
    }
    public function deletar($id)
    {
        if ($id > 0) {

            if ($this->ADMdepartamento_model->delete($id)) {
                $this->session->set_flashdata('mensagem', 'Departamento deletado com sucesso!!!');
            } else {
                $this->session->set_flashdata('mensagem', 'Erro ao deletar departamento...');
            }
        }
        redirect('Admin/Departamento/Listar');
    }
}
