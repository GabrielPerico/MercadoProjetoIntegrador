<?php

defined('BASEPATH') or exit('No direct script acces allowed');

class Usuario extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Usuario_model');

    }
    public function index()
    {
        $this->load->view('Admin/Login');
    }

    public function login()
    {
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('senha', 'senha', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Admin/Login');
        } else {
            $usuario = $this->Usuario_model->getUsuario(
                $this->input->post('email'),
                $this->input->post('senha')
            );
            if ($usuario) {
                $data = array(
                    'idUsuario' => $usuario->id_usuario,
                    'email' => $usuario->tx_email,
                    'nome' => $usuario->tx_nome,
                    'admin' => $usuario->sl_admin,
                    'logado' => true
                );
                $this->session->set_userdata($data);
                redirect('Admin/Mercado');
            } else {
                $this->session->set_flashdata('mensagem', 'Usuário e/ou Senha incorretos!');
                redirect('Admin/Usuario/Login');
            }
        }
    }
    public function registrar()
    {
        $this->Usuario_model->verificaLogin();
        $this->form_validation->set_rules('nome', 'nome', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('senha', 'senha', 'required');
        $this->form_validation->set_rules('dt_nasc', 'dt_nasc', 'required');
        $this->form_validation->set_rules('genero', 'genero', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Admin/Header');
            $this->load->view('Admin/Registrar');
            $this->load->view('Admin/Footer');
        } else { 
            $data = array(
                'tx_email' =>  $this->input->post("email"),
                'tx_nome' =>  $this->input->post("nome"),
                'tx_senha' => sha1($this->input->post("senha").'gabrielSENAC'),
                'dt_dataDeNascimento' => $this->input->post("dt_nasc"),
                'sl_genero' => $this->input->post("genero"),
                'sl_admin' => 1
            );
            if ($this->Usuario_model->insert($data)) {
                $this->session->set_flashdata('mensagem', 'Administrador cadastrado com sucesso!!!');
                redirect('Admin/Mercado');
            } else {
                $this->session->set_flashdata('mensagem', 'Erro ao cadastrar Administrador!!!');
                redirect('Admin/Registrar');
            }
        }
    }
    public function sair()
    {
        $this->session->sess_destroy();
        redirect($this->config->base_url() . 'Admin/Mercado');
    }
}
