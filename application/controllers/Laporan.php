<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_laporan');
		$this->load->model('m_user');
	}

	public function index()
	{
		$data = array(
			'title' => 'Data Laporan Barang Keluar Dan Barang Masuk',
			'akun' => $this->m_user->akun(),
			'isi' => 'pimpinan/laporan/v_laporan'
		);
		$this->load->view('pimpinan/layout/v_wrapper', $data, FALSE);
	}

	// LAPORAN BARANG KELUAR
	public function lap_hari()
	{
		$tanggal = $this->input->post('tanggal');
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');

		$data = array(
			'title' => 'Laporan Barang Keluar Perhari',
			'tanggal' => $tanggal,
			'bulan' => $bulan,
			'tahun' => $tahun,
			'laporan' => $this->m_laporan->lap_hari($tanggal, $bulan, $tahun),
			'akun' => $this->m_user->akun(),
			'isi' => 'pimpinan/laporan/keluar/v_hari'
		);
		$this->load->view('pimpinan/layout/v_wrapper', $data, FALSE);
	}

	public function lap_bulan()
	{
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
		$data = array(
			'title' => 'Laporan Barang Keluar Perbulan',
			'bulan' => $bulan,
			'tahun' => $tahun,
			'laporan' => $this->m_laporan->lap_bulan($bulan, $tahun),
			'akun' => $this->m_user->akun(),
			'isi' => 'pimpinan/laporan/keluar/v_bulan'
		);
		$this->load->view('pimpinan/layout/v_wrapper', $data, FALSE);
	}

	public function lap_tahun()
	{
		$tahun = $this->input->post('tahun');
		$data = array(
			'title' => 'Laporan Barang Keluar Pertahun',
			'tahun' => $tahun,
			'laporan' => $this->m_laporan->lap_tahun($tahun),
			'akun' => $this->m_user->akun(),
			'isi' => 'pimpinan/laporan/keluar/v_tahun'
		);
		$this->load->view('pimpinan/layout/v_wrapper', $data, FALSE);
	}

	// LAPORAN BARANG MASUK
	public function lap_hari_masuk()
	{
		$tanggal = $this->input->post('tanggal');
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');

		$data = array(
			'title' => 'Laporan Barang Masuk Perhari',
			'tanggal' => $tanggal,
			'bulan' => $bulan,
			'tahun' => $tahun,
			'laporan' => $this->m_laporan->lap_hari_masuk($tanggal, $bulan, $tahun),
			'akun' => $this->m_user->akun(),
			'isi' => 'pimpinan/laporan/masuk/v_hari'
		);
		$this->load->view('pimpinan/layout/v_wrapper', $data, FALSE);
	}

	public function lap_bulan_masuk()
	{
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
		$data = array(
			'title' => 'Laporan Barang Masuk Perbulan',
			'bulan' => $bulan,
			'tahun' => $tahun,
			'laporan' => $this->m_laporan->lap_bulan_masuk($bulan, $tahun),
			'akun' => $this->m_user->akun(),
			'isi' => 'pimpinan/laporan/masuk/v_bulan'
		);
		$this->load->view('pimpinan/layout/v_wrapper', $data, FALSE);
	}

	public function lap_tahun_masuk()
	{
		$tahun = $this->input->post('tahun');
		$data = array(
			'title' => 'Laporan Barang Masuk Pertahun',
			'tahun' => $tahun,
			'laporan' => $this->m_laporan->lap_tahun_masuk($tahun),
			'akun' => $this->m_user->akun(),
			'isi' => 'pimpinan/laporan/masuk/v_tahun'
		);
		$this->load->view('pimpinan/layout/v_wrapper', $data, FALSE);
	}

	// LAPORAN RETURN 
	public function lap_hari_return()
	{
		$tanggal = $this->input->post('tanggal');
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');

		$data = array(
			'title' => 'Laporan Return Barang Perhari',
			'tanggal' => $tanggal,
			'bulan' => $bulan,
			'tahun' => $tahun,
			'laporan' => $this->m_laporan->lap_hari_return($tanggal, $bulan, $tahun),
			'akun' => $this->m_user->akun(),
			'isi' => 'pimpinan/laporan/return/v_hari'
		);
		$this->load->view('pimpinan/layout/v_wrapper', $data, FALSE);
	}

	public function lap_bulan_return()
	{
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
		$data = array(
			'title' => 'Laporan Barang Keluar Perbulan',
			'bulan' => $bulan,
			'tahun' => $tahun,
			'laporan' => $this->m_laporan->lap_bulan_return($bulan, $tahun),
			'akun' => $this->m_user->akun(),
			'isi' => 'pimpinan/laporan/return/v_bulan'
		);
		$this->load->view('pimpinan/layout/v_wrapper', $data, FALSE);
	}

	public function lap_tahun_return()
	{
		$tahun = $this->input->post('tahun');
		$data = array(
			'title' => 'Laporan Return Barang Pertahun',
			'tahun' => $tahun,
			'laporan' => $this->m_laporan->lap_tahun_return($tahun),
			'akun' => $this->m_user->akun(),
			'isi' => 'pimpinan/laporan/return/v_tahun'
		);
		$this->load->view('pimpinan/layout/v_wrapper', $data, FALSE);
	}
}
