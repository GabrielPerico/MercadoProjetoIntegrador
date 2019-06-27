<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Procurar extends CI_Controller
{
    public function index()
    {
        $this->listar();
    }

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Procurar_model');
    }
    public function listar()
    {
        $this->form_validation->set_rules('procura', 'procura', 'required');
        if ($this->form_validation->run() == FALSE) {
            redirect(base_url());
        } else {
            $procura = $this->input->post('procura');
            $data['procura'] = $procura;
            $data['produtos'] = $this->Procurar_model->Search($procura);
            $data['mercado'] = $this->Procurar_model->getMercado();
            $data['departamentos'] = $this->Procurar_model->getDepartamentos();
            $this->load->view('Header', $data);
            $this->load->view('Procurar');
            $this->load->view('Footer');
            
        }
    }
}
