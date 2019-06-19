<?php
defined('BASEPATH') or exit('No direct script access allowed');

class home_model extends CI_Model
{
    public function getAnuncios()
    {
        $query = $this->db->get('anuncios');
        return $query->result();
    }
    public function getProdutos()
    { 
        $query = $this->db->get('produto');
        return $query->result();
    }
    public function getPromocao()
    { 
        $this->db->join('produtos_em_promocao', 'produtos_em_promocao.ref_promocao = promocao.id_promocao', 'inner');
        $this->db->where("CURRENT_TIMESTAMP() BETWEEN promocao.dt_inicioDaPromocao AND promocao.dt_fimDaPromocao");
        $query = $this->db->get('promocao');
        return $query->result();
    }
    public function getDepartamentos()
    {
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
}
