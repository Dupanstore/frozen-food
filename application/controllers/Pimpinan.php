<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pimpinan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$this->load->model('m_barang');
		$this->load->model('m_status');
		$this->load->model('m_user');
	}

	// List all your items
	public function index()
	{
		$data = array(
			'title' => 'Indah Jaya Mebeul',
			'akun' => $this->m_user->akun(),
			'isi' => 'pimpinan/v_pimpinan'
		);
		$this->load->view('pimpinan/layout/v_wrapper', $data, FALSE);
	}

	public function barang()
	{
		$data = array(
			'title' => 'Data Seftey Stock Barang',
			'barang' => $this->m_barang->barang_minimal(),
			'akun' => $this->m_user->akun(),
			'isi' => 'pimpinan/barang/v_barang'
		);
		$this->load->view('pimpinan/layout/v_wrapper', $data, FALSE);
	}

	// RETURN BARANG 
	public function return()
	{
		$data = array(
			'title' => 'Return Barang',
			'barangs' => $this->m_barang->barang_return(),
			'barangsr' => $this->m_barang->barang_sr(),
			'akun' => $this->m_user->akun(),
			'isi' => 'pimpinan/return/v_return'
		);
		$this->load->view('pimpinan/layout/v_wrapper', $data, FALSE);
	}

	public function kirim()
	{
		$id_return = $this->input->post('id_return');
		$data = array(
			'id' => $this->input->post('id'),
			'id_barang' => $this->input->post('id_barang'),
			'qty' => $this->input->post('qty'),
			'name' => $this->input->post('name'),
			'price' => $this->input->post('price'),
		);
		$this->cart->insert($data);
		$this->session->set_flashdata('pesan', 'Berhasil');
		redirect('pimpinan/return/' . $id_return);
	}

	public function cekout()
	{
		//simppan tabel barang return
		$i = 1;
		foreach ($this->cart->contents() as $item) {
			$data = array(
				'no_sr' => $this->input->post('no_sr'),
				'id_return' => $item['id'],
				'id_barang' => $item['id_barang'],
				'tgl_sr' => date('Y-m-d'),
				'jml' => $this->input->post('qty' . $i++)
			);
			$this->m_barang->retun_kirim_barang($data);
		}
		$this->cart->destroy();
		redirect('pimpinan/return');
	}

	public function delete($rowid)
	{
		$this->cart->remove($rowid);
		redirect('pimpinan/return');
	}

	public function detail($no_sr)
	{
		$data = array(
			'title' => 'Detail SR Barang',
			'detail' => $this->m_status->detail_sr($no_sr),
			'akun' => $this->m_user->akun(),
			'isi' => 'pimpinan/return/v_detail'
		);
		$this->load->view('pimpinan/layout/v_wrapper', $data, FALSE);
	}
}

/* End of file Admin.php */
