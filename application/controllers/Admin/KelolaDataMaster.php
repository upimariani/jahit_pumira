<?php

defined('BASEPATH') or exit('No direct script access allowed');

class KelolaDataMaster extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mKelolaDataMaster');
    }

    //kelola data user
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
        $this->form_validation->set_rules('no_tlp', 'No Telepon', 'required|min_length[11]|max_length[13]');
        $this->form_validation->set_rules('level', 'Level', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');


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
    public function edit_user($id)
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_tlp', 'No Telepon', 'required|min_length[11]|max_length[13]');
        $this->form_validation->set_rules('level', 'Level', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'user' => $this->mKelolaDataMaster->edit_user($id)
            );
            $this->load->view('Admin/layouts/head');
            $this->load->view('Admin/layouts/header');
            $this->load->view('Admin/layouts/aside');
            $this->load->view('Admin/User/update_user', $data);
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
            $this->mKelolaDataMaster->update_user($id, $data);
            $this->session->set_flashdata('success', 'Data User Berhasil Diperbaharui!');
            redirect('Admin/KelolaDataMaster/user');
        }
    }
    public function delete_user($id)
    {
        $this->mKelolaDataMaster->delete_user($id);
        $this->session->set_flashdata('success', 'Data User Berhasil Dihapus!');
        redirect('Admin/KelolaDataMaster/user');
    }

    //kelola data kategori produk
    public function kategori()
    {
        $this->form_validation->set_rules('nama', 'Nama Kategori', 'required|is_unique[kategori.nama_kategori]');

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'kategori' => $this->mKelolaDataMaster->select_kategori()
            );
            $this->load->view('Admin/layouts/head');
            $this->load->view('Admin/layouts/header');
            $this->load->view('Admin/layouts/aside');
            $this->load->view('Admin/Kategori/kategori', $data);
            $this->load->view('Admin/layouts/footer');
        } else {
            $data = array(
                'nama_kategori' => $this->input->post('nama')
            );
            $this->mKelolaDataMaster->insert_kategori($data);
            $this->session->set_flashdata('success', 'Data Kategori Produk Berhasil Disimpan!');
            redirect('Admin/KelolaDataMaster/kategori');
        }
    }
    public function update_kategori($id)
    {
        $data = array(
            'nama_kategori' => $this->input->post('nama')
        );
        $this->mKelolaDataMaster->update_kategori($id, $data);
        $this->session->set_flashdata('success', 'Data Kategori Produk Berhasil Diperbaharui!');
        redirect('Admin/KelolaDataMaster/kategori');
    }
    public function delete_kategori($id)
    {
        $this->mKelolaDataMaster->delete_kategori($id);
        $this->session->set_flashdata('success', 'Data Kategori Produk Berhasil Dihapus!');
        redirect('Admin/KelolaDataMaster/kategori');
    }
}
        
    /* End of file  KelolaDataMaster.php */
