<?php

defined('BASEPATH') or exit('No direct script access allowed');

class KelolaDataMaster extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mKelolaDataMaster');
    }


    public function user()
    {
        $data = array(
            'user' => $this->mKelolaDataMaster->select_user()
        );
        $this->load->view('Admin/layouts/head');
        $this->load->view('Admin/layouts/header');
        $this->load->view('Admin/layouts/aside');
        $this->load->view('Admin/User/user', $data);
        $this->load->view('Admin/layouts/footer');
    }
    public function create_user()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_tlp', 'No Telepon', 'trim|required');
        $this->form_validation->set_rules('level', 'Level', 'trim|required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Admin/layouts/head');
            $this->load->view('Admin/layouts/header');
            $this->load->view('Admin/layouts/aside');
            $this->load->view('Admin/User/create_user');
            $this->load->view('Admin/layouts/footer');
        } else {
            $data = array(
                'nama_user' => $this->input->post('nama'),
                'alamat_user' => $this->input->post('alamat'),
                'no_hp' => $this->input->post('no_tlp'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'level_user' => $this->input->post('level'),
            );
            $this->mKelolaDataMaster->create_user($data);
            $this->session->set_flashdata('success', 'Data User Berhasil Ditambahkan!');
            redirect('Admin/KelolaDataMaster/user');
        }
    }
}
        
    /* End of file  KelolaDataMaster.php */
