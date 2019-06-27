<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ADMfornecedores_model extends CI_Model
{
    public function getAll()
    {   
        $this->db->select('fornecedor.*,(SELECT count(produto.ref_fornecedor) FROM produto WHERE ref_fornecedor = id_fornecedor) as num_produtos');
        
        $query = $this->db->get('fornecedor');
        return $query->result();
    }
    public function getOne($id)
    {
        $this->db->where('id_fornecedor', $id);
        $query = $this->db->get('fornecedor');
        return $query->row();
    }
    public function insert($data = array())
    {
        $this->db->insert('fornecedor', $data);
        return $this->db->affected_rows();
    }
    public function update($id, $data = array())
    {
        $this->db->where('id_fornecedor', $id);
        $this->db->update('fornecedor', $data);
        return $this->db->affected_rows();
    }
    public function delete($id)
    {
        $this->db->where('id_fornecedor', $id);
        $this->db->delete('fornecedor');
        return $this->db->affected_rows();
    }
}
