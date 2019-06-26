<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Departamento extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('departamento_model');
    }

    public function listar($id)
    {
        if ($id > 0) {
            $data['categorias'] = $this->departamento_model->getCategoria($id);
            $data['mercado'] = $this->departamento_model->getMercado();
            $data['produtos'] = $this->departamento_model->getProdutos();
            $data['departamentos'] = $this->departamento_model->getDepartamentos();
            $this->load->view('Header', $data);
            $this->load->view('Departamento');
            $this->load->view('Footer');
        }else{
            redirect(base_url());
        }
    }
}
