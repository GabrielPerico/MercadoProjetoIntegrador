<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index()
    {
        $this->listar();
    }

    public function __construct()
    {
        parent::__construct();
        $this->load->model('home_model');
    }
    
    public function listar()
    {
        $data['anuncios'] = $this->home_model->getAnuncios();
        $data['produtosN'] = $this->home_model->getProdutosNovos();
        $data['produtosP'] = $this->home_model->getProdutosPromocao();
        $data['departamentos'] = $this->home_model->getDepartamentos();
        $data['categorias'] = $this->home_model->getCategorias();
        $data['mercado'] = $this->home_model->getMercado();
        $this->load->view('Header', $data);
        $this->load->view('Home');
        $this->load->view('Footer');
    }
}
