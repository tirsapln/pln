<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_realisasi extends CI_Model 
{
    public function tampil_data()
    {  
        return $this->db->get('tb_realisasi');
    }
    public function lists()
    {
        $this->db->select('*');
        $this->db->from('tb_realisasi');
        $this->db->order_by('id_realisasi ', 'ASC');
        return $this->db->get()->result();
        //$this->db->where('keterangan', 'Tebang');
        //$this->db->order_by('keterangan', 'ASC');
        //return $this->db->get()->result();
    }

    public function pangkas()
    {
        $this->db->select('*');
        $this->db->from('tb_realisasi');
        
        $this->db->where('keterangan', 'Pangkas');
        $this->db->order_by('keterangan', 'ASC');
        return $this->db->get()->result();
    }

    public function belum()
    {
        $this->db->select('*');
        $this->db->from('tb_realisasi');
        
        $this->db->where('keterangan', '-');
        $this->db->order_by('keterangan', 'ASC');
        return $this->db->get()->result();
    }

    public function padam()
    {
        $this->db->select('*');
        $this->db->from('tb_realisasi');
        
        $this->db->where('keterangan', 'Perlu Padam');
        $this->db->order_by('keterangan', 'ASC');
        return $this->db->get()->result();
    }

    public function tebang()
    {
        $this->db->select('*');
        $this->db->from('tb_realisasi');
        
        $this->db->where('keterangan', 'Tebang');
        $this->db->order_by('keterangan', 'ASC');
        return $this->db->get()->result();
    }

    public function kategori($realisasi)
    {
        $this->db->select('*');
        $this->db->from('tb_realisasi');
        
        $this->db->where('tanggal', $realisasi);
        $this->db->order_by('tanggal', 'ASC');
        return $this->db->get()->result();
    }

    public function grafikkategori($grafik)
    {
        $this->db->select('keterangan, COUNT(keterangan) as total');
        $this->db->from('tb_realisasi');
        $this->db->where('tanggal', $grafik);
        $this->db->group_by('keterangan');
        $this->db->order_by('keterangan', 'desc');
        //$this->db->order_by('id_realisasi ', 'ASC');
        return $this->db->get()->result();
    }

    public function kategoripdf()
    {
        $this->db->select('tanggal');
        $this->db->from('tb_realisasi');
        //$this->db->where('tanggal');
        $this->db->group_by('tanggal');
        $this->db->order_by('tanggal', 'desc');
        //$this->db->order_by('id_realisasi ', 'ASC');
        return $this->db->get()->result();
    }

    public function kategoriwo()
    {
        $this->db->select('tanggal, lokasi');
        $this->db->from('tb_realisasi');
        //$this->db->where('tanggal');
        $this->db->group_by('tanggal, lokasi');
        $this->db->order_by('tanggal, lokasi', 'desc');
        //$this->db->order_by('id_realisasi ', 'ASC');
        return $this->db->get()->result();
    }

    public function grafik()
    {
        $this->db->select('keterangan, COUNT(keterangan) as total');
        $this->db->from('tb_realisasi');
        $this->db->group_by('keterangan');
        $this->db->order_by('keterangan', 'desc');
        //$this->db->order_by('id_realisasi ', 'ASC');
        return $this->db->get()->result();
    }

    public function add($data)
    {
        $this->db->insert('tb_realisasi', $data);
    }

    public function detail($id_realisasi)
    {
        $this->db->select('*');
        $this->db->from('tb_realisasi');
        $this->db->where('id_realisasi', $id_realisasi);
        return $this->db->get()->row();

    }
    
    public function edit($data)
    {
        $this->db->where('id_realisasi', $data['id_realisasi']);
        $this->db->update('tb_realisasi', $data);

    }

    public function delete($data)
    {
        $this->db->where('id_realisasi', $data['id_realisasi']);
        $this->db->delete('tb_realisasi', $data);

    }

    public function view()
    {
        return $this->db->get('tb_realisasi')->result();

    }

    public function upload_file($filename)
    {
        $this->load->library('upload');
        $config['upload_path']= './excel/';
        $config['allowed_types'] = 'xlsx';
        $config['max_size'] = '2048';
        $config['overwrite'] = true;
        $config['file_name'] = $filename;

        $this->upload->initialize($config);
        if($this->upload->do_upload('file'))
        {
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
            return $return;

        }
        else
        {
            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
			return $return;
        }

    }

    public function insert_multiple($data)
    {
        $this->db->insert_batch('tb_realisasi', $data);
    }


}

