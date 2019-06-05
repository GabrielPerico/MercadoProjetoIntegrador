<?php
defined('BASEPATH') or exit('No direct script access allowed');

class produto_model extends CI_Model
{
    public function getAll()
    {
        $this->db->select('produto.id_produto,produto.tx_nome,produto.tx_descricao,produto.vl_preco,produto.tx_marca,produto.num_parcelamentoMaximo,categoria.tx_nome AS tx_nomeC,fornecedor.tx_nome AS tx_nomeF,imagem_produto.img_imagem');
        $this->db->join('imagem_produto', 'imagem_produto.ref_produto = produto.id_produto', 'inner');
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
        $this->db->where('id_categoria', $id);
        $query = $this->db->get('categoria');
        return $query->row();
    }
    public function update($id, $data = array())
    {
        $this->db->where('id_categoria', $id);
        $this->db->update('categoria', $data);
        return $this->db->affected_rows();
    }
    public function insert($data = array())
    {
        $this->db->insert('categoria', $data);
        return $this->db->affected_rows();
    }
    public function delete($id)
    {
        $this->db->where('id_categoria', $id);
        $this->db->delete('categoria');
        return $this->db->affected_rows();
    }
}
