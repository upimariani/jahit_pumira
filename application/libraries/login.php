<?php
defined('BASEPATH') or exit('No direct script access allowed');

class login
{
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
        $this->ci->load->model('mLogin_admin');
    }
    public function login($username, $password)
    {
        $cek = $this->ci->mLogin_admin->login_user($username, $password);
        if ($cek) {
            $id = $cek->id_user;

            //session
            $this->ci->session->set_userdata('id', $id);
            redirect('Admin/Dasboard');
        } else {
            //jika salah
            $this->ci->session->set_flashdata('error', 'Username Atau Password Salah');
            redirect('Admin/Login');
        }
    }
    public function cek_halaman()
    {
        if ($this->ci->session->userdata('id') == '') {
            $this->ci->session->set_flashdata('error', 'Anda Belum login');
        }
    }
    public function logout()
    {
        $this->ci->session->unset_userdata('id');
        $this->ci->session->set_flashdata('pesan', 'Anda Berhasil Logout!!');
        redirect('Admin/Login');
    }
}

/* End of file login.php */
