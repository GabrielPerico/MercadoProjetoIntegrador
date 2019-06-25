<?php
defined('BASEPATH') or exit('No direct script access allowed');

class produto_model extends CI_Model
{
    public function getMercado()
    {
        $query = $this->db->get('mercado');
        return $query->row();
    }
    public function getProduto($id)
    {
        $this->db->where('id_produto', $id);
        $query = $this->db->get('produto');
        return $query->row();
    }
    public function getImagens($id){
        $this->db->where('ref_produto', $id);
        $query = $this->db->get('imagem_produto');
        return $query->result();
        
    }
}
