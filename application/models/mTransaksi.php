<?php

defined('BASEPATH') or exit('No direct script access allowed');

class mTransaksi extends CI_Model
{
    public function pesanan_masuk()
    {
        $data['pesanan_masuk'] = $this->db->query('SELECT * FROM transaksi JOIN customer ON transaksi.id_customer = customer.id_customer WHERE status_order=0 AND status_pesan=2')->result();
        $data['konfirmasi'] = $this->db->query('SELECT * FROM `transaksi` JOIN customer ON transaksi.id_customer = customer.id_customer WHERE status_order=1 AND status_pesan=2')->result();
        $data['proses'] = $this->db->query('SELECT * FROM `transaksi` JOIN customer ON transaksi.id_customer = customer.id_customer WHERE status_order=2 AND status_pesan=2')->result();
        $data['kirim'] = $this->db->query('SELECT * FROM `transaksi` JOIN customer ON transaksi.id_customer = customer.id_customer WHERE status_order=3 AND status_pesan=2')->result();
        $data['selesai'] = $this->db->query('SELECT * FROM `transaksi` JOIN customer ON transaksi.id_customer = customer.id_customer WHERE status_order=4 AND status_pesan=2')->result();
        return $data;
    }
    public function konfirmasi($id, $data)
    {
        $this->db->where('id_transaksi', $id);
        $this->db->update('transaksi', $data);
    }
    public function detail_pesanan($id)
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('detail_transaksi', 'transaksi.id_transaksi = detail_transaksi.id_transaksi', 'left');
        $this->db->join('size', 'detail_transaksi.id_size = size.id_size', 'left');
        $this->db->join('produk', 'size.id_produk = produk.id_produk', 'left');
        $this->db->where('transaksi.id_transaksi', $id);
        return $this->db->get()->result();
    }
}

/* End of file mTransaksi.php */
