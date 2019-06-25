<?php
defined('BASEPATH') or exit('No direct script access allowed');

class departamento_model extends CI_Model
{

    public function getCategoria($id)
    {
        $this->db->where('ref_departamento', $id);
        $query = $this->db->get('categoria');
        return $query->result();
    }
    public function getMercado()
    {
        $query = $this->db->get('mercado');
        return $query->row();
    }
    public function getProdutos()
    {
        $this->db->select('produto.*,imagem_produto.img_imagem,case when (promocao.id_promocao is null) then NULL ELSE num_porcentagem END AS num_porcentagem');
        $this->db->join('imagem_produto', 'imagem_produto.ref_produto = produto.id_produto', 'left');
        $this->db->join('produtos_em_promocao', 'produto.id_produto = produtos_em_promocao.ref_produto', 'left');
        $this->db->join('promocao', 'promocao.id_promocao = produtos_em_promocao.ref_promocao AND CURRENT_TIMESTAMP() BETWEEN promocao.dt_inicioDaPromocao AND promocao.dt_fimDaPromocao', 'left');
        $this->db->group_by('id_produto');
        $query = $this->db->get('produto');
        return $query->result();
    }
}
