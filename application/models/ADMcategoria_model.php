<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ADMcategoria_model extends CI_Model
{   
    public function getDepartamento(){
        $query = $this->db->get('departamento');
        return $query->result();
    }
    public function getOne($id)
    {
        $this->db->where('id_categoria', $id);
        $query = $this->db->get('categoria');
        return $query->row();
    }
    public function getAll()
    {
        $this->db->select('categoria.*,departamento.tx_nome as tx_nomeD');
        
        $this->db->join('departamento', 'departamento.id_departamento = categoria.ref_departamento', 'inner');
        $query = $this->db->get('categoria');
        return $query->result();
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
