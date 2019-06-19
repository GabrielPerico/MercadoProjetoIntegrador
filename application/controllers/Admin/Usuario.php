<?php

defined('BASEPATH') or exit('No direct script acces allowed');

class Usuario extends CI_Controller
{

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
            $this->load->model('Usuario_model');

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

    public function sair()
    {
        $this->session->sess_destroy();
        redirect($this->config->base_url().'Admin/Mercado');
    }
}
