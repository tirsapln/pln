<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_user');
    }
	public function index()
	{
        $data = array (
            'title' => 'PLN ULP Tondano',
            'title2' => 'User',
            'user' => $this->m_user->lists(),
            'isi'   => 'admin/v_user',
        );
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }
    
    public function add()
    {
     $data = array(
         'nama_user' => $this ->input->post('nama_user'),
         'username' => $this ->input->post('username'),
         'password' => $this ->input->post('password'),
         'level' => $this ->input->post('level')

        );

    $this->m_user->add($data);
    $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan !!!');
    redirect('user');
    }

    public function edit($id_user)
    {
     $data = array(
         'id_user' => $id_user,
         'nama_user' => $this ->input->post('nama_user'),
         'username' => $this ->input->post('username'),
         'password' => $this ->input->post('password'),
         'level' => $this ->input->post('level')
        );

    $this->m_user->edit($data);
    $this->session->set_flashdata('pesan', 'Data Berhasil Ubah !!!');
    redirect('user');
    }

    public function delete($id_user)
    {
     $data = array(
         'id_user' => $id_user,
         
        );

    $this->m_user->delete($data);
    $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus!!!');
    redirect('user');
    }

}