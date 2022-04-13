<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mTransaksi');
    }
    public function pembayaran()
    {
        $this->protect->protect_admin();
        $data = array(
            'pesanan' => $this->mTransaksi->pesanan_masuk()
        );
        $this->load->view('Admin/layouts/head');
        $this->load->view('Admin/layouts/header');
        $this->load->view('Admin/layouts/aside');
        $this->load->view('Admin/Transaksi/pembayaran', $data);
        $this->load->view('Admin/layouts/footer');
    }
    public function konfirmasi_pembayaran()
    {
        $this->protect->protect_admin();
        $data = array(
            'pesanan' => $this->mTransaksi->pesanan_masuk()
        );
        $this->load->view('Admin/layouts/head');
        $this->load->view('Admin/layouts/header');
        $this->load->view('Admin/layouts/aside');
        $this->load->view('Admin/Transaksi/konfirmasi_pembayaran', $data);
        $this->load->view('Admin/layouts/footer');
    }
    public function proses_konfirmasi($id)
    {
        $data = array(
            'status_order' => '2'
        );
        $this->mTransaksi->konfirmasi($id, $data);
        $this->session->set_flashdata('success', 'Pesanan Berhasil Dikonfirmasi!');
        redirect('Admin/Transaksi/konfirmasi_pembayaran');
    }
    public function diproses()
    {
        $this->protect->protect_admin();
        $data = array(
            'pesanan' => $this->mTransaksi->pesanan_masuk()
        );
        $this->load->view('Admin/layouts/head');
        $this->load->view('Admin/layouts/header');
        $this->load->view('Admin/layouts/aside');
        $this->load->view('Admin/Transaksi/status_dikemas', $data);
        $this->load->view('Admin/layouts/footer');
    }
    public function detail_pesanan($id)
    {
        $data['detail'] = $this->mTransaksi->detail_pesanan($id);
        header('Content-Type: application/json');
        echo json_encode($data);
    }
    public function kirim($id)
    {
        $data = array(
            'status_order' => '3'
        );
        $this->mTransaksi->konfirmasi($id, $data);
        $this->session->set_flashdata('success', 'Pesanan Berhasil Dikirim!');
        redirect('Admin/Transaksi/konfirmasi_pembayaran');
    }
    public function dikirim()
    {
        $this->protect->protect_admin();
        $data = array(
            'pesanan' => $this->mTransaksi->pesanan_masuk()
        );
        $this->load->view('Admin/layouts/head');
        $this->load->view('Admin/layouts/header');
        $this->load->view('Admin/layouts/aside');
        $this->load->view('Admin/Transaksi/dikirim', $data);
        $this->load->view('Admin/layouts/footer');
    }
    public function selesai()
    {
        $this->protect->protect_admin();
        $data = array(
            'pesanan' => $this->mTransaksi->pesanan_masuk()
        );
        $this->load->view('Admin/layouts/head');
        $this->load->view('Admin/layouts/header');
        $this->load->view('Admin/layouts/aside');
        $this->load->view('Admin/Transaksi/selesai', $data);
        $this->load->view('Admin/layouts/footer');
    }
}

/* End of file Transaksi.php */
