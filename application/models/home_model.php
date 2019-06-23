<?php
defined('BASEPATH') or exit('No direct script access allowed');

class home_model extends CI_Model
{
    public function getAnuncios()
    {
        $query = $this->db->get('anuncios');
        return $query->result();
    }
    public function getProdutosPromocao()
    {
        
        $this->db->select('produtos_em_promocao.num_porcentagem,produtos_em_promocao.ref_produto,produtos_em_promocao.ref_promocao,promocao.*,produto.id_produto,produto.tx_nome AS tx_nomeP,produto.ref_categoria,produto.vl_preco,imagem_produto.img_imagem');
        
        $this->db->join('promocao', 'produtos_em_promocao.ref_promocao = promocao.id_promocao', 'inner');
        $this->db->join('produto', 'produto.id_produto = produtos_em_promocao.ref_produto', 'inner');
        $this->db->join('imagem_produto', 'produto.id_produto = imagem_produto.ref_produto', 'left');
        
        $this->db->where('CURRENT_TIMESTAMP() BETWEEN promocao.dt_inicioDaPromocao AND promocao.dt_fimDaPromocao');
        $this->db->group_by('produto.id_produto');
        
        $this->db->limit(5);
        
        
        
        $query = $this->db->get('produtos_em_promocao');
        return $query->result();
    }
    public function getDepartamentos()
    {
        
        $this->db->order_by('tx_nome', 'asc');
        $query = $this->db->get('departamento');
        return $query->result();
    }
    public function getCategorias()
    {
        $query = $this->db->get('categoria');
        return $query->result();
    }
    public function getMercado()
    {
        $query = $this->db->get('mercado');
        return $query->row();
    }
    public function getProdutosNovos(){
        
        $this->db->select('produto.*,imagem_produto.img_imagem,case when (promocao.id_promocao is null) then NULL ELSE num_porcentagem END AS num_porcentagem');
        $this->db->join('imagem_produto', 'imagem_produto.ref_produto = produto.id_produto', 'left');
        $this->db->join('produtos_em_promocao', 'produto.id_produto = produtos_em_promocao.ref_produto', 'left');
        $this->db->join('promocao', 'promocao.id_promocao = produtos_em_promocao.ref_promocao AND CURRENT_TIMESTAMP() BETWEEN promocao.dt_inicioDaPromocao AND promocao.dt_fimDaPromocao', 'left');
        $this->db->group_by('id_produto');
        $this->db->order_by('tm_dataDoCadastro', 'desc');
        $this->db->limit(11);
        $query = $this->db->get('produto');
        return $query->result();
    }
}
