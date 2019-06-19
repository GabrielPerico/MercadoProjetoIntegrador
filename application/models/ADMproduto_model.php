<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ADMproduto_model extends CI_Model
{
    public function getAll()
    {
        $this->db->select('produto.id_produto,produto.tx_nome,produto.tx_descricao,produto.vl_preco,produto.tx_marca,produto.num_parcelamentoMaximo,categoria.tx_nome AS tx_nomeC,fornecedor.tx_nome AS tx_nomeF');
        $this->db->join('fornecedor', 'fornecedor.id_fornecedor = produto.ref_fornecedor', 'inner');
        $this->db->join('categoria', 'categoria.id_categoria = produto.ref_categoria', 'inner');
        $query = $this->db->get('produto');
        return $query->result();
    }
    public function getCategoria()
    {
        $query = $this->db->get('categoria');
        return $query->result();
    }
    public function getFornecedor()
    {
        $query = $this->db->get('fornecedor');
        return $query->result();
    }
    public function getOne($id)
    {
        $this->db->where('id_produto', $id);
        $query = $this->db->get('produto');
        return $query->row();
    }
    public function update($id, $data = array())
    {
        $this->db->where('id_produto', $id);
        $this->db->update('produto', $data);
        return $this->db->affected_rows();
    }
    public function insert($data = array())
    {
        $this->db->insert('produto', $data);
        return $this->db->affected_rows();
    }
    public function delete($id)
    {
        $this->db->where('id_produto', $id);
        $this->db->delete('produto');
        return $this->db->affected_rows();
    }
}
