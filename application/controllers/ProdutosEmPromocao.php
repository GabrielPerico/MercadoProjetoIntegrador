<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProdutosEmPromocao extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('produtosempromocao_model');
    }
    public function listar()
    {
        $data['produtos'] = $this->produtosempromocao_model->getProdutos();
        $data['mercado'] = $this->produtosempromocao_model->getMercado();
        $data['departamentos'] = $this->produtosempromocao_model->getDepartamentos();
        $this->load->view('Header', $data);
        $this->load->view('ProdutosEmPromocao');
        $this->load->view('Footer');
    }
}
