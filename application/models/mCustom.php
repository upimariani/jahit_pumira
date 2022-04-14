<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mCustom extends CI_Model
{
    public function pesanan_masuk()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('custom', 'transaksi.id_transaksi = custom.id_transaksi', 'left');
        $this->db->join('customer', 'customer.id_customer = transaksi.id_customer', 'left');

        $this->db->where('transaksi.status_pesan=1');
        return $this->db->get()->result();
    }
    public function detail_custom($id)
    {
        $data['custom'] = $this->db->query("SELECT * FROM transaksi JOIN custom ON transaksi.id_transaksi = custom.id_transaksi JOIN customer ON transaksi.id_customer=customer.id_customer where transaksi.id_transaksi= '" . $id . "'")->row();
        return $data;
    }
    public function kirim_bayar($id, $data)
    {
        $this->db->where('id_transaksi', $id);
        $this->db->update('transaksi', $data);
    }
}

/* End of file mCustom.php */
