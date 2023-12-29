<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Gudang extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$this->load->model('m_barang');
		$this->load->model('m_user');
	}

	// List all your items
	public function index()
	{
		$data = array(
			'title' => 'GRIYA FROZEN FOOD',
			'barang_kurang' => $this->m_barang->barang_kurang(),
			'barang' => $this->m_barang->barang(),
			'akun' => $this->m_user->akun(),
			'isi' => 'gudang/v_gudang'
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
			'stok' => $this->input->post('stok'),
		);
		$this->cart->insert($data);
		$this->session->set_flashdata('pesan', 'Berhasil');
		redirect('barang/kasir/' . $id_barang);
	}

	public function cekout()
	{
		//simppan tabel barang keluar
		$i = 1;
		foreach ($this->cart->contents() as $item) {
			$data = array(
				'no_transaksi' => $this->input->post('no_transaksi'),
				'id_barang_minimal' => $item['id'],
				'harga' => $this->input->post('harga'),
				'total_harga' => $this->input->post('total_harga'),
				'tgl_transaksi' => date('Y-m-d H:i:s'),
				'qty' => $this->input->post('qty' . $i++)
			);
			$this->m_barang->cekout($data);
		}

		//mengurangi jumlah stok
		$kstok = 0;
		foreach ($this->cart->contents() as $stok) {
			$id = $stok['id'];
			$kstok = $stok['stok'] - $stok['qty'];
			$data = array(
				'stok' => $kstok
			);
			$this->m_barang->stok($id, $data);
		}

		$this->cart->destroy();
		redirect('barang/kasir');
	}

	public function delete($rowid)
	{
		$this->cart->remove($rowid);
		redirect('barang/kasir');
	}
}

/* End of file Admin.php */
