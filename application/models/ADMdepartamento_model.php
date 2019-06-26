<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ADMdepartamento_model extends CI_Model
{
    public function getOne($id)
    {
        $this->db->where('id_departamento', $id);
        $query = $this->db->get('departamento');
        return $query->row();
    }
    public function getAll()
    {
        $this->db->select('departamento.*,(SELECT count(categoria.id_categoria) FROM categoria WHERE ref_departamento = departamento.id_departamento) as num_categorias');
        
        $query = $this->db->get('departamento');
        return $query->result();
    }
    public function update($id, $data = array())
    {
        $this->db->where('id_departamento', $id);
        $this->db->update('departamento', $data);
        return $this->db->affected_rows();
    }
    public function insert($data = array())
    {
        $this->db->insert('departamento', $data);
        return $this->db->affected_rows();
    }
    public function delete($id)
    {
        $this->db->where('id_departamento', $id);
        $this->db->delete('departamento');
        return $this->db->affected_rows();
    }
}
