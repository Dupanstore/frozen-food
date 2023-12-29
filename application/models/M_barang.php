<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_barang extends CI_Model
{

	// List all your items
	public function barang()
	{
		$this->db->select('*');
		$this->db->from('barang');
		$this->db->join('user', 'user.id_user = barang.id_user', 'left');
		$this->db->order_by('id_barang', 'desc');
		return $this->db->get()->result();
	}

	// List all your items
	public function barang_kurang()
	{
		$this->db->select('*');
		$this->db->from('barang');
		$this->db->join('user', 'user.id_user = barang.id_user', 'left');
		$this->db->where('stock <= 20');
		$this->db->order_by('id_barang', 'desc');
		return $this->db->get()->result();
	}

	// Add a new item
	public function add($data)
	{
		$this->db->insert('barang', $data);
	}

	// Detail update

	public function details($id_barang = null)
	{
		$this->db->select('*');
		$this->db->from('barang');
		$this->db->join('user', 'user.id_user = barang.id_user', 'left');
		$this->db->where('id_barang', $id_barang);
		return $this->db->get()->row();
	}
	//Update one item
	public function update($data)
	{
		$this->db->where('id_barang', $data['id_barang']);
		$this->db->update('barang', $data);
	}

	//Delete one item
	public function delete($data)
	{
		$this->db->where('id_barang', $data['id_barang']);
		$this->db->delete('barang', $data);
	}

	//BARANG KELUAR
	public function keluar()
	{
		$this->db->select('*');
		$this->db->from('barang_keluar');
		$this->db->join('barang', 'barang.id_barang = barang_keluar.id_barang', 'left');
		$this->db->order_by('id_barang_keluar', 'desc');
		return $this->db->get()->result();
	}

	public function kirim_barang($data)
	{
		$this->db->insert('barang_keluar', $data);
	}
	public function kurang_stok($id, $data)
	{
		$this->db->where('id_barang', $id);
		$this->db->update('barang', $data);
	}

	// MINIMAL BARANG 
	// List all your items
	public function barang_minimal()
	{
		$this->db->select('*');
		$this->db->from('barang_minimal');
		$this->db->order_by('id_barang_minimal', 'desc');
		return $this->db->get()->result();
	}
	// Add a new item
	public function add_mimal($data)
	{
		$this->db->insert('barang_minimal', $data);
	}

	// Detail update
	public function details_minimal($id_barang_minimal = null)
	{
		$this->db->select('*');
		$this->db->from('barang_minimal');
		$this->db->where('id_barang_minimal', $id_barang_minimal);
		return $this->db->get()->row();
	}
	//Update one item
	public function update_minimal($data)
	{
		$this->db->where('id_barang_minimal', $data['id_barang_minimal']);
		$this->db->update('barang_minimal', $data);
	}

	//Delete one item
	public function delete_minimal($data)
	{
		$this->db->where('id_barang_minimal', $data['id_barang_minimal']);
		$this->db->delete('barang_minimal', $data);
	}


	// RETURN BARANG 
	// List all your items
	public function barang_return()
	{
		$this->db->select('*');
		$this->db->from('return');
		$this->db->join('barang', 'barang.id_barang = return.id_barang', 'left');
		$this->db->order_by('id_return', 'desc');
		return $this->db->get()->result();
	}
	// Add a new item
	public function add_return($data)
	{
		$this->db->insert('return', $data);
	}

	// Detail update
	public function details_return($id_return = null)
	{
		$this->db->select('*');
		$this->db->from('return');
		$this->db->where('id_return', $id_return);
		return $this->db->get()->row();
	}
	//Update one item
	public function update_return($data)
	{
		$this->db->where('id_return', $data['id_return']);
		$this->db->update('return', $data);
	}

	//Delete one item
	public function delete_return($data)
	{
		$this->db->where('id_return', $data['id_return']);
		$this->db->delete('return', $data);
	}

	public function retun_kirim_barang($data)
	{
		$this->db->insert('sr', $data);
	}
	public function barang_sr()
	{
		$this->db->select('*');
		$this->db->from('sr');
		$this->db->join('return', 'sr.id_return = return.id_return', 'left');
		$this->db->join('barang', 'barang.id_barang = return.id_barang', 'left');
		$this->db->group_by('no_sr');
		$this->db->order_by('id_sr', 'desc');
		return $this->db->get()->result();
	}

	// KASIR
	public function transaksi()
	{
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->join('barang_minimal', 'transaksi.id_barang_minimal = barang_minimal.id_barang_minimal', 'left');
		return $this->db->get()->result();
	}
	public function barang_transaksi()
	{
		$this->db->select('*');
		$this->db->from('barang_minimal');
		$this->db->order_by('id_barang_minimal', 'desc');
		return $this->db->get()->result();
	}
	public function cekout($data)
	{
		$this->db->insert('transaksi', $data);
	}
	public function stok($id, $data)
	{
		$this->db->where('id_barang_minimal', $id);
		$this->db->update('barang_minimal', $data);
	}
}

/* End of file M_barang.php */
