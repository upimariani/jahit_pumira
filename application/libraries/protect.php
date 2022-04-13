<?php
defined('BASEPATH') or exit('No direct script access allowed');

class protect
{
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
    }
    public function protect()
    {
        if ($this->ci->session->userdata('id') == '') {
            $this->ci->session->set_flashdata('error', 'Anda Belum login');
            redirect('pelanggan/auth');
        }
    }
    public function protect_admin()
    {
        if ($this->ci->session->userdata('id') == '') {
            $this->ci->session->set_flashdata('error', 'Anda Belum Melakukan Login!');
            redirect('');
        }
    }
}

/* End of file protect.php */
