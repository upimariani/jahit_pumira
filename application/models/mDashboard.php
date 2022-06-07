<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mDashboard extends CI_Model
{
    public function customer()
    {
        $this->db->select('COUNT(nama_customer) as jml_pelanggan');
        $this->db->from('customer');
        return $this->db->get()->row();
    }
    public function pemasukkan()
    {
        $this->db->select('SUM(total_bayar) as pemasukkan');
        $this->db->from('transaksi');
        return $this->db->get()->row();
    }
    public function user()
    {
        $this->db->select('COUNT(nama_user) as user');
        $this->db->from('user');
        return $this->db->get()->row();
    }
    public function top_selling()
    {
        return $this->db->query("SELECT SUM(qty) as total, nama_produk, harga, size FROM `detail_transaksi`JOIN size ON detail_transaksi.id_size = size.id_size JOIN produk ON size.id_produk=produk.id_produk GROUP BY detail_transaksi.id_size ORDER BY total DESC")->result();
    }
}

/* End of file mDasboard.php */
