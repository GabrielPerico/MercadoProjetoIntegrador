<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produto extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('produto_model');
    }
    public function info($id){
        if($id > 0){
            $data['imagens'] = $this->produto_model->getImagens($id);
            $data['produto'] = $this->produto_model->getProduto($id);
            $data['mercado'] = $this->produto_model->getMercado();
            $this->load->view('Header', $data);
            $this->load->view('Produto');
            $this->load->view('Footer');
        }else{
            redirect(base_url());
        }
    }
}