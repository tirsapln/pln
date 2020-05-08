<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_import extends CI_Model 
{
    public function lists()
    {
        $this->db->select('*');
        $this->db->from('tb_import');
        $this->db->order_by('id_import ', 'asc');
        return $this->db->get()->result();
    }

    public function add($data)
    {
        $this->db->insert('tb_import', $data);
    }

    public function detail($id_import)
    {
        $this->db->select('*');
        $this->db->from('tb_import');
        $this->db->where('id_import', $id_import);
        return $this->db->get()->row();

    }
    
    public function edit($data)
    {
        $this->db->where('id_import', $data['id_import']);
        $this->db->update('tb_import', $data);

    }

    public function delete($data)
    {
        $this->db->where('id_import', $data['id_import']);
        $this->db->delete('tb_import', $data);

    }

}