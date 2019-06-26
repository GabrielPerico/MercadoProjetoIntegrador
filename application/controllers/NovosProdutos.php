<?php
defined('BASEPATH') or exit('No direct script access allowed');

class NovosProdutos extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('novosprodutos_model');
    }
    public function listar()
    {
        $data['produtos'] = $this->novosprodutos_model->getProdutos();
        $data['mercado'] = $this->novosprodutos_model->getMercado();
        $data['departamentos'] = $this->novosprodutos_model->getDepartamentos();
        $this->load->view('Header', $data);
        $this->load->view('NovosProdutos');
        $this->load->view('Footer');
    }
}
