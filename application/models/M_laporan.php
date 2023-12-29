<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_laporan extends CI_Model
{
	// LAPORAN BARANG KELUAR
	public function lap_hari($tanggal, $bulan, $tahun)
	{
		$this->db->select('*');
		$this->db->from('barang_keluar');
		$this->db->join('barang', 'barang_keluar.id_barang = barang.id_barang', 'left');
		$this->db->where('DAY(barang_keluar.tanggal_keluar)', $tanggal);
		$this->db->where('MONTH(barang_keluar.tanggal_keluar)', $bulan);
		$this->db->where('YEAR(barang_keluar.tanggal_keluar)', $tahun);
		$this->db->where('status', 'keluar');
		$this->db->order_by('qty', 'desc');
		return $this->db->get()->result();
	}
	public function lap_bulan($bulan, $tahun)
	{
		$this->db->select('*');
		$this->db->from('barang_keluar');
		$this->db->join('barang', 'barang_keluar.id_barang = barang.id_barang', 'left');
		$this->db->where('MONTH(barang_keluar.tanggal_keluar)', $bulan);
		$this->db->where('YEAR(barang_keluar.tanggal_keluar)', $tahun);
		$this->db->where('status', 'keluar');
		$this->db->order_by('qty', 'desc');
		return $this->db->get()->result();
	}
	public function lap_tahun($tahun)
	{
		$this->db->select('*');
		$this->db->from('barang_keluar');
		$this->db->join('barang', 'barang_keluar.id_barang = barang.id_barang', 'left');
		$this->db->where('YEAR(barang_keluar.tanggal_keluar)', $tahun);
		$this->db->where('status', 'keluar');
		$this->db->order_by('qty', 'desc');
		return $this->db->get()->result();
	}

	// LAPORAN BARANG MASUK
	public function lap_hari_masuk($tanggal, $bulan, $tahun)
	{
		$this->db->select('*');
		$this->db->from('barang_masuk');
		$this->db->join(
			'barang',
			'barang_masuk.id_barang = barang.id_barang',
			'left'
		);
		$this->db->where('DAY(barang_masuk.tanggal_kirim)', $tanggal);
		$this->db->where('MONTH(barang_masuk.tanggal_kirim)', $bulan);
		$this->db->where('YEAR(barang_masuk.tanggal_kirim)', $tahun);
		$this->db->where('status', '4');
		$this->db->order_by('qty', 'desc');
		return $this->db->get()->result();
	}
	public function lap_bulan_masuk($bulan, $tahun)
	{
		$this->db->select('*');
		$this->db->from('barang_masuk');
		$this->db->join(
			'barang',
			'barang_masuk.id_barang = barang.id_barang',
			'left'
		);
		$this->db->where('MONTH(barang_masuk.tanggal_kirim)', $bulan);
		$this->db->where('YEAR(barang_masuk.tanggal_kirim)', $tahun);
		$this->db->where('status', '4');
		$this->db->order_by('qty', 'desc');
		return $this->db->get()->result();
	}
	public function lap_tahun_masuk($tahun)
	{
		$this->db->select('*');
		$this->db->from('barang_masuk');
		$this->db->join(
			'barang',
			'barang_masuk.id_barang = barang.id_barang',
			'left'
		);
		$this->db->where('YEAR(barang_masuk.tanggal_kirim)', $tahun);
		$this->db->where('status', '4');
		$this->db->order_by('qty', 'desc');
		return $this->db->get()->result();
	}

	// LAPORAN BARANG KELUAR
	public function lap_hari_return($tanggal, $bulan, $tahun)
	{
		$this->db->select('*');
		$this->db->from('sr');
		$this->db->join(
			'return',
			'sr.id_return = return.id_return',
			'left'
		);
		$this->db->join(
			'barang',
			'return.id_barang = barang.id_barang',
			'left'
		);
		$this->db->where('DAY(sr.tgl_sr)', $tanggal);
		$this->db->where('MONTH(sr.tgl_sr)', $bulan);
		$this->db->where('YEAR(sr.tgl_sr)', $tahun);
		$this->db->order_by('sr.jml', 'desc');
		return $this->db->get()->result();
	}
	public function lap_bulan_return($bulan, $tahun)
	{
		$this->db->select('*');
		$this->db->from('sr');
		$this->db->join(
			'return',
			'sr.id_return = return.id_return',
			'left'
		);
		$this->db->join(
			'barang',
			'return.id_barang = barang.id_barang',
			'left'
		);
		$this->db->where('MONTH(sr.tgl_sr)', $bulan);
		$this->db->where('YEAR(sr.tgl_sr)', $tahun);
		$this->db->order_by('sr.jml', 'desc');
		return $this->db->get()->result();
	}
	public function lap_tahun_return($tahun)
	{
		$this->db->select('*');
		$this->db->from('sr');
		$this->db->join(
			'return',
			'sr.id_return = return.id_return',
			'left'
		);
		$this->db->join(
			'barang',
			'return.id_barang = barang.id_barang',
			'left'
		);
		$this->db->where('YEAR(sr.tgl_sr)', $tahun);
		$this->db->order_by('sr.jml', 'desc');
		return $this->db->get()->result();
	}
}
