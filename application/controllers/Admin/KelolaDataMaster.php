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
        $this->protect->protect_admin();
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
            $this->protect->protect_admin();
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
            $this->protect->protect_admin();
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

    //kelola data produk
    public function produk()
    {
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('nama', 'Nama Produk', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->protect->protect_admin();
            $data = array(
                'produk' => $this->mKelolaDataMaster->select_produk(),
                'kategori' => $this->mKelolaDataMaster->select_kategori(),
            );
            $this->load->view('Admin/layouts/head');
            $this->load->view('Admin/layouts/header');
            $this->load->view('Admin/layouts/aside');
            $this->load->view('Admin/Produk/produk', $data);
            $this->load->view('Admin/layouts/footer');
        } else {
            $config['upload_path']          = './asset/foto-produk';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 5000;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar')) {
                $data = array(
                    'produk' => $this->mKelolaDataMaster->select_produk(),
                    'kategori' => $this->mKelolaDataMaster->select_kategori(),
                    'error' => $this->upload->display_errors()
                );
                $this->load->view('Admin/layouts/head');
                $this->load->view('Admin/layouts/header');
                $this->load->view('Admin/layouts/aside');
                $this->load->view('Admin/Produk/produk', $data);
                $this->load->view('Admin/layouts/footer');
            } else {
                $upload_data =  $this->upload->data();
                $data = array(
                    'id_kategori' => $this->input->post('kategori'),
                    'nama_produk' => $this->input->post('nama'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'gambar' => $upload_data['file_name'],
                    'berat' => $this->input->post('berat')
                );
                $this->mKelolaDataMaster->insert_produk($data);

                //menambahkan diskon default yaitu 0
                $id = $this->mKelolaDataMaster->id_produk();
                $a = $id->id;
                $diskon = array(
                    'id_produk' => $a,
                    'nama_diskon' => '0',
                    'besar_diskon' => '0',
                    'tgl_selesai' => '0'
                );
                $this->mKelolaDataMaster->data_diskon($diskon);
                $this->session->set_flashdata('success', 'Data Produk Berhasil Disimpan!');
                redirect('Admin/KelolaDataMaster/produk', 'refresh');
            }
        }
    }
    public function update_produk($id)
    {
        $this->form_validation->set_rules('nama', 'Nama Produk', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori Produk', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi Produk', 'required');
        if ($this->form_validation->run() == TRUE) {
            $config['upload_path']          = './asset/foto-produk/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 5000;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar')) {
                $data = array(
                    'kategori' => $this->mKelolaDataMaster->select_kategori(),
                    'produk' => $this->mKelolaDataMaster->edit_produk($id)
                );
                $this->load->view('Admin/layouts/head');
                $this->load->view('Admin/layouts/header');
                $this->load->view('Admin/layouts/aside');
                $this->load->view('Admin/Produk/update_produk', $data);
                $this->load->view('Admin/layouts/footer');
            } else {
                $produk = $this->mKelolaDataMaster->select_produk();
                if ($produk->gambar !== "") {
                    unlink('./asset/foto-produk/' . $produk->gambar);
                }
                $upload_data =  $this->upload->data();
                $data = array(
                    'id_kategori' => $this->input->post('kategori'),
                    'nama_produk' => $this->input->post('nama'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'gambar' => $upload_data['file_name'],
                    'berat' => $this->input->post('berat')
                );
                $this->mKelolaDataMaster->update_produk($id, $data);
                $this->session->set_flashdata('success', 'Data Produk Berhasil Diperbaharui !!!');
                redirect('Admin/KelolaDataMaster/produk');
            } //tanpa ganti gambar
            $data = array(
                'id_kategori' => $this->input->post('kategori'),
                'nama_produk' => $this->input->post('nama'),
                'deskripsi' => $this->input->post('deskripsi'),
                'berat' => $this->input->post('berat')
            );
            $this->mKelolaDataMaster->update_produk($id, $data);
            $this->session->set_flashdata('success', 'Data Produk Berhasil Diperbaharui !!!');
            redirect('Admin/KelolaDataMaster/produk');
        }
        $data = array(
            'kategori' => $this->mKelolaDataMaster->select_kategori(),
            'produk' => $this->mKelolaDataMaster->edit_produk($id)
        );
        $this->load->view('Admin/layouts/head');
        $this->load->view('Admin/layouts/header');
        $this->load->view('Admin/layouts/aside');
        $this->load->view('Admin/Produk/update_produk', $data);
        $this->load->view('Admin/layouts/footer');
    }
    public function delete_produk($id)
    {
        $this->mKelolaDataMaster->delete_produk($id);
        $this->mKelolaDataMaster->del_size_all($id);
        $this->session->set_flashdata('success', 'Data Produk Berhasil Dihapus!!!');
        redirect('Admin/KelolaDataMaster/produk');
    }
    //kelola data size produk
    public function size($id)
    {
        $this->form_validation->set_rules('size', 'Size', 'required');
        $this->form_validation->set_rules('stok', 'Stok', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->protect->protect_admin();
            $data = array(
                'size' => $this->mKelolaDataMaster->size($id)
            );
            $this->load->view('Admin/layouts/head');
            $this->load->view('Admin/layouts/header');
            $this->load->view('Admin/layouts/aside');
            $this->load->view('Admin/Produk/size', $data);
            $this->load->view('Admin/layouts/footer');
        } else {
            $data = array(
                'id_produk' => $id,
                'size' => $this->input->post('size'),
                'stok' => $this->input->post('stok'),
                'harga' => $this->input->post('harga')
            );
            $this->mKelolaDataMaster->insert_size($data);
            $this->session->set_flashdata('success', 'Data Size Berhasil Disimpan!');
            redirect('Admin/KelolaDataMaster/size/' . $id);
        }
    }
    public function delete_size($id, $id_produk)
    {
        $this->mKelolaDataMaster->delete_size($id);
        $this->session->set_flashdata('success', 'Data Size Berhasil Dihapus!');
        redirect('Admin/KelolaDataMaster/size/' . $id_produk);
    }
    public function edit_size($id, $id_produk)
    {
        $this->form_validation->set_rules('size', 'Size', 'required');
        $this->form_validation->set_rules('stok', 'Stok', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');


        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'size' => $this->mKelolaDataMaster->edit_size($id)
            );
            $this->load->view('Admin/layouts/head');
            $this->load->view('Admin/layouts/header');
            $this->load->view('Admin/layouts/aside');
            $this->load->view('Admin/Produk/update_size', $data);
            $this->load->view('Admin/layouts/footer');
        } else {
            $data = array(
                'size' => $this->input->post('size'),
                'stok' => $this->input->post('stok'),
                'harga' => $this->input->post('harga'),
            );
            $this->mKelolaDataMaster->update_size($id, $data);
            $this->session->set_flashdata('success', 'Data Size Berhasil Diperbaharui!');
            redirect('Admin/KelolaDataMaster/size/' . $id_produk);
        }
    }

    //kelola data diskon
    public function diskon()
    {
        $this->form_validation->set_rules('produk', 'Produk', 'required');
        $this->form_validation->set_rules('nama', 'Nama Diskon', 'required');
        $this->form_validation->set_rules('besar', 'Besar Diskon', 'required');
        $this->form_validation->set_rules('tgl_selesai', 'Tanggal Selesai', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->protect->protect_admin();
            $data = array(
                'diskon' => $this->mKelolaDataMaster->diskon(),
                'produk' => $this->mKelolaDataMaster->produk_sd()
            );
            $this->load->view('Admin/layouts/head');
            $this->load->view('Admin/layouts/header');
            $this->load->view('Admin/layouts/aside');
            $this->load->view('Admin/Diskon/diskon', $data);
            $this->load->view('Admin/layouts/footer');
        } else {
            $id = $this->input->post('produk');
            $data = array(

                'nama_diskon' => $this->input->post('nama'),
                'besar_diskon' => $this->input->post('besar'),
                'tgl_selesai' => $this->input->post('tgl_selesai')
            );
            $this->mKelolaDataMaster->update_diskon($id, $data);
            $this->session->set_flashdata('success', 'Data Diskon Berhasil Ditambahkan!');
            redirect('Admin/KelolaDataMaster/diskon');
        }
    }
    //menampilkan harga setelah diskon dengan json
    public function produk_diskon($id)
    {
        $data['diskon'] = $this->mKelolaDataMaster->produk_diskon($id);
        header('Content-Type: application/json');
        echo json_encode($data);
    }
    public function update_diskon($id)
    {
        $this->form_validation->set_rules('nama', 'Nama Diskon', 'required');
        $this->form_validation->set_rules('besar', 'Besar Diskon', 'required');
        $this->form_validation->set_rules('tgl_selesai', 'Tanggal Selesai Diskon', 'required');


        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'diskon' => $this->mKelolaDataMaster->edit_diskon($id)
            );
            $this->load->view('Admin/layouts/head');
            $this->load->view('Admin/layouts/header');
            $this->load->view('Admin/layouts/aside');
            $this->load->view('Admin/Diskon/update_diskon', $data);
            $this->load->view('Admin/layouts/footer');
        } else {
            $data = array(
                'nama_diskon' => $this->input->post('nama'),
                'besar_diskon' => $this->input->post('besar'),
                'tgl_selesai' => $this->input->post('tgl_selesai'),
            );
            $this->mKelolaDataMaster->update_diskon($id, $data);
            $this->session->set_flashdata('success', 'Data Diskon Berhasil Diperbaharui!');
            redirect('Admin/KelolaDataMaster/diskon');
        }
    }
    public function delete_diskon($id)
    {
        $data = array(
            'nama_diskon' => '0',
            'besar_diskon' => '0',
            'tgl_selesai' => '0'
        );
        $this->mKelolaDataMaster->update_diskon($id, $data);
        $this->session->set_flashdata('success', 'Data Diskon Berhasil Dihapus!');
        redirect('Admin/KelolaDataMaster/diskon');
    }
}
        
    /* End of file  KelolaDataMaster.php */
