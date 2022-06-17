<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengembalian extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('mTransaksi');
    }

    public function index()
    {
        $data = array(
            'pengembalian' => $this->mTransaksi->pesanan_masuk()
        );
        $this->load->view('Admin/layouts/head');
        $this->load->view('Admin/layouts/header');
        $this->load->view('Admin/layouts/aside');
        $this->load->view('Admin/Transaksi/return_barang', $data);
        $this->load->view('Admin/layouts/footer');
    }
}

/* End of file Pengembalian.php */
