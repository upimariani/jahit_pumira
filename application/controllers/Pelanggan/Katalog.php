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
        $this->form_validation->set_rules('provinsi', 'Provinsi', 'required');
        $this->form_validation->set_rules('kota', 'Kota', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat Lengkap', 'required');
        $this->form_validation->set_rules('expedisi', 'Expedisi', 'required');
        $this->form_validation->set_rules('paket', 'Paket', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Pelanggan/Layouts/head');
            $this->load->view('Pelanggan/Layouts/topend');
            $this->load->view('Pelanggan/Layouts/categori');
            $this->load->view('Pelanggan/checkout');
        } else {
            $data = array(
                'id_transaksi' => $this->input->post('id_transaksi'),
                'id_customer' => '1',
                'tgl_transaksi' => date('Y-m-d'),
                'alamat' => $this->input->post('alamat'),
                'ekspedisi' => $this->input->post('expedisi'),
                'estimasi' => $this->input->post('paket'),
                'ongkir' => $this->input->post('ongkir'),
                'status_order' => '0',
                'total_bayar' => $this->input->post('total_bayar')
            );
            $this->db->insert('transaksi', $data);

            $i = 1;
            foreach ($this->cart->contents() as $item) {
                $data_rinci = array(
                    'id_transaksi' => $this->input->post('id_transaksi'),
                    'id_size' => $item['id'],
                    'qty' => $this->input->post('qty' . $i++)
                );
                $this->db->insert('detail_transaksi', $data_rinci);
            }
            $this->session->set_flashdata('success', 'Pesanan Anda Berhasil, Silahkan melakukan pembayaran!');
            redirect('pelanggan/katalog');
        }
    }
}

/* End of file Katalog.php */
