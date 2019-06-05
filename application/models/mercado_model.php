<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mercado_model extends CI_Model{

    public function getMercado(){
        $query = $this->db->get('mercado');
        return $query->row();
    }
    public function update($id,$data = array()){
        $this->db->where('id_mercado', $id);
        $this->db->update('mercado', $data);
        return $this->db->affected_rows();
        
        
    }
}