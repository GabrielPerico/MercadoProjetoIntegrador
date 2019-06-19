<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ADMimagem_model extends CI_Model
{
    public function getImagemProduto($id)
    { 
        $this->db->where('ref_produto', $id);
        $query = $this->db->get('imagem_produto');
        return $query->result();
    }
    public function update($id, $data = array())
    {
        $this->db->where('id_imagemProduto', $id);
        $this->db->update('imagem_produto', $data);
        return $this->db->affected_rows();
    }
}
