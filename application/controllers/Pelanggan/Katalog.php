<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Katalog extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mKatalog');
        $this->load->model('mStatusOrder');
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
    //halaman detail produk
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

    //add to cart
    public function add()
    {
        $this->protect->protect();
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

    //informasi cart
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

    //proses checkout
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
                'id_customer' => $this->session->userdata('id'),
                'tgl_transaksi' => date('Y-m-d'),
                'alamat' => $this->input->post('alamat'),
                'provinsi' => $this->input->post('provinsi'),
                'kota' => $this->input->post('kota'),
                'ekspedisi' => $this->input->post('expedisi'),
                'estimasi' => $this->input->post('paket'),
                'ongkir' => $this->input->post('ongkir'),
                'status_order' => '0',
                'status_pesan' => '2',
                'total_bayar' => $this->input->post('total_bayar')
            );
            $this->db->insert('transaksi', $data);

            //mengurangi jumlah stok
            $kstok = 0;
            foreach ($this->cart->contents() as $key => $value) {
                $id = $value['id'];
                $kstok = $value['stok'] - $value['qty'];
                $data = array(
                    'stok' => $kstok
                );
                $this->db->where('id_size', $id);
                $this->db->update('size', $data);
            }

            $i = 1;
            foreach ($this->cart->contents() as $item) {
                $data_rinci = array(
                    'id_transaksi' => $this->input->post('id_transaksi'),
                    'id_size' => $item['id'],
                    'qty' => $this->input->post('qty' . $i++)
                );
                $this->db->insert('detail_transaksi', $data_rinci);
            }
            $this->cart->destroy();
            $this->session->set_flashdata('success', 'Pesanan Anda Berhasil, Silahkan melakukan pembayaran!');
            redirect('pelanggan/status_order');
        }
    }

    //status order pelanggan
    public function status_order()
    {
        $data = array(
            'status_order' => $this->mStatusOrder->status_order()
        );
        $this->load->view('Pelanggan/Layouts/head');
        $this->load->view('Pelanggan/Layouts/topend');
        $this->load->view('Pelanggan/Layouts/categori');
        $this->load->view('Pelanggan/status_order', $data);
        $this->load->view('Pelanggan/Layouts/footer');
    }
    public function detail_order($id)
    {
        $data['produk'] = $this->mStatusOrder->detail_order($id);
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    //upload bukti bukti pembyaran
    public function upload_bukti_pembayaran($id)
    {
        $config['upload_path']          = './asset/bukti-pembayaran';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 5000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('pembayaran')) {
            $data = array(
                'status_order' => $this->mStatusOrder->status_order(),
                'error' => $this->upload->display_errors()
            );
            $this->load->view('Pelanggan/Layouts/head');
            $this->load->view('Pelanggan/Layouts/topend');
            $this->load->view('Pelanggan/Layouts/categori');
            $this->load->view('Pelanggan/status_order', $data);
            $this->load->view('Pelanggan/Layouts/footer');
        } else {
            $upload_data =  $this->upload->data();
            $data = array(
                'status_order' => '1',
                'bukti_pembayaran' => $upload_data['file_name']
            );
            $this->db->where('id_transaksi', $id);
            $this->db->update('transaksi', $data);
            $this->session->set_flashdata('success', 'Upload Pembayaran Berhasil Dikirim!');
            redirect('pelanggan/katalog/status_order');
        }
    }
    public function pesanan_diterima($id)
    {
        $data = array(
            'status_order' => '4'
        );
        $this->db->where('id_transaksi', $id);
        $this->db->update('transaksi', $data);
        $this->session->set_flashdata('success', 'Pesanan Anda Sudah Diterima!');
        redirect('pelanggan/katalog/status_order');
    }
}

/* End of file Katalog.php */
