<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Categoria extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('categoria_model');
    }
    public function listar($id)
    {
        if ($id > 0) {

            $data['categoria'] = $this->categoria_model->getCategoria($id);
            $data['produtos'] = $this->categoria_model->getProdutos($id);
            $data['mercado'] = $this->categoria_model->getMercado();
            $this->load->view('Header', $data);
            $this->load->view('Categoria');
            $this->load->view('Footer');
        } else {
            redirect(base_url());
        }
    }
}
