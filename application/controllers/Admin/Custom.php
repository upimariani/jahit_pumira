<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Custom extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mCustom');
        $this->load->model('mTransaksi');
    }


    public function index()
    {
        $data = array(
            'pesanan_masuk' => $this->mCustom->pesanan_masuk()
        );
        $this->load->view('Admin/layouts/head');
        $this->load->view('Admin/layouts/header');
        $this->load->view('Admin/layouts/aside');
        $this->load->view('Admin/Custom/custom', $data);
        $this->load->view('Admin/layouts/footer');
    }
    public function detail_custom($id)
    {
        $data = array(
            'detail' => $this->mCustom->detail_custom($id)
        );
        $this->load->view('Admin/layouts/head');
        $this->load->view('Admin/layouts/header');
        $this->load->view('Admin/layouts/aside');
        $this->load->view('Admin/Custom/detail_custom', $data);
        $this->load->view('Admin/layouts/footer');
    }
    public function kirim_total($id)
    {
        $data = array(
            'total_bayar' => $this->input->post('bayar')
        );
        $this->mCustom->kirim_bayar($id, $data);
        $this->session->set_flashdata('success', 'Total Pembayaran Berhasil Dikirim!');
        redirect('admin/custom');
    }
    public function konfirmasi($id)
    {
        $data = array(
            'status_order' => '2'
        );
        $this->mTransaksi->konfirmasi($id, $data);
        $this->session->set_flashdata('success', 'Pesanan Berhasil Dikonfirmasi!');
        redirect('Admin/Custom');
    }
    public function dikirim($id)
    {
        $data = array(
            'status_order' => '3'
        );
        $this->mTransaksi->konfirmasi($id, $data);
        $this->session->set_flashdata('success', 'Pesanan Berhasil Dikirim!');
        redirect('Admin/Custom');
    }
}

/* End of file Custom.php */
