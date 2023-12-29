<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_kirim extends CI_Model
{

	// List all your items
	public function list_kirim()
	{
		$this->db->select('*');
		$this->db->from('barang_minimal');
		$this->db->order_by('barang_minimal.stok', 'asc');

		return $this->db->get()->result();
	}

	public function send()
	{
		$id = '0';
		$this->db->select('*');
		$this->db->from('barang_minimal');
		$this->db->where('barang_minimal.stok!=', $id);
		return $this->db->get()->result();
	}

	public function detail_kirim($id_barang_minimal)
	{
		$this->db->select('*');
		$this->db->from('barang_minimal');
		$this->db->where('barang_minimal.id_barang_minimal', $id_barang_minimal);
		return $this->db->get()->result();
	}

	public function kirim($data)
	{
		$this->db->insert('barang_masuk', $data);
	}
	public function simpan_bayar($data)
	{
		$this->db->insert('pembayaran', $data);
	}
	public function bayar($data)
	{
		$this->db->where('no_pengiriman', $data['no_pengiriman']);
		$this->db->update('pembayaran', $data);
	}
	public function update_status($data)
	{
		$this->db->where('no_pengiriman', $data['no_pengiriman']);
		$this->db->update('barang_masuk', $data);
	}
}

/* End of file M_barang.php */
