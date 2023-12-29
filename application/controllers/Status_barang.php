<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Status_barang extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_status');
		$this->load->model('m_user');
	}

	// List all your items
	public function index()
	{
		$data = array(
			'title' => 'Status Barang Masuk',
			'masuk' => $this->m_status->masuk(),
			'akun' => $this->m_user->akun(),
			'isi' => 'supplier/status/v_status'
		);
		$this->load->view('supplier/layout/v_wrapper', $data, FALSE);
	}

	public function kirim($no_pengiriman)
	{
		$data = array(
			'no_pengiriman' => $no_pengiriman,
			'status' => 2
		);
		$this->m_status->update_kirim($data);
		$this->session->set_flashdata('pesan', 'Berhasil dikonfirmasi');
		redirect('status_barang');
	}

	public function detail($no_pengiriman)
	{
		$data = array(
			'title' => 'Detail PO Barang',
			'detail' => $this->m_status->detail($no_pengiriman),
			'akun' => $this->m_user->akun(),
			'isi' => 'supplier/status/v_detail'
		);
		$this->load->view('supplier/layout/v_wrapper', $data, FALSE);
	}

	public function konfirmasi($no_pengiriman)
	{
		$data = array(
			'no_pengiriman' => $no_pengiriman,
			'status' => 1
		);
		$this->m_status->update_status_sup($data);
		$this->session->set_flashdata('pesan', 'Berhasil dikonfirmasi');
		redirect('status_barang');
	}
}

/* End of file Kategori.php */
