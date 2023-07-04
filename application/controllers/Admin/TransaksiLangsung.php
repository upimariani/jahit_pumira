<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TransaksiLangsung extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->model('mKatalog');
		$this->load->model('mTransaksi');
	}

	public function index()
	{
		$data = array(
			'produk' => $this->mKatalog->katalog(),
			'transaksi' => $this->mTransaksi->transaksi_langsung()
		);
		$this->load->view('Admin/layouts/head');
		$this->load->view('Admin/layouts/header');
		$this->load->view('Admin/layouts/aside');
		$this->load->view('Admin/TransaksiLangsung/vTransaksiLangsung', $data);
		$this->load->view('Admin/layouts/footer');
	}
	public function get_size()
	{
		$id_produk = $this->input->post('id');
		$data = $this->mTransaksi->get_size($id_produk);
		echo json_encode($data);
	}
	//add to cart
	public function add_to_cart()
	{
		$stok = $this->input->post('stok');
		$qty = $this->input->post('qty');
		if ($qty >= $stok) {
			$this->session->set_flashdata('error', 'Quantity Melebihi Batas Stok');
			redirect('Admin/TransaksiLangsung');
		}
		$this->protect->protect();
		$data = array(
			'id' => $this->input->post('size'),
			'name' => $this->input->post('nama'),
			'price' => $this->input->post('harga'),
			'qty' => $this->input->post('qty'),
			'size' => $this->input->post('size_t'),
			'stok' => $this->input->post('stok')
		);
		$this->cart->insert($data);
		redirect('Admin/TransaksiLangsung');
	}
	public function delete($rowid)
	{
		$this->cart->remove($rowid);
		redirect('Admin/TransaksiLangsung');
	}
	public function order()
	{
		$data = array(
			'id_transaksi' => $this->input->post('id_transaksi'),
			'tgl_transaksi' => date('Y-m-d'),
			'status_order' => '0',
			'status_pesan' => '2',
			'total_bayar' => $this->input->post('subtotal'),
			'type_transaksi' => '2'
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
		redirect('Admin/TransaksiLangsung');
	}
	public function detail_order($id)
	{
		$data = array(
			'detail' => $this->mTransaksi->detail_transaksi($id)
		);
		$this->load->view('Admin/layouts/head');
		$this->load->view('Admin/layouts/header');
		$this->load->view('Admin/layouts/aside');
		$this->load->view('Admin/TransaksiLangsung/vDetailTransLangsung', $data);
		$this->load->view('Admin/layouts/footer');
	}
}

/* End of file TransaksiLangsung.php */
