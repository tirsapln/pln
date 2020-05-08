<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_keterangan extends CI_Model {

	
	public function lists()
	{
        $this->db->select('*');
        $this->db->from('tb_keterangan');
        $this->db->order_by('id_keterangan', 'desc');
        return $this->db->get()->result();
    }
    
    public function add($data)
    {
        $this->db->insert('tb_keterangan', $data);
    }

    public function edit($data)
    {
        $this->db->where('id_keterangan', $data['id_keterangan']);
        $this->db->update('tb_keterangan', $data);
    }

    public function delete($data)
    {
        $this->db->where('id_keterangan', $data['id_keterangan']);
        $this->db->delete('tb_keterangan', $data);
    }
}