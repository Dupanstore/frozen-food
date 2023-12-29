<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_kategori extends CI_Model
{

	// List all your items
	public function kategori()
	{
		$this->db->select('*');
		$this->db->from('kategori');
		$this->db->order_by('id_kategori', 'desc');
		return $this->db->get()->result();
	}

	// Add a new item
	public function add($data)
	{
		$this->db->insert('kategori', $data);
	}

	//Update one item
	public function update($data)
	{
		$this->db->where('id_kategori', $data['id_kategori']);
		$this->db->update('kategori', $data);
	}

	//Delete one item
	public function delete($data)
	{
		$this->db->where('id_kategori', $data['id_kategori']);
		$this->db->delete('kategori', $data);
	}
}

/* End of file M_kategori.php */
