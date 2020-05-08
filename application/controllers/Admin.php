<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('m_wo');
        $this->load->model('m_realisasi');
    }

	public function index()
	{
        $data = array (
            'title'     => 'PLN ULP Tondano',
            'title2'    => 'Dashboard',
            'wo' => $this->m_wo->lists(),
            //'tgl'=>$this->m_realisasi->kategori(),
            'realisasi' => $this->m_realisasi->kategoriwo(),
            'isi'       => 'admin/v_home',
        );
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
	}
}