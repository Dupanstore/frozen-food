<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kirim extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_kirim');
		$this->load->model('m_user');
	}

	// List all your items
	public function index()
	{
		$data = array(
			'title' => 'PO Barang',
			'list_kirim' => $this->m_kirim->list_kirim(),
			'akun' => $this->m_user->akun(),
			'isi' => 'pimpinan/kirim/v_kirim'
		);
		$this->load->view('pimpinan/layout/v_wrapper', $data, FALSE);
	}

	// Add a new item
	public function pesan()
	{
		$this->login_user->proteksi_halaman();
		// $id_barang = $this->input->post('id_barang');
		$data = array(
			'id' => $this->input->post('id'),
			'qty' => $this->input->post('qty'),
			'name' => $this->input->post('name'),
			'price' => $this->input->post('price'),
			'stok' => $this->input->post('stok'),
		);
		$this->cart->insert($data);
		$this->session->set_flashdata('pesan', 'Berhasil Tambah PO');
		redirect('kirim');
	}

	public function add_cart()
	{
		$this->login_user->proteksi_halaman();
		$data = array(
			'id' => $this->input->post('id'),
			'name' => $this->input->post('name'),
			'qty' => $this->input->post('qty'),
		);
		$this->cart->insert($data);
		$this->session->set_flashdata('success', 'Data Produk Berhasil Disimpan Dikeranjang!');
		redirect('kirim/pengiriman');
	}

	public function pengiriman()
	{
		$data = array(
			'title' => 'Kirim Barang',
			'akun' => $this->m_user->akun(),
			'isi' => 'pimpinan/kirim/v_cart'
		);
		$this->load->view('pimpinan/layout/v_wrapper', $data, FALSE);
	}

	public function update()
	{
		$i = 1;
		foreach ($this->cart->contents() as $items) {
			$data = array(
				'rowid' => $items['rowid'],
				'qty' => $this->input->post($i . '[qty]'),
				'satuan' => $this->input->post('satuan'),
			);
			$this->cart->update($data);
			$i++;
		}
		$this->session->set_flashdata('pesan', 'Belanja Berhasil Diupdate');
		redirect('kirim/pengiriman');
	}

	public function delete($rowid)
	{
		$this->cart->remove($rowid);
		redirect('kirim/pengiriman');
	}

	public function cekout()
	{
		//proteksi halaman
		$this->login_user->proteksi_halaman();
		//simpan ke tabel barang masuk
		$i = 1;
		foreach ($this->cart->contents() as $item) {
			$data = array(
				'id_user' => $this->session->userdata('id_user'),
				'no_pengiriman' => $this->input->post('no_pengiriman'),
				'id_barang' => $item['id'],
				'status' => '0',
				'satuan' => $this->input->post('satuan'),
				'qty' => $this->input->post('qty' . $i++),
			);
			$this->m_kirim->kirim($data);
		}

		// simpan ke tabel pembayaran
		$data_bayar = array(
			'no_pengiriman' => $this->input->post('no_pengiriman'),
			'id_user' => $this->session->userdata('id_user'),
			'total_bayar' => $this->input->post('total_bayar'),
			'nama' => 0,
			'no_rek' => 0,
			'tgl_bayar' => 0,
			'status_bayar' => 'belum bayar',
		);
		$this->m_kirim->simpan_bayar($data_bayar);

		$this->session->set_flashdata('pesan', 'PO Berhasil Dibuat Dan Dikirim');
		$this->cart->destroy();
		redirect('kirim');
	}

	public function bayar($no_pengiriman)
	{
		$data = array(
			'no_pengiriman' => $no_pengiriman,
			'id_user' => $this->session->userdata('id_user'),
			'pembayaran' => $this->input->post('pembayaran'),
			'nama' => $this->input->post('nama'),
			'no_rek' => $this->input->post('no_rek'),
			'tgl_bayar' => date('Y-m-d'),
			'status_bayar' => 'sudah bayar',
		);
		$this->m_kirim->bayar($data);

		$data = array(
			'no_pengiriman' => $no_pengiriman,
			'status' => 3
		);
		$this->m_kirim->update_status($data);
		$this->session->set_flashdata('pesan', 'Data Berhasil DiUpload !!!');
		redirect('status_barang_order');
	}
}

/* End of file Kategori.php */
