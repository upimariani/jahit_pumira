<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mAuth');
    }

    //login
    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Pelanggan/Layouts/head');
            $this->load->view('Pelanggan/Layouts/topend');
            $this->load->view('Pelanggan/Layouts/categori');
            $this->load->view('Pelanggan/login');
            $this->load->view('Pelanggan/Layouts/footer');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $data = $this->mAuth->login($username, $password);
            if ($data) {
                $id = $data->id_customer;
                $this->session->set_userdata('id', $id);
                redirect('pelanggan/katalog');
            } else {
                $this->session->set_flashdata('error', 'Username dan Password Anda Salah!');

                redirect('pelanggan/auth');
            }
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('id');
        $this->session->set_flashdata('success', 'Anda Berhasil Login!');
        redirect('pelanggan/auth', 'refresh');
    }

    //register
    public function register()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('no_hp', 'No Telepon', 'required|min_length[11]|max_length[13]');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('username', 'Nama', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Pelanggan/Layouts/head');
            $this->load->view('Pelanggan/Layouts/topend');
            $this->load->view('Pelanggan/Layouts/categori');
            $this->load->view('Pelanggan/register');
            $this->load->view('Pelanggan/Layouts/footer');
        } else {
            $data = array(
                'nama_customer' => $this->input->post('nama'),
                'alamat_customer' => $this->input->post('alamat'),
                'no_hp' => $this->input->post('no_hp'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password')
            );
            $this->mAuth->register($data);
            $this->session->set_flashdata('success', 'Anda Berhasil Register, Silahkan Login!');
            redirect('pelanggan/auth');
        }
    }
}

/* End of file Auth.php */
