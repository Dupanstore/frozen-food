<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Supplier extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$this->load->model('m_user');
		$this->load->model('m_barang');
		$this->load->model('m_status');
	}

	// List all your items
	public function index()
	{
		$data = array(
			'title' => 'GRIYA FROZE FOOD',
			'akun' => $this->m_user->akun(),
			'isi' => 'supplier/v_supplier'
		);
		$this->load->view('supplier/layout/v_wrapper', $data, FALSE);
	}

	// RETURN BARANG 
	public function return()
	{
		$data = array(
			'title' => 'Return Barang',
			'barangsr' => $this->m_barang->barang_sr(),
			'akun' => $this->m_user->akun(),
			'isi' => 'supplier/return/v_return'
		);
		$this->load->view('supplier/layout/v_wrapper', $data, FALSE);
	}

	public function detail($no_sr)
	{
		$data = array(
			'title' => 'Detail SR Barang',
			'detail' => $this->m_status->detail_sr($no_sr),
			'akun' => $this->m_user->akun(),
			'isi' => 'supplier/return/v_detail'
		);
		$this->load->view('supplier/layout/v_wrapper', $data, FALSE);
	}
}

/* End of file Admin.php */
