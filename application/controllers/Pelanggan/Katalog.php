<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Katalog extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mKatalog');
    }
    public function index()
    {
        $data = array(
            'produk' => $this->mKatalog->katalog()
        );
        $this->load->view('Pelanggan/Layouts/head');
        $this->load->view('Pelanggan/Layouts/topend');
        $this->load->view('Pelanggan/home', $data);
        $this->load->view('Pelanggan/Layouts/footer');
    }
    public function detail_produk($id)
    {
        $data = array(
            'data' => $this->mKatalog->detail_produk($id)
        );
        $this->load->view('Pelanggan/Layouts/head');
        $this->load->view('Pelanggan/Layouts/topend');
        $this->load->view('Pelanggan/Layouts/categori');
        $this->load->view('Pelanggan/produk_detail', $data);
        $this->load->view('Pelanggan/Layouts/footer');
    }
    public function add()
    {
        $data = array(
            'id' => $this->input->post('id'),
            'name' => $this->input->post('name'),
            'price' => $this->input->post('price'),
            'qty' => $this->input->post('qty'),
            'size' => $this->input->post('size'),
            'stok' => $this->input->post('stok'),
            'netto' => $this->input->post('netto')
        );
        $this->cart->insert($data);
        redirect('Pelanggan/katalog');
    }
    public function cart()
    {
        $this->load->view('Pelanggan/Layouts/head');
        $this->load->view('Pelanggan/Layouts/topend');
        $this->load->view('Pelanggan/Layouts/categori');
        $this->load->view('Pelanggan/cart');
        $this->load->view('Pelanggan/Layouts/footer');
    }
    public function update_cart()
    {
        $i = 1;
        foreach ($this->cart->contents() as $items) {
            $data = array(
                'rowid'  => $items['rowid'],
                'qty'    => $this->input->post($i . '[qty]')
            );
            $this->cart->update($data);
            $i++;
        }
        redirect('Pelanggan/katalog/cart');
    }
    public function delete($rowid)
    {
        $this->cart->remove($rowid);
        redirect('Pelanggan/katalog/cart');
    }
    public function checkout()
    {
        $this->load->view('Pelanggan/Layouts/head');
        $this->load->view('Pelanggan/Layouts/topend');
        $this->load->view('Pelanggan/Layouts/categori');
        $this->load->view('Pelanggan/checkout');
    }
}

/* End of file Katalog.php */
