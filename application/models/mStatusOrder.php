<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mStatusOrder extends CI_Model
{
    public function status_order()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('customer', 'transaksi.id_customer = customer.id_customer', 'left');
        return $this->db->get()->result();
    }
    public function detail_order($id)
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

/* End of file mStatusOrder.php */
