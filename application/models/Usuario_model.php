<?php

class Usuario_model extends CI_Model
{
    public function getUsuario($email, $senha)
    {
        $this->db->where('tx_email', $email);
        $this->db->where('tx_senha', sha1($senha . 'gabrielSENAC'));

        $query = $this->db->get('usuario');
        return $query->row(0);
    }

    public function verificaLogin()
    {
        $logado = $this->session->userdata('logado');
        $idUsuario = $this->session->userdata('idUsuario');
        if ((!isset($logado)) || ($logado != true) || ($idUsuario <= 0)) {
            redirect('Admin/Usuario/login');
        }
    }

    public function getOneUser($email)
    {
        $this->db->where('tx_email', $email);
        $query = $this->db->get('usuario');
        return $query->row(0);
    }

    public function changePass($email, $senha)
    {
        if ($email) {
            $this->db->where('tx_email', $email);
            $this->db->update('usuario', $senha);
            return $this->db->affected_rows();
        } else {
            return false;
        }
    }
}
