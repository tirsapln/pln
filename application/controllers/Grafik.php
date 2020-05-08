<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grafik extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_realisasi');
        $this->load->helper(array('form','url'));
    }


	public function index()
	{
        $data = array (
            'title' => 'PLN ULP Tondano',
            'title2' => 'Grafik',
            'grafik' => $this->m_realisasi->grafik(),
            'realisasi' => $this->m_realisasi->kategoriwo(),
            'isi'   => 'admin/v_grafik',
        );
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }
    public function kategori()
	{
        $tanggal = $this->uri->segment(3);
        $data = array (
            'title' => 'PLN ULP Tondano',
            'title2' => 'Grafik',
            'grafik' => $this->m_realisasi->grafikkategori($tanggal),
            //'realisasi' => $this->m_realisasi->lists(),
            'isi'   => 'admin/v_grafikkategori',
        );
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }
    
    public function getgrafik()
    {
        $data = $this->m_realisasi->grafik();
        echo json_encode($data);
    }
}