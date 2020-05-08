<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_login
{
    protected $ci;

    public function __construct()
    {
        $this->ci =& get_instance();
        $this->ci->load->model('m_login');
    }

    public function login($username, $password)
    {
        $cek=$this->ci->m_login->login($username, $password);
        if($cek)
        {
            $id_user = $cek->id_user;
            $username = $cek->username;
            $nama_user = $cek->nama_user;
            $level = $cek->level;

            $this->ci->session->set_userdata('id_user', $id_user);
            $this->ci->session->set_userdata('username', $username);
            $this->ci->session->set_userdata('nama_user', $nama_user);
            $this->ci->session->set_userdata('level', $level);

            redirect('admin');
        }
        else{
            $this->ci->session->set_flashdata('pesan', 'Username atau Password Salah !!!');
            redirect('login');

        }
    }
    public function cek_login()
    {
        if ($this->ci->session->userdata('username')==""){
            $this->ci->session->set_flashdata('pesan', 'Anda belum Login !!!');
            redirect('login');
        }
    }

    public function logout()
    {
            $this->ci->session->unset_userdata('id_user');
            $this->ci->session->unset_userdata('username');
            $this->ci->session->unset_userdata('nama_user');
            $this->ci->session->unset_userdata('level');
            $this->ci->session->set_flashdata('pesan', 'Logout Sukses!!!');
            redirect('login');
    }
    

	
	
	
}