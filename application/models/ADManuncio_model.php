<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ADManuncio_model extends CI_Model
{
    public function getAnuncios()
    {
        $query = $this->db->get('anuncios');
        return $query->result();
    }
    public function insert($data = array())
    {
        $this->db->insert('anuncios', $data);
        return $this->db->affected_rows();
    }
    public function mostrar($id, $data = array())
    {
        $this->db->where('id_anuncios', $id);
        $this->db->update('anuncios', $data);
        return $this->db->affected_rows();
    }
    public function delete($id)
    {
        $this->db->where('id_anuncios', $id);
        $this->db->delete('anuncios');
        return $this->db->affected_rows();
    }
}
