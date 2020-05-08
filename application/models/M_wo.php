<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_wo extends CI_Model {

	
	public function lists()
	{
        $this->db->select('*');
        $this->db->from('tb_wo');
        $this->db->join('tb_realisasi', 'tb_realisasi.id_realisasi = tb_wo.id_realisasi', 'left');
        $this->db->order_by('id_wo', 'desc');
        return $this->db->get()->result();
    }
    
    public function detail($id_wo)
    {
        $this->db->select('*');
        $this->db->from('tb_wo');
        $this->db->join('tb_realisasi', 'tb_realisasi.id_realisasi = tb_wo.id_realisasi', 'left');
        $this->db->where('id_wo', $id_wo);
        return $this->db->get()->row();

    }
    public function add($data)
    {
        $this->db->insert('tb_wo', $data);
    }

    public function edit($data)
    {
        $this->db->where('id_wo', $data['id_wo']);
        $this->db->update('tb_wo', $data);
    }

    public function delete($data)
    {
        $this->db->where('id_wo', $data['id_wo']);
        $this->db->delete('tb_wo', $data);
    }
    
}