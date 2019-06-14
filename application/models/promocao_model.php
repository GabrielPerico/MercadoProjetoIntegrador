<?php
defined('BASEPATH') or exit('No direct script access allowed');

class promocao_model extends CI_Model
{
    public function getAll()
    {
        $query = $this->db->get('promocao');
        return $query->result();
    }
}