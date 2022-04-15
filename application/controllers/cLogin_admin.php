<?php

defined('BASEPATH') or exit('No direct script access allowed');

class cLogin_admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mLogin');
    }
    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/login');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $data = $this->mLogin->login_admin($username, $password);
            if ($data) {
                $id = $data->id_user;
                $this->session->set_userdata('id', $id);
                $this->session->set_flashdata('success', 'Selamat Datang Admin!');
                redirect('Admin/Dasboard');
            } else {
                $this->session->set_flashdata('error', 'Username dan Password Salah!');
                redirect('');
            }
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('id');
        $this->session->set_flashdata('success', 'Anda Berhasil LogOut!');
        redirect('');
    }
}
        
    /* End of file  Login.php */
