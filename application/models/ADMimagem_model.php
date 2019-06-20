<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ADMimagem_model extends CI_Model
{
    public function getImagemP($idP)
    {
        $this->db->where('id_imagemProduto', $idP);
        $query = $this->db->get('imagem_produto');
        return $query->row();
    }
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
    public function insert($data = array())
    {
        $insert = $this->db->insert_batch('imagem_produto', $data);
        return $insert ? true : false;
    }
    public function delete($id, $idP)
    {
        $this->db->where('id_imagemProduto', $idP);
        $this->db->where('ref_produto', $id);
        $this->db->delete('imagem_produto');
        return $this->db->affected_rows();
    }
}
