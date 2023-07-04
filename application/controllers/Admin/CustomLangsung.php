<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CustomLangsung extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->model('mTransaksi');
	}

	public function index()
	{
		$this->form_validation->set_rules('baju', 'Panjang Baju', 'required');
		$this->form_validation->set_rules('lengan', 'Panjang Lengan', 'required');
		$this->form_validation->set_rules('bahu', 'Lebar Bahu', 'required');
		$this->form_validation->set_rules('pundak', 'Lebar Pundak', 'required');
		$this->form_validation->set_rules('harga', 'Total Pembayaran', 'required');
		$this->form_validation->set_rules('qty', 'Quantity', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'transaksi' => $this->mTransaksi->transaksi_custom_langsung()
			);
			$this->load->view('Admin/layouts/head');
			$this->load->view('Admin/layouts/header');
			$this->load->view('Admin/layouts/aside');
			$this->load->view('Admin/CustomLangsung/vCustomLangsung', $data);
			$this->load->view('Admin/layouts/footer');
		} else {
			$config['upload_path']          = './asset/model-baju';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 5000;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('desain')) {
				$data = array(
					'error' => $this->upload->display_errors(),
					'transaksi' => $this->mTransaksi->transaksi_custom_langsung()
				);
				$this->load->view('Admin/layouts/head');
				$this->load->view('Admin/layouts/header');
				$this->load->view('Admin/layouts/aside');
				$this->load->view('Admin/CustomLangsung/vCustomLangsung', $data);
				$this->load->view('Admin/layouts/footer');
			} else {
				$id_transaksi = date('Ymd') . strtoupper(random_string('alnum', 8));


				$upload_data =  $this->upload->data();
				$data = array(
					'id_transaksi' => $id_transaksi,
					'pjng_baju' => $this->input->post('baju'),
					'pjng_lengan' => $this->input->post('lengan'),
					'bahu' => $this->input->post('bahu'),
					'gambar_model' => $upload_data['file_name'],
					'pundak' => $this->input->post('pundak'),
					'qty_custom' => $this->input->post('qty')
				);
				$this->db->insert('custom', $data);

				$transaksi = array(
					'id_transaksi' => $id_transaksi,
					'total_bayar' => $this->input->post('harga'),
					'tgl_transaksi' => date('Y-m-d'),
					'status_pesan' => '1',
					'type_transaksi' => '2'
				);
				$this->db->insert('transaksi', $transaksi);

				$this->session->set_flashdata('success', 'Data Produk Berhasil Disimpan!');
				redirect('Admin/CustomLangsung', 'refresh');
			}
		}
	}
}

/* End of file CustomLangsung.php */
