<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_kategori');
		$this->load->model('m_user');
	}

	// List all your items
	public function index()
	{
		$data = array(
			'title' => 'Kategori Barang',
			'akun' => $this->m_user->akun(),
			'kategori' => $this->m_kategori->kategori(),
			'isi' => 'gudang/kategori/v_kategori'
		);
		$this->load->view('gudang/layout/v_wrapper', $data, FALSE);
	}

	// Add a new item
	public function add()
	{
		$data = array(
			'kategori_barang' => $this->input->post('kategori_barang'),
		);
		$this->m_kategori->add($data);
		$this->session->set_flashdata('pesan', 'Kategori Berhasil Ditambahkan!!!');
		redirect('kategori');
	}

	//Update one item
	public function update($id_kategori = NULL)
	{
		$data = array(
			'id_kategori' => $id_kategori,
			'kategori_barang' => $this->input->post('kategori_barang')
		);
		$this->m_kategori->update($data);
		$this->session->set_flashdata('pesan', 'Kategori Barang Berhasil Diupdate!!!');
		redirect('kategori');
	}

	//Delete one item
	public function delete($id_kategori = NULL)
	{
		$data = array(
			'id_kategori' => $id_kategori,
		);
		$this->m_kategori->delete($data);
		$this->session->set_flashdata('pesan', 'Kategori Barang Berhasil Dihapus!!!');
		redirect('kategori');
	}
}

/* End of file Kategori.php */
