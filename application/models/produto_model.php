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
        $this->db->select('produto.*,imagem_produto.img_imagem,case when (promocao.id_promocao is null) then NULL ELSE num_porcentagem END AS num_porcentagem');
        $this->db->join('imagem_produto', 'imagem_produto.ref_produto = produto.id_produto', 'left');
        $this->db->join('produtos_em_promocao', 'produto.id_produto = produtos_em_promocao.ref_produto', 'left');
        $this->db->join('promocao', 'promocao.id_promocao = produtos_em_promocao.ref_promocao AND CURRENT_TIMESTAMP() BETWEEN promocao.dt_inicioDaPromocao AND promocao.dt_fimDaPromocao', 'left');
        $this->db->group_by('id_produto');
        $this->db->order_by('tm_dataDoCadastro', 'desc');
        $query = $this->db->get('produto');
        return $query->row();
    }
    public function getImagens($id){
        $this->db->where('ref_produto', $id);
        $query = $this->db->get('imagem_produto');
        return $query->result();
        
    }
    public function getDepartamentos()
    {
        
        $this->db->order_by('tx_nome', 'asc');
        $query = $this->db->get('departamento');
        return $query->result();
    }
}
