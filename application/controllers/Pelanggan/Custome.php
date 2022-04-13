<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Custome extends CI_Controller
{

    public function index()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('pjng_baju', 'Panjang Baju', 'required');
        $this->form_validation->set_rules('bahu', 'Ukuran Bahu', 'required');
        $this->form_validation->set_rules('pundak', 'Ukuran Pundak', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Pelanggan/Layouts/head');
            $this->load->view('Pelanggan/Layouts/topend');
            $this->load->view('Pelanggan/Layouts/categori');
            $this->load->view('Pelanggan/custome');
        } else {
            $config['upload_path']          = './asset/model-baju';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 5000;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('userfile')) {
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('Pelanggan/Layouts/head');
                $this->load->view('Pelanggan/Layouts/topend');
                $this->load->view('Pelanggan/Layouts/categori');
                $this->load->view('Pelanggan/custome',  $error);
            } else {
                $upload_data = $this->upload->data();
                $data = array();
            }
        }
    }
}

/* End of file Custome.php */
