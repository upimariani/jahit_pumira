<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Katalog extends CI_Controller
{

    public function index()
    {
        $this->load->view('Pelanggan/Layouts/head');
        $this->load->view('Pelanggan/Layouts/topend');
        $this->load->view('Pelanggan/home');
        $this->load->view('Pelanggan/Layouts/footer');
    }
}

/* End of file Katalog.php */
