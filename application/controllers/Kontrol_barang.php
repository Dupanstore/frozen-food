<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kontrol_barang extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_barang');
		$this->load->model('m_user');
	}

	// List all your items
	public function masuk()
	{
		$data = array(
			'title' => 'Kontrol Barang Masuk',
			'akun' => $this->m_user->akun(),
			'isi' => 'admin/masuk/v_barang_masuk'
		);
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
	}

	public function keluar()
	{
		$data = array(
			'title' => 'Kontrol Barang Keluar',
			'barang' => $this->m_barang->barang(),
			'akun' => $this->m_user->akun(),
			'barang_keluar' => $this->m_barang->keluar(),
			'isi' => 'gudang/keluar/v_barang_keluar'
		);
		$this->load->view('gudang/layout/v_wrapper', $data, FALSE);
	}

	public function kirim()
	{
		$id_barang = $this->input->post('id_barang');
		$data = array(
			'id' => $this->input->post('id'),
			'qty' => $this->input->post('qty'),
			'name' => $this->input->post('name'),
			'price' => $this->input->post('price'),
			'stock' => $this->input->post('stock'),
		);
		$this->cart->insert($data);
		$this->session->set_flashdata('pesan', 'Berhasil');
		redirect('kontrol_barang/keluar/' . $id_barang);
	}

	public function cekout()
	{
		//simppan tabel barang keluar
		$i = 1;
		foreach ($this->cart->contents() as $item) {
			$data = array(
				'no_keluar' => $this->input->post('no_keluar'),
				'id_barang' => $item['id'],
				'status' => 'keluar',
				'qty' => $this->input->post('qty' . $i++)
			);
			$this->m_barang->kirim_barang($data);
		}

		//mengurangi jumlah stok
		$kstok = 0;
		foreach ($this->cart->contents() as $stok) {
			$id = $stok['id'];
			$kstok = $stok['stock'] - $stok['qty'];
			$data = array(
				'stock' => $kstok
			);
			$this->m_barang->kurang_stok($id, $data);
		}

		$this->cart->destroy();
		redirect('kontrol_barang/keluar');
	}

	public function delete($rowid)
	{
		$this->cart->remove($rowid);
		redirect('kontrol_barang/keluar');
	}
}

/* End of file kontrol_barang.php */
