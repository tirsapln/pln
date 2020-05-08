<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wo extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_wo');
        $this->load->model('m_realisasi');
    }
	public function index()
	{
        $data = array (
            'title' => 'PLN Tondano',
            'title2' => 'Daftar Work Order',
            'wo' => $this->m_wo->lists(),
            'realisasi' => $this->m_realisasi->lists(),
            'isi'   => 'admin/wo/v_list',
        );
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }
    
    public function add()
    {
        
        $this->form_validation->set_rules('id_realisasi', 'Tanggal', 'required');
        
        if($this->form_validation->run() == TRUE) 
        {
    
        $data = array(
         'id_realisasi' => $this->input->post('id_realisasi'),
        );
        
        $this->m_wo->add($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan !!!');
        redirect('wo');
        }

        $data = array (
            'title' => 'PLN Tondano',
            'title2' => 'Tambah Work Order',
            'realisasi' => $this->m_realisasi->lists(),
            'isi'   => 'admin/wo/v_add'
        );
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    } 

    public function edit()
    {
        
        $this->form_validation->set_rules('id_realisasi', 'Tanggal', 'required');
        
        if($this->form_validation->run() == TRUE) 
        {
    
        $data = array(
        'id_wo'         => $id_wo,
         'id_realisasi' => $this->input->post('id_realisasi'),
        );
        
        $this->m_wo->edit($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan !!!');
        redirect('wo');
        }

        $data = array (
            'title' => 'PLN Tondano',
            'title2' => 'Tambah Work Order',
            'wo' => $this->m_wo->detail($id_wo),
            'realisasi' => $this->m_realisasi->lists(),
            'isi'   => 'admin/wo/v_edit'
        );
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    } 

    public function delete($id_wo)
    {
        

        $data = array ('id_wo' => $id_wo);
        $this->m_wo->delete($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Di Hapus !!');
        redirect('wo');

         
    }
    


    

}