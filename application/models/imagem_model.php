<?php
defined('BASEPATH') or exit('No direct script access allowed');

class imagem_model extends CI_Model
{
    public function getImagemProduto($id)
    { 
        $this->db->where('ref_produto', $id);
        $query = $this->db->get('imagem_produto');
        return $query->result();
    }
}
