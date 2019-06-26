<?php
defined('BASEPATH') or exit('No direct script access allowed');

class produtosempromocao_model extends CI_Model
{
    public function getMercado()
    {
        $query = $this->db->get('mercado');
        return $query->row();
    }
    public function getDepartamentos()
    {

        $this->db->order_by('tx_nome', 'asc');
        $query = $this->db->get('departamento');
        return $query->result();
    }
    public function getProdutos()
    {
        $this->db->select('produtos_em_promocao.num_porcentagem,produtos_em_promocao.ref_produto,produtos_em_promocao.ref_promocao,promocao.*,produto.id_produto,produto.tx_nome AS tx_nomeP,produto.ref_categoria,produto.vl_preco,imagem_produto.img_imagem');
        $this->db->join('promocao', 'produtos_em_promocao.ref_promocao = promocao.id_promocao', 'inner');
        $this->db->join('produto', 'produto.id_produto = produtos_em_promocao.ref_produto', 'inner');
        $this->db->join('imagem_produto', 'produto.id_produto = imagem_produto.ref_produto', 'left');
        $this->db->where('CURRENT_TIMESTAMP() BETWEEN promocao.dt_inicioDaPromocao AND promocao.dt_fimDaPromocao');
        $this->db->group_by('produto.id_produto');
        $query = $this->db->get('produtos_em_promocao');
        return $query->result();
    }
}
