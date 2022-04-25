<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mLaporan extends CI_Model
{
    //---------laporan biasa------------
    public function lap_harian($tanggal, $bulan, $tahun)
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('customer', 'transaksi.id_customer = customer.id_customer', 'left');
        $this->db->where('transaksi.status_order=4');
        $this->db->where('DAY(transaksi.tgl_transaksi)', $tanggal);
        $this->db->where('MONTH(transaksi.tgl_transaksi)', $bulan);
        $this->db->where('YEAR(transaksi.tgl_transaksi)', $tahun);
        return $this->db->get()->result();
    }

    public function lap_bulanan($bulan, $tahun)
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('customer', 'transaksi.id_customer = customer.id_customer', 'left');
        $this->db->where('transaksi.status_order=4');
        $this->db->where('MONTH(transaksi.tgl_transaksi)', $bulan);
        $this->db->where('YEAR(transaksi.tgl_transaksi)', $tahun);
        return $this->db->get()->result();
    }

    public function lap_tahunan($tahun)
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('customer', 'transaksi.id_customer = customer.id_customer', 'left');
        $this->db->where('transaksi.status_order=4');
        $this->db->where('YEAR(transaksi.tgl_transaksi)', $tahun);
        return $this->db->get()->result();
    }
}


/* End of file mLaporan.php */
