<?php
defined('BASEPATH') or exit('No direct script access allowed');

class promocao_model extends CI_Model
{
    public function getAll()
    {
        $query = $this->db->get('promocao');
        return $query->result();
    }
    public function getOne($id)
    {
        $this->db->where('id_promocao', $id);
        $query = $this->db->get('promocao');
        return $query->row();
    }
    public function insert($data)
    {
        $this->db->insert('promocao', $data);
        return $this->db->affected_rows();
    }
    public function delete($id)
    {
        $this->db->where('id_promocao', $id);
        $this->db->delete('promocao');
        return $this->db->affected_rows();
    }
    public function getProdutosP($id)
    {
        $this->db->select('produto.id_produto,produtos_em_promocao.num_porcentagem,promocao.id_promocao,produto.tx_nome,promocao.tx_nome as tx_nomeP,produtos_em_promocao.id_pep');

        $this->db->join('produto', 'produtos_em_promocao.ref_produtos = produto.id_produto', 'inner');
        $this->db->join('promocao', 'produtos_em_promocao.ref_promocao = promocao.id_promocao', 'inner');
        $this->db->where('ref_promocao', $id);
        $query = $this->db->get('produtos_em_promocao');
        return $query->result();
    }
}
