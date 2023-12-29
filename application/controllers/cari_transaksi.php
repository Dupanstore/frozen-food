<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Cari_transaksi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_status');
		$this->load->model('m_barang');
		$this->load->model('m_user');
	}

	// List all your items
	public function index()
	{
		$data = array(
			'title' => 'Status Semua Transaksi',
			'masuk' => $this->m_status->masuk_admin(),
			'akun' => $this->m_user->akun(),
			'isi' => 'gudang/cari_transaksi/v_transaksi'
		);
		$this->load->view('gudang/layout/v_wrapper', $data, FALSE);
	}

		// MENU KASIR
		public function trx()
		{
			$data = array(
				'title' => 'Transaksi',
				'barang' => $this->m_barang->barang_transaksi(),
				'transaksi' => $this->m_barang->transaksi(),
				'akun' => $this->m_user->akun(),
				'isi' => 'gudang/cari_transaksi/v_transaksi'
			);
			$this->load->view('gudang/layout/v_wrapper', $data, FALSE);
		}
}

/* End of file Kategori.php */
