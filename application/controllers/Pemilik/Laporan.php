<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mLaporan');
    }

    public function index()
    {
        $data = array(
            'laporan' => $this->mLaporan->laporan()
        );
        $this->load->view('Pemilik/Layouts/head');
        $this->load->view('Pemilik/Layouts/header');
        $this->load->view('Pemilik/Layouts/aside');
        $this->load->view('Pemilik/lap_transaksi', $data);
        $this->load->view('Pemilik/Layouts/footer');
    }

    public function lap_harian()
    {
        $tanggal = $this->input->post('tanggal');
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $data = array(
            'tanggal' => $tanggal,
            'bulan' => $bulan,
            'tahun' => $tahun,
            'laporan' => $this->mLaporan->lap_harian($tanggal, $bulan, $tahun),
            'grafik_harian' => $this->mLaporan->grafik_harian($tanggal, $bulan, $tahun)
        );
        $this->load->view('Pemilik/Layouts/head');
        $this->load->view('Pemilik/Layouts/header');
        $this->load->view('Pemilik/Layouts/aside');
        $this->load->view('Pemilik/Laporan/harian', $data);
        $this->load->view('Pemilik/Layouts/footer');
    }
    public function lap_bulanan()
    {
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $data = array(
            'bulan' => $bulan,
            'tahun' => $tahun,
            'laporan' => $this->mLaporan->lap_bulanan($bulan, $tahun),
            'grafik_bulanan' => $this->mLaporan->grafik_bulanan($bulan, $tahun)
        );
        $this->load->view('Pemilik/Layouts/head');
        $this->load->view('Pemilik/Layouts/header');
        $this->load->view('Pemilik/Layouts/aside');
        $this->load->view('Pemilik/Laporan/bulanan', $data);
        $this->load->view('Pemilik/Layouts/footer');
    }
    public function lap_tahunan()
    {
        $tahun = $this->input->post('tahun');

        $data = array(
            'tahun' => $tahun,
            'laporan' => $this->mLaporan->lap_tahunan($tahun),
            'grafik_tahunan' => $this->mLaporan->grafik_tahunan($tahun)
        );
        $this->load->view('Pemilik/Layouts/head');
        $this->load->view('Pemilik/Layouts/header');
        $this->load->view('Pemilik/Layouts/aside');
        $this->load->view('Pemilik/Laporan/tahunan', $data);
        $this->load->view('Pemilik/Layouts/footer');
    }
}

/* End of file Laporan.php */
