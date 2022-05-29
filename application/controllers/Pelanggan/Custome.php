<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Custome extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mStatusOrder');
        $this->load->model('mKelolaDataMaster');
    }


    public function index()
    {
        $this->protect->protect();
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('pjng_baju', 'Panjang Baju', 'required');
        $this->form_validation->set_rules('bahu', 'Ukuran Bahu', 'required');
        $this->form_validation->set_rules('pundak', 'Ukuran Pundak', 'required');


        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'kategori' => $this->mKelolaDataMaster->select_kategori()
            );
            $this->load->view('Pelanggan/Layouts/head');
            $this->load->view('Pelanggan/Layouts/topend');
            $this->load->view('Pelanggan/Layouts/categori', $data);
            $this->load->view('Pelanggan/custome');
        } else {
            $config['upload_path']          = './asset/model-baju';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 5000;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar')) {
                $error = array(
                    'error' => $this->upload->display_errors(),
                    'kategori' => $this->mKelolaDataMaster->select_kategori()
                );
                $this->load->view('Pelanggan/Layouts/head');
                $this->load->view('Pelanggan/Layouts/topend');
                $this->load->view('Pelanggan/Layouts/categori', $error);
                $this->load->view('Pelanggan/custome',  $error);
            } else {
                $upload_data = $this->upload->data();
                $data = array(
                    'id_transaksi' => $this->input->post('id_transaksi'),
                    'id_customer' => $this->session->userdata('id'),
                    'tgl_transaksi' => date('Y-m-d'),
                    'alamat' => $this->input->post('alamat'),
                    'provinsi' => $this->input->post('provinsi'),
                    'kota' => $this->input->post('kota'),
                    'ekspedisi' => $this->input->post('expedisi'),
                    'estimasi' => $this->input->post('estimasi'),
                    'ongkir' => $this->input->post('ongkir'),
                    'status_order' => '0',
                    'status_pesan' => '1',
                    'total_bayar' => '0'
                );
                $this->db->insert('transaksi', $data);

                $custom = array(
                    'id_transaksi' => $this->input->post('id_transaksi'),
                    'nama_bahan' => $this->input->post('nama'),
                    'pjng_baju' => $this->input->post('pjng_baju'),
                    'pjng_lengan' => $this->input->post('pjng_lengan'),
                    'bahu' => $this->input->post('bahu'),
                    'pundak' => $this->input->post('pundak'),
                    'gambar_model' => $upload_data['file_name']
                );
                $this->db->insert('custom', $custom);

                $this->session->set_flashdata('success', 'Pesanan Anda Berhasil Disimpan!');
                redirect('pelanggan/katalog/status_order');
            }
        }
    }
    public function detail_custome($id)
    {
        $data = array(
            'dcustom' => $this->mStatusOrder->detail_custom($id),
            'kategori' => $this->mKelolaDataMaster->select_kategori()
        );
        $this->load->view('Pelanggan/Layouts/head');
        $this->load->view('Pelanggan/Layouts/topend');
        $this->load->view('Pelanggan/Layouts/categori', $data);
        $this->load->view('Pelanggan/detail_custom', $data);
        $this->load->view('pelanggan/Layouts/footer');
    }
}

/* End of file Custome.php */
