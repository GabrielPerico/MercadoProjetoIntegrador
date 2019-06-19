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
       /* $data['anuncios'] = $this->home_model->getAnuncios();
        $data['produtos'] = $this->home_model->getProdutos();
        $data['promocao'] = $this->home_model->getPromocao();
        $data['departamentos'] = $this->home_model->getDepartamentos();
        $data['categorias'] = $this->home_model->getCategorias(); */
        $data['mercado'] = $this->home_model->getMercado();
        $this->load->view('Header', $data);
        /*
        $this->load->view('Home', $data);
        $this->load->view('Footer');
        */
    }
}
