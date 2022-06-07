<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dasboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mDashboard');
    }


    public function index()
    {
        $this->protect->protect_admin();
        $data = array(
            'pelanggan' => $this->mDashboard->customer(),
            'pemasukkan' => $this->mDashboard->pemasukkan(),
            'user' => $this->mDashboard->user(),
            'top_selling' => $this->mDashboard->top_selling()
        );
        $this->load->view('Admin/layouts/head');
        $this->load->view('Admin/layouts/header');
        $this->load->view('Admin/layouts/aside');
        $this->load->view('Admin/dashboard', $data);
        $this->load->view('Admin/layouts/footer');
    }
}
        
    /* End of file  Dasboard.php */
