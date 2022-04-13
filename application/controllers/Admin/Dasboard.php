<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dasboard extends CI_Controller
{

    public function index()
    {
        $this->protect->protect_admin();
        $this->load->view('Admin/layouts/head');
        $this->load->view('Admin/layouts/header');
        $this->load->view('Admin/layouts/aside');
        $this->load->view('Admin/dashboard');
        $this->load->view('Admin/layouts/footer');
    }
}
        
    /* End of file  Dasboard.php */
