<?php

defined('BASEPATH') or exit('No direct script access allowed');

class KelolaDataMaster extends CI_Controller
{

    public function user()
    {
        $this->load->view('Admin/layouts/head');
        $this->load->view('Admin/layouts/header');
        $this->load->view('Admin/layouts/aside');
        $this->load->view('Admin/User/user');
        $this->load->view('Admin/layouts/footer');
    }
    public function create_user()
    {
        $this->load->view('Admin/layouts/head');
        $this->load->view('Admin/layouts/header');
        $this->load->view('Admin/layouts/aside');
        $this->load->view('Admin/User/create_user');
        $this->load->view('Admin/layouts/footer');
    }
}
        
    /* End of file  KelolaDataMaster.php */
